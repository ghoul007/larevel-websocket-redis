<?php

namespace App\Http\Controllers;

use App\Events\GroupEvent;
use App\Group;
use Illuminate\Http\Request;

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
        broadcast(new GroupEvent($group))->toOthers();
        return redirect()->back();
    }

}
