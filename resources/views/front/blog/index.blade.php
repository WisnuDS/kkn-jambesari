@extends('front.layouts.main')
@section('content')
<section id="blog" class="blog mt-5">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8 entries">

          @foreach ($data['articles'] as $article)
          <article class="entry">

            <div class="entry-img">
              <img src="{{ asset('/storage/' . $article->cover) }}" width="100%" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="blog-single.html">{{ $article->title }}</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{ $article->user->name }}</a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{$article->created_at->format('d M Y')}}">{{ $article->created_at->format('d M Y') }}</time></a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p>
                {!! $article->body !!}
              </p>
              <div class="read-more">
                <a href="{{ route('front.blog.show', ['id' => $article->id]) }}">Read More</a>
              </div>
            </div>

          </article><!-- End blog entry -->
          @endforeach


          <!-- Pagination -->
          {{ $data['articles']->links('front.layouts.pagination') }}
        <!-- End Pagination -->

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar">

            <h3 class="sidebar-title">Search</h3>
            <div class="sidebar-item search-form">
              <form action="">
                <input type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div><!-- End sidebar search formn-->

            <h3 class="sidebar-title">Categories</h3>
            <div class="sidebar-item categories">
              <ul>
                  @foreach ($data['categories'] as $category)
                    <li><a href="{{ route('front.blog.category', ['id' => $category->id]) }}">{{ $category->title }}</a></li>
                  @endforeach
              </ul>
            </div><!-- End sidebar categories-->

            <!-- Recent Post -->
            <h3 class="sidebar-title">Recent Posts</h3>
            <div class="sidebar-item recent-posts">
                @foreach($data['recent_posts'] as $post)
                <div class="post-item clearfix">
                    <img src="{{ asset('/storage/' . $post->cover) }}" height="50px" alt="Image">
                    <h4><a href="{{ route('front.blog.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h4>
                    <time datetime="{{  $post->created_at->toDateString() }}">{{ $post->created_at->format('d M Y') }}</time>
                </div>
                @endforeach
            <!-- End Recent Post -->

            </div><!-- End sidebar recent posts-->

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Section -->
@endsection

@push('styles')
    <style>
        .page-item.active .page-link{
            background-color: #1bbd36;
            border-color: #ececec;
        }

        .page-link{
            color: #1bbd36;
        }

        .page-link:hover{
            color: #2ae149;
        }
    </style>
@endpush
