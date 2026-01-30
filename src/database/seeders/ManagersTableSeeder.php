<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'email'=>'pretest@gmail.com',
            'password'=>Hash::make('pretest2'),
        ];
        DB::table('managers')->insert($param);
    }
}
