<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Edit Post</h2>
    <p>Create a post with this form</p>
    <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
      <div class="form-group">
        <label for="title">Title: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="image">Image: <sup>*</sup></label>
        <input type="file" name="image"> 
        <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="lloji">Lloji i lajmit: <sup>*</sup></label>
        <br>
        <select id="lloji" name="lloji">
        <option value="Teknologji">Teknologji</option>
        <option value="Kulture">Kulture</option>
        <option value="Bote">Bote</option>
        <option value="Sport">Sport</option>
        
        </select>
        <span class="invalid-feedback"><?php echo $data['lloji_err']; ?></span>
      </div>


      <div class="form-group">
        <label for="body">Body: <sup>*</sup></label>
        <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>