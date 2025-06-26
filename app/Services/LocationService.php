<?php

namespace App\Services;

use App\Models\Location;
use Illuminate\Support\Facades\DB;

class LocationService
{
    public function findNearestLocationDBRaw(float $latitude, float $longitude): ?array
    {
        $earthRadius = 6371;

        $result = DB::table('locations')
            ->select(
                'latitude',
                'longitude',
                DB::raw("(
                $earthRadius * acos(
                    cos(radians($latitude)) *
                    cos(radians(latitude)) *
                    cos(radians(longitude) - radians($longitude)) +
                    sin(radians($latitude)) *
                    sin(radians(latitude))
                )
            ) AS distance")
            )
            ->orderBy('distance')
            ->first();

        return $result ? (array) $result : null;
    }

    public function findNearestLocation(float $latitude, float $longitude): ?array
    {
        $from = ['latitude' => $latitude, 'longitude' => $longitude];
        $locations = Location::all();

        $nearest = $locations->map(function (Location $location) use ($from) {
            $location->distance = $this->haversine($from['latitude'], $from['longitude'], $location->latitude, $location->longitude);

            return $location;
        })->sortBy('distance')->select(['latitude', 'longitude', 'distance'])->first();

        return $nearest;
    }

    private function haversine(float $lat1, float $lon1, float $lat2, float $lon2): float
    {
        $earthRadius = 6371;

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            sin($dLon / 2) * sin($dLon / 2) * cos($lat1) * cos($lat2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }
}
