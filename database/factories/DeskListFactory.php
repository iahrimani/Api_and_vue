<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\Desk;

class DeskListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'desk_id' => function () {
                return Desk::orderBy(DB::raw('RAND()'))->first()->id;
            }
        ];
    }
}
