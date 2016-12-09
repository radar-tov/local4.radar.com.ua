@if(isset($sliders))
    <section class="slider2 hide-on-med-and-down">
        <ul class="slides">
            @foreach($sliders as $slider)
                <li class="slide">
                    <div class="box">
                        <a @if($slider->link) href="{{ $slider->link }}" @endif>
                            <img style="max-width: 100%;" src="{{ url($slider->thumbnail) }}" @if($slider->alt) alt="{{ $slider->alt }}" @endif/>
                        </a>
                        <div class="container slide-content">
                            @if($slider->title)
                                <p class="pre-title right-align wow animated fadeInUp" data-wow-delay="0.5s">{{ $slider->title }}</p>
                            @endif
                            <h4 class=" wow animated fadeInUp" data-wow-delay="0.7s">{{ $slider->subtitle }}</h4>
                            <p class="main-text center-align wow animated fadeInUp" data-wow-delay="0.9s">
                                <a @if($slider->link) href="{{ $slider->link }}" }} @endif>
                                {{ $slider->caption }}
                                </a>
                            </p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
@endif