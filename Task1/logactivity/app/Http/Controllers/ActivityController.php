<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class ActivityController extends Controller
{
    public function index()
    {

        if (Auth::user()->type == "kepdin"){
            $activities = DB::table('activities')
        ->join('users', 'activities.user_id', '=', 'users.id')
        ->where('user_type', "kepdang")
        ->where('users.supervisor_id', Auth::user()->id)
        ->select('activities.id', 'activities.user_id', 'activities.user_type', 'activities.activity', 'activities.status', 'activities.created_at','users.supervisor_id', 'users.name');

        if (request('search')) {
            $search = request('search');
            $activities = DB::table('activities')
            ->join('users', 'activities.user_id', '=', 'users.id')
            ->where('user_type', "kepdang")
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
            );
        }
        }else {
            $activities = Activity::where('user_id', Auth::user()->id);
            $activities = DB::table('activities')
            ->join('users', 'activities.user_id', '=', 'users.id')
            ->where('user_id', Auth::user()->id)
            ->select('activities.id', 'activities.user_id', 'activities.user_type', 'activities..activity', 'activities.status', 'activities.created_at','users.supervisor_id', 'users.name');

            if (request('search')) {
                $search = request('search');
                $activities = DB::table('activities')
            ->join('users', 'activities.user_id', '=', 'users.id')
            ->where('user_id', Auth::user()->id)
            ->select('activities.id', 'activities.user_id', 'activities.user_type', 'activities..activity', 'activities.status', 'activities.created_at','users.supervisor_id', 'users.name')
            ->where(
                    function ($query) use ($search){
                        $query
                        ->where('activity', 'like', "%{$search}%")
                        ->orwhere('status', 'like', "%{$search}%")
                        ->orwhere('name', 'like', "%{$search}%")
                        ;
                    }
                );
            }
        }
        $activities = $activities->paginate(5);

        $totalapprove = Activity::where('status','Disetujui')->get()->count();
        return view('activity.home', compact('activities', 'totalapprove'));
    }

    public function create()
    {
        return view('activity.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'activity' => 'required',
        ]);

        $post = Activity::create([
            'activity' => $request->activity,
            'user_id' => Auth::user()->id,
            'user_type' => Auth::user()->type,

        ]);

        if ($post) {
            return redirect()
                ->route('activity.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function edit($id)
    {
        $post = Activity::findOrFail($id);
        return view('activity.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        if (request('activityy')) {
            $this->validate($request, [
                'status' => 'required',
                'activityy' => 'required|string',
            ]);
            $post = Activity::findOrFail($id);

            $post->update([
                'status' => $request->status,
                'activity' => $request->activityy,
            ]);
        } else {
            $this->validate($request, [
                'status' => 'required',
            ]);
            $post = Activity::findOrFail($id);

            $post->update([
                'status' => $request->status,
            ]);
        }


        if ($post) {
            return redirect()
                ->route('activity.index')
                ->with([
                    'success' => 'Activity has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function destroy($id)
    {
        $post = Activity::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('activity.index')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('post.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
