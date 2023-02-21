@include('partials.topbar')
@extends('layouts.main')

@section('container')
    <div class="row gx-0 px-4 bg-info bg-opacity-25 about-bg">
        <div class="col-md pe-4 border-end border-dark border-opacity-50 border-3">
            <h2 class="text-center mt-2">Lokasi kami</h2>
            {{-- <div id="map" class="mt-2 mb-4">
            </div> --}}
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1978.7528051525571!2d108.76638702643523!3d-7.29694886934831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMTcnNDcuOSJTIDEwOMKwNDUnNTYuNiJF!5e0!3m2!1sid!2sid!4v1676994776821!5m2!1sid!2sid" width="600" height="380" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="col-md-6 ps-5">
            <h2 class="text-dark text-center mt-2">Hubungi Kami</h2>
            
            <div class="row">
                <div class="col d-flex">
                    <i class="bi bi-geo-alt-fill fs-1 text-danger align-self-center"></i>
                    <span class="ms-3">
                        <h4 class="mb-0">
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
            </div>
            <div class="row">
                <div class="col d-flex">
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
            </div>
            <div class="row">
                <div class="col d-flex">
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