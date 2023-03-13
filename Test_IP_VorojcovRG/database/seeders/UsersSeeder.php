<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert($this->getData());
    }
        /**
     *
     * @return array
     */
    private function getData(): array
    {
        $users = [];

        $faker = Factory::create('ru_RU');
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        $users[] = [
            'name'        => 'admin',
            'email'       => 'admin@mail.ru',
            'password'    => Hash::make('12345678'),
            'email_verified_at' => now('Europe/Moscow'),
            'created_at'  => now('Europe/Moscow')
        ];

        for ($i = 1; $i < 100; $i++) {

            $users[] = [
                'name'        => $faker->userName(),
                'email'       => $faker->email(),
                'password'    => Hash::make('12345678'),
                'email_verified_at' => now('Europe/Moscow'),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $users;
    }
}
