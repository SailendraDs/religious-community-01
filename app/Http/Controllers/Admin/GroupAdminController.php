<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupAdmin;
use App\Models\Group;
use Illuminate\Support\Facades\Hash;

class GroupAdminController extends Controller
{
    public function index(){
        $groupadmins = GroupAdmin::paginate(15);
        return view('admin.groupadmins.index')->with([
            'groupadmins' => $groupadmins
        ]);
    }
    public function create(){
        $groups = Group::latest()->get();
        return view("admin.groupadmins.create")->with([
            "groups" => $groups,
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'group_id' => 'required',
        ]);
        $groupadmin = new GroupAdmin;
        $groupadmin->name = $request->name;
        $groupadmin->email = $request->email;
        $groupadmin->username = $request->username;
        $groupadmin->password = Hash::make($request->password);
        $groupadmin->phone = $request->phone;
        $groupadmin->group_id = $group->id;
        $groupadmin->groupadmin_id = "GroupAdmin_".$groupadmin->id;
        $groupadmin->save();
        $request->session()->flash('success', "Successfully Created");
        return redirect()->route('admin.groupadmins');
    }
    public function delete(Request $request){
        $this->validate($request,[
            'id' => 'required',
        ]);
        GroupAdmin::find($request->id)->delete();
        $request->session()->flash('success', 'Deleted Successfully');
        return redirect()->back();
    }
}