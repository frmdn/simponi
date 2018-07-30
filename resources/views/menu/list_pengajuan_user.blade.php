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
                <form class="" action="/r_search_list_opini_user" method="get" role="search">
                  <table style="width:100%">
                    <tr>
                      <td width="50%">
                        Find by
                        <select class="form-control" name="kriteria" id="kriteria" style="width:95%">
                          <option value="all">ALL</option>
                          @foreach ($columns2 as $columns2)
                            <option value="{{ $columns2 }}">{{ strtoupper(str_replace("_"," ",$columns2)) }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td width="50%">
                        <br>
                        <input placeholder="input your text here . . ." type="text" name="tekskriteria" id="tekskriteria" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <br>
                        <button type="submit" class="btn btn-primary btn-toastr" data-context="info" data-message="This is general theme info" data-position="top-right">Find</button>
                      </td>
                    </tr>
                  </table>
                  {{ csrf_field() }}
                </form>
                <br>
                @if (session()->has('s_list_user'))
                  <div class="table-responsive">
      							<table class="table table-bordered table-hover" id="list">
      								<thead>
      									<tr>
                          <tr>
                          <th style="text-align:center" nowrap="">ACTION</th>
                                                      <th style="text-align:center" nowrap="">MAKER</th>
                                                      <th style="text-align:center" nowrap="">BADAN USAHA</th>
                                                      <th style="text-align:center" nowrap="">CABANG</th>
                                                      <th style="text-align:center" nowrap="">NAMA NASABAH</th>
                                                      <th style="text-align:center" nowrap="">NAMA AO PIC</th>
                                                      <th style="text-align:center" nowrap="">NAMA SUPERVISI</th>
                                                      <th style="text-align:center" nowrap="">PLAFOND</th>
                                                      <th style="text-align:center" nowrap="">TUJUAN OPINI</th>
                                                      <th style="text-align:center" nowrap="">NO MEMO PENGAJUAN</th>
                                                      <th style="text-align:center" nowrap="">TGL MASUK PENGAJUAN</th>
                                                      <th style="text-align:center" nowrap="">JAM MEMO DITERIMA</th>
                                                      <th style="text-align:center" nowrap="">TGL DISPOSISI</th>
                                                      <th style="text-align:center" nowrap="">JAM DISPOSISI</th>
                                                      <th style="text-align:center" nowrap="">TGL LENGKAP</th>
                                                      <th style="text-align:center" nowrap="">JAM LENGKAP</th>
                                                      <th style="text-align:center" nowrap="">STATUS</th>
                                                  </tr>
      									</tr>
      								</thead>
      								<tbody>
                        @foreach ($listpengajuan as $row)
                          <tr>
                            <td style="text-align:center" nowrap><button style="width:80px;" onclick="location.href='/edit_pengajuan/edit/{{ $row->Id }}';" class="btn btn-primary">Edit</button> </td>
                            <td nowrap>{{ $row->maker }}</td>
                            <td nowrap>{{ $row->namabadanusaha }}</td>
                            <td nowrap>{{ $row->namacabang }}</td>
                            <td nowrap>{{ $row->nama_nasabah }}</td>
                            <td nowrap>{{ $row->nama_ao_pic }}</td>
                            <td nowrap>{{ $row->nama_supervisi }}</td>
                            <td nowrap>Rp {{ number_format( $row->plafond ,2) }}</td>
                            <td nowrap>{{ $row->namatujuan }}</td>
                            <td nowrap>{{ $row->no_memo_pengajuan }}</td>
                            <td nowrap>{{ $row->tgl_masuk_pengajuan }}</td>
                            <td nowrap>{{ $row->jam_memo_diterima }}</td>
                            <td nowrap>{{ $row->tgl_disposisi }}</td>
                            <td nowrap>{{ $row->jam_disposisi }}</td>
                            <td nowrap>{{ $row->tgl_lengkap }}</td>
                            <td nowrap>{{ $row->jam_lengkap }}</td>
                            <td nowrap>{{ $row->status }}</td>
                          </tr>
                        @endforeach
      								</tbody>
      							</table>
      						</div>
                  <?php  /*{!! $row->appends(['tekskriteria'=>Request::get('tekskriteria'), 'kriteria'=>Request::get('kriteria')])->links() !!}
                  {{ Session::forget('s_list_user') }}*/ ?>
                @endif
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
