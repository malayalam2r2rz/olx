
<?php
$connect = mysqli_connect("localhost", "root", "", "homework6");

if (isset($_POST['sub'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $ad = $_POST['ad'];
    $email = $_POST['email'];
    $pas = $_POST['pas'];
    $img = $_FILES['img']['name'];

    $f1 = move_uploaded_file($_FILES['img']['tmp_name'], getcwd() . "//images//$img//");

    $ins = mysqli_query($connect, "insert into a6 values('','$name','$age','$ad','$email','$pas','$img')");

    if ($ins > 0) {
        $insert = mysqli_query($connect, "insert into login1 values('','$email','$pas','user','1')");
    }
}
?>

<?php
if (isset($_POST['subm'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $select = mysqli_query($connect, "SELECT * FROM login1 where Username='$username' and Password='$pass'");

    if (mysqli_num_rows($select) > 0) {
        session_start();
        $ro = mysqli_fetch_row($select);
        if ($ro[3] == "user") {


            $_SESSION['any'] = $username;
            header("location:user_home.php");
        }



        if ($ro[3] == "admin") {
            $_SESSION["adm"] = $username;
            header("location:admin.php");
        } else {
            echo "invalid username / password";
        }
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <link href="newcss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container-fluid total">

            <div class="nav justify-content-center">

                <nav class="nav nav-pills nav-justified">
                    <a class="nav-link active" aria-current="page" href="#">OLX</a>
                    <a class="nav-link" href="#">INDIA</a>
                    <a class="nav-link" href="#">CHINA</a>
                    <a class="nav-link disabled">USA</a>
                </nav>
            </div>
            <br><br><br>

             <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="100">
     <img src="images/olx-logo-1-1.png" class="d-block w-100" alt=""/>
    </div>
    <div class="carousel-item" data-bs-interval="500">

       <img src="images/olx-logo-1-1.png" class="d-block w-100" alt=""/>
    </div>
    <div class="carousel-item">
      
      <img src="images/olx-logo-1-1.png" class="d-block w-100" alt=""/>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
            
            <div class="d-inline-flex p-2 bd-highlight">REIGISTER</div>

            <div>
                <form method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">ENTER YOUR NAME</span>
                        <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">ENTER YOUR AGE</span>
                        <input type="number" name="age" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group">
                        <span class="input-group-text">ENTER YOUR ADDRESS</span>
                        <textarea class="form-control" name="ad" aria-label="With textarea"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">EMAIL AND PASSWORD</span>
                        <input type="email" name="email" aria-label="First name" class="form-control">
                        <input type="password" name="pas" aria-label="Last name" class="form-control">
                    </div>
                    <br> <br>   

                    <input type="file" name="img"> <br> <br>

                    <div class="d-grid gap-2 col-6 mx-auto">

                        <input type="submit" class="btn btn-success" name="sub">

                    </div>

                    <br><br><br>

                   

                </form>

                <div class="d-inline-flex p-2 bd-highlight">EXISTING USER LOG IN</div> <br><br><br>
            </div>

            <div>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">USERNAME</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputPassword1" class="form-label">PASSWORD</label>
                        <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                    </div>

                    <input type="submit" name="subm" class="btn btn-primary">
                </form>

            </div>
        </div>
    </div>
</body>
</html>
