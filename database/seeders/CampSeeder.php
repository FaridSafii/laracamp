<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Camp;
class CampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $camps = [
            [
                'title' => 'Gila Belajar',
                'slug' => 'gila-belajar',
                'price' => 599000,
                'created_at' => date('Y-m-d',time()),
                'updated_at' => date('Y-m-d',time()),
            ],
            [
                'title' => 'Baru Mulai',
                'slug' => 'baru-mulai',
                'price' => 299000,
                'created_at'=> date('Y-m-d',time()),
                'updated_at'=> date('Y-m-d',time()),
            ]
            ];
            //1st method
            //tidak perlu mendeklarasikan update dan create
            // foreach ($camps as $key => $camp){
            //     Camp::create($camp);
            // }

            //2nd method 
            //harus didefiniskan created dan update agar tidak null
            Camp::insert($camps);
    }
}
