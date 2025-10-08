<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Comedia',
            'description' => 'Libros para reír y disfrutar.',
            'is_active' => true,
        ]);

        Genre::create([
            'name' => 'Drama',
            'description' => 'Libros para reflexionar y sentir.',
            'is_active' => true,
        ]);

        Genre::create([
            'name' => 'Fantasía',
            'description' => 'Libros para soñar y escapar de la realidad.',
            'is_active' => true,
        ]);

        Genre::create([
            'name' => 'Ciencia Ficción',
            'description' => 'Libros para explorar el futuro y la tecnología.',
            'is_active' => true,
        ]);

        Genre::create([
            'name' => 'Misterio',
            'description' => 'Libros para resolver enigmas y descubrir secretos.',
            'is_active' => true,
        ]);
    }
}
