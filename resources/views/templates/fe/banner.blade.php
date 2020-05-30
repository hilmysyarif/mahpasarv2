<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  @foreach ($banner as $key => $value)
    @if($key == 0)
      @php $active = 'active'; @endphp
    @else
      @php $active = ''; @endphp
    @endif
    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $active }}"></li>
  @endforeach
  </ol>
  <div class="carousel-inner">
  @foreach ($banner as $key => $value)
    @if($key == 0)
      @php $active = 'active'; @endphp
    @else
      @php $active = ''; @endphp
    @endif
    <div class="carousel-item {{ $active }}">
      <a href="{{ $value->url }}"><img src="{{ asset('images/banner/') }}/{{ $value->img }}"></a>
    </div>
    }
  @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>