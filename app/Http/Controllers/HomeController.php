<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Auth;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::user()->role=='admin')
      {
          $tickets=Ticket::paginate(10);
      }
      else
      {
          $tickets=Ticket::where('user_id',Auth::user()->id)->paginate(10);
      }

      return view('home',compact('tickets'));
    }
}
