<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index(){

        $posts = Post::latest('id')->simplePaginate(2);
        return view('Front.index',compact('posts'));
    }

    public function single($slug){
        $post = Post::where('slug',$slug)->first();
        return view('Front.single',compact('post'));
    }
    public function about(){
        return view('Front.about');
    }
    public function contact(){
        return view('Front.contact');
    }

    public function contactSubmit(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required',
            'message' => 'required',
            ]);
        Mail::to('admin@admin.com')->send(new ContactMail($request->except('_token')));
        return redirect()->route('indexPAge');
    }
}


