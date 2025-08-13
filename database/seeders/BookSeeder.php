<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data = [];

        for ($i = 0; $i < 100000; $i++) {
            $data[] = [
                'author_id' => rand(1, 1000),
                'category_id' => rand(1, 3000),
                'title' => $faker->sentence(3),
                'created_at' => now(),
                'updated_at' => now()
            ];

            if (count($data) === 1000) {
                DB::table('books')->insert($data);
                $data = [];
            }
        }

        if (!empty($data)) {
            DB::table('books')->insert($data);
        }
    }
}
