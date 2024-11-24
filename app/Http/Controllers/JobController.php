<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
        ]);
    
        Job::create($request->all());
    
        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }
    
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
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
public function destroy(Job $job)
{
    $job->delete();

    return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
}

}
