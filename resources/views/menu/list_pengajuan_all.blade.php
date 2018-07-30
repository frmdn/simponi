@extends('menu.layout.header-menu')

@section('main')
<div class="main">
  <div class="main-content">
   <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
       <div class="panel">
        <div class="panel-heading">
         <h3 class="panel-title">Daftar Opini</h3>
       </div>
       <div class="panel-body">
        <form class="" action="/r_search_list_opini_all" method="get" role="search">
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
              <th style="text-align:center">MAKER</th>
              <!-- <th style="text-align:center">BADAN USAHA</th> -->
              <!-- <th style="text-align:center">CABANG</th> -->
              <th style="text-align:center">NAMA NASABAH</th>
              <!-- <th style="text-align:center">NAMA AO PIC</th> -->
              <!-- <th style="text-align:center">NAMA SUPERVISI</th> -->
              <th style="text-align:center">PLAFOND</th>
              <!-- <th style="text-align:center">TUJUAN OPINI</th> -->
              <!-- <th style="text-align:center">NO MEMO PENGAJUAN</th> -->
              <!-- <th style="text-align:center">TGL MASUK PENGAJUAN</th>
              <th style="text-align:center">JAM MEMO DITERIMA</th>
              <th style="text-align:center">TGL DISPOSISI</th>
              <th style="text-align:center">JAM DISPOSISI</th>
              <th style="text-align:center">TGL LENGKAP</th>
              <th style="text-align:center">JAM LENGKAP</th> -->
              <th style="text-align:center">STATUS</th>
              <th style="text-align:center">ACTION</th>
            </tr>
          </tr>
        </thead>
        <tbody>
          @foreach ($listpengajuan as $row)
          <tr>
            <td>{{ $row->maker }}</td>
            <!-- <td>{{ $row->namabadanusaha }}</td> -->
            <!-- <td>{{ $row->namacabang }}</td> -->
            <td>{{ $row->nama_nasabah }}</td>
            <!-- <td>{{ $row->nama_ao_pic }}</td> -->
            <!-- <td>{{ $row->nama_supervisi }}</td> -->
            <td>Rp {{ number_format( $row->plafond ,2) }}</td>
            <!-- <td>{{ $row->namatujuan }}</td> -->
            <!-- <td>{{ $row->no_memo_pengajuan }}</td> -->
            <!-- <td>{{ $row->tgl_masuk_pengajuan }}</td>
            <td>{{ $row->jam_memo_diterima }}</td>
            <td>{{ $row->tgl_disposisi }}</td>
            <td>{{ $row->jam_disposisi }}</td>
            <td>{{ $row->tgl_lengkap }}</td>
            <td>{{ $row->jam_lengkap }}</td> -->
            <td>{{ $row->status }}</td>
            <td style="text-align:center">
              <button class="btn btn-default" onclick='ViewData("{{ $row->Id }}")' type="button">View</button>
              <button onclick="location.href='/edit_pengajuan/edit/{{ $row->Id }}';" class="btn btn-primary">Edit</button>   
              <button onclick="window.location='/edit_pengajuan/delete/{{ $row->Id }}';" class="btn btn-warning">Delete</button>  
            </td>
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Data Opini</h4>
          </div>
          <div class="modal-body">
            <table class="table table-bordered">
              <tr>
                <td>Nama Maker</td>
                <td><p id="nama_maker"></p></td>
              </tr>
              <tr>
                <td>Nama Nasabah</td>
                <td><p id="nama_nasabah"></p></td>
              </tr>
              <tr>
                <td>Badan Usaha</td>
                <td><p id="badan_usaha"></p></td>
              </tr>
              <tr>
                <td>Cabang</td>
                <td><p id="nama_cabang"></p></td>
              </tr>
              <tr>
                <td>AO / PIC</td>
                <td><p id="ao_pic"></p></td>
              </tr>
              <tr>
                <td>Nama Supervisi</td>
                <td><p id="supervisi"></p></td>
              </tr>
              <tr>
                <td>Plafond</td>
                <td><p id="total_plafond"></p></td>
              </tr>
              <tr>
                <td>Tujuan Opini</td>
                <td><p id="tujuan_opini"></p></td>
              </tr>
              <tr>
                <td>No. Memo Pengajuan</td>
                <td><p id="no_memo"></p></td>
              </tr>
              <tr>
                <td>Tgl. Masuk Pengajuan</td>
                <td><p id="tgl_masuk"></p></td>
              </tr>
              <tr>
                <td>Jam Memo Diterima</td>
                <td><p id="jam_diterima"></p></td>
              </tr>
              <tr>
                <td>Tanggal Disposisi</td>
                <td><p id="tgl_disposisi_"></p></td>
              </tr>
              <tr>
                <td>Jam Disposisi</td>
                <td><p id="jam_disposisi_"></p></td>
              </tr>
              <tr>
                <td>Tanggal Lengkap</td>
                <td> <p id="tgl_lengkap_"></p> </td>
              </tr>
              <tr>
                <td>Jam Lengkap</td>
                <td><p id="jam_lengkap_"></p></td>
              </tr>
              <tr>
                <td>Status</td>
                <td><p id="status_opini"></p></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="#" id="button-print" class="btn btn-primary">Print</a>
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

  <script type="text/javascript">
    function ViewData(id) {
      $.ajax({
        url: 'http://127.0.0.1:8000/get_opini/' + id,
        type: 'get',
        dataType: 'json',
        success: function(dt) {
          $('#nama_maker').html(dt[0].maker);
          $('#nama_nasabah').html(dt[0].nama_nasabah);
          $('#nama_cabang').html(dt[0].namacabang);
          $('#badan_usaha').html(dt[0].namabadanusaha);
          $('#ao_pic').html(dt[0].nama_ao_pic);
          $('#total_plafond').html(dt[0].plafond);
          $('#no_memo').html(dt[0].no_memo_pengajuan);
          $('#tgl_masuk').html(dt[0].tgl_masuk_pengajuan);
          $('#jam_diterima').html(dt[0].jam_memo_diterima);
          $('#supervisi').html(dt[0].nama_supervisi);
          $('#tujuan_opini').html(dt[0].namatujuan);
          $('#status_opini').html(dt[0].status);
          $('#tgl_disposisi_').html(dt[0].tgl_disposisi);
          $('#jam_disposisi_').html(dt[0].jam_disposisi);
          $('#tgl_lengkap_').html(dt[0].tgl_lengkap);
          $('#jam_lengkap_').html(dt[0].jam_lengkap);
          $('#button-print').attr('href','http://127.0.0.1:8000/print_opini/'+ dt[0].Id +'');
          $('#myModal').modal('show');
        }
      });
    }
  </script>
  @endsection
