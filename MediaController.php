<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\Response;


class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Hi from media index';
        $data = Media::query()->get()->all();
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
        echo "Hi from media store\n";
        $t_id = $request->query('t_id');
        $type = $request->query('type');
        $link = $request->query('link');

        $data = Media::query()->create([
            't_id'=>$t_id,
            'type'=>$type,
            'link'=>$link
        ]);

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media , Request $request)
    {
        echo "Hi from media show\n";
        $mediaQuery = Media::query();
        $mediaQuery->where('m_id','=',$request->query('m_id'));
        $data = $mediaQuery->get()->all();

        if($data == "[]")
            return response("couldn't find the item!!");

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        echo "Hi from media update\n";

        $mediaQuery = Media::query();
        $mediaQuery->where('m_id','=',$request->query('m_id'));

        if($mediaQuery->get()=="[]")
            return response("couldn't find the item!!");
        
        if($request->query('t_id')){
            $mediaQuery->update([
                't_id'=>$request->query('t_id')
            ]);
        }

        if($request->query('link')){
            $mediaQuery->update([
                'link'=>$request->query('link')
            ]);
        }

        if($request->query('type')){
            $mediaQuery->update([
                'type'=>$request->query('type')
            ]);
        }

        return response('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media , Request $request)
    {
        echo "Hi from destroy\n";

        $mediaQuery = Media::query();
        $mediaQuery->where('m_id','=',$request->query('m_id'));
        if($mediaQuery->get()=="[]")
            return response("couldn't find the item!!");
        else
            {
                $mediaQuery->delete();
                return response('deleted successfully');
            }
    }
}
