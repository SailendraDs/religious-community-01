<?php

namespace App\Http\Controllers\Group\Campaign;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Group\MainController;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Group;
use App\Models\Location;
use App\Models\Category;
use Auth;

use App\Models\Notification;

class CampaignController extends Controller
{
    public function index(){
        
        $campaigns = Campaign::where(["owner_id"=>Auth::user()->id])->latest()->paginate(15);
        return view("groups.campaigns.index")->with([
            "campaigns"=>$campaigns
        ]);
    }

    public function create(){
        $group = Group::find($id);
        $cats = Category::latest()->get();
        $locations = Location::latest()->get();
        return view("groups.campaigns.create")->with([
            "cats"=>$cats,
            "locations"=>$locations,
            "groups"=>$groups,
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            "title"=>"required",
            "category"=>"required",
            "group"=>"required",
            "description"=>"required",
            "thumbnail"=>"required|image",
            "images"=>"required",
            "Instructions"=>"null",
    
        ]);
        $group = Group::find($id);
        if($group===NULL){
            abort(404,"The content you are trying to access does not exist");
        }
        if($group->owner_id == Auth::user()->id){

        $campaign = new Campaign;
        $campaign->title = $request->title;
        $campaign->description = $request->description;
        $campaign->category_id = $request->category;
        $campaign->group_id = $request->group;
        $campaign->owner_id = Auth::user()->id;
        $campaign->instructions = $request->instructions;
        
        if($request->hasFile("thumbnail")){
            $tpath = "assets/campaigns/thumbnail/";
            $name = $_FILES["thumbnail"]["name"];
            $tmp = $_FILES["thumbnail"]["tmp_name"];
            $name = idate("U").$name;
            if(\move_uploaded_file($tmp,$tpath.$name)){
                $campaign->thumbnail = $name;
            }
            else{
                $request->session()->flash('error', "There is some problem in uploading thumbnail");
                return redirect()->back();
            }
        }
        $images = [];
        foreach($_FILES["images"]["tmp_name"] as $key => $img){
            $ext = explode(".",$_FILES["images"]["name"][$key])[1];
            $name = \chunk_split(\base64_encode(\file_get_contents($img)));
            $name = "data:image/".$ext.";base64,".$name;
            $images[] = $name;
        }
        $campaign->images = \json_encode($images);
        $campaign->save();

    
        $request->session()->flash('success', "Campaign created.");
        return redirect()->route('groups.campaigns.home');
}
        else{
            abort(404);
        }
    }

    
    public function delete(Request $request){
        $this->validate($request,[
            "id"=>"required"
        ]);
        $campaign = Campaign::find($request->id);
        unlink("assets/campaigns/thumbnail/".$campaign->thumbnail);
        
        $campaign->delete();
        $request->session()->flash('success', "Campaign successfully deleted");
        return redirect()->back();
    }

   
}