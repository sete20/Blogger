@extends('layouts.app')
@section('stylesheets')
<link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endSection
@section('content')
@if(session()->has('error'))
              <div class="alert alert-danger">
                {{session()->get('error')}}
              </div>
    @endif
<div class="card card-default">
  
  <div class="card-header">
{{isset($post)?       "Edit post" :      "Add a New post" }}

 
  </div>

  <div class="card-body">
    <form  action="{{ isset($post ) ? route('posts.update',$post->id) : route('posts.store')}}"  method="post" enctype="multipart/form-data">
        @csrf
     
        @if(isset($post))
        {{ method_field('put') }}

        @endif

    
        <div class="form-group">
                <label for="title">title</label>
                <input class="  form-control" name="title" type="text" placeholder="Write a Title" name="title" value="{{isset($post)? $post->title : '' }}">
                    @error('title') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div>


            <div class="form-group">
                <label for="content" style="text-align:center">content</label>

                <input id="x" type="hidden" name="content"  class="form-control" value="{{isset($post)? $post->content : '' }}">
  <trix-editor input="x"></trix-editor>
                <!-- <textarea  roe="3"  name="content" class="form-control" rows="5"   placeholder="Write a content"></textarea> -->

                    @error('content') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div>

            <div class="form-group">
                <label for="post">description</label>

                <textarea   row="3" name="description" class="form-control" rows="5"   placeholder="Write a description">{{isset($post) ? $post->description : ''}}</textarea >
              
                    @error('description') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div>
@if(isset($post))
<div class="form-group">
<img src="{{asset('storage/'.$post->image)}}"style="width:100%">
</div>
@endif
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" value="{{isset($post)? $post->image : '' }}">
                <label class="custom-file-label" for="image" >Select image</label>
                @error('image') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div>


            <div class="form-group">
          <label for="Selectcategory"> select Category</label>
          <select name="categoryId" class="form-control"  id="categoryId" >

    @foreach($categories  as $category)
            <option value={{$category->id}}>{{$category->name}}</option>
        @endforeach  
        @error('categoryId') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError    
          </select>
        </div>

   @if(!$tags->count() <= 0)
   <div class="form-group">
          <label for="SelectcaTag"> select Tag</label>
          <!-- //البراكيتس لحفظ القيمة كا ارري  -->
          <select name="tags[]" class="form-control tags" multiple  >

    @foreach($tags  as $tag)
            <option value={{$tag->id}}
            @if($post->hasTag($tag->id))
            selected
            @endif
            
            >{{$tag->name}}</option>
        @endforeach  
        @error('TagId') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError    
          </select>
        </div>
        @endif
<input  type="hidden" name="user_id"  class="form-control" value="{{auth::user()->id}}">
            <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block" style="margin:10px 5px 10px 5px; position:center ">{{isset($post)?       "Edit" :      "Add " }}
                </button>
            </div>
            <!-- <div class="form-group"></div>
            <div class="form-group"></div>
            <div class="form-group"></div> -->
    </form>
  </div>

</div>

@endSection
@section('scripts')




<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script>
      $(document).ready(function() {
        $('.tags').select2();
      });
    </script>

@endSection