<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Location;
use App\Models\GroupMember;
use Auth;

class GroupController extends Controller
{
    public function index(){
        $groups = Group::where(["owner_id"=>Auth::user()->id])->latest()->paginate(10);
        return view("users.groups.index")->with([
            "groups" => $groups
        ]);
    }
    public function create(){
        $locations = Location::latest()->get();
        return view("users.groups.create")->with([
            "locations" => $locations
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            "name"=>"required",
            "description"=>"required",
            "location"=>"required",
            "photo"=>"required|image",
        ]);
        $group = new Group;
        $group->name = $request->name;
        $group->description = $request->description;
        $group->cid = $request->location;
        $group->owner_id = Auth::user()->id;
        if($request->hasFile("photo")){
            $path = "assets/groups/photo/";
            $name = $_FILES["photo"]["name"];
            $tmp = $_FILES["photo"]["tmp_name"];
            $name = idate("U").$name;
            if(\move_uploaded_file($tmp,$path.$name)){
                $group->photo = $name;
                $group->save();
                

                $groupm = new GroupMember;
                $groupm->group_id = $group->id;
                $groupm->user_id = Auth::user()->id;
                $groupm->approved = 1;
                $groupm->save();
                return redirect()->route("groups.view",[$group->id,md5($group->name)]);
            }
            else{
                $request->session()->flash('error', "There is some problem in uploading the photo");
                return redirect()->back();
            }
        }
    }
    public function member(){
        $members = GroupMember::where(["user_id"=>Auth::user()->id])->latest()->paginate(10);
        return view("users.groups.member")->with([
            "members" => $members
        ]);
    }
    public function view(){
        $members = GroupPost::where(["user_id"=>Auth::user()->id])->latest()->paginate(10);
        return view("users.groups.member")->with([
            "members" => $members
        ]);
    }
}