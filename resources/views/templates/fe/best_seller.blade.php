<div class="product-wrapper best-product">
  <h2 class="title">Produk terlaris</h2>
  <hr>
  <div class="main-product">
  @foreach($best as $p)
    <div>
        <a href="{{ route('cart', $p->id ) }}">
          <div class="card">
            <img src="{{ asset('img') }}/{{ $p->image }}" class="card-img-top" >
            <div class="card-body">
              <p class="card-text mb-0">{{ $p->name }}</p>
              @if($p->is_promo == 0)
                <p class="newPrice">Rp. {{ number_format($p->price, 2, ',', '.') }}</p>
              @else
                <p class="oldPrice mb-0">Rp. {{ number_format($p->price, 2, ',', '.') }}</p>
                <p class="newPrice">Rp. {{ number_format($p->promo_price, 2, ',', '.') }}</p>
              @endif
            </div>
          </div>
        </a>
    </div>
  @endforeach
  </div>
</div>
