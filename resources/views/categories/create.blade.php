@extends('layouts.app')

@section('content')
<div class="card card-default">
  
  <div class="card-header">
{{isset($category)?       "Edit Category" :      "Add a New Category" }}

 
  </div>

  <div class="card-body">
        <form action="{{isset($category) ? route('categories.update',$category->id) : route('categories.store')}}" method="post">
        @csrf
        @if(isset($category))
        @method('put')
        @endif
            <div class="form-group">
                <label for="category">Category Name</label>
                <input class="@error('name') is-invalid @endError form-control" name="name" type="text" placeholder="add a new category" value="{{isset($category) ? $category->name : '' }}">
                    @error('name') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div>
            <div class="form-group">
                <button class="btn btn-success">{{isset($category)?       "Edit" :      "Add " }}
</button>
            </div>
            <!-- <div class="form-group"></div>
            <div class="form-group"></div>
            <div class="form-group"></div> -->
        </form>
  </div>

</div>

@endSection