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
        <!--        <div>
                    <a href="index.php">home</a>
                <a href="addproduct.php">addproduct</a>
                <a href="">my request</a>
                <a href="">Post Complaint</a>
                <a href="logout.php">logout</a>
                </div> -->

        <div class="list-group">
            <a href="index.php" class="list-group-item list-group-item-action active" aria-current="true">
                HOME
            </a>
            <a href="addproduct.php" class="list-group-item list-group-item-action">ADD PRODUCT</a>
            <a href="" class="list-group-item list-group-item-action">MY REQUEST</a>
            <a href="postcomplaint.php" class="list-group-item list-group-item-action">POST COMPLAINT</a>
            <a href="user_viewproduct.php" class="list-group-item list-group-item-action">VIEW PRODUCTS</a>
            <a href="logout.php" class="list-group-item list-group-item-action">LOG OUT</a>
        </div>
        <br> <br>
        <?php
        $connect = mysqli_connect("localhost", "root", "", "homework6");
        session_start();
        $username = $_SESSION['any'];
        $select1 = mysqli_query($connect, "SELECT * FROM a6 where Email='$username'");


        if (mysqli_num_rows($select1) > 0) {



            $a = mysqli_fetch_row($select1); {
                echo "WELCOME   $a[1] <br>";
            }
            
             if($a[3]=="admin")
            {
                $_SESSION["adm"]=$username;
                header("location:admin.php");
            }
            
        }

        $selec = mysqli_query($connect, "SELECT * FROM addproduct where Userid='$username'");

        if (mysqli_num_rows($selec) > 0 ) {
            
            ?>
            <table border="2px" width="300px" height="300px">

            <?php

                while($b=  mysqli_fetch_row($selec)){
                ?>
                    <tr align="center">
                        <td><img src="images/<?php echo $b[3]; ?>" class="img img-responsive" width="280px" height="280px"></td>
                    </tr>
                    <tr align="center">
                        
                        <td><?php echo "product name :  $b[1]"; ?></td>
                    </tr>
                    <tr align="center">
                        <td><?php echo "description : $b[2] "; ?></td>
                    </tr>
                    <tr>
                        <td>
                            TOTAL INTEREST
                        </td>
                        <td>
                            <?php
                            $selecty=mysqli_query($connect,"SELECT * FROM interest WHERE productid='$b[0]'");
                            
                            $r1=mysqli_num_rows($selecty);
                            
                            echo "$r1";
                            
                            ?>
                            
                            <a href="view.php?w=<?php echo $b[0];?>"><input type="submit" class="btn-danger" value="VIEW"></a>
                        </td>
                    </tr>
                    
                   

        <?php
    }
}
        
?>




        </table>
    </body>
</html>
