<?php 

require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class PDFGen{
    function generatePDF($content) {

        
        $options = new Options();
        $options->setChroot(__DIR__);


        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($content);

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
    }
}

?>