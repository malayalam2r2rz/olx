<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    </head>
    <body>
        
         <div class="list-group">
            <a href="index.php" class="list-group-item list-group-item-action active" aria-current="true">
                HOME
            </a>
            <a href="addproduct.php" class="list-group-item list-group-item-action">ADD PRODUCT</a>
            <a href="" class="list-group-item list-group-item-action">MY REQUEST</a>
            <a href="#" class="list-group-item list-group-item-action">POST COMPLAINT</a>
            <a href="logout.php" class="list-group-item list-group-item-action">LOG OUT</a>
        </div>
        <br> <br>
        
        <?php
        $connect=mysqli_connect("localhost","root","","homework6");
        
        session_start();
        $username=$_SESSION['any'];

        
        
        if(isset($_POST['sub']))
            
        {
            $com=$_POST['com'];
            $complaint=$_POST['complaint'];
            $dt=date('d-m-y');
            
            $username=$_SESSION['any'];
            
            $insertt=mysqli_query($connect,"insert into postcomplaint values('','$com','$complaint','$dt','$username','0')");
            
            if($insertt>0)
                
            {
                echo "COMPLAINT REGISTERED SUCCESSFULLY";
            }
             else
                 {
                echo "FAILURE AT ITS PEAK";
                 }
        }
        ?>
        
        <form method="post" enctype="multipart/form-data">
            <div class="container-fluid"> POST COMPLAINT    <br> <br>
              <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">COMPLAINT TITLE</label>
  <input type="text" name="com" class="form-control" id="exampleFormControlInput1" placeholder="enter your complaint in one word.">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">COMPLAINT</label>
  <textarea name="complaint" class="form-control" id="exampleFormControlTextarea1" placeholder="type the whole complaint." rows="4"></textarea>
</div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input class="btn btn-primary me-md-2" type="submit" name="sub" placeholder="POST">
            </div>

              </div>
        </form>
    </body>
</html>

















