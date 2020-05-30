
@extends('layouts.fe')

@section('content')   
<div class="wrapper">
    <div class="navigation">
        <a href="{{ url('/') }}">Home</a>
        <i class="fa fa-caret-right"></i>
        <a>Troli</a>
    </div>
    <div class="core mt-4">
        <div class="product">
            @if(!empty($cart))
				@csrf
				@foreach($cart as $key => $item)
	            <div class="item">
	                <div class="item-main">
	                    <img src="{{ asset('img') }}/{{ $item['product_image'] }}" alt="">
	                    <a href="{{ url('') }}/p/<?= $item['id']; ?>"><h2 class="title mb-0"><?= $item['product_name']; ?></h2></a>
	                    <small class="text-muted">Jumlah: <?= $item['qty'] ?></small>
	                    <h3 class="price mt-0">Rp <?= number_format($item['subtotal'],0,",","."); ?></h3>
	                    <div class="clearfix"></div>
	                </div>
	                <a href="{{ route('fe.cart.destroy', $item['cart_detail_id'] ) }}" onclick="return confirm('Yakin ingin menghapus produk ini dari troli?')"><i class="fa fa-trash"></i></a>
	            </div>
	            <hr>
	            @endforeach
	            @if(!empty($total_price))
			        <?php if($total_price->total_price > 0){ ?>
	            		<a href="{{ url('cart/delete_cart') }}" onclick="return confirm('Apakah Anda yakin akan mengosongkan Troli?')"><button class="btn btn-outline-dark">Kosongkan Troli</button></a>
	            	<?php } ?>
	            @endif
           	@else
                <div class="alert alert-warning">Upss. Troli masih kosong. Yuk belanja terlebih dahulu..</div>
                <br><br><br>
            @endif
        </div>
        <div class="total shadow">
            <h2 class="title">Ringkasan Belanja</h2>
            <hr>
            <div class="list">
                <p>Total Jumlah Barang</p>
            </div>
            <div class="list">
                <p>Total Harga Barang</p>
                @if(!empty($total_price))
                	<p>Rp <?= number_format($total_price->total_price,0,",","."); ?></p>
                @else
                	<p>Rp 0</p>
                @endif
            </div>
            <div class="list">
                @if(!empty($total_price))
		            
		            <?php if($total_price->total_price > 0){ ?>
		                <a href="{{ route('fe.order.store') }}">
		                    <button class="btn btn-dark btn btn-block mt-2">Lanjut ke Pembayaran</button>
		                </a>
		            <?php }else{ ?>
		                <a href="{{ url('/') }}">
		                    <button class="btn btn-dark btn btn-block mt-2">Belanja Dulu</button>
		                </a>
		            <?php } ?>                
                @else
	                <a href="{{ url('/') }}">
	                    <button class="btn btn-dark btn btn-block mt-2">Belanja Dulu</button>
	                </a>

                @endif
            </div>
        </div>
    </div>
</div>
@endsection