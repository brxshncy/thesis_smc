<?php 
        require('include/db.php');
        $brgy = "SELECT brgy.baranggay_name as brgy, COUNT(brgy.baranggay_name) as tally  FROM barangay_responses brgy_res LEFT JOIN barangay brgy ON brgy.id = brgy_res.barangay_name GROUP BY brgy.baranggay_name";
        $run = $conn->query($brgy) or trigger_error(mysqli_error($conn)." ".$brgy);
        $data = array();
       
       while($row = mysqli_fetch_assoc($run)){
           $brgy_name[] = $row['brgy'];
           $tally[] = $row['tally'];
           
      }
      echo json_encode($brgy_name);
      echo json_encode($tally);
      
    ?>