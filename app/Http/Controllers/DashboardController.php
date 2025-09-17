<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Report;
use App\Models\Unit;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function indexpublic()
    {
        // === Warning Notifications ===
        $warnings = Component::with('unit')
            ->whereColumn('hm_current', '>=', 'hm_new') // sudah habis umur
            ->orWhereRaw('hm_current >= hm_new * 0.9') // sudah 90% dari limit
            ->get();

        // === Reminder Notifications ===
        $reminders = Component::with('unit')
            ->whereDoesntHave('reports', function ($q) {
                $q->where('jenis', 'measurement')
                  ->where('datetime', '>=', Carbon::now()->subDays(7));
            })
            ->get();

        // === Categories ===
        $categories = Unit::select('category')
            ->distinct()
            ->get();

        return view('public-dashboard', compact('warnings', 'reminders', 'categories'));
    }
    public function index()
    {
        // === Warning Notifications ===
        $warnings = Component::with('unit')
            ->whereColumn('hm_current', '>=', 'hm_new') // sudah habis umur
            ->orWhereRaw('hm_current >= hm_new * 0.9') // sudah 90% dari limit
            ->get();

        // === Reminder Notifications ===
        $reminders = Component::with('unit')
            ->whereDoesntHave('reports', function ($q) {
                $q->where('jenis', 'measurement')
                  ->where('datetime', '>=', Carbon::now()->subDays(7));
            })
            ->get();

        // === Categories ===
        $categories = Unit::select('category')
            ->distinct()
            ->get();

        return view('dashboard', compact('warnings', 'reminders', 'categories'));
    }

        public function showCategory($category)
    {
        $units = Unit::with(['components.reports' => function ($q) {
            $q->latest()->limit(1); // ambil report terakhir untuk tiap komponen
        }])
        ->where('category', $category)
        ->get();

        return view('info', compact('units', 'category'));
    }

            public function publicshowCategory($category)
    {
        $units = Unit::with(['components.reports' => function ($q) {
            $q->latest()->limit(1); // ambil report terakhir untuk tiap komponen
        }])
        ->where('category', $category)
        ->get();

        return view('public-info', compact('units', 'category'));
    }
}
