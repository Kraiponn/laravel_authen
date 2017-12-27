<?php

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
        $user = new App\User();
        $user->name = 'kraipon';
        $user->email = 'kraipon.na10@gmail.com';
        $user->password = Hash::make('12345');
        $user->save();
    }
}
