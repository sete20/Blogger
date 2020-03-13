@extends('layouts.app')

    @section('content')
<div class="clearfix">
<a href="categories/create" class="btn float-right btn-success" style="margin-bottom:10px">Add Category</a>
</div>
    <div class="card card-default">
  
        <div class="card-header">
             <h1>All Categories Is HERE</h1>
        </div>


<table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">Time of Creating</th>
      <th scope="col">Edit Category</th>
      <th scope="col">Delete Category</th>
    </tr>
  </thead>
         @foreach($categories as $category)     
         <tbody>
    <tr>
      <td>{{$category->id}}</td>
      <td>{{$category->name}}</td>
      <td>{{$category->created_at}}</td>
      <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary btn-small">Edit category</a></td>
      <form class="float-right" action="{{route('categories.destroy' ,$category->id)}}" method="Post">
      @csrf
      @method('delete')
      <td>
      <button class="btn btn-danger btn-small" value="delete">Delete Category</button>
      </td>
      </form>
    </tr>
  </tbody>
        @endforeach
         </table>

        </div>
    
    </div>


    @endSection









