

<div class="container-fluid">
  <div class="row">

    <?php include 'common/sidemenu.php'; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h3">Admin Dashboard</h3> 
      </div>
 
 
      <h4>All Questions</h4>
      <div class="table-responsive" id="accordion">
        <table id="example" class="table table-striped table-bordered" style="width:100%">

          <thead>
            <tr>
              <th>Id</th>
              <th>Questions</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($all_questions): ?>
              <?php foreach ($all_questions as $key => $value): ?>
                <tr>
                  <td><?= $value->id ?></td>
                  <td>
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_<?= $key ?>" aria-expanded="true" aria-controls="collapse_<?= $key ?>">
                         <?= $value->question ?>
                      </button>
                        <div id="collapse_<?= $key ?>" class="collapse" aria-labelledby="heading_<?= $key ?>" data-parent="#accordion">
                        <div class="card-body"> <b>Answer: </b> <?= $value->answer ?>
                        </div>
                      </div>
                  </td>
                  <td><a href="#"  class="  btn btn-sm <?= ($value->status)?"btn-warning":"btn-danger" ?>"><?= ($value->status)?"Open":"Close" ?></a></td> 
                  <td><a href="<?= base_url() ?>AdminDashboard/answer_question/<?= $value->id ?>" class="btn btn-sm btn-info">Answer/View</a></td>

                </tr>
              <?php endforeach ?>
            <?php endif ?>
            
            
          </tbody>
        </table>
      </div>
    </main>

    
  </div>
</div>
