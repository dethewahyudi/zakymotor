@extends('index')
@section('title', 'Pembayaran')
@section('atas', 'TRANSAKSI PEMBAYARAN')
@section('transaksi', 'menu-open')
@section('pembayaran', 'active')
@section('content')

<div style="margin-top: 20px;" class="container" ng-init="mastertransaksibayar()"> 

  <table id="user-table" class="hover" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>STATUS</th>
        <th>NO KONTRAK</th>
       <th>NIK</th>
        <th>NAMA</th>
        <th>TELP</th>
        <th>TENOR</th>
        <th>DIBAYAR</th>
         <th></th>
      </tr>
    </thead>
    <tbody>
      <tr dt-rows ng-repeat="x in xx" >
        <td style="width: 10%; ">
          <div >@{{ $index+1 }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.BAYAR}}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.BUKTI_NO }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.NIK}}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.NAMA}}</div>
        </td>
         <td style="width: 15%; ">
          <div >@{{ x.NOTELP }}</div>
        </td>
          <td style="width: 15%; ">
          <div >@{{ x.TENOR }}</div>
        </td>
        <td style="width: 15%;" >
          <div >@{{x.PAID }}</div>
        </td>
        <td align="center">

        	 <button  ng-if="x.TENOR != x.PAID" ng-click="validmasterbayar(x.PAID,x.BUKTI_NO,x.NIK,x.NAMA,x.NOTELP,x.ALAMAT,x.TENOR,x.TOTAL  | currency:'':000,x.TOTAL/(x.TENOR-x.PAID) | currency:'':000,x.PRDCD,x.BAYAR
)" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" >
              <i class="glyphicon glyphicon-floppy-saved"></i> BAYAR
          </button>

          <button style="width: 100px;padding: 0px;" ng-if="x.TENOR == x.PAID" type="button" class="btn btn-info" disabled="true" >
              <i class="glyphicon glyphicon-floppy-saved"></i> SUDAH LUNAS
          </button>

        </td>
      </tr>
     
    </tbody>
  </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel"><B>Form Pembayaran</B></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <input id='Prdcd' ng-model='Prdcd' placeholder='0' style='background-color: white;display:none;' readonly>
      <input id='Bayar' ng-model='Bayar' placeholder='0' style='background-color: white;display:none;' readonly>

      <div class="modal-body">    
       <table>

      <tr><td>Tagihan Ke </td><td>:</td><td><input id='Tagihanke' ng-model='Tagihanke' placeholder='0' style='background-color: white;' readonly class='form-control'></td></tr>
      <tr><td>No Kontrak</td><td>:</td><td><input  style='background-color: white;' readonly class='form-control' id='Bukti_No' ng-model='Bukti_No' placeholder='Bukti_No' ></td><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>Nik</td><td>:</td><td><input  style='background-color: white;' readonly class='form-control' id='Nik' ng-model='Nik' placeholder='Nik' ></td><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>Nama</td><td>:</td><td><input  style='background-color: white;' readonly class='form-control' id='Nama' ng-model='Nama' placeholder='Nama' ></td><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>Notelp</td><td>:</td><td><input  style='background-color: white;' readonly class='form-control' id='Notelp' ng-model='Notelp' placeholder='Notelp' ></td><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>Alamat</td><td>:</td><td><input  style='background-color: white;' readonly class='form-control' id='Alamat' ng-model='Alamat' placeholder='Alamat' ></td><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>Tenor</td><td>:</td><td><input  style='background-color: white;' readonly class='form-control' id='Tenor' ng-model='Tenor' placeholder='Tenor' ></td><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>Hutang</td><td>:</td><td><input  style='background-color: white;' readonly class='form-control' id='Total' ng-model='Total' placeholder='Total' ></td><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>Min.Pembayaran</td><td>:</td><td><input  style='background-color: white;' readonly  class='form-control' id='Cicilan' ng-model='Cicilan' placeholder='Cicilan' ></td><td>&nbsp;</td><td>&nbsp;</td></tr>
       <tr><td>Pembayaran</td><td>:</td><td>
        <select ng-model='Jumlah' ng-change="hitung()" >
          <option ng-repeat="y in range">@{{ y }}</option>
        </select>
      </tr>
      <tr><td>Nominal</td><td>:</td><td><input readonly style='background-color: white;' class='form-control' id='Nominal' class='Nominal' ng-model="Nominal" placeholder='Nominal' ></td><td>&nbsp;</td><td>&nbsp;</td></tr>



        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Simpan</button>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" data-target="#exampleModal3" ng-click="insertpembayaran()">YA</button>
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
         {{-- <button type="button" class="btn btn-primary" ng-click="cetak()" >Cetak</button> --}}
      </div>
    </div>
  </div>
</div>

@endsection