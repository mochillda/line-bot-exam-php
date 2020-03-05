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
                            "thumbnailImageUrl"=> "https://1.bp.blogspot.com/-U90M8DyKu7Q/W9EtONMCf6I/AAAAAAAAW_4/7L_jB_Rg9oweu2HKhULNdu9WNefw9zf9wCLcBGAs/s1600/sao-full.jpg",
                            "imageAspectRatio"=> "rectangle",
                            "imageSize"=> "cover",
                            "imageBackgroundColor"=> "#FFFFFF",
                            "title"=> "คุณคือ ธิดารัตน์ ภู่ระหงษ์ ใช่หรือไม่?",
                            "text"=> "กรุณายืนยัน",
                            "defaultAction"=> array(
                                "type"=> "uri",
                                "label"=> "View detail",
                                "uri"=> "https://www.google.com"
                            ),
                            "actions"=> [
                                array(
                                  "type"=> "postback",
                                  "label"=> "ใช่",
                                  "data"=> "action=buy&itemid=123"
                                ),
                                array(
                                  "type"=> "postback",
                                  "label"=> "ไม่ใช่",
                                  "data"=> "action=add&itemid=123"
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
 
$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
// print_r(json_encode($update));
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
