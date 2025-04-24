<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Nette\Utils\ImageColor;

class ProductsResource extends Resource
{

    protected static ?string $modelLabel = 'Товар';
    protected static ?string $pluralModelLabel = 'Товары';
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Section::make('Новый продукт')->schema([
                        TextInput::make('title')
                            ->label('Название товара')
                            ->required()
                            ->placeholder('Iphone 13 mini'),
                        TextInput::make('price')
                            ->label('Цена')
                            ->placeholder('180000₽')
                            ->required(),
                        Select::make('category_id')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->label('Бренд')
                            ->placeholder('Выберите бренд')
                            ->relationship('category', 'title'),
                        Toggle::make('is_active')
                            ->label('Активный товар')
                            ->default(true),
                        ]),
                    Section::make()->schema([
                        FileUpload::make('image')
                            ->required()
                            ->label('Изображение товара')
                            ->directory('product')
                            ->image()
                            ->imageEditor()
                        ])
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                ->searchable()
                ->label('Название продукта'),
                TextColumn::make('price')
                ->label('Цена'),
                ToggleColumn::make('is_active')
                ->label('Активный товар'),
                ImageColumn::make('image')
                ->size(52)
                ->circular()
                ->label('Изображение'),
            ])
            ->filters([
                Filter::make('is_active')
                    ->label('Активные товары')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
