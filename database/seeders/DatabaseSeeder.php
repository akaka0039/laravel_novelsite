<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\novels;
use App\Models\novel_info;
use App\Models\user;
use Database\Factories\NovelsFactory;
use NovelInfo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            NovelSeeder::class,
            Novel_IdSeeder::class,
        ]);

        // User::factory(100)->create();
        // novel_info::factory(100)->create();
        // Novels::factory(100)->create();
    }
}
