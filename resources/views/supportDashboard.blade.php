@extends('layouts.master')

@section('title')
    Support Dashboard
@endsection

@section('content')
    <div class="container">
        <h2>Support Tickets</h2>
        <p class="lead">
            This is the list of most recent support tickets.
            Click the "Call customer" button to start a phone
            call from your browser.
        </p>
        <div class="row">
            <div class="col-md-4 col-md-push-8">
                <div class="panel panel-primary client-controls">
                    <div class="panel-heading">
                        <h3 class="panel-title">Make a call</h3>
                    </div>
                    <div class="panel-body">
                        <p><strong>Status</strong></p>
                        <div class="well well-sm" id="call-status">
                            Connecting to Twilio...
                        </div>
                        <button class="btn btn-lg btn-success answer-button" disabled>Answer call</button>
                        <button class="btn btn-lg btn-danger hangup-button" disabled onclick="hangUp()">Hang up</button>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-md-pull-4">
                @foreach ($tickets as $ticket)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ticket #{{ $ticket-&gt;id }} <small class="pull-right">{{ $ticket-&gt;created_at }}</small></h3>
                        </div>

                        <div class="panel-body">

                            <div class="pull-right">
                                <button onclick="callCustomer('{{ $ticket-&gt;phone_number }}')" type="button" class="btn btn-primary btn-lg call-customer-button">
                                    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                                    Call customer
                                </button>
                            </div>

                            <p><strong>Name:</strong> {{ $ticket-&gt;name }}</p>
                            <p><strong>Phone number:</strong> {{ $ticket-&gt;phone_number }}</p>
                            <p><strong>Description:</strong></p>
                            {{ $ticket-&gt;description }}

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection('content')
