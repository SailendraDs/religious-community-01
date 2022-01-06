<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Program;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\Api as APIs;
use App\Models\EnrolledProgram;
use App\Models\EnrolledEvent;
use Auth;
use PaytmWallet;
use Illuminate\Support\Facades\Mail;
use App\Mail\GlobalMail;
use App\Models\Notification;
use LoveyCom\CashFree\PaymentGateway\Order;

class PaymentController extends Controller
{
    public function choose($type,$id,Request $request){
        if($type==="campaigns"){
        
            $amount = $request->amount;
            $item = Campaign::find($id);
            
        }
        
        return view("users.payments.choose")->with([
            "type"=>$type,
            "id"=>$id,
            "item"=>$item,
            "amount"=>$amount,
            
        ]);
    }
    public function razorpay($type,$id,Request $request){
        if($type==="campaigns"){
            $item = Campaign::find($id);
        }
        
        if($item===NULL){
            Session()->flash("error","The item does not exist");
            return redirect()->back();
        }
        return view("users.payments.razorpay")->with([
            "type"=>$type,
            "item"=>$item,
        ]);
    }
    public function razorpayPay($type,$id,Request $request){
        
        if($type==="campaigns"){
            $item = Campaign::find($id);
           
        }
        
        if($item===NULL){
            Session()->flash("error","The item does not exist");
            return redirect()->back();
        }
        $input = $request->all();
        //get API Configuration 
        $apis = APIs::first();
        $api = new Api($apis->razorpay_key_id, $apis->razorpay_key_secret);
        //Fetch payment information by razorpay_payment_id
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }

            $transaction = new Transaction;
            $transaction->transaction_id = $input['razorpay_payment_id'];
            $transaction->user_id = Auth::user()->id;
            $transaction->item_type = $type;
            $transaction->item_id = $item->id;
            $transaction->amount = $payment['amount']/100;
            $transaction->status = "Paid";
            $transaction->payment_gateway = "Razorpay";
            $transaction->save();

            $owner->wallet += $payment['amount']/100;
            $owner->save();

            if($type==="campaigns"){
                $item = Campaign::find($id);
                $enroll = new EnrolledProgram;
                $enroll->user_id = Auth::user()->id;
                $enroll->program_id = $item->id;
                $enroll->day = $request->date;
                $enroll->time = $request->time;
                $enroll->type = $request->typee;
                $enroll->save();
                

                $request->session()->flash('success', "You have successfully enrolled to the program");
                return redirect()->route('programs.view', [$item->id,md5($item->title)]);
            }
            
        }
    }

    
}