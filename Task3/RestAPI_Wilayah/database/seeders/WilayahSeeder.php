<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Wilayah;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://wilayah.id/api/provinces.json');
        $data = $response->json()['data'];

        foreach ($data as $wilayah) {
            Wilayah::create([
                'code' => $wilayah['code'],
                'name' => $wilayah['name'],
                'coordinate' => json_encode([
                    'lat' => $wilayah['coordinates']['lat'],
                    'lng' => $wilayah['coordinates']['lng']
                ]),
                'google_place_id' => $wilayah['google_place_id']
            ]);
        }
    }
}