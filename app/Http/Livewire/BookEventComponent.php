<?php

namespace App\Http\Livewire;

use App\Models\Events;
use App\Models\Tickets;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Auth;

class BookEventComponent extends Component
{
    use LivewireAlert;
    public Events  $event;
    public $number_of_tickets = 1;
    public $discount =  0;
    public $total;
    public $price;

    protected $listeners = [
        'confirmed'
    ];

    public function mount($id)
    {
        $this->event =  Events::find($id);
        $this->total = $this->event['price'];
    }

    public function ApplyDiscount()
    {

        if ($this->number_of_tickets == 1) {
            $this->total = $this->event['price'];
            $this->discount = 0;
        } else {

            $this->price = $this->event['price'] * 2;
            $this->discount = $this->price / 100 * 10;
            $this->total = $this->price - $this->discount;
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
            
            $this->alert('warning', 'Opps!! , There is only one ticket ', [
                'position' => 'center'
            ]);
        } else {
            $ticket = new  Tickets();
            $ticket->user_id = Auth::user()->id;
            $ticket->name = Auth::user()->name;
            $ticket->surname = Auth::user()->surname;
            $ticket->phone_number = Auth::user()->phone_number;
            $ticket->id_number = Auth::user()->id_number;
            $ticket->email = Auth::user()->email;
            $ticket->number_of_tickets = $this->number_of_tickets;
            $ticket->total = $this->total;
            $ticket->event_id = $this->event['id'];
            $ticket->status = "completed";
            $ticket->save();
            $this->event->update([
                'sold_tickets' => $this->event['sold_tickets'] + $this->number_of_tickets,
            ]);
            $this->alert('success', 'Event Successfully Booked', [
                'showConfirmButton' => true,
                'confirmButtonText' => 'Check your Ticket',
                'onConfirmed' => 'confirmed',
                'allowOutsideClick' => false,
                'timer' => null,
                'position' => 'center'
            ]);

            return redirect()->to('user/ticket');
        }


        //code...




    }




    public function render()
    {

        return view('livewire.book-event-component', ['event' => $this->event])->extends('layouts.app')->section('content');;
    }
}
