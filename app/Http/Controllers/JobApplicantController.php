<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplicant;

use Illuminate\Http\Request;

class JobApplicantController extends Controller
{
    public function index($workId)
    {
        $work = Job::findOrFail($workId);
        $applicants = $work->applicants()->paginate(10);
        return view('job_applicants.index', compact('work', 'applicants'));
    }

    public function create($jobId)
    {
        $work = Job::findOrFail($jobId);
        return view('job_applicants.create', compact('work'));
    }


    public function store(Request $request, $jobId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $job = Job::find($jobId);
        if (!$job) {
            return redirect()->back()->with('error', 'Job not found.');
        }

        if ($request->hasFile('resume')) {
            $validated['resume'] = $request->file('resume')->store('resumes');
        }

        $validated['job_id'] = $jobId;
        JobApplicant::create($validated);

        return redirect()->route('job_applicants.index', $jobId)->with('success', 'Application submitted successfully!');
    }

    public function destroy($id)
    {
        $applicant = JobApplicant::findOrFail($id);
        $applicant->delete();

        return back()->with('success', 'Applicant deleted successfully!');
    }
}
