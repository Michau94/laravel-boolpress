<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $post = new Post();
        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tag $tag)
    {

        $request->validate([
            'category_id' => 'nullable | exists:categories,id',
            'title' => 'required | min:5',
            'content' =>  'required | max:100',
            'tags' => 'nullable|exists:tags,id',
            'upload_image' => 'image'
        ]);
        $data = $request->all();

        $post = new Post();
        $img_path = Storage::put('public', $data['upload_image']);
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');
        $post->user_id = Auth::id();
        $post->upload_image = $img_path;
        $post->save();




        if (array_key_exists('tags', $data)) $post->tags()->attach($data['tags']);
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = User::find(Auth::id());
        return view('admin.posts.show', compact('post', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Tag $tag)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $tagIds = $post->tags->pluck('id')->toArray();
        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'tagIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'nullable | exists:categories,id',
            'title' => 'required | min:5',
            'content' =>  'required | max:200',
            'tags' => 'nullable|exists:tags,id'

        ]);

        $data = $request->all();
        $img_path = Storage::put('public', $data['upload_image']);
        $data['upload_image'] = $img_path;

        if (!array_key_exists('tags', $data))
            $post->tags()->detach();
        else
            $post->tags()->sync($data['tags']);
        $post->update($data);

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (count($post->tags)) {
            $post->tags()->detach();
        }
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
