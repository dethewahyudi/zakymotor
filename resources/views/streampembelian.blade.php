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
<title>Report Pembelian</title>
</head>
<body>
<h2 align="center">Report Pembelian Zaky Motor</h2>
<table id="customers" align="center">
  <tr>
    <th>NO</th>
    <th>NIK</th>
    <th>NAMA</th>
    <th>NO TELP</th>
    <th>ALAMAT</th>
  </tr>


<?php $no=0; ?>
@foreach ($stream as $str)
<tr>
  <td>{{ $no+=1 }}</td>
    <td>{{ $str->NIK }}</td>
    <td>{{ $str->NAMA }}</td>
    <td>{{ $str->NOTELP }}</td>
    <td>{{ $str->ALAMAT }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>