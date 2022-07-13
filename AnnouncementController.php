<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Hi from announcement index\n";
        $data = Announcement::query()->get()->all();
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
        echo "Hi from announcement store\n";
        $description = $request->query('description');
        $state = $request->query('state');
        $e_id = $request->query('e_id');
        $s_id = $request->query('s_id');

        $data = Announcement::query()->create([
            'description'=>$description,
            'state'=>$state,
            'e_id'=>$e_id,
            's_id'=>$s_id
        ]);

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement ,Request $request)
    {
        echo "Hi from announcement show\n";
        $announcementQuery = Announcement::query();
        $announcementQuery->where('id','=',$request->query('id'));
        $data = $announcementQuery->get()->all();

        if($data == "[]")
            return response("couldn't find the item!!");

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        echo "Hi from announcement update\n";

        $announcementQuery = Announcement::query();
        $announcementQuery->where('a_id','=',$request->query('a_id'));

        if($announcementQuery->get()=="[]")
            return response("couldn't find the item!!");
        
        if($request->query('description')){
            $announcementQuery->update([
                'description'=>$request->query('description')
            ]);
        }

        if($request->query('e_id')){
            $announcementQuery->update([
                'e_id'=>$request->query('e_id')
            ]);
        }

        if($request->query('s_id')){
            $announcementQuery->update([
                's_id'=>$request->query('s_id')
            ]);
        }

        if($request->query('state')){
            $announcementQuery->update([
                'state'=>$request->query('state')
            ]);
        }

        return response('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement, Request $request)
    {
        echo "Hi from announcement destroy\n";

        $announcementQuery = Announcement::query();
        $announcementQuery->where('a_id','=',$request->query('id'));
        $data = $announcementQuery->get();

        if($data=="[]")
            return response("couldn't find the item");
        else 
            {
                $announcementQuery->delete();
                return response('deleted successfully');
            }
    }
}
