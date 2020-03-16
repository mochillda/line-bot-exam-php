<?php

function processMessage($update) {
       if (isset($update["queryResult"]["queryText"])) {
          if($update["queryResult"]["queryText"] == "บัตร นศ."){
                                       "imageSize"=> "cover",
                                       "imageBackgroundColor"=> "#FFFFFF",
                                       "title"=> "คุณคือ ธิดารัตน์ ภู่ระหงษ์ ใช่หรือไม่?",
                                       "text"=> "กรุณายืนยัน",
                                       "actions"=> [
                                           array(
                                             "type"=> "postback",
                                             "label"=> "ใช่",
                                             "data"=> "action=buy&itemid=12",
                                              "text"=>'ใช่'
                                           ),
                                           array(
                                             "type"=> "postback",
                                             "label"=> "ไม่ใช่",
                                             "data"=> "action=add&itemid=123",
                                             "displayText"=>"ไม่ใช่"
                                           )
                                       ]
                                   )
                                 )

                           )
                         )
                       ],
                   "payload" => array(
                       "items"=>[
                           array(
                               "simpleResponse"=>
                           array(
                               "textToSpeech"=>"response from host"
                                )
                           )
                       ],
                       ),

               ));
          }
    }else{
        sendMessage(array(
            "source" => $update["responseId"],
            "fulfillmentText"=> "Error",
            "payload" => array(
                "items"=>[
                    array(
                        "simpleResponse"=>
                    array(
                        "textToSpeech"=>"Bad request"
                         )
                    )
                ],
                ),
           
        ));
        
    }
}
 
function sendMessage($parameters) {
    echo json_encode($parameters);
}

function sendPostYes($parameters) {
         sendMessage(array(
            "source" => $update["responseId"],
            "fulfillmentText"=>$update['queryResult']['parameters']['codeId'],
            "payload" => array(
                "items"=>[
                    array(
                        "simpleResponse"=>
                    array(
                        "textToSpeech"=>"response from host"
                         )
                    )
                ],
                ),
           
        ));
}
 
$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);

if (isset($update["queryResult"]["queryText"])) {
    processMessage($update);
    $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $update["queryResult"]["queryText"]);
    fclose($myfile);
}else{
     sendMessage(array(
            "source" => $update["responseId"],
            "fulfillmentText"=> $update["queryResult"]["queryText"],
            "payload" => array(
                "items"=>[
                    array(
                        "simpleResponse"=>
                    array(
                        "textToSpeech"=>"Bad request"
                         )
                    )
                ],
                ),
        ));
}

?>
