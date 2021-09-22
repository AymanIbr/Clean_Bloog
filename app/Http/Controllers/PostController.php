<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest('id')->paginate(5);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select(['id','name'])->get();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title',
        ]);

        $ex = $request->file('image')->getClientOriginalExtension();
        $new_name = 'Clean_'.'.'.time().'.'.$ex;
        $request->file('image')->move(public_path('uplods'), $new_name);

        Post::create([
            'title' => $request->title ,
            'subtitle' => $request->subtitle,
            'user_id' => auth()->user()->id,
            'content' => $request->content ,
            'category_id' => $request->category_id,
            'image'=> $new_name ,
            'slug' => Str::slug($request->title)
        ]);
        return redirect()->route('posts.index')->with('success', 'Post Added Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::select(['id','name'])->get();
        $post = Post::findOrFail($id);
        return view('admin.posts.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:posts,title',
        ]);
        $post = Post::findOrFail($id);
        $new_name = $post->image ;
        if($request->has('image')){
            $ex = $request->file('image')->getClientOriginalExtension();
            $new_name = 'Clean_'.'.'.time().$ex;
            $request->file('image')->move(public_path('uplods'),$new_name);
        }
        Post::findOrFail($id)->update([
            'title' => $request->title ,
            'subtitle' => $request->subtitle,
            'content' => $request->content ,
            'image'=> $new_name ,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,

        ]);
        return redirect()->route('posts.index')->with('success','Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('posts.index')->with('success','Post Deleted Successfully');
    }
}
