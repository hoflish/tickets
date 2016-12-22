<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Priorite;
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
      $statistiques=[];
      $statistiques['total']=Ticket::All()->count();
      $statistiques['encours']=Ticket::where('etat','en cours')->get()->count();
      $statistiques['creation']=Ticket::where('etat','création')->get()->count();
      $statistiques['realisee']=Ticket::where('etat','réalisée')->get()->count();

      $priorites=Priorite::All();


      if(Auth::user()->role=='admin')
      {
          $tickets=Ticket::paginate(10);
      }
      else
      {
          $tickets=Ticket::where('user_id',Auth::user()->id)->paginate(10);
      }

      return view('home',compact('tickets','statistiques','priorites'));
    }
}
