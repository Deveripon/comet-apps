  @php

  $clients_data = App\Models\clientsmodel::get();

  @endphp
    <section>
        <div class="container">
          <div class="title center">
            <h4 class="upper">Some of the best.</h4>
            <h3>Our Clients<span class="red-dot"></span></h3>
            <hr>
          </div>
          <div class="section-content">
            <div class="boxes clients">
              <div class="row">
                @foreach($clients_data as $item)
                <div class="col-sm-4 col-xs-6 border-right border-bottom">
                  <img src="{{url('storage/client/',$item -> logo)}}" alt="" data-animated="true" class="client-image">
                </div>
                @endforeach
              </div>
              <!-- end of row-->
            </div>
          </div>
          <!-- end of section content-->
        </div>
      </section>