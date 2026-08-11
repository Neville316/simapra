<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $query = ActivityLog::with('user.role')->latest();

        // Jika bukan admin, hanya bisa melihat riwayatnya sendiri
        if (!$user->isAdmin()) {
            $query->where('user_id', $user->id);
        }

        $logs = $query->paginate(20);

        return view('activity-log.index', compact('logs'));
    }
}
