<?php
require "vendor/autoload.php";

function processMessage($update) {
    if($update["queryResult"]["queryText"] == "ใช่"){
        
        sendMessage(array(
            "source" => $update["responseId"],
            "fulfillmentText"=> 'ข้อความที่จะตอบกลับแบบปกติ',
            "fulfillmentMessages"=> [
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
//                                 "title"=> "คุณคือ ธิดารัตน์ ภู่ระหงษ์ ใช่หรือไม่?",
                                "title"=> $update,
                                "text"=> "กรุณายืนยัน",
    //                             "defaultAction"=> "",
                                "actions"=> [
                                    array(
                                      "type"=> "postback",
                                      "label"=> "ใช่",
                                      "data"=> "action=sendPostYes&itemid=123",
                                      "displayText"=>"ใช่"
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
    }else if($update["queryResult"]["queryText"] == "convert"){
        if($update["queryResult"]["parameters"]["outputcurrency"] == "USD"){
           $amount =  intval($update["queryResult"]["parameters"]["amountToConverte"]["amount"]);
           $convertresult = $amount * 360;
        }
         sendMessage(array(
            "source" => $update["responseId"],
            "fulfillmentText"=>"The conversion result is".$convertresult,
            "payload" => array(
                "items"=>[
                    array(
                        "simpleResponse"=>
                    array(
                        "textToSpeech"=>"The conversion result is".$convertresult
                         )
                    )
                ],
                ),
           
        ));
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
// print_r(json_encode($update));
if (isset($update["queryResult"]["queryText"])) {
    processMessage($update);
//     sendMessage(array(
//             "source" => $update["responseId"],
//             "fulfillmentText"=> $update,
//             "payload" => array(
//                 "items"=>[
//                     array(
//                         "simpleResponse"=>
//                     array(
//                         "textToSpeech"=>"Bad request"
//                          )
//                     )
//                 ],
//                 ),
           
//         ));
    
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
