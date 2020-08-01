<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::query()->create([
            'name' => 'demo',
            'email' => 'demo@demo.ru',
            'password' => \Illuminate\Support\Facades\Hash::make('demo')
        ]);
    }
}
