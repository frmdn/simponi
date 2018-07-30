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
                <h3 class="panel-title">Monitoring Pengajuan Opini</h3>
              </div>
              <div class="panel-body">
                <form class="" action="/input_pengajuan" method="post">
                  <table style="width:100%">
                    <tr>
                      <td width="50%">
                        Maker
                        <input type="text" name="maker" id="maker" value="{{ Session::get('name') }}" class="form-control" style="width:95%" readonly>
                      </td>
                      <td width="50%">

                        Nama Nasabah<br>
                        <input type="text" name="namensbh" id="namensbh" class="form-control" required>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <br>
                        Badan Usaha
                        <select class="form-control" name="bdnusaha" id="bdnusaha" style="width:95%">
                          @foreach ($badan_usaha as $bu)
                            <option value={{ $bu->Id }}>{{ $bu->nama }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <br>
                        Cabang / Area
                        <select class="form-control" name="cbg" id="cbg">
                          @foreach ($cabang as $cabang)
                            <option value="{{ $cabang->Id }}">{{ $cabang->nama_lokasi }}</option>
                          @endforeach
                        </select>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <br>
                        Nama AO/PIC
                        <input type="text" name="namaaopic" class="form-control" style="width:95%" required>
                      </td>
                      <td>
                        <br>
                        Nama Supervisi
                        <input type="text" name="nmsupervisi" class="form-control" required>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <br>
                        Plafond
                        <input type="number" name="plafond" class="form-control" style="width:95%" required>
                      </td>
                      <td>
                        <br>
                        Tujuan Pengajuan Opini
                        <select class="form-control" name="tujopini" id="tujopini">
                          @foreach ($tujuan_pengajuan as $tujop)
                            <option value="{{ $tujop->Id }}">{{ $tujop->nama }}</option>
                          @endforeach
                        </select>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <br>
                        No. E-Memo Pengajuan Opini
                        <input type="text" name="nomemo" class="form-control" style="width:95%" required>
                      </td>
                      <td>
                      </td>
                    </tr>

                    <tr>
											<td>
												<br>
												Tgl Masuk E-Memo Pengajuan Opini
												<input type="text" class="form-control" style="width:95%" id="tglmasuk" name="tglmasuk" required>
											</td>
											<td>
												<br>
												Jam E-Memo Diterima
												<!-- <input type="text" class="form-control timepicker" > -->
												<div class="bootstrap-timepicker">
						                <input type="text" name="jammasuk" class="form-control timepicker">
						          	</div>
											</td>
										</tr>

										<tr>
											<td>
												<br>
												Tgl Disposisi
												<input type="text" class="form-control" style="width:95%" id="tgldisposisi" name="tgldisposisi" required>
											</td>
											<td>
												<br>
												Jam Disposisi
												<!-- <input type="text" class="form-control" > -->
												<div class="bootstrap-timepicker">
						                <input type="text" name="jamdisposisi" class="form-control timepicker">
						          	</div>
											</td>
										</tr>

										<tr>
											<td>
												<br>
												Tgl Data Lengkap (Awal Perhitungan SLA)
												<input type="text" class="form-control" style="width:95%" id="tgllengkap" name="tgllengkap" required>
											</td>
											<td>
												<br>
												Jam Data Lengkap
												<!-- <input type="text" class="form-control" > -->
												<div class="bootstrap-timepicker">
						                <input type="text" name="jamlengkap" class="form-control timepicker">
						          	</div>
											</td>
										</tr>

                    <tr>
                      <td>
                        <br>
                        <button type="submit" class="btn btn-primary btn-toastr" data-context="info" data-message="This is general theme info" data-position="top-right">Simpan</button>
                        <button type="reset" class="btn btn-danger btn-toastr" data-context="error" data-message="This is error info" data-position="top-right">Batal</button>
                      </td>
                    </tr>
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

  <script type="text/javascript">
    $(window).load(function(){
      $('#myModal').modal('show');
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
