@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin.vouchers.index') }}">Upgrade Voucher List</a></li>
        <li class="active">Generate Upgrade Voucher</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Form Generate Voucher</h3><br><br>
                @if(session()->has('error'))
                  <div class="alert alert-success alert-dismissible">
                    <i class="icon fa fa-close"></i> {{ session()->get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-check"></i>               
                  </div> 
                @endif  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="{{ route('admin.vouchers.store') }}" enctype="multipart/form-data">  
                @csrf                            
                <div class="form-group">
                  <label>Kode Depan</label>
                  <input type="text" min="0" class="form-control" name="prefix_code" placeholder="Enter ..." required>
                </div>      
                <div class="form-group">
                  <label>Panjang Kode Unik</label>
                  <input type="text" min="0" class="form-control" name="length" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                  <label>Jumlah Total Generate</label>
                  <input type="text" min="0" class="form-control" name="generate_num" placeholder="Enter ..." required>
                </div>

                <div class="form-group">
                  <label>Untuk User ?</label>
                  <select class="form-control" name="upline_id" required>
                    <option>-- Select --</option>
                    <?php foreach ($users as $key => $value) { ?>
                      <option value="{{ $value->id }}">{{ $value->name }} <b>(User ID : {{ $value->id }})</b></option>
                    <?php } ?>                    
                  </select>
                </div>
                <div class="form-group">
                  <label>PIN Trx</label>
                  <input type="password" min="0" class="form-control" name="pin_trx" placeholder="Enter ..." required>
                </div>

                <br>
                <button type="submit" class="btn btn-success">Save</button>
                <a href=""><button type="button" class="btn btn-danger">Cancel</button></a>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
  </div>
  <!-- /.content-wrapper -->    

@endsection