<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Traitement;
use Auth;
use Session;
class TraitementController extends Controller
{
  public function __construct()
  {
      $this->middleware(['auth','isadmin']);
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
    public function create($id)
    {
      //$id td du ticket à traiter
      $ticket=Ticket::findOrFail($id);
      $traitements=Traitement::where('ticket_id',$id)->get();
      return view('taitement.new',compact('ticket','traitements'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'ticket_id' =>'required',
          'description' =>'required|min:6',
          'duree' =>'required',
        ]);
        Traitement::create([
          'description'=>$request->input('description'),
          'duree'=>$request->input('duree'),
          'user_id'=>Auth::user()->id,
          'ticket_id'=>$request->input('ticket_id')
        ]);
        Session::flash('message','Le traitement a été enrgistrée avec succès');
        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
