<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Location;
use App\Models\Category;
use Auth;

use App\Models\Notification;

class CampaignController extends Controller
{
    public function index(){
        $campaigns = Campaign::where(["owner_id"=>Auth::user()->id])->latest()->paginate(15);
        return view("users.campaigns.index")->with([
            "campaigns"=>$campaigns
        ]);
    }
    public function create(){
        $cats = Category::latest()->get();
        $locations = Location::latest()->get();
        return view("users.campaigns.create")->with([
            "cats"=>$cats,
            "locations"=>$locations
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            "title"=>"required",
            "category"=>"required",
            "location"=>"null",
            "description"=>"required",
            "thumbnail"=>"required|image",
            "images"=>"required",
            "Instructions"=>"null",
    
        ]);
        $campaign = new Campaign;
        $campaign->title = $request->title;
        $campaign->description = $request->description;
        $campaign->category_id = $request->category;
        $campaign->location_id = $request->location;
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
        return redirect()->route('user.campaigns');

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