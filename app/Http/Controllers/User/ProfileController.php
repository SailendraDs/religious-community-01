<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\GroupPost;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $posts = GroupPost::where(["user_id"=>$user->id,"approved"=>1])->latest()->paginate(10);
        return view("user.profile")->with([
            "user"=>$user,
            "posts"=>$posts,
        ]);
    }
    public function update(Request $request){
        $this->validate($request,[
            "name" => "required|string",
            "email" => "required|email",
            "mobile" => "required",
            "gender" => "nullable",
            "dob" => "nullable",
            "religion" => "required",
            "state" => "required",
            "city" => "required",
            "occupation" => "required",
            "caste" => "nullable",
            "pin_code" => "nullable",
            "aadharno" => "nullable",
            "photo" => "nullable",
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->gender = $request->gender;
        if($user->email !== $request->email){
            if(User::where("email",$request->email)->exists()){
                $request->session()->flash('error', "The email already exists");
                return redirect()->back();
            }
        }
        $user->email = $request->email;
        if($user->mobile !== $request->mobile){
            if(User::where("mobile",$request->mobile)->exists()){
                $request->session()->flash('error', "The mobile number already exists");
                return redirect()->back();
            }
        }
        $user->mobile = $request->mobile;
        $user->dob = $request->dob;
        $user->religion = $request->religion;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->caste = $request->caste;
        $user->occupation = $request->occupation;
        $user->pin_code = $request->pin_code;
        $user->aadharno = $request->aadharno;
        if($request->hasFile("photo")){
            $path = "assets/users/photo/";
            $name = $_FILES["photo"]["name"];
            $tmp_name = $_FILES["photo"]["tmp_name"];
            $name = idate("U").$name;
            if(\move_uploaded_file($tmp_name,$path.$name)){
                if($user->photo!==NULL){
                    unlink($path.$user->photo);
                }
                $user->photo = $name;
            }
            else{
                $request->session()->flash('error', "There is some error in uploading photo");
                return redirect()->back();
            }
        }
        
        $user->save();
        $request->session()->flash('success', "Profile successfully updated");
        return redirect()->back();
    }
    public function view($id){
        $user = User::find($id);
        $posts = GroupPost::where(["user_id"=>$user->id,"approved"=>1])->latest()->paginate(10);
        return view("users.view-profile")->with([
            "user"=>$user,
            "posts"=>$posts,
        ]);
    }
}