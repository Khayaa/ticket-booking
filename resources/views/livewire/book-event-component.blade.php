<div class="container-xl">
    <!-- Page title -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    Book Event
                </h2>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    <h2>Price <span class="badge bg-blue">R {{ $event->price }}</span></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <img src="{{ url('/storage/image/events/' . $event->thumbnail) }}" height="300" width="300" class="card-img"
            alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $event->title }}</h5>
            <p class="card-text">{{ $event->description }}.</p>
            <div class="hr-text">Event Date and Time</div>
            <p class="card-text text-center"><small class="text-muted"> {{ $event->date }} ,
                    {{ $event->time }}</small></p>
        </div>
    </div>
    <div class="hr-text">Book Ticket</div>
    <div class="card">
        <div class="card-body">


            <div class="mb-3">

                <div class="form-label">Select Number of Tickets</div>
                <select class="form-select" name="number_of_tickets" wire:model="number_of_tickets"
                    wire:click="ApplyDiscount">
                    <option value="1">One</option>
                    <option value="2">Two</option>

                </select>



            </div>
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        @if ($number_of_tickets == 2)
                            <span class="status status-green">
                                [Discount Applied ] You saved : R {{ $discount }}
                            </span>
                        @endif

                    </div>
                    <h2 class="page-title">

                    </h2>
                </div>
                <div class="col-auto ms-auto">
                    <div class="btn-list">
                        <h2>Total : <span class="badge bg-blue">R {{ $total }}</span></h2>
                    </div>
                </div>
                <br><br>
                @if ($event->number_of_tickets == $event->sold_tickets)
                <div class="text-center">
                    <h2>
                        <span class="badge bg-red">Event has been sold Out</span>
                    </h2>

                </div>
                @else
                <a href="#" wire:click="BookEvent" class="btn btn-primary">
                    <span wire:loading wire:target="BookEvent" class="spinner-border spinner-border-sm me-2" role="status"></span>
                    Book Event

                </a>
                @endif

                <br>

                <br>
            </div>
        </div>
    </div>
