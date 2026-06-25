<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DosageType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DosageTypeController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));

        $dosageTypes = DosageType::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.backend.dosage-types.index', compact('dosageTypes', 'search'));
    }

    public function create(): View
    {
        return view('pages.backend.dosage-types.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:dosage_types,slug'],
        ]);

        DosageType::create([
            'name' => $validated['name'],
            'slug' => $this->resolveSlug($validated['slug'] ?? null, $validated['name']),
        ]);

        return redirect()
            ->route('dosage-types.index')
            ->with('success', 'Dosage type created successfully.');
    }

    public function edit(DosageType $dosageType): View
    {
        return view('pages.backend.dosage-types.edit', compact('dosageType'));
    }

    public function update(Request $request, DosageType $dosageType): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:dosage_types,slug,'.$dosageType->id],
        ]);

        $dosageType->update([
            'name' => $validated['name'],
            'slug' => $this->resolveSlug(
                $validated['slug'] ?? null,
                $validated['name'],
                $dosageType->id
            ),
        ]);

        return redirect()
            ->route('dosage-types.index')
            ->with('success', 'Dosage type updated successfully.');
    }

    public function destroy(DosageType $dosageType): RedirectResponse
    {
        $dosageType->delete();

        return redirect()
            ->route('dosage-types.index')
            ->with('success', 'Dosage type deleted successfully.');
    }

    private function resolveSlug(?string $slug, string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($slug ?: $name);

        if ($baseSlug === '') {
            $baseSlug = 'dosage-type';
        }

        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (
            DosageType::query()
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
