<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('movies')->truncate();

        $movies = [
            [
                'title' => 'The Godfather',
                'slug' => 'the-godfather',
                'description' => 'An organized crime dynasty\'s aging patriarch transfers control of his clandestine empire to his reluctant son.',
                'director' => 'Francis Ford Coppola',
                'writers' => 'Mario Puzo (screenplay), Francis Ford Coppola (screenplay), Mario Puzo (novel)',
                'stars' => 'Marlon Brando, Al Pacino, James Caan',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg',
                'release_date' => '1972-03-24',
                'duration' => 175,
                'url_720' => 'https://www.sample-videos.com/video/mp4/720/big_buck_bunny_720p_20mb.mp4',
                'url_1080' => 'https://www.sample-videos.com/video/mp4/1080/big_buck_bunny_1080p_20mb.mp4',
                'url_4k' => 'https://www.sample-videos.com/video/mp4/4k/big_buck_bunny_4k_20mb.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Shawshank Redemption',
                'slug' => 'the-shawshank-redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'director' => 'Frank Darabont',
                'writers' => 'Stephen King (screenplay), Frank Darabont (screenplay), Stephen King (novel)',
                'stars' => 'Tim Robbins, Morgan Freeman, Bob Gunton',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BMDFkYTc0MGEtZmNhMC00ZDIzLWFmNTEtODM1ZmRlYWMwMWFmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg',
                'release_date' => '1994-09-23',
                'duration' => 142,
                'url_720' => 'https://www.sample-videos.com/video/mp4/720/big_buck_bunny_720p_20mb.mp4',
                'url_1080' => 'https://www.sample-videos.com/video/mp4/1080/big_buck_bunny_1080p_20mb.mp4',
                'url_4k' => 'https://www.sample-videos.com/video/mp4/4k/big_buck_bunny_4k_20mb.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Dark Knight',
                'slug' => 'the-dark-knight',
                'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of his greatest challenges as a dark knight.',
                'director' => 'Christopher Nolan',
                'writers' => 'Jonathan Nolan, Christopher Nolan',
                'stars' => 'Christian Bale, Heath Ledger, Aaron Eckhart',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SX300.jpg',
                'release_date' => '2008-07-18',
                'duration' => 152,
                'url_720' => 'https://www.sample-videos.com/video/mp4/720/big_buck_bunny_720p_20mb.mp4',
                'url_1080' => 'https://www.sample-videos.com/video/mp4/1080/big_buck_bunny_1080p_20mb.mp4',
                'url_4k' => 'https://www.sample-videos.com/video/mp4/4k/big_buck_bunny_4k_20mb.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('movies')->insert($movies);

        Schema::enableForeignKeyConstraints();
    }
}
