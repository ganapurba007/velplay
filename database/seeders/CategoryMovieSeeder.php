<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategoryMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('category_movie')->truncate();

        $CategoryIds = DB::table('categories')->pluck('id')->toArray();
        $MovieIds = DB::table('movies')->pluck('id')->toArray();

        foreach ($MovieIds as $MovieId) {
            $randomCategories = array_rand($CategoryIds, rand(1, 3));
            $randomCategorie = (array) $randomCategories;
            foreach ($randomCategorie as $CategoryId) {
                DB::table('category_movie')->insert([
                    'category_id' => $CategoryIds[$CategoryId],
                    'movie_id' => $MovieId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


        Schema::enableForeignKeyConstraints();
    }
}
