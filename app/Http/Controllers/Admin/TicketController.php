<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('category')->get();

        return view('admin.tickets',compact('tickets'));
    }

    public function show($ticketId)
    {
        $ticket = Ticket::whereId($ticketId)->with('category')
            ->first();

        return view('admin.forms.ticket',compact('ticket'));
    }

    public function post($ticketId, Request $request)
    {
        $ticket = Ticket::whereId($ticketId)->first();

        Mail::to($ticket->user->email)->send(
            new \App\Mail\Ticket($ticket,$request->input('answer'))
        );

       // Ticket::whereId($ticketId)->delete();

        return redirect()->route('admin.tickets')
            ->with('success','Ответ отправлен');
    }
}
