<?php
include( 'funkcije.php' );
include( 'konekcija.php' );

$idTakmicenja = $_GET['id'];

$prijava = "SELECT takmicari.ime, takmicari.prezime, kategorije.naziv as kategorije, prijave.brojCipa, klubovi.naziv as klub FROM `prijave`, `takmicenje`,`takmicari`,`kategorije`,`klubovi` WHERE prijave.idTakmicenja = takmicenje.id AND prijave.idTakmicenja = $idTakmicenja AND prijave.idTakmicara = takmicari.id AND prijave.idKategorije=kategorije.id and takmicari.idKlub=klubovi.id";
$provera = mysqli_query( $konekcija, $prijava );

//takmicari moraju imati odredjen klub u polju idKlub
if ( $provera ) {
    echo '<table border=1>';
    echo '<tr> <th>Ime</th><th>Prezime</th><th>Kategorija</th><th>Broj cipa</th><th>Klub</th>   </tr>';
    while ( $row = mysqli_fetch_array( $provera ) ) {
        echo '<tr>';
        echo '<td>' . $row['ime'] . '</td>';
        echo '<td>' . $row['prezime'] . '</td>';
        echo '<td>' . $row['kategorije'] . '</td>';
        echo '<td>' . $row['brojCipa'] . '</td>';
        echo '<td>' . $row['klub'] . '</td>';

    }
}
echo '</tr>';

echo '</table>';

?>