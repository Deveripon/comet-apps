@extends('frontend.layouts.app')


@section('main')



<section class="page-title parallax">
  <div data-parallax="scroll" data-image-src="/frontend/images/bg/18.jpg" class="parallax-bg"></div>
  <div class="parallax-overlay">
    <div class="centrize">
      <div class="v-center">
        <div class="container">
          <div class="title center">
            <h1 class="upper">This is our blog<span class="red-dot"></span></h1>
            <h4>We have a few tips for you.</h4>
            <hr>
          </div>
        </div>
        <!-- end of container-->
      </div>
    </div>
  </div>
</section>

@php
if(isset($_GET['search'])){
$key = $_GET['search'];
$posts = App\Models\Post::where('title','LIKE','%'.$key.'%') ->orwhere('content','LIKE','%'.$key.'%')->get();
}
@endphp

<!--Page Content-->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="blog-posts">
          @foreach ($posts as $post )
          <article class="post-single">
            <div class="post-info">
              <h2><a href="{{route('blog.single.post',$post -> slug)}}">{{$post -> title}}</a></h2>
              <h6 class=" upper"><span>By </span><a href="#">{{$post -> author -> name}}</a><span
                  class="dot"></span><span>{{date('F d, Y',strtotime($post -> created_at))}}</span><span
                  class="dot"></span>
                @foreach ($post -> tag as $tagss)
                <a href="#" class="post-tag">{{$tagss -> name}}
                  @if($loop -> index +1 < count($post -> tag)) - @endif
                </a>
                @endforeach

              </h6>
            </div>
            {{-- standerd post --}}
            @php
            $featured = json_decode($post -> featured);
            @endphp
            @if($featured -> post_type == 'standard')
            <div class="post-media">
              <a href="#">
                <img src="{{url('storage/post_image/',$featured -> standard_post)}}" alt="">
              </a>

            </div>
            @endif

            {{-- standerd post --}}

            {{-- audio post --}}
            @if($featured -> post_type == 'audio')
            <div class="post-media">
              <div class="media-audio">
                {!! htmlspecialchars_decode($featured -> audio_post)!!}
              </div>
            </div>
            @endif

            {{-- audio post --}}

            {{-- video post --}}
            @if($featured -> post_type == 'video')
            <div class="post-media">
              <div class="media-video">
                <iframe src="{{$featured -> video_post}}" frameborder="0"></iframe>
              </div>
            </div>
            @endif
            {{-- video post --}}

            {{-- gallery post --}}
            @if($featured -> post_type == 'gallery')
            <div class="post-media">
              <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true"
                class="flexslider nav-outside">
                <ul class="slides">
                  @foreach (json_decode($featured -> gallery_post) as $gallery)
                  <li
                    style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;"
                    class="">
                    <img src="{{url('storage/post_image/',$gallery)}}" alt="" draggable="false">
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            @endif

            {{-- gallery post --}}

            <div class="post-body">
              {!! Str::of(htmlspecialchars_decode($post -> content))-> words(50,'....') !!}
              <p><a href="{{route('blog.single.post',$post -> slug)}}" class="btn btn-color btn-sm">Read More</a>
              </p>
            </div>
          </article>
          @endforeach

        </div>
        <div class="d-flex justify-content-center">
          {!! $posts->links() !!}
        </div>
        <ul class="pagination">
          <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="ti-arrow-left"></i></span></a>
          </li>
          <li class="active"><a href="#">1</a>
          </li>
          <li><a href="#">2</a>
          </li>
          <li><a href="#">3</a>
          </li>
          <li><a href="#">4</a>
          </li>
          <li><a href="#">5</a>
          </li>
          <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="ti-arrow-right"></i></span></a>
          </li>
        </ul>
        <!-- end of pagination-->
      </div>
      {{-- //Page Sidebar --}}
      @include('frontend.section.blog-sidebar')
      {{-- //Page Sidebar --}}
    </div>
    <!-- end of row-->
  </div>
  <!-- end of container-->
</section>

<!-- end of container-->

@endsection