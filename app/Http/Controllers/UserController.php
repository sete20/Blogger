<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\profile;
class UserController extends Controller
{
        public function index(){
            return view('user.index')->with('users',user::all());
        }

        public function makeAdmin(User $user){
           $user->role="admin";
           $user->save();
           return redirect()->back();
        }
        
        public function Downgrade(User $user){
            $user->role="writer";
            $user->save();
            return redirect()->back();
         }

         public function edit(user $user ){
            $profile = $user->profile;
        return view('user.profile',['user'=>$user,'profile'=>$profile]);
         }
     
        public function update(Request $request , user $user){
            $profile= $user->profile;
              $date=$request->all();
             if ($request->hasFile('image')) {
              $picture = $request->image->store('profilesPicture','public');
              $date['image']=$picture;
                              }
                              $profile->update($date);
            session()->flash('success', 'user Updated Successfully');
    
            return redirect(route('users.index'));
        }
}
