<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function edit(): View
    {
        $settings = Setting::current();

        return view('pages.backend.settings.edit', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string'],
            'map_embed_url' => ['nullable', 'string'],
            'logo' => ['nullable', 'file', 'mimes:jpeg,jpg,png,webp,svg', 'max:2048'],
            'favicon' => ['nullable', 'file', 'mimes:jpeg,jpg,png,webp,ico,svg', 'max:1024'],
        ]);

        $settings = Setting::current();

        $data = [
            'phone' => $validated['phone'] ?? null,
            'email' => $validated['email'] ?? null,
            'address' => $validated['address'] ?? null,
            'map_embed_url' => $this->parseMapEmbedInput($validated['map_embed_url'] ?? null),
        ];

        if ($request->hasFile('logo')) {
            if ($settings->logo) {
                Storage::disk('public')->delete($settings->logo);
            }

            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('favicon')) {
            if ($settings->favicon) {
                Storage::disk('public')->delete($settings->favicon);
            }

            $data['favicon'] = $request->file('favicon')->store('settings', 'public');
        }

        $settings->update($data);

        return redirect()
            ->route('settings.edit')
            ->with('success', 'Settings updated successfully.');
    }

    private function parseMapEmbedInput(?string $value): ?string
    {
        if (! $value) {
            return null;
        }

        $value = trim($value);

        if (preg_match('/src=["\']([^"\']+)["\']/', $value, $matches)) {
            return $matches[1];
        }

        return $value;
    }
}
