<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Specification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SpecificationController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));

        $specifications = Specification::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.backend.specifications.index', compact('specifications', 'search'));
    }

    public function create(): View
    {
        return view('pages.backend.specifications.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:specifications,slug'],
        ]);

        Specification::create([
            'name' => $validated['name'],
            'slug' => $this->resolveSlug($validated['slug'] ?? null, $validated['name']),
        ]);

        return redirect()
            ->route('specifications.index')
            ->with('success', 'Specification created successfully.');
    }

    public function edit(Specification $specification): View
    {
        return view('pages.backend.specifications.edit', compact('specification'));
    }

    public function update(Request $request, Specification $specification): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:specifications,slug,'.$specification->id],
        ]);

        $specification->update([
            'name' => $validated['name'],
            'slug' => $this->resolveSlug(
                $validated['slug'] ?? null,
                $validated['name'],
                $specification->id
            ),
        ]);

        return redirect()
            ->route('specifications.index')
            ->with('success', 'Specification updated successfully.');
    }

    public function destroy(Specification $specification): RedirectResponse
    {
        $specification->delete();

        return redirect()
            ->route('specifications.index')
            ->with('success', 'Specification deleted successfully.');
    }

    private function resolveSlug(?string $slug, string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($slug ?: $name);

        if ($baseSlug === '') {
            $baseSlug = 'specification';
        }

        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (
            Specification::query()
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
