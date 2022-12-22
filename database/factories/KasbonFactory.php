<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KasbonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'nokasbon' => $this->randomDigit,
            'tglmasuk' => $this->dateTimeThisMonth(),
            'total' => $this->randomDigit,
            'noinvoice' => $this->randomDigit,
        ];
    }
}
