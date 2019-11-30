<?php
include ( 'funkcije.php' );
include ( 'header.php' );

?>
<?php

//definisanje varijable za ubacivanje novog takmicara iz kluba koji je registrovan na sajtu
$result = "SELECT *, klubovi.id as prikazKlub FROM `korisnik`,`klubovi` where `korisnik`.`isKlub`=`klubovi`.`id` and korisnik.korisnickoIme like '".logovan()."'";
$prikaz = mysqli_query( $konekcija, $result );
$row = mysqli_fetch_assoc( $prikaz );
$idKLub = $row['id'];

if ( isset( $_POST['button'] ) ) {
    $klub = "SELECT id FROM `klubovi` WHERE id=$idKLub ";
    $klubovi = mysqli_query( $konekcija, $klub );
    $row = mysqli_fetch_array( $klubovi );

    $klubId = $row['id'];
    //definisanje varijable za id kluba

    //unosenje podataka u bazu
    $forma = "INSERT INTO `takmicari`(`ime`, `prezime`, `brojCipa`, `idKategorije`,`idKlub`, `registracioniBroj`) VALUES ('".$_POST['ime']."', '".$_POST['prezime']."', '".$_POST['brojCipa']."', '".$_POST['idKategorije']."','$klubId', '".$_POST['registracioniBroj']."')";

    if ( mysqli_query( $konekcija, $forma ) ) {
        echo "<h3 class='text-center'>Uspesno poslati podaci!</h3>";
        echo '<h3 class="text-center"><a href="klubint.php" type="button"   class="btn btn-primary btn-round">Povratak na Profil</a>
                          </h3>';
    } else {
        echo "Ne moze se izvrsiti: $forma. " . mysqli_error( $konekcija );
    }

} else {
    echo '

<div class="card">
                
                <div class="card-body">
                  <form action="#" method="POST">
                    <div class="row">
                      <div class="col-md-5">
                           <label class="bmd-label-floating">Ime</label>
                          <input type="text" name="ime" class="form-control" >
                        </div>
                       
                      <div class="col-md-5">
                           <label class="bmd-label-floating">Prezime</label>
                          <input type="text" name="prezime" class="form-control">
                         
                      </div>
                       
                    </div>
                    <div class="row">
                    <div class="col-md-5">
                           <label class="bmd-label-floating">Broj cipa</label>
                          <input type="text" name="brojCipa" class="form-control">
                        
                      </div>
                      <div class="col-md-5">
                      <label class="bmd-label-floating">Kategorija</label>
                      <br>
                      <select name="idKategorije" id="kategorije" class="form-control-label" >';
    $kategorije = mysqli_query( $konekcija, 'SELECT * FROM `kategorije`' );
    while ( $row = mysqli_fetch_assoc( $kategorije ) ) {
        echo '
<option class="opcije" value="'.$row['id'].'">'.$row['naziv'].'</option>';
    }
    echo' 

</select> 	

                      </div>
                       
                    </div>
                    <div class="row">
                    
                     
                   
					 

                      <div class="col-md-5">
                      <label class="bmd-label-floating">Registracioni broj</label>
                      <input type="text" name="registracioniBroj" class="form-control">  
                        
            </div>
            
					  
                     </div>
                  <br>
                    <input type="submit" name="button" value="Registracija" class="btn btn-primary ">             
                      
                 
                </div>
               
                </form>



 
        </div>
';
}
?>
<?php
include ( 'footer.php' );

?>
