<?php require APPROOT . '/views/inc/header.php'; ?>
  




<h1 class="coolfont"><?php echo $data['title']; ?></h1>
  <p class="coolfont" style="font-size:25px;"> Bere nga Art Ahmetaj, Rinor Ahmeti,<a href="https://i.imgur.com/w6aICBb.jpg">Adi SYYYYLEJMANIII</a> dhe Samir Simnica </p>
<!-- https://i.imgur.com/w6aICBb.jpg -->
  <p>Version: <strong><?php echo APPVERSION; ?></strong></p>

<h3 class="corona">Corona Statistics</h3>
  <div class="box" >
<div>
<h5 class="confirmed">Totali te Konfirmuar</h5>
<p id="totalConfirmed"><span class="totalspan">20</span></p>
</div>
<div>
<h5 class="dead"> Totali te vdekur </h5>
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