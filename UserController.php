<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;



class UserController extends Controller
{
  
    public function login(Request $request){
           $data =  $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            
        ]);
           if(Auth::attempt($data)){//if the above data exists in the table then return index file else redirect the user to the login page
            return redirect()->route('index');
           }else{
            return redirect()->route('login');
           }
    }

    public function index(){
        return view('index');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function profile(int $id){//when ever this function will be called through the profile btn then the gate function will automatically run in the appServiceProviders folder

        // Gate::authorize('profile',$id);//this is a short method of below method if this condition will be true then the code below this authorization will automatically work if the condition is false
        // // then it will automatically direct user to the 403 page(unathourized error page);

        // $user = User::findOrFail($id);
        //   return view('profile',compact('user')); 


        if(Gate::allows('profile',$id)){//we are matching this id with the user login id in AppServeiceProvider file

             $user = User::findOrFail($id);
        // return  $user;   
          return view('profile',compact('user')); 
        }
        else{
            return redirect()->route('index')->with('error', 'Unauthorized access.');
        }

   
       
    }

    public function posts($id){

        $posts = Post::where('user_id',Auth::user()->id)->get();
        //we first went into the post table and collected posts which user_id matches with user()->id
        //collected posts of a user which clicked on the post btn
        // return $post;

        return view('posts',compact('posts'));
    }

    public function update(int $id){
        $post = Post::findorFail($id);//getting post id//we are getting post id(id of the post) on the url 
        $targetUser = $post->user_id;//getting user_id from post id and sending it to the gate function in appserviceprovider
        
        Gate::authorize('update',$targetUser);
        return $post;

        //if we want to check multiple conditions to run true from gate function then we will use any method like:
        
            //if(Gate::any(['update','profile'],$targetUser)){} and then else
            // now in this condition one of the gate function condition have to be true or no authorization will proced to run
            //and for none() method where both conditions have to be false to run the authorization

        // if(Gate::allows('update',$targetUser)){//we are checking that is the post user_id which we are updating and user id matches or not
        // return $post;

        // }else{
        //     return redirect()->route('index');

        // }

    }

    
}
