<?php
include ( 'funkcije.php' );
include ( 'header.php' );

// nakon logout korisnik mora biti logovan da bi imao pristup stranici
if ( !logovan() ) {
    echo 'Morate biti ulogovani da bi pristupili stranici!';
    include( 'footer.php' );
    return;
}

//Prikazivanje podataka logovanog takmicara i prijava za takmicenje

if ( isset( $_POST['submit'] ) ) {

    $korisnik = "SELECT id FROM korisnik WHERE korisnickoIme= '".$_SESSION['korisnickoIme']."'";
    $update = mysqli_query( $konekcija, $korisnik );
    $row = mysqli_fetch_assoc( $update );
    $idKorisnik = $row['id'];

    if ( isset( $_POST['ime'] ) ) {
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $brojCipa = $_POST['brojCipa'];
        $prijava = "UPDATE `takmicari` SET `ime`='".$ime."',`prezime`='".$prezime."', `brojCipa`='".$brojCipa."' WHERE  idKorisnik  = $idKorisnik ";
        $row = mysqli_query( $konekcija, $prijava );
    }

    //Unosenje prijave u bazu
    $takmicar = "SELECT id FROM `takmicari` where idKorisnik = $idKorisnik";
    $takmicarid = mysqli_query( $konekcija, $takmicar );
    $row = mysqli_fetch_assoc( $takmicarid );
    $idTakmicar = $row['id'];

    $forma = "INSERT INTO `prijave`(`idTakmicenja`, `idTakmicara`, `brojCipa`, `idKategorije`) VALUES (80 , '$idTakmicar', '".$_POST['brojCipa']."', '".$_POST['idKategorije']."')";

    if ( mysqli_query( $konekcija, $forma ) ) {
        echo "<h3 class='text-center'>Uspesno poslati podaci!</h3>";

    } else {
        echo "Ne moze se izvrsiti: $forma. " . mysqli_error( $konekcija );
    }

}
////kraj koda za prijave za takmicenje

$result = "SELECT *, takmicari.id as prikazTakmicara FROM `korisnik`,`takmicari` where `korisnik`.`idTakmicara`=`takmicari`.`id` and korisnik.korisnickoIme like '".logovan()."'";
$prikaz = mysqli_query( $konekcija, $result );
if ( $row = mysqli_fetch_assoc( $prikaz ) ) {
    $ime = $row['ime'];
    $prezime = $row['prezime'];
    $brojCipa = $row['brojCipa'];
    $registracioniBroj = $row['registracioniBroj'];

    echo'<form action="#" method="POST">
            <div class="row">
            
            <div class="col-md-1">
            <label class="bmd-label-floating">Reg. br</label>

        <input class="form-control mr-sm-2" type="text" name="regBroj"   aria-label="Search" value="'.$registracioniBroj.'">  </div>
        
            
            
            <div class="col-md-2">
            <label class="bmd-label-floating">Ime</label>

        <input class="form-control mr-sm-2" type="text" name="ime"   aria-label="Search" value="'.$ime.'">  </div>
        
        <div class="col-md-2">
        <label class="bmd-label-floating">Prezime</label>

        <input class="form-control mr-sm-2" type="text" name="prezime"   aria-label="Search" value="'.$prezime.'">  </div>
        
        <div class="col-md-1">
        <label class="bmd-label-floating">Br. cipa</label>

        <input class="form-control mr-sm-2" type="text" name="brojCipa"   aria-label="Search" value="'.$brojCipa.' ">  </div>
        <div class="col-md-2">  
        <label class="bmd-label-floating">Kategorije</label>
        <br>
         <select name="idKategorije" id="kategorije" class="form-control-label" ><option></option>';
    $kategorije = mysqli_query( $konekcija, 'SELECT * FROM `kategorije`' );
    while ( $row = mysqli_fetch_assoc( $kategorije ) ) {
        echo '
<option class="opcije" value="'.$row['id'].'">'.$row['naziv'].'</option>';
    }
    echo' 

</select> 	
        </div>
        </form>
        
        <div class="col-md-2">         <label class="bmd-label-floating">Akcije</label>


        
        <input type="submit" class="form-control " name ="submit" value="Prijavi se" class="btn btn-primary" style="
        background: #f76d22;
        color: white;
    "></button>                 
        </div>

        <div class="col-md-2">         <label class="bmd-label-floating">Akcije</label>


        
         <button class="form-control" >   <a href="brisanjeTakmicara.php?id=' . $row['id'] . '">Odjavi se</a>
    </button>                 
        </div>
         
        </div> <hr><hr> 
        
        
        <div class = "row">
        <div class="col-md-4">         

        
        <button class="form-control" style="
        background: mistyrose;border-color: cadetblue;
    " >   <a href="bgkup.php">Pregled prijava</a>
   </button>                 
       </div>   <div class="col-md-4">         

        
       <button class="form-control"  style="
       background: mistyrose;border-color: cadetblue;
   ">   <a href="galerija.php" target="_blank">Pregled karata</a>
  </button>  </div>  <div class="col-md-4">         

        
  <button class="form-control" style="
  background: mistyrose;border-color: cadetblue;
" >   <a href="korisnickint.php">Povratak na profil</a>
</button>                 
 </div>             
   </div>   </div>';
    //zavsetak div-a row klase

}
?>
<?php

include ( 'footer.php' );

?>
