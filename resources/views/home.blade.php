@extends('index')
@section('title', 'Welcome To Home')
@section('atas', 'HALAMAN UTAMA')
@section('home', 'active')
@section('content')



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>

    

 <style type="text/css">

     #pdff{
        width: 45%;
        background-color: #53a658;
        border-radius: 200px 0px 0px 200px;
-moz-border-radius: 200px 0px 0px 200px;
-webkit-border-radius: 200px 0px 0px 200px;
border: 0px solid #000000;
     }

     #excell{
         width: 45%;
         background-color: #0f8bf4;
        border-radius: 0px 200px 200px 0px;
-moz-border-radius: 0px 200px 200px 0px;
-webkit-border-radius: 0px 200px 200px 0px;
border: 0px solid #000000;
     }



 </style>
<div class="container" id="app"> 
       <div class='col-md-3'>
            <div class="form-group">
                <div>Pilih Laporan</div>

                <div v-html="pilih"></div>

            </div>
        </div>

       <div class='col-md-2'>
            <div class="form-group">
                <div>Tanggal Awal</div>

                <div class='input-group date' id='startDate'>
                    <input type='text' class="form-control" name="startDate" id="tgl1"/>
                 
                </div>
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group">
                <div>Tanggal Akhir</div>

                <div class='input-group date' id='endDate'>
                    <input type='text' class="form-control" name="org_endDate" id="tgl2"/>
                 
                </div>
            </div>
        </div>

        <div class='col-md-3'>
            <div class="form-group">
                <div style="visibility: hidden;">Tanggal Akhir</div>

                <div class='input-group date' id='endDate'>
                    <button class="btn btn-primary" id="pdff" @click="pdfgrafik()"> 
                        Cetak PDF
                    </a>
                </button>
                   <button class="btn btn-primary" id="excell" @click="tampil()"> Lihat Statistik</button>
                  
                </div>
            </div>
        </div>



</div>

<div style="width: 95%;" id="reportPage">
<canvas id="grafikBatang"></canvas>
</div>

<script>
     var ListData = [];
     var users = [];
     var dataa=[];

    var vm = new Vue({
      el: "#app",
      data:{
        pilih:'<select class="form-control" id="nik"><option value="x">Laporan Penjualan</option><option value="bpb">Laporan Pembelian</option></select>',
      },
      methods:{
        tampil(){
            var a=document.getElementById("nik").value;
            var tgl1=document.getElementById("tgl1").value;
            var tgl2=document.getElementById("tgl2").value;
            var b='';
            var c='';
            var d='';

            if(a=='x'){
              b='Laporan Penjualan Periode '+tgl1+' s/d '+tgl2;
              c='Grafik Penjualan';
              d='LaporanPenjualanPeriode'+tgl1+'s/d'+tgl2;
            }else{
              b='Laporan Pembelian Periode '+tgl1+' s/d '+tgl2;
              c='Grafik Pembelian';
              d='LaporanPembelianPeriode'+tgl1+'s/d'+tgl2;
            }

           users=[]; 
           label=[];
           dataa=[];

           var ctx = document.getElementById("grafikBatang").getContext('2d');

    axios.get('/statistikbeli/'+a+'/'+tgl1+'/'+tgl2)  
      .then(respone => {
         
         users.push({"total":0,"tgl":""});
         respone.data.forEach(item => {
            users.push(item);
          }); 

          users.forEach(user=>{
         label.push(user.tgl);
         dataa.push(user.total);
          });


    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        // labels: ["","01-12-2019","02-12-2019","03-12-2019","04-12-2019","05-12-2019"],
            labels: label,
            datasets: [{
            label: c,

            // data: [0,5, 7,4,8,6],
            data: dataa,
            backgroundColor: 'transparent',
            borderColor:'red',
            borderWidth: 1,
            lineTension: 0,
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        title:{
          display:true,
          text: b
        }
    }
});
       
   });
        },
      pdfgrafik(){
               
       setTimeout(function(){ 

      // get size of report page
        var reportPageHeight = $('#reportPage').innerHeight();
        var reportPageWidth = $('#reportPage').innerWidth();
        
        // create a new canvas object that we will populate with all other canvas objects
        var pdfCanvas = $('<canvas />').attr({
          id: "canvaspdf",
          width: reportPageWidth,
          height: reportPageHeight
        });
        
        // keep track canvas position
        var pdfctx = $(pdfCanvas)[0].getContext('2d');
        var pdfctxX = 0;
        var pdfctxY = 0;
        var buffer = 100;
        
        // for each chart.js chart
        $("canvas").each(function(index) {
          // get the chart height/width
          var canvasHeight = $(this).innerHeight();
          var canvasWidth = $(this).innerWidth();
          
          // draw the chart into the new canvas
          pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
          pdfctxX += canvasWidth + buffer;
          
          // our report page is in a grid pattern so replicate that in the new canvas
          if (index % 2 === 1) {
            pdfctxX = 0;
            pdfctxY += canvasHeight + buffer;
          }
        });
        
        // create new pdf and add our new canvas as an image
        var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
        pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);
        
        // download the pdf
        pdf.save('ReportGrafik.pdf');

                }, 1000);
              }
      }
    })
