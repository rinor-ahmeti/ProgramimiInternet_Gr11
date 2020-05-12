<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-flud text-center">
  <div class="container">
    <!-- tu ja nis carousel -->
    <h1 id="maintext">Mireserdhet ne PIK!</h1>
   

    <div id="carouselExampleIndicators"  class="carousel slide mt-3" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class=" carousel-foto d-block w-100" src="<?php echo URLROOT ?>/img/<?php echo $data['posts'][returnMax(unserialize($_COOKIE['user']))]->image ?>" alt="First slide">
          <div class="shadowbackground carousel-caption d-none d-md-block">
            <h5 class="black"><?php echo $data['posts'][returnMax(unserialize($_COOKIE['user']))]->title ?></h5>
            <p class="black info"><?php echo  getFirstLine($data['posts'][returnMax(unserialize($_COOKIE['user']))]->body) . '.' ?></p>
          </div>
        </div>
        <div class="carousel-item">
          <img class=" carousel-foto d-block w-100" src="<?php echo URLROOT ?>/img/<?php echo $data['posts'][$data['indexes'][0]]->image ?>" alt="Second slide">
          <div class="shadowbackground carousel-caption d-none d-md-block">
            <h5 class="black"><?php echo $data['posts'][$data['indexes'][0]]->title ?></h5>
            <p class="black info"><?php echo getFirstLine($data['posts'][$data['indexes'][0]]->body) ?></p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="carousel-foto d-block w-100" src="<?php echo URLROOT ?>/img/<?php echo $data['posts'][$data['indexes'][1]]->image ?>?>" alt="Third slide">
          <div class="shadowbackground carousel-caption d-none d-md-block">
            <h5 class="black"><?php echo $data['posts'][$data['indexes'][1]]->title ?></h5>
            <p class="black info"><?php echo getFirstLine($data['posts'][$data['indexes'][1]]->body) ?></p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- qitu kryhet -->



  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>