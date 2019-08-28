<?php 
include 'include/db.php';
?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Search</title>
  </head>
  <body class="bg-info">

  <div class="container">
      <div class="row justify-content-center">
        <div class="col bg-light mt-4 p-2">
              <input type="text" class="form-control form-control-sm p-2 mt-4"  name="search" id="search" placeholder="Search">
              <table class="table table-striped mt-4" id="table_search">
                  <thead>
                    <tr class='bg-primary'>
                      <td>ID</td>
                      <td>Name</td>
                      <td>Address</td>
                      <td>Gender</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $select = "SELECT * FROM pcr";
                      $result = mysqli_query($conn,$select);
                    ?>
                    <?php while($row = mysqli_fetch_assoc($result)){

                      ?>
                      <tr>
                      <td><?php echo $row['id'];?></td>
                      <td><?php echo $row['firstname'];?><?php echo " ";?><?php echo $row['middlename'];?><?php echo " ";?><?php echo $row['lastname'];?></td>
                      <td><?php echo $row['address'];?></td>
                      <td><?php echo $row['gender'];?></td>
                      <td><a href="">Edit</a> || <a href="" style="color:red;">Delete</a> </td>
                    </tr>
                    <?php } ?>
                  </tbody>
              </table>
  
        </div>
      </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function(){
        $("#search").keyup(function(){
          var search = $(this).val();
           $.ajax({
              url: 'include/search.php',
              type: 'post',
              data:{search:search},
              success:function(data){
                $('#table_search').html(data);
              }
           })
        });
      });

    </script>
  </body>
</html>