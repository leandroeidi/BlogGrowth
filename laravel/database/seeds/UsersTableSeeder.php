<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::Create([
        'name' => 'admin',
        'email' => 'gri@grooowth.co.jp',
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
        ]);
        factory(App\User::class, 50)->create();

    }
}