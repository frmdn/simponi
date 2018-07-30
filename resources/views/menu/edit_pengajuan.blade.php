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
                <h3 class="panel-title">Edit Pengajuan Opini</h3>
              </div>
              <div class="panel-body">
                <form class="" action="/edit" method="post">
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

  										<tr>
  											<td>
  												<br>
  												Tgl Disposisi
  												<input type="text" class="form-control" value="{{ str_replace("-","/",$data->tgl_disposisi) }}" style="width:95%" id="tgldisposisi" name="tgldisposisi" required>
  											</td>
  											<td>
  												<br>
  												Jam Disposisi
  												<!-- <input type="text" class="form-control" > -->
  												<div class="bootstrap-timepicker">
  						                <input type="text" name="jamdisposisi" value="{{ $data->jam_disposisi }}" class="form-control timepicker">
  						          	</div>
  											</td>
  										</tr>

  										<tr>
  											<td>
  												<br>
  												Tgl Data Lengkap (Awal Perhitungan SLA)
  												<input type="text" class="form-control" value="{{ str_replace("-","/",$data->tgl_lengkap) }}" style="width:95%" id="tgllengkap" name="tgllengkap" required>
  											</td>
  											<td>
  												<br>
  												Jam Data Lengkap
  												<!-- <input type="text" class="form-control" > -->
  												<div class="bootstrap-timepicker">
  						                <input type="text" name="jamlengkap" value="{{ $data->jam_lengkap }}" class="form-control timepicker">
  						          	</div>
  											</td>
  										</tr>

                      <tr>
  											<td>
  												<br>
  												Status
                          <select class="form-control" name="status" id="status" style="width:95%">
                            <option value="On Progress" >On Progress</option>
                            <option value="Batal" >Batal</option>
                            <option value="Dikembalikan" >Dikembalikan</option>
                            <option value="Selesai" >Selesai</option>
                          </select>
  											</td>
                        <td>
                          <br>
                          Alasan
                         
                          <div>
                              <input type="text"  class="form-control" name="alasanedit" id="alasanedit">
                          </div>
                        </td>
  											
  										</tr>

                      <tr>
  											
  											<td>
                          <br>
                          Tanggal
                          <!-- <input type="text" class="form-control" > -->
                          <div>
                              <input type="text" id="tanggaledit" name="tanggaledit" style="width:95%"   class="form-control">
                          </div>
                        </td>
                        <td>
                          <br>
                          Waktu
                          <input type="text" class="form-control timepicker" value="" id="waktuedit" name="waktuedit" required>
                        </td>
  										</tr>

                      <tr>
                        <td>
                          <br>
                          <button type="submit" class="btn btn-primary btn-toastr" data-context="info" data-message="This is general theme info" data-position="top-right">Simpan</button>
                          <button type="button" onclick="location.href='/list_pengajuan';" class="btn btn-danger btn-toastr" data-context="error" data-message="This is error info" data-position="top-right">Batal</button>
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
		    $('#tglmasuk').datepicker({
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
