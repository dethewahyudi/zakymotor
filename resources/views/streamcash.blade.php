
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

    
       <table border="" align="center">
<tr><td align="center" colspan="18" style=" border-bottom: double 1px solid #000 ;"></td>
</tr>

<tr><td align="center" colspan="18" style=" border-bottom: double 1px solid #000 ;"><b>KWITANSI PEMBAYARAN</b></td>
</tr>
      


         <tr>
          <td>Nik</td><td >:</td><td>{{ $nik}}</td><td>&nbsp;</td><td>&nbsp;</td>
           <td>No.Telp</td><td >:</td><td>{{$notelp}}</td><td>&nbsp;</td><td>&nbsp;</td>
          <td>Total Pokok Hutang</td><td >:</td><td>Rp {{ number_format($hutang,0,',',',') }}</td><td>&nbsp;</td><td>&nbsp;</td>
          <td>No.Polisi</td><td >:</td><td>{{$nopolisi}}</td><td>&nbsp;</td><td>&nbsp;</td>
          
         </tr>

         <tr>
          <td>Nama</td><td >:</td><td>{{ $nama}}</td><td>&nbsp;</td><td>&nbsp;</td>
         
          <td>No.Mesin</td><td >:</td><td>{{$nomesin}}</td><td>&nbsp;</td><td>&nbsp;</td>
           <td>Kendaraan</td><td >:</td><td>{{$motor}}</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>Kondisi</td><td >:</td><td>{{$kondisi}}</td><td>&nbsp;</td><td>&nbsp;</td>
         </tr>

         <tr>
           <td>Alamat</td><td >:</td><td>{{$alamat}}</td><td>&nbsp;</td><td>&nbsp;</td>
         
          <td>No.Rangka</td><td >:</td><td>{{$norangka}}</td><td>&nbsp;</td><td>&nbsp;</td>
          <td>Cabang</td><td >:</td><td>{{$cabang}}</td><td>&nbsp;</td><td>&nbsp;</td>
          
        </tr>
      
        </table>

      <table border="" align="center" >
        <thead style=" border-bottom: 1px solid #000 double;">
        <tr><td style="height: 20px;" colspan="5"></td></tr>
      </thead>
        <thead style=" border-bottom: 1px solid #000 double;">
        <tr align="center">
        <th >Kasir</th>
        <th >Tanggal Pembayaran</th>
         <th >Jenis Pembayaran</th>
          <th >Keterangan</th>
         <th  > Jumlah Yang Harus Di Bayar</th>
      </tr>
    </thead>
  

    <?php 
    $no=0;
    $i=1;
    $total=0;
    $over=0;
    $hari=0;
    $denda=0;
    $paid1=0;
    $paid2=0;


    ?>
   
        @foreach($sales as $x)
        <tr align="center" >
          <?php $no+=1; 
          $hari=\Carbon\Carbon::parse($due)->addMonth($no-$i)->diffInDays($x->BUKTI_TGL,false);
          $overa=($cicilan*0.001)*$hari;
          $paid1=$paid[$no-$i]->PAID;

          ?>

          <td >{{ $x->IDUSER }}</td>
          <td >{{\Carbon\Carbon::parse($x->BUKTI_TGL)->format('Y-m-d')}}</td>
         <td >{{ $bayar }}</td>
         <td >Pembayaran Melalui Leasing</td>
         <td >Rp. {{ number_format($x->PRICE,0,',',',') }}</td>
        </tr>
        <?php 
            $total+=$x->PRICE;
             $paid2+=$paid1;
         ?>
        @endforeach
       <thead style=" border-bottom: 1px solid #000 double;">
        <tr><td style="" colspan="9"></td></tr>
      </thead>

        <thead style="border-bottom:1px solid #000 double">
      
        <tr style="font-weight: bold;text-align: center;"><td colspan="3">Total</td><td></td>
         <td>Rp. {{ number_format($total,0,',',',') }}</td></tr>
         </thead>
         
        <tr><td style="height: 100px;" colspan="4"></td>
          <td style="height: 100px;text-align: center;vertical-align: bottom;" colspan="2" >{{ $x->IDUSER }}<BR>ttd</td></tr>
     
      </table>
</body>


</html>