@extends('index')
@section('title', 'Report Hutang/Piutang')
@section('atas', 'REPORT HUTANG/PIUTANG')
@section('report', 'menu-open')
@section('rhutang', 'active')
@section('content')

<div style="margin-top: 20px;" class="container" ng-init="masterhutangreport()"> 

 <table id="user-table" class="hover" cellspacing="0" width="100%" >
    <thead>
      <tr>
       <th>No</th>
        <th>STATUS</th>
        <th>NO KNTRK</th>
        <th>NIK</th>
        <th>NAMA</th>
        <th>TELP</th>
        <th>TENOR</th>
        <th >DIBAYAR</th>
         <th></th>  
         <th ></th>
         <th ></th>
         
      </tr>
    </thead>
    <tbody>
      <tr dt-rows ng-repeat="x in xx" >
        <td style="width: 10%; ">
          <div >@{{ $index+1 }}</div>
        </td>
        <td style="width: 15%; ">
          <div  >@{{ x.BAYAR }}</div>
         {{--  <div  ng-if="x.TENOR-x.PAID== null" >KREDIT</div> --}}
          {{-- <div  ng-if="x.TENOR-x.PAID!='null'" >LUNAS</div> --}}
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
         <td style="width: 15%; ">
          <div  ng-if="x.BAYAR== 'CASH'" >1</div>
          <div  ng-if="x.BAYAR== 'KREDIT'" >@{{ x.PAID }}</div>
         {{--  <div >@{{ x.PAID }}</div> --}}
        </td>
        <td>
        	 <button ng-click="validhutang(x.PRDCD,x.BAYAR)" type="button" class="btn btn-danger btn-sm" data-toggle="modal" >
              <i class="glyphicon glyphicon-floppy-saved"></i> Hutang
          </button>
</td>
<td>
          <button ng-click="validpiutang(x.PRDCD)" type="button" class="btn btn-info btn-sm" data-toggle="modal" >
              <i class="glyphicon glyphicon-floppy-saved"></i> Piutang
          </button>
          </td>
          <td>
           <button ng-if="x.BAYAR != 'CASH'" ng-click="validdp(x.PRDCD,x.BAYAR)" type="button" class="btn btn-success btn-sm" data-toggle="modal" > DP
          </button>
</td>
        
      </tr>
     
    </tbody>
  </table>
</div>



@endsection