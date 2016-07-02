<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 *     Author        : Muhammad Surya Ihsanuddin
 *     Email        : mutofiyah@gmail.com
 *     FB            : http://facebook.com/AdenKejawen
 *     Since        : Version 1.X
 *     Copyright    : 2012@VinotiLivingGroup
 *
 *     This code is part of Vinoti Living Group report management tool
 * 
 *     Dilarang merubah apapun tanpa sepengetahuan author
 */
require_once APPPATH.'third_party/tcpdf/tcpdf'.EXT;
//require_once APPPATH.'third_party/tcpdf/examples/tcpdf_include'.EXT;
class Pdf extends TCPDF{
    
    public function __construct($orientation = 'P', $unit = 'cm', $format = 'A4', $unicode = TRUE, $encoding = 'UTF-8', $diskcache = FALSE, $pdfa = FALSE) {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);
        //define ('PDF_IMAGE_SCALE_RATIO', 6.25);
    }
    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}