<?php
namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    public function apply(Request $request, Job $job)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user has a profile with CV uploaded
        if (!$user->profile || !$user->profile->cv) {
            // If no profile or CV, redirect to profile creation page
            return redirect()->route('profile.create')->with('warning', 'Please create your profile and upload your CV first.');
        }

        // Validate the incoming request for CV and Cover Letter uploads
        $request->validate([
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // CV file validation (optional since profile is required)
            'cover_letter' => 'required|file|mimes:pdf,doc,docx|max:2048', // Cover letter file validation
        ]);

        // Handle file uploads (if applicable)
        $cvPath = $request->file('cv') ? $request->file('cv')->store('uploads/cvs', 'public') : $user->profile->cv;
        $coverLetterPath = $request->file('cover_letter')->store('uploads/cover_letters', 'public');

        // Create a new job application entry
        $application = new JobApplication();
        $application->user_id = $user->id;
        $application->job_id = $job->id;
        $application->cv_path = $cvPath;
        $application->cover_letter_path = $coverLetterPath;

        // Save the job application to the database
        $application->save();

        // Redirect to the job listings page with a success message
        return redirect()->route('jobs.index')->with('success', 'Application submitted successfully!');
    }
}
