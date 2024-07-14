<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $activities = DB::table('activities')
        ->join('users', 'activities.user_id', '=', 'users.id')
        ->where('user_type', "staff")
        ->where('users.supervisor_id', Auth::user()->id)
        ->select('activities.id', 'activities.user_id', 'activities.user_type', 'activities.activity', 'activities.status', 'activities.created_at','users.supervisor_id', 'users.name')
        ->paginate(5);

        if (request('search')) {
            $search = request('search');
            $activities = DB::table('activities')
            ->join('users', 'activities.user_id', '=', 'users.id')
            ->where('user_type', "staff")
            ->where('users.supervisor_id', Auth::user()->id)
            ->select('activities.id', 'activities.user_id', 'activities.user_type', 'activities.activity', 'activities.status', 'activities.created_at','users.supervisor_id', 'users.name')
        ->where(
                function ($query) use ($search){
                    $query
                    ->where('activity', 'like', "%{$search}%")
                    ->orwhere('status', 'like', "%{$search}%")
                    ->orwhere('name', 'like', "%{$search}%")
                    ;
                }
            )->paginate(5);
        }

        return view('activity.home', compact('activities'));
    }
}
