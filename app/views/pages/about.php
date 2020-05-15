<?php require APPROOT . '/views/inc/header.php'; ?>
  




<h1 class="coolfont"><?php echo $data['title']; ?></h1>
  <p class="coolfont" style="font-size:25px;"> Created by Art Ahmetaj, Rinor Ahmeti,<a href="https://i.imgur.com/w6aICBb.jpg">Adi SYYYYLEJMANIII</a> dhe Samir Simnica </p>
<!-- https://i.imgur.com/w6aICBb.jpg -->
  <p>Version: <strong><?php echo APPVERSION; ?></strong></p>
  <img src="../public/img/fotojakryesore.jpg" alt="Smiley face">
  <p class="coolfont" style="font-size:25px;">Nga e majta ne te djathte:Adi Sylejmani, Rinor Ahmeti, Samir Simnica dhe Art Ahmetaj </p>
<h3 class="corona">Corona Statistics</h3>
  <div class="box" >
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

<?php require APPROOT . '/views/inc/footer.php'; ?>