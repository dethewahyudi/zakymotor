@extends('index')
@section('title', 'Report Penjualan')
@section('atas', 'REPORT PENJUALAN')
@section('report', 'menu-open')
@section('rpenjualan', 'active')
@section('content')


<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/>
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

{{-- 
 <h2><B>Report Penjualan</B></h2>
 --}}
<div class="container" ng-init="tampilmasterreport()"> 
<div class="container">
  <div class=''>
   <button class="btn btn-primary" > <a href="{{ route('exceljual') }}" style="color: white;">Excel</a></button>
  <button class="btn btn-success" > <a href="{{ route('streamjual') }}" style="color: white;">Pdf</a></button>
</div>
</div>

       <div class='col-md-3'>
            <div class="form-group">
                <div>Tanggal Awal</div>

                <div class='input-group date' id='startDate'>
                    <input type='text' class="form-control" name="startDate" id="tgl1"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group">
                <div>Tanggal Akhir</div>

                <div class='input-group date' id='endDate'>
                    <input type='text' class="form-control" name="org_endDate" id="tgl2"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
</div>
<div class="container">
	<div class='col-md-3'>
	<button type="submit" ng-click="tampilmasterbelitgl()" class="btn btn-primary"><div class="glyphicon glyphicon-signal"></div> Tampilkan</button>
</div>
</div>

    <table id="user-table" class="hover" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>NO.KONTRAK</th>
        <th>NIK</th>
        <th>NAMA</th>
        <th>TANGGAL JUAL</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr dt-rows ng-repeat="x in xx" >
        <td style="width: 10%; ">
          <div >@{{ $index+1 }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.MBUKTI_NO }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.KNIK }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.KNAMA}}</div>
        </td>
         
         <td style="width: 15%; ">
          <div >@{{ x.MBUKTI_TGL | date : 'dd-MMM-y'}}</div>
        </td>
        <td>
           {{-- <button ng-click="validreportbarang(x.KNIK,x.KNAMA,x.KNOTELP,x.KALAMAT,x.KKOTA,x.MIDUSER,x.MGUDANG,x.MBUKTI_NO,x.MBUKTI_TGL,x.MPRDCD,x.MGROSS,x.TBAYAR,x.TJUMLAH,x.TTENOR,x.TPRICE,x.PPRDCD,x.PBRAND,x.PNAMA,x.PKONDISI,x.PJENIS,x.PSIZE,x.PCOLOR,x.PTAHUN,x.PPRICE,x.PNOMESIN,x.PNORANGKA,x.PNOPOLISI)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal5" data-dismiss="modal" > 
              <i class="  glyphicon glyphicon-floppy-saved"></i> Detail
          </button> --}}
          <button ng-click="validpenjualan(x.PPRDCD)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal5" data-dismiss="modal" > 
              <i class="  glyphicon glyphicon-floppy-saved"></i> Detail
          </button>
        </td>
      </tr>    
    </tbody>
  </table>

<hr>
  
</div>


