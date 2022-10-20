@extends('frontend.layouts.app')


@section('main')



<section class="page-title parallax">
    <div data-parallax="scroll" data-image-src="/frontend/images/bg/19.jpg" class="parallax-bg"></div>
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



<!--Page Content-->
@include('frontend.section.shop-widget')

</div>
<!-- end of sidebar-->
</div>
<div class="col-md-9">
    <div class="shop-menu">
        <div class="row">
            <div class="col-sm-8">
                {{-- <h6 class="upper">Displaying 6 of 18 results</h6> --}}
            </div>
            <div class="col-sm-4">
                <div class="form-select">
                    <select name="type" class="form-control">
                        <option selected="selected" value="">Sort By</option>
                        <option value="">What's new</option>
                        <option value="">Price high to low</option>
                        <option value="">Price low to high</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- end of row-->
    </div>
    <div class="container-fluid">
        <div class="row">
            {{-- @php
            $product = App\Models\Product::latest()->get();
            @endphp --}}
            @php
            if(isset($_GET['search'])){
            $key = $_GET['search'];
            $product = App\Models\Product::where('name','LIKE','%'.$key.'%')
            ->orwhere('p_desc','LIKE','%'.$key.'%')->get();
            }
            @endphp
            @forelse ($product as $item)
            <div class="col-md-4 col-sm-6">
                <div class="shop-product">
                    <div class="product-thumb">
                        <a href="{{route('product.single.page',$item -> slug)}}">
                            <img style="height:270px;min-width:220px;"
                                src="{{url('storage/product_image/',$item -> feat_image)}}"
                                alt="">
                        </a>
                        <div class="product-overlay"><a href="#" class="btn btn-color-out btn-sm">Add To
                                Cart<i class="ti-bag"></i></a>
                        </div>
                    </div>
                    <div class="product-info">
                        <h4 class="upper"><a href="#">{{$item -> name}}</a></h4><del>${{$item -> r_price}}</del>
                        <span>${{$item-> s_price}}</span>
                        <div class="save-product"><a href="#"><i class="icon-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p>No Products Found</p>
            @endforelse


        </div>
        <!-- end of row-->
        <ul class="pagination">
            <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i
                            class="ti-arrow-left"></i></span></a>
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
            <li><a href="#" aria-label="Next"><span aria-hidden="true"><i
                            class="ti-arrow-right"></i></span></a>
            </li>
        </ul>
        <!-- end of pagination-->
    </div>
</div>
</div>
</div>
<!-- end of container-->
</section>
<!-- end of container-->

@endsection