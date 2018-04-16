@section('title', 'Events')
@extends('layouts.header')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Event</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                    @endif
                    <!-- EVENT BOX -->
                        <div class="card-body" style="text-align:center;">UPCOMMING EVENTS<br>↓ ↓ ↓ ↓</div>

                    </div>
                </div>
            </div>
        </div>

@endsection
