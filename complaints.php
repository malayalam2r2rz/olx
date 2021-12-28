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
            <a href="logout.php" class="list-group-item list-group-item">LOG OUT</a>
            </td>
            </tr>
            </table>
        </div>

        
        <br><br>
        
        
        
        
        <?php
        $connect=mysqli_connect("localhost","root","","homework6");
        $sellu=mysqli_query($connect,"SELECT * FROM postcomplaint");
        if(mysqli_num_rows($sellu)>0)
            
        {
        ?>
        <table class="table table-borderless" bgcolor="#DBF4F7 ">
  <thead>
    <tr align="center">
      <th scope="col">#</th>
      <th scope="col">EMAIL ID</th>
      <th scope="col">COMPLAINT TITLE</th>
      <th scope="col">DATE</th>
      <th scope="col">MORE</th>
    </tr>
  </thead>
  <?php
          while ($comp=mysqli_fetch_row($sellu))
          {
  ?>
   <tbody>
    <tr align="center">
        <td><?php echo "$comp[0]"; ?></td>
        <td><?php echo "$comp[4]"; ?></td>
      <td><?php echo "$comp[1]"; ?></td>
      <td>  <?php echo "$comp[3]"; ?></td>
      <td>
          
          <a href="complaints.php?c=<?php echo$comp[4]?>">
              <?php
              
              if($comp[5]=="0")
              {
                   ?>
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#FF0000" class="bi bi-emoji-dizzy-fill" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM4.146 5.146a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 1 1 .708.708l-.647.646.647.646a.5.5 0 1 1-.708.708L5.5 7.207l-.646.647a.5.5 0 1 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 0-.708zm5 0a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 1 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 0-.708zM8 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
</svg>
             
              <?php
              }
                else
                    {
                    ?>
 
<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#EDED5E" class="bi bi-emoji-heart-eyes-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.559 5.448a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zm-.07-5.448c1.397-.864 3.543 1.838-.953 3.434-3.067-3.554.19-4.858.952-3.434z"/>
</svg>
           
                    
              <?php
                    }       
              ?>
             
              
             
          </a>
      </td>
         
    </tr>

  </tbody>
     
   
          <?php
          
          }
        }
          
          ?>
  
     </table>
  
          <?php
  
                if(isset($_GET['c']))
                {
                    $c=$_GET['c'];
                    $update=mysqli_query($connect,"UPDATE postcomplaint SET status='1' WHERE Email='$c'");
                    $cylla=mysqli_query($connect,"SELECT * FROM postcomplaint where Email='$c'");
                    if(mysqli_num_rows($cylla)>0)
                    {
                        $rows=mysqli_fetch_row($cylla);
                        ?>
<div class="card" style="width: 17rem;">
  <img src="images/fb-image_redesign.png" class="card-img-top" alt=""/>
  <div class="card-body">
    <h5 class="card-title"><?php  echo "$rows[1]"; ?></h5>
    <p class="card-text"><?php echo "$rows[2]"; ?></p>
    <h5 class="card-title">POSTED DATE</h5>
    <p class="card-text"><?php echo "$rows[3]"; ?></p>
     <p class="card-text"><?php echo "$rows[4]"; ?></p>
    
    <a href="complaints.php" class="btn btn-primary">GO BACK</a>
  </div>
</div>
                        
                           
                         
                            <?php
                    }
                }
          
            ?>  
 


          
     
    </body>
</html>
