<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ResumeApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ResumeApplicationController extends Controller
{
    public function index(): View
    {
        $applications = ResumeApplication::query()
            ->latest()
            ->paginate(15);

        return view('pages.backend.resume-applications.index', compact('applications'));
    }

    public function show(ResumeApplication $resumeApplication): View
    {
        return view('pages.backend.resume-applications.show', [
            'application' => $resumeApplication,
        ]);
    }

    public function destroy(ResumeApplication $resumeApplication): RedirectResponse
    {
        Storage::disk('public')->delete($resumeApplication->resume_path);
        $resumeApplication->delete();

        return redirect()
            ->route('resume-applications.index')
            ->with('success', 'Resume application deleted successfully.');
    }
}
