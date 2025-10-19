<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::create([
            'name' => 'Daily SMS count in comparison to SMScount from logs',
            'description' => 'Compare daily SMS counts with logs to ensure accuracy.',
            'status' => 'pending',
        ]);

        Activity::create([
            'name' => 'Server uptime monitoring',
            'description' => 'Monitor server uptime and log any downtime.',
            'status' => 'pending',
        ]);

        Activity::create([
            'name' => 'User feedback review',
            'description' => 'Review and categorize user feedback from the support portal.',
            'status' => 'pending',
        ]);
    }
}
