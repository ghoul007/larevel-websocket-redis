<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    function index(){
      $event = new PostCreatedEvent();
      event($event);
      dd();
    }
}
