@extends('layouts.fe')

@section('content')    
    <div role="main" class="main shop py-4">

        <div class="container">

            <div class="row">
                <div class="col-lg-3">
                    <aside class="sidebar">
                        <form action="page-search-results.html" method="get">
                            <div class="input-group mb-3 pb-1">
                                <input class="form-control text-1" placeholder="Search..." name="s" id="s" type="text">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
                                </span>
                            </div>
                        </form>
                        <h5 class="font-weight-bold pt-3">Categories</h5>
                        <ul class="nav nav-list flex-column">
                            <?php foreach ($category as $key => $value) { ?>
                                <li class="nav-item"><a class="nav-link" href="{{ route('product_list', $value->id) }}">{{ $value->category_name }}</a></li>    
                            <?php } ?>                                
                        </ul>
                        <h5 class="font-weight-bold pt-5">Tags</h5>
                        <div class="mb-3 pb-1">
                            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Nike</span></a>
                            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Travel</span></a>
                            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Sport</span></a>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <h5 class="font-weight-bold pt-5">Top Rated Products</h5>
                                <ul class="simple-post-list">
                                    <li>
                                        <div class="post-image">
                                            <div class="d-block">
                                                <a href="shop-product-sidebar-left.html">
                                                    <img alt="" width="60" height="60" class="img-fluid" src="img/products/product-grey-1.jpg">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-info">
                                            <a href="shop-product-sidebar-left.html">Photo Camera</a>
                                            <div class="post-meta text-dark font-weight-semibold">
                                                $299
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9">

                    <div class="masonry-loader masonry-loader-showing">
                        <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
                            <?php foreach ($product as $key => $value) { ?>
                                <div class="col-sm-6 col-lg-4 product">
                                    <a href="shop-product-sidebar-left.html">
                                        <span class="onsale">Sale!</span>
                                    </a>
                                    <span class="product-thumb-info border-0">
                                        <a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
                                            <span class="text-uppercase text-1">Add to Cart</span>
                                        </a>
                                        <a href="{{ route('cart', $value->id ) }}">
                                            <span class="product-thumb-info-image">
                                                <img alt="" class="img-fluid" src="{{ asset('img') }}/{{ $value->image }}">
                                            </span>
                                        </a>
                                        <span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
                                            <a href="shop-product-sidebar-left.html">
                                                <h4 class="text-4 text-primary">{{ $value->name }}</h4>
                                                <span class="price">
                                                    <del><span class="amount">$325</span></del>
                                                    <ins><span class="amount text-dark font-weight-semibold">Rp. {{ number_format($value->price, 2, ',', '.') }}</span></ins>
                                                </span>
                                            </a>
                                        </span>
                                    </span>
                                </div>                                    
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection