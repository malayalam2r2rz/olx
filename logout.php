<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $connect = mysqli_connect("localhost", "root", "", "homework6");
        session_start();
        session_destroy();
        header("location:index.php");
        ?>
    </body>
</html>




