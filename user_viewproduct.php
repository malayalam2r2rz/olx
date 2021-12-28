<?php
        $connect=mysqli_connect("localhost","root","","homework6");
        session_start();
        $username=$_SESSION['any'];
        echo "welcome $username";
?>

 <?php
            
            if(isset($_GET['i']))
                
            {
                $i=$_GET['i'];
                $r=$_GET['r'];
                $dt=date('d-m-y');
                
                 $username=$_SESSION['any'];
                 
                $insert=mysqli_query($connect,"insert into interest values('','$username','$i','$r','$dt','0')");
                
                if($insert>0) 
               {
                echo "<br> <br>SUCCESSFULLY ADDED";
               }
            else
                {
                   mysqli_error($connect);
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
                        <a href="addproduct.php" class="list-group-item list-group-item-action active">ADD PRODUCT</a>
                    </td>
                    <td>
            <a href="" class="list-group-item list-group-item-action active">MY REQUEST</a>
                    </td>
                    <td>
                        <a href="postcomplaint.php" class="list-group-item list-group-item-action active">POST COMPLAINT</a>
                        
                    </td>
                    <td>
                        <a href="user_viewproduct.php" class="list-group-item list-group-item-action active">VIEW PRODUCTS</a>
                    </td>
            <td>
            <a href="logout.php" class="list-group-item list-group-item-action">LOG OUT</a>
            </td>
            </tr>
            </table>
        </div>
        
        
        <br><br>
        
            
        
        
            
        <div class="row">
  <?php
        $se=mysqli_query($connect,"SELECT * FROM addproduct WHERE Userid NOT IN('$username')");
        
            while($rrr=mysqli_fetch_row($se))
            {
                
        ?>
            <div class="col-lg-4 col-md-4">
                <table class="tab1">
                    <tr>
                    
                        <td> <img src="images/<?php echo $rrr[3]; ?>" class="img-fluid rounded-start" width="200px" height="200px"></td>
                        <tr>
                            
                        <td><?php echo "$rrr[1] ";?></td>
                         </tr>
                         <tr>
                        <td> <?php echo "$rrr[2] ";?> </td>
                         </tr>
                         <tr>
                        <td> <?php echo "$rrr[4]";?> </td>
                         </tr>
                         <tr>
                             
                               <td>
                                   <?php
                                   $ss=mysqli_query($connect,"SELECT * FROM interest WHERE userid='$username' and productid='$rrr[0]'");
                                   
                                   if(mysqli_num_rows($ss)>0)
                                       
                                   {
                                       ?>
                                   <div class="btn btn-danger">ALREADY POSTED</div>
                                   <?php
                                   
                                   }
                                    else
                                        {
                                        
                                    
                                   ?>
                                   <a href="user_viewproduct.php?i=<?php echo "$rrr[0]";?>&r=<?php echo "$rrr[4]";?>">
                
                        <input type="submit" class="btn-success" value="POST INTEREST">
                          </a>
                                   <?php
                                        }
                                   ?>
                               </td>
                   </tr>
                </table>
            </div>
     
  
           
 
              <?php  
                }
        ?>
            
           
        </div>
        
    </body>
</html>
