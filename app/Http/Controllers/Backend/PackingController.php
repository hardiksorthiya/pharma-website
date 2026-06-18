<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Packing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PackingController extends Controller
{
    public function index(): View
    {
        $packings = Packing::query()
            ->latest()
            ->paginate(10);

        return view('pages.backend.packings.index', compact('packings'));
    }

    public function create(): View
    {
        return view('pages.backend.packings.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:packings,slug'],
        ]);

        Packing::create([
            'name' => $validated['name'],
            'slug' => $this->resolveSlug($validated['slug'] ?? null, $validated['name']),
        ]);

        return redirect()
            ->route('packings.index')
            ->with('success', 'Packing created successfully.');
    }

    public function edit(Packing $packing): View
    {
        return view('pages.backend.packings.edit', compact('packing'));
    }

    public function update(Request $request, Packing $packing): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:packings,slug,'.$packing->id],
        ]);

        $packing->update([
            'name' => $validated['name'],
            'slug' => $this->resolveSlug(
                $validated['slug'] ?? null,
                $validated['name'],
                $packing->id
            ),
        ]);

        return redirect()
            ->route('packings.index')
            ->with('success', 'Packing updated successfully.');
    }

    public function destroy(Packing $packing): RedirectResponse
    {
        $packing->delete();

        return redirect()
            ->route('packings.index')
            ->with('success', 'Packing deleted successfully.');
    }

    private function resolveSlug(?string $slug, string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($slug ?: $name);

        if ($baseSlug === '') {
            $baseSlug = 'packing';
        }

        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (
            Packing::query()
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
