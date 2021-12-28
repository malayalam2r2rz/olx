

        <?php
        $connect=mysqli_connect("localhost","root","","homework6");
        session_start();
        $username=$_SESSION['any'];



        if(isset($_POST['sub'])) {
            $prname=$_POST['prname'];
            $des=$_POST['des'];
            $im=$_FILES['im']['name'];
            

            $f2=move_uploaded_file($_FILES['im']['tmp_name'],getcwd()."//images//$im//");

            $username=$_SESSION['any'];
            
            $inse=mysqli_query($connect,"insert into addproduct values('','$prname','$des','$im','$username','1')");

            if($inse>0) {
                echo "<br> <br>SUCCESSFULLY ADDED";
            } else {
                mysqli_error($connect);
            }
        }
        ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <link href="newcss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">



            <div class="form-floating mb-3">
                <input type="text" name="prname" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">PRODUCT NAME</label>
            </div>
            <br>
            <div class="form-floating">
                <input type="text" name="des" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">DESCRIPTION</label>
            </div>
            <br> <br>

            <div class="input-group mb-3">
                <input type="file" class="form-control" name="im" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            <br><br>
            <div class="nav justify-content-center">
                <input type="submit" name="sub" class="btn btn-outline-warning" value="ok">
            </div>

        </form>
        <br> <br> <br>
        <div class="nav justify-content-center">
            <button type="button" class="btn btn-outline-success"><a href="logout.php">logout</a></button>

        </div> 

    </body>
</html>
