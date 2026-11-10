<?php

namespace App\Http\Controllers;

use App\Models\Ordinance;
use App\Models\Resolution;
use Illuminate\Http\Request;

class PublicSearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = trim((string) $request->input('keyword'));
        $type = $request->input('type', 'all');

        $results = collect();

        if ($type == 'all' || $type == 'ordinance') {
            $ordinances = Ordinance::where('title', 'like', '%' . $keyword . '%')->get();

            foreach ($ordinances as $ordinance) {
                $results->push([
                    'type' => 'Ordinance',
                    'number' => $ordinance->ordinance_number,
                    'title' => $ordinance->title,
                    'date_passed' => $ordinance->date_passed,
                    'author' => $ordinance->author,
                    'url' => route('public.ordinances.show', $ordinance),
                ]);
            }
        }

        if ($type == 'all' || $type == 'resolution') {
            $resolutions = Resolution::where('title', 'like', '%' . $keyword . '%')->get();

            foreach ($resolutions as $resolution) {
                $results->push([
                    'type' => 'Resolution',
                    'number' => $resolution->resolution_number,
                    'title' => $resolution->title,
                    'date_passed' => $resolution->date_passed,
                    'author' => $resolution->author,
                    'url' => route('public.resolutions.show', $resolution),
                ]);
            }
        }

        $results = $results->sortByDesc('date_passed')->values();

        return view('public.search', compact('results', 'keyword', 'type'));
    }

    public function showOrdinance(Ordinance $ordinance)
    {
        return view('public.ordinance', compact('ordinance'));
    }

    public function showResolution(Resolution $resolution)
    {
        return view('public.resolution', compact('resolution'));
    }
}
