<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function get_province()
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY'),
        ])->get('https://api.rajaongkir.com/starter/province');

        return response()->json($response->json());
    }

    public function get_city(Request $request)
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY'),
        ])->get("https://api.rajaongkir.com/starter/city?province=$request->province");

        return response()->json($response->json());
    }

    public function get_cost(Request $request)
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY'),
        ])->post("https://api.rajaongkir.com/starter/cost", [
                    'origin' => env('RAJAONGKIR_ORIGIN_ID'),
                    'destination' => $request->destination,
                    'weight' => $request->weight,
                    'courier' => $request->courier
                ]);
        return response()->json($response->json());
    }
}