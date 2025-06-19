<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function index()
    {
        // Fetch all activity logs
        $logs = Activity::latest()->paginate(10); // Paginate for better performance

        return view('activity-log.index', compact('logs'));
    }
}
