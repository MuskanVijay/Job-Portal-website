<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::query();
    
        // Search by title or company
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('company', 'like', '%' . $request->search . '%');
        }
    
        // Filter by category if selected
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }
    
        // Filter by location if selected
        if ($request->has('location') && $request->location) {
            $query->where('location', $request->location);
        }
    
        // Get the results
        $jobs = $query->get();

        if ($jobs->isEmpty()) {
            session()->flash('message', 'Sorry, no jobs for you...');
            session()->flash('message_type', 'warning');
        }
    
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        // Restrict access to HR only
        if (auth()->user()->role !== 'hr') {
            abort(403, 'Unauthorized action.');
        }
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
            'description' => 'required|string',
        ]);
    
        // Create a new job listing
        Job::create([
            'title' => $request->title,
            'company' => $request->company,
            'category' => $request->category,
            'location' => $request->location,
            'salary' => $request->salary,
            'description' => $request->description,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    public function show($id)
{
    // Fetch the job by its ID
    $job = Job::findOrFail($id);

    // Pass the job data to the view
    return view('profile.show', compact('job'));
}


    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
        ]);

        $job->update($request->all());
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }

    public function apply(Request $request, Job $job)
    {
        // Restrict access to candidates only
        if (auth()->user()->role !== 'candidate') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'cover_letter' => 'required|string',
        ]);

        JobApplication::create([
            'job_id' => $job->id,
            'user_id' => auth()->id(),
            'cover_letter' => $request->cover_letter,
        ]);

        return back()->with('success', 'Application submitted successfully.');
    }
}
