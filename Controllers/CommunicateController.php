<?php

namespace App\Http\Controllers;

use App\Models\Communicate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CommunicateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Hi from communicate index';
        $data = Communicate::query()->get()->all();
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
        echo "Hi from communicate store\n";
        $description = $request->query('description');
        $communication_id = $request->query('communication_id');

        $data = Communicate::query()->create([
            'description'=>$description,
            'communication_id'=>$communication_id
        ]);

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Communicate  $communicate
     * @return \Illuminate\Http\Response
     */
    public function show(Communicate $communicate , Request $request)
    {
        echo "Hi from communicate show\n";
        $commentQuery = Communicate::query();
        $commentQuery->where('communicate_id','=',$request->query('communicate_id'));
        $data = $commentQuery->get()->all();

        if($data == "[]")
            return response("couldn't find the item!!");

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Communicate  $communicate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Communicate $communicate)
    {
        echo "Hi from communicate update\n";

        $CommunicateQuery = Communicate::query();
        $CommunicateQuery->where('communicate_id','=',$request->query('communicate_id'));

        if($CommunicateQuery->get()=="[]")
            return response("couldn't find the item!!");
        
        if($request->query('description')){
            $CommunicateQuery->update([
                'description'=>$request->query('description')
            ]);
        }

        if($request->query('communicate_id')){
            $CommunicateQuery->update([
                'communicate_id'=>$request->query('communicate_id')
            ]);
        }

        return response()->json($CommunicateQuery->get()); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Communicate  $communicate
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Communicate $communicate ,Request $request)
    {
        echo "Hi from communicate destroy\n";

        $communicateQuery = Communicate::query();
        $communicateQuery->where('communicate_id','=',$request->query('communicate_id'));
        if($communicateQuery->get()=="[]")
            return response("couldn't find the item!!");
        else{
            $communicateQuery->delete();
            return response('deleted successfully');
        }
    }
}
