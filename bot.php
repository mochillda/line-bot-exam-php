<?php
 function processMessage($update) {
//     if($update["queryResult"]["queryText"] != "ใช่"){
     if (isset($update["queryResult"]["queryText"])) {
      if($update["queryResult"]["queryText"] == "ใช่"){
         sendMessage(array(
             "source" => $update["responseId"],
             "fulfillmentText"=> 'ข้อความที่จะตอบกลับแบบปกติ',
             "fulfillmentMessages"=> array(
               array(
                 "platform"=> 'line',
                 "type"=> 4,
                 "payload"=> array(
                  "line"=> array(
                      "type"=> "text",
                                          "text"=> $update['queryResult']['parameters']['codeId']."ลงทะเบียนสำเร็จ"//"ลงทะเบียนสำเร็จ"
                                      )
              )
             )
           ),
           "payload" => array(
             "items"=>array(
                 array(
                     "simpleResponse"=>
                     array(
                         "textToSpeech"=>"response from host"
                     )
                 )
             ),
         ),

       ));
     }else{
         sendMessage(array(
             "source" => $update["responseId"],
             "fulfillmentText"=> 'ข้อความที่จะตอบกลับแบบปกติ',
             "fulfillmentMessages"=> array(
               array(
                 "platform"=> 'line',
                 "type"=> 4,
                 "payload"=> array(
                   "line"=> array(
                     "type"=> "template",
                     "altText"=> "This is a buttons template",
                     "template"=> array(
                         "type"=> "buttons",
                         "thumbnailImageUrl"=> "https://huntscholarships.com/wp-content/uploads/2012/08/panyapiwat.jpg",
                         "imageAspectRatio"=> "rectangle",
                         "imageSize"=> "cover",
                         "imageBackgroundColor"=> "#FFFFFF",
                         "title"=> "คุณคือ ธิดารัตน์ ภู่ระหงษ์ ใช่หรือไม่?",
       //                                 "title"=> $update["queryResult"]["parameters"]["param-name"] ,//test11.test11-custom.test11-custom-yes

                         "text"=> "กรุณายืนยัน",
       //                              "defaultAction"=> "",
                         "actions"=> array(
                             array(
                               "type"=> "postback",
                               "label"=> "ใช่",
                               "data"=> "action=buy&itemid=12",
       //                                       "displayText"=>"ใช่"
                               "text"=>'ใช่'
                           ),
                             array(
                               "type"=> "postback",
                               "label"=> "ไม่ใช่",
                               "data"=> "action=add&itemid=123",
                               "displayText"=>"ไม่ใช่"
                           )
                         )
                     )
                 )

               )
             )
           ),
           "payload" => array(
             "items"=>array(
                 array(
                     "simpleResponse"=>
                     array(
                         "textToSpeech"=>"response from host"
                     )
                 )
             ),
         ),

       ));
     }
//     }else if($update["queryResult"]["queryText"] == "convert"){
//         if($update["queryResult"]["parameters"]["outputcurrency"] == "USD"){
//            $amount =  intval($update["queryResult"]["parameters"]["amountToConverte"]["amount"]);
//            $convertresult = $amount * 360;
//         }
//          sendMessage(array(
//             "source" => $update["responseId"],
//             "fulfillmentText"=>"The conversion result is".$convertresult,
//             "payload" => array(
//                 "items"=>[
//                     array(
//                         "simpleResponse"=>
//                     array(
//                         "textToSpeech"=>"The conversion result is".$convertresult
//                          )
//                     )
//                 ],
//                 ),

//         ));
 }else{
    sendMessage(array(
        "source" => $update["responseId"],
        "fulfillmentText"=> "Error",
        "payload" => array(
            "items"=>array(
                array(
                    "simpleResponse"=>
                    array(
                        "textToSpeech"=>"Bad request"
                    )
                )
            ),
        ),

    ));

}
}

function sendMessage($parameters) {
    echo json_encode($parameters);
}


function webhook($update=array()) {
    $update = $this->api->post();
    $update_response = file_get_contents("php://input");
    $update = json_decode($update_response, true);

    if (isset($update["queryResult"]["queryText"])) {
        $this->processMessage($update);
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $update["queryResult"]["queryText"]);
        fclose($myfile);
    }else{
        if(isset($update["queryResult"])){
            $this->sendMessage(array(
                "source" => $update["responseId"],
                "fulfillmentText"=> $update["queryResult"]["queryText"],
                "payload" => array(
                    "items"=> array(
                        array(
                            "simpleResponse"=>
                            array(
                                "textToSpeech"=>"Bad request"
                            )
                        )
                    ),
                ),
            ));                
        }else{
            $this->sendMessage(array(
                "source" => $update["responseId"],
                "fulfillmentText"=> "Error",
                "payload" => array(
                    "items"=>array(
                        array(
                            "simpleResponse"=>
                            array(
                                "textToSpeech"=>"ติดต่อพี่บวบ"
                            )
                        )
                    ),
                ),

            ));
        }
    }
} 

// $update_response = file_get_contents("php://input");
// $update = json_decode($update_response, true);

// if (isset($update["queryResult"]["queryText"])) {
//     processMessage($update);
//     $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
//     fwrite($myfile, $update["queryResult"]["queryText"]);
//     fclose($myfile);
// }else{
//    sendMessage(array(
//     "source" => $update["responseId"],
//     "fulfillmentText"=> $update["queryResult"]["queryText"],
//     "payload" => array(
//         "items"=>array(
//             array(
//                 "simpleResponse"=>
//                 array(
//                     "textToSpeech"=>"Bad request"
//                 )
//             )
//         ),
//     ),
// ));
// } 

?>
