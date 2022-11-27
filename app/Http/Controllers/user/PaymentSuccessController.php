<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Tickets;
use App\Models\Events;
use Illuminate\Console\Scheduling\Event;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class PaymentSuccessController extends Controller
{
    //
    private $gateway;


    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_SECRET_KEY'));
        $this->gateway->setTestMode(true);
    }

    public function success($event_id, Request $request)
    {
        $message  =  "";
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(
                array(
                    'payer_id' => $request->input('PayerID'),
                    'transactionReference' => $request->input('paymentId')
                )
            );

            $response = $transaction->send();
            if ($response->isSuccessful()) {
                $data = $response->getData();



                $ticket = new Tickets();
                $ticket->user_id = Auth::user()->id;
                $ticket->name = Auth::user()->name;
                $ticket->surname = Auth::user()->surname;
                $ticket->phone_number = Auth::user()->phone_number;
                $ticket->id_number = Auth::user()->id_number;
                $ticket->email = Auth::user()->email;
                $ticket->number_of_tickets = 1;
                $ticket->total = $data['transactions'][0]['amount']['total'];
                $ticket->event_id = $event_id;
                $ticket->status = "completed";
                $ticket->save();
                $event = Events::find($event_id);
                $event->update([
                    'sold_tickets' => $event->sold_tickets + 1,
                ]);

                $payment = new Payment();
                $payment->user_id = Auth::user()->id;
                $payment->event_id = $event_id;
                $payment->price = $data['transactions'][0]['amount']['total'];
                $payment->status = "success";
                $payment->save();
                $message =  "Payment Successful";

            } else {
                $message = $response->getMessage();
            }

        } else {
            $message =  " Transaction Canceled ";

        }

        return view('users.payment-success' , compact('message'));
    }


}
