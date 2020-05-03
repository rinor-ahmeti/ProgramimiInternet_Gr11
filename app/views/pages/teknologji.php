<?php require APPROOT . '/views/inc/header.php'; ?>
  


<?php foreach($data['posts'] as $post) : ?>

       <img class="card-img-top" style="width:1100px;height:400px;"src="../public/img/coolphoto.jpeg" alt="Card image cap">
       <div class="card-body">
         <h2 class="card-title"><?php echo $post->title?></h2>
         <p class="card-text"><?php echo implode('.',$post->body)[0] ?></p>
         <a href="#" class="btn btn-primary">Read More &rarr;</a>
       </div>
       <div class="card-footer text-muted">
       Posted on<?php echo $post->created_at?> from <?php echo $post->user_id?>
         <a href="#">Start Bootstrap</a>
       </div>



  <?php endforeach; ?>




<?php require APPROOT . '/views/inc/footer.php'; ?>