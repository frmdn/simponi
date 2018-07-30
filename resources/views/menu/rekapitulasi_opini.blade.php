@extends('menu.layout.header-menu')

@section('main')
<div class="main">
  <div class="main-content">
   <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
       <div class="panel">
        <div class="panel-heading">
         <h3 class="panel-title">Rekapitulasi Opini</h3>
       </div>
       <div class="panel-body">
        <form class="form-inline" role="form" action="/rekapitulasi/search" method="post">
          {{ csrf_field() }}
          <div class="form-group">
           <label for="month">By : </label>
           <select class="form-control" id="by" name="by">
            <option value="maker">Maker</option>
            <option value="cabang">Cabang</option>
          </select>
        </div>
        <div class="form-group">
         <label for="month">Month : </label>
         <select class="form-control" id="month" name="month">
          <?php
          for($index=1; $index<=12; $index++){
            if($index<10){
              $key = "0".$index;
            }else{
              $key = $index;
            }
            echo "<option value='".$key."'>".$month[$key]."</option>";
          }?>
        </select>
      </div>
      <div class="form-group">
        <label for="month">Year : </label>
        <select class="form-control" id="year" name="year">
         <option value="2018">2018</option>
       </select>
     </div>
     <button type="submit" class="btn btn-success">
       Cari
     </button>
   </form>
   <br>
   <div class="text-center" style="margin-bottom: 10px;">
    <a href="/d/all" class="btn btn-primary btn-toastr">Download</a>
  </div>
  <div class="table-responsive">
   <table class="table table-bordered table-hover" id="list">
    <thead>
     <tr>
      <th rowspan="2" style="text-align:center;vertical-align: middle;">No</th>
      <th rowspan="2" style="text-align:center;vertical-align: middle;">Master</th>
      <th colspan="4" style="text-align:center">Status Opini</th>
      <th colspan="2" style="text-align:center">SLA</th>
    </tr>
    <tr>
      <th>On Progress</th>
      <th>Dikembalikan</th>
      <th>Batal</th>
      <th>Sukses</th>
      <th>Terpenuhi</th>
      <th>Terlewati</th>
    </tr>
  </thead>
  <tbody>
    @if(@$rekap)
    @foreach($rekap as $data)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $data["label"] }}</td>
      <td>{{ $data["onprogress"] }}</td>
      <td>{{ $data["dikembalikan"] }}</td>
      <td>{{ $data["batal"] }}</td>
      <td>{{ $data["selesai"] }}</td>
      <td>{{ $data["terpenuhi"] }}</td>
      <td>{{ $data["terlewati"] }}</td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
</div>

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
