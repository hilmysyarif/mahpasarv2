<div class="promo">
  <div class="card-header">
    <p class="lead text-light"><i class="fa fa-fire-alt"></i> Berakhir dalam <span id="countdownPromo"></span></p>
    <a href="{{ url('promo') }}"><button class="float-right">Lihat Semua</button></a>
  </div>
  <div class="bottom">
      @foreach($getPromo as $data)
        <a href="{{ route('cart', $data->id ) }}">
          <div class="card">
            <img src="{{ asset('img') }}/{{ $data->image }}" class="card-img-top" >
            <div class="card-body">
              <p class="card-text mb-0">{{ $data->name }}</p>
              <p class="oldPrice mb-0">Rp. {{ number_format($data->price, 2, ',', '.') }}</p>
              <p class="newPrice">Rp. {{ number_format($data->promo_price, 2, ',', '.') }}</p>
            </div>
          </div>
        </a>
      @endforeach
  </div>
</div>
