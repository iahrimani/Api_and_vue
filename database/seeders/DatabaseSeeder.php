<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\DeskList;
use App\Models\Task;
use Illuminate\Database\Seeder;
use App\Models\Desk;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Desk::factory(20)->create();
        DeskList::factory(60)->create();
        Card::factory(100)->create();
        Task::factory(200)->create();
    }
}
