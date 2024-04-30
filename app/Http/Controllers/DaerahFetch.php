<?php
namespace App\Http\Controllers;

use App\Models\MasterDaerah;
use App\Models\Master\MasterState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DaerahFetch extends Controller

{
    /**
     * Get regions (daerah) based on the selected state.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function getRegionsByState(Request $request)
{
    // Retrieve the state code from the request
    $stateCode = $request->input('state_name');

    // Log the received state code for debugging
    Log::info('Received state code: ' . $stateCode);

    // Query the regions (daerah) associated with the state code
    $regions = MasterDaerah::where('neg_kod', $stateCode)->get();
    Log::info('Received region code: ' . $regions);
    // Check if any regions are found
    if ($regions->isNotEmpty()) {
        // Return the regions as JSON
        return response()->json($regions);
    } else {
        // Handle case where no regions are found
        return response()->json(['error' => 'No regions found for the state code'], 404);
    }
}
}