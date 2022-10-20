@php
$category = App\Models\CategoryProduct::get();
$tranding_product = App\Models\Product::latest() -> get()-> take(3);
$tags = App\Models\TagProduct::get();
@endphp
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3 hidden-sm hidden-xs">
                <div class="sidebar">
                    <div class="widget">
                        <h6 class="upper">Categories</h6>
                        <ul class="nav">
                            @foreach ($category as $item)
                            <li><a href="{{route('shop.category.products',$item -> slug)}}">{{$item -> name}}</a>
                            </li>
                            @endforeach


                        </ul>
                    </div>
                    <!-- end of widget        -->
                    <div class="widget">
                        <h6 class="upper">Trending Products</h6>
                        <ul class="nav product-list">
                            @foreach($tranding_product as $item)
                            <li>
                                <div class="product-thumbnail">
                                    <img src="{{url('storage/product_image/',$item -> feat_image)}}" alt="">
                                </div>
                                <div class="product-summary"><a
                                        href="#">{{$item -> name}}</a>
                                    {{-- <del>${{$item -> r_price}}</del> --}}
                                    <p>${{$item -> s_price}}</p>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>


                    {{-- @php
                    echo $_GET['search'];
                    if (isset($_GET['search'])) {
                    $key = $_GET['search'];
                    $posts = App\Models\Product::where('title','LIKE','%'.$key.'%')->get();
                    }
                    @endphp --}}
                    <!-- end of widget          -->
                    <div class="widget">
                        <h6 class="upper">Search Shop</h6>
                        <form>
                            <input name="search" type="text" placeholder="Search.." class="form-control">
                        </form>
                    </div>

                    <!-- end of widget        -->
                    <div class="widget">
                        <h6 class="upper">Popular Tags</h6>
                        <div class="tags clearfix">
                            @foreach ($tags as $item )
                            <a href="{{route('shop.tag.products',$item -> slug)}}">{{$item -> name}}</a>
                            @endforeach


                        </div>
                    </div>
                    <!-- end of widget      -->