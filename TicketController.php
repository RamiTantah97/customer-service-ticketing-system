<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Hi from ticket index';
        $data = Ticket::query()->get()->all();
        return response()->json ($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "Hi from ticket store\n";
        $communication_id = $request->query('communication_id');
        $senderE_id = $request->query('senderE_id');
        $receiverE_id = $request->query('receiverE_id');
        $p_id = $request->query('p_id');
        $description = $request->query('description');
        $priority = $request->query('priority');
        $state = $request->query('state');
        $archived = $request->query('archived');


        $data = Ticket::query()->create([
            'communication_id'=>$communication_id,
            'senderE_id'=>$senderE_id,
            'receiverE_id'=>$receiverE_id,
            'p_id'=>$p_id,
            'description'=>$description,
            'priority'=>$priority,
            'state'=>$state,
            'archived'=>$archived,

        ]);

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket , Request $request)
    {
        echo "Hi from ticket show\n";
        $ticketQuery = Ticket::query();
        $ticketQuery->where('t_id','=',$request->query('t_id'));
        $data = $ticketQuery->get()->all();

        if($data == "[]")
            return response("couldn't find the item!!");

        return response()->json($data ,Response::HTTP_CREATED);
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
        echo "Hi from ticket update\n";

        $ticketQuery = Ticket::query();
        $ticketQuery->where('t_id','=',$request->query('t_id'));

        if($ticketQuery->get()=="[]")
            return response("couldn't find the item!!");
        
        if($request->query('communication_id')){
            $ticketQuery->update([
                'communication_id'=>$request->query('communication_id')
            ]);
        }

        if($request->query('senderE_id')){
            $ticketQuery->update([
                'senderE_id'=>$request->query('senderE_id')
            ]);
        }

        if($request->query('receiverE_id')){
            $ticketQuery->update([
                'receiverE_id'=>$request->query('receiverE_id')
            ]);
        }

        if($request->query('p_id')){
            $ticketQuery->update([
                'p_id'=>$request->query('p_id')
            ]);
        }

        if($request->query('description')){
            $ticketQuery->update([
                'description'=>$request->query('description')
            ]);
        }

        if($request->query('priority')){
            $ticketQuery->update([
                'priority'=>$request->query('priority')
            ]);
        }

        if($request->query('state')){
            $ticketQuery->update([
                'state'=>$request->query('state')
            ]);
        }

        if($request->query('archived')){
            $ticketQuery->update([
                'archived'=>$request->query('archived')
            ]);
        }

        return response('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket , Request $request)
    {
        echo "Hi from ticket destroy\n";

        $ticketQuery = Ticket::query();
        $ticketQuery->where('t_id','=',$request->query('t_id'));
        if($ticketQuery->get()=="[]")
            return response("couldn't find the item!!");
        else{
            $ticketQuery->delete();
            return response('deleted successfully');
            }
    }
}
