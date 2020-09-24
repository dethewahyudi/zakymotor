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
  /*padding: 8px;*/
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<title>Report Pembelian</title>
</head>
<body>
<h2 align="center">Report Penjualan Zaky Motor</h2>
<table id="customers" align="center">
  <tr>
    <th>NO</th>
    <th>NIK</th>
    <th>NAMA</th>
    <th>TANGGAL</th>
    <th>MODEL</th>
    <th>NO MESIN</th>
    <th>NO POLISI</th>
    <th>BAYAR</th>
    <th>HARGA</th>
    <th>KURANG</th>
    <th>ANGSURAN</th>
    <th>MODEL</th>
    <th>BUNGA</th>
    <th>TENOR</th>
  </tr>


<?php $no=0; ?>
@foreach ($stream as $str)
<tr>
  <td>{{ $no+=1 }}</td>
    <td>{{ $str->KNIK }}</td>
    <td>{{ $str->KNAMA }}</td>
    <td>{{ $str->MBUKTI_TGL }}</td>
    <td>{{ $str->PNAMA }}</td>
    <td>{{ $str->PNOMESIN }}</td>
    <td>{{ $str->PNOPOLISI }}</td>
    <td>{{ $str->TJUMLAH }}</td>
    <td>{{ $str->PPRICE }}</td>
    <td>{{ $str->KURANG }}</td>
    <td>0</td>
    <td>0</td>
    <td>0</td>
    <td>{{ $str->TTENOR }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>