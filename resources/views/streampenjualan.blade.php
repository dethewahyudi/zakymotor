
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


<tr><td align="center" colspan="18" style=" border-bottom: double 1px solid #000 ;"><b>REPORT DETAIL NASABAH</b></td>
</tr>
      


         
      
        </table>

      <table border="" align="center" >
        <thead style=" border-bottom: 1px solid #000 double;">
        <tr><td style="height: 20px;" colspan="22"></td></tr>
      </thead>
        <thead style=" border-bottom: 1px solid #000 double;">
        <tr align="center">
          <th>No</th>
          <th>Nik</th>
           <th>Nama</th>
           <th>Alamat</th>
           <th>No.Telp</th>
           
            <th>Kondisi</th>
            <th>Cabang</th>
            <th>Tenor</th>
            <th>Total Pokok Hutang</th>
        <th >Kasir</th>
        <th >Due Date</th>
        <th >Paid Date</th>
        <th >Over</th>
        <th >Denda</th>
        <th >Sisa Hutang</th>
        <th >Angsur Ke</th>
        <th >Sisa Angsur</th>
         <th >Jumlah Bulan</th>
         <th >Angsuran Bulan</th>
         <th  > Jumlah Bayar</th>
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

    <?php   $tenora=$tenor;?>
        @foreach($sales as $x)
         <?php $no+=1; 
          $hari=\Carbon\Carbon::parse($due)->addMonth($no-$i)->diffInDays($x->BUKTI_TGL,false);
          $overa=($cicilan*0.001)*$hari;
          $paid1=$paid[$no-$i]->PAID;
        

          ?>
        <tr align="center">
          <td>{{ $no }}</td>
          <td>{{ $nik}}</td>
          <td>{{ $nama}}</td>
            <td>{{$alamat}}</td>
           <td>{{$notelp}}</td>
          
           <td>{{$kondisi}}</td>          
          <td>{{$cabang}}</td>
          <td>{{$tenora}} Bulan</td>
       
         <td>Rp {{ number_format($hutang,0,',',',') }}</td>
          <td >{{ $x->IDUSER }}</td>
          <td >{{\Carbon\Carbon::parse($due)->addMonth($no-$i)->format('Y-m-d')}}</td>
          <td >{{\Carbon\Carbon::parse($x->BUKTI_TGL)->format('Y-m-d')}}</td>
          <?php if($hari<=0){?>
          <td >-</td><td >-</td>
          <?php }else{ 
            $over+=$hari;
            $denda+=$overa;    
             ?>
          <td>{{ \Carbon\Carbon::parse($due)->addMonth($no-$i)->diffInDays($x->BUKTI_TGL,false) }}</td>
           <td >{{ number_format($overa,0,',',',') }}</td>
          <?php } ?>
       
       <?php 
       $hutang-=$x->PRICE;

       if($hutang<="0"){?>
          <td>-</td>
          <?php }else{ ?>
          <td>Rp. {{ number_format($hutang,0,',',',') }}<?php } ?></td>

       {{--  <td >Rp. {{ number_format($hutang-=$x->PRICE,0,',',',') }}</td> --}}

       <?php if($x->PRICE=='0'){ ?>
       <td colspan="4"><B>Down Payment</B></td>
       <td>Rp. {{ number_format($dp,0,',',',') }}</td>
       <?php }else 
            if($bayar=='CASH'){ ?>
            <td colspan="4"><B>LUNAS CASH</B></td>
       <td>Rp. {{ number_format($dp,0,',',',') }}</td>
       <?php }else{ ?>
        <td >{{ $no-1 }}</td>
        <td >{{ $tenor-=$paid[$no-$i]->PAID }}</td>
         <td >{{ $paid[$no-$i]->PAID }}</td>
         <td >Rp. {{ number_format($cicilan,0,',',',') }}</td>
         <td >Rp. {{ number_format($x->PRICE,0,',',',') }}</td>
         <?php } ?>
        </tr>
        <?php 
            $total+=$x->PRICE;
             $paid2+=$paid1;
         ?>
        @endforeach
       <thead style=" border-bottom: 1px solid #000 double;">
        <tr><td style="" colspan="11"></td></tr>
      </thead>

        <thead style="border-bottom:1px solid #000 double">
      
        <tr style="font-weight: bold;text-align: center;">
          <td colspan="12">Total</td>
          {{-- <td>{{ $over }}</td> --}}
           <?php if($over=="0"){?>
          <td></td>
          <?php }else{ ?>
          <td>{{ $over }}<?php } ?></td>
          {{-- <td>Rp. {{ number_format($denda,0,',',',') }}</td> --}}
          <?php if($denda=="0"){?>
          <td></td>
          <?php }else{ ?>
         <td>{{ number_format($denda,0,',',',') }}<?php } ?></td>
          <td></td>
          <td colspan="2"></td>
          {{-- <td >{{ $paid2 }}</td> --}}
          <?php if($paid2=="0"){?>
          <td></td>
          <?php }else{ ?>
         <td>{{ $paid2 }}<?php } ?></td>
          <td></td>
          <td>Rp. {{ number_format($total,0,',',',') }}</td>
        </tr>
  
         </thead>
         <tr><td style="height: 100px;" colspan="19"></td>
          <td style="height: 100px;text-align: center;vertical-align: bottom;" colspan="2" >{{ $iduser }}<BR>ttd</td>
        </tr>
      </table>
</body>


</html>