<?php

class Report extends PDFGen{
    function generateItemReport($data=null){
        
        $content = '<h1>Item Sales Report</h1>
                    <table border="1">
                        <tr>
                            <th>Item Code</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>';
        
        foreach ($data as $item) {
            $content .= '<tr><td>' . $item['Itemcode'] . '</td><td>' . $item['Itemname'] . '</td><td>' . $item['Quantity'] . '</td><td>' . $item['Price'] . '</td><td>' . $item['Total'] . '</td></tr>';
        }

        $content .= '</table>';
        
         
        // Set headers for download
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment;filename="item_report.xls"');
    
        echo $content;
      
       
    }

    function generateOrderReport($data=null){
        
        $content = '<h1>Order Report</h1>
                    <table border="1">
                        <tr>';
                        
                // Dynamically generate table headers based on object properties
                        foreach ($data[0] as $key => $value) {
                            $content .= '<th>' . ucfirst($key) . '</th>'; // Assuming you want to capitalize the column names
                        }

                        $content .= '</tr>';

                        // Iterate through each object in the data array
                        foreach ($data as $order) {
                            $content .= '<tr>';
                            
                            // Iterate through each property of the object
                            foreach ($order as $key => $value) {
                                $content .= '<td>' . $value . '</td>';
                            }
                            
                            $content .= '</tr>';
                        }

                        $content .= '</table>';
        
         
        // Set headers for download
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment;filename="order_report.xls"');
    
        echo $content;
      
       
    }

    private function generateReport($content){
        $this->generatePDF($content);
    }
}


?>