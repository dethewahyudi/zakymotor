<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Carbon;
use PDF;
use EXCEL;

class module extends Controller
{

public function awal(){

    $this->menu0 =array(
        "user"=>'',
        "status"=>'',
    );

    $this->menu1 =array(
                    "user"=>session()->get('user'),
                    "status"=>session()->get('status'),
                        );

   $this->home="home";
    $this->login="login";
    $this->session1=session()->get('status')=='admin';
    $this->session2=session()->get('status')=='user';
    $this->transaksipenjualan="transaksipenjualan";
    $this->transaksipembelian="transaksipembelian";
    $this->masterbarang="masterbarang";
    // $this->masterstok="masterstok";
    $this->masteruser="masteruser";
    $this->reportpenjualan="reportpenjualan";
    $this->reportpembelian="reportpembelian";
     $this->reporthutangpiutang="reporthutangpiutang";
    $this->transaksipembayaran="transaksipembayaran";
    
}


     public function login(){
        session()->flush();
        return view('login');
    }

    public function home(){
        $this->awal();
        if($this->session1){
           return view( $this->home,$this->menu1);
         }
        if($this->session2){
            return view( $this->home,$this->menu1);
        }else{
            session()->flush(); // menghapus semua variabel session
            return redirect(Route($this->login));
        }

    	
    }

  public function transaksipembayaran(){
        $this->awal();
        if($this->session1){
            return view( $this->transaksipembayaran,$this->menu1);
        }if($this->session2){
            return view( $this->transaksipembayaran,$this->menu1);
        }else{
            session()->flush(); // menghapus semua variabel session
            return redirect(Route($this->login));
        }


    }

     public function transaksipenjualan(){
        $this->awal();
        if($this->session1){
            return view( $this->transaksipenjualan,$this->menu1);
        }if($this->session2){
            return view( $this->transaksipenjualan,$this->menu1);
        }else{
            session()->flush(); // menghapus semua variabel session
            return redirect(Route($this->login));
        }


    }

     public function transaksipembelian(){
        $this->awal();
        if($this->session1){
            return view( $this->transaksipembelian,$this->menu1);
        }if($this->session2){
            return view( $this->transaksipembelian,$this->menu1);
        }else{
            session()->flush(); // menghapus semua variabel session
             return redirect(Route($this->login));
        }
    }

    //-------------------------------------------------------//

     public function reportpembelian(){

    	 $this->awal();
        if($this->session1){
            return view( $this->reportpembelian,$this->menu1);
        }if($this->session2){
            return view( $this->home,$this->menu1);
        }else{
            session()->flush(); // menghapus semua variabel session
            return redirect(Route($this->login));
        }

    }

 //     public function reportmaster(){

 //    	return view('reportmaster');
 //    }

 // public function reportuser(){

 //    	return view('reportuser');
 //    }

 public function reportpenjualan(){
      $this->awal();
        if($this->session1){
            return view( $this->reportpenjualan,$this->menu1);
        }if($this->session2){
            return view( $this->home,$this->menu1);
        }else{
            session()->flush(); // menghapus semua variabel session
            return redirect(Route($this->login));
        }
    }

    public function reporthutangpiutang(){
      $this->awal();
        if($this->session1){
            return view( $this->reporthutangpiutang,$this->menu1);
        }if($this->session2){
            return view( $this->home,$this->menu1);
        }else{
            session()->flush(); // menghapus semua variabel session
            return redirect(Route($this->login));
        }
    }

 //-------------------------------------------------------//

    public function masterbarang(){
         $this->awal();
        if($this->session1){
            return view( $this->masterbarang,$this->menu1);
        }if($this->session2){
            return view( $this->masterbarang,$this->menu1);
        }else{
            session()->flush(); // menghapus semua variabel session
            return redirect(Route($this->login));
        }
    }

    // public function masterstok(){
    //      $this->awal();
    //     if($this->session1){
    //         return view( $this->masterstok,$this->menu1);
    //     }else{
    //         session()->flush(); // menghapus semua variabel session
    //         return redirect(Route($this->login));
    //     }
    // }

