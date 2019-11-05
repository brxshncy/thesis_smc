
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

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script>
       $(document).ready(function(){
            $('table').DataTable();
            $('.view_call').click(function(){
                var view = $(this).attr('id');
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
            $('.edit_call').click(function(){
                var edit = $(this).attr('id');
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
            $('.del_call').click(function(){
                var del = $(this).attr('id');
                $('#del_logs').modal('show');
                    $('#delete').click(function(){
                        $.ajax({
                            url: 'include/call_del.php',
                            method: 'post',
                            data:{del:del},
                            success:function(data){
                              location.reload();
                            }
                        })
                    })
            })
           
       })
    </script>
  

</body>

</html>