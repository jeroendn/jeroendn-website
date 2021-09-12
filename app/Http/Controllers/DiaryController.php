<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class DiaryController extends Controller
{
    /**
     * DiaryController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:1');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $diaryEntries = DB::table('diary_entries')->get()->sortByDesc('date');

        $dateSortedEntries = [];
        foreach ($diaryEntries as $entry) {
            if (!empty($entry->date)) {
                $year = intval(date('Y', strtotime($entry->date)));
                $month = intval(date('m', strtotime($entry->date)));
                $day = intval(date('d', strtotime($entry->date)));

                $dateSortedEntries[$year][$month][$day][] = $entry;
            } else { // Get approximate date
                $year = intval(date('Y', strtotime($entry->date_approx_start)));
//                $month = date('m', strtotime($entry->date_approx_start));
//                $day = date('d', strtotime($entry->date_approx_start));

                $dateSortedEntries[$year][0][] = $entry;
            }
        }

//        asort($dateSortedEntries);
//        foreach($dateSortedEntries as $year => $months) {
//            asort($dateSortedEntries[$year]);
//            foreach ($months as $month => $days) {
//
//            }
//        }
//
//        dd($dateSortedEntries);

        return view('diary.index', compact('dateSortedEntries'));
    }
}
