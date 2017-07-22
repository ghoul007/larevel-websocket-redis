<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    function index(){
      $event = new PostCreatedEvent(['name'=>'title']);
      event($event);
      dd();
    }
}
