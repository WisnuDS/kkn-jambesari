@extends('front.layouts.main')
@section('content')
    <div class="contact" style="margin-top: 100px;">
        <div class="container" >
            <div class="row mt-5 justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                  <form action="{{ route('front.services.submit', $document->id) }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
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

                      <div class="form-group mt-3">
                          <input type="text" class="form-control" name="whatsapp_number" id="address" placeholder="Nomer WA" required>
                      </div>

                    @foreach ($requirements as $requirement)
                    <div class="form-group mt-3 mt-md-0">
                        <label for="form_{{ $requirement->id }}">{{ $requirement->name }}</label>
                        <input type="file" class="form-control" name="form_{{ $requirement->id }}" id="{{ $requirement->name }}" required>
                    </div>
                    @endforeach

                    <div class="text-center"><button type="submit">Kirim</button></div>
                  </form>
                </div>

              </div>

        </div>
    </div>
@endsection
