<?php
ob_start();

// pagina.php vai agora gerar um html dentro de um buffer
require './consultapdf.php';
require '../config/dompdf/autoload.inc.php';

$html = ob_get_clean();

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');

// Renderize o PDF
$dompdf->render();
// Gere o PDF
$dompdf->stream();
