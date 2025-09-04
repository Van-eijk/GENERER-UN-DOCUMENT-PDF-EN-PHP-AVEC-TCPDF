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
//$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);
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


//Création d'une classe héritée
class MYPDF extends TCPDF {

    // En-tête
    public function Header() {
        // Logo
        $image_file = __DIR__.'/gestionclient.png'; // mets ton logo ici
        if (file_exists($image_file)) {
            $this->Image($image_file, 10, 4, 55, 10, 'PNG');
        }

        

        // Titre
        $this->SetFont('helvetica', 'B', 14);
        $this->Cell(0, 18, 'Mon Application - Liste des Stagiaires', 'B', 1, 'R');
        $this->Ln(5); // espace
    }

    // Pied de page
    public function Footer() {
        // Position à 15 mm du bas
        $this->SetY(-15);

        // Police
        $this->SetFont('helvetica', 'I', 10);

        date_default_timezone_set('Africa/Douala');
        $today = date('d/m/Y H:i');

        $this->Cell(0, 10, 'Document généré le' . ' ' . $today , 0, 0, 'L');


        // Numéro de page
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().' / '.$this->getAliasNbPages(), 0, 0, 'C');
    }
}

//  Utilisation de la classe
$pdf = new MYPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Moi');
$pdf->SetTitle('PDF avec en-tête et pied de page');

// Ajout de la page
$pdf->AddPage();

// Image

// Add Image
//$pdf->Image('gestionclient.png', 15, 10, 100, 20, 'PNG');

// Add Text
$pdf->SetY(40); // Move text below image
$pdf->SetFont('helvetica', '', 14);
$pdf->Cell(0, 10, 'Company Invoice', 0, 1, 'C');

// Contenu
$pdf->SetFont('dejavusans', '', 12);
/*$html = "<h2>Liste des Stagiaires</h2>
<p>Voici un exemple de document avec en-tête et pied de page.</p>";*/
$pdf->SetFont('helvetica', 'B', 15);
$pdf->Cell(0, 10, '' , 0, 1, 'L');

$pdf->Cell(0, 10, 'Document généré le' , 0, 1, 'L');
//$pdf->writeHTML($html, true, false, true, false, '');

$pdfFile = $dir . "test4.pdf";
$pdf->Output($pdfFile, 'D');

echo "✅ PDF généré avec succès : $pdfFile";
header('location:index.php');


