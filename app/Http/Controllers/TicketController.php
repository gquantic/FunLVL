<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $categories = TicketCategory::all();

        return view('create-ticket',compact('categories'));
    }

    public function post(Request $request)
    {
        Ticket::create(
            array_merge(
                $request->all(),
                ['user_id'=>Auth::id()]
            )
        );

        return redirect()->back()->with('success','Тикет создан! Ждите ответ на почту');
    }
}
