
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
            <a href="" class="list-group-item list-group-item-action active">COMPLAINTS</a>
                    </td>
            <td>
            <a href="logout.php" class="list-group-item list-group-item-action">LOG OUT</a>
            </td>
            </tr>
            </table>
        </div>

 <?php
        $connect=mysqli_connect("localhost","root","","homework6");
     $sel = mysqli_query($connect, "SELECT * FROM a6");
        if(mysqli_num_rows($sel)>0)
        {
        ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NAME</th>
      <th scope="col">ADDRESS</th>
      <th scope="col">NO. OF ITEMS ADDED</th>
      <th scope="col">MORE</th>
    </tr>
  </thead>
  
     <?php
       
        while($ad=mysqli_fetch_row($sel))
        {
            
        ?>
  <tbody>
    <tr>
        <td><?php echo "$ad[0]"; ?></td>
      <td><?php echo "$ad[1]"; ?></td>
      <td>  <?php echo "$ad[3]"; ?></td>
      <td>
          <?php
          $selly=mysqli_query($connect,"SELECT * FROM addproduct where Userid='$ad[4]'");
          
          if(mysqli_num_rows($selly)>0){
              
              echo mysqli_num_rows($selly);
          }
          ?>
      </td>
      <td>
          <a href="viewproduct.php?p=<?php echo$ad[4];?>">
              
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
  </svg>
          </a>
      </td>
        <td></td>
    </tr>

  </tbody>
     
    

    <?php
        }
        }
        ?>
    
    <?php
    if(isset($_GET['p']))
    {
        $p=$_GET['p'];
        $selli=mysqli_query($connect,"SELECT * FROM addproduct where Userid='$p'");
        if(mysqli_num_rows($selli)>0)
        {
            while ($row=mysqli_fetch_row($selli))
            {
                
                ?>
<img src="images/<?php echo $row[3]; ?>" class="img img-responsive" width="200px" height="200px">

<?php

                $ses=mysqli_query($connect,"SELECT * FROM interest WHERE productid='$row[0]'");

                $roo=mysqli_num_rows($ses);
                
                


            ?>


<!-- Button trigger modal -->



  <a href="viewproduct.php?l=<?php echo "$ad[0]"; ?>">
  <input type="submit" class="btn btn-primary">
  NO OF ENTHUSIAST
  <?php 
  echo "$roo";
  ?>
  </a>


<!-- Modal -->
<!--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">THESE ARE THE ONES WITH MORE INTEREST</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">-->
       
            <?php
                      if(isset($_GET['l']))
                      {
                          $l=$_GET['l'];
                      
                      $sal=mysqli_query($connect,"SELECT * FROM interest WHERE productid='$l'");
                      if(mysqli_num_rows($sal)>0)
                      {
                          while ($sro=mysqli_fetch_row($sal))
                          {
                              $sa=mysqli_query($connect,"SELECT * FROM a6 WHERE Email='$sro[4]'");
                              
                              if(mysqli_num_rows($sa)>0)
                                  
                              {
                                  $srs=mysqli_fetch_row($sa);
                                  
                                  echo "name $srs[1]";
                              }
                          }
                      }
                      }
                      ?>
          
      </div>
<!--      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>


<?php
            }
        }
    }
    ?>

            
</table>
    </body>
</html>
