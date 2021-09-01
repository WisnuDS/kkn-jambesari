@extends('front.layouts.main')
@section('content')
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog mt-5">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <div class="entry-img">
                            <img src="{{ asset('/storage/' . $data['article']->cover) }}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="blog-single.html">{{ $data['article']->title }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-single.html">{{ $data['article']->user->name }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html"><time
                                            datetime="2020-01-01">{{ $data['article']->created_at->format('d M Y') }}</time></a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            {!! $data['article']->body !!}
                        </div>

                        <div class="entry-footer">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="#">Business</a></li>
                            </ul>

                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>
                        </div>

                    </article><!-- End blog entry -->

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
                                    <li><a
                                            href="{{ route('front.blog.category', ['id' => $category->id]) }}">{{ $category->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- End sidebar categories-->

                        <!-- Recent Post -->
                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">
                            @foreach ($data['recent_posts'] as $post)
                                <div class="post-item clearfix">
                                    <img src="{{ asset('/storage/' . $post->cover) }}" alt="">
                                    <h4><a
                                            href="{{ route('front.blog.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                                    </h4>
                                    <time
                                        datetime="{{ $post->created_at->toDateString() }}">{{ $post->created_at->format('d M Y') }}</time>
                                </div>
                            @endforeach
                            <!-- End Recent Post -->

                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
    </section><!-- End Blog Single Section -->
@endsection
