<?php
include ( 'funkcije.php' );

include ( 'header.php' );
?>
<?php
if ( !logovan() ) {
    echo 'Morate biti ulogovani da bi pristupili stranici!';
    include( 'footer.php' );
    return;
}

//prikaz takmicara iz klubova

echo '<div class="row">';
?>
<script>

function prikaziKlubove( str ) {
    if ( str.lenght == 0 ) {
        document.getElementById( 'detalji' ).innerHTML = '';
        return;
    }
    if ( window.XMLHttpRequest ) {
        objekat = new XMLHttpRequest();
    } else {
        objekat = new ActiveXObject( 'Microsoft.XMLHTTP' );
    }
    objekat.onreadystatechange = function() {
        if ( objekat.readyState == 4 && objekat.status == 200 ) {
            document.getElementById( 'detalji' ).innerHTML =
            objekat.responseText;
        }
    }
    objekat.open( 'GET', 'prikazKlubovi.php?id=' + str, true );
    objekat.send();
}

</script>
<?php

echo'<div class="col-md-4">';

echo '<strong>Takmicari:</strong> <br/>';
echo '<form>';
echo "<select name='korisnici'
onchange='prikaziKlubove(this.value)'>";
echo "<option value='0'>Odaberite klub</option>";
$upit = 'SELECT * FROM klubovi ';
$rezultat = mysqli_query( $konekcija, $upit );
while ( $row = mysqli_fetch_array( $rezultat ) ) {
    echo '<option value=' . $row['id'] . '>'.$row['naziv'].'</option>';
}
echo '</select> </form>';
echo'</div>';

?>
<br/>
<div id = 'detalji'> <b>  </b> </div>
<hr>

<?php

echo'</div>';
echo'<hr>';

echo 'Reset lozinke';

echo "<form method='POST' action ='#'>";

echo "<select name='korisnik'
 onchange='prikaziKorisnik(this.value)'>";
echo "<option value='0'>Odaberite korisnika</option>";
$upit = 'SELECT * FROM korisnik ';
$rezultat = mysqli_query( $konekcija, $upit );

while ( $row = mysqli_fetch_array( $rezultat ) ) {
    echo '<option value=' . $row['id'] . '>'.$row['ime'].'</option>';

}

echo " <br><input type='password' name='lozinka' ><br><input type='submit' name = 'submit' value='Izvrsi'></form>";

echo '</select> </form>';

if ( isset( $_POST['korisnik'] ) ) {
    $idKorisnik = $_POST['korisnik'];
    $result = "UPDATE `korisnik` SET `lozinka` = '".$_POST['lozinka']."' WHERE id = $idKorisnik";
    //update lozinke korisnika
    $update = mysqli_query( $konekcija, $result );

    echo 'Sifra je uspesno postavljena !<br><br>';

}
echo'<hr>';
?>

<?php
include ( 'footer.php' );
?>
