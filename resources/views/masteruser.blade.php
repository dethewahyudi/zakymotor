@extends('index')
@section('title', 'Master User')
@section('atas', 'MASTER USER')
@section('master', 'menu-open')
@section('user', 'active')
@section('content')


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js"></script>

<div class="container" ng-init="tampiluser()"> 

   <button  style="margin: 20px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > 
              <i class="  glyphicon glyphicon-floppy-saved"></i> Tambah User
          </button>

{{--  <h2><B>Master User</B></h2>  --}}

          <table id="user-table" class="hover" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>NO</th>
        <th>ID</th>
        <th>PASSWORD</th>
        <th>NAMA</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr dt-rows ng-repeat="x in xx" >
        <td style="width: 10%; ">
          <div >@{{ $index+1 }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.username }}</div>
        </td>
        {{-- <td style="width: 15%; ">
          <div >@{{ x.password}}</div>
        </td> --}}
         <td style="width: 15%; ">
          <div >******</div>
        </td>
         <td style="width: 15%; ">
          <div >@{{ x.nama}}</div>
        </td>
       <td>
       <button ng-click="validuser(x.username,x.password,x.nama)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" > 
              <i class="  glyphicon glyphicon-floppy-saved"></i> Edit
          </button>      
        </td>
      </tr>    
    </tbody>
  </table>

<hr>
  
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel"><B>Tambah User</B></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">     
<table id="app">
  <tr><td>Status</td><td>:</td><td>
    <div v-html="pilih"></div>
  </td></tr>
<tr><td>User</td><td>:</td><td><input style="text-transform:uppercase;" class='form-control' id='User' ng-model='User' placeholder='User' ></td></tr>
<tr><td>Pass</td><td>:</td><td><input type="password" style="text-transform:uppercase;"  class='form-control' id='Pass' ng-model='Pass' placeholder='Pass' ></td></tr>
<tr><td>Nama</td><td>:</td><td><input style="text-transform:uppercase;" class='form-control' id='Nama' ng-model='Nama' placeholder='Nama' ></td></tr>
</table>
 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="usertambah()">Simpan</button>  
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel"><B>Edit User</B></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">     
<table>
<tr><td>User</td><td>:</td><td><input style="text-transform:uppercase;" class='form-control' id='User' ng-model='Useredit' placeholder='User' ></td></tr>
<tr><td>Pass</td><td>:</td><td><input type="password" style="text-transform:uppercase;"  class='form-control' id='Passedit' ng-model='Passedit' placeholder='Pass' ></td></tr>
<tr><td>Nama</td><td>:</td><td><input style="text-transform:uppercase;" class='form-control' id='Nama' ng-model='Namaedit' placeholder='Nama' ></td></tr>
</table>


      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="useredit()">Simpan</button> 
      </div>
    </div>
  </div>
</div>



 <div class="modal @{{display}} " id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="top: @{{tp}}px !important; ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Berhasil
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-primary" ng-click="modalun()" >OK</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var vm = new Vue({
    el: "#app",
    data:{
      pilih:'<select class="form-control" id="nik"><option value="admin">ADMIN</option><option value="user">USER</option></select>'
    }
  
  })
</script>

@endsection