<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Products;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Products::class)
            ->assertStatus(200);
    }
}
