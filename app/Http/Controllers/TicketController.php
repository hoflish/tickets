<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ticket;
use Auth;
use Session;
class TicketController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('isadmin')->only('consulter');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priorites=DB::table('priorites')->pluck('nom','id');
        return view('ticket.create',compact('priorites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);
      $data=$request->all();
       $this->validate($request,[
         'message'=>'required|min:10',
         'priorite_id'=>'required',
       ]);
       $data=array_add($data,'user_id',Auth::user()->id);
      //  dd($data);
       Ticket::create($data);
       Session::flash('message','Votre Ticket a été crée avec succès');
       return redirect('/home');


    }

    public function consulter($id)
    {
      $ticket =Ticket::findOrFail($id);
      $ticket->etat='en cours';
      $ticket->save();
      return view('ticket.show',compact('ticket'));
    }
}
