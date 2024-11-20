<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conference;
use Carbon\Carbon;
use App\Models\Lector;

class ConferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 2 ended conferences with lectors
        $endedConferences = [
            [
                'title' => 'Ended Conference 1',
                'description' => 'Description for ended conference 1',
                'date' => Carbon::now()->subDays(10), // 10 days ago
                'location' => 'Location 1',
            ],
            [
                'title' => 'Ended Conference 2',
                'description' => 'Description for ended conference 2',
                'date' => Carbon::now()->subDays(5), // 5 days ago
                'location' => 'Location 2',
            ],
        ];

        foreach ($endedConferences as $conferenceData) {
            $conference = Conference::create($conferenceData);
            $this->createLectors($conference);
        }

        // Create 8 upcoming conferences with lectors
        for ($i = 1; $i <= 8; $i++) {
            $conference = Conference::create([
                'title' => 'Upcoming Conference ' . $i,
                'description' => 'Description for upcoming conference ' . $i,
                'date' => Carbon::now()->addDays($i), // i days from now
                'location' => 'Location ' . ($i + 2),
            ]);
            $this->createLectors($conference);
        }
    }

    /**
     * Create lectors for a given conference.
     *
     * @param \App\Models\Conference $conference
     * @return void
     */
    private function createLectors(Conference $conference)
    {
        Lector::create([
            'conference_id' => $conference->id,
            'name' => 'Lector Name 1',
            'surname' => 'Lector Surname 1',
        ]);

        // Add more lectors if needed
        // Lector::create([
        //     'conference_id' => $conference->id,
        //     'name' => 'Lector Name 2',
        //     'surname' => 'Lector Surname 2',
        // ]);
    }
}