</script>


<script type="text/javascript">
    var bindDateRangeValidation = function (f, s, e) {
    if(!(f instanceof jQuery)){
            console.log("Not passing a jQuery object");
    }
  
    var jqForm = f,
        startDateId = s,
        endDateId = e;
  
    var checkDateRange = function (startDate, endDate) {
        var isValid = (startDate != "" && endDate != "") ? startDate <= endDate : true;
        return isValid;
    }

    var bindValidator = function () {
        var bstpValidate = jqForm.data('bootstrapValidator');
        var validateFields = {
            startDate: {
                validators: {
                    notEmpty: { message: 'This field is required.' },
                    callback: {
                        message: 'Start Date must less than or equal to End Date.',
                        callback: function (startDate, validator, $field) {
                            return checkDateRange(startDate, $('#' + endDateId).val())
                        }
                    }
                }
            },
            endDate: {
                validators: {
                    notEmpty: { message: 'This field is required.' },
                    callback: {
                        message: 'End Date must greater than or equal to Start Date.',
                        callback: function (endDate, validator, $field) {
                            return checkDateRange($('#' + startDateId).val(), endDate);
                        }
                    }
                }
            },
            customize: {
                validators: {
                    customize: { message: 'customize.' }
                }
            }
        }
        if (!bstpValidate) {
            jqForm.bootstrapValidator({
                excluded: [':disabled'], 
            })
        }
      
        jqForm.bootstrapValidator('addField', startDateId, validateFields.startDate);
        jqForm.bootstrapValidator('addField', endDateId, validateFields.endDate);
      
    };

    var hookValidatorEvt = function () {
        var dateBlur = function (e, bundleDateId, action) {
            jqForm.bootstrapValidator('revalidateField', e.target.id);
        }

        $('#' + startDateId).on("dp.change dp.update blur", function (e) {
            $('#' + endDateId).data("DateTimePicker").setMinDate(e.date);
            dateBlur(e, endDateId);
        });

        $('#' + endDateId).on("dp.change dp.update blur", function (e) {
            $('#' + startDateId).data("DateTimePicker").setMaxDate(e.date);
            dateBlur(e, startDateId);
        });
    }

    bindValidator();
    hookValidatorEvt();
};



    var sd = new Date(), ed = new Date();
  
    $('#tgl1').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: sd, 
      maxDate: ed 
    });
  
    $('#tgl2').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: ed, 
      // minDate: sd 
      maxDate: ed 
    });

    //passing 1.jquery form object, 2.start date dom Id, 3.end date dom Id
    bindDateRangeValidation($("#form"), 'startDate', 'endDate');

</script>
	
@endsection