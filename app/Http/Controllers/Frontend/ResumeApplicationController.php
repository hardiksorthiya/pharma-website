<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ResumeApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ResumeApplicationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'position' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:2000'],
            'resume' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
        ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');

        ResumeApplication::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'position' => $validated['position'] ?? null,
            'message' => $validated['message'] ?? null,
            'resume_path' => $resumePath,
        ]);

        return redirect()
            ->route('frontend.careers.index')
            ->with('resume_success', 'Thank you! Your resume has been submitted successfully. Our HR team will contact you soon.');
    }
}
