@include('partials.topbar')
@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="">
            @livewire('contact-carousel')
        </div>
    </div>
  
@endsection