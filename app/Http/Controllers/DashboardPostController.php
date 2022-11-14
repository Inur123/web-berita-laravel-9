<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    public function index()
    {   
        return view('dashboard.posts.index',[
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts', 
            'category_id' => 'required',
            'image' => 'image|file',
            'body' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body),200);

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success','New post has ben added!');
    }

    public function show(Post $post)
    {
        if($post->author->id!==auth()->user()->id){
            abort(403);
        }

        return view('dashboard.posts.show',[
            'post'=>$post
        ]);
    }

    public function edit(Post $post)
    {
        if($post->author->id!==auth()->user()->id){
            abort(403);
        }

        return view('dashboard.posts.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file',
            'slug' => 'required',
            'body' => 'required'
        ];

        if($request->slug != $post->slug){
            $rules['slug'] = 'required';
        }
        
        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('post-images');
        }


        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body),200);

        Post::where('id', $post->id)
                ->update($validatedData);

        return redirect('/dashboard/posts')->with('success','post has ben updated!');

    }

    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success','Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' =>$slug]);
    }
}
