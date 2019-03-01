

<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <script type="text/javascript">
         function ValidatePhonenumber (vals){
         	var R=/^\(?([0-9]{3})\)?[-.]?([0-9]{3})[-.]?([0-9]{4})$/;
         	var t=R.exec(vals.value);
         	if(!t){
         		alert("phone number not valid");
         	}
         }
         
      </script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   </head>
   <body>
      <?php require_once 'process.php'?>
      <?php
         if (isset($_SESSION['message'])):
         ?>
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
         <?php
            echo  $_SESSION['message'] ="Information Submitted!";;
            unset($_SESSION['message']);
            ?>
      </div>
      <?php endif ?>
      <div class="container">
         <img src="logo1.jpg" class="img-fluid rounded mx-auto d-block" alt="Responsive image">
         <img src="logo.jpg" class="img-fluid rounded mx-auto d-block" alt="Responsive image">
         <br>
         <form action="process.php" method="post">
            <div class="form-group row">
               <label for="inputText" class="col-sm-2 col-form-label">Company Name</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" 
                     name="CompanyName" placeholder="" >
               </div>
            </div>
            <div class="form-group row">
               <label for="inputText" class="col-sm-2 col-form-label">Representative Name</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="RepresentativeName" placeholder="" >
               </div>
            </div>
            <div class="form-group row">
               <label for="inpuText" class="col-sm-2 col-form-label">Title</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="Title" placeholder="" >
               </div>
            </div>
            <div class="form-group row">
               <label for="Text" class="col-sm-2 col-form-label">Email</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="Email" placeholder="" >
               </div>
            </div>
            <div class="form-group row">
               <label for="inputText" class="col-sm-2 col-form-label">Phone Number</label>
               <div class="col-sm-10">  
                  <input type="text" class="form-control" id="inputText" name="PhoneNumber"  placeholder="" onchange="ValidatePhonenumber (this);"  >
               </div>
            </div>
            <div class="form-group">
               <label for="exampleFormControlTextarea1">Comment</label>
               <textarea class="form-control" id="exampleFormControlTextarea1" name="Comment" rows="3" ></textarea>
            </div>
            <button class="btn btn-primary"  name="submit" type="submit">Submit form</button>
         </form>
      </div>
      </div>
   </body>
</html>

