

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
 

      <h4>All Questions</h4>
      <div class="table-responsive" id="accordion">
        <table id="example" class="table table-striped table-bordered" style="width:100%">

          <thead>
            <tr>
              <th>Questions</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($all_questions): ?>
              <?php foreach ($all_questions as $key => $value): ?>
                <tr>
                  <td colspan="2">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_<?= $key ?>" aria-expanded="true" aria-controls="collapse_<?= $key ?>">
                         <?= $value->question ?>
                      </button>
                        <div id="collapse_<?= $key ?>" class="collapse" aria-labelledby="heading_<?= $key ?>" data-parent="#accordion">
                        <div class="card-body">Answer:  <?= $value->answer ?>
                        </div>
                      </div>
                  </td> 
                </tr>
              <?php endforeach ?>
            <?php endif ?>
            
            
          </tbody>
        </table>
      </div>
    </main>

    
  </div>
</div>
