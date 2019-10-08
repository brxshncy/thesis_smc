
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

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function(){
            $("#quantity").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        })
            $(document).on('click','.edit_button',function(){
                var id = $(this).attr('id');

                $.ajax({
                    url: "include/edit_items_in.php",
                    method:"post",
                    data:{id:id},
                    success:function(data){
                        $('#update_details').html(data);
                        $('#edit_modal').modal('show');
                    }
                });
                
            })
            $(document).on('click','.del_button',function(){
                $('#delete_modal').modal('show');
            });

            $('#delete_item').click(function(){
              var del_id =  $('.del_button').attr('id');
              
              $.ajax({
                url:'include/delete_items.php',
                method:'POST',
                data:{del_id:del_id},
                success:function(data){
                    location.reload();
                    $('#delete_modal').modal('hide');
                }
              });
            })
          
        });
    </script>
  

</body>

</html>