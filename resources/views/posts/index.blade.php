@extends('layouts.app')

    @section('content')
    @if(session()->has('error'))
              <div class="alert alert-danger">
                {{session()->get('error')}}
              </div>
    @endif
<div class="clearfix">
<a href="{{route('posts.create')}}" class="btn float-right btn-success" style="margin-bottom:10px">Add Post</a>
</div>
    <div class="card card-default">
  
        <div class="card-header">
             <h1>All Posts</h1>
        </div>


<table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">content</th>
      <th scope="col">image</th>
      <th scope="col">Actions</th>
     
    </tr>
  </thead>
         @foreach($posts as $post)     
         <tbody>
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->content}}</td>
      <td><img src="{{asset('storage/'.$post->image)}}" width="80px" height="50px"></td>
      <td>
      @if(!$post->trashed())
      <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-sm">Edit </a>
      @else
      <a href="{{route('trashed.Restore',$post->id)}}" class="btn btn-primary btn-sm">Restore </a>

      @endif
      <form class="float-right" action="{{route('posts.destroy' ,$post->id)}}" method="Post">
      @csrf
      @method('delete')
      <button class="btn btn-danger btn-sm" value="delete">{{$post->trashed() ?'Delete' : 'trash'}} </button>
      </form>
      </td>

    </tr>
  </tbody>
        @endforeach
         </table>

        </div>
    
    </div>


    @endSection









