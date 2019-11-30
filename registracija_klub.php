<?php
include ( 'konekcija.php' );
include ( 'funkcije.php' );
include ( 'header.php' );
if ( !logovan() ) {
    echo 'Morate biti ulogovani da bi pristupili stranici!';
    include( 'footer.php' );
    return;
}

?>

<script>

function validacija() {
    var naziv = document.getElementById( 'skraceno' );

    if ( naziv.value == '' ) {
        alert( 'Morate popuniti sva polja!' );
        return false;
    } else {
        return true;
    }

    var skraceno = document.getElementById( 'skraceno' );

    if ( skraceno.value == '' ) {
        alert( 'Morate popuniti sva polja!' );
        return false;
    } else {
        return true;
    }

    var drzava = document.getElementById( 'drzava' );

    if ( drzava.value == '' ) {
        alert( 'Morate popuniti sva polja!' );
        return false;
    } else {
        return true;
    }

}

</script>

<?php

if ( isset( $_POST['naziv'] ) ) {
    $naziv = mysqli_real_escape_string( $konekcija, $_REQUEST['naziv'] );
    $skraceno = mysqli_real_escape_string( $konekcija, $_REQUEST['skraceno'] );

    $drzava = mysqli_real_escape_string( $konekcija, $_REQUEST['drzava'] );

    //unosenje podataka u bazu
    $formaKlubovi = "INSERT INTO klubovi (naziv, skraceno,drzava) VALUES ('$naziv', '$skraceno', '$drzava')";
    $primer = 'SELECT LAST_INSERT_ID() as id;';
    if ( $rezultat = mysqli_query( $konekcija, $formaKlubovi ) ) {
        $rezultat = mysqli_query( $konekcija, $primer );
        $row = mysqli_fetch_array( $rezultat );
        $id = $row['id'];
        $uredjivanje = "UPDATE `korisnik` SET `isKlub`='$id' where korisnickoIme = '".$_SESSION['korisnickoIme']."'";
        $rezultat1 = mysqli_query( $konekcija, $uredjivanje );
        $_SESSION['isKlub'] = $id;
        echo "<h3 class='text-center'>Uspesno poslati podaci!</h3>";
        echo '<h3 class="text-center"><a href="korisnickint.php" type="button"   class="btn btn-primary btn-round">Povratak na Profil</a>
               </h3>';
    } else {
        echo "Ne moze se izvrsiti: $formaKlubovi. " . mysqli_error( $konekcija );
    }

} else {
    echo '

<div class="card">
                
                <div class="card-body">
                  <form action="#" method="POST" onsubmit="return validacija()">
                    <div class="row">
                      <div class="col-md-5">
                           <label class="bmd-label-floating" required>Naziv kluba</label>
                          <input type="text" name="naziv" id ="naziv" class="form-control" required">
                        </div>
                       
                      <div class="col-md-5">
                           <label class="bmd-label-floating">Skraceni Naziv kluba</label>
                          <input type="text" name="skraceno" id="skraceno" class="form-control" >
                         
                      </div>
                       
                    </div>
                    <div class="row">
                    <div class="col-md-5">
                    <label class="bmd-label-floating">Drzava</label>
                    <input type="text" name="drzava" id="drzava" class="form-control">
                        
                      </div>
                       
                       
                    </div>
                     
					    
					 

                      <div class="col-md-5"></div>
					   
					  <div class="col-md-5"> <br>
                    <input type="submit" value="Registracija" class="btn btn-primary ">                 
                      
                    <a href="korisnickint.php" type="button"   class="btn btn-primary btn-round">Povratak na prethodnu stranu</a>
                    </div>
                 
                </div>
               
                </form>


				</div>
 
        </div>
';
}
include ( 'footer.php' );

?>

