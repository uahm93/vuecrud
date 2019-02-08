<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Post;


class PostController extends Controller
{
    public function home(){
     
        return view('vueApp'); //manda a llamar a la vista
    }

    public function index(){
        return Post::orderBy('id', 'desc')->get();

    }
    public function create(){

    }
    public function store(Request $request){
      $this->validate($request,[
          'title' => 'required',
          'body'  => 'required',
      ]);
      $create = Post::create($request->all());
      return response()->json(['status' => 'success', 'msg' =>'Pubbliacación creada chido' ]);
    }
    
    public function show($id){
       
        return Post::find($id); 

    }

    public function edit($id){
       
        return Post::find($id); 
        //$post = Post::find($id);
        //return response()->json($post);

    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::find($id);

        $post->update($request->all());

         return response()->json('successfully updated');
        
        
    }
    public function destroy($id){
       
        $post = Post::find($id);

        $post->delete();
  
        return response()->json('successfully deleted');

    }
}
