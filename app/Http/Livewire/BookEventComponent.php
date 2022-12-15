<?php

namespace App\Http\Livewire;

use App\Models\Events;
use App\Models\Tickets;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Auth;
use Omnipay\Omnipay;
use AmrShawky\LaravelCurrency\Facade\Currency;
use Termwind\Components\Dd;

class BookEventComponent extends Component
{
    use LivewireAlert;
    public Events $event;
    public $number_of_tickets = 1;
    public $discount = 0;
    public $total;
    public $price;
    protected $listeners = [
        'confirmed'
    ];

    private $gateway;


    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_SECRET_KEY'));
        $this->gateway->setTestMode(true);
    }
    public function mount($slug)
    {
        $this->event = Events::where('slug', $slug)->first();
        $this->total = $this->event['price'];
    }

    public function ApplyDiscount()
    {

        if($this->event['price'] > 0){
            if ($this->number_of_tickets == 1) {
                $this->total = $this->event['price'];
                $this->discount = 0;
            } else {

                $this->price = $this->event['price'] * 2;
                $this->discount = $this->price / 100 * 10;
                $this->total = $this->price - $this->discount;
            }
        }

    }

    public function confirmed()
    {
        // Do something
        return redirect()->to('user/ticket');
    }

    public function BookEvent()
    {

        if ($this->number_of_tickets == 2 and $this->event['number_of_tickets'] - $this->event['sold_tickets'] == 1) {


            $this->alert('warning', 'Opps!! , There is only one ticket left ', [
                'toast' => true,
                'position' => 'center'
            ]);

        } else {
           if ($this->event['price'] <= 0){

           }else{
            try {
                    $price = Currency::convert()
                    ->from('ZAR')
                    ->to('USD')
                    ->amount($this->total)
                    ->get();
                    $amount = number_format($price,2);
                    // dd($amount);
                $response = $this->gateway->purchase(
                    array(
                        'amount' => $amount,
                        'currency' => env('PAYPAL_CURRENCY'),
                        'returnUrl' => url('payment/success/'.$this->event['id']),
                        'cancelUrl' => url('payment/error'),
                        'description'=>  "hey",
                        'transactionId'=> $this->event['id'],


                    )
                )->send();

                if ($response->isRedirect()) {
                    $url = $response->getRedirectUrl();
                    return redirect($url);


                } else {


                    return  $this->alert('error', $response->getMessage(), [
                        'toast' => true,
                        'position' => 'center'
                    ]);
                }

            } catch (\Throwable $th) {
                //throw $th;
                return  $this->alert('error', $th->getMessage(), [
                    'toast' => true,
                    'position' => 'center'
                ]);
            }
           }


            // $this->alert('success', 'Event Successfully Booked', [
            //     'showConfirmButton' => true,
            //     'confirmButtonText' => 'Check your Ticket',
            //     'onConfirmed' => 'confirmed',
            //     'allowOutsideClick' => false,
            //     'timer' => null,
            //     'position' => 'center'
            // ]);
            // $this->alert('success', 'You have succesfully Booked the Event');
            // $this->alert('success', 'You have successfully Booked the Event' ,  [
            //     'position' => 'center',
            //     'showConfirmButton' => true,
            //     'toast' => true
            // ]);
            // return redirect('user/ticket');
        }







    }




    public function render()
    {

        return view('livewire.book-event-component', ['event' => $this->event])->extends('layouts.app')->section('content');
        ;
    }
}
