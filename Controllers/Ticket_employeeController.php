<?php

namespace App\Http\Controllers;

use App\Models\Ticket_employee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class Ticket_employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Hi from ticket_employee index';
        $data = Ticket_employee::query()->get()->all();
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
        echo "Hi from ticket_employee store\n";
        $t_id = $request->query('t_id');
        $u_id = $request->query('u_id');
        $sendOrReceive = $request->query('sendOrReceive');

        $data = Ticket_employee::query()->create([
            't_id'=>$t_id,
            'u_id'=>$u_id,
            'sendOrReceive'=>$sendOrReceive
        ]);

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket_employee  $ticket_employee
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket_employee $ticket_employee ,Request $request)
    {
        echo "Hi from announcement show\n";
        $ticket_employeeQuery = Ticket_employee::query();
        $ticket_employeeQuery->where('te_id','=',$request->query('te_id'));
        $data = $ticket_employeeQuery->get()->all();

        if($data == "[]")
            return response("couldn't find the item!!");

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket_employee  $ticket_employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket_employee $ticket_employee)
    {
        echo "Hi from ticket_employee update\n";

        $ticket_employeeQuery = Ticket_employee::query();
        $ticket_employeeQuery->where('te_id','=',$request->query('te_id'));

        if($ticket_employeeQuery->get()=="[]")
            return response("couldn't find the item!!");
        
        if($request->query('t_id')){
            $ticket_employeeQuery->update([
                't_id'=>$request->query('t_id')
            ]);
        }

        if($request->query('u_id')){
            $ticket_employeeQuery->update([
                'u_id'=>$request->query('u_id')
            ]);
        }

        if($request->query('sendOrReceive')){
            $ticket_employeeQuery->update([
                'sendOrReceive'=>$request->query('sendOrReceive')
            ]);
        }

        return response('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket_employee  $ticket_employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket_employee $ticket_employee , Request $request)
    {
        echo "Hi from ticket_employee destroy\n";

        $ticket_employeeQuery = Ticket_employee::query();
        $ticket_employeeQuery->where('te_id','=',$request->query('te_id'));
        if($ticket_employee->get()=="[]")
            return response("couldn't find the item!!");
        else 
            {
                $ticket_employeeQuery->delete(); 
                return response('deleted successfully');
            }
    }
}
