<!DOCTYPE html>
<html>
 <head>
  <title>zip file in laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
   .has-error
   {
    border-color:#cc0000;
    background-color:#ffff99;
   }
  </style>
 </head>
 <body>     
  <br />
  <div class="container box">
   <h3 align="center">zip file in laravel</h3><br />
   <br><br>
   <form method="post" action="/download">
    @csrf
    <div class="form-group">
     <label>Upload file: </label>
     <input type="file" name="file[]" multiple/>
    </div>
    <div class="form-group">
     <input type="submit" name="send" class="btn btn-info" value="Conver to Zip file" />
    </div>
   </form>
   
  </div>
 </body>
</html>

