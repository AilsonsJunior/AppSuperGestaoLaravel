<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome'=>$this->faker->name(),
            'telefone'=>$this->faker->tollFreePhoneNumber(),
            'email'=>$this->faker->unique()->email(),
            'motivo_contato'=>$this->faker->numberBetween(1,3),
            'mensagem'=>$this->faker->text(200)
        ];
    }
}
