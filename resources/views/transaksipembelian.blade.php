@extends('index')
@section('title', 'Input Barang')
@section('atas', 'INPUT BARANG')
@section('transaksi', 'menu-open')
@section('pembelian', 'active')
@section('content')
<br>
<button   type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > 
              <i class="  glyphicon glyphicon-floppy-saved"></i> Form Pembelian Motor
          </button>
          
<div style="margin-top: 20px;" class="container" ng-init="mastertransaksibeli()"> 
 <table  id="user-table" class="hover" cellspacing="0" width="%">
    <thead>
      <tr>
        <th>No</th>
        <th>DEALER</th>
        <th>TANGGAL</th>
        <th>BRAND</th>
        <th>NAMA</th>
        <th>CC</th>
        <th>WARNA</th>
       <th>TAHUN</th>
       <th>KONDISI</th>
       <th>HARGA</th>
       
      </tr>
    </thead>
    <tbody>
      <tr dt-rows ng-repeat="x in xx | filter:searchText " >
        <td style="width: 10px; ">
          <div >@{{ $index+1 }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.GUDANG }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.BUKTI_TGL | date : 'dd-MMM-y'}}</div>
        </td>
        <td style="width: 5%; ">
          <div >@{{ x.BRAND }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.NAMA}}</div>
        </td>
         <td style="width: 5%; ">
          <div >@{{ x.SIZE }}</div>
        </td>
          <td style="width: 15%; ">
          <div >@{{ x.COLOR }}</div>
        </td>
          <td style="width: 15%; ">
          <div >@{{ x.TAHUN }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.KONDISI }}</div>
        </td>
        <td style="width: 120px;" >
          <div >@{{ x.PRICE | currency :'':000  }}</div>
        </td>
      </tr>
    </tbody>
  </table>

</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel"><B>Form Input Barang</B></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 <table>
<tr><td>Dealer</td><td>:</td><td><select ng-model="Dealer">
  <option >PRIBADI</option>
  <option >DEALER1</option>
  <option >DEALER2</option>
  <option >DEALER3</option>
</select></td>
<td>&nbsp;</td><td>&nbsp;</td>
  <td>Brand</td><td>:</td><td>
    <select ng-model="Brand">
  <option >HONDA</option>
  <option >YAMAHA</option>
  <option >SUZUKI</option>
  <option >KAWASAKI</option>
</select></td></tr>
<tr><td>Kendaraan</td><td>:</td><td><input  style='text-transform:uppercase;background-color: white;'  class='form-control' id='Nama' ng-model='Nama' placeholder='Nama' ></td><td> 
</td><td>&nbsp;</td>
<td>Jenis Motor</td><td>:</td><td><select ng-model="Jenis">
  <option >BEBEK</option>
  <option >MATIC</option>
  <option >SPORT</option>
</select></td></tr>
<tr><td>Cc</td><td>:</td><td>
  <select ng-model="Size" >
    <option >110</option>
    <option >125</option>
    <option >150</option>
    <option >225</option>
    <option >250</option>
</select></td><td>&nbsp;</td><td>&nbsp;</td>
<td>Tahun</td><td>:</td><td><input style='text-transform:uppercase;background-color: white;' class='form-control' id='Tahun' ng-model='Tahun' placeholder='Tahun' ></td></tr>
<tr><td>Warna</td><td>:</td><td><select ng-model="Color" >
  <option >MERAH</option>
  <option >HITAM</option>
  <option >BIRU</option>
</select></td><td>&nbsp;</td><td>&nbsp;</td>
<td>Norangka</td><td>:</td><td><input style='text-transform:uppercase;background-color: white;' class='form-control' id='Norangka' ng-model='Norangka' placeholder='Norangka' ></td></tr>
<tr><td>Nomesin</td><td>:</td><td><input style='text-transform:uppercase;background-color: white;'  class='form-control' id='Nomesin' ng-model='Nomesin' placeholder='Nomesin' ></td><td>&nbsp;</td><td>&nbsp;</td>
<td>Kondisi</td><td>:</td><td><select ng-model="Kondisi" >
  <option >BARU</option>
  <option >BEKAS</option>
</select></td></tr>
<tr><td>NoPlat</td><td>:</td><td><input style='text-transform:uppercase;background-color: white;'  class='form-control' id='NoPolisi' ng-model='NoPolisi' placeholder='NoPlat' ></td><td>&nbsp;</td><td>&nbsp;</td>
<td>HargaJual</td><td>:</td><td><input style='text-transform:uppercase;background-color: white;'   class='form-control' id='HargaJual' ng-model='Price' placeholder='HargaJual' ></td></tr>

</table>
 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button  type="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target="#exampleModal2" > 
              <i class="  glyphicon glyphicon-floppy-saved"></i> Simpan
          </button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Data Yang Anda Masukkan Sudah Benar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="insertpembelian()">YA</button>
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




@endsection