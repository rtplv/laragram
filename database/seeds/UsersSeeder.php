<?php

use Illuminate\Database\Seeder;
use Faker\Provider\Image;

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
            'name' => 'admin',
            'email' => 'admin@admin.ru',
            'password' => \Illuminate\Support\Facades\Hash::make('admin')
        ]);

        for($i = 0; $i < 100; $i++) {
            $faker = Faker\Factory::create();
            $fakeAvatarId = rand(1000, 1500);
            $fakeAvatarUrl = "https://picsum.photos/id/$fakeAvatarId/200/300";

            $user = \App\Models\User::query()->create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => \Illuminate\Support\Facades\Hash::make('123123')
            ]);

            $avatar = \App\Models\Avatar::query()->create([
               'user_id' => $user->id,
               'external_path' => $fakeAvatarUrl,
               'active' => true
            ]);

            $user->avatars()->save($avatar);
        }
    }
}
