<?php

namespace App\Http\Controllers;

use App\Models\ActivityUpdate;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->get('end_date', Carbon::now()->endOfMonth()->toDateString());

        $updates = ActivityUpdate::with('activity', 'user')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('reports.index', compact('updates', 'startDate', 'endDate'));
    }
}
