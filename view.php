<?php
$connect=mysqli_connect("localhost","root","","homework6");
 session_start();
 $username = $_SESSION['any'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
         
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    </head>
    <body>
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


             if(isset($_GET['w']))
             { 
                        $w=$_GET['w'];
                    $selectt=mysqli_query($connect,"SELECT * FROM addproduct WHERE id='$w'");
                    
        if(mysqli_num_rows($selectt)>0)
        {
        $qq=mysqli_fetch_row($selectt)
              
                ?>
        
                      <img src="images/<?php echo $qq[3]; ?>" class="img img-responsive" width="280px" height="280px">
            
        
        <?php
        }
             }
        ?>
        
                      
                      <?php
                      
                      
                      $sss=mysqli_query($connect,"SELECT * FROM interest WHERE productid='$qq[0]'");
                      if(mysqli_num_rows($sss)>0)
                      {
                          while ($rro=mysqli_fetch_row($sss))
                          {
                              $selee=mysqli_query($connect,"SELECT * FROM a6 WHERE Email='$rro[4]'");
                              
                              if(mysqli_num_rows($selee)>0)
                                  
                              {
                                  $rrs=mysqli_fetch_row($selee);
                                  
                                  echo "name $rrs[1]";
                              }
                          }
                      }
                      
                      ?>
    </body>
</html>
