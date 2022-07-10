
<div id="carouselExampleCaptions"class="carousel slide mt-5"data-ride="carousel">




            <div class="carousel-inner">
                    @php $i = 1; @endphp
                @foreach ($slider as $slider_item)
              <div class="carousel-item {{$i == '1' ? 'active':''}}">
                @php $i++; @endphp
    <img src="{{asset('upload/slider/'.$slider_item->image)}}"class="d-block w-100">
    <div class="carousel-caption d-none- d-md-block">
        <h5>{{$slider_item->heading}}</h5>
        <p>{{$slider_item->description}}</p>
        <a href="{{$slider_item->link}}">{{$slider_item->link_name}}</a>
        </div>
        </div>
        @endforeach

    </div>



    <a class="carousel-control-prev" href="#carouselExampleCaptions"role="button"data-slide="prev">
        <span class="carousel-control-prev-icon" style="width:50px; height:76px;"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#carouselExampleCaptions"role="button"data-slide="next">
        <span class="carousel-control-next-icon" style="width:50px; height:76px;"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
