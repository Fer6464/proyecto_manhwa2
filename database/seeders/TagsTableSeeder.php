<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{

    public function run()
    {
        $tags = ['Acción', 'Romance', 'Fantasía', 'Drama', 'Comedia', 'Aventura'];

        foreach ($tags as $tag) {
            Tag::firstOrCreate(['nombre' => $tag]);
        }
    }
}
