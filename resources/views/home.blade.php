@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                    <!-- IDEA BOX -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Idea Box</div>
                            <div class="card-body">test ideas</div>
                        </div>
                    </div>

                        <!-- EVENT BOX -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Events</div>
                                <div class="card-body">test event</div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
