<?php require APPROOT . '/views/inc/header.php'; ?>
  
<h1  id="titlepage"> <span id="borderspan"> Lajmet nga <?php  echo $data['title'];?></span></h1>

<?php foreach($data['posts'] as $post) : ?>
<br>
<div class="fancy-border bgr" style="width:900px;">
       <img class="card-img-top" style="width:800px;height:400px;"src="<?php echo URLROOT.'/' .'img/'.$post->image;?>" alt="Card image cap">
       <div class="card-body">
         <h2 class="card-title"><?php echo $post->title?></h2>
         <p class="card-text"><?php echo getFirstLine($post->body).'.';?></p>
         <a href="<?php echo URLROOT; ?>/pages/details/<?php echo $post->id;?> " class="btn btn-primary">Read More &rarr;</a>
       </div>
       <div class="card-footer text-muted">
       Posted on <?php echo $post->created_at?> 
       </div>
       </div>
<br>
  <?php endforeach; ?>
    <!-- Side Widget -->
    <style> #rightbox{ 
                float:right; 
                width:25%; 
                height:280px;}
                </style>
    
    <div class="card my-4" id="rightbox">

        <h5 class="card-header">Rubrikat tjera</h5>
        <div class="card-body">
          <p>
            <a href="http://localhost:8080/shareposts/pages/teknologji">Teknologji</a>
          </p>
          <p>
            <a href="http://localhost:8080/shareposts/pages/sport">Sport</a>
          </p>
          <p>
            <a href="http://localhost:8080/shareposts/pages/bote">Bote</a>
          </p>
          <p>
            <a href="http://localhost:8080/shareposts/pages/kulture">Kulture</a>
          </p>
        </div>
      </div>
     



<?php require APPROOT . '/views/inc/footer.php'; ?>