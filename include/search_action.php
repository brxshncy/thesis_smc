<?php
include 'db.php';

$output = '';

    if(isset($_POST['search'])){
      $search = $_POST['search'];

      $query = "SELECT * FROM pcr_official WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR middlename LIKE '%$search%' ORDER BY id ASC ";
      $result = mysqli_query($conn,$query); 
    }
    if($result->num_rows>0){
      $output = "
          <thead>
                            <tr class='table-info'>
                             <th>ID</th>
                             <th>Full Name</th>
                            
                             <th>Date Incident</th>
                             <th>Time Incident</th>
                             <th>Respondents</th>
                             <th>Action</th>
                            </tr>
                        </thead>
                   <tbody>";
      while($row=mysqli_fetch_assoc($result)){
            $output .="
                <tr>
                    <td>".$row['id']."</td>
                              <td>".$row['firstname'].' '.$row['middlename'].' '.$row['lastname']. "</td>
                             
                              <td>".$row['date_i']."</td>
                              <td>".$row['time_i']."</td>
                              <td>".$row['dispatched_unit']."</td>
                              <td>
                                    
                                       <a href='pcr_view.php?view=".$row['id']."'>
                                            <button class='item 'style='color:green;' data-toggle='tooltip' data-placement='top' title='View Full Details'>
                                                <i class='fa fa-eye'></i>
                                             </button>
                                        </a> ||
                                         <button class='item edit_button' style='color:blue;' data-toggle='modal'  data-placement='top' id=".$row['id']." title='Update Details'>
                                                 <i class='fa fa-edit (alias)'></i>
                                            </button> ||
                                           <a href='include/delete.php?delete=".$row['id']."'> 
                                             <button class='item' style='color:red;' data-toggle='tooltip' data-placement='top'title='Delete'>
                                                 <i class='zmdi zmdi-delete'></i></button>
                                        </a> ||
                                        
                                            
                                    
                                </td>

                </tr>";
          }
          $output .= "</tbody>";
          echo $output;
      }
      else{
        echo "No Data Found";
      } 

?>