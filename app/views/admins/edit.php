<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/admins/index" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Edit User</h2>
    <p>Edit a user with this form</p>
    <form action="<?php echo URLROOT; ?>/admins/edit/<?php echo $data['id']; ?>" method="post">
      <div class="form-group">
        <label for="name">Name: <sup>*</sup></label>
        <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="email">Email: <sup>*</sup></label>
        <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">       
        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
      </div>

      <div class="form-group">
        <label for="body">Password: <sup>*</sup></label>
        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">       
        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
    
    <form class="pull-right" action="<?php echo URLROOT; ?>/admins/delete/<?php echo $data['id']; ?>" method="post">
 
    <input  style="position:relative; bottom:38px;left:100px;"type="submit" value="Delete" class="btn btn-danger ">
   
  </form> 
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
