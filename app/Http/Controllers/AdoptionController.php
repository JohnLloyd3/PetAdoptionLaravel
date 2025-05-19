<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function index()
    {
        $adoptions = Adoption::with(['adopter', 'pet'])->get();
        return response()->json($adoptions);
    }

    public function show($id)
    {
        $adoption = Adoption::with(['adopter', 'pet'])->find($id);
        if (!$adoption) {
            return response()->json(['message' => 'Adoption not found'], 404);
        }
        return response()->json($adoption);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'adopter_id' => 'required|exists:adopters,a_id',
            'pet_id' => 'required|exists:pets,p_id',
            'adoption_date' => 'nullable|date',
        ]);

        $adoption = Adoption::create($validated);
        return response()->json($adoption, 201);
    }

    public function update(Request $request, $id)
    {
        $adoption = Adoption::find($id);
        if (!$adoption) {
            return response()->json(['message' => 'Adoption not found'], 404);
        }

        $validated = $request->validate([
            'adopter_id' => 'sometimes|exists:adopters,a_id',
            'pet_id' => 'sometimes|exists:pets,p_id',
            'adoption_date' => 'nullable|date',
        ]);

        $adoption->update($validated);
        return response()->json($adoption);
    }

    public function destroy($id)
    {
        $adoption = Adoption::find($id);
        if (!$adoption) {
            return response()->json(['message' => 'Adoption not found'], 404);
        }
        $adoption->delete();
        return response()->json(['message' => 'Adoption deleted']);
    }
}
