<?php

namespace App\Http\Controllers;

use App\Models\Adopter;
use Illuminate\Http\Request;

class AdopterController extends Controller
{
    public function index()
    {
        $adopters = Adopter::all();
        return response()->json($adopters);
    }

    public function show($id)
    {
        $adopter = Adopter::find($id);
        if (!$adopter) {
            return response()->json(['message' => 'Adopter not found'], 404);
        }
        return response()->json($adopter);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'u_id' => 'required|exists:users,id',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email|unique:adopters,email',
            'contact_number' => 'required|string',
        ]);

        $adopter = Adopter::create($validated);
        return response()->json($adopter, 201);
    }

    public function update(Request $request, $id)
    {
        $adopter = Adopter::find($id);
        if (!$adopter) {
            return response()->json(['message' => 'Adopter not found'], 404);
        }

        $validated = $request->validate([
            'u_id' => 'sometimes|exists:users,id',
            'firstname' => 'sometimes|string',
            'lastname' => 'sometimes|string',
            'username' => 'sometimes|string',
            'email' => 'sometimes|email|unique:adopters,email,' . $id . ',a_id',
            'contact_number' => 'sometimes|string',
        ]);

        $adopter->update($validated);
        return response()->json($adopter);
    }

    public function destroy($id)
    {
        $adopter = Adopter::find($id);
        if (!$adopter) {
            return response()->json(['message' => 'Adopter not found'], 404);
        }
        $adopter->delete();
        return response()->json(['message' => 'Adopter deleted']);
    }
}
