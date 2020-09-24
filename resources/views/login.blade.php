<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!doctypehtml>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

{{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> --}}
{{-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}


{{-- <link rel="stylesheet" type="text/css" href="personal-style.css"> --}}
    <link rel="stylesheet" href="assets/css/custom.css">
    {{-- <script src="assets/js/custom.js"></script> --}}
</head>

<body ng-app="app" ng-controller="zakymotor" ng-init="awal()">
  
<div class="container">
<br/>
<br/>
<br/>
<br/>

<center> <b id="login-name">LOGIN HERE </b> </center>
  
  <div class="row">
    
<div class="col-md-6 col-md-offset-3" id="login">  


  
<div class="form-group">
<label class="user"> UserName  </label>
<div class="input-group">
    {{ csrf_field() }}
  <span class="input-group-addon" id="iconn"> <i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" id="text1" name="txt1" ng-model="txt1" placeholder="username">
</div>
  
</div>

<div class="form-group">
<label class="user"> Password </label>
<div class="input-group">
  <span class="input-group-addon" id="iconn1" > <i class="glyphicon glyphicon-lock"></i></span>
<input type="Password" class="form-control" id="text2" name="txt2" ng-model="txt2" placeholder=" Enter Password">
</div>
</div>

<div class="@{{ loading }}" >
  <div class="rect1"></div>
  <div class="rect2"></div>
  <div class="rect3"></div>
  <div class="rect4"></div>
  <div class="rect5"></div>
</div>
<div class="form-group">
<input type="submit"  class="btn btn-success" value="@{{ submit }}" style="border-radius:0px;width: 100%" ng-click="login()">

    </div>
    <br/><br/><br/>
<div ng-bind-html="kode"></div>

  </div>
  </div>
</div>
  </body>


<style type="text/css" media="screen">

/* CSS MENU LOGIN */

body{
  background-image:url(https://wallpapertag.com/wallpaper/full/c/a/a/157415-simplistic-wallpapers-1920x1080-lockscreen.jpg)
}
#login-name{
font-size: 65px;
font-family: arabic typesetting;
border-bottom-style: ridge;
color:white;

}
#login{
background-color:rgba(13,13,13,0.2);
min-height:500px;
padding: 40px 80px 40px 80px;
box-shadow: -10px -10px 9px #66b3ff;

}
.user{
font-size: 29px;

font-family: arabic typesetting;

color: white;





}

#iconn{

background-color: #66b3ff;
border-color: #66b3ff;
color: white;

}
#iconn1{

background-color: #66b3ff;
border-color: #66b3ff;
color: white;

}

#text1{

  border-radius: 0;
  height: 40px;
}
#text2{

  border-radius: 0;
  height: 40px;
}

.btn{
  width: 50%;
  float: left;
  height: 40px;
  font-size: 18px;
} 
</style>


 <!--Datatables-->
  <link rel="stylesheet" href="assets/angularjs_datatables/jquery.dataTables.min.css" />
  <script data-require="jquery@1.10.1" data-semver="1.10.1" src="assets/angularjs_datatables/jquery-1.10.1.min.js"></script>
    <script src="assets/angularjs_datatables/jquery.dataTables.min.js"></script>
   {{-- <script src="assets/angularjs_datatables/angular.min.js"></script> --}}
   <script src="assets/angularjs_datatables/angular.min.js"></script>
    <script src="assets/angularjs_datatables/angular-datatables.js"></script>
  <script src="assets/angularjs_datatables/angular-datatables.directive.js"></script>
  <script src="assets/angularjs_datatables/angular-datatables.factory.js"></script>
  <script src="assets/angularjs_datatables/angular-datatables.bootstrap.js"></script>
   <script src="assets/js/custom.js" type="text/javascript"></script>
  </html>