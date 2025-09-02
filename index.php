<?php
require 'vendor/autoload.php'; // charge TCPDF

//use TCPDF;

// Création du dossier documents s'il n'existe pas
$dir = __DIR__ . "/documents/";
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

// Génération d’un PDF simple


$pdf = new TCPDF();

// Désactiver header et footer automatiques
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();
$titre = "GENERATION D'UN PDF AVEC TCPDF";

// Titre
/*$pdf->SetFont('dejavusans','B', 16);
$pdf->Cell(0, 10, $titre, 1, 1, 'C');
$pdf->Cell(0, 10, ' ', 0, 1, 'C');

// Texte
$pdf->SetFont('helvetica', '', 12);
$pdf->MultiCell(0, 10, "Ceci est un texte très long qui sera automatiquement coupé et mis à la ligne.", 1, 'L', false, 1);
// Sauvegarde

*/
$val = "zero macabo" ;


$html = <<<EOD
<h2 style="text-align:center;">Liste des Stagiaires</h2>
<table border="1" cellpadding="6">
  <tr style="background-color:#d9edf7; font-weight:bold; text-align:center;">
    <th width="80">Nom</th>
    <th width="80">Prénom</th>
    <th width="100">Programme</th>
    <th width="80">Date Début</th>
    <th width="80">Date Fin</th>
    <th width="80">Statut</th>
  </tr>
  <tr>
    <td>Kameni</td>
    <td>Alice</td>
    <td>Dév. Web</td>
    <td>05/08/2025</td>
    <td>05/11/2025</td>
    <td>Confirmée</td>
  </tr>
  <tr>
    <td>Dupont</td>
    <td>Jean</td>
    <td>Réseaux</td>
    <td>12/08/2025</td>
    <td>12/11/2025</td>
    <td>En attente</td>
  </tr>
  <tr>
    <td>Smith</td>
    <td>Maria</td>
    <td>Infographie</td>
    <td>20/08/2025</td>
    <td>20/11/2025</td>
    <td>Confirmée</td>
  </tr>
</table>
EOD;

$pdf->writeHTML($html, true, false, true, false, '');

$pdfFile = $dir . "test4.pdf";
$pdf->Output($pdfFile, 'D');

echo "✅ PDF généré avec succès : $pdfFile";

