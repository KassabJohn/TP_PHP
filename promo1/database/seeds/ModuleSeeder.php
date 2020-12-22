<?php

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->delete();
        factory(\App\Module::class, 5)->create()->each(function ($module) {
            $module->save();

})
    ;}}

