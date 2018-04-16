@section('title', 'Home')
@extends('layouts.header')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="flex-center position-ref full-height">
                <div>
                    <img src="{{URL::asset('/img/logo.png')}}" alt="BDE Picture" height="160" width="180"/>
                </div>
                <div class="content">
                    <div class="title m-b-md">
                        Welcome
                    </div>

                    <div class="subtitle">
                        on the BDE's Website
                    </div>
                </div>
                <div class="logo-exia">
                    <img src="{{URL::asset('/img/logo-exia.png')}}" alt="EXIA Picture"
                         style="-webkit-filter: grayscale(20%); filter: grayscale(20%);" height="120" width="160"/>
                </div>
            </div>
        </div>
    </div>
@endsection