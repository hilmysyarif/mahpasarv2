@extends('layouts.fe')

@section('content')  	
	<div role="main" class="main">
		<div class="container py-2">
			<br><hr>
			<div class="row">
				<div class="col">

					<div class="row">
						<div class="col pb-3">

							<h4>Orders List</h4>

							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Order ID</th>
										<th>Status</th>
										<th>Created By</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 0; foreach ($order as $key => $value) { $no++; ?>
										<tr>
											<td>{{ $no }}</td>
											<td><u><b>RT00-{{ $value->id }}</b></u></td>
											@if($value->status == 1)
												<td>Selesai</td>											

											@else
												<td>Menunggu pembayaran</td>											
											@endif
											<td>{{ $value->created_by }}</td>											
										</tr>										
									<?php } ?>
								</tbody>
							</table>

						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
@endsection	