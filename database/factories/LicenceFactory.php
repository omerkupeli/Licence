<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Licence>
 */
class LicenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // Schema::create('licences', function (Blueprint $table) {
    //     $table->id();
    //     $table->timestamps();
    //     $table->string('licence_name');
    //     $table->string('name');
    //     $table->string('surname');
    //     $table->string('email');
    //     $table->date('purchase_date');

    // }); create factory for this
            'licence_name' => $this->faker->word(),
            'name' => $this->faker->name(),
            'surname' => $this->faker->name(),
            'email' => $this->faker->email(),
            'purchase_date' => 5,
            
        ];
    }

    





    


}
