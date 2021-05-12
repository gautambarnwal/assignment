

<div class="container-fluid">
  <div class="row">

    <?php include 'common/sidemenu.php'; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h3">Admin Dashboard</h3> 
      </div>
 
 
      <h4>All Users</h4>
      <div class="table-responsive" id="accordion">
        <table id="example" class="table table-striped table-bordered" style="width:100%">

          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Region</th>
              <th>Country</th>
              <th>Division</th>
              <th>Created at</th>  
            </tr>
          </thead>
          <tbody>
            <?php if ($all_users): ?>
              <?php foreach ($all_users as $key => $value): ?>
                <tr>
                  <td><?= $value->user_id ?></td>
                  <td><?= $value->name ?></td>
                  <td><?= $value->email ?></td>
                  <td><?= $value->region ?></td>
                  <td><?= $value->country ?></td>
                  <td><?= $value->division ?></td>
                  <td><?= $value->created_at ?></td>
                </tr>
              <?php endforeach ?>
            <?php endif ?>
            
            
          </tbody>
        </table>
      </div>
    </main>

    
  </div>
</div>
