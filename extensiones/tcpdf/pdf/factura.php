<?php

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF

	<table>

		<tr>
			<td  style = "width:150px"><img src="images/logo-negro-bloque.png"></td>
		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

//salida del archivo
$pdf ->Output('factura.pdf');

?>