<?php

namespace App\Http\Controllers;

use App\Models\Resolution;
use Illuminate\Http\Request;

class ResolutionController extends Controller
{
    public function index(Request $request)
    {
        $query = Resolution::query();

        if ($request->filled('resolution_number')) {
            $query->where('resolution_number', 'like', '%' . $request->resolution_number . '%');
        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('date_passed')) {
            $query->whereDate('date_passed', $request->date_passed);
        }

        $resolutions = $query->orderBy('date_passed', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.resolutions.index', compact('resolutions'));
    }

    public function create()
    {
        return view('admin.resolutions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'resolution_number' => 'required|string|max:50|unique:resolutions,resolution_number',
            'title' => 'required|string|max:255',
            'date_passed' => 'required|date',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Resolution::create($data);

        return redirect()->route('admin.resolutions.index')
            ->with('success', 'Resolution added successfully.');
    }

    public function show(Resolution $resolution)
    {
        return view('admin.resolutions.show', compact('resolution'));
    }

    public function edit(Resolution $resolution)
    {
        return view('admin.resolutions.edit', compact('resolution'));
    }

    public function update(Request $request, Resolution $resolution)
    {
        $data = $request->validate([
            'resolution_number' => 'required|string|max:50|unique:resolutions,resolution_number,' . $resolution->id,
            'title' => 'required|string|max:255',
            'date_passed' => 'required|date',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $resolution->update($data);

        return redirect()->route('admin.resolutions.show', $resolution)
            ->with('success', 'Resolution updated successfully.');
    }

    public function destroy(Resolution $resolution)
    {
        $resolution->delete();

        return redirect()->route('admin.resolutions.index')
            ->with('success', 'Resolution deleted successfully.');
    }
}
