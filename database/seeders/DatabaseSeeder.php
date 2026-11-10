<?php

namespace Database\Seeders;

use App\Models\Ordinance;
use App\Models\Resolution;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Administrator', 'password' => 'password']
        );

        $ordinances = [
            ['001-2025', 'An Ordinance Establishing the Provincial Environment Code', '2025-02-11', 'Hon. Juan Dela Cruz'],
            ['002-2025', 'An Ordinance Regulating the Use of Plastic Bags in the Province', '2025-03-18', 'Hon. Maria Santos'],
            ['003-2025', 'An Ordinance Creating the Provincial Agriculture and Fisheries Council', '2025-05-06', 'Hon. Pedro Reyes'],
            ['004-2025', 'An Ordinance Providing Incentives for Local Tourism Enterprises', '2025-07-22', 'Hon. Ana Garcia'],
            ['001-2026', 'An Ordinance Adopting the Provincial Road Safety Code', '2026-01-13', 'Hon. Juan Dela Cruz'],
        ];

        foreach ($ordinances as $row) {
            Ordinance::firstOrCreate(
                ['ordinance_number' => $row[0]],
                ['title' => $row[1], 'date_passed' => $row[2], 'author' => $row[3]]
            );
        }

        $resolutions = [
            ['015-2025', 'A Resolution Supporting the Agriculture Modernization Program', '2025-02-25', 'Hon. Pedro Reyes'],
            ['032-2025', 'A Resolution Commending the Provincial Disaster Response Team', '2025-04-08', 'Hon. Maria Santos'],
            ['047-2025', 'A Resolution Authorizing the Governor to Sign a Memorandum of Agreement on Environment Protection', '2025-06-17', 'Hon. Ana Garcia'],
            ['060-2025', 'A Resolution Approving the Annual Investment Program', '2025-09-30', 'Hon. Juan Dela Cruz'],
            ['004-2026', 'A Resolution Requesting Additional Funding for Farm-to-Market Roads', '2026-02-03', 'Hon. Pedro Reyes'],
        ];

        foreach ($resolutions as $row) {
            Resolution::firstOrCreate(
                ['resolution_number' => $row[0]],
                ['title' => $row[1], 'date_passed' => $row[2], 'author' => $row[3]]
            );
        }
    }
}
