<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;



class PostController extends Controller
{
    public function index()
    {
    return Post::all();
    }

    public function store(Request $request)
    {
    try{
        $post= new Post();
        $post->title=$request->title;
        $post->body=$request->body;

        if($post->save()){
            return response()->json(['status'=>'succes','message'=>'Post created succesfully']);

        }

    } catch(\Exception $e){
        return response()->json(['status'=>'error','message'=>$e->getMessage()]);

    }
    }

    public function update(Request $request,$id){
        try{
            $post= Post::findOrFail($id);
            $post->title=$request->title;
            $post->body=$request->body;
    
            if($post->save()){
                return response()->json(['status'=>'succes','message'=>'Post updated succesfully']);
    
            }
    
        } catch(\Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
    
        }
    }
    public function destroy($id){

        try{
            $post= Post::findOrFail($id);
           
    
            if($post->delete()){
                return response()->json(['status'=>'succes','message'=>'Post deleted succesfully']);
    
            }
    
        } catch(\Exception $e){
            return response()->json(['status'=>'error','message'=> $e->getMessage()]);
    
        }
    }

}
