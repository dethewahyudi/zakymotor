@extends('index')
@section('title', 'Report Pembelian')
@section('atas', 'REPORT PEMBELIAN')
@section('report', 'menu-open')
@section('rpembelian', 'active')
@section('content')

<div class="container" ng-init="tampilmasterbeli()"> 

{{--  <h2><B>Report Pembelian</B></h2> --}}
<br>
 <button class="btn btn-primary" > <a href="{{ route('excelbeli') }}" style="color: white;">Excel</a></button>
  <button class="btn btn-success" > <a href="{{ route('streambeli') }}" style="color: white;">Pdf</a></button>
  <br><br>
   <table id="user-table" class="hover" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>NIK</th>
        <th>NAMA</th>
        <th>NO TELP</th>
        <th>ALAMAT</th>
      </tr>
    </thead>
    <tbody>
      <tr dt-rows ng-repeat="x in xx" >
        <td style="width: 10%; ">
          <div >@{{ $index+1 }}</div>
        </td>
        
        <td style="width: 15%; ">
          <div >@{{ x.NIK }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.NAMA}}</div>
        </td>
         <td style="width: 15%; ">
          <div >@{{ x.NOTELP}}</div>
        </td>
         <td style="width: 15%; ">
          <div >@{{ x.ALAMAT}}</div>
        </td>
      </tr>    
    </tbody>
  </table>

<hr>
  
</div>

@endsection