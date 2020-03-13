<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\post;
use App\tag;
use App\category;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePost;
class PostsController extends Controller
{
    public function __construct()
    {

        $this->middleware('cheeckCategory')->except('index');
    }
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags',tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // dd($request->Tags);
        // session()->flash('success','Posts Added Successfully');
       
        $post = Post::create([
        'title'=>$request->title,
        'content'=>$request->content,
        'description'=>$request->description,
        'image'=>$request->image->store('images','public'),
        'category_id'=> $request->categoryId,
        'user_id'=>$request->user_id
        ]);
        if ($request->tags) {
            $post->Tags()->attach($request->tags);

        }
        session()->flash('success','Post added successfully');
       
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(post $post){
    $user = $post->user;
    $profile = $user->profile;
    return view("posts.show")->with('post',$post)->with('categories',Category::all())->with('profile',$profile)->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post,category $categories )
    {
        return view('posts.create',['Post'=>$post,'tags'=>tag::all(),'categories'=>Category::all()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, post $post)

    {
        
        $data= $request->only(['title','content','description']);
        if ($request->HasFile('image')) {
            $image= $request->image->store('image');
            Storage::disk('public')->delete($post->image);
            $data['image']= $image;
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
            
        }
        
        $post->update($data);
        session()->flash('success','Post updated successfully');
        return redirect(route('posts.index'));
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  
        $post=post::withTrashed()->where('id',$id)->first();
        if ($post->trashed()) {
            $post->forceDelete();
        
        }else {
            $post->delete();

        };
        session()->flash('success','Post deleted successfully');
        return redirect(route('posts.index'));
    }



    public function trashed()
    {
         $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->withPosts($trashed);
    }
    public function Restore($id){
        post::withTrashed()->where('id',$id)->restore();
        session()->flash('success','Post restored successfully');
        return redirect(route('posts.index'));
    
    }
}
