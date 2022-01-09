<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Auth;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::where("user_id",Auth::user()->id)->latest()->paginate(15);
        return view("mentee.transactions")->with([
            "transactions" => $transactions
        ]);
    }
    public function razorpay($id,Request $request){
        return view("users.payments.razorpay")->with([
            "id"=>$id,
            "amount"=>$request->amount,
        ]);
    }
    public function razorpayPay($id,Request $request){
        $input = $request->all();
        $api = new Api(env("RAZORPAY_KEY"), env("RAZORPAY_SECRET"));
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
            $transaction->campaign_id = $id;
            $transaction->amount = $payment['amount']/100;
            $transaction->status = "Paid";
            $transaction->payment_gateway = "Razorpay";
            $transaction->save();
            
            // Mail
            $user = Auth::user();
            $sub = "Welcome to ".$item->title;
            $message="<p>Dear ".$user->name.",</p><p>You have successfully enrolled to ".$item->title.".</p>";
            $data = array('sub'=>$sub,'message'=>$message);
            Mail::to($user->email)->send(new GlobalMail($data));
    
            $notification = new Notification;
            $notification->user_id = $user->id;
            $notification->message = "You have successfully enrolled to ".$item->title;
            $notification->save();
            $request->session()->flash('success', "You have successfully enrolled to the program");
            return redirect()->route('programs.view', [$item->id,md5($item->title)]);
        }
    }
}
