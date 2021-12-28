 <?php
        $connect = mysqli_connect("localhost", "root", "", "homework6");
        session_start();
        $username = $_SESSION["adm"];
        echo "WELCOME ADMIN";
        ?>
</table>

     

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
            <table>
                <tr align="center">
                    <td>
            <a href="index.php" class="list-group-item list-group-item-action active" aria-current="true">
                HOME
            </a>
                    </td>
                    <td>
            <a href="viewproduct.php" class="list-group-item list-group-item-action active">VIEW PRODUCT</a>
                    </td>
                    <td>
                        <a href="complaints.php" class="list-group-item list-group-item-action active">COMPLAINTS
                         (
                        <?php
                        
                        $selll=mysqli_query($connect,"SELECT * FROM postcomplaint WHERE Status='0'");
                        
                        $r=mysqli_num_rows($selll);
                        echo "$r";
                        ?>
                        /
                        <?php
                        $s=mysqli_query($connect,"SELECT * FROM postcomplaint");
                        
                        $rr=mysqli_num_rows($s);
                        
                        echo "$rr";
                        ?>
                        
                        )</a>
                       
                    </td>
            <td>
            <a href="logout.php" class="list-group-item list-group-item-action">LOG OUT</a>
            </td>
            </tr>
            </table>
        </div>
    </body>
</html>
