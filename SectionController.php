<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Hi from section index\n";

        $data = Section::query()->get()->all();
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
        echo "Hi from section store\n";

        
        $sectionName = $request->query('name');
        $tickets_num = $request->query('tickets_num');
        $m_id = $request->query('m_id');

        $data = Section::query()->create([
            'name'=>$sectionName,
            'tickets_num'=> $tickets_num,
            'm_id'=>$m_id
        ]);
        
        return response()->json($data ,Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section , Request $request)
    {
        echo "Hi from section show\n";
        $sectionQuery = Section::query();
        $sectionQuery->where('name','=',$request->query('name'));
        $data = $sectionQuery->get()->all();

        if($data =="[]")
        return response("couldn't find the item!!");

        else
        return response()->json($data ,Response::HTTP_CREATED);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        echo "Hi from section update\n";

        $sectionQuery = Section::query();
        $sectionQuery->where('s_id','=',$request->query('id'));

        if($sectionQuery->get()=="[]")
            return response("couldn't find the item!!");

        if($request->query('name')){
        $sectionQuery->update([
            'name'=>$request->query('name')
        ]);
        }

        if($request->query('tickets_num')){
            $sectionQuery->update([
                'tickets_num'=>$request->query('tickets_num')
            ]);
            }

        return response('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section,Request $request)
    {
        echo "Hi from section destroy\n";

        $sectionQuery = Section::query();
        $sectionQuery->where('s_id','=',$request->query('id'));
        if($sectionQuery->get()=="[]")
            return response("couldn't find the item!!");

        $sectionQuery->delete();
        return response('deleted successfully');

    }
}
