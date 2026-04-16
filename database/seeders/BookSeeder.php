<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'year' => 2008,
                'description' => 'Software engineering best practice',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'The Pragmatic Programmer',
                'author' => 'Andrew Hunt',
                'year' => 1999,
                'description' => 'Programming principles',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}