<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityUpdate;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->subYear()->startOfMonth()->toDateString());
        $endDate = $request->get('end_date', Carbon::now()->endOfMonth()->toDateString());

        $query = ActivityUpdate::with('activity', 'user')
            ->whereBetween('created_at', [$startDate, $endDate]);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $updates = $query->orderBy('created_at', 'desc')->get();

        $activities = Activity::all();
        $users = User::all();

        return view('reports.index', compact('updates', 'activities', 'users', 'startDate', 'endDate'));
    }
}
