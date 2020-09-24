
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
<tr><td align="center" colspan="19" style=" border-bottom: double 1px solid #000 ;"></td>
</tr>

<tr><td align="center" colspan="19" style=" border-bottom: double 1px solid #000 ;"><b>KWITANSI PEMBAYARAN</b></td>
</tr>
      


         <tr>
          <td>Nik</td><td >:</td><td>{{ $nik}}</td><td></td><td></td>
           <td>No.Telp</td><td >:</td><td>{{$notelp}}</td><td></td><td></td><td></td>
           <?php if($bayar=='CASH'){ ?>
           <td>Harga Jual Kendaraan</td><td >:</td><td>Rp. {{ number_format($dp,0,',',',') }}</td>
           <?php }else{ ?>
          <td>Total Pokok Hutang</td><td >:</td><td>Rp {{ number_format($hutang,0,',',',') }}</td>
          <?php } ?>
          <td></td>
          <td>No.Polisi</td><td >:&nbsp;{{$nopolisi}}</td>
          
         </tr>

         <tr>
          <td>Nama</td><td >:</td><td>{{ $nama}}</td><td></td><td></td>
         
          <td>No.Mesin</td><td >:</td><td>{{$nomesin}}</td><td></td><td></td><td></td>
           <td>Kendaraan</td><td >:</td><td>{{$motor}}</td><td></td>
            <?php if($bayar=='CASH'){ ?>
            <td>Kondisi</td><td >:&nbsp;{{$kondisi}}</td><td></td><td></td>
             <?php }else{ ?>
             <td>Jenis Pembayaran</td><td >:&nbsp;Credit</td>
              <?php } ?>
         </tr>

         <tr>
           <td>Alamat</td><td >:</td><td>{{$alamat}}</td><td></td><td></td>
         
          <td>No.Rangka</td><td >:</td><td>{{$norangka}}</td><td></td><td></td><td></td>
          <td>Cabang</td><td >:</td><td>{{$cabang}}</td><td></td>
          <?php if($bayar=='CASH'){ ?>
          <td>Jenis Pembayaran</td><td >:&nbsp;Cash</td>
          <?php }else{ ?>
          <td>Tenor</td><td >:&nbsp;{{$tenor}} Bulan</td>
          <?php } ?>
          
        </tr>
      
  
        <thead style=" border-bottom: 1px solid #000 double;">
        <tr><td style="height: 20px;" colspan="11"></td></tr>
      </thead>
        <thead style=" border-bottom: 1px solid #000 double;">
        <tr align="center">
        <th colspan="2">Kasir</th>
        <?php if($bayar=='CASH'){ ?>
        <th colspan="4" >Tanggal Pembayaran</th>
        <th colspan="5" >Jenis Pembayaran</th>
        <th colspan="7" >Keterangan</th>
        <th >Jumlah Yang Harus Di Bayar</th>
        <?php }else{ ?>
        <th colspan="2">Due Date</th>
        <th colspan="3">Paid Date</th>
        <th >Over</th>
        <th colspan="3">Denda</th>
        <th colspan="2">Sisa Hutang</th>
        <th colspan="">Angsur Ke</th>
        <th colspan="">Sisa Angsur</th>
         <th >Jumlah Bulan</th>
         <th colspan="2">Angsuran Bulan</th>
         <th  > Jumlah Bayar</th>
         <?php } ?>
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
       {{--  <?php if($x->PRICE=='0'){ ?>
        <?php }else{ ?> --}}
        
        <tr align="center" >
          <?php $no+=1; 
          $hari=\Carbon\Carbon::parse($due)->addMonth($no-$i)->diffInDays($x->BUKTI_TGL,false);
          $overa=($cicilan*0.001)*$hari;
          if($bayar=='CASH'){
          $paid1=$paid[$no-$i]->PAID;
          }else{
            $paid1=$paid[$no]->PAID;
          }
          ?>
          <td colspan="2">{{ $x->IDUSER }}</td>
          <?php if($bayar=='CASH'){ ?>
          <td colspan="4" >{{\Carbon\Carbon::parse($x->BUKTI_TGL)->format('Y-m-d')}}</td>
          <?php }else{ ?>
          <td colspan="2">{{\Carbon\Carbon::parse($due)->addMonth($no-$i)->format('Y-m-d')}}</td>
          <td colspan="3">{{\Carbon\Carbon::parse($x->BUKTI_TGL)->format('Y-m-d')}}</td>
          <?php } ?>
          
          <?php if($bayar=='CASH'){ ?>
          <td colspan="5" >Cash</td>
          <?php }else if($hari<=0){?>
          <td >-</td><td colspan="3">-</td>
          <?php }else{ 
            $over+=$hari;
            $denda+=$overa;    
             ?>
          <td  colspan="">{{ \Carbon\Carbon::parse($due)->addMonth($no-$i)->diffInDays($x->BUKTI_TGL,false) }}</td>
           <td  colspan="3">{{ number_format($overa,0,',',',') }}</td>
          <?php } ?>
       
       <?php 
       $hutang-=$x->PRICE;
       if($bayar=='CASH'){ ?>
       <?php }else if($hutang<="0"){?>
          <td colspan="2">-</td>
          <?php }else{ ?>
          <td colspan="2">Rp. {{ number_format($hutang,0,',',',') }}<?php } ?></td>
           <?php if($x->PRICE=='0'){ ?>
       <td colspan="4" ><B>Down Payment</B></td>
       <td>Rp. {{ number_format($dp,0,',',',') }}</td>
       <?php }else 
       if($bayar=='CASH'){ ?>
       <td colspan="7">Pembayaran Melalui Leasing</td>
       <td>Rp. {{ number_format($dp,0,',',',') }}</td>
       <?php }else{ ?>
       {{--  <td >Rp. {{ number_format($hutang-=$x->PRICE,0,',',',') }}</td> --}}
        <td >{{ $no }}</td>
        <td colspan="">{{ $tenor-=$paid[$no-$i]->PAID }}</td>
         <td >{{ $paid[$no]->PAID }}</td>
         <td colspan="2">Rp. {{ number_format($cicilan,0,',',',') }}</td>
         <td >Rp. {{ number_format($x->PRICE,0,',',',') }}</td>
         <?php } ?>
        </tr>
   {{--      <?php } ?> --}}
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
          <td colspan="7">Total</td>
          {{-- <td>{{ $over }}</td> --}}
           <?php if($over=="0"){?>
          <td></td>
          <?php }else{ ?>
          <td>{{ $over }}<?php } ?></td>
          {{-- <td>Rp. {{ number_format($denda,0,',',',') }}</td> --}}
          <?php if($denda=="0"){?>
          <td></td>
          <?php }else{ ?>
         <td colspan="3">{{ number_format($denda,0,',',',') }}<?php } ?></td>
          <td></td>
          <td colspan="3"></td>
          {{-- <td >{{ $paid2 }}</td> --}}
          <?php if($paid2=="0"){?>
          <td ></td>
          <?php } else{ ?>
         <td >{{ $paid2 }}<?php } ?></td>
          <td colspan="4"></td>
          <td colspan="">Rp. {{ number_format($total,0,',',',') }}</td>
        </tr>
  
         </thead>
         <tr><td style="height: 100px;" colspan="16"></td>
          <td style="height: 100px;text-align: center;vertical-align: bottom;" colspan="3" >{{ $x->IDUSER }}<BR>ttd</td></tr>
      </table>
</body>


</html>