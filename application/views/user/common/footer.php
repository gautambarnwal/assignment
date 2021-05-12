
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>


<script>
  $(document).ready(function() {
      $('#example').DataTable();
  } );
</script>

<script> 
  $(document).on('click', '.change_status_btn', function(e){
  
        e.preventDefault(); 
        var current_elm = $(this);
        var q_id = $(current_elm).attr("data-questionid");
        var qstatus = $(current_elm).attr("data-status");
        $(current_elm).html("Loading..");
          $.ajax({
            url :"<?= base_url() ?>UserDashboard/change_question_status",
            type:"POST", 
            data: {question_id:q_id, status:qstatus},  
            dataType: "text", 
            success:function(results){
              // alert(results) 
              if (results) {
                var json_data = $.parseJSON(results);
                
                if (json_data.status=="success") {
 
                  $(current_elm).attr("data-status", json_data.question_status); 
                  if (json_data.question_status=='1') {
                     $(current_elm).addClass("btn-warning");
                     $(current_elm).removeClass("btn-danger");
                     $(current_elm).html("Open");
                  }else{ 
                     $(current_elm).removeClass("btn-warning");
                     $(current_elm).addClass("btn-danger"); 
                     $(current_elm).html("Close");
                  } 
                   
                }
                else{
                  // alert("Something Went wrong");
                  alert(json_data.message);
                }
              }
               
            }
          });
    });

</script>

      </body>
</html>
