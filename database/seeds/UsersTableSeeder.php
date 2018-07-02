<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $user = new \App\User();
//        $user->create([
//            'name' => 'Mateus',
//            'email' => 'teste@teste.com',
//            'password' => bcrypt('123')
//        ]);
        factory(\App\User::class, 30)->create();
    }
}
