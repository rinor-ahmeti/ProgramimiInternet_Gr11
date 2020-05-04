<?php require APPROOT . '/views/inc/header.php'; ?>
  
<h1> Lajmet nga <?php  echo $data['title'];?></h1>

<?php foreach($data['posts'] as $post) : ?>
<br>
       <img class="card-img-top" style="width:1100px;height:400px;"src="<?php echo URLROOT.'/' .'img/'.$post->image;?>" alt="Card image cap">
       <div class="card-body">
         <h2 class="card-title"><?php echo $post->title?></h2>
         <p class="card-text"><?php echo getFirstLine($post->body).'.';?></p>
         <a href="<?php echo URLROOT; ?>/pages/details/<?php echo $post->id;?> " class="btn btn-primary">Read More &rarr;</a>
       </div>
       <div class="card-footer text-muted">
       Posted on <?php echo $post->created_at?> 
       </div>

<br>
  <?php endforeach; ?>




<?php require APPROOT . '/views/inc/footer.php'; ?>