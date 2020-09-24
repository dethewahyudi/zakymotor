
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
<title>Bukti Pembayaran</title>

</head>
<body >

    
       <table align="center" border="">
<tr><td align="center" colspan="20" style=" border-bottom: double 1px solid #000 ;"></td>
</tr>


<tr><td align="center" colspan="20" style=" border-bottom: double 1px solid #000 ;"><b>KWITANSI PEMBAYARAN</b></td>
</tr>

      


         <tr>
          <td>Nik</td><td >:</td><td>{{ $nik}}</td><td></td><td></td>
           <td style="width: 120px;">No.Telp</td><td >:&nbsp;</td><td>{{$notelp}}</td><td></td><td></td><td></td>

          <td>Total Pokok Hutang</td><td >:</td><td>Rp {{ number_format($hutang,0,',',',') }}</td>
       
          <td></td>
          <td colspan="2">No.Polisi</td><td >:&nbsp;{{$nopolisi}}</td>
          
         </tr>

         <tr>
          <td>Nama</td><td >:</td><td>{{ $nama}}</td><td></td><td></td>
         
          <td>No.Mesin</td><td >:&nbsp;</td><td>{{$nomesin}}</td><td></td><td></td><td></td>
           <td>Kendaraan</td><td >:</td><td>{{$motor}}</td><td></td>
          
             <td colspan="2">Jenis Pembayaran</td><td >:&nbsp;Credit</td>
        
         </tr>

         <tr>
           <td>Alamat</td><td >:</td><td>{{$alamat}}</td><td></td><td></td>
         
          <td>No.Rangka</td><td >:&nbsp;</td><td>{{$norangka}}</td><td></td><td></td><td></td>
          <td>Cabang</td><td >:</td><td>{{$cabang}}</td><td></td>

          <td colspan="2">Tenor</td><td>:&nbsp;{{$tenor}} Bulan</td>
        
          
        </tr>
    
  
        <thead style=" border-bottom: 1px solid #000 double;">
        <tr><td style="height: 20px;" colspan="11"></td></tr>
      </thead>
        <thead style=" border-bottom: 1px solid #000 double;">
        <tr align="center">
        <th colspan="2">Kasir</th>

 
        <th colspan="3">Tanggal Pembayaran</th>
        <th colspan="2">Harga Jual</th>
        <th colspan="3">DP Bayar</th>
        <th colspan="3">Sisa Pokok Hutang</th>
        <th colspan="2" style="width: 150px;">Total Pokok Hutang</th>
        <th colspan="">Bulan</th>
         <th colspan="4" style="width: 200px;">Jumlah Angsuran PerBulan</th>
 
      </tr>
    </thead>
  <tr align="center" >
     <td colspan="2">{{ $sales2[0]->IDUSER}}</td>
     <td colspan="3">{{\Carbon\Carbon::parse($sales2[0]->BUKTI_TGL)->format('Y-m-d')}}</td>
      <td colspan="2">Rp {{ number_format($totalbayar,0,',',',') }}</td>
          <td colspan="3">Rp {{ number_format($dp,0,',',',') }}</td>
          <td colspan="3">Rp {{ number_format($totalbayar-$dp,0,',',',') }}</td>
          <td colspan="2">Rp {{ number_format($hutang,0,',',',') }}</td>
          <td >Tenor</td><td >{{$tenor}}</td>
         <td colspan="4">Rp. {{ number_format($cicilan,0,',',',') }}</td>
  </tr>
    <thead style=" border-bottom: 1px solid #000 double;">
        <tr><td style="" colspan="11"></td></tr>
      </thead>

        <thead style="border-bottom:1px solid #000 double">
          <tr style="font-weight: bold;text-align: center;">
          <td colspan="5"></td>
         
   
       {{--    <td>{{ $over }}</td> --}}
        
      
        {{--  <td>{{ number_format($denda,0,',',',') }}</td> --}}
          <td></td>
          <td colspan="7"></td>
         
    
    {{--      <td >{{ $paid2 }}</td> --}}
          <td colspan="2"></td>
         {{--  <td colspan="">Rp. {{ number_format($total,0,',',',') }}</td> --}}
        </tr>
  
         </thead>
         <tr><td style="height: 100px;" colspan="17"></td>
          <td style="height: 100px;text-align: center;vertical-align: bottom;" colspan="3" >{{  $iduser }}<BR>ttd</td>
        </tr>

   

   
        
      </table>
</body>


</html>