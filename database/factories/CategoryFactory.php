<?php

namespace Database\Factories; // Pastikan namespace ini benar

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class; // Pastikan ini menunjuk ke model yang benar

    public function definition(): array
    {
        return [
            // WAJIB ADA: Memberikan nilai untuk kolom 'name'
            'name' => $this->faker->unique()->word(), 
        ];
    }
}