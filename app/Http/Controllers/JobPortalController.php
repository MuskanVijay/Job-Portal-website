<?php
namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobPortalController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'] ?? 'candidate',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $profile = Auth::user()->profile;

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('uploads/cv', 'public');
            $profile->cv = $cvPath;
        }

        if ($request->hasFile('cover_letter')) {
            $coverLetterPath = $request->file('cover_letter')->store('uploads/cover_letters', 'public');
            $profile->cover_letter = $coverLetterPath;
        }

        $profile->save();
        return redirect()->route('profile.edit')->with('success', 'Files uploaded successfully!');
    }

    public function show($id)
    {
        $profile = Profile::where('user_id', $id)->first();
    
        if (!$profile) {
            abort(404, 'Profile not found');
        }
    
        return view('profile.show', compact('profile'));
    }
    public function jobListings(Request $request)
{
    $query = Job::query();

    // Apply search filter if any
    if ($request->has('search') && !empty($request->search)) {
        $query->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('company', 'like', '%' . $request->search . '%')
              ->orWhere('location', 'like', '%' . $request->search . '%');
    }

    // Apply category filter if selected
    if ($request->has('category') && !empty($request->category)) {
        $query->where('category', $request->category);
    }

    // Apply location filter if selected
    if ($request->has('location') && !empty($request->location)) {
        $query->where('location', $request->location);
    }

    // Get the jobs based on the query filters
    $jobs = $query->get();
    return view('job-listings', compact('jobs'));
}

}
