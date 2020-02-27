<?php
   header('Content-Type: application/json');
   $data = json_decode(file_get_contents('php://input'), true);
   $name = $data['from'];
   $res_data = $data['data'];
   $to = "n.salamatoff@gmail.com"; // Your Email
   
   // Message Heading
   $subject = "Вам отправили сообщение";
   
   // Email Template
   $message = "<h1>От: $name, <br> Данные: $res_data</h1>";
  
   $header = sprintf("From: %s \r\n", "no-reply@aristid.kz");
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";
   $retval = mail($to,$subject,$message,$header);
   // message Notification
   if( $retval == true ) {
      echo json_encode(array(
         'success'=> true,
         'message' => 'Message sent successfully'
      ));
   }else {
      echo json_encode(array(
         'error'=> true,
         'message' => 'Error sending message'
      ));
   }
?>
