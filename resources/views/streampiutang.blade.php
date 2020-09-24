<!DOCTYPE html>
<html>
<head>
  
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;

}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<title>Report Piutang</title>
</head>
<body>

  <table border="0" align="center">
    <tr>
      <td>No.Kontrak</td><td>:</td><td>{{$stream[0]->bukti_no}}</td>  
      <td>Model</td><td>:</td><td>{{$stream[0]->dnama." ".$stream[0]->cc." CC"}}</td> 
      <td>Tenor</td><td>:</td><td>{{$stream[0]->tenor}}</td>

    </tr>
<tr>
  <td>Nama Nasabah</td><td>:</td><td>{{$stream[0]->anama}}</td>  
  <td>No.Rangka</td><td>:</td><td>{{$stream[0]->norangka}}</td> 
  <td>No.Polisi</td><td>:</td><td>{{$stream[0]->nopolisi}}</td></tr>
<tr>
  <td >Alamat KTP</td><td>:</td><td>{{$stream[0]->alamat}}</td>  
  <td>No.Mesin</td><td>:</td><td>{{$stream[0]->nomesin}}</td> 
  <td>Tgl.Transaksi</td><td>:</td><td>{{$stream[0]->bukti_tgl}}</td>
</tr>
 


  </table>
<h2 align="center">Report Piutang No.Kontrak {{ $stream[0]->bukti_no }}</h2>
<table id="customers" align="center">
  <tr>
    <th rowspan="2" style="text-align: center;">NO</th>
    <th colspan="2" width="200px" style="text-align: center;" >TANGGAL</th>
    <th rowspan="2" style="text-align: center;">HARI</th>
    <th rowspan="2" style="text-align: center;">NO STRUK</th>
    <th rowspan="2" style="text-align: center;">BAYAR</th>
    <th rowspan="2" style="text-align: center;">KET</th>
    <th colspan ="3" style="text-align: center;">PIUTANG</th>
    
  </tr>
  <tr>
    <th style="text-align: center;">DUE</th>
    <th style="text-align: center;">PAID</th> 
    <th  >OUT.POKOK</th>
    <th  >OUT.BUNGA</th>
    <th  >SISA</th>
  </tr>

<?php $no=0; 
$i=1;
$total=0;
$pokok=intval($stream[0]->bprice-$stream[0]->bjumlah);
$bunga=intval(($stream[0]->bprice-$stream[0]->bjumlah)*$stream[0]->bbunga/100)*$stream[0]->tenor;

$a=0;
$b=0;
?>
@foreach ($stream as $str)
<?php 
$total+=intval($str->cprice);


$pokok-=($str->cprice);
$bunga=$pokok*$stream[0]->bbunga/100;
//$bunga=intval(($stream[0]->bprice-$stream[0]->bjumlah)*$stream[0]->bbunga/100);
//+($stream[0]->bprice-$stream[0]->bjumlah))+$str->cprice)/$str->tenor);
$sisa=$pokok;

//$pokok1=$pokok-$bunga;


//$pokok=$pokok-$str->cprice;



 ?>
<tr>
  <td>{{ $no+=1 }}</td>
<td>
 {{\Carbon\Carbon::parse($stream[0]->bukti_tgl)->addMonth($no-$i)->format('Y-m-d') }}
</td>
<td>
  {{\Carbon\Carbon::parse($stream[$no-$i]->cbukti_tgl)->format('Y-m-d')}}
</td>
<td>
   {{\Carbon\Carbon::parse($stream[0]->bukti_tgl)->addMonth($no-$i)->diffInDays($stream[$no-$i]->cbukti_tgl) }}
</td>
     <td>{{ $str->docnoenc }}</td>
     <td>{{number_format($str->cprice,0,',',',')}}</td>   
<td>PAID</td>
<td>{{ number_format($sisa+$str->cprice,0,',',',') }}</td>
<td>{{ number_format($bunga,0,',',',') }}</td>
<?php if($str->bayar=='CASH'){ ?>
<td>{{ number_format('0',0,',',',') }}</td>
<?php }else{ ?>
<td>{{ number_format($sisa,0,',',',') }}</td>
<?php } ?>
  </tr>
  @endforeach

   <tr style="background-color: #f2f2f2"><td colspan="5" align="center" ><b>JUMLAH</b></td><td colspan="2"><b>Rp {{ number_format($total,0,',',',') }}</b></td>

   </tr>
</table>

</body>
</html>