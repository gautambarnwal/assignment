

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
 

      <h4>My Questions</h4>
      <?php include 'common/messages.php'; ?>
      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">

          <thead>
            <tr>
              <th>No.</th> 
              <th>Owner</th>
              <th>Country</th>
              <th>Query</th>
              <th>Answer</th> 
              <th>Edit</th>
              <th>Status</th> 
            </tr>
          </thead>
          <tbody>
            <?php if ($my_questions): ?>
              <?php foreach ($my_questions as $key => $value): ?>
                <tr>
                  <td><?= $value->id ?></td>
                  <td><?= $value->name ?></td>
                  <td><?= $value->country ?></td>
                  <td><?= $value->question ?></td>
                  <td><?= $value->answer ?></td>
                  
                  <td><a href="<?= base_url() ?>UserDashboard/edit_question/<?= $value->id ?>" >Edit</a></td>
                  <td><a href="#" data-questionid="<?= $value->id ?>" data-status="<?= $value->status ?>" data-user-id="<?= $value->user_id ?>" class="change_status_btn btn btn-sm <?= ($value->status)?"btn-warning":"btn-danger" ?>"><?= ($value->status)?"Open":"Close" ?></a></td> 
                </tr>
              <?php endforeach ?>
            <?php endif ?>
            
            
          </tbody>
        </table>
      </div>
    </main>

    
  </div>
</div>
