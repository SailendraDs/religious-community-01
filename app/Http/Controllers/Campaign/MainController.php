<?php

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Location;

class MainController extends Controller
{
    public function index(){
        $campaigns = Campaign::latest()->paginate(16);
        return view("campaigns.index")->with([
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
            return view("campaigns.view")->with([
                "campaign"=>$campaign,
            ]);
        }
        else{
            abort(404);
        }
    }
}