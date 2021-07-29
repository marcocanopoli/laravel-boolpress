<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    private $validationRules = [
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'content' => 'required',
        'category_id' => 'nullable|exists:categories,id',
        'tags' => 'exists:tags,id'
    ];

    private function getSlug($data) {
        $slug = Str::slug($data["title"], '-');

        $existingPost = Post::where('slug', $slug)->first();

        $slugString = $slug;
        $counter = 1;

        while($existingPost) {
            $slug = $slugString . "-" . $counter;
            $existingPost = Post::where('slug', $slug)->first();
            $counter++;
        }

        return $slug;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

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
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $request->validate($this->validationRules);
        
        $newPost = new Post();

        $slug = $this->getSlug($data);
        $data['slug'] = $slug;

        $newPost->fill($data);
        $newPost->save();

        if (array_key_exists('tags', $data)) {
            $newPost->tags()->attach($data['tags']);
        }

        return redirect()
            ->route('admin.posts.show', $newPost->id)
            ->with('created', $newPost->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->all();
        
        $request->validate($this->validationRules);
        
        if($post->title != $data["title"]) {
            $slug = $this->getSlug($data);

            $data["slug"] = $slug;
        }
        
        $post->update($data);

        return redirect()
            ->route('admin.posts.show', $post->id)
            ->with('updated', $post->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('deleted', $post->title);
    }
}
