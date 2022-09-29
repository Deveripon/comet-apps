
@php
  $portfolio = App\Models\portfolio::all() -> where('status',true) ->where('trash',false);
  $category = App\Models\Category::all() -> where('status',true) ->where('trash',false);
@endphp







<section id="portfolio" class="pb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="title m-0 txt-xs-center txt-sm-center">
            <h2 class="upper">Selected Works<span class="red-dot"></span></h2>
            <hr>
          </div>
        </div>
        <div class="col-md-8">
          <ul id="filters" class="no-fix mt-25">
            <li data-filter="*" class="active">All</li>
            @foreach ($category as $item)
            <li data-filter=".{{$item -> slug}}">{{$item -> title}}</li>
            @endforeach         
          </ul>
          <!-- end of portfolio filters-->
        </div>
      </div>
      <!-- end of row-->
    </div>
    <div class="section-content pb-0">
      <div id="works" class="four-col wide mt-50">


        {{-- Portfolio item --}}
        @foreach ( $portfolio as $item )
          <div class="work-item @foreach ( $item -> category as $cat )
            {{$cat -> slug}}
          @endforeach ">
          <div class="work-detail">
            <a href="{{route('single_portfolio.page',$item -> slug)}}">
              <img style="height:320px;width:100%;object-fit:fill" src="{{url('storage/portfolio_img/featured_img/',$item -> featured_img)}}" alt="">
              <div class="work-info">
                <div class="centrize">
                  <div class="v-center">
                    <h3>{{$item -> title}}</h3>
                    <p>{{$item -> type}}</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        @endforeach

        {{-- Portfolio item --}}


      </div>
      <!-- end of portfolio grid-->
    </div>
  </section>