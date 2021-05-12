

<div class="container-fluid">
  <div class="row">
    
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h3">User Dashboard</h3>
        <div class="btn-toolbar mb-2 mb-md-0"> 
          <a href="<?= base_url() ?>UserDashboard/my_questions" class="btn btn-info mr-2">My Questions</a>
          <a href="<?= base_url() ?>UserDashboard/ask_question" class="btn btn-danger">Ask Question</a>
        </div>
      </div>
 

      <!-- <h4>Ask Questions</h4> -->
      
      <div class="w-100">

        <div class="register border p-3 w-75 mx-auto rounded">
              <?php
            $attributes = array('class' => 'form', 'method' => 'post','enctype'=>'multipart/form-data');
            echo form_open(base_url().'UserDashboard/process_ask_question', $attributes);
                  ?>
                    <div class="form-group text-center">
                       <?php include 'common/messages.php'; ?>
                      <h4>Ask Question</h4>
                    </div>
                    <div class="form-group">
                      <label for="name">Your Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?= $user_data->name ?>" placeholder="Enter name" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="country">Country</label>
                      <select name="country" id="country" class="form-control" required />
                        <option value="">Select Country</option>
                        <option value="America" <?= ($user_data->country=="America") ? "selected" : "" ?>>America</option> 
                        <option value="India" <?= ($user_data->country=="India") ? "selected" : "" ?>>India</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="qregarding">Question Regarding</label>
                      <select name="qregarding" id="qregarding" class="form-control" required />
                        <option value="">Select Question Regarding</option>
                        <option value="Category 1">Category 1</option> 
                        <option value="Category 2">Category 2</option> 
                        <option value="Category 3">Category 3</option> 
                        <option value="Category 4">Category 4</option>  
                      </select>
                    </div>
 
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Reference File</label> <small>(Not Required)</small>
                      <input type="file" name="ref_file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                      <label for="question">Question</label>
                      <textarea class="form-control" id="question" name="question" placeholder="Enter Your Question" required ></textarea>
                    </div>
                     
                    
                    <button type="submit" class="btn btn-primary">Submit</button> 
              </form>
            </div>

      </div>

    </main>

    
  </div>
</div>
