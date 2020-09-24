@extends('index')
@section('title', 'Penjualan')
@section('atas', 'TRANSAKSI PENJUALAN')
@section('transaksi', 'menu-open')
@section('penjualan', 'active')
@section('content')
<br>
  
<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4" > 
              <i class="  glyphicon glyphicon-floppy-saved"></i> Form Penjualan Motor
          </button>

<div style="margin-top: 20px;" class="container" ng-init="mastertransaksijual()"> 

 <table id="user-table" class="hover" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>TANGGAL</th>
        <th>BRAND</th>
        <th>NAMA</th>
        <th>CC</th>
        <th>WARNA</th>
       <th>TAHUN</th>
       <th>KONDISI</th>
       <th>NOMESIN</th>
       <th>NORANGKA</th>
       <th>NOPILISI</th>
       <th>HARGA</th>
      </tr>
    </thead>
    <tbody>
      <tr dt-rows ng-repeat="x in xx" >
        <td style="width: 10%; ">
          <div >@{{ $index+1 }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.BUKTI_TGL | date : 'dd-MMM-y'}}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.BRAND }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.NAMA}}</div>
        </td>
         <td style="width: 15%; ">
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
          <td style="width: 15%; ">
          <div >@{{ x.NOMESIN }}</div>
        </td>
         <td style="width: 15%; ">
          <div >@{{ x.NORANGKA }}</div>
        </td>
          <td style="width: 15%; ">
          <div >@{{ x.NOPOLISI }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.PRICE | currency :'':000  }}</div>
        </td>
    
      </tr>
     
    </tbody>
  </table>
</div>


{{--  --}}

<div class="modal fade" style="overflow-y: auto;"  id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel"><B>Form Penjualan Motor</B></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="container" > 

 <h2><B>Data Konsumen</B></h2>
<table>
<tr><td>Nik</td><td>:</td><td><input style="text-transform:uppercase;" class='form-control' id='Nik' ng-model='Nik' placeholder='Nik' ></td></tr>
<tr><td>Nama</td><td>:</td><td><input style="text-transform:uppercase;" class='form-control' id='Namaa' ng-model='Namaa' placeholder='Nama' ></td></tr>
<tr><td>Alamat</td><td>:</td><td><input style="text-transform:uppercase;"  class='form-control' id='Alamat' ng-model='Alamat' placeholder='Alamat' ></td></tr>
<tr><td>Kota</td><td>:</td><td><input style="text-transform:uppercase;"  class='form-control' id='Kota' ng-model='Kota' placeholder='Kota' ></td></tr>
<tr><td>Handphone</td><td>:</td><td><input style="text-transform:uppercase;" class='form-control' id='Handphone' ng-model='Handphone' placeholder='Handphone' ></td></tr>

</table>

  
<hr>

 <h2><B>Data Unit</B></h2>

 <table >

  <tr><td>Kode</td><td>:</td><td><input style='background-color: white;' readonly class='form-control' id='Prdcd' ng-model='Prdcd' placeholder='Kode' ></td><td>
    <button ng-click="tampil2()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
              <i class="glyphicon glyphicon-floppy-saved"></i> Cari
          </button></td><td>&nbsp;</td>
