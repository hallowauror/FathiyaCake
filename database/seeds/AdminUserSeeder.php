<?php

use App\AdminUser;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::create([
           'name' => 'admin1',
            'email' => 'admin1@example.com',
            'password' => bcrypt('abcd1234'),
        ]);
        
    }
}
