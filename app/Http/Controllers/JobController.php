<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // This model now refers to 'works'
    public function index(Request $request)
    {
        ini_set("max_execution_time", 300);

        $works = Job::paginate(6); // or use your custom search logic

        // If there's a search query, filter the jobs
        if ($request->has('search')) {
            $works = Job::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('company', 'like', '%' . $request->search . '%')
                ->orWhere('location', 'like', '%' . $request->search . '%')
                ->paginate(6);
        } // Display 5 jobs per page
        return view('works.index', compact('works'));
    }


    /**
     * Show the form for creating a new job.
     */
    public function create()
    {
        return view('works.create'); // Ensure 'listings.create' view exists
    }

    /**
     * Store a newly created job in the database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        Job::create($validatedData);
        return redirect()->route('works.index')->with('success', 'Job created successfully!');
    }
    /**
     * Display the specified job.
     */
    public function show(Job $work)
    {
        return view('works.show', compact('work')); // Ensure 'listings.show' view exists
    }

    /**
     * Show the form for editing the specified job.
     */
    public function edit(Job $work)
    {
        return view('works.edit', compact('work')); // Ensure 'listings.edit' view exists
    }

    /**
     * Update the specified job in the database.
     */
    public function update(Request $request, Job $work)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $work->update($validatedData);
        return back()->with('success', 'Job updated successfully!');
    }
    /**
     * Remove the specified job from the database.
     */
    public function destroy(Job $work)
    {
        $work->delete();
        return redirect()->route('works.index')->with('success', 'Job deleted successfully!');
    }
    public function manage(Job $work)
    {
        return view('works.manage', compact('work'));
    }
}
