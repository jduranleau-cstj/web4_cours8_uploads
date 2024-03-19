<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $photo = new Photo();
        $photo->titre = "Un chat";
        $photo->url = "uploads/chat-seeder.webp";
        $photo->save();
    }
}
