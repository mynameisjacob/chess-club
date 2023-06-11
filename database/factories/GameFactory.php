<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $white = Member::inRandomOrder()->first();
        $black = Member::inRandomOrder()->select()->where('id', '<>', $white->id)->first();
        
        return [
            'white' => $white->id,
            'black' => $black->id,
            'winner' => $white->id,
            'wmoves' => rand(1,100),
            'bmoves' => rand(1,100),
            'date' => now()

        ];
    }
}