<td>Brand</td><td>:</td><td><input style='background-color: white;' readonly  class='form-control' id='Brand' ng-model='Brand' placeholder='Brand' ></td></tr>
<tr><td>Nama</td><td>:</td><td><input  style='background-color: white;' readonly class='form-control' id='Nama' ng-model='Nama' placeholder='Nama' ></td><td>&nbsp;</td><td>&nbsp;</td>
<td>Jenis</td><td>:</td><td><input style='background-color: white;' readonly  class='form-control' id='Jenis' ng-model='Jenis' placeholder='Jenis' ></td></tr>
<tr><td>Cc</td><td>:</td><td><input style='background-color: white;' readonly class='form-control' id='Cc' ng-model='Cc' placeholder='Cc' ></td><td>&nbsp;</td><td>&nbsp;</td>
<td>Tahun</td><td>:</td><td><input style='background-color: white;' readonly  class='form-control' id='Tahun' ng-model='Tahun' placeholder='Tahun' ></td></tr>
<tr><td>Warna</td><td>:</td><td><input style='background-color: white;' readonly class='form-control' id='Warna' ng-model='Warna' placeholder='Warna' ></td><td>&nbsp;</td><td>&nbsp;</td>
<td>Norangka</td><td>:</td><td><input style='background-color: white;' readonly  class='form-control' id='Norangka' ng-model='Norangka' placeholder='Norangka' ></td></tr>
<tr><td>Nomesin</td><td>:</td><td><input style='background-color: white;' readonly class='form-control' id='Nomesin' ng-model='Nomesin' placeholder='Nomesin' ></td><td>&nbsp;</td><td>&nbsp;</td>
<td>Kondisi</td><td>:</td><td><input style='background-color: white;' readonly  class='form-control' id='Kondisi' ng-model='Kondisi' placeholder='Kondisi' ></td></tr>
<tr><td>NoPlat</td><td>:</td><td><input style='background-color: white;' readonly class='form-control' id='NoPolisi' ng-model='NoPolisi' placeholder='NoPolisi' ></td></tr>
<tr><td>Harga</td><td>:</td><td><input style='background-color: white;' readonly class='form-control' id='Harga' ng-model='Harga' placeholder='Harga' ></td><td>&nbsp;</td><td>&nbsp;</td>
  <td style='visibility:@{{ hidden }};'>Bunga</td><td style='visibility:@{{ hidden }};'>:</td><td colspan="3" style='visibility:@{{ hidden }};'><input style='background-color: white;width: 30%' class='form-control' id='Bunga' ng-model='Bunga' placeholder='%'></td></tr>
<tr><td>Pembayaran</td><td>:</td><td >

 
<select ng-model="Setor" ng-change="change()" ng-options="x for x in names" >
</select>

</td><td style='visibility:@{{ hidden }};'><button type="button" class="btn btn-primary" ng-click="bungakredit()">Calc
        </button></td><td>&nbsp;</td><td colspan="3" style='visibility:@{{ hidden }};font-weight: bold;color: red;'>@{{ angsuran }}@{{ kredit | currency :'Rp ':000}}</td></tr>
<tr><td>@{{ dp }}</td><td>:</td><td><input style='background-color: white;'  class='form-control' id='Jumlah' ng-model='Jumlah ' placeholder='Jumlah'></td><td>&nbsp;</td><td>&nbsp;</td>
<td style='visibility:@{{ hidden }};'>Tenor</td><td style='visibility:@{{ hidden }};'>:</td><td><input style='visibility:@{{ hidden }};width: 40%;background-color: white;' class='form-control' id='Tenor' ng-model='Tenor' placeholder='Tenor' ></td><td></td><td>&nbsp;</td></tr>
</table>



<hr>
  
</div>

</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" data-dismiss="modal" > 
              <i class="  glyphicon glyphicon-floppy-saved"></i> Simpan
          </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel"><B>List Master Motor</B></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
   <table id="user-table2" class="hover" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>BRAND</th>
        <th>NAMA</th>
        <th>WARNA</th>
        <th>HARGA</th>
        <th>TAHUN</th>
       <th>KONDISI</th>
        <th>NOMESIN</th>
        <th>NORANGKA</th>
        <th>NOPOLISI</th>
        <th></th>

      </tr>
    </thead>
    <tbody>
      <tr dt-rows ng-repeat="y in yy" >
        <td style="width: 10%; ">
          <div >@{{ $index+1 }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ y.PRDCD }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ y.BRAND }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ y.NAMA}} @{{y.SIZE}} CC</div>
        </td>
          <td style="width: 15%; ">
          <div >@{{ y.COLOR }}</div>
        </td>
         <td style="width: 15%; ">
          <div >@{{  y.PRICE | currency:"Rp. ":000 }}</div>
        </td>
          <td style="width: 15%; ">
          <div >@{{ y.TAHUN }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ y.KONDISI }}</div>
        </td>
          <td style="width: 15%; ">
          <div >@{{ y.NOMESIN }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ y.NORANGKA }}</div>
        </td>
          <td style="width: 15%; ">
          <div >@{{ y.NOPOLISI }}</div>
        </td>
        
       <td>
       <button ng-click="validpenjualan1(y.NAMA,y.JENIS,y.SIZE,y.TAHUN,y.COLOR,y.NORANGKA,y.NOMESIN,y.KONDISI,y.PRICE| currency:'':000,y.PRDCD,y.BRAND,y.NOPOLISI
)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > 
              <i class="  glyphicon glyphicon-floppy-saved"></i> Pilih
          </button>
       
        </td>
      </tr>
     
    </tbody>
  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-target="#exampleModal4" data-dismiss="modal">Simpan</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
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
        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="insertpenjualan()">YA</button>
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