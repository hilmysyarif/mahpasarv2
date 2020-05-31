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
        <li class="active">Upgrade Voucher List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Upgrade Voucher List</h3><br><br>
               <a href="{{ route('admin.vouchers.create') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</button></a>
              <br><br>
                @if(session()->has('message'))
                  <div class="alert alert-success alert-dismissible">
                    <i class="icon fa fa-check"></i>  {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    
                  </div> 
                @endif 
                @if(session()->has('error'))
                  <div class="alert alert-warning alert-dismissible">
                    <i class="icon fa fa-close"></i> {{ session()->get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    
                  </div> 
                @endif                                                                     
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: scroll;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Distribute For</th>
                  <th>Claimed By</th>
                  <th>Voucher Code</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 0; foreach ($vouchers as $key => $value) { $no++; ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><u><b>{{ $value->upline->name }}</b></u></td>
                    <td><u><b>{{ !empty($value->claim_user) ? $value->claim_user->name : 'Not Claimed' }}</b></u></td>
                    <td><a data-toggle="modal" data-target="#modal-info-{{ $value->id }}" href="javascript::"><i class="fa  fa-eye"></i></a></td>
                    <td><a data-toggle="modal" data-target="#modal-danger-{{ $value->id }}" href="javascript::"><i class="fa  fa-trash"></i></a></td>
                  </tr>

                  <div class="modal modal-info fade" id="modal-info-{{ $value->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Show Voucher Code</h4>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure want to see this voucher ?</p>
                          <p>Please input your Pin Transaction below</p>
                          <input type="password" name="pin_trx" class="form-control" autocomplete="off">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                          <form method="POST" action="javascript:void(0);">
                          <button type="submit" class="btn btn-outline">Yes</button>                          
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>

                  <div class="modal modal-danger fade" id="modal-danger-{{ $value->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Delete Data</h4>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure want to delete this record ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                          <form method="POST" action="{{ route('admin.vouchers.destroy', $value->id) }}">
                            @csrf
                          <button type="submit" class="btn btn-outline">Delete</button>                          
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                <?php } ?>                               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection