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
$pdf->AddPage();

// Titre
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Signing VAN 🚀', 0, 1, 'C');

// Texte
$pdf->SetFont('helvetica', '', 12);
$pdf->MultiCell(0, 10, "Ceci est un test de génération de PDF avec TCPDF.\nSi tu vois ce fichier, ça veut dire que TCPDF fonctionne bien ✅", 0, 'L');

// Sauvegarde
$pdfFile = $dir . "test.pdf";
$pdf->Output($pdfFile, 'F');

echo "✅ PDF généré avec succès : $pdfFile";