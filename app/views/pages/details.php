<!-- Page Content -->
<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- Page Content -->
<div class="container">

<div class="row">

  <!-- Post Content Column -->
  <div class="col-lg-8">

    <!-- Title -->
    <h1  style="font-family: 'Bree Serif', serif;"class=" h3 mt-4"><?php echo $data['post']->title?></h1>

    <!-- Author -->
    <hr>

    <!-- Date/Time -->
    <p> <?php printf("Posted on %s",$data['post']->created_at);?></p>
    
    <hr>
    <!-- Preview Image -->
    <img style="width:900px;height:300px;" class="img-fluid rounded" src="<?php echo URLROOT .'/'.'img/'. $data['post']->image?>" alt="">

    <hr>

    <p style ="font-family: 'Lato', sans-serif;
"> <?php giveBreaks($data['post']->body)?></p>
<form  action="<?php echo URLROOT; ?>/pages/details/<?php echo $data['post']->id; ?>" method="POST">
    <input  name="download" type="submit" value="Shkarkoje Lajmin" class="btn btn-success">
  </form>

</form>

    <!-- Comments Form -->
    <div class="card my-4">
      <h5 class="card-header">Leave a Comment:</h5>
      <div class="card-body">
      <form  action="<?php echo URLROOT; ?>/pages/details/<?php echo $data['post']->id; ?>" method="POST">

          <div class="form-group">
            <textarea  name="mesazhi"class="form-control" rows="3"></textarea>
          </div>
         <input type="submit"  class="btn btn-primary" value="Submit Comment">
        </form>
      </div>
    </div>
<div style="visibility:hidden">
    Single Comment
    <div class="media mb-4">
      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
      <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
      </div>
    </div>

    <!-- Comment with nested comments -->
    <div class="media mb-4">
      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
      <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

        <div class="media mt-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

        <div class="media mt-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

      </div>
    </div>

  </div>
  </div>

  <!-- Sidebar Widgets Column -->
  <div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
      <h5 class="card-header">Search</h5>
      <div class="card-body">
    
          <input type="text"   onkeyup="showCustomer(this.value);" class="form-control" placeholder="Search for...">
         <button  class="btn btn-primary">Search</button>
          <span class="input-group-btn">
           
          </span>
</div>
    </div>

    <!-- Categories Widget -->
    <div  class="card my-4">
      <h5 class="card-header">Rezultati</h5>
    
<div id="txtHint"></div>

    </div>

    <!-- Side Widget -->
    <div class="card my-4">
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

  </div>

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<!-- /.container -->
<?php require APPROOT . '/views/inc/footer.php'; ?>