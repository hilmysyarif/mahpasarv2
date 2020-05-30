@extends('layouts.fe')

@section('title')
{{ $title }}
@endsection

@section('content')   

    <div class="wrapper">
        <div class="title-head">
            <?php if($titleHead == ""){ ?>
                <h2 class="title">Kategori <?= $nameCat ?></h2>
            <?php }else{ ?>
            <h2 class="title">Kategori <?= $nameCat ?> > <?= $titleHead ?></h2>
            <?php } ?>
        </div>
        <div class="core">
            <div class="filter">
                <div class="filter-main">
                    <div class="top">
                        <p>Filter</p>
                    </div>
                    <div class="bodf">
                        <p class="title">
                            Urutkan
                        </p>
                        <a href="{{ url('') }}/products?ob=latest">Terbaru</a>
                        <a href="{{ url('') }}/products?ob=az">A-Z</a>
                        <a href="{{ url('') }}/products?ob=za">Z-A</a>
                        <a href="{{ url('') }}/products?ob=pmin">Harga Terendah</a>
                        <a href="{{ url('') }}/products?ob=pmax">Harga Tertinggi</a>
                        <hr>
                        <p class="title">
                            Harga
                        </p>
                        <small class="text-muted">Tulis tanpa tanda pemisah, cth: 34000</small>
                        <form action="{{ url('') }}/products" method="get">
                            <input type="number" placeholder="Harga Minimum" name="minprice" class="form-control">
                            <input type="number" placeholder="Harga Maksimum" name="maxprice" class="form-control mt-2">
                            <button type="submit" class="btn btn-secondary btn-block btn-sm mt-2">Terapkan</button>
                        </form>
                        <hr>
                        <p class="title">
                            Penawaran
                        </p>
                        <a href="{{ url('') }}/products?promo=true">Promo</a>
                        <hr>
                        <a href="{{ url('') }}/products" class="btn btn-danger text-light btn-sm">Reset Filter</a>
                    </div>
                </div>
            </div>
            <div class="main-product">
                <?php if(!empty($products)){ ?>
                <?php foreach($products as $p): ?>
                    <a href="{{ url('') }}/p/<?= $p['id']; ?>">
                    <div class="card">
                        <img src="{{ asset('img') }}/{{ $p['image'] }}" class="card-img-top" >
                        <div class="card-body">
                        <p class="card-text mb-0"><?= $p['name']; ?></p>
                        <?php if($setting['promo'] == 1){ ?>
                        <?php if($p['promo_price'] == 0){ ?>
                            <p class="newPrice">Rp <?= str_replace(",",".",number_format($p['price'])); ?></p>
                        <?php }else{ ?>
                            <p class="oldPrice mb-0">Rp <?= str_replace(",",".",number_format($p['price'])); ?></p>
                            <p class="newPrice">Rp <?= str_replace(",",".",number_format($p['promo_price'])); ?></p>
                        <?php } ?>
                        <?php }else{ ?>
                            <p class="newPrice">Rp <?= str_replace(",",".",number_format($p['price'])); ?></p>
                        <?php } ?>
                        </div>
                    </div>
                    </a>
                <?php endforeach; ?>
                <?php }else{ ?>
                    <div class="alert alert-warning">Upss. Tidak ada produk yang dapat ditampilkan</div>
                <?php } ?>
            </div>
        </div>
    </div>
@endsection