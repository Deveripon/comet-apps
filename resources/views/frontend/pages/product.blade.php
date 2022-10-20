@extends('frontend.layouts.app')


@section('main')


<section>
    <div class="container">
        <div class="single-product-details">
            <div class="row">
                @foreach ($product as $item)
                <div class="col-md-6">
                    <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true}"
                        class="flexslider nav-inside control-nav-dark">

                        <div class="flex-viewport" style="overflow: hidden; position: relative;">
                            <ul class="slides"
                                style="width: 1200%; transition-duration: 0.6s; transform: translate3d(-1110px, 0px, 0px);">

                                {{-- {{$item -> gallery_image}} --}}
                                @foreach (json_decode($item -> gallery_image) as $gall )
                                <li class="clone" aria-hidden="true" style="width: 555px; float: left; display: block;">
                                    <img src="{{url('storage/product_image/',$gall)}}" alt="" draggable="false">
                                </li>

                                @endforeach



                            </ul>
                        </div>
                        <ol class="flex-control-nav flex-control-paging">
                            <li><a class="">1</a></li>
                            <li><a class="flex-active">2</a></li>
                            <li><a>3</a></li>
                            <li><a>4</a></li>
                        </ol>
                    </div>
                </div>

                <div class="col-md-5 col-md-offset-1">
                    <div class="title mt-0">
                        <h2><span class="red-dot">{{$item ->name}}</span></h2>
                        <p class="m-0">{{$item -> s_desc}}</p>
                    </div>
                    <div class="single-product-price">
                        <div class="row">
                            <div class="col-xs-6">
                                <h3><del>${{$item -> r_price}}</del><span>${{$item -> s_price}}</span></h3>
                            </div>
                            <div class="col-xs-6 text-right"><span class="rating-stars"> <i class="ti-star full"></i><i
                                        class="ti-star full"></i><i class="ti-star full"></i><i
                                        class="ti-star full"></i><i class="ti-star"></i><span class="hidden-xs">(3
                                        Reviews)</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-product-desc">
                        <p>{!! htmlspecialchars_decode($item -> p_desc)!!}</p>
                    </div>
                    <div class="single-product-add">
                        <form action="#" class="inline-form">
                            <div class="input-group">
                                <input type="number" placeholder="QTY" value="1" min="1" class="form-control"><span
                                    class="input-group-btn"><button type="button" class="btn btn-color">Add to Cart<i
                                            class="ti-bag"></i></button></span>
                            </div>
                        </form>
                    </div>
                    <div class="single-product-list">
                        <ul>

                            <li><span>Sizes:</span>
                                @php
                                $sizee = json_decode($item -> size);
                                @endphp
                                @foreach ($sizee as $size )

                                {{($size)}}@if($loop -> index +1 < count($sizee)) , @endif @endforeach </li>



                            <li><span>Colors:</span>
                                @php
                                $colorrr = json_decode($item -> color);
                                @endphp
                                @foreach ($colorrr as $color )

                                {{($color)}}@if($loop -> index +1 < count($colorrr)) , @endif @endforeach </li>
                            </li>
                            <li><span>Category:</span><a href="#">
                                    {{-- @php
                                    $categoryee = json_decode($item -> category);
                                    @endphp --}}
                                    @foreach ($item -> category as $cat )

                                    {{($cat -> name)}} @if($loop -> index +1 < count($item -> category)) - @endif

                                        @endforeach
                                </a>
                            </li>
                            <li><span>Tags:</span>
                                <a
                                    href="#">
                                    @foreach ($item -> tag as $tagg )

                                    {{($tagg -> name)}} @if($loop -> index +1 < count($item -> tag)) - @endif

                                        @endforeach

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- end of row-->
        </div>
        <div class="product-tabs">
            <ul role="tablist" class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#first-tab" role="tab" data-toggle="tab">Description</a>
                </li>
                <li role="presentation"><a href="#second-tab" role="tab" data-toggle="tab">Sizes</a>
                </li>
                <li role="presentation"><a href="#third-tab" role="tab" data-toggle="tab">Reviews (3)</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="first-tab" role="tabpanel" class="tab-pane active">
                    {!! htmlspecialchars_decode($item -> p_desc)!!}
                </div>
                <div id="second-tab" role="tabpanel" class="tab-pane">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="upper">Size</th>
                                <th class="upper">Bust (CM)</th>
                                <th class="upper">Waist (CM)</th>
                                <th class="upper">Hips (CM)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>XS</td>
                                <td>78</td>
                                <td>60</td>
                                <td>83</td>
                            </tr>
                            <tr>
                                <td>S</td>
                                <td>80</td>
                                <td>62</td>
                                <td>86</td>
                            </tr>
                            <tr>
                                <td>M</td>
                                <td>88</td>
                                <td>65</td>
                                <td>88</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="third-tab" role="tabpanel" class="tab-pane">
                    <div id="comments">
                        <ul class="comments-list">
                            <li class="rating">
                                <h5 class="upper">Jesse Pinkman - <span class="rating-stars"><i
                                            class="ti-star full"></i><i class="ti-star full"></i><i
                                            class="ti-star full"></i><i class="ti-star full"></i><i
                                            class="ti-star"></i></span></h5><span class="comment-date">Posted on 29
                                    September at 10:41</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo voluptatem quo
                                    sit. Sint fugit quidem totam similique suscipit animi veniam reiciendis, unde facere
                                    quia, optio, at ad possimus perferendis asperiores.</p>
                            </li>
                            <li class="rating">
                                <h5 class="upper">Rust Cohle - <span class="rating-stars"><i class="ti-star full"></i><i
                                            class="ti-star full"></i><i class="ti-star full"></i><i
                                            class="ti-star full"></i><i class="ti-star"></i></span></h5><span
                                    class="comment-date">Posted on 29 September at 10:41</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi aspernatur vero
                                    dolorum asperiores ratione obcaecati atque quidem aliquid dicta illo, quod,
                                    similique suscipit maiores, aperiam expedita cum. Ut fugiat, dolores.</p>
                            </li>
                            <li class="rating">
                                <h5 class="upper">Arya Stark - <span class="rating-stars"><i class="ti-star full"></i><i
                                            class="ti-star full"></i><i class="ti-star full"></i><i
                                            class="ti-star full"></i><i class="ti-star full"></i></span></h5><span
                                    class="comment-date">Posted on 29 September at 10:41</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi aspernatur vero
                                    dolorum asperiores ratione obcaecati atque quidem aliquid dicta illo, quod,
                                    similique suscipit maiores, aperiam expedita cum. Ut fugiat, dolores.</p>
                            </li>
                        </ul>
                    </div>
                    <div id="respond">
                        <h5 class="upper">Leave a rating</h5>
                        <div class="comment-respond">
                            <form class="comment-form">
                                <div class="form-double">
                                    <div class="form-group">
                                        <input name="author" type="text" placeholder="Name" class="form-control">
                                    </div>
                                    <div class="form-group last">
                                        <input name="email" type="text" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-select">
                                        <select class="form-control">
                                            <option value="" selected="selected">Chose a rating</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea placeholder="Comment" class="form-control"></textarea>
                                </div>
                                <div class="form-submit text-right">
                                    <button type="button" class="btn btn-color-out">Post Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="related-products">
            <h5 class="upper">Related Products</h5>
            <div class="row">
                {{-- @php
                $releted = App\Models\Product::get()-> where('tag',)
                @endphp --}}
                <div class="col-md-3 col-sm-6">
                    <div class="shop-product">
                        <div class="product-thumb">
                            <a href="#">
                                <img src="frontend/images/shop/1.jpg" alt="">
                            </a>
                        </div>
                        <div class="product-info">
                            <h4 class="upper"><a href="#">Premium Notch Blazer</a></h4><span>$79.99</span>
                            <div class="save-product"><a href="#"><i class="icon-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection