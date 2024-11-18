<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Conference;

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
}
