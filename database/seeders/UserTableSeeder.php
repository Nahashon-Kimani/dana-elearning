<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name'=>'John Mweruli',
            'slug'=>'John Mweruli',
            'phone_no' => '0101',
            'city'=>'Nairobi',
            'email' => 'mweruli@gmail.com',
            'status'=>'Active',
            'password' => bcrypt('mweruli1996'),
            'about'=>'Good Staff'
            ]);
   
            DB::table('users')->insert([
               'role_id' => '2',
               'name' => 'Mbuci',
               'slug' => 'Mbuci',
               'phone_no' => '0102',
               'city'=>'Nairobi',
               'email' => 'mbuci@gmail.com',
               'status'=>'Active',
               'password' => bcrypt('mbuci123#'),
               'about'=>'Good Staff'
               ]);
   
               DB::table('users')->insert([
                   'role_id' => '3',
                   'name' => 'Nancy',
                   'slug'=>'Nancy Njeri',
                   'phone_no' => '0100',
                   'city'=>'Nairobi',
                   'email' => 'nancy@gmail.com',
                   'status'=>'Active',
                   'password' => bcrypt('nancy123#'),
                   'about'=>'Good Staff'
                   ]);
    }
}
