@extends('front.layouts.main')
@section('content')
<section id="team" class="team section-bg mt-5">
    <div class="container">

      {{-- Level Loop --}}
      @foreach ($data as $level)
      <div class="section-title" data-aos="fade-up">
        <h2>{{ $level->title }}</h2>
        {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
      </div>

      <div class="row">
        {{-- Staff loop --}}
        @foreach ($level->staff as $staff)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <div class="member" data-aos="fade-up">
            <div class="member-img">
              <img src="{{ asset('/storage/' . $staff->image) }}" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              {{-- Name --}}
              <h4>{{ $staff->name }}</h4>
              {{-- Gelar --}}
              {{-- <span>{{ $level->title }}</span> --}}
            </div>
          </div>
        </div>
        @endforeach
        {{-- staff loop end --}}
      </div>
      @endforeach
      {{-- level loop end --}}

    </div>
  </section><!-- End Our Team Section -->
@endsection
