<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use SebastianBergmann\FileIterator\Factory;

class UserTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(300)->create();
    }
}
