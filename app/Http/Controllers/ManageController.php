<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
Use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Auth::user()->id==2) {
        if (Auth::user()->roles[0]->id==2) {
            $type=1;
        // } elseif (Auth::user()->id==3) {
        } elseif (Auth::user()->roles[0]->id==3) {
            $type=2;
        } else {
            $type=0;
        }

        $tickets = Ticket::where('type_id', '=', $type)->where('status', '=', 1)->get();
        return view('manage.index', ['tickets' => $tickets]);
    }

    public function cerradas()
    {
        // if (Auth::user()->id==2) {
        if (Auth::user()->roles[0]->id==2) {
            $type=1;
        // } elseif (Auth::user()->id==3) {
        } elseif (Auth::user()->roles[0]->id==3) {
            $type=2;
        } else {
            $type=0;
        }

        $tickets = Ticket::where('type_id', '=', $type)->where('status', '=', 2)->get();
        return view('manage.cerradas', ['tickets' => $tickets]);
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
        return view ('manage.show')->with($data);
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
        return view('manage.edit', ['ticket' => $ticket], compact("locations"));
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
        if ($ticket->type_id==1) {
            $request->validate([
                'comment' => 'required',
               ]);

            $ticketData = ['comment' => $request->comment, 'status' => $request->status, 'closed_at' => $request->closed_at];
        } else {
            $request->validate([
                'comment' => 'required',
                'file' => 'required|mimes:pdf|max:2048'
               ]);

            $imageName = $request->file->getClientOriginalName();
            $path = $request->file->move(public_path('storage/files/'), $imageName);
            $ticketData = ['comment' => $request->comment, 'status' => $request->status, 'closed_at' => $request->closed_at, 'file_name' => $imageName, 'file_path' => $path];
        }

        $ticket->update($ticketData);        
        return redirect('/manage')->with(['message' => 'Incidencia cerrada correctamente.', 'status' => 'success']);

    }
}
