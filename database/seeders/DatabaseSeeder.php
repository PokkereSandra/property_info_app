<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Property;
use App\Models\PropertyPart;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Person::factory(15)->create()->each(function ($person) {
            Property::factory(3)->create(['person_id' => $person->id])->each(function ($property) {
                PropertyPart::factory(2)->create(['property_id' => $property->id]);
            });
        });

    }
}
