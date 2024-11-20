<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Conference;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConferenceController extends Controller
{
    // Show all conferences
    public function index()
    {
        $conferences = Conference::all();
        return view('conferences.index', compact('conferences'));
    }

    // Show details of a single conference
    public function show($id)
    {
        $conference = Conference::findOrFail($id);
        return view('conferences.show', compact('conference'));
    }

    // Register for a conference
    public function register($id)
    {
        $conference = Conference::findOrFail($id);
        $user = Auth::user();

        // Check if the user has the client role
        if ($user->role !== 'client') {
            return redirect()->back()->with('error', 'Only clients can register for conferences.');
        }

        // Check if the user is already registered
        if ($user->registrations()->where('conference_id', $id)->exists()) {
            return redirect()->back()->with('error', 'You are already registered for this conference.');
        }

        // Register the user for the conference
        $user->registrations()->create([
            'conference_id' => $conference->id,
        ]);

        return redirect()->back()->with('success', 'Successfully registered for the conference!');
    }
    // Show conferences for employees
    public function employee()
    {
        $currentDate = Carbon::now();
        $endedConferences = Conference::where('datetime', '<', $currentDate)->get();
        $upcomingConferences = Conference::where('datetime', '>=', $currentDate)->get();

        return view('conferences.employee', compact('endedConferences', 'upcomingConferences'));
    }

    // Show attendees of a conference
    public function attendees($id)
    {
        $conference = Conference::findOrFail($id);
        $attendees = $conference->registrations()->with('user')->get();

        return view('conferences.attendees', compact('conference', 'attendees'));
    }

    // Show all conferences for admin
    public function adminIndex()
    {
        $conferences = Conference::all();
        return view('admin.conferences.index', compact('conferences'));
    }

    // Show the form for creating a new conference
    public function create()
    {
        return view('admin.conferences.create');
    }

    // Store a newly created conference in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'datetime' => 'required|date_format:Y-m-d\TH:i',
            'location' => 'required|string|max:255',
            'lectors' => 'required|array',
            'lectors.*.name' => 'required|string|max:255',
            'lectors.*.surname' => 'required|string|max:255',
        ]);

        $conference = Conference::create($request->only(['title', 'description', 'datetime', 'location']));

        foreach ($request->lectors as $lectorData) {
            $conference->lectors()->create($lectorData);
        }

        return redirect()->route('admin.conferences.index')->with('success', 'Conference created successfully.');
    }


    // Show the form for editing the specified conference
    public function edit(Conference $conference)
    {
        return view('admin.conferences.edit', compact('conference'));
    }

    public function update(Request $request, Conference $conference)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'datetime' => 'required|date_format:Y-m-d\TH:i',
            'location' => 'required|string|max:255',
            'lectors' => 'required|array',
            'lectors.*.name' => 'required|string|max:255',
            'lectors.*.surname' => 'required|string|max:255',
        ]);

        $conference->update($request->only(['title', 'description', 'datetime', 'location']));

        // Delete existing lectors and create new ones
        $conference->lectors()->delete();
        foreach ($request->lectors as $lectorData) {
            $conference->lectors()->create($lectorData);
        }

        return redirect()->route('admin.conferences.index')->with('success', 'Conference updated successfully.');
    }

    // Remove the specified conference from storage
    public function destroy(Conference $conference)
    {
        if ($conference->date < Carbon::now()) {
            return redirect()->route('admin.conferences.index')->with('error', 'You cannot delete a conference that has already ended.');
        }

        $conference->delete();

        return redirect()->route('admin.conferences.index')->with('success', 'Conference deleted successfully.');
    }

}
