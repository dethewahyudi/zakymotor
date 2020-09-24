@extends('index')
@section('title', 'Master barang')
@section('atas', 'MASTER BARANG')
@section('master', 'menu-open')
@section('stok', 'active')
@section('content')

<div class="container" ng-init="tampilmaster()"> 
  <br>
   <button class="btn btn-primary " > <a href="/masterprodmastexport/excel" style="color: white;">Excel</a></button>
  <button class="btn btn-success " > <a href="/masterprodmastexport/pdf" style="color: white;">Pdf</a></button>
  <br><br>

        <table id="user-table" class="hover" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>BRAND</th>
        <th>TOTAL</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr dt-rows ng-repeat="x in xx" >
        <td style="width: 10%; ">
          <div >@{{ $index+1 }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.BRAND }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ x.TOTAL}}</div>
        </td>
       <td>
       <button ng-click="tampilmasterdetail(x.BRAND)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > 
              <i class="  glyphicon glyphicon-floppy-saved"></i> Detil
          </button>      
        </td>
      </tr>    
    </tbody>
  </table>

<hr>
  
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel"><B>Master Stok</B></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <table id="user-table2" class="hover" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>BRAND</th>
        <th>NAMA</th>
        <th>TOTAL</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr dt-rows ng-repeat="y in yy" >
        <td style="width: 10%; ">
          <div >@{{ $index+1 }}</div>
        </td>
         <td style="width: 15%; ">
          <div >@{{ y.BRAND }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ y.NAMA }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ y.TOTAL}}</div>
        </td>
       <td>
       <button ng-click="tampilmasterdetail2(y.BRAND,y.NAMA)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4" data-dismiss="modal"> 
              <i class="  glyphicon glyphicon-floppy-saved"></i> Detil
          </button>     
        </td>
      </tr>
    </tbody>
  </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>  
      </div>
    </div>
  </div>
</div>

<div class="modal @{{display}} " id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="top: @{{tp}}px !important; ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Berhasil
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-primary" ng-click="modalun()" >OK</button>
      </div>
    </div>
  </div>
</div>


 <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel"><B>Master Stok</B></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <table id="user-table3" class="hover" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>BRAND</th>
        <th>NAMA</th>
        <th>WARNA</th>
        <th>NOMESIN</th>
        <th>NORANGKA</th>
        <th>NOPOLISI</th>
        <th>TAHUN</th>
       <th>KONDISI</th>
       <th>HARGA</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr dt-rows ng-repeat="z in zz" >
        <td style="width: 10%; ">
          <div >@{{ $index+1 }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ z.BRAND }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ z.NAMA}}</div>
        </td>
          <td style="width: 15%; ">
          <div >@{{ z.COLOR }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ z.NOMESIN }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ z.NORANGKA }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ z.NOPOLISI }}</div>
        </td>
        
          <td style="width: 15%; ">
          <div >@{{ z.TAHUN }}</div>
        </td>
        <td style="width: 15%; ">
          <div >@{{ z.KONDISI }}</div>
        </td>
         <td style="width: 15%; ">
          <div >@{{  z.PRICE | currency:"":000 }}</div>
        </td>

        
       <td>
       <button ng-click="validmasterbarang(z.PRDCD,z.NAMA,z.BRAND,z.JENIS,z.SIZE,z.TAHUN,z.COLOR,z.NORANGKA,z.NOMESIN,z.KONDISI,z.PRICE | currency:'':000,z.ACOST | currency:'':000,z.NOPOLISI
)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal5" data-dismiss="modal" > 
              <i class="  glyphicon glyphicon-floppy-saved"></i> Edit
          </button>
       
        </td>
      </tr>
     
    </tbody>
  </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
      </div>
    </div>
  </div>
</div> 


<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel"><B>Update Master Motor</B></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <table>
<input  style='background-color: white;display: none;'  class='form-control' id='Prdcd' ng-model='Prdcd'>
<tr><td>Nama Motor</td><td>:</td><td><input  style='background-color: white;text-transform:uppercase;'  class='form-control' id='Nama' ng-model='Nama' placeholder='Nama' ></td><td> 
</td><td>&nbsp;</td>
<td>Jenis Motor</td><td>:</td><td><input style='background-color: white;text-transform:uppercase;' class='form-control' id='Jenis' ng-model='Jenis' placeholder='Matic/Manual' ></td></tr>
<tr><td>Brand</td><td>:</td><td><input readonly style='background-color: white;text-transform:uppercase;'  class='form-control' id='Brand' ng-model='Brand' placeholder='Brand' ></td><td>&nbsp;</td><td>&nbsp;</td>
  <td>Cc</td><td>:</td><td><input style='background-color: white;text-transform:uppercase;'  class='form-control' id='Cc' ng-model='Size' placeholder='Cc' ></td></tr>
<tr><td>Tahun</td><td>:</td><td><input style='background-color: white;text-transform:uppercase;' class='form-control' id='Tahun' ng-model='Tahun' placeholder='Tahun' ></td><td>&nbsp;</td><td>&nbsp;</td><td>NoPolisi</td><td>:</td><td><input style='background-color: white;text-transform:uppercase;' class='form-control' id='NoPolisi' ng-model='NoPolisi' placeholder='NoPolisi' ></td></tr>
<tr><td>Warna</td><td>:</td><td><input style='background-color: white;text-transform:uppercase;'  class='form-control' id='Warna' ng-model='Color' placeholder='Warna' ></td><td>&nbsp;</td><td>&nbsp;</td>
<td>Norangka</td><td>:</td><td><input style='background-color: white;text-transform:uppercase;' class='form-control' id='Norangka' ng-model='Norangka' placeholder='Norangka' ></td></tr>
<tr><td>Nomesin</td><td>:</td><td><input style='background-color: white;text-transform:uppercase;' ng-value="aa"  class='form-control' id='Nomesin' ng-model='Nomesin' placeholder='Nomesin' ></td><td>&nbsp;</td><td>&nbsp;</td>
<td>Kondisi</td><td>:</td><td><input style='background-color: white;text-transform:uppercase;' class='form-control' id='Kondisi' ng-model='Kondisi' placeholder='Baru/Bekas' ></td></tr>
<tr><td>HargaBeli</td><td>:</td><td><input style='background-color: white;text-transform:uppercase;'  class='form-control' id='HargaBeli' ng-model='Acost' placeholder='HargaBeli' ></td><td>&nbsp;</td><td>&nbsp;</td>
<td>HargaJual</td><td>:</td><td><input style='background-color: white;text-transform:uppercase;'   class='form-control' id='HargaJual' ng-model='Price'  placeholder='HargaJual' ></td></tr>

</table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="button" class="btn btn-primary" ng-click="updatemaster()" data-dismiss="modal">Simpan</button>
      </div>
    </div>
  </div>
</div>

@endsection