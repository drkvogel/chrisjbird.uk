<?php
#tcpdf 
#new .php files redirect to information.com - nothing in logs
#don't know why; but the folder was world-writable - chmod go-w and it's OK
$tcdpf_base = realpath(dirname(__FILE__))."/../include/tcpdf_min";
//require_once("$tcdpf_base/config/lang/eng.php");
require_once("$tcdpf_base/tcpdf.php");
$pdf_html = file_get_contents("cv.php");
# http://stackoverflow.com/questions/8135975/why-is-tcpdf-image-smaller-than-it-should-be
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Chris Bird');
$pdf->SetTitle('Chris Bird CV');
$pdf->SetSubject('Chris Bird CV');
$pdf->SetKeywords('PDF, CV, PHP');
$pdf->setPrintHeader(false); // remove default header/footer
$pdf->setPrintFooter(false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, 10/*PDF_MARGIN_TOP*/, PDF_MARGIN_RIGHT);
#$pdf->SetAutoPageBreak(false, 0);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
//set some language-dependent strings
#$pdf->setLanguageArray($l);
$pdf->SetFont('Helvetica', '', 10);
$pdf->AddPage();
$pdf->writeHTML($pdf_html, false, 0, false, false);
$pdf->Output('chris-bird-cv.pdf', 'I'); //Close and output PDF document
// writeHTML (line 4449)
// Supports: h1, h2, h3, h4, h5, h6, b, u, i, a, img, p, br, strong, em, font, blockquote, li, ul, ol, hr, td, th, tr, table, sup, sub, small
// void writeHTML (string $html, [boolean $ln = true], int $fill, [boolean $reseth = false], [boolean $cell = false])
// string $html: text to display
// boolean $ln: add a new line after text (default = true)
// int $fill: background painted (1) or transparent (0). Default value: 0.
// boolean $reseth: reset the last cell height (default false).
// boolean $cell: add the default cMargin space to each Write (default false).
// $pdf_html = file_get_contents("cv.php");
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Chris Bird');
// $pdf->SetTitle('Chris Bird CV');
// #$pdf->SetSubject('Subject');
// $pdf->SetKeywords('PDF, CV, PHP');
// $pdf->setPrintHeader(false); // remove default header/footer
// $pdf->setPrintFooter(false);
// $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// #$pdf->setLanguageArray($l);
// #$pdf->SetFont('times', 'BI', 20);
// $pdf->AddPage();
// $pdf->writeHTML($pdf_html, false, 0, false, false);
// $pdf->Output('chris-bird-cv.pdf', 'I'); //Close and output PDF document
// print a block of text using Write()
#$pdf->Write($h=0, $txt, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, #$firstblock=false, $maxh=0);
#PDF output must be first and only output from PHP script
?>
