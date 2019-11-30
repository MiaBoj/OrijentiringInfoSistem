<?php
include ( 'funkcije.php' );
include ( 'header.php' );

$konekcija = konekcija();
//kod za brisanje takmicara iz baze za takmicenje
if ( isset( $_GET['id'] ) ) {
    $korisnik = "SELECT id FROM korisnik WHERE korisnickoIme= '".$_SESSION['korisnickoIme']."'";
    $update = mysqli_query( $konekcija, $korisnik );
    $row = mysqli_fetch_assoc( $update );
    $idKorisnik = $row['id'];

    $takmicar = "SELECT id FROM `takmicari` where idKorisnik = $idKorisnik";
    $takmicarid = mysqli_query( $konekcija, $takmicar );
    $row = mysqli_fetch_assoc( $takmicarid );
    $idTakmicar = $row['id'];

    $takmicarid = mysqli_query( $konekcija, "DELETE FROM prijave WHERE idTakmicara=$idTakmicar" );
    $row = mysqli_fetch_assoc( $update );

    echo "<h3 class='text-center'>Odjavljeni ste sa takmicenja! ";

    echo' <a href="prijaveTakmicara.php" type="button" class="btn btn-primary btn-round">Povratak na prethodnu stranu</a></h3>';

} else {

    header( 'Location: prijaveTakmicara.php' );

}

?>
<?php
include ( 'footer.php' );

?>
