<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Component;


class TicketController extends Controller
{
    public function index(){

    	$components = Component::all();

    	return view('ticket.new', compact('components'));
    }

    public function add(Request $request){
    	$ticket = new Ticket();

    	$ticket->title = $request->title;
    	$ticket->description = $request->description;
    	$ticket->component_id = $request->component_id;

    	$ticket->save();

    	return redirect('/');
    }

    public function details(Ticket $id){
    	return view('ticket.details', compact('id'));
    }

    public function delete(Ticket $ticket){

        $ticket->delete();

        return back();
    }

    public function edit(Ticket $ticket){
        $components = Component::all();

        return view('ticket.edit', compact('ticket', 'components'));
    }

    public function update(Request $request, Ticket $id){
        $id->update($request->all());

        return redirect('/');
    }
}
