<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

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
            [
                'school_id' => '1',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$IapBfCW0El7WCAD9hdUoBuKNBrFUyAkj9mYUM49JM7t/Zx2PWcPSm', //admin@12345
                'first_name' => 'Admin',
                'last_name' => 'admin',
                'mobile_number' => '0711515155',
                'city' => 'Colombo',
                'zip_code' => '10000',
                'email_verified_at' => '1648030258',
                'role_id' => '1',
                'created_at' => '2022-10-25',
                'updated_at' => '2022-10-25',
                'deleted_at' => null,
            ]
        ]);
    }
}
