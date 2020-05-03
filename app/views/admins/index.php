<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>users</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/admins/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add User
      </a>
    </div>
  </div>
  <?php foreach($data['users'] as $user) : ?>
    <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $user->name; ?></h4>
      <div class="bg-light p-2 mb-3">
       His email is  <?php echo $user->email; ?> and he was registered on  <?php echo $user->created_at; ?>
      </div>
      <p class="card-text"> ID <?php echo $user->id; ?></p>
      <a href="<?php echo URLROOT; ?>/admins/edit/<?php echo $user->id; ?>" class="btn btn-dark">More</a>
    </div>
  <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>