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
        @if (session()->has('s_list_user'))
        <div class="table-responsive">
         <table class="table table-bordered table-hover" id="list">
          <thead>
           <tr>
            <tr>
              <th style="text-align:center" nowrap="">NO</th>
              <th style="text-align:center" nowrap="">MAKER</th>
              <th style="text-align:center" nowrap="">BADAN USAHA</th>
              <th style="text-align:center" nowrap="">CABANG</th>
              <th style="text-align:center" nowrap="">NAMA AO PIC</th>
              <th style="text-align:center" nowrap="">NAMA SUPERVISI</th>
              <th style="text-align:center" nowrap="">STATUS</th>
              <th style="text-align:center" nowrap="">AKSI</th>
            </tr>
          </tr>
        </thead>
        <tbody>
          @foreach ($listpengajuan as $row)
          <tr>
            <td nowrap>{{ $loop->iteration }}</td>
            <td nowrap>{{ $row->maker }}</td>
            <td nowrap>{{ $row->namacabang }}</td>
            <td nowrap>{{ $row->nama_nasabah }}</td>
            <td nowrap>{{ $row->nama_ao_pic }}</td>
            <td nowrap>{{ $row->nama_supervisi }}</td>
            <td nowrap>{{ $row->status }}</td>
            <td style="text-align:center" nowrap>
              <button onclick="location.href='/edit_pengembalian/edit/{{ $row->Id }}';" class="btn btn-primary">Edit</button>   
              @if (Session::get('level')=='admin')
                <button onclick="window.location='/edit_pengembalian/delete/{{ $row->Id }}';" class="btn btn-warning">Delete</button>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
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
</script>
@endsection
