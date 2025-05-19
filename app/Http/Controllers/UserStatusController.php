<?php

namespace App\Http\Controllers;

use App\Models\UserStatus;
use Illuminate\Http\Request;

class UserStatusController extends Controller
{
    public function index()
    {
        $statuses = UserStatus::all();
        return response()->json($statuses);
    }

    public function show($id)
    {
        $status = UserStatus::find($id);
        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }
        return response()->json($status);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'status_name' => 'required|string|unique:user_statuses,status_name',
        ]);

        $status = UserStatus::create($validated);
        return response()->json($status, 201);
    }

    public function update(Request $request, $id)
    {
        $status = UserStatus::find($id);
        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }

        $validated = $request->validate([
            'status_name' => 'required|string|unique:user_statuses,status_name,' . $id,
        ]);

        $status->update($validated);
        return response()->json($status);
    }

    public function destroy($id)
    {
        $status = UserStatus::find($id);
        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }
        $status->delete();
        return response()->json(['message' => 'Status deleted']);
    }
}
