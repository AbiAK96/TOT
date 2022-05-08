<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            [
                'school_name' => '1',
                'school_domain' => 'Admin',
                'school_address' => 'admin@gmail.com',
                'created_at' => '2022-10-25',
                'updated_at' => '2022-10-25',
                'deleted_at' => null,
            ]
        ]);
    }
}
