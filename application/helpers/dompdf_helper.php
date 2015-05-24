<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function pdf_create($html, $filename, $stream = TRUE) {
    require_once(APPPATH . 'helpers/dompdf/dompdf_config.inc.php');
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename . '.pdf');
    }
    else {
        file_put_contents(APPPATH.'pdf_courrier/'.$filename.'.pdf', $dompdf->output());
    }
}
?>