 <?php 
      if ($this->session->flashdata('error_msg')) {
          echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
                <b>'.$this->session->flashdata('error_msg').' </b>
              </div>';
      }
      if ($this->session->flashdata('success_msg')) {
          echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
                <b>'.$this->session->flashdata('success_msg').' </b>
              </div>';
      }
    ?>