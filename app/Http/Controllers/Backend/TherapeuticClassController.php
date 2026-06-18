<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TherapeuticClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TherapeuticClassController extends Controller
{
    public function index(): View
    {
        $therapeuticClasses = TherapeuticClass::query()
            ->latest()
            ->paginate(10);

        return view('pages.backend.therapeutic-classes.index', compact('therapeuticClasses'));
    }

    public function create(): View
    {
        return view('pages.backend.therapeutic-classes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:therapeutic_classes,slug'],
        ]);

        TherapeuticClass::create([
            'name' => $validated['name'],
            'slug' => $this->resolveSlug($validated['slug'] ?? null, $validated['name']),
        ]);

        return redirect()
            ->route('therapeutic-classes.index')
            ->with('success', 'Therapeutic class created successfully.');
    }

    public function edit(TherapeuticClass $therapeuticClass): View
    {
        return view('pages.backend.therapeutic-classes.edit', compact('therapeuticClass'));
    }

    public function update(Request $request, TherapeuticClass $therapeuticClass): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:therapeutic_classes,slug,'.$therapeuticClass->id],
        ]);

        $therapeuticClass->update([
            'name' => $validated['name'],
            'slug' => $this->resolveSlug(
                $validated['slug'] ?? null,
                $validated['name'],
                $therapeuticClass->id
            ),
        ]);

        return redirect()
            ->route('therapeutic-classes.index')
            ->with('success', 'Therapeutic class updated successfully.');
    }

    public function destroy(TherapeuticClass $therapeuticClass): RedirectResponse
    {
        $therapeuticClass->delete();

        return redirect()
            ->route('therapeutic-classes.index')
            ->with('success', 'Therapeutic class deleted successfully.');
    }

    private function resolveSlug(?string $slug, string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($slug ?: $name);

        if ($baseSlug === '') {
            $baseSlug = 'therapeutic-class';
        }

        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (
            TherapeuticClass::query()
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->where('slug', $uniqueSlug)
                ->exists()
        ) {
            $uniqueSlug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $uniqueSlug;
    }
}
