

@php
  $visions = App\Models\Vision::get() -> where('status', true)->where('trash',false) -> take(4);;
@endphp




<section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-sm-4 img-side img-right">
          <div class="img-holder">
            <img src="frontend/images/bg/10.jpg" alt="" class="bg-img">
          </div>
        </div>
        <!-- end of side background image-->
      </div>
      <!-- end of row-->
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-8">
          <div class="title">
            <h4 class="upper">Not just code.</h4>
            <h3>The Vision<span class="red-dot"></span></h3>
            <hr>
          </div>
          <div class="row">
            @foreach ($visions as $item) 
              <div class="col-sm-6">
              <div class="text-box">
                <h4 class="upper small-heading">{{$item -> title}}</h4>
                <p>{{$item -> desc}}</p>
              </div>
              <!-- end of text box-->
            </div>
            @endforeach
            
      
          </div>
          <!-- end of row              -->
        </div>
      </div>
      <!-- end of row-->
    </div>
    <!-- end of container-->
  </section>