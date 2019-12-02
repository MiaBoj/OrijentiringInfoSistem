<?php

include ('funkcije.php');

include ('header.php');

 

 ?>                     
  
<!--drugi deo-->
<div class="takmicenjaForma">
<div class="row">
 <div class="col-sm-12 col-lg-9">
 <div class="card" style="height: 106%;">
<h5 style="margin-left: 42px;color: #f76d22;margin-top: 7px;">PTT Kup</h5>
</div>
</div>
<div class="col-sm-6 col-lg-3">
<?php if (logovan()) {
echo '<form action="prijaveTakmicara1.php?id=53"><input type="submit" value="Prijava" class="btn btn-primary btn-block"></form> ';
} else{
  echo ' 
 <button value="Logujte se" class="btn btn-primary btn-block">Loguj se za prijavu!</button> ';
}
?></div>
</div>
<br>
<div class="row">
   <div class="col-sm-6 col-lg-3">
     <div class="card"><!----><!---->
      <div class="card-body">
         <div class="text-center">
            <code>Datum</code><br><code>17.09.2019</code>
            </div>
            </div>
<!----></div>
</div>
<div class="col-sm-6 col-lg-3">
      <div class="card"><!----><!---->
        <div class="card-body">
                 <div class="text-center"><code>Mesto</code><br><code>Divcibare</code>
                 </div>
                 </div>
<!----></div>
</div>
<div class="col-sm-6 col-lg-3">
     <div class="card"><!----><!---->
        <div class="card-body">
        <div class="text-center"><code>Organizator</code><br><code>PSD Kopaonik</code>
        </div>
        </div><!---->
        </div>
        </div>
<div class="col-sm-6 col-lg-3">
<div class="card"><!----><!---->
<div class="card-body">
<div class="text-center"><code>Distanca</code><br><code>Duga</code>
</div>
</div><!---->
</div>
</div>
</div>
<hr>

</div>
<!--treci deo-->
<div class="takmicenjaForma">
<div class="row">
 <div class="col-sm-12 col-lg-9">
 <div class="card" style="height: 106%;">
<h5 style="margin-left: 42px;color: #f76d22;margin-top: 7px;">BG Kup</h5>
</div>
</div>
<div class="col-sm-6 col-lg-3">
<?php if (logovan()) {
echo '<input type="submit" value="Prijava" class="btn btn-primary btn-block"> ';
} else{
  echo ' 
 <button value="Logujte se" class="btn btn-primary btn-block">Loguj se za prijavu!</button> ';
}
?></div>
</div>
<br>
<div class="row">
   <div class="col-sm-6 col-lg-3">
     <div class="card"><!----><!---->
      <div class="card-body">
         <div class="text-center">
            <code>Datum</code><br><code>16.09.2019</code>
            </div>
            </div>
<!----></div>
</div>
<div class="col-sm-6 col-lg-3">
      <div class="card"><!----><!---->
        <div class="card-body">
                 <div class="text-center"><code>Mesto</code><br><code>Beograd</code>
                 </div>
                 </div>
<!----></div>
</div>
<div class="col-sm-6 col-lg-3">
     <div class="card"><!----><!---->
        <div class="card-body">
        <div class="text-center"><code>Organizator</code><br><code>PSD Kopaonik</code>
        </div>
        </div><!---->
        </div>
        </div>
<div class="col-sm-6 col-lg-3">
<div class="card"><!----><!---->
<div class="card-body">
<div class="text-center"><code>Distanca</code><br><code>Srednja</code>
</div>
</div><!---->
</div>
</div>
</div>
<hr>

</div>

 
</div>
  <?php

include('footer.php');

?>
