@php
$catagories = App\Models\Categorypost::get();
$tags = App\Models\Tag::get();
$posts = App\Models\Post::get() -> take(5);
@endphp


<div class="col-md-3 col-md-offset-1">
  <div class="sidebar hidden-sm hidden-xs">
    <div class="widget">
      <h6 class="upper">Search blog</h6>
      <form>
        <input name="search" type="text" placeholder="Search.." class="form-control">
      </form>
    </div>
    <!-- end of widget        -->
    <div class="widget">
      <h6 class="upper">Categories</h6>
      <ul class="nav">
        @foreach ($catagories as $item)
        <li><a href="{{route('blog.category.post',$item -> slug)}}">{{$item -> name}}</a>
          @endforeach
        </li>

      </ul>
    </div>
    <!-- end of widget        -->
    <div class="widget">
      <h6 class="upper">Popular Tags</h6>
      <div class="tags clearfix">
        @foreach ($tags as $item)
        <a href="{{route('blog.tag.post',$item -> slug)}}">{{$item -> name}}</a>
        @endforeach

      </div>
    </div>
    <!-- end of widget      -->
    <div class="widget">
      <h6 class="upper">Latest Posts</h6>
      <ul class="nav">
        @foreach ($posts as $item)
        <li><a href="#">{{$item -> title}}<i
              class="ti-arrow-right"></i><span>{{date('d M ,Y',strtotime($item -> created_at))}}</span></a>
        </li>
        @endforeach


      </ul>
    </div>
    <!-- end of widget          -->
  </div>
  <!-- end of sidebar-->
</div>