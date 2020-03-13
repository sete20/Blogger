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
        PROFILE

 
  </div>

  <div class="card-body">
    <form  action="{{route('users.update',$user->id)}}"  method="post" enctype="multipart/form-data">
        @csrf
     
        <div class="form-group">
                <label for="name">name</label>
                <input class="  form-control" name="name" type="text" placeholder="name"  value="{{ $user->name  }}">
                    @error('name') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div>


            <div class="form-group">
                <label for="email">email</label>
                <input class="  form-control" name="email" type="email" placeholder="email"  value="{{$user->email}}">
                    @error('name') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div>
          
            @if(isset($user))
            <div class="form-group">
            <img src="{{ $user->hasPicture() ? asset('storage/'.$user->getPicture()) : $user->getGravatar() }}" style="border-radius: 50%" width="60px" height="60px">
            </div>
            @endif

            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" value="{{ $user->image}}">
                <label class="custom-file-label" for="image" >Select image</label>
                @error('image') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div>

            <div class="form-group">
                <label for="about" style="text-align:center">about</label>

                <input id="x" type="hidden" name="about"  class="form-control" value="{{$profile->about }}">
                <trix-editor input="x"></trix-editor>
                <!-- <textarea  roe="3"  name="content" class="form-control" rows="5"   placeholder="Write a content"></textarea> -->

                    @error('about') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div>
            <div class="form-group">
                <label for="facebook" style="text-align:center">facebook</label>

                <input  type="text" name="about"  class="form-control" value="{{$profile->facebook}}">
          
                <!-- <textarea  roe="3"  name="content" class="form-control" rows="5"   placeholder="Write a content"></textarea> -->

                    @error('facebook' )
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div>

            
            <div class="form-group">
                <label for="twitter" style="text-align:center">twitter</label>

                <input  type="text" name="twitter"  class="form-control" value="{{$profile->twitter }}">
          
                <!-- <textarea  roe="3"  name="content" class="form-control" rows="5"   placeholder="Write a content"></textarea> -->

                    @error('twitter') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div>
<!-- 

            <div class="form-group">
                <label for="current-password">current password</label>
                <input class="  form-control" name="current-password" type="password" >
                    @error('name') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div>

            <div class="form-group">
                <label for="new-password">new password</label>
                <input class="  form-control" name="new_password" type="password" >
                    @error('name') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div>


            <div class="form-group">
                <label for="password-confirm">password confirmation</label>
                <input class="  form-control" name="password_confirm" type="password">
                    @error('name') 
                    <div class="alert alert-danger">
                    {{$message}}
                    </div>
                    @endError
            </div> -->




            <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block" style="margin:10px 5px 10px 5px; position:center ">EDIT PROFILE
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