<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('test1234'),
        ]);

        WeightTarget::factory()->create([
            'user_id' => $user->id,
        ]);

        WeightLog::factory()->count(50)->create([
            'user_id' => $user->id,
        ]);
    }
}
