<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;
use Fpdf\Fpdf;

class PDFFormat implements ProfileFormatter
{
    private $pdf;

    public function setData($profile)
    {
        $this->pdf = new Fpdf();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial', 'B', 16);

        $this->pdf->Cell(0, 10, 'The Founder: ' . $profile->getFullName(), 0, 1, 'C');

        $imagePath = $profile->getImageUrl() ?: 'default_image.jpg';
        $this->pdf->Image($imagePath, 60, 25, 90, 0, 'JPG'); // Image at (60, 25)
        
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->SetY(150); 
        $this->pdf->MultiCell(0, 5, $profile->getLifeEvents() ?? 'No information available');
        $this->pdf->Ln();
        
        $academics = $profile->getAcademics();
        $this->pdf->MultiCell(0, 5, (is_array($academics) ? implode(", ", $academics) : $academics));
        $this->pdf->Ln();

        $this->pdf->MultiCell(0, 5, $profile->getInstitutionVision());
        $this->pdf->Ln();

        $this->pdf->MultiCell(0, 5, $profile->getCampusDetails());
        $this->pdf->Ln();

        $this->pdf->MultiCell(0, 5, $profile->getTeamAndManagement());
        $this->pdf->Ln();

        $this->pdf->MultiCell(0, 5, $profile->getRebirthDetails());
        $this->pdf->Ln();
    }

    public function render()
    {
        // Output PDF to string (to save to file)
        return $this->pdf->Output();
    }
}
