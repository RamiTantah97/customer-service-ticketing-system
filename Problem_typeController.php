<?php

namespace App\Http\Controllers;

use App\Models\Problem_type;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Problem_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Hi from problem_type index \n";
        $data = Problem_type::query()->get()->all();
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
        echo "Hi from problem store\n";

        
        $problemName = $request->query('name');
        $s_id = $request->query('s_id');

        $data = Problem_type::query()->create([
            'name'=>$problemName,
            's_id'=>$s_id
        ]);
        
        return response()->json($data ,Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Problem_type  $problem_type
     * @return \Illuminate\Http\Response
     */
    public function show(Problem_type $problem_type , Request $request)
    {
        echo "Hi from problem_type show\n";

        $problem_typeQuery = Problem_type::query();
        $problem_typeQuery->where('p_id','=',$request->query('id'));
        $data = $problem_typeQuery->get()->all();

        if($data == "[]")
            return response("couldn't find the item!!");

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Problem_type  $problem_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problem_type $problem_type)
    {
        echo "Hi from problem_type update\n";
        $problem_typeQuery = Problem_type::query();
        $problem_typeQuery->where('p_id','=',$request->query('id'));
        
        if($problem_typeQuery->get()=="[]"){
            return response("couldn't find the item");
        }

        if($request->query('name')){
            $problem_typeQuery->update([
                'name'=>$request->query('name')
            ]);
        }
        if($request->query('s_id')){
            $problem_typeQuery->update([
                's_id'=>$request->query('s_id')
            ]);
        }

        return response('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Problem_type  $problem_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problem_type $problem_type , Request $request)
    {
        echo "Hi from destroy\n";

        $problem_typeQuery = Problem_type::query();
        $problem_typeQuery->where('p_id','=',$request->query('id'));

        if($problem_typeQuery->get()=="[]"){
            return response("couldn't find the item!!");
        }
        else{
            $problem_typeQuery->delete();
            return response('deleted successfully');
        }
    }
}
