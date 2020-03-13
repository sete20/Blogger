@extends('layouts.app')

    @section('content')
    @if(session()->has('error'))
              <div class="alert alert-danger">
                {{session()->get('error')}}
              </div>
    @endif

    <div class="card card-default">
  
        <div class="card-header">
             <h1>All users</h1>
        </div>


<table class="table table-striped">
  <thead>
    <tr>

      
      <th scope="col">Username</th>
      <th scope="col">image</th>
      <th scope="col">permissions</th>
      <th scope="col">Action</th>

     
    </tr>
  </thead>
         @foreach($users as $user)     
         <tbody>
    <tr>
      <td>{{$user->name}}</td>
      <td>
      <img src="{{ $user->hasPicture() ? asset('storage/'.$user->getPicture()) : $user->getGravatar() }}" style="border-radius: 50%" width="60px" height="60px">
      <!-- <img src="{{asset('storage/'.$user->image)}}" width="80px" height="50px"> -->
      </td>
  
      <td>{{$user->role}}</td>
      
   <td>
      @if(! $user->isAdmin())

      <form  method="post" action="{{route('users.make-admin',$user->id)}}">
      {{ csrf_field() }}
      @csrf
      <button class="btn btn-success" type="submit"> make admin</button>
      </form>
    @else
    <form  method="post" action="{{route('users.downgrade',$user->id)}}">
      {{ csrf_field() }}
      @csrf
      <button class="btn btn-danger" type="submit"> Downgrade</button>
      </form>
    @endif
   </td>

    </tr>
  </tbody>
        @endforeach
         </table>

        </div>
    
    </div>


    @endSection









