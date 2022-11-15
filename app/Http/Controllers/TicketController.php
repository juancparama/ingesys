<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $misincidencias = Ticket::where('user_id', '=', $id)->get();
        $incidencias = Ticket::where('status', '!=', 0)->get();

        $averias = Ticket::where('type_id', '=', 1)->get();
        $evaluaciones = Ticket::where('type_id', '=', 2)->get();

        $avSolved = Ticket::where('type_id', '=', 1)->where('status', '=', 2)->get();
        $evaSolved = Ticket::where('type_id', '=', 2)->where('status', '=', 2)->get();

        return view('ticket.index', compact('avSolved', 'evaSolved', 'incidencias', 'misincidencias', 'averias', 'evaluaciones'));
    }

    public function completadas()
    {
        $tickets = Ticket::where('status', '=', 2)->get();
        return view('ticket.completadas', ['tickets' => $tickets]);
    }

    public function incidencias()
    {
        $id = Auth::user()->id;
        $tickets = Ticket::where('user_id', '=', $id)->get();
        $users = User::all();
        
        return view('ticket.incidencias', compact("tickets"), compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('ticket.create', compact("locations"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
            
        $ticketData = ['title' => $request->title, 'description' => $request->description, 'prior' => $request->prior?$request->prior:0, 'status' => $request->status, 'type_id' => $request->type_id, 'user_id' => $request->user_id, 'location_id' => $request->location_id];
      
        Ticket::create($ticketData);
        return redirect()->route('ticket.misincidencias')->with(['message' => 'Incidencia creada correctamente.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $user = User::find($ticket->user_id);
        $location = Location::find($ticket->location_id);

        $data = [
            'ticket'  => $ticket,
            'user'   => $user,
            'location' => $location
        ];
        return view ('ticket.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $locations = Location::all();
        return view('ticket.edit', ['ticket' => $ticket], compact("locations"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate(['title' => 'required']);
        $ticketData = ['title' => $request->title, 'description' => $request->description, 'prior' => $request->prior?$request->prior:0, 'location_id' => $request->location_id];
        $ticket->update($ticketData);
        return redirect()->route('ticket.misincidencias')->with(['message' => 'Incidencia actualizada correctamente.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('ticket.misincidencias')->with(['message' => 'Incidencia eliminada correctamente.', 'status' => 'info']);
    }

}
