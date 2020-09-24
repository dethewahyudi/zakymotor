
angular.module('app', ['datatables']).controller('zakymotor', ['$scope','$http','$sce','$timeout', function ($scope,$http,$sce,$timeout) {

  $scope.names = ["CASH", "KREDIT"];
  $scope.Tenor="0";
  $scope.hidden="hidden"
  $scope.dp="Jumlah";
  $scope.Bunga="0";

  $scope.bungakredit=function(){
    
  	var harga=angular.element('#Harga').val();
  	var harga=harga.toString().replace(/,/g,"");
  	var dp=$scope.Jumlah;
  	var dp=dp.toString().replace(/,/g,"");
  	var tenor=$scope.Tenor;
  	var kurang=parseInt(harga)-parseInt(dp);
  	// var harga=harga.toString().replace(/,/g,"");
  	// var dp=dp.toString().replace(/,/g,"");
  //	alert((kurang*$scope.Bunga/100)+(kurang/tenor));
  	$scope.kredit=((kurang*$scope.Bunga/100)+kurang)/tenor;
  	$scope.angsuran="Angsuran Bulanan ";
  }


  $scope.change=function(){
  	if($scope.Setor=="CASH"){
  		$scope.Jumlah='';
  		$scope.Jumlah=angular.element('#Harga').val();
  		$scope.Tenor="1";
  		$scope.Bunga="0";
  		$scope.hidden="hidden";
  		//$scope.hidden="visible";
  		$scope.dp="Jumlah";
  		return;
  	}
  	if($scope.Setor=="KREDIT"){
  		$scope.Jumlah="0";
  		$scope.Tenor="0";
  		$scope.hidden="visible"
  		$scope.dp="Dp";
  		$scope.Bunga="0";
  		return;
  	}
  }


 var timer = function() {

        if( $scope.tp<=0 ) {

            $scope.tp += 10;

            $timeout(timer,1);

        }

    }

    $scope.modal = function() {

                $scope.tp= -237;

                $scope.display = "d-block";

                $timeout(timer, -100);

    }

    $scope.modalun = function() {
                $scope.display = "";
    }

    $scope.usertambah=function(){

	    	var txt1=$scope.User;
			var txt2=$scope.Pass;
			var txt3=$scope.Nama;
			var txt4=document.getElementById("nik").value;;

			
			$http.post('/usertambah', {param1 : txt1, param2 : txt2, param3 : txt3,param4 : txt4 })
				.then(function(){
				console.log("berhasil insert");
				$scope.tampiluser();
					$scope.modal();

			$scope.User="";
			$scope.Pass="";
			$scope.Nama="";

			setTimeout(function(){ 
				window.location.href = "/masteruser"
			    }, 1000);
	
			});		
			
		}

		 $scope.useredit=function(){

	    	var txt1=$scope.Useredit;
			var txt2=$scope.Passedit;
			var txt3=$scope.Namaedit;

			
			$http.get('/useredit/'+txt1+'/'+txt2+'/'+txt3)
				.then(function(){
				console.log("berhasil insert");
				$scope.tampiluser();
					$scope.modal();

			$scope.User="";
			$scope.Pass="";
			$scope.Nama="";

			setTimeout(function(){ 
				window.location.href = "/masteruser"
			    }, 1000);
	
			});		
			
		}


	$scope.awal=function(){

		$scope.submit="Login"
		}

		$scope.login=function(){
		

		$scope.loading="spinner"
		 var txt1=$scope.txt1;
		 var txt2=$scope.txt2;
		 

		 if(txt1==""){
		 	console.log('data null'); 	
		 	$scope.loading=""
		 	return;
		 }

		 if(txt2==""){
		 	console.log('data null');
		 	$scope.loading=""
		 	return;
		 }
		
		$scope.submit="Please Wait..!!!"

			$http.get("/logincek/"+txt1+"/"+txt2)
			.then(function(data){
				var hasil=data.data;
				if(hasil[0].nama=="tidak"){
					var a="Username / Password Salah!!";
					$scope.kode=$sce.trustAsHtml("<p style='color:red'><i class='glyphicon glyphicon-remove'></i> "+a+" </p>");
					$scope.loading="";
					$scope.submit="Login";
					return;					
				 }
				else{
			//		window.location.href = hasil[0].url+"/loginsession/"+hasil[0].nama+"/"+hasil[0].status;					
				window.location.href = "/loginsession/"+hasil[0].nama+"/"+hasil[0].status;					
				 	return;
				}
			});	
		}


$scope.tampiluser=function(){
	$("#user-table").hide();
		$http.get('/tampiluser')
			.then(function(data){
				$scope.xx=data.data;
				setTimeout(function(){ 
					$.noConflict();

			      $('#user-table').DataTable({});
			      $("#user-table").show();
			    }, 0);
			});	
		}


	$scope.tampil=function(){
		$http.get('/prodmast')
			.then(function(data){
				$scope.xx=data.data;
			});	
		}



		$scope.tampil2=function(){

			$("#user-table2").DataTable().destroy();

			$("#user-table2").hide();
		 
		$http.get('/prodmastjual')
			.then(function(data){
				$scope.yy=data.data;

				setTimeout(function(){ 
					// $.noConflict();

			      $('#user-table2').DataTable({});
			      $("#user-table2").show();
			    }, 0);
			});	
		}

		$scope.tampilmaster=function(){
			$("#user-table").hide();
		$http.get('/masterprodmast')
			.then(function(data){
				$scope.xx=data.data;
				setTimeout(function(){ 
					$.noConflict();

			      $('#user-table').DataTable({});
			      $("#user-table").show();
			    }, 0);
			});	
		}


		$scope.tampilmasterbeli=function(){
			$("#user-table").hide();
		$http.get('/masterbeli')
			.then(function(data){

				$scope.xx=data.data;

				setTimeout(function(){ 
					$.noConflict();

			      $('#user-table').DataTable({});
			      $("#user-table").show();
			    }, 0);
			});	
		}

		$scope.tampilmasterreport=function(){

		$http.get('/masterbelireport')
			.then(function(data){
				$scope.xx=data.data;
				jQuery("#user-table").hide();

				setTimeout(function(){ 
					 // jQuery.noConflict();

			      jQuery('#user-table').DataTable();
			      jQuery("#user-table").hide();
			    }, 0);

			});	
		}

		var i=0;
		$scope.tampilmasterbelitgl=function(){
			var tgl1=angular.element('#tgl1').val();
			var tgl2=angular.element('#tgl2').val();
			
			jQuery("#user-table").hide();
			
		$http.get('/masterbelitgl/'+tgl1+'/'+tgl2)
			.then(function(data){
				$scope.xx=data.data;

				setTimeout(function(){ 
				//	$.noConflict();

			      jQuery('#user-table').DataTable();
			      jQuery("#user-table").show();
			      
			    }, 100);
			});	
		}

		$scope.tampilmasterdetail=function(BRAND){
			$("#user-table2").DataTable().destroy();
			$("#user-table2").hide();
		$http.get('/masterprodmastdetail/'+BRAND)
			.then(function(data){
				$scope.yy=data.data;
				setTimeout(function(){ 
					// $.noConflict();

			      $('#user-table2').DataTable({});
			      $("#user-table2").show();
			    }, 0);
			});	

		}

		$scope.mastertransaksibeli=function(){


			$("#user-table").hide()	;

		$http.get('/mastertransaksibeli')
			.then(function(data){
				$scope.xx=data.data;
			
				setTimeout(function(){ 
					$.noConflict();

			      $('#user-table').DataTable({});
			      $("#user-table").show();
			    }, 0);

			});	
		}

		$scope.mastertransaksijual=function(){
			$("#user-table").hide()	;

		$http.get('/mastertransaksijual')
			.then(function(data){
				$scope.xx=data.data;
				setTimeout(function(){ 
					$.noConflict();

			      $('#user-table').DataTable({});
			      $("#user-table").show();
			    }, 0);
			});	
		}

		$scope.mastertransaksibayar=function(){
			jQuery("#user-table").hide()	;
		$http.get('/mastertransaksibayar')
			.then(function(data){
				$scope.xx=data.data;
				setTimeout(function(){ 
					$.noConflict();

			      jQuery('#user-table').DataTable({});
			      jQuery("#user-table").show();
			    }, 0);	
			});	
		}

		$scope.hitung=function(){
			var cicilan=angular.element('#Cicilan').val();
			var cicilan=cicilan.toString().replace(/,/g,"");

			 $scope.Nominal=(cicilan*$scope.Jumlah);
			// document.getElementById('Nominal').value = (cicilan*$scope.Jumlah);


		}

		// $scope.mastertransaksibayardetail=function(){
		// $http.get('/mastertransaksibayardetail')
		// 	.then(function(data){
		// 		$scope.xx=data.data;
		// 	});	
		// }

		$scope.tampilmasterdetail2=function(BRAND,NAMA){
			$("#user-table3").DataTable().destroy();
			$("#user-table3").hide();

		$http.get('/masterprodmastdetail2/'+BRAND+'/'+NAMA)
			.then(function(data){
				$scope.zz=data.data;

				setTimeout(function(){ 
					// $.noConflict();

			      $('#user-table3').DataTable({});
			      $("#user-table3").show();
			    }, 0);
			});	

		}

		$scope.validuser=function(USER,PASS,NAMA){
			$scope.Useredit=USER;
			$scope.Passedit=PASS;
			$scope.Namaedit=NAMA;
		}

		$scope.validmasterbarang=function(PRDCD,NAMA,BRAND,JENIS,SIZE,TAHUN,WARNA,NORANGKA,NOMESIN,KONDISI,PRICE,ACOST,NOPOLISI){

			document.getElementById('Nama').value = '';
			document.getElementById('Brand').value = '';
			document.getElementById('Jenis').value = '';
			document.getElementById('Cc').value = '';
			document.getElementById('Tahun').value = '';
			document.getElementById('Warna').value = '';
			document.getElementById('Norangka').value = '';
			document.getElementById('Nomesin').value = '';
			document.getElementById('Kondisi').value = '';
			document.getElementById('HargaJual').value = '';
			document.getElementById('HargaBeli').value = '';
			document.getElementById('NoPolisi').value = '';
			document.getElementById('Prdcd').value = '';


			document.getElementById('Nama').value = NAMA;
			document.getElementById('Brand').value = BRAND;
			document.getElementById('Jenis').value = JENIS;
			document.getElementById('Cc').value = SIZE;
			document.getElementById('Tahun').value = TAHUN;
			document.getElementById('Warna').value = WARNA;
			document.getElementById('Norangka').value = NORANGKA;
			document.getElementById('Nomesin').value = NOMESIN;
			document.getElementById('Kondisi').value = KONDISI;
			document.getElementById('HargaJual').value = PRICE;
			document.getElementById('HargaBeli').value = ACOST;
			document.getElementById('NoPolisi').value = NOPOLISI;
			document.getElementById('Prdcd').value = PRDCD;

			
		}



		$scope.validmasterbayar=function(Tagihanke,BuktiNo,Nik,Nama,Notelp,Alamat,Tenor,Total,Cicilan,Prdcd,Bayar
){
			
			
				document.getElementById('Tagihanke').value = '';
				document.getElementById('Bukti_No').value = '';
				document.getElementById('Nik').value = '';
				document.getElementById('Nama').value = '';
				document.getElementById('Notelp').value = '';
				document.getElementById('Alamat').value = '';
				document.getElementById('Tenor').value = '';
				document.getElementById('Total').value = '';
				document.getElementById('Cicilan').value = '';
				document.getElementById('Nominal').value = '';
				document.getElementById('Prdcd').value = '';
				document.getElementById('Bayar').value = '';

				document.getElementById('Tagihanke').value = parseInt(Tagihanke)+1;
				document.getElementById('Bukti_No').value = BuktiNo;
				document.getElementById('Nik').value = Nik;
				document.getElementById('Nama').value = Nama;
				document.getElementById('Notelp').value = Notelp;
				document.getElementById('Alamat').value = Alamat;
				document.getElementById('Tenor').value = Tenor;
				document.getElementById('Total').value = Total;
				document.getElementById('Cicilan').value = Cicilan;
				document.getElementById('Prdcd').value = Prdcd;
				document.getElementById('Bayar').value = Bayar;


				var range=[];
				var a=parseInt(Tenor)-parseInt(Tagihanke);
				
				for(var i=1;i<=a;i+=1)
				{
					range.push(i);
				}
				$scope.range=range;

				document.getElementById('Nominal').value = Cicilan;
				$scope.Jumlah="1";

				if(Bayar=="CASH"){
			//	$scope.hidden = 'none';
			
				$scope.Jumlah="1";
				document.getElementById('Nominal').value = Total;

				return;
			}

			
			
		}

		$scope.insertpembayaran=function(){

			
			var txt2=angular.element('#Bukti_No').val();
		
			var txt4=angular.element('#Prdcd').val();
			var txt5=angular.element('#Nominal').val();
			var txt5=txt5.toString().replace(/,/g,"");
			
			var txt8=angular.element('#Nik').val();


			var a=new Date();
			var detik=a.getSeconds();
			var menit=a.getMinutes();
			var jam=a.getHours();


				var txt3=(jam*menit*detik)*txt4;

				$http.post('/insertpembayaran', { bukti_no : txt2, docnoenc : txt3, prdcd : txt4, price : txt5,  nik : txt8})
				.then(function(){
				console.log("berhasil insert");
					// alert("berhasil");
					// $scope.mastertransaksibayar();
					$scope.modal();
					setTimeout(function(){ 
					window.location.href = "/transaksbayar";
			    }, 1000);
				
	
			});


		}

		$scope.validreportbarang=function(KNIK,KNAMA,KNOTELP,KALAMAT,KKOTA,MIDUSER,MGUDANG,MBUKTI_NO,MBUKTI_TGL,MPRDCD,MGROSS,TBAYAR,TJUMLAH,TTENOR,TPRICE,PPRDCD,PBRAND,PNAMA,PKONDISI,PJENIS,PSIZE,PCOLOR,PTAHUN,PPRICE,PNOMESIN,PNORANGKA,PNOPOLISI
){

						$scope.KNIK= KNIK;
						$scope.KNAMA= KNAMA;
						$scope.KNOTELP= KNOTELP;
						$scope.KALAMAT= KALAMAT;
						$scope.KKOTA= KKOTA;
						$scope.MIDUSER= MIDUSER;
						$scope.MGUDANG= MGUDANG;
						$scope.MBUKTI_NO= MBUKTI_NO;
						$scope.MBUKTI_TGL= MBUKTI_TGL;
						$scope.MPRDCD= MPRDCD;
						$scope.MGROSS= MGROSS;
						$scope.TBAYAR= TBAYAR;
						$scope.TJUMLAH= TJUMLAH;
						$scope.TTENOR= TTENOR;
						$scope.TPRICE= TPRICE;
						$scope.PPRDCD= PPRDCD;
						$scope.PBRAND= PBRAND;
						$scope.PNAMA= PNAMA;
						$scope.PKONDISI= PKONDISI;
						$scope.PJENIS= PJENIS;
						$scope.PSIZE= PSIZE;
						$scope.PCOLOR= PCOLOR;
						$scope.PTAHUN= PTAHUN;
						$scope.PPRICE= PPRICE;
						$scope.PNOMESIN= PNOMESIN;
						$scope.PNORANGKA= PNORANGKA;
						$scope.PNOPOLISI= PNOPOLISI;


						if($scope.TBAYAR=="KREDIT"){
							$scope.NOMINAL="DP";
							return;
						}
						if($scope.TBAYAR=="CASH"){
							$scope.NOMINAL="CASH";
							return;
						}

		}


		$scope.validpenjualan1=function(NAMA,JENIS,SIZE,TAHUN,WARNA,NORANGKA,NOMESIN,KONDISI,PRICE,PRDCD,BRAND,NOPOLISI){

			document.getElementById('Nama').value = '';
			document.getElementById('Jenis').value = '';
			document.getElementById('Cc').value = '';
			document.getElementById('Tahun').value = '';
			document.getElementById('Warna').value = '';
			document.getElementById('Norangka').value = '';
			document.getElementById('Nomesin').value = '';
			document.getElementById('Kondisi').value = '';
			document.getElementById('Harga').value = '';
			document.getElementById('Prdcd').value = '';
			document.getElementById('Brand').value = '';
			document.getElementById('NoPolisi').value = '';

			document.getElementById('Nama').value = NAMA;
			document.getElementById('Jenis').value = JENIS;
			document.getElementById('Cc').value = SIZE;
			document.getElementById('Tahun').value = TAHUN;
			document.getElementById('Warna').value = WARNA;
			document.getElementById('Norangka').value = NORANGKA;
			document.getElementById('Nomesin').value = NOMESIN;
			document.getElementById('Kondisi').value = KONDISI;
			document.getElementById('Harga').value = PRICE;
			document.getElementById('Prdcd').value = PRDCD;
			document.getElementById('Brand').value = BRAND;
			document.getElementById('NoPolisi').value = NOPOLISI;

			
		}


		$scope.insertpenjualan=function(){

			var txt3=angular.element('#Prdcd').val();
			var txt4=$scope.Nik;
			var txt5=$scope.Namaa;
			var txt6=$scope.Handphone;
			var txt7=$scope.Alamat;
			var txt8=$scope.Kota;
			var txt9=angular.element('#Jumlah').val();
			var txt10=angular.element('#Tenor').val();
			var txt11=angular.element('#Harga').val();
			var txt12=$scope.Setor;
			var txt13=$scope.Bunga;

			var txt5=txt5.toUpperCase();
			var txt7=txt7.toUpperCase();
			var txt8=txt8.toUpperCase();

			var txt9=txt9.toString().replace(/,/g,"");
			var txt11=txt11.toString().replace(/,/g,"");


			var a=new Date();
			var detik=a.getSeconds();
			var menit=a.getMinutes();
			var jam=a.getHours();


				var txt2=(jam*menit*detik)*txt3;
				var txt22=(jam*menit*detik)*txt2;

				$http.post('/insertpenjualan', {param22 : txt22,param13 : txt13,param12 : txt12,param2 : txt2,param3 : txt3,param4 : txt4,param5 : txt5,param6 : txt6,param7 : txt7,param8 : txt8,param9 : txt9,param10 : txt10,param11 : txt11})
				.then(function(){
				console.log("berhasil insert");
					// alert("berhasil");
					// $scope.mastertransaksijual();
					$scope.modal();

					setTimeout(function(){ 
					window.location.href = "/transaksjual"
			    }, 1000);

				
	
			});
			

		}

		$scope.insertpembelian=function(){
			var txt1=$scope.NoPolisi;
			var txt2=$scope.Brand;
			var txt3=$scope.Color;
			var txt4=$scope.Jenis;
			var txt5=$scope.Kondisi;
			var txt6=$scope.Nama;
			var txt7=$scope.Nomesin;
			var txt8=$scope.Norangka;
			var txt9=$scope.Price;
			var txt10=$scope.Size;
			var txt11=$scope.Tahun;
			var txt14=$scope.Dealer;

			// var txt1=txt1.toString().replace(/,/g,"");
			var txt9=txt9.toString().replace(/,/g,"");

			var txt1=txt1.toUpperCase();
			var txt6=txt6.toUpperCase();
			var txt7=txt7.toUpperCase();
			var txt8=txt8.toUpperCase();


			var a=new Date();
			var detik=a.getSeconds();
			var menit=a.getMinutes();
			var jam=a.getHours();
	

			$http.get('/prdcd')
			.then(function(data){
				var hasil=data.data;
				var txt12=hasil[0].prdcd;

				var txt13=(jam*menit*detik)*txt12;
				
				$http.post('/insertpembelian', {param14 : txt14, param13 : txt13 ,param1 : txt1, param10 : txt10, param11 : txt11, param2 : txt2, param3 : txt3, param4 : txt4, param5 : txt5, param6 : txt6, param7 : txt7, param8 : txt8, param9 : txt9, param12 : txt12})
				.then(function(){
				console.log("berhasil insert");
					
					// $scope.mastertransaksibeli();
					$scope.modal();
					

					setTimeout(function(){ 
					window.location.href = "/transaksbeli"
			    }, 1000);

							});
			});	
		}

$scope.updatemaster=function(){

			var txt1=angular.element('#Nama').val();
			var txt2=angular.element('#Brand').val();
			var txt3=angular.element('#Jenis').val();
			var txt4=angular.element('#Cc').val();
			var txt5=angular.element('#Tahun').val();
			var txt6=angular.element('#Warna').val();
			var txt7=angular.element('#Norangka').val();
			var txt8=angular.element('#Nomesin').val();
			var txt9=angular.element('#Kondisi').val();
			var txt10=angular.element('#HargaJual').val();
			var txt11=angular.element('#HargaBeli').val();
			var txt12=angular.element('#NoPolisi').val();
			var txt13=angular.element('#Prdcd').val();
			var txt14='';


			var txt1=txt1.toUpperCase();
			var txt2=txt2.toUpperCase();
			var txt3=txt3.toUpperCase();
			var txt4=txt4.toUpperCase();
			var txt5=txt5.toUpperCase();
			var txt6=txt6.toUpperCase();
			var txt7=txt7.toUpperCase();
			var txt8=txt8.toUpperCase();
			var txt9=txt9.toUpperCase();
			var txt10=txt10.toString().replace(/,/g,"");
			var txt11=txt11.toString().replace(/,/g,"");
			var txt12=txt12.toUpperCase();


		$http.post('/updatemaster', {param14: txt14,param1 : txt1, param10 : txt10, param11 : txt11, param12 : txt12, param13 : txt13, param2 : txt2, param3 : txt3, param4 : txt4, param5 : txt5, param6 : txt6, param7 : txt7, param8 : txt8, param9 : txt9})
				.then(function(){
				console.log("berhasil Update");
				// $scope.tampilmaster();
				$scope.modal();

				setTimeout(function(){ 
					window.location.href = "/masterbarang";
			    }, 1000);
				
	
		});	
	
}

	$scope.masterhutangreport=function(){
		$("#user-table").hide();
		$http.get('/masterhutangreport')
			.then(function(data){
				$scope.xx=data.data;

				setTimeout(function(){ 
					$.noConflict();

			      $('#user-table').DataTable({});
			      $("#user-table").show();
			    }, 0);

			});	
		}

		$scope.validhutang=function(prdcd){
		window.location.href = "/streambayar/"+prdcd+"/report1";
		}

		$scope.validpiutang=function(prdcd){
		window.location.href = "/masterpiutangstream/"+prdcd;
		}

		$scope.validpenjualan=function(prdcd){
		window.location.href = "/streambayar/"+prdcd+"/penjualan";
		}

		$scope.validdp=function(prdcd){
		window.location.href = "/streambayar/"+prdcd+"/dp";
		}

		$scope.cetak=function(){
			var prdcd=angular.element('#Prdcd').val();
			var bayar=angular.element('#Bayar').val();
		    window.location.href = "/streambayar/"+prdcd+"/"+bayar;

		}


}]);




     
