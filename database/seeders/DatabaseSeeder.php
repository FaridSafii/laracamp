<?php

namespace Database\Seeders;

use App\Models\CampBenefit;
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
        $this->call([
            CampSeeder::class,
            CampBenefitSeeder::class,
            AdminUserSeeder::class
        ]);
       
        // \App\Models\User::factory(10)->create();
    }
}
