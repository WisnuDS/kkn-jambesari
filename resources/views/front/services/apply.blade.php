@extends('front.layouts.main')
@section('content')
    <div class="contact" style="margin-top: 100px;">
        <div class="container" >
            <div class="row mt-5 justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                  <form action="{{ route('front.kritik-saran.store') }}" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="row">

                      <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                      </div>

                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" required>
                      </div>

                    </div>

                    <div class="form-group mt-3">
                      <input type="text" class="form-control" name="address" id="address" placeholder="Alamat" required>
                    </div>

                    @foreach ($requirements as $requirement)
                    <div class="form-group mt-3 mt-md-0">
                        <input type="file" class="form-control" name="{{ $requirement->name }}" required>
                    </div>
                    @endforeach

                    <div class="text-center"><button type="submit">Kirim</button></div>
                  </form>
                </div>

              </div>

        </div>
    </div>
@endsection
