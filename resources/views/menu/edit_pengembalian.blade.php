@extends('menu.layout.header-menu')

@section('main')

<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- END BUTTONS -->
          <!-- INPUTS -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Edit Pengembalian Opini</h3>
            </div>
            <div class="panel-body">
              <form class="" action="/edit_pengembalian" method="post">
                <table style="width:100%">
                  @foreach ($data as $data)
                  <tr>
                    <td width="50%">
                      Maker
                      <input type="hidden" name="idopini" id="idopini" value="{{ $data->Id }}" readonly>
                      <input type="text" name="maker" id="maker" value="{{ $data->maker }}" class="form-control" style="width:95%" readonly>
                    </td>
                    <td width="50%">

                      Nama Nasabah<br>
                      <input type="text" name="namensbh" id="namensbh" value="{{ $data->nama_nasabah }}" class="form-control" required>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <br>
                      Badan Usaha
                      <select class="form-control" name="bdnusaha" id="bdnusaha" style="width:95%">
                        @foreach ($badan_usaha as $bu)
                        <option value="{{ $bu->Id }}" @if ($bu->Id==$data->badan_usaha) selected @endif>{{ $bu->nama }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <br>
                      Cabang / Area
                      <select class="form-control" name="cbg" id="cbg">
                        @foreach ($cabang as $cabang)
                        <option value="{{ $cabang->Id }}" @if ($cabang->Id==$data->cabang) selected @endif>{{ $cabang->nama_lokasi }}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <br>
                      Nama AO/PIC
                      <input type="text" name="namaaopic" value="{{ $data->nama_ao_pic }}" class="form-control" style="width:95%" required>
                    </td>
                    <td>
                      <br>
                      Nama Supervisi
                      <input type="text" name="nmsupervisi" value="{{ $data->nama_supervisi }}" class="form-control" required>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <br>
                      Plafond
                      <input type="text" name="plafond" value="{{ $data->plafond }}" class="form-control" style="width:95%" required>
                    </td>
                    <td>
                      <br>
                      Tujuan Pengajuan Opini
                      <select class="form-control" name="tujopini" id="tujopini">
                        @foreach ($tujuan_pengajuan as $tujop)
                        <option value="{{ $tujop->Id }}" @if ($tujop->Id==$data->tujuan_opini) selected @endif>{{ $tujop->nama }}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <br>
                      No. E-Memo Pengajuan Opini
                      <input type="text" name="nomemo" value="{{ $data->no_memo_pengajuan }}" class="form-control" style="width:95%" required>
                    </td>
                    <td>
                    </td>
                  </tr>

                  <tr>
                   <td>
                    <br>
                    Tgl Masuk E-Memo Pengajuan Opini
                    <input type="text" class="form-control" value="{{ str_replace("-","/",$data->tgl_masuk_pengajuan) }}" style="width:95%" id="tglmasuk" name="tglmasuk" required>
                  </td>
                  <td>
                    <br>
                    Jam E-Memo Diterima
                    <!-- <input type="text" class="form-control timepicker" > -->
                    <div class="bootstrap-timepicker">
                      <input type="text" name="jammasuk" value="{{ $data->jam_memo_diterima }}" class="form-control timepicker">
                    </div>
                  </td>
                </tr>
                {{-- Tambahan --}}
                <tr>
                 <td>
                  <br>
                  No. Memo Pengembalian
                  <input type="text" class="form-control" value="{{ str_replace("-","/",$data->no_memo_pengembalian) }}" style="width:95%" id="no_memo_pengembalian" name="no_memo_pengembalian" required>
                </td>
                <td rowspan="6">
                  <br>
                  <label>Rincian Kekurangan Dokumen</label>
                  <!-- <input type="text" class="form-control timepicker" > -->
                  <div class="form-group">
                    <input type="checkbox" name="kd1" value="1" {{ $data->kd1 == 1 ? 'checked="checked"' : '' }}> Surat Permohonan Nasabah <br>
                    <input type="checkbox" name="kd2" value="1" {{ $data->kd2 == 1 ? 'checked="checked"' : '' }}> Proposal Pembiayaan <br>
                    <input type="checkbox" name="kd3" value="1" {{ $data->kd3 == 1 ? 'checked="checked"' : '' }}> Proposal Nasabah <br>
                    <input type="checkbox" name="kd4" value="1" {{ $data->kd4 == 1 ? 'checked="checked"' : '' }}> Analisa Yuridis <br>
                    <input type="checkbox" name="kd5" value="1" {{ $data->kd5 == 1 ? 'checked="checked"' : '' }}> Laporan Taksasi <br>
                    <input type="checkbox" name="kd6" value="1" {{ $data->kd6 == 1 ? 'checked="checked"' : '' }}> Laporan KJPP + Laporan kelayakan Agunan oleh IP <br>
                    <input type="checkbox" name="kd7" value="1" {{ $data->kd7 == 1 ? 'checked="checked"' : '' }}> Laporan Taksasi IP BSB <br>
                    <input type="checkbox" name="kd8" value="1" {{ $data->kd8 == 1 ? 'checked="checked"' : '' }}> Laporan Personal / Trade Checking <br>
                    <input type="checkbox" name="kd9" value="1" {{ $data->kd9 == 1 ? 'checked="checked"' : '' }}> Laporan Kunjungan 2 tahun terakhir <br>
                    <input type="checkbox" name="kd10" value="1" {{ $data->kd10 == 1 ? 'checked="checked"' : '' }}> Rekap Mutasi Perbankan <br>
                    <input type="checkbox" name="kd11" value="1" {{ $data->kd11 == 1 ? 'checked="checked"' : '' }}> Persetujuan Proses dari Direksi <br>
                    <input type="checkbox" name="kd12" value="1" {{ $data->kd12 == 1 ? 'checked="checked"' : '' }}> Rencana Kerja <br>
                    <input type="checkbox" name="kd13" value="1" {{ $data->kd13 == 1 ? 'checked="checked"' : '' }}> Studi Kelayakan / Analisa Kelayakan <br>
                    <input type="checkbox" name="kd14" value="1" {{ $data->kd14 == 1 ? 'checked="checked"' : '' }}> Analisa Yuridis terhadap PKS <br>
                    <input type="checkbox" name="kd15" value="1" {{ $data->kd15 == 1 ? 'checked="checked"' : '' }}> Rencana Anggaran Biaya (RAB) <br>
                    <input type="checkbox" name="kd16" value="1" {{ $data->kd16 == 1 ? 'checked="checked"' : '' }}> Kurva S (time schedule report) <br>
                    <input type="checkbox" name="kd17" value="1" {{ $data->kd17 == 1 ? 'checked="checked"' : '' }}> Surat Penawaran <br>
                    <input type="checkbox" name="kd18" value="1" {{ $data->kd18 == 1 ? 'checked="checked"' : '' }}> MKP dan SPPFP Fasilitas terdahulu <br>
                    <input type="checkbox" name="kd19" value="1" {{ $data->kd19 == 1 ? 'checked="checked"' : '' }}> OL/SPPFP dari Bank Lain <br>
                    <input type="checkbox" name="kd20" value="1" {{ $data->kd20 == 1 ? 'checked="checked"' : '' }}> laporan Kunjungan dan Informasi Nasabah <br>
                    <input type="checkbox" name="kd21" value="1" {{ $data->kd21 == 1 ? 'checked="checked"' : '' }} > Rekap BI Checking posisi terbaru <br>
                    <input type="checkbox" name="kd22" value="1" {{ $data->kd22 == 1 ? 'checked="checked"' : '' }}> Bukti Outstanding <br>
                    <input type="checkbox" name="kd23" value="1" {{ $data->kd23 == 1 ? 'checked="checked"' : '' }}> Isi Jika Lain-lain <br>
                  </div>
                </td>
              </tr>

              <tr>
               <td>
                <br>
                Tgl Pengembalian
                <input type="text" class="form-control" style="width:95%" value="{{ $data->tgl_pengembalian != null ? str_replace("-","/",$data->tgl_pengembalian) : null}}" id="tgl_pengembalian" name="tgl_pengembalian" required>
              </td>
            </tr>

            <tr>
             <td>
              <br>
              Waktu Pengembalian
              <input type="text" class="form-control timepicker" value="{{ $data->waktu_pengembalian != null ? $data->waktu_pengembalian : null}}" style="width:95%" id="waktukembali" name="waktukembali" required>
            </td>
          </tr>
          <tr>
           <td>
            <br>
            Alasan Pengembalian
            <select class="form-control" name="alasankembali" id="alasankembali" style="width:95%">
              {{-- @foreach ($badan_usaha as $bu) --}}
              {{-- <option value="{{ $bu->Id }}" @if ($bu->Id==$data->badan_usaha) selected @endif>{{ $bu->nama }}</option> --}}
              <option value="1">Kekurangan Kelengkapan Dokumen</option>
              <option value="2">Isi Jika Lain-lain</option>
              {{-- @endforeach --}}
            </select>            
            <input type="text" class="form-control" name="alasan_lain" id="alasan_lain" style="visibility: hidden;margin-top: 10px; width: 95%">
          </td>
        </tr>

        <tr>
         <td>
          <br>
          Jenis Kelengkapan Dokumen
          <select class="form-control" name="kelengkapan_dok" id="kelengkapan_dok" style="width:95%">
              {{-- @foreach ($badan_usaha as $bu) --}}
              {{-- <option value="{{ $bu->Id }}" @if ($bu->Id==$data->badan_usaha) selected @endif>{{ $bu->nama }}</option> --}}
              <option value="1">Dokumen Wajib Umum</option>
              <option value="2">Dokumen Wajib Khusus</option>
              <option value="3">Isi Jika Lain-lain</option>
              {{-- @endforeach --}}
            </select>
            <input type="text" name="kelengkapan_lain" id="kelengkapan_lain" hidden="true" style="visibility: hidden;margin-top: 10px; width: 95%" class="form-control">
        </td>
      </tr>
      <tr>
       <td>
        <br>
        Keterangan Tambahan
        <textarea class="form-control" style="width:95%" id="ket_tambahan" name="ket_tambahan" required>{{ $data->ket_tambahan }}</textarea>
      </td>
    </tr>

    {{-- End Tambahan --}}
    <tr>
      <td>
        <br>
        <button type="submit" class="btn btn-primary btn-toastr" data-context="info" data-message="This is general theme info" data-position="top-right">Simpan</button>
        <button type="button" onclick="location.href='/pengembalian';" class="btn btn-danger btn-toastr" data-context="error" data-message="This is error info" data-position="top-right">Batal</button>
      </td>
      <td>

      </td>
    </tr>
    @endforeach
  </table>
  {{ csrf_field() }}
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- END MAIN CONTENT -->
</div>
@endsection

@section('style')
<script>
  $(function() {
			//Datemask dd/mm/yyyy
    		//$("#datepicker").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

			//Date picker
      $('#tgl_pengembalian').datepicker({
        autoclose: true
      });

		    //Date picker
		    $('#tgldisposisi').datepicker({
          autoclose: true
        });

        //Date picker
        $('#tanggaledit').datepicker({
          autoclose: true
        });

		    //Date picker
		    $('#tgllengkap').datepicker({
          autoclose: true
        });

		    //Timepicker
		    $(".timepicker").timepicker({
          showInputs: false,
          showMeridian: false
        });
      });
    </script>

    <script>
      @if (Session::has('message'))
      var type = "{{Session::get('alert-type','info')}}"

      switch (type) {
        case 'sukseslogin':
        toastr.info("{{ Session::get('message') }}" + "{{ Session::get('name') }}");
        break;
        case 'suksessimpan':
        toastr.success("{{ Session::get('message') }}");
        break;
        case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
        case 'gagalsimpan':
        toastr.error("{{ Session::get('message') }}");
        break;

      }
      @endif
    </script>
    @endsection
