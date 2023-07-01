<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\User;
use App\Models\Author;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Genre::insert([
        ['name'=>'Фантастика'],
        ['name'=>'Приключенчиская'],
        ['name'=>'Детектив'],
        ['name'=>'Роман'],
        ]);
        Author::factory(10)->create();
        User::insert([
            'name' => 'Vadim',
            'email' => 'admin@mail.ru',
            'password'=>Hash::make('12345678'),
            'role'=>'Admin'
        ]);
    }
}
