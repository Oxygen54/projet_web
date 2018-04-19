@section('title', 'Contact Form')
@extends('layouts.header')
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Contact Form</h2>
            </div>
            @if(Session::has('success'))
                <div class="row">
                    <div class="col-md-4 col-md-4"></div>
                    <div id="charge-message" class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            <div class="panel-body">

                <div class="alert alert-danger hide-box mt-4" id="contactError">
                    <p><strong>Error!</strong> Problem sending message</p>
                    <span class="text-1 mt-2 d-block" id="mailErrorMessage"></span>
                </div>

                <form id="contactForm" action="{{ url('/send') }}" method="POST">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label>Name *</label>
                        <input type="text" value="" data-msg-required="Please enter your name"
                               maxlength="100" class="form-control" name="name" id="name" placeholder="Name"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" value="" data-msg-required="Please enter your email"
                               data-msg-email="Please enter a valid email" maxlength="100" class="form-control"
                               name="email" id="email" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label>Message *</label>
                        <textarea maxlength="5000" data-msg-required="Please enter your message" rows="8"
                                  class="form-control" name="message" id="message" placeholder="Message"
                                  required></textarea>
                    </div>

                    <input type="submit" value="Send Message" class="btn btn-primary" data-loading-text="Sending...">
                </form>

            </div>
        </div>
    </div>
    <script src="{{ asset('/js/jquery.validation.min.js') }}"></script>
    <script src="{{ asset('/js/contact.js') }}"></script>
@endsection
