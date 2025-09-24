<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SchoolResource;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(Request $request)
    {
        $query = School::with(['sector', 'type', 'governingBody', 'locations.state', 'programs']);

        if ($request->filled('state')) {
            $query->whereHas('locations.state', function ($q) use ($request) {
                $q->where('state_code', strtoupper($request->state));
            });
        }

        if ($request->filled('sector')) {
            $query->whereHas('sector', function ($q) use ($request) {
                $q->where('sector_name', ucfirst(strtolower($request->sector)));
            });
        }

        if ($request->filled('type')) {
            $query->whereHas('type', function ($q) use ($request) {
                $q->where('type_name', ucfirst(strtolower($request->type)));
            });
        }

        return SchoolResource::collection($query->paginate(20));
    }

    public function show($id)
    {
        $school = School::with(['sector', 'type', 'governingBody', 'locations.state', 'enrolments', 'programs'])
            ->findOrFail($id);

        return new SchoolResource($school);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'official_name' => 'required|string|max:255',
            'common_name' => 'nullable|string|max:255',
            'sector_id' => 'required|exists:school_sectors,id',
            'type_id' => 'required|exists:school_types,id',
            'governing_body_id' => 'nullable|exists:governing_bodies,id',
            'established_year' => 'nullable|integer',
            'website' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
        ]);

        $school = School::create($data);

        return (new SchoolResource($school))->response()->setStatusCode(201);
    }

    public function update(Request $request, $id)
    {
        $school = School::findOrFail($id);

        $data = $request->validate([
            'official_name' => 'sometimes|required|string|max:255',
            'common_name' => 'nullable|string|max:255',
            'sector_id' => 'sometimes|required|exists:school_sectors,id',
            'type_id' => 'sometimes|required|exists:school_types,id',
            'governing_body_id' => 'nullable|exists:governing_bodies,id',
            'established_year' => 'nullable|integer',
            'website' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
        ]);

        $school->update($data);

        return new SchoolResource($school);
    }

    public function destroy($id)
    {
        $school = School::findOrFail($id);
        $school->delete();

        return response()->json(['message' => 'School deleted successfully']);
    }
}
