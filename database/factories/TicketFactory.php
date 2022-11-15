<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $first_date = "2022-01-01 00:00:00";
        $second_date = now();
        $first_time = strtotime($first_date);
        $second_time = strtotime($second_date);
        $rand_time = rand($first_time, $second_time);
        $rand_date = date('Y-m-d g:i:s', $rand_time);

        return [
            
            'title' =>$this->faker->words(5, true),
            'description'=>$this->faker->text(250),
            'prior'=>$this->faker->randomElement([0,1]),
            'status'=>$this->faker->randomElement([0, 1, 2]), //Pendiente, Asignada, Completada

            // 'user_id'=>User::all()->random()->id;
            'user_id'=>$this->faker->numberBetween(4, 23),

            'type_id'=>$this->faker->randomElement([null, 1, 2]), //Sin tipo, Avería, Evaluación
            'location_id'=>Location::all()->random()->id,
            'closed_at'=>$this->faker->randomElement([null, now()]),
            'created_at'=>$rand_date,
        ];
    }
}
