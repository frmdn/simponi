@extends('menu.layout.header-menu')

@section('main')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Input User</h4>
      </div>
      <div class="modal-body">
        <form action="/r_add_user" method="post">
          <input type="hidden" class="form-control" name="id" id="id" required>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" class="form-control" name="username" id="username" required>
            {{-- oninvalid="this.setCustomValidity('Kosong bray')" oninput="this.setCustomValidity('')" --}}
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Password:</label>
            <input type="password" class="form-control" name="password" id="password" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Confirm Password:</label>
            <input type="password" class="form-control" name="password2" id="password2" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Full Name:</label>
            <input type="text" class="form-control" name="fullname" id="fullname" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Level User:</label>
            <select class="form-control" name="leveluser" id="leveluser">
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger">Clear</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          {{ csrf_field() }}
        </form>
      </div>
    </div>
  </div>
</div>

<div class="main">
  <div class="main-content">
   <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
       <div class="panel">
        <div class="panel-heading">
         <h3 class="panel-title">List User</h3>
       </div>
       <div class="panel-body">
        <div class="table-responsive">
         <table class="table table-bordered table-hover" id="list" data-target="#exampleModal">
          <thead>
           <tr>
            <th style="text-align:center" nowrap>ACTION</th>
            @foreach ($columns as $columns)
            @if($columns != 'id')
            <th style="text-align:center" nowrap>{{ strtoupper(str_replace("_"," ",$columns)) }}</th>
            @endif
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach ($edituser as $edtuser)
          <tr id="{{ $edtuser->id }}">
            <td style="text-align:center" nowrap>
              <button id="tesbro" style="width:80px;" class="btn btn-info" onclick="EditData('{{ $edtuser->id }}')">Edit</button>   
              <button style="width:80px;" onclick="location.href='/r_delete_user/{{ $edtuser->username }}';" class="btn btn-warning">Delete</button>  
            </td>
            <td nowrap>{{ $edtuser->username }}</td>
            <td nowrap>{{ $edtuser->password }}</td>
            <td nowrap>{{ $edtuser->full_name }}</td>
            <td nowrap>{{ $edtuser->level_user }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $edituser->links() }}
    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">Add User</button>
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
    case 'gagalsimpan':
    toastr.error("{{ Session::get('message') }}");
    break;
    case 'suksessimpan':
    toastr.success("{{ Session::get('message') }}");
    break;
    case 'gagalhapus':
    toastr.error("{{ Session::get('message') }}");
    break;
  }
  @endif
</script>

<script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
  })
</script>

<script>
  var passwordx = document.getElementById("password")
  , confirm_passwordx = document.getElementById("password2");

  function validatePassword(){
    if(passwordx.value != confirm_passwordx.value) {
      confirm_passwordx.setCustomValidity("Passwords Don't Match");
    } else {
      confirm_passwordx.setCustomValidity('');
    }
  }

  passwordx.onchange = validatePassword;
  confirm_passwordx.onkeyup = validatePassword;
</script>

<script>

    // $('#tesbro').click(function() {
    //   $('#exampleModal').modal('show');
    // });

    function EditData(id) {
      strplus = "#"+id;
      usrname = $(strplus+" td:nth-child(2)").text();
      pass = $(strplus+" td:nth-child(3)").text();
      c_pass = $(strplus+" td:nth-child(3)").text();
      fullnm = $(strplus+" td:nth-child(4)").text();
      lvl = $(strplus+" td:nth-child(5)").text();
      $('#id').val(id);
      $('#username').val(usrname);
      $('#password').val(pass);
      $('#password2').val(c_pass);
      $('#fullname').val(fullnm);
      $('#leveluser').val(lvl);
      $('#exampleModal').modal('show');
    }
    // var table = document.getElementById('table');
    //
    // for(var i = 1; i < table.rows.length; i++){
    //   table.rows[i].onclick = function(){
    //     document.getElementById("fname").value = this.cells[0].innerHTML;
    //     document.getElementById("lname").value = this.cells[1].innerHTML;
    //     document.getElementById("age").value = this.cells[2].innerHTML;
    //   };
    // }
  </script>
  @endsection
