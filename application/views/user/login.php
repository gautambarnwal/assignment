<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title> <?= $this->SettingsModel->website_title ?> </title>
  </head>
  <body>
    
    <section class="py-4">
      <div class="container">
        <div class="row">

          <div class="text-center w-100 my-3">
            
            <img src="<?= base_url() ?><?= $this->SettingsModel->website_logo_url ?>" alt="<?= $this->SettingsModel->website_title ?>" class="p-2" style="max-width: 120px;"> 
          </div>

          <div class="col-md-12">
            <div class="float-right"><a href="<?= base_url() ?>AdminController" class="btn btn-sm btn-info my-2">Admin Login</a></div>
                <?php include 'common/messages.php'; ?>
                 <?php echo validation_errors(); ?> 
          </div>

          <div class="col-md-6">
            <div class="register border p-3 rounded">
              <?php
            $attributes = array('class' => 'form', 'method' => 'post','enctype'=>'multipart/form-data');
            echo form_open(base_url().'UserController/processregister', $attributes);
                  ?>
                    <div class="form-group text-center">
                      <h4>Register</h4>
                    </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email address</label>  <small>(will be considered as Username)</small>
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="region">Region</label>
                      <select name="region" id="region" class="form-control" required />
                        <option value="">Select Region</option>
                        <option value="North America">North America</option>
                        <option value="Asia">Asia</option>

                      </select>
                    </div>
                    <div class="form-group">
                      <label for="country">Country</label>
                      <select name="country" id="country" class="form-control" required />
                        <option value="">Select Country</option>
                        <option value="America">America</option> 
                        <option value="India">India</option> 

                      </select>
                    </div>
                    <div class="form-group">
                      <label for="division">Division</label>
                      <select name="division" id="division" class="form-control" required />
                        <option value="">Select Division</option>
                        <option value="SEA">SEA</option> 
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="role">Role</label>
                      <select name="role" id="role" class="form-control" required />
                        <option value="">Select Role</option>
                        <option value="Manager 1">Manager 1</option> 
                        <option value="Manager 2">Manager 2</option> 
                        <option value="Manager 3">Manager 3</option>  
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Minimum 8 Characters with Alphanumerical">
                    </div>
                    <div class="form-group">
                      <label for="conf_password">Confirm Password</label>
                      <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Minimum 8 Characters with Alphanumerical">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button> 
              </form>
            </div>
        </div>

        <div class="col-md-6">
          <div class="login border p-3 rounded">
            <?php
              $attributes = array('class' => 'form', 'method' => 'post','enctype'=>'multipart/form-data');
              echo form_open(base_url().'UserController/processlogin', $attributes);
            ?>
                  <div class="form-group text-center">
                    <h4>User Login</h4>
                  </div>
                  <div class="form-group">
                    <label for="login_email">Email Id</label>
                    <input type="email" class="form-control" id="login_email" name="email" placeholder="Enter email"> 
                  </div>
                  <div class="form-group">
                    <label for="login_password">Password</label>
                    <input type="password" class="form-control" id="login_password" name="password" placeholder="Password" >
                  </div>
                  <div class="result_msg"></div>
                  <div class="result_valid">
                      <span class="spinner-border spinner-border-sm ajax_loader" role="status"></span> 
                  </div>
                  <button type="submit" class="btn btn-primary submit-btn" >Next</button> 
            </form>
          </div>

          <div class="otp_window border p-3 rounded">
            <?php
              $attributes = array('class' => 'form', 'method' => 'post','enctype'=>'multipart/form-data');
              echo form_open(base_url().'UserController/processotp', $attributes);
            ?>
                  <div class="form-group text-center">
                    <h4>OTP</h4>
                  </div>
                  <div class="form-group">
                    <label for="login_otp">Enter OTP sent on your Email ID</label>
                    <input type="login_otp" class="form-control" id="login_otp" name="login_otp" placeholder="Enter OTP" required /> 
                    <input type="hidden" name="id" value="">
                  </div> 
                  <div class="result_msg"></div>
                  <div class="result_valid">
                      <span class="spinner-border spinner-border-sm ajax_loader" role="status"></span> 
                  </div>
                  <button type="submit" class="btn btn-primary otp-btn" >Login</button> 
            </form>
          </div>

        </div>

        </div>
      </div>
    </section>  
    <!-- Optional JavaScript -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $('.ajax_loader').hide();
    $(document).on('click', '.submit-btn', function(e){  
      
        e.preventDefault();
          myfrom = $(this).closest("form");
           $( myfrom ).find('.ajax_loader').show();
            // alert(myfrom)
            $.ajax({
              url :"<?= base_url() ?>UserController/processlogin",
              type:"POST",
              // cache:false,
              data: new FormData(myfrom[0]),
              processData: false,
              contentType: false,
              success:function(results){
                $( myfrom ).find('.ajax_loader').hide();
                if (results) {
                  // alert(results)
                  var json_data = $.parseJSON(results);
                  
                  if (json_data.status=="success") {
                    // alert(json_data.message);
                    $(".otp_window").find("input[name=id]").val(json_data.id);
                    $('.otp_window').show();
                    $('.login').hide();
                     $( myfrom ).find('.result_msg').html('<div class="alert alert-success" role="alert">'+json_data.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> </div>');
                  }else{
                    // alert(json_data.message);
                     $( myfrom ).find('.result_msg').html('<div class="alert alert-danger" role="alert">'+json_data.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> </div>');
                  }
                }
                 
              }
            });

      });

    $('.otp_window').hide();
    $(document).on('click', '.otp-btn', function(e){
      
        e.preventDefault();
          myfrom = $(this).closest("form");
           $( myfrom ).find('.ajax_loader').show(); 
            $.ajax({
              url :"<?= base_url() ?>UserController/processotp",
              type:"POST",
              // cache:false,
              data: new FormData(myfrom[0]),
              processData: false,
              contentType: false,
              success:function(results){
                $( myfrom ).find('.ajax_loader').hide();
                if (results) {
                  var json_data = $.parseJSON(results);
                  if (json_data.status=="success") { 

                      window.setTimeout(function(){
                            window.location.href = "<?= base_url() ?>UserDashboard";
                      }, 2000);

                      $( myfrom ).find('.result_msg').html('<div class="alert alert-success" role="alert">'+json_data.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> </div>');
                  }else{ 
                     $( myfrom ).find('.result_msg').html('<div class="alert alert-danger" role="alert">'+json_data.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> </div>');
                  }
                }
                 
              }
            });

      });


    </script>
  </body>
</html>