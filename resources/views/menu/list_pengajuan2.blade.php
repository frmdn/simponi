@extends('menu.layout.header-menu')

@section('main')
  <div class="main">
    <div class="main-content">
			<div class="container-fluid">
				<div class="row">
          <div class="col-md-12">
  					<div class="panel">
  						<div class="panel-heading">
  							<h3 class="panel-title">List Pengajuan Opini</h3>
  						</div>
  						<div class="panel-body">
                <form class="" action="#" method="post">
                  <table style="width:100%">
                    <tr>
                      <td width="50%">
                        Find by
                        <select class="form-control" name="bdnusaha" id="bdnusaha" style="width:95%">
                          <option value="all">ALL</option>
                          @foreach ($columns2 as $columns2)
                            <option value="{{ $columns2 }}">{{ strtoupper(str_replace("_"," ",$columns2)) }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td width="50%">
                        <br>
                        <input placeholder="input your text here . . ." type="text" name="namensbh" id="namensbh" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <br>
                        <button type="button" class="btn btn-primary btn-toastr" data-context="info" data-message="This is general theme info" data-position="top-right">Find</button>
                      </td>
                    </tr>
                  </table>
                </form>
                <br>
                <div class="table-responsive">
    							<table class="table table-bordered table-hover" id="list">
    								<thead>
    									<tr>
                        <th style="text-align:center" nowrap>ACTION</th>
                        @foreach ($columns as $columns)
                          <th style="text-align:center" nowrap>{{ strtoupper(str_replace("_"," ",$columns)) }}</th>
                        @endforeach
    									</tr>
    								</thead>
    								<tbody>
                      @foreach ($editpeng as $edtpeng)
                        <tr>
                          <td style="text-align:center" nowrap><button style="width:80px;" onclick="location.href='/edit_pengajuan/edit/{{ $edtpeng->Id }}';" class="btn btn-primary">Edit</button>   <button style="width:80px;" onclick="window.location='/edit_pengajuan/delete/{{ $edtpeng->Id }}';" class="btn btn-warning">Delete</button>  </td>
                          <td nowrap>{{ $edtpeng->Id }}</td>
                          <td nowrap>{{ $edtpeng->maker }}</td>
                          <td nowrap>{{ $edtpeng->nama_nasabah }}</td>
                          <td nowrap>{{ $edtpeng->badan_usaha }}</td>
                          <td nowrap>{{ $edtpeng->cabang }}</td>
                          <td nowrap>{{ $edtpeng->nama_ao_pic }}</td>
                          <td nowrap>{{ $edtpeng->nama_supervisi }}</td>
                          <td nowrap>{{ $edtpeng->plafond }}</td>
                          <td nowrap>{{ $edtpeng->tujuan_opini }}</td>
                          <td nowrap>{{ $edtpeng->no_memo_pengajuan }}</td>
                          <td nowrap>{{ $edtpeng->tgl_masuk_pengajuan }}</td>
                          <td nowrap>{{ $edtpeng->jam_memo_diterima }}</td>
                          <td nowrap>{{ $edtpeng->tgl_disposisi }}</td>
                          <td nowrap>{{ $edtpeng->jam_disposisi }}</td>
                          <td nowrap>{{ $edtpeng->tgl_lengkap }}</td>
                          <td nowrap>{{ $edtpeng->jam_lengkap }}</td>
                        </tr>
                      @endforeach
    								</tbody>
    							</table>
    						</div>
                {{ $editpeng->links() }}
              </div>
  					</div>
          </div>
				</div>
			</div>
		</div>
  </div>
@endsection


@section('style')
  <script>
    @if (Session::has('message'))
      var type = "{{Session::get('alert-type','info')}}"

      switch (type) {
          case 'sukseshapus':
            toastr.success("{{ Session::get('message') }}");
            break;
          case 'gagalhapus':
            toastr.error("{{ Session::get('message') }}");
            break;
          case 'suksessimpan':
            toastr.success("{{ Session::get('message') }}");
            break;
          case 'gagalsimpan':
            toastr.error("{{ Session::get('message') }}");
            break;
        }
		@endif

    // $(document).ready(function() {
    //   $('#list').DataTable();
    // } );

    // $('#list').dataTable( {
    //   "searching": false,
    //   "bPaginate": false
    // } );
	</script>
@endsection
