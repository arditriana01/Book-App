<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data = [];

        for ($i = 0; $i < 500000; $i++) {
            $data[] = [
                'book_id' => rand(1, 100000),
                'rating' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now()
            ];

            if (count($data) === 1000) { // batch insert per 1000
                DB::table('ratings')->insert($data);
                $data = [];
            }
        }

        if (!empty($data)) {
            DB::table('ratings')->insert($data);
        }
    }
}
