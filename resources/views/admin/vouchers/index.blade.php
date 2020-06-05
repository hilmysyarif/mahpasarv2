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
                    <td class="voucher_code-{{ $value->id }}"><a data-toggle="modal" data-target="#modal-info-{{ $value->id }}" href="javascript:void(0);"><i class="fa  fa-eye"></i></a></td>
                    <td><a data-toggle="modal" data-target="#modal-danger-{{ $value->id }}" href="javascript:void(0);"><i class="fa  fa-trash"></i></a></td>
                  </tr>

                  <div class="modal modal-info fade" id="modal-info-{{ $value->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Lihat Voucher Code</h4>
                        </div>
                        <div class="modal-body">
                          <p>Anda yakin ingin melihat voucher code ini ?</p>
                          <p>Input PIN Trx anda dibawah ini</p>
                          <input type="password" name="pin_trx" class="form-control" autocomplete="off">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                          <a onclick="showVoucher('{{ $value->id }}')" class="btn btn-outline">Kirim</a>                          
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
                          <h4 class="modal-title">Hapus Data</h4>
                        </div>
                        <div class="modal-body">
                          <p>Anda yakin ingin menghapus voucher code ini ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                          <form method="POST" action="{{ route('admin.vouchers.destroy', $value->id) }}">
                            @csrf
                          <button type="submit" class="btn btn-outline">Ya</button>                          
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

@section('scripts')
<script type="text/javascript">
  function showVoucher(row_id)
  {
    var el_pin_trx = $('#modal-info-' + row_id).find('[name=pin_trx]');
    if(el_pin_trx.val() == ''){
      alert('Maaf, anda harus memasukkan PIN Trx!')
    }else{
        $.ajax({
           type:'POST',
           url:'/check_pin_trx',
           data: {
              _token: '<?php echo csrf_token() ?>',
              pin_trx: el_pin_trx.val(),
            },
           success:function(data) {
              if(JSON.parse(data).success == true){
                $('#modal-info-' + row_id).modal('hide');
                $.ajax({
                   type:'GET',
                   url: window.location.href + '/getJson/' + row_id,
                   data: {
                      _token: '<?php echo csrf_token() ?>',
                    },
                   success:function(data) {
                      $('.voucher_code-' + row_id).children().replaceWith('<u><b>' + JSON.parse(data).voucher_code + '</b></u>');
                   }
                });   
              }else{
                alert('Maaf, PIN Trx anda salah!')
              }
           }
        });      
    }
  }

</script>
@endsection