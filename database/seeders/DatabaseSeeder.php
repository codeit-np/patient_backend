<?php
namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

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
            UserFactory::class,
            HospitalSeeder::class,
            ]);
    }
}