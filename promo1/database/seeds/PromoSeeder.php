<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promos')->delete();
        factory(\App\Promo::class, 7)->create()->each(function ($promo){
            $promo->save();

           $faker = Faker\Factory::create();


           for ($i = 0; $i < 4; $i++){
               DB::table('students')->insert(
                   [
                       "promo_id" => $promo->id,
                       "firstname" => $faker->firstName,
                       "lastname" => $faker->lastName,
                       "email" => $faker->email,
                   ]
               );
           }
        });
    }
}
