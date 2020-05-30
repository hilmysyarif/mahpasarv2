<div class="product-wrapper">
  <h2 class="title">Produk terbaru</h2>
  <hr>
  <div class="main-product">
    <?php foreach($recent as $p): ?>
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
    <?php endforeach; ?>
  </div>
  <?php if(count($product) > 12){ ?>
    <a href="{{url('products') }}"><button class="more">Selengkapnya</button></a>
  <?php } ?>
</div>