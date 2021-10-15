<?php 
class pdf_receipt extends CI_Controller{
      function __construct() { 
 parent::__construct();
 } 
     function index()
 {
    $this->load->library('Pdf');
    $tcpdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
// set document information
    $tcpdf->SetCreator(PDF_CREATOR);
    $tcpdf->SetAuthor('Shiyan Su');
    $tcpdf->SetTitle('Donation Receipt');
    $tcpdf->SetSubject('TCPDF Feature');
    $tcpdf->SetKeywords('TCPDF, PDF, example, test, guide');
 
//set default header information
 
// $tcpdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,65,256), array(0,65,127));
// $tcpdf->setFooterData(array(0,65,0), array(0,65,127));
 
// //set header  textual styles
// $tcpdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// //set footer textual styles
// $tcpdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
//set default monospaced textual style
$tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// set default margins
$tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// Set Header Margin
$tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// Set Footer Margin
$tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// set auto for page breaks
$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
// set image for scale factor
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
// it is optional :: set some language-dependent strings
if (@file_exists(dirname(__FILE__).'/lang/eng.php'))
{
// optional
require_once(dirname(__FILE__).'/lang/eng.php');
// optional
$tcpdf->setLanguageArray($l);
}
 
// set default font for subsetting mode
$tcpdf->setFontSubsetting(true);
 
// Set textual style
// dejavusans is an UTF-8 Unicode textual style, on the off chance that you just need to
// print standard ASCII roasts, you can utilize center text styles like
// helvetica or times to lessen record estimate.
// $tcpdf->SetFont('dejavusans', '', 14, '', true);
 
// Add a new page
// This technique has a few choices, check the source code documentation for more data.
$tcpdf->AddPage();
 
// set text shadow for effect
$tcpdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,197,198), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
//Set some substance to print
 
$set_html = <<<EOD
 
<h1>Thanks for shopping on FOODMOJI!</h1>
<h2>This is your receipt.</h2>
<p></p>
<p>The products will be delivered soon. Hope we can bring more amazing experience for you.</p>
 
EOD;
 
//Print content utilizing writeHTMLCell()
$tcpdf->writeHTMLCell(0, 0, '', '', $set_html, 0, 1, 0, true, '', true);
 
// Close and yield PDF record
// This technique has a few choices, check the source code documentation for more data.
$tcpdf->Output(__DIR__ . 'FOODMOJI_ShoppingReceipt.pdf', 'FI');
// successfully created CodeIgniter TCPDF Integration
      }
}
?>