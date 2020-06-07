<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="background-color: #12283f !important">
  <div class="container">
    <a class="navbar-brand mr-5" href="{{ url('/') }}"><h3>{{ config('app.name') }}</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ml-3" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">Beranda</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kategori
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php foreach ($category as $key => $value) { ?>
                 <a class="dropdown-item" href="{{ route('product_list', $value->id) }}">{{ $value->category_name }}</a>
            <?php } ?>               
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="{{ url('testimoni') }}">Testimoni</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="{{ url('about') }}">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="{{ url('contact') }}">Kontak</a>
        </li>
      </ul>
      <br>

      <a href="{{ route('fe.cart.show') }}" class="text-light navbar-cart-inform">
        <i class="fa fa-shopping-cart"></i>
        <?php  
            if (empty(auth()->user()->id)) {
                $cart = 0;
            }else{
                $cart = App\Model\CartModel::select('cart.*', 'cart_detail.id_product')->join('cart_detail', 'cart.id', '=', 'cart_detail.id_cart')->where('cart.user_id', '=', auth()->user()->id)->count();                  
                $cart_data = App\Model\CartModel::select('cart.*', 'cart_detail.id_product', 'cart_detail.qty as qty', 'product.sku as sku', 'product.name as product_name', 'product.image as image', 'product.price as product_price')->join('cart_detail', 'cart.id', '=', 'cart_detail.id_cart')->join('product', 'cart_detail.id_product', '=', 'product.id')->where('cart.user_id', '=', auth()->user()->id)->get();
                $total = App\Model\CartModel::where('cart.user_id', '=', auth()->user()->id)->first();
            }
        ?>      
        Keranjang ({{ $cart }})

      </a>

      @if(auth()->user())
        <div class="dropdown">
          <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           {{ auth()->user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('fe.history.index') }}">Lihat Semua pesanan</a>

            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>

      @else
        <a class="nav-link text-light" href="{{ url('login') }}">Login</a>
        <a class="nav-link text-light" href="{{ url('register') }}">Register</a>
      @endif


      <br>
      <br>
    </div>
  </div>
</nav>
<div class="top-nav"></div>
 
