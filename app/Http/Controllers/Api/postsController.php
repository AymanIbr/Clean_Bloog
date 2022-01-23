<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class postsController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $posts = PostResource::collection(post::all());
        return $this->ApiResponse($posts,'The all posts',200);
    }

    public function show($id){

        $post = Post::find($id);
        if($post){
            return $this->ApiResponse(new PostResource($post),'The one post', 201);
        }

        return $this->ApiResponse(null,'The post not found', 400);

    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(null , $validator->errors(),400);
        }


        $post = Post::create($request->all());
        if($post){
            return $this->ApiResponse(new PostResource($post),'ok',201);
        }
        return $this->ApiResponse(null,'The post not save',400);

        }
        public function update(Request $request , $id){

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'subtitle' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->ApiResponse(null , $validator->errors(),400);
            }
            $post = Post::find($id);
            if(!$post){
                return $this->ApiResponse(null , 'The post not found',404);
            }
            $post->update($request->all());
            if($post){
                return $this->ApiResponse(new PostResource($post),'ok',201);
            }
      }
      public function destroy($id){
          $post = Post::find($id);
          if(!$post){
              return $this->ApiResponse(null , 'the post not found',404);
          }
          $post->delete($id);
          if($post){
              return $this->ApiResponse(null , 'the post delete', 200);
          }
      }

        }

