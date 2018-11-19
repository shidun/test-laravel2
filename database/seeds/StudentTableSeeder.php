<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('students')->insert([
    		['name' => 'shidun', 'age' => '18'],
    		['name' => 'zhangsan', 'age' => '20'], 
    	]);
    }
}