 public function masteruser(){
     $this->awal();
        if($this->session1){
            return view( $this->masteruser,$this->menu1);
        }if($this->session2){
            return view( $this->masteruser,$this->menu1);
        }else{
            session()->flush(); // menghapus semua variabel session
             return redirect(Route($this->login));
        }
    }

public function prodmast(){
  //dd(url('/'));
    $data=DB::table('prodmast')->get();
	return $data;
}

public function tampiluser(){
  //dd(url('/'));
    $data=DB::table('login')->get();
  return $data;
}

public function prodmastjual(){
    $data=DB::table('prodmast as a')
     ->leftjoin('stmast as b','a.prdcd','=','b.prdcd')
    ->where('qty','>','0')->get();
  return $data;
}

public function mastertransaksibeli(){
    $data=DB::table('mstran as a')
    ->leftjoin('prodmast as b','a.prdcd','=','b.prdcd')
    ->where('a.rtype','bpb')->orderBy('a.bukti_tgl','desc')->get();
    return $data;
}

public function mastertransaksijual(){
    $data=DB::table('mstran as a')
          ->leftjoin('prodmast as b','a.prdcd','=','b.prdcd')
          ->where('a.rtype','x')->orderBy('bukti_tgl','desc')->get();
    return $data;
}

public function mastertransaksibayar(){
    $data=DB::table('konsumen as a')
          ->leftjoin('tenor as b','a.prdcd','=','b.prdcd')
          ->leftjoin('mtran as c','a.prdcd','=','c.prdcd')
          // ->where('b.bayar','kredit')
          //->where('a.recid','')
          ->select(DB::raw('FORMAT(IF(b.bayar="CASH","1",IF(SUM(c.price) IS NULL,0,SUM(c.price))/((((b.price-b.jumlah)*b.bunga/100)+(b.price-b.jumlah))/TENOR)),0) AS PAID,a.PRDCD,b.BAYAR,b.BUKTI_NO,a.NIK,a.NAMA,a.NOTELP,a.ALAMAT,b.TENOR,
            IF(b.bayar="CASH",b.price,CONCAT((((b.price-b.jumlah)*b.bunga/100)+(b.price-b.jumlah)))-IF(SUM(c.price) IS NULL,0,SUM(c.price))) AS TOTAL,((b.price-b.jumlah)*b.bunga/100)*b.tenor AS BUNGA,a.RECID'))
          ->groupby('a.prdcd','a.bukti_no')
          ->get();
       //   dd($data);
    return $data;
}

public function insertpembayaran(){

    $data=json_decode(file_get_contents("php://input"));


$bukti_no=$data->bukti_no;
$docnoenc=$data->docnoenc;
$prdcd=$data->prdcd;
$price=$data->price;

$nik=$data->nik;

$time=Carbon\Carbon::now();  

$data=array(
'IDUSER'=>session()->get('user'),
'BUKTI_NO'=>$bukti_no,
'DOCNOENC'=>$docnoenc,
'PRDCD'=>$prdcd,
'PRICE'=>$price,
'BUKTI_TGL'=>$time,
'JAM'=>$time,
'NIK'=>$nik,
           );

     DB::table('mtran')->insert($data);

    $data=DB::table('konsumen as a')
          ->leftjoin('tenor as b','a.prdcd','=','b.prdcd')
          ->leftjoin('mtran as c','a.prdcd','=','c.prdcd')
          ->where('a.recid','')
          ->where('c.prdcd',$prdcd)
          ->select(DB::raw('b.BAYAR,b.TENOR,FORMAT(IF(SUM(c.price) IS NULL,0,SUM(c.price))/((((b.price-b.jumlah)*b.bunga/100)+(b.price-b.jumlah))/TENOR),0) AS PAID'))
          ->groupby('a.prdcd','a.bukti_no')
          ->get();



          if($data[0]->TENOR==$data[0]->PAID || $data[0]->BAYAR=="CASH"){

            $dat=array('RECID'=>'1',);    
            DB::table('konsumen')->where('prdcd',$prdcd)->update($dat);
            
            // $dat=array('BAYAR'=>'LUNAS',);    
            // DB::table('tenor')->where('prdcd',$prdcd)->update($dat);
            return;
          }
    //return $data;
}


// SELECT * FROM konsumen;
// SELECT * FROM tenor;
// SELECT * FROM mstran;
// SELECT * FROM mtran;
// SELECT * FROM stmast;
// SELECT * FROM prodmast;
// INSERT IGNORE INTO mtran (NIK,BUKTI_NO,PRDCD) SELECT NIK,BUKTI_NO,PRDCD FROM konsumen;

// SELECT price,CONCAT(((price-jumlah)*bunga/100)*tenor+price) AS total,((price-jumlah)*bunga/100)*tenor AS bunga FROM tenor;

// SELECT COUNT(a.prdcd) AS PAID ,b.price,CONCAT((((b.price-b.jumlah)*b.bunga/100)*b.tenor)+(b.price-b.jumlah)) AS total,((b.price-b.jumlah)*b.bunga/100)*b.tenor AS bunga
// FROM konsumen  a LEFT JOIN tenor  b ON a.prdcd=b.prdcd LEFT JOIN mtran c ON a.prdcd=c.prdcd WHERE b.bayar='kredit' AND a.recid='' GROUP BY a.prdcd,a.bukti_no;
// SELECT * FROM konsumen  a LEFT JOIN mtran  b ON a.prdcd=b.prdcd WHERE a.prdcd='10000001';

// SELECT FROM konsumen  a LEFT JOIN tenor  b ON a.prdcd=b.prdcd LEFT JOIN mtran c ON a.prdcd=c.prdcd WHERE b.bayar='kredit' AND a.recid='' ;

 public function masterprodmastexport($id1){
     $data=DB::table('prodmast as a')
    ->leftjoin('stmast as b','a.prdcd','=','b.prdcd')
    ->where('b.qty','>','0')->get();

    if($id1=='pdf'){
     $pdf = PDF::loadview('streammastertoko',['stream'=>$data])
     ->setPaper([0, 0, 792.00, 1024.00],'landscape');
     return $pdf->stream('Report_Mastertoko_ZakyMotor.pdf');
    }else{

       $customer_array[]=array('NO','KONDISI','BRAND','JENIS','PRDCD','NAMA','SIZE','COLOR','ACOST','PRICE','NOMESIN','NORANGKA','NOPOLISI','TAHUN');

       $no=0;
      foreach($data as $row)
        {
          
         $customer_array[] = array($no+=1,$row->KONDISI,$row->BRAND,$row->JENIS,$row->PRDCD,$row->NAMA,$row->SIZE,$row->COLOR,$row->ACOST,$row->PRICE,$row->NOMESIN,$row->NORANGKA,$row->NOPOLISI,$row->TAHUN);
        }

         Excel::create('Report_Pembelian_ZakyMotor', function($excel) use ($customer_array) {
              $excel->setTitle('Report Master Toko Zaky Motor');
             $excel->sheet('Report Master', function($sheet) use ($customer_array)
              {
                $sheet->fromArray($customer_array, null, 'A1', false, false);
              });
         })->download('xls');

    }
    

  // return $data;
}

 public function masterprodmast(){
    $data=DB::table('prodmast as a')
    ->leftjoin('stmast as b','a.prdcd','=','b.prdcd')
    ->where('qty','>','0')
    ->select(DB::raw('BRAND,COUNT(brand) AS TOTAL'))->groupby('brand')->get();
  return $data;
}

public function masterprodmastdetail($id1){
    $data=DB::table('prodmast as a')
     ->leftjoin('stmast as b','a.prdcd','=','b.prdcd')
     ->where('qty','>','0')
    ->where('brand',$id1)
    ->select(DB::raw('BRAND,NAMA,COUNT(nama) AS TOTAL'))
    ->groupby('NAMA')->get();
    return $data;
}

public function masterprodmastdetail2($id1,$id2){
    $data=DB::table('prodmast as a')
    ->leftjoin('stmast as b','a.prdcd','=','b.prdcd')
     ->where('qty','>','0')
    ->where('brand',$id1)
    ->where('nama',$id2)->get();
    return $data;
}

public function logincek($id1,$id2){
    
          $data = DB::table('login')->where('username', $id1)->where('password', $id2)->get();
          if(!$data){
            return "[".json_encode(array("nama"=>"tidak","status"=>"tidak"))."]";
          }else{
          //    return $data;
           return "[".json_encode(array(
                      "nama"=>$data[0]->nama,
                      "status"=>$data[0]->status,
                      "url"=>url('/'),))
                     ."]";
          }

}

public function loginsession($id1,$id2){
        session()->put("user",$id1);
        session()->put("status",$id2);
         return redirect(Route('home'));
}

public function insertpenjualan(){
     $data=json_decode(file_get_contents("php://input"));
   
      $txt2=$data->param2;
      $txt3=$data->param3;
      $txt4=$data->param4;
      $txt5=$data->param5;
      $txt6=$data->param6;
      $txt7=$data->param7;
      $txt8=$data->param8;
      $txt9=$data->param9;
      $txt10=$data->param10;
      $txt11=$data->param11;
      $txt12=$data->param12;
      $txt13=$data->param13;
      $txt22=$data->param22;

      $data=array(
      'RECID'=>'',
      'BUKTI_NO'=>$txt2,
      'PRDCD'=>$txt3,
      'NIK'=>$txt4,
      'NAMA'=>$txt5,
      'NOTELP'=>$txt6,
      'ALAMAT'=>$txt7,
      'KOTA'=>$txt8,
           );

     DB::table('konsumen')->insert($data);

      $tenor=array('BAYAR'=>$txt12,
      'BUKTI_NO'=>$txt2,
      'PRDCD'=>$txt3,
       'NIK'=>$txt4,
       'JUMLAH'=>$txt9,
       'TENOR'=>$txt10,
       'PRICE'=>$txt11,
       'BUNGA'=>$txt13,

      );   
     DB::table('tenor')->insert($tenor);


       $time=Carbon\Carbon::now();    

      $mstran=array('IDUSER'=>session()->get('user'),
      'GUDANG'=>'',
      'RTYPE'=>'X',
      'BUKTI_NO'=>$txt2,
      'BUKTI_TGL'=>$time,
      'PRDCD'=>$txt3,
      'QTY'=>'1',
      'PRICE'=>$txt11,
      'GROSS'=>$txt11,
      'JAM'=>$time,
      );
    
     DB::table('mstran')->insert($mstran);

     if($txt12=="CASH"){
      $mtran=array(
     'IDUSER'=>session()->get('user'),
      'BUKTI_NO'=>$txt2,
      'DOCNOENC'=>$txt22,
      'PRDCD'=>$txt3,
      'PRICE'=>$txt11,
      'BUKTI_TGL'=>$time,
      'JAM'=>$time,
      'NIK'=>$txt4,    
      );  
     DB::table('mtran')->insert($mtran);
     }else{
     	$mtran=array(
     'IDUSER'=>session()->get('user'),
      'BUKTI_NO'=>$txt2,
      'DOCNOENC'=>$txt22,
      'PRDCD'=>$txt3,
      'PRICE'=>'0',
      'BUKTI_TGL'=>$time,
      'JAM'=>$time,
      'NIK'=>$txt4,    
      );  
     DB::table('mtran')->insert($mtran);
     }

    $data=DB::table('stmast')->where('prdcd',$txt3)->get();
    $stmast=array('RECID'=>'',
    'QTY'=>$data[0]->QTY - 1,);    
      DB::table('stmast')->where('prdcd',$txt3)->update($stmast);


       $data=DB::table('mstran')
       ->where('prdcd',$txt3)
       ->where('rtype','bpb')->get();

      $mstran=array('GUDANG'=>$data[0]->GUDANG,);    
      DB::table('mstran')->where('prdcd',$txt3)
      ->where('rtype','x')->update($mstran);

      
}

public function insertpembelian(){

       $data=json_decode(file_get_contents("php://input"));
   
$txt1=$data->param1;
$txt2=$data->param2;
$txt3=$data->param3;
$txt4=$data->param4;
$txt5=$data->param5;
$txt6=$data->param6;
$txt7=$data->param7;
$txt8=$data->param8;
$txt9=$data->param9;
$txt10=$data->param10;
$txt11=$data->param11;
$txt12=$data->param12;
$txt13=$data->param13;
$txt14=$data->param14;

$data=array('ACOST'=>'0',
            'BRAND'=>$txt2,
            'COLOR'=>$txt3,
            'JENIS'=>$txt4,
            'KONDISI'=>$txt5,
            'NAMA'=>$txt6,
            'NOMESIN'=>$txt7,
            'NORANGKA'=>$txt8,
            'PRICE'=>$txt9,
            'SIZE'=>$txt10,
            'TAHUN'=>$txt11,
            'RECID'=>'',
            'PRDCD'=>$txt12,
            'NOPOLISI'=>$txt1,);

DB::table('prodmast')->insert($data);

$stmast=array('RECID'=>'',
              'PRDCD'=>$txt12,
              'QTY'=>'1',);
    
DB::table('stmast')->insert($stmast);

$time=Carbon\Carbon::now();

$mstran=array('IDUSER'=>session()->get('user'),
              'GUDANG'=>$txt14,
              'RTYPE'=>'BPB',
              'BUKTI_NO'=>$txt13,
              'BUKTI_TGL'=>$time,
              'PRDCD'=>$txt12,
              'QTY'=>'1',
              'PRICE'=>$txt1,
              'GROSS'=>$txt9,
              'JAM'=>$time,
              );
    
DB::table('mstran')->insert($mstran);

}



public function prdcd(){
     $data = DB::table('prodmast')->orderby('prdcd','desc')->select(DB::raw('(prdcd+1) as prdcd'))->limit(1)->get();
    if(!$data){
      return "[".json_encode(array("prdcd"=>10000001))."]";
    }else{
       return $data;
    }
   
}

public function updatemaster(){
    $data=json_decode(file_get_contents("php://input"));
   
$txt1=$data->param1;
$txt2=$data->param2;
$txt3=$data->param3;
$txt4=$data->param4;
$txt5=$data->param5;
$txt6=$data->param6;
$txt7=$data->param7;
$txt8=$data->param8;
$txt9=$data->param9;
$txt10=$data->param10;
$txt11=$data->param11;
$txt12=$data->param12;
$txt13=$data->param13;
$txt14=$data->param14;



$data=array(
'NAMA'=>$txt1,
'BRAND'=>$txt2,
'JENIS'=>$txt3,
'SIZE'=>$txt4,
'TAHUN'=>$txt5,
'COLOR'=>$txt6,
'NORANGKA'=>$txt7,
'NOMESIN'=>$txt8,
'KONDISI'=>$txt9,
'PRICE'=>$txt10,
'ACOST'=>$txt11,
'NOPOLISI'=>$txt12,
'RECID'=>$txt14,
);

DB::table('prodmast')
        ->where('PRDCD',$txt13)
        ->update($data);

}


public function usertambah(){
   $data=json_decode(file_get_contents("php://input"));
   
$txt1=$data->param1;
$txt2=$data->param2;
$txt3=$data->param3;
$txt4=$data->param4;


$login=array('username'=>$txt1,
              'password'=>$txt2,
              'nama'=>$txt3,
            'status'=>$txt4);
    
DB::table('login')->insert($login);


}

public function useredit($id1,$id2,$id3){
  
   $data = array('password'=>$id2 );
DB::table('login')->where('username',$id1)->where('nama',$id3)->update($data);

}

public function masterbeli(){

$data=DB::table('konsumen as a')
     ->leftjoin('mstran as b','a.prdcd','=','b.prdcd')
     ->leftjoin('tenor as c','a.prdcd','=','c.prdcd')
     ->leftjoin('prodmast as d','a.prdcd','=','d.prdcd')
    ->where('b.rtype','=','x')->get();
  return $data;
}

public function masterbelireport(){

$data=DB::table('konsumen as a')
     ->leftjoin('mstran as b','a.prdcd','=','b.prdcd')
     ->leftjoin('tenor as c','a.prdcd','=','c.prdcd')
     ->leftjoin('prodmast as d','a.prdcd','=','d.prdcd')
    ->where('b.rtype','=','x')
    ->select(DB::raw("a.NIK KNIK,a.NAMA KNAMA,a.NOTELP KNOTELP,a.ALAMAT KALAMAT,a.KOTA KKOTA,b.IDUSER MIDUSER,b.GUDANG MGUDANG,b.BUKTI_NO MBUKTI_NO,b.BUKTI_TGL MBUKTI_TGL,b.PRDCD MPRDCD,b.GROSS MGROSS,c.BAYAR TBAYAR,c.JUMLAH TJUMLAH,c.TENOR TTENOR,c.PRICE TPRICE,d.PRDCD PPRDCD,d.BRAND PBRAND,d.NAMA PNAMA,d.KONDISI PKONDISI,d.JENIS PJENIS,d.SIZE PSIZE,d.COLOR PCOLOR,d.TAHUN PTAHUN,d.PRICE PPRICE,d.NOMESIN PNOMESIN,d.NORANGKA PNORANGKA,d.NOPOLISI PNOPOLISI"))
    ->get();
  return $data;
}

public function masterbelitgl($id1,$id2){

$data=DB::table('konsumen as a')
     ->leftjoin('mstran as b','a.prdcd','=','b.prdcd')
     ->leftjoin('tenor as c','a.prdcd','=','c.prdcd')
     ->leftjoin('prodmast as d','a.prdcd','=','d.prdcd')
    ->where('b.rtype','=','x')
    ->where('b.bukti_tgl','>=',$id1)
    ->where('b.bukti_tgl','<=',$id2)
    ->select(DB::raw("a.NIK KNIK,a.NAMA KNAMA,a.NOTELP KNOTELP,a.ALAMAT KALAMAT,a.KOTA KKOTA,b.IDUSER MIDUSER,b.GUDANG MGUDANG,b.BUKTI_NO MBUKTI_NO,b.BUKTI_TGL MBUKTI_TGL,b.PRDCD MPRDCD,b.GROSS MGROSS,c.BAYAR TBAYAR,c.JUMLAH TJUMLAH,c.TENOR TTENOR,c.PRICE TPRICE,d.PRDCD PPRDCD,d.BRAND PBRAND,d.NAMA PNAMA,d.KONDISI PKONDISI,d.JENIS PJENIS,d.SIZE PSIZE,d.COLOR PCOLOR,d.TAHUN PTAHUN,d.PRICE PPRICE,d.NOMESIN PNOMESIN,d.NORANGKA PNORANGKA,d.NOPOLISI PNOPOLISI"))
    ->get();
  return $data;
}

public function masterbelistream(){

$data=DB::table('konsumen as a')
     ->leftjoin('mstran as b','a.prdcd','=','b.prdcd')
    ->where('b.rtype','=','x')->get();

    $pdf = PDF::loadview('streampembelian',['stream'=>$data]);
  return $pdf->stream('Report_Pembelian_ZakyMotor.pdf');
 
}

public function masterbeliexcel(){

$data=DB::table('konsumen as a')
     ->leftjoin('mstran as b','a.prdcd','=','b.prdcd')
    ->where('b.rtype','=','x')->get();

   $customer_array[]=array('NO','NIK','NAMA','NOTELP','ALAMAT');

   $no=0;
  foreach($data as $customer)
    {
      
     $customer_array[] = array($no+=1,$customer->NIK,$customer->NAMA,
                                $customer->NOTELP,$customer->ALAMAT);
    }

     Excel::create('Report_Pembelian_ZakyMotor', function($excel) use ($customer_array) {
          $excel->setTitle('Report Pembelian Zaky Motor');
         $excel->sheet('Report Beli', function($sheet) use ($customer_array)
          {
            $sheet->fromArray($customer_array, null, 'A1', false, false);
          });
     })->download('xls');
 
}



public function masterjualstream(){

$data=DB::table('konsumen as a')
     ->leftjoin('mstran as b','a.prdcd','=','b.prdcd')
     ->leftjoin('tenor as c','a.prdcd','=','c.prdcd')
     ->leftjoin('prodmast as d','a.prdcd','=','d.prdcd')
    ->where('b.rtype','=','x')
    ->select(DB::raw("a.NIK as KNIK,a.NAMA as KNAMA,a.NOTELP as KNOTELP,a.ALAMAT as KALAMAT,a.KOTA as KKOTA,b.IDUSER as MIDUSER,b.GUDANG as MGUDANG,b.BUKTI_NO as MBUKTI_NO,b.BUKTI_TGL as MBUKTI_TGL,b.PRDCD as MPRDCD,b.GROSS as MGROSS,c.BAYAR as TBAYAR,format(c.JUMLAH,0) as TJUMLAH,c.TENOR as TTENOR,c.PRICE as TPRICE,d.PRDCD as PPRDCD,d.BRAND as PBRAND,d.NAMA as PNAMA,d.KONDISI as PKONDISI,d.JENIS as PJENIS,d.SIZE as PSIZE,d.COLOR as PCOLOR,d.TAHUN as PTAHUN,format(d.PRICE,0) as PPRICE,d.NOMESIN as PNOMESIN,d.NORANGKA as PNORANGKA,d.NOPOLISI as PNOPOLISI,format((d.PRICE-c.JUMLAH),0) as KURANG"))
    ->get();

    $pdf = PDF::loadview('streampenjualanpdf',['stream'=>$data])
    ->setPaper([0, 0, 792.00, 1224.00],'landscape');;
  return $pdf->stream('Report_Penjualan_ZakyMotor.pdf');
  
    
 
}


public function masterjualexcel(){

$data=DB::table('konsumen as a')
     ->leftjoin('mstran as b','a.prdcd','=','b.prdcd')
     ->leftjoin('tenor as c','a.prdcd','=','c.prdcd')
     ->leftjoin('prodmast as d','a.prdcd','=','d.prdcd')
    ->where('b.rtype','=','x')
    ->select(DB::raw("a.NIK as KNIK,a.NAMA as KNAMA,a.NOTELP as KNOTELP,a.ALAMAT as KALAMAT,a.KOTA as KKOTA,b.IDUSER as MIDUSER,b.GUDANG as MGUDANG,b.BUKTI_NO as MBUKTI_NO,b.BUKTI_TGL as MBUKTI_TGL,b.PRDCD as MPRDCD,b.GROSS as MGROSS,c.BAYAR as TBAYAR,format(c.JUMLAH,0) as TJUMLAH,c.TENOR as TTENOR,c.PRICE as TPRICE,d.PRDCD as PPRDCD,d.BRAND as PBRAND,d.NAMA as PNAMA,d.KONDISI as PKONDISI,d.JENIS as PJENIS,d.SIZE as PSIZE,d.COLOR as PCOLOR,d.TAHUN as PTAHUN,format(d.PRICE,0) as PPRICE,d.NOMESIN as PNOMESIN,d.NORANGKA as PNORANGKA,d.NOPOLISI as PNOPOLISI,format((d.PRICE-c.JUMLAH),0) as KURANG"))
    ->get();

   $customer_array[]=array('NO','NIK','NAMA','TANGGAL','MODEL','NO MESIN','NO POLISI',
    'BAYAR','HARGA','ANGSURAN','MODEL','BUNGA','TENOR');

   $no=0;
   
  foreach($data as $customer)
    {
      
     $customer_array[] = array($no+=1,$customer->KNIK,$customer->KNAMA,
                                $customer->MBUKTI_TGL,$customer->PNAMA,$customer->PNOMESIN,$customer->PNOPOLISI,$customer->TJUMLAH,$customer->PPRICE,$customer->KURANG,'0','0',$customer->TTENOR);
    }

     Excel::create('Report_Penjualan_ZakyMotor', function($excel) use ($customer_array) {
          $excel->setTitle('Report Penjualan Zaky Motor');
         $excel->sheet('Report Jual', function($sheet) use ($customer_array)
          {
            $sheet->fromArray($customer_array, null, 'A1', false, false);
          });
     })->download('xls');
 
}

public function masterhutangreport(){
    $data=DB::table('konsumen as a')
          ->leftjoin('tenor as b','a.prdcd','=','b.prdcd')
          ->leftjoin('mtran as c','a.prdcd','=','c.prdcd')
          ->select(DB::raw('a.PRDCD,b.BAYAR,b.BUKTI_NO,a.NIK,a.NAMA,a.NOTELP,a.ALAMAT,b.TENOR,FORMAT(IF(SUM(c.price) IS NULL,0,SUM(c.price))/
((((b.price-b.jumlah)*b.bunga/100)+(b.price-b.jumlah))/b.TENOR),0) AS PAID,
            CONCAT((((b.price-b.jumlah)*b.bunga/100)*b.tenor)+(b.price-b.jumlah))-if(SUM(c.price) is NULL,0,SUM(c.price)) AS TOTAL,((b.price-b.jumlah)*b.bunga/100)*b.tenor AS BUNGA'))
          // ->select(DB::raw('FORMAT(IF(b.bayar="CASH","0",IF(SUM(c.price) IS NULL,0,SUM(c.price))/((((b.price-b.jumlah)*b.bunga/100)+(b.price-b.jumlah))/TENOR)),0) AS PAID,a.PRDCD,b.BAYAR,b.BUKTI_NO,a.NIK,a.NAMA,a.NOTELP,a.ALAMAT,b.TENOR,
          //   IF(b.bayar="CASH",b.price,CONCAT((((b.price-b.jumlah)*b.bunga/100)+(b.price-b.jumlah)))-IF(SUM(c.price) IS NULL,0,SUM(c.price))) AS TOTAL,((b.price-b.jumlah)*b.bunga/100)*b.tenor AS BUNGA'))

          ->groupby('a.prdcd','a.bukti_no')
          ->get();
        //  dd($data);
    return $data;
}

public function masterhutangreportdetail(){
    $data=DB::table('konsumen as a')
          ->leftjoin('tenor as b','a.prdcd','=','b.prdcd')
          ->leftjoin('mtran as c','a.prdcd','=','c.prdcd')
          ->where('b.bayar','kredit')
          ->get();
    return $data;
}

public function masterhutangstream($id1){
   $data=DB::table('konsumen as a')
          ->leftjoin('tenor as b','a.prdcd','=','b.prdcd')
          ->leftjoin('mtran as c','a.prdcd','=','c.prdcd')
          ->leftjoin('prodmast as d','a.prdcd','=','d.prdcd')
          ->leftjoin('mstran as e','a.prdcd','=','e.prdcd')
          ->where('b.bayar','kredit')
          ->where('rtype','x')
          ->where('a.prdcd',$id1)
          ->select(DB::raw('c.PRICE AS cprice,c.BUKTI_TGL AS cbukti_tgl,c.DOCNOENC as docnoenc,a.ALAMAT as alamat,b.BUKTI_NO as bukti_no,a.NAMA as anama,a.NIK as ktp,d.NAMA as dnama,d.SIZE as dsize,d.NORANGKA as norangka,d.NOMESIN as nomesin, b.TENOR as tenor,d.NOPOLISI as nopolisi, e.BUKTI_TGL as bukti_tgl,d.SIZE as cc'))
          ->get();

         // return $data;
    //  return view ('streamhutang',['stream'=>$data]);

       $pdf = PDF::loadview('streamhutang',['stream'=>$data])
    ->setPaper([0, 0, 792.00, 1224.00],'potrait');;
  return $pdf->stream('Report_Hutang_ZakyMotor.pdf');
}

public function masterpiutangstream($id1){
   $data=DB::table('konsumen as a')
          ->leftjoin('tenor as b','a.prdcd','=','b.prdcd')
          ->leftjoin('mtran as c','a.prdcd','=','c.prdcd')
          ->leftjoin('prodmast as d','a.prdcd','=','d.prdcd')
          ->leftjoin('mstran as e','a.prdcd','=','e.prdcd')
          // ->where('b.bayar','kredit')
          ->where('rtype','x')
          ->where('a.prdcd',$id1)
          ->select(DB::raw('b.bayar,b.bunga AS bbunga,b.price AS bprice,b.jumlah AS bjumlah,d.kondisi,c.PRICE AS cprice,c.BUKTI_TGL AS cbukti_tgl,c.DOCNOENC as docnoenc,a.ALAMAT as alamat,b.BUKTI_NO as bukti_no,a.NAMA as anama,a.NIK as ktp,d.NAMA as dnama,d.SIZE as dsize,d.NORANGKA as norangka,d.NOMESIN as nomesin, b.TENOR as tenor,d.NOPOLISI as nopolisi, e.BUKTI_TGL as bukti_tgl,d.SIZE as cc'))
          ->get();

       //   return $data;
    //  return view ('streamhutang',['stream'=>$data]);
          // dd($data);
       $pdf = PDF::loadview('streampiutang',['stream'=>$data])
    ->setPaper([0, 0, 792.00, 1224.00],'potrait');;
  return $pdf->stream('Report_Hutang_ZakyMotor.pdf');
}


// public function streambayar2(){
//       $data=DB::table('konsumen as a')
//           ->leftjoin('tenor as b','a.prdcd','=','b.prdcd')
//           ->leftjoin('mtran as c','a.prdcd','=','c.prdcd')
//           ->where('b.bayar','kredit')
//           ->where('a.recid',''.$x.'')
//           ->where('a.prdcd',$id1)
//           ->select(DB::raw('concat('.$id2.') as bayar,a.PRDCD,b.BAYAR,b.BUKTI_NO,a.NIK,a.NAMA,a.NOTELP,a.ALAMAT,b.TENOR,COUNT(c.prdcd) AS PAID,
//             CONCAT(((b.price-b.jumlah)*b.bunga/100)+(b.price-b.jumlah))-if(SUM(c.price) is NULL,0,SUM(c.price)) AS TOTAL,((b.price-b.jumlah)*b.bunga/100)*b.tenor AS BUNGA'))
//           ->groupby('a.prdcd','a.bukti_no')
//           ->get();

//           $pdf = PDF::loadview('streambayar',['stream'=>$data])
//           ->setPaper([0, 0, 432.00, 524.00],'potrait');;
//         return $pdf->stream('Report_Hutang_ZakyMotor.pdf');
// }

public function streambayar($id1,$id2){
   
      $dat0=DB::table('konsumen')
          ->where('prdcd',$id1)
          ->get();

          $dat1=DB::table('prodmast')
          ->where('prdcd',$id1)
          ->get();

          $dat2=DB::table('tenor')
          ->where('prdcd',$id1)
          ->select(DB::raw("(((price-jumlah)*bunga/100)+(price-jumlah)) AS HUTANG,TENOR,(((price-jumlah)*bunga/100)+(price-jumlah))/TENOR AS CICILAN,BAYAR,JUMLAH,PRICE"))
          ->get();

           $dat4=DB::table('mtran')
          ->where('prdcd',$id1)
          // ->where('price','>','0')
          ->get();

          $dat5=DB::table('mstran')
          ->where('prdcd',$id1)
          ->where('rtype','x')
          ->get();

           $dat6=DB::table('tenor as a')
           ->leftjoin('mtran as b','a.prdcd','=','b.prdcd')
          ->where('a.prdcd',$id1)
          ->select(DB::raw('FORMAT(IF((b.price) IS NULL,0,(b.price))/((((a.price-a.jumlah)*a.bunga/100)+(a.price-a.jumlah))/TENOR),0) AS PAID'))
          ->get();

            $dat7=DB::table('mtran')
          ->where('prdcd',$id1)
           ->where('price','0')
          ->get();

  

      $data=array(
        'nik'=>$dat0[0]->NIK,
        'nama'=>$dat0[0]->NAMA,
        'alamat'=>$dat0[0]->ALAMAT,
        'notelp'=>$dat0[0]->NOTELP,
        'hutang'=>$dat2[0]->HUTANG,
        'tenor'=>$dat2[0]->TENOR,
        'dp'=>$dat2[0]->JUMLAH,
        'totalbayar'=>$dat2[0]->PRICE,
        'cicilan'=>$dat2[0]->CICILAN,
        'bayar'=>$dat2[0]->BAYAR,
        'nomesin'=>$dat1[0]->NOMESIN,
        'norangka'=>$dat1[0]->NORANGKA,
        'nopolisi'=>$dat1[0]->NOPOLISI,
        'kondisi'=>$dat1[0]->KONDISI,
        'motor'=>$dat1[0]->NAMA." ".$dat1[0]->SIZE." CC",
        'sales'=>$dat4,
        'due'=>$dat5[0]->BUKTI_TGL,
        'cabang'=>$dat5[0]->GUDANG,
        'paid'=>$dat6,
        "iduser"=>session()->get('user'),
        'sales2'=>$dat7,
      );

          //dd($data);

      if($id2=="KREDIT"){
          // $pdf = PDF::loadview('streamkredit',$data)
        $pdf = PDF::loadview('streamhutang',$data)
          ->setPaper([0, 0, 792.00, 1024.00],'landscape');;
        return $pdf->stream('Report_Hutang_ZakyMotor.pdf');
      }

      if($id2=="CASH"){
          $pdf = PDF::loadview('streamcash',$data)
          ->setPaper([0, 0, 792.00, 1024.00],'landscape');;
        return $pdf->stream('Report_Hutang_ZakyMotor.pdf');
      }
      if($id2=="report1"){
          $pdf = PDF::loadview('streamhutang',$data)
          ->setPaper([0, 0, 792.00, 1024.00],'landscape');;
        return $pdf->stream('Report_Hutang_ZakyMotor.pdf');
      }

        if($id2=="dp"){
          $pdf = PDF::loadview('streamdp',$data)
          ->setPaper([0, 0, 792.00, 1024.00],'landscape');;
        return $pdf->stream('Report_Hutang_ZakyMotor.pdf');
      }

       if($id2=="penjualan"){
          $pdf = PDF::loadview('streampenjualan',$data)
          ->setPaper([0, 0, 792.00, 1500.00],'landscape');;
        return $pdf->stream('Report_Hutang_ZakyMotor.pdf');
       // return view('streampenjualan',$data);
      }
      
          
}

public function statistikbeli($id1,$id2,$id3){
    $data=DB::table('mstran')
    ->where('rtype',$id1)
    ->where('bukti_tgl','>=',$id2)
    ->where('bukti_tgl','<=',$id3)
    ->select(DB::raw('SUM(QTY) as total,BUKTI_TGL as tgl'))
    ->groupby('rtype','bukti_tgl')->get();
    return $data;
}


}