<?php

namespace App\Http\Controllers;

use App\Events\GroupEvent;
use App\Group;
use App\Notifications\DemoNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{


    public function index()
    {

        $groups = Group::all();
        return view('group.index', compact('groups'));
    }


    public function notify(int $group_id)
    {

        $group = Group::find($group_id);
        $user= Auth::user();
        $user->notify(new DemoNotification($group));
//        broadcast(new GroupEvent($group))->toOthers();
        return redirect()->back();
    }

}
