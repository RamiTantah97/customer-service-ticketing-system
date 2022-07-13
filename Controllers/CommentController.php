<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Hi from comment index';
        $data = Comment::query()->get()->all();
        if($data =="[]")
            return response("couldn't find any item !!" );
        else
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
        echo "Hi from comment store\n";
        $description = $request->query('description');
        $u_id = $request->query('u_id');
        $t_id = $request->query('t_id');

        $data = Comment::query()->create([
            'description'=>$description,
            'u_id'=>$u_id,
            't_id'=>$t_id
        ]);

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment , Request $request)
    {
        echo "Hi from comment show\n";
        $commentQuery = Comment::query();
        $commentQuery->where('comment_id','=',$request->query('comment_id'));
        $data = $commentQuery->get()->all();

        if($data == "[]")
            return response("couldn't find the item!!");

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        echo "Hi from comment update\n";

        $commentQuery = Comment::query();
        $commentQuery->where('comment_id','=',$request->query('comment_id'));

        if($commentQuery->get()=="[]")
            return response("couldn't find the item!!");
        
        if($request->query('description')){
            $commentQuery->update([
                'description'=>$request->query('description')
            ]);
        }

        if($request->query('u_id')){
            $commentQuery->update([
                'u_id'=>$request->query('u_id')
            ]);
        }

        if($request->query('t_id')){
            $commentQuery->update([
                't_id'=>$request->query('t_id')
            ]);
        }

        return response()->json($commentQuery->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment ,Request $request)
    {
        echo "Hi from comment destroy\n";

        $commentQuery = Comment::query();
        $commentQuery->where('comment_id','=',$request->query('comment_id'));
        $data = $commentQuery->get();
        if($data=="[]")
            return response("couldn't find the item");
        else 
            {
                 $commentQuery->delete();
                return response('deleted successfully');
            }
    }
}
