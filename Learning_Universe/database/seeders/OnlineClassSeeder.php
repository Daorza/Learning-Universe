<?php

namespace Database\Seeders;

use App\Models\OnlineClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OnlineClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        OnlineClass::factory()->count(10)->create();
    }
}
