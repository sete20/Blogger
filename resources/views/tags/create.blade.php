@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($tag) ? "Update Tag" : "Add a new Tag" }}
        </div>
        <div class="card-body">
        <form action="@if(isset($tag))
        {{route('Tags.update',$tag->id)}}
         @else
         {{route('Tags.store')}}
         @endif 
         "method="POST">
                @csrf
                @if (isset($tag))
             
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="tag">Tag Name:</label>
                <input type="text" name="name" class="@error('name') is-invalid @enderror form-control"  value="{{ isset($tag) ? $tag->name : "" }}">
                    @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        {{ isset($tag) ? "Update" : "Add" }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
