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
<title>Report Master Toko</title>
</head>
<body>
<h2 align="center">Report Master Toko Zaky Motor</h2>
<table id="customers" align="center">
  <tr>
    <th>NO</th>
    <th>KONDISI</th>
<th>BRAND</th>
<th>JENIS</th>
<th>PRDCD</th>
<th>NAMA</th>
<th>SIZE</th>
<th>COLOR</th>
<th>ACOST</th>
<th>PRICE</th>
<th>NOMESIN</th>
<th>NORANGKA</th>
<th>NOPOLISI</th>
<th>TAHUN</th>

  </tr>


<?php $no=0; ?>
@foreach ($stream as $row)
<tr>
  <td>{{ $no+=1 }}</td>
    <td>{{ $row->KONDISI }}</td>
<td>{{ $row->BRAND}}</td>
<td>{{ $row->JENIS}}</td>
<td>{{ $row->PRDCD}}</td>
<td>{{ $row->NAMA}}</td>
<td>{{ $row->SIZE}}</td>
<td>{{ $row->COLOR}}</td>
<td>{{ $row->ACOST}}</td>
<td>{{ number_format($row->PRICE,0,',',',')}}</td>
<td>{{ $row->NOMESIN}}</td>
<td>{{ $row->NORANGKA}}</td>
<td>{{ $row->NOPOLISI}}</td>
<td>{{ $row->TAHUN}}</td>

  </tr>
  @endforeach
</table>

</body>
</html>