<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/finalone.css">


<h1 class="coolfont"><?php echo $data['title']; ?></h1>
<p class="coolfont" style="font-size:25px;"> Created by Art Ahmetaj, Rinor Ahmeti,<a href="https://i.imgur.com/w6aICBb.jpg">Adi SYYYYLEJMANIII</a> dhe Samir Simnica </p>
<h3 class="titlefoto"> Fotoja e dites nga nasa </h3>
<p style="font-weight:bold;  font-size:20px;position:relative;left:500px;top:100px;"><?php echo $data['json']->{'title'}?></p>
<div style="width:500px;">
<p style="word-wrap:break-word; font-size:30px;position:relative;left:500px;top:100px;"><?php echo  getFirstLine($data['json']->{'explanation'})?></p>
<p style="font-style:italic; font-size:30px;position:relative;left:500px; top:100px;">Author: <?php echo $data['json']->{'copyright'}?></p>

</div>

<figure style="position:relative;left:70px;bottom:250px;">
  <img  src="<?php echo $data['json']->{'url'}?>" alt="Toucan photo by William Warby">
  <figcaption>
   
  </figcaption>
</figure>
<div>
<h3 class="corona">Corona Statistics</h3>
<div class="box">
  <div>
    <h5 class="confirmed">Totali te Konfirmuarve</h5>
    <p id="totalConfirmed"><span class="totalspan">20</span></p>
  </div>
  <div>
    <h5 class="dead"> Totali te vdekurve </h5>
    <p id="deadConfirmed">50</p>

  </div>
  <div>
    <h5 class="recovered">
      Totali i te sheruarve
    </h5>
    <p id="recv">23</p>
  </div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>