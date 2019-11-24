
<!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>


    <!-- Main JS-->
    <script src="js/main.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
$(document).ready(function(){
$('table').DataTable();
$(function () {
    $('#call_time').datetimepicker({
        format: 'LT',
        pickDate: false
    });
});
    $('#notify').click(function(e){
        let valid = this.form.checkValidity();
        if(valid){
            e.preventDefault();
            let p_fname = $('#p_fname').val();
            let p_lname = $('#p_lname').val();
            let c_fname = $('#c_fname').val();
            let c_lname = $('#c_lname').val();
            let reason_call = $('#reason_call').val();
            let number_caller = $('#number_caller').val();
            let date_call = $('#date_call').val();
            let call_time = $('#call_time').val();
            let address_incident = $('#address_incident').val();
            let hospital = $('#hospital').val();
            let notification = $('#notification').val();
              $.ajax({
                type:'POST',
                url: 'include/call_logs.php',
                data: {p_fname: p_fname, 
                       p_lname: p_lname, 
                       c_fname: c_fname, 
                       c_lname: c_lname,
                       reason_call: reason_call,
                       number_caller: number_caller,
                       date_call: date_call,
                       call_time: call_time,
                       address_incident: address_incident,
                       hospital: hospital
                   },
               success:function(data){
                    Swal.fire({
                        'title': 'Alert Sent!',
                        'text': 'Rescuers Notified!',
                        'icon': 'success',
                        backdrop: `
                            rgb(0,128,0,0.2)
                            left top
                            no-repeat
                          `
                    })
                },
                error: function(data){
                   Swal.fire({
                        'title': 'Errors',
                        'text': 'Unknown error occured',
                        'icon': 'error'
                   })
                }
              });
        }
    });

  
// =========================== MODAL ==========================================
// VIEW MODAL FUNCTION
$('.view_call').click(function(){
    var view = $(this).attr('id');
    console.log(view);
    $.ajax({
        url: 'include/call_view.php',
        method: 'post',
        data:{view:view},
        success:function(data){
            $('#call_view').html(data);
            $('#call_logs').modal('show');
        }
    })
})
// END VIEW MODAL FUNCTION

// DATETIME PICKER FUNCTION
// END DATETIME PICKER FUNCTION

// EDIT MODAL FUNCTION
$('.edit_call').click(function(){
var edit = $(this).attr('id');
console.log(edit);
    $.ajax({
        url: 'include/call_edit.php',
        method: 'post',
        data:{edit:edit},
        success:function(data){
            $('#call_edit').html(data);
            $('#edit_logs').modal('show');
         }
    })
})
// =========================== MODAL ==========================================            
           
       })
    </script>
  

</body>

</html>