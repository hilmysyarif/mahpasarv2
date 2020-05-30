
@extends('layouts.fe')

@section('internal-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/promo.css') }}">
@endsection

@section('content')   
<div class="wrapper">
    <?php if(count($promo) > 0){ ?>
    <?php if($setting['promo'] == 1){ ?>
    <div class="countdown">
        <p class="lead text-light"><i class="fa fa-fire-alt"></i> Berakhir dalam <span id="countdownPromo"></span></p>
    </div>
    <div class="main-product">
        <?php foreach($promo as $p): ?>
            <a href="{{ route('cart', $p->id ) }}">
            <div class="card">
                <img src="{{ asset('img') }}/{{ $p->image }}" class="card-img-top" >
                <div class="card-body">
                  <p class="card-text mb-0">{{ $p->name }}</p>
                  <p class="oldPrice mb-0">Rp. {{ number_format($p->price, 2, ',', '.') }}</p>
                  <p class="newPrice">Rp. {{ number_format($p->promo_price, 2, ',', '.') }}</p>
                </div>
            </div>
            </a>
        <?php endforeach; ?>
    </div>
    <?php }else{ ?>
    <div class="countdown">
        <p class="lead text-light"><i class="fa fa-fire-alt"></i> PROMO</span></p>
    </div>
    <div class="alert alert-warning mt-4">Upss.. Tidak ada promo untuk saat ini.</div>
    <?php } ?>
    <?php }else{ ?>
    <div class="countdown">
        <p class="lead text-light"><i class="fa fa-fire-alt"></i> PROMO</span></p>
    </div>
    <div class="alert alert-warning mt-4">Upss.. Tidak ada promo untuk saat ini.</div>
    <?php } ?>
</div>
@endsection