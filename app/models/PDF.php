<?php

class PDF extends PDFGen{
    function generateReport($data=null){
        $content = '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                        </head>
                        <body style="text-align:center">
                            <h1>We Bake</h1>
                        </body>
                        </html>';
        $this->generatePDF($content);
    }
}


?>