

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
            echo form_open(base_url().'UserDashboard/process_edit_question', $attributes);
                  ?>
                  <?php if ($question): ?>
                    <?php $question = $question[0]; ?>
                    <div class="form-group text-center">
                       <?php include 'common/messages.php'; ?>
                      <h4>Edit Question</h4>
                    </div>
                    <div class="form-group">
                      <label for="name">Your Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?= $question->name ?>" readonly placeholder="Enter name" required>
                      <input type="hidden" value="<?= $question->id ?>" name="question_id">
                    </div>
                    
                    <div class="form-group">
                      <label for="country">Country</label>
                      <select name="country" id="country" class="form-control" readonly required />
                        <option value="">Select Country</option>
                        <option value="America" <?= ($question->country=="America") ? "selected" : "" ?>>America</option> 
                        <option value="India" <?= ($question->country=="India") ? "selected" : "" ?>>India</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="qregarding">Question Regarding</label>
                      <select name="qregarding" id="qregarding" class="form-control" required />
                        <option value="">Select Question Regarding</option>
                        <option value="Category 1" <?= ($question->question_regarding=="Category 1") ? "selected" : "" ?>>Category 1</option> 
                        <option value="Category 2" <?= ($question->question_regarding=="Category 2") ? "selected" : "" ?>>Category 2</option> 
                        <option value="Category 3" <?= ($question->question_regarding=="Category 3") ? "selected" : "" ?>>Category 3</option> 
                        <option value="Category 4" <?= ($question->question_regarding=="Category 4") ? "selected" : "" ?>>Category 4</option>  
                      </select>
                    </div>
 
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Reference File</label> <small>(Not Required)</small>
                      <input type="file" name="ref_file" class="form-control-file" id="exampleFormControlFile1">
                      <input type="hidden" value="<?= $question->ref_file ?>" name="old_ref_file">
                      <?php if ($question->ref_file): ?>
                        <a href="<?= base_url() ?>assets/uploads/<?= $question->ref_file ?>" class="my-2" target="_blank">View Reference File</a>
                      <?php endif ?> 
                    </div>
                    <div class="form-group">
                      <label for="question">Question</label>
                      <textarea class="form-control" id="question" name="question" placeholder="Enter Your Question" required ><?= $question->question ?></textarea>
                    </div>
                     
                    
                    <button type="submit" class="btn btn-primary">Submit</button>

                  <?php else: ?>
                    <p>Something Went Wrong</p>
                  <?php endif ?>
                    
              </form>
            </div>

      </div>

    </main>

    
  </div>
</div>
