<?php

namespace App\Http\Controllers\Group\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Group;
use App\Models\Location;

class MainController extends Controller
{
    public function home(){
        $campaigns = Campaign::latest()->paginate(16);
        return view("groups.campaigns.home")->with([
            "campaigns" => $campaigns
        ]);
    }
    public function view($id,$title){
        $campaign = Campaign::find($id);
        if($campaign===NULL){
            abort(404,"The content you are trying to access does not exist");
        }
        if($title == md5($campaign->title)){
            $campaign->images = json_decode($campaign->images);
            return view("groups.campaigns.view")->with([
                "campaign"=>$campaign,
            ]);
        }
        else{
            abort(404);
        }
    }
}