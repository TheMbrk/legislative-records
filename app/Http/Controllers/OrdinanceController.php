<?php

namespace App\Http\Controllers;

use App\Models\Ordinance;
use Illuminate\Http\Request;

class OrdinanceController extends Controller
{
    public function index(Request $request)
    {
        $query = Ordinance::query();

        if ($request->filled('ordinance_number')) {
            $query->where('ordinance_number', 'like', '%' . $request->ordinance_number . '%');
        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('date_passed')) {
            $query->whereDate('date_passed', $request->date_passed);
        }

        $ordinances = $query->orderBy('date_passed', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.ordinances.index', compact('ordinances'));
    }

    public function create()
    {
        return view('admin.ordinances.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ordinance_number' => 'required|string|max:50|unique:ordinances,ordinance_number',
            'title' => 'required|string|max:255',
            'date_passed' => 'required|date',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Ordinance::create($data);

        return redirect()->route('admin.ordinances.index')
            ->with('success', 'Ordinance added successfully.');
    }

    public function show(Ordinance $ordinance)
    {
        return view('admin.ordinances.show', compact('ordinance'));
    }

    public function edit(Ordinance $ordinance)
    {
        return view('admin.ordinances.edit', compact('ordinance'));
    }

    public function update(Request $request, Ordinance $ordinance)
    {
        $data = $request->validate([
            'ordinance_number' => 'required|string|max:50|unique:ordinances,ordinance_number,' . $ordinance->id,
            'title' => 'required|string|max:255',
            'date_passed' => 'required|date',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $ordinance->update($data);

        return redirect()->route('admin.ordinances.show', $ordinance)
            ->with('success', 'Ordinance updated successfully.');
    }

    public function destroy(Ordinance $ordinance)
    {
        $ordinance->delete();

        return redirect()->route('admin.ordinances.index')
            ->with('success', 'Ordinance deleted successfully.');
    }
}
