@extends('theme.master')
@section('title', 'Category - ' . $CategoryName)
@section('category-active', 'active')

@section('content')

@include('theme.partials.hero', ['title' => $CategoryName])

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          @if($blogs->count() > 0)
              @foreach($blogs as $blog)
              <div class="col-md-6">
                <div class="single-recent-blog-post card-view">
                  <div class="thumb">
                    <img class="card-img rounded-0" src="{{ asset("storage/blogs/$blog->image") }}" alt="">
                    <ul class="thumb-info">
                      <li><a href="#"><i class="ti-user"></i>{{$blog->name}}</a></li>
                      <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                    </ul>
                  </div>
                  <div class="details mt-20">
                    <a href="blog-single.html">
                      <h3>{{ $blog->name }}</h3>
                    </a>
                    <p>{{ $blog->description }}</p>
                    <a class="button" href="{{ route('blogs.show',['blog' => $blog]) }}">Read More <i class="ti-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              @endforeach
          @endif
        </div>

        <div class="row">
          <div class="col-lg-12">
              {{ $blogs->render('pagination::bootstrap-4') }} <!-- Updated to use the default Bootstrap 4 pagination view -->
          </div>
        </div>
      </div>

      @include('theme.partials.sidebar')
    </div>
</section>
<!--================ End Blog Post Area =================-->
@endsection
