<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['name' => 'Londra', 'latitude' => 51.5074, 'longitude' => -0.1278],
            ['name' => 'İstanbul', 'latitude' => 41.0082, 'longitude' => 28.9784],
            ['name' => 'Ankara', 'latitude' => 39.9208, 'longitude' => 32.8541],
            ['name' => 'Paris', 'latitude' => 48.8566, 'longitude' => 2.3522],
            ['name' => 'Berlin', 'latitude' => 52.5200, 'longitude' => 13.4050],
            ['name' => 'Pekin', 'latitude' => 39.9042, 'longitude' => 116.4074],
            ['name' => 'Moskova', 'latitude' => 55.7558, 'longitude' => 37.6173],
            ['name' => 'Kiev', 'latitude' => 50.4501, 'longitude' => 30.5234],
            ['name' => 'New York', 'latitude' => 40.7128, 'longitude' => -74.0060],
            ['name' => 'Washington', 'latitude' => 38.9072, 'longitude' => -77.0369],
            ['name' => 'Erzurum', 'latitude' => 39.9043, 'longitude' => 41.2679],
            ['name' => 'Bağdat', 'latitude' => 33.3128, 'longitude' => 44.3615],
            ['name' => 'Kahire', 'latitude' => 30.0444, 'longitude' => 31.2357],
            ['name' => 'Şam', 'latitude' => 33.5138, 'longitude' => 36.2765],
            ['name' => 'Cidde', 'latitude' => 21.4858, 'longitude' => 39.1925],
            ['name' => 'Delhi', 'latitude' => 28.6139, 'longitude' => 77.2090],
            ['name' => 'Tokyo', 'latitude' => 35.6762, 'longitude' => 139.6503],
            ['name' => 'Seul', 'latitude' => 37.5665, 'longitude' => 126.9780],
            ['name' => 'Mexico City', 'latitude' => 19.4326, 'longitude' => -99.1332],
            ['name' => 'Buenos Aires', 'latitude' => -34.6037, 'longitude' => -58.3816],
            ['name' => 'Barselona', 'latitude' => 41.3851, 'longitude' => 2.1734],
            ['name' => 'Roma', 'latitude' => 41.9028, 'longitude' => 12.4964],
            ['name' => 'Atina', 'latitude' => 37.9838, 'longitude' => 23.7275],
            ['name' => 'Tahran', 'latitude' => 35.6892, 'longitude' => 51.3890],
            ['name' => 'Riyad', 'latitude' => 24.7136, 'longitude' => 46.6753],
            ['name' => 'Toronto', 'latitude' => 43.6510, 'longitude' => -79.3470],
            ['name' => 'Los Angeles', 'latitude' => 34.0522, 'longitude' => -118.2437],
            ['name' => 'Bangkok', 'latitude' => 13.7563, 'longitude' => 100.5018],
            ['name' => 'Cape Town', 'latitude' => -33.9249, 'longitude' => 18.4241],
            ['name' => 'Jakarta', 'latitude' => -6.2088, 'longitude' => 106.8456],
        ];

        Location::factory()->createMany($locations);
    }
}
