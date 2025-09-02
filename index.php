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

$html = <<<EOD
<h1 style="color:navy;">Bonjour TCPDF 🚀</h1>
<p>Ceci est un <b>test simple</b> de génération de PDF à partir d'HTML.</p>
<p style="color:green;">On peut utiliser des <i>styles CSS simples</i> comme la couleur, la taille, etc.</p>
EOD;

$pdf->writeHTML($html, true, false, true, false, '');

$pdfFile = $dir . "test4.pdf";
$pdf->Output($pdfFile, 'D');

echo "✅ PDF généré avec succès : $pdfFile";

