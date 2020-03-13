<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category as categories;
use App\Http\Requests\category;

class CategoriesController extends Controller
{
   
    public function index()
    {
        //لتمرير الموديل كا متغير
        return view('categories.index')->with('categories', categories::all());
    }

  
    public function create()
    {
        return view('categories.create');
    }

  
    public function store(category $request)
    {
     
   
        categories::create($request->all());
        session()->flash('success','category added successfully');
    return redirect(route('categories.index'));
    }

  
    public function edit(categories  $category)
    {
        return view('categories.create')->with('category',$category);
    }
 
    public function update(Request $request, categories $category)
    {
        $category->update([
           "name"=> $request->name

        ]); 
        // $category->save();
        session()->flash('success','category updated successfully');
       
    return redirect(route('categories.index'));
    }

   
  
    public function destroy( categories $category)
    {
        $category->delete();
         // $category->save();
         session()->flash('success','category deleted successfully');
        
     return redirect(route('categories.index'));
     
    }
}
