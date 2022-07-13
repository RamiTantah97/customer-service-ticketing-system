<?php

namespace App\Http\Controllers;

use App\Models\Communication_status;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class Communication_statusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Hi from communication_status index';
        $data = Communication_status::query()->get()->all();
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
        echo "Hi from communication_status store\n";
        $c_id = $request->query('c_id');

        $data = Communication_status::query()->create([
            'c_id'=>$c_id
        ]);

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Communication_status  $communication_status
     * @return \Illuminate\Http\Response
     */
    public function show(Communication_status $communication_status , Request $request)
    {
        echo "Hi from communication_status show\n";
        $Communication_statusQuery = Communication_status::query();
        $Communication_statusQuery->where('communication_id','=',$request->query('communication_id'));
        $data = $Communication_statusQuery->get()->all();

        if($data == "[]")
            return response("couldn't find the item!!");

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Communication_status  $communication_status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Communication_status $communication_status)
    {
        echo "Hi from communication_status update\n";

        $Communication_statusQuery = Communication_status::query();
        $Communication_statusQuery->where('communication_id','=',$request->query('communication_id'));

        if($Communication_statusQuery->get()=="[]")
            return response("couldn't find the item!!");
        
        if($request->query('c_id')){
            $Communication_statusQuery->update([
                'c_id'=>$request->query('c_id')
            ]);
        }
        return response('updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Communication_status  $communication_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Communication_status $communication_status ,Request $request)
    {
        echo "Hi from communication_status destroy\n";
        $communication_statusQuery = Communication_status::query();
        $communication_statusQuery->where('communication_id','=',$request->query('communication_id'));
        if($communication_statusQuery->get()=="[]")
            return response("couldn't find the item!!");
        else{
        $communication_statusQuery->delete();
        return response('deleted successfully');
            }
    }
}