{{--  
<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel"><B>Detail Penjualan ZakyMotor NO.KONTRAK : @{{MBUKTI_NO}}</B></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <table>
<tr><td colspan="3"><H4><b>DATA KONSUMEN</b><H4></td></tr>
<tr><td>NIK</td><td>&nbsp;:&nbsp;</td><td>@{{KNIK}}</td></tr>
<tr><td>NAMA</td><td>&nbsp;:&nbsp;</td><td>@{{KNAMA}}</td></tr>
<tr><td>HANDPHONE</td><td>&nbsp;:&nbsp;</td><td>@{{KNOTELP}}</td></tr>
<tr><td>ALAMAT</td><td>&nbsp;:&nbsp;</td><td>@{{KALAMAT}}</td></tr>
<tr><td>KOTA</td><td>&nbsp;:&nbsp;</td><td>@{{KKOTA}}</td></tr>

<tr><td colspan="3" ><h4><b>DATA TRANSAKSI</b></h4></td></tr>
<tr><td>KASIR</td><td>&nbsp;:&nbsp;</td><td>@{{MIDUSER}}</td></tr>
<tr><td>DEALER</td><td>&nbsp;:&nbsp;</td><td>@{{MGUDANG}}</td></tr>
<tr><td>NO.KONTRAK</td><td>&nbsp;:&nbsp;</td><td>@{{MBUKTI_NO}}</td></tr>
<tr><td>TGL.JUAL</td><td>&nbsp;:&nbsp;</td><td>@{{MBUKTI_TGL | date : 'dd-MMM-y'}}</td></tr>
<tr><td>KODE</td><td>&nbsp;:&nbsp;</td><td>@{{MPRDCD}}</td></tr>
<tr><td>HARGA</td><td>&nbsp;:&nbsp;</td><td>@{{MGROSS}}</td></tr>
<tr><td>MET.PEMBYRN</td><td>&nbsp;:&nbsp;</td><td>@{{TBAYAR}}</td></tr>
<tr><td>CICILAN</td><td>&nbsp;:&nbsp;</td><td>@{{TTENOR}} Bulan</td></tr>
<tr><td>@{{ NOMINAL }}</td><td>&nbsp;:&nbsp;</td><td>@{{TJUMLAH | currency:"":000}}</td></tr>
<tr><td>HARGA</td><td>&nbsp;:&nbsp;</td><td>@{{TPRICE | currency:"":000}}</td></tr>

<tr><td colspan="3"><h4><b>DATA MOTOR</b></h4></td></tr>
<tr><td>KODE</td><td>&nbsp;:&nbsp;</td><td>@{{PPRDCD}}</td></tr>
<tr><td>BRAND</td><td>&nbsp;:&nbsp;</td><td>@{{PBRAND}}</td></tr>
<tr><td>NAMA</td><td>&nbsp;:&nbsp;</td><td>@{{PNAMA}}</td></tr>
<tr><td>KONDISI</td><td>&nbsp;:&nbsp;</td><td>@{{PKONDISI}}</td></tr>
<tr><td>JENIS</td><td>&nbsp;:&nbsp;</td><td>@{{PJENIS}}</td></tr>
<tr><td>CC</td><td>&nbsp;:&nbsp;</td><td>@{{PSIZE}}</td></tr>
<tr><td>WARNA</td><td>&nbsp;:&nbsp;</td><td>@{{PCOLOR}}</td></tr>
<tr><td>TAHUN</td><td>&nbsp;:&nbsp;</td><td>@{{PTAHUN}}</td></tr>
<tr><td>HARGA</td><td>&nbsp;:&nbsp;</td><td>@{{PPRICE | currency:"":000}}</td></tr>
<tr><td>NOMESIN</td><td>&nbsp;:&nbsp;</td><td>@{{PNOMESIN}}</td></tr>
<tr><td>NORANGKA</td><td>&nbsp;:&nbsp;</td><td>@{{PNORANGKA}}</td></tr>
<tr><td>NOPOLISI</td><td>&nbsp;:&nbsp;</td><td>@{{PNOPOLISI}}</td></tr>

</table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
      </div>
    </div>
  </div>
</div> --}}


<script type="text/javascript">


jQuery('#startDate').datetimepicker({
  format: 'YYYY-MM-DD',
  maxDate: moment().endOf('day'),
  defaultDate: moment(),

}).on("dp.change",function (e) {
  // jQuery('#endDate').data("DateTimePicker").minDate(e.date);
});

jQuery('#endDate').datetimepicker({
  format: 'YYYY-MM-DD',
  maxDate: moment().endOf('day'),
  defaultDate: moment(),
}).on("dp.change",function (e) {
   // jQuery('#startDate').data("DateTimePicker").maxDate(e.date);
});


</script>

@endsection