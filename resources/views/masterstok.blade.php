@extends('index')
@section('title', 'Master Stok')
@section('atas', 'MASTER STOK')
@section('content')

<div class="container" ng-init="tampil2()"> 

 <h2><B>Stok Master Barang</B></h2> <BR>
  <table class="table" datatable="ng" >
    <thead>
      <tr>
        <th>No</th>
        <th>BRAND</th>
        <th>NAMA</th>
        <th>WARNA</th>
        <th>TAHUN</th>
        <th>NO MESIN</th>
        <th>NO RANGKA</th>
        <th>QTY</th>
         <th></th>
      </tr>
    </thead>
    <tbody>
      <tr dt-rows ng-repeat="x in xx" >
        <td style="width: 10%; ">
          <div >@{{ $index+1 }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.BRAND }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.NAMA}} @{{x.SIZE}} CC</div>
        </td>
          <td style="width: 15%; ">
          <div >@{{ x.COLOR }}</div>
        </td>    
          <td style="width: 15%; ">
          <div >@{{ x.TAHUN }}</div>
        </td>
       
         <td style="width: 15%; ">
          <div >@{{  x.NOMESIN  }}</div>
        </td>
         <td style="width: 15%; ">
          <div >@{{  x.NORANGKA }}</div>
        </td>
          <td style="width: 15%; ">
          <div >@{{  x.QTY }}</div>
        </td>
       <td>

       <button ng-click="form()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > 
              <i class="  glyphicon glyphicon-floppy-saved"></i> Detail
          </button>
       
        </td>
      </tr>
     
    </tbody>
  </table>
  

</div>

@endsection