<?php

include( 'funkcije.php' );
include( 'konekcija.php' );

$idKlubovi = $_GET['id'];

$prijava = "SELECT takmicari.id,takmicari.ime, takmicari.prezime, takmicari.registracioniBroj,takmicari.brojCipa,kategorije.naziv as kategorija, klubovi.naziv as klub FROM `takmicari`,`klubovi`, `kategorije` WHERE takmicari.idKlub = klubovi.id and klubovi.id = $idKlubovi and takmicari.idKategorije=kategorije.id";
$provera = mysqli_query( $konekcija, $prijava );

//takmicari moraju imati odredjen klub u polju idKlub
if ( $provera ) {
    echo '<table border=1>';
    echo '<tr> <th>Ime</th><th>Prezime</th><th>Klub</th><th>Registracioni klub</th><th>Broj Cipa</th><th>Kategorija</th><th>Akcije</th>   </tr>';
    while ( $row = mysqli_fetch_array( $provera ) ) {
        echo '<tr>';
        echo '<td>' . $row['ime'] . '</td>';
        echo '<td>' . $row['prezime'] . '</td>';
        echo '<td>' . $row['klub'] . '</td>';
        echo '<td>' . $row['registracioniBroj'] . '</td>';
        echo '<td>' . $row['brojCipa'] . '</td>';
        echo '<td>' . $row['kategorija'] . '</td>';
        echo '<td><a href="obrisi.php?id=' . $row['id'] . '">Ukloni</a></td>';

    }
}
echo '</tr>';

echo '</table>';
echo'</div>';

?>
