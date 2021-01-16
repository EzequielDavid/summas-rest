@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 justify-content-end">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('assets/summas-rest.png')}}" style="width: 100%" alt="">
                    </div>
                    <div class="col-md-6">
                        <company-component>

                        </company-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
