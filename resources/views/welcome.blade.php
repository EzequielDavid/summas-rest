@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-6  mt-5">
                <div class="col-md-12">
                    <p class="text-xl-center" style="font-size: 1.6em">Welcome to <strong class="text-primary">Summas-rest</strong> system, where the employee
                        management is how take a walk in the park
                    </p>
                    <img src="{{asset('assets/developer.jpg')}}" style="width: 100%; height: 55vh" alt="">
                </div>
            </div>

            <div class="col-md-6">
                <img src="{{asset('assets/welcome.jpg')}}" alt="" style="width: 100%; height: 80vh">
            </div>

            </div>
        </div>
    </div>
@endsection
