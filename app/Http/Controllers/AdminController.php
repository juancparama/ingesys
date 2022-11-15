<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Location;
use App\Models\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $incidencias = Ticket::where('status', '!=', 0)->get();
        $sinasignar = Ticket::where('status', '=', 0)->get();
        
        $averias = Ticket::where('type_id', '=', 1)->get();
        $avSolved = Ticket::where('type_id', '=', 1)->where('status', '=', 2)->get();
        $avPend = Ticket::where('type_id', '=', 1)->where('status', '=', 1)->get();

        $evaluaciones = Ticket::where('type_id', '=', 2)->get();
        $evaSolved = Ticket::where('type_id', '=', 2)->where('status', '=', 2)->get();
        $evaPend = Ticket::where('type_id', '=', 2)->where('status', '=', 1)->get();

        return view('admin.index', compact('incidencias', 'averias', 'evaluaciones', 'avSolved', 'avPend', 'evaSolved', 'evaPend', 'sinasignar'));
    }

    public function incidencias ()
    {
        $tickets = Ticket::all();
        return view('admin.incidencias', compact("tickets"));
    }

    public function pendientes()
    {
        $tickets = Ticket::where('status', '=', 0)->get();
        return view('admin.pendientes', compact("tickets"));
    }

    public function asignadas()
    {
        $tickets = Ticket::where('status', '=', 1)->get();
        return view('admin.asignadas', compact("tickets"));
    }

    public function completadas()
    {
        $tickets = Ticket::where('status', '=', 2)->get();
        return view('admin.completadas', compact("tickets"));
    }

    public function ajustes()
    {
        return view('admin.ajustes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('admin.create', compact("locations"));
        
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
        
        $ticketData = ['title' => $request->title, 'description' => $request->description, 'prior' => $request->prior?1:0, 'status' => $request->type_id?1:0, 'type_id' => $request->type_id, 'user_id' => $request->user_id, 'location_id' => $request->location_id];
      
        Ticket::create($ticketData);
        return redirect(route('admin.incidencias'))->with(['message' => 'Incidencia creada correctamente.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
        return view ('admin.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $user = User::find($ticket->user_id);
        $locations = Location::all();
        return view('admin.edit', compact('ticket', 'locations', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate(['title' => 'required']);
        $ticketData = ['title' => $request->title, 'description' => $request->description, 'prior' => $request->prior?1:0, 'status' => $request->type_id?1:0, 'type_id' => $request->type_id, 'user_id' => $request->user_id, 'location_id' => $request->location_id];
        $ticket->update($ticketData);
        return redirect()->route('admin.incidencias')->with(['message' => 'Incidencia actualizada correctamente.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect(route('admin.incidencias'))->with(['message' => 'Incidencia eliminada correctamente.', 'status' => 'info']);
    }

    
}
