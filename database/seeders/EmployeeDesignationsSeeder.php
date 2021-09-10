<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class EmployeeDesignationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker=Faker::create();
        $jobDesignations=[];
        for($i = 1; $i<=10; $i++) {
            $jobDesignation=$faker->jobTitle();
            array_push($jobDesignations,['name'=>$jobDesignation]);
        }

        DB::table('designations')->insert($jobDesignations);
    }
}
