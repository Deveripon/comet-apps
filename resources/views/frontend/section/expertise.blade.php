@php

$expertise = App\Models\Expertise::latest()->get()->where('status', '=', true ) -> take(4)

@endphp



<section class="p-0 b-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-4 img-side img-left mb-0">
                <div class="img-holder">
                    <img src="frontend/images/bg/33.jpg" alt="" class="bg-img">
                    <div class="centrize">
                        <div class="v-center">
                            <div class="title txt-xs-center">
                                <h4 class="upper">This is what we love to do.</h4>
                                <h3>Expertise<span class="red-dot"></span></h3>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of side background image-->
            <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
                <div class="services">
                    <div class="row">

                        @php
                            $i = 1;
                        @endphp

                        @foreach($expertise as $item)
                            
                            @php

                                if($i == 1){
                                    $class_name = "border-bottom border-right";
                                }else if ($i == 2){
                                    $class_name = "border-bottom";
                                }else if ($i == 3) {
                                    $class_name = "border-bottom border-right";
                                }else if ($i == 4) {
                                    $class_name = "border-bottom";
                                }

                            @endphp

                        <div class="col-sm-6 {{$class_name}}">
                            <div class="service"><i class="{{$item -> icon}}"></i>
                                <h4>{{$item -> title}}</h4>
                                <hr>
                                <p class="alt-paragraph">{{$item -> desc}}</p>
                            </div>
                            <!-- end of service-->
                        </div>

                            @php
                                $i++
                            @endphp

                        @endforeach
                    </div>
                </div>
                <!-- end of row-->
            </div>
        </div>
        <!-- end of row -->
    </div>
</section>