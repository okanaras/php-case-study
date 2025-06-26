<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckRouteRequest;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Models\Location;
use App\Services\LocationService;
use Inertia\Inertia;

class LocationController extends Controller
{
    public function __construct(public LocationService $locationService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::query()->orderBy('id', 'DESC')->paginate(10);

        return Inertia::render('Location/Index', [
            'locations' => $locations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Location/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $validated = $request->validated();

        $location = Location::create([
            'name' => $validated['name'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'color_hex' => $validated['color_hex'],
        ]);

        return redirect()->route('locations.edit', $location)->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return Inertia::render('Location/Show', [
            'location' => $location,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return Inertia::render('Location/Edit', [
            'location' => $location,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $validated = $request->validated();

        $location->update([
            'name' => $validated['name'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'color_hex' => $validated['color_hex'],
        ]);

        return redirect()->route('locations.edit', $location)->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }

    public function route(CheckRouteRequest $request)
    {
        $validated = $request->validated();

        $nearestLocation = $this->locationService->findNearestLocation($validated['latitude'], $validated['longitude']);

        /**
         * Db raw versiyonu.
         * Buyuk veri setlerinde daha performansli olabilir. Sql sorgulu hesaplamasi da php tarafindaki hesaplamasi da yapay zekadan alindi.
         */
        // $nearestLocation = $this->locationService->findNearestLocationDBRaw($validated['latitude'], $validated['longitude']);

        if (! $nearestLocation) {
            return response()->json(['message' => 'No locations found.'], 404);
        }

        $distance = round($nearestLocation['distance'], 2).' km';

        unset($nearestLocation['distance']);

        $response = [
            'from' => ['latitude' => $validated['latitude'], 'longitude' => $validated['longitude']],
            'to' => $nearestLocation,
            'distance' => $distance,
        ];

        return response()->json($response);
    }
}
