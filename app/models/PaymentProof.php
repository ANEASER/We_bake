<?php

    class PaymentProof extends Model {
        protected $table = 'paymentproofs';
        

        public function insertImage($initialOrFinal, $orderId, $base64Image) {
            $data = [
                'Type' => $initialOrFinal,
                'orderid' => $orderId,
                'proofdocument' => $base64Image,
            ];
    
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $query = "INSERT INTO $this->table ($columns) VALUES ($values)";
    
            return $this->query($query, $data);
        }
    }
?>