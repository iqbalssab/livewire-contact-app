@include('partials.topbar')
@extends('layouts.main')

@section('container')
    <div class="row px-4 bg-info bg-opacity-25">
        <div class="col-md border-end border-dark">
            <h2 class="text-center mt-2">Lokasi kami</h2>
            <div id="map" class="mt-2 mb-4">
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="text-dark text-center mt-2">Hubungi Kami</h2>
            <div class="d-flex flex-column">
            <div class="d-flex">
                <i class="bi bi-geo-alt-fill fs-1 text-danger align-self-center"></i>
                <span class="ms-3">
                    <h4 class="mb-2">
                        LaraWire Contact App
                    </h4>
                    <p class="my-0">
                        Jalan Dr. Wahidin RT 6/3,
                        Sindangsari
                    </p>
                    <p class="my-0">
                       <b> Majenang, Kab. Cilacap</b>
                    </p>
                    <p>
                        <b> 53257</b>
                    </p>
                </span>
            </div>
            <div class="d-flex">
                <i class="bi bi-whatsapp text-success align-self-center fs-1"></i>
                <span class="ms-3">
                    <h4 class="mb-2">
                        Whatsapp
                    </h4>
                    <p>
                        <b>+6281902796478</b>
                    </p>
                </span>
            </div>
            <div class="d-flex">
                <i class="bi bi-facebook text-primary align-self-center fs-1"></i>
                <span class="ms-3">
                    <h4 class="mb-2">
                        Facebook
                    </h4>
                    <p>
                        <b>@iqbal.ssab</b>
                    </p>
                </span>
            </div>
            </div>
        </div>
    </div>
  
@endsection