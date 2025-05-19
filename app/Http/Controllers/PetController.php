<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        return response()->json($pets);
    }

    public function show($id)
    {
        $pet = Pet::find($id);
        if (!$pet) {
            return response()->json(['message' => 'Pet not found'], 404);
        }
        return response()->json($pet);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'u_id' => 'required|exists:users,id',
            'p_name' => 'required|string',
            'p_size' => 'required|string',
            'p_age' => 'required|integer',
            'p_breed' => 'required|string',
            'p_type' => 'required|string',
        ]);

        $pet = Pet::create($validated);
        return response()->json($pet, 201);
    }

    public function update(Request $request, $id)
    {
        $pet = Pet::find($id);
        if (!$pet) {
            return response()->json(['message' => 'Pet not found'], 404);
        }

        $validated = $request->validate([
            'u_id' => 'sometimes|exists:users,id',
            'p_name' => 'sometimes|string',
            'p_size' => 'sometimes|string',
            'p_age' => 'sometimes|integer',
            'p_breed' => 'sometimes|string',
            'p_type' => 'sometimes|string',
        ]);

        $pet->update($validated);
        return response()->json($pet);
    }

    public function destroy($id)
    {
        $pet = Pet::find($id);
        if (!$pet) {
            return response()->json(['message' => 'Pet not found'], 404);
        }
        $pet->delete();
        return response()->json(['message' => 'Pet deleted']);
    }
}
