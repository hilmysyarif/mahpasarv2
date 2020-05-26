
@extends('layouts.fe')

@section('content')   

<div role="main" class="main shop py-4">

	<div class="container">

		<div class="row">
			<div class="col">

				<div class="featured-boxes">
					<div class="row">
						<div class="col-sm-6">
							<div class="featured-box featured-box-primary text-left mt-3 mt-lg-4">
								<div class="box-content">									
										<table class="shop_table cart">
											<thead>
												<tr>
													<th class="product-remove">
														&nbsp;
													</th>
													<th class="product-thumbnail">
														&nbsp;
													</th>
													<th class="product-name">
														Product
													</th>
													<th class="product-price">
														Price
													</th>
													<th class="product-quantity">
														Quantity
													</th>
													<th class="product-subtotal">
														Total
													</th>
												</tr>
											</thead>
											<tbody>
												<form method="post" action="{{ route('fe.cart.update') }}">
												<?php foreach ($cart as $key => $value) { ?>
													@csrf
													<tr class="cart_table_item">
														<td class="product-remove">
															<a title="Remove this item" class="remove" href="{{ route('fe.cart.destroy', $value->cart_detail_id ) }}">
																<i class="fas fa-times"></i>
															</a>
														</td>
														<td class="product-thumbnail">
															<a href="shop-product-sidebar-left.html">
																<img width="100" height="100" alt="" class="img-fluid" src="img/products/product-grey-1.jpg">
															</a>
														</td>
														<td class="product-name">
																<input type="hidden" name="id_product[]" value="{{ $value->id_product }}">
															<a href="#">{{ $value->product_name }}</a>
														</td>
														<td class="product-price">
															<span class="amount">{{ number_format($value->product_price) }}</span>
														</td>
														<td class="product-quantity">
																<div class="quantity">
																	<input type="button" class="minus" value="-">
																	<input type="text" class="input-text qty text" title="Qty" value="{{ $value->qty }}" name="qty[]" min="1" step="1">
																	<input type="button" class="plus" value="+">
																</div>															
														</td>
														<td class="product-subtotal">
															<span class="amount" style="float: right">{{ number_format($value->subtotal) }}</span>
														</td>
													</tr>
												<?php } ?>
													<tr>
														<td class="actions" colspan="6">
															<div class="actions-continue">
																<input type="submit" value="Update Cart" name="update_cart" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase">
															</div>															
														</td>
													</tr>
												</form>												
											</tbody>
										</table>									
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="featured-box featured-box-primary text-left mt-3 mt-lg-4">
								<div class="box-content">
									<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Cart Totals</h4>
									<table class="cart-totals">
										<tbody>
											<tr class="total">
												<th>
													<strong class="text-dark">Order Total</strong>
												</th>
												<td>
													<strong class="text-dark"><span class="amount">Rp.{{ number_format($total_price->total_price) }}</span></strong>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col">
						<div class="actions-continue">						
							<a href="{{ route('fe.order.store') }}"><button type="submit" class="btn btn-primary btn-modern text-uppercase">Proceed to Checkout <i class="fas fa-angle-right ml-1"></i></button></a>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

</div>

@endsection