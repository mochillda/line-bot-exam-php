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
                        "altText"=> "this is a carousel template",
                        "template"=> array(
                          "type"=> "carousel",
                          "imageAspectRatio"=> "rectangle",
                          "imageSize"=> "cover",
                          "columns"=> [
                            array(
                              "thumbnailImageUrl"=> "https://1.bp.blogspot.com/-U90M8DyKu7Q/W9EtONMCf6I/AAAAAAAAW_4/7L_jB_Rg9oweu2HKhULNdu9WNefw9zf9wCLcBGAs/s1600/sao-full.jpg",
                              "imageBackgroundColor"=> "#FFFFFF",
                              "title"=> "แผ่นเกม Sword Art Online",
                              "text"=> "แผ่นเกม Sword Art Online",
                              "defaultAction"=> array(
                                "type"=> "uri",
                                "label"=> "รายละเอียด",
                                "uri"=> "https://www.google.com/"
                              ),
                              "actions"=> [
                                array(
                                  "type"=> "postback",
                                  "label"=> "สั่งซื้อ",
                                  "data"=> "action=buy&itemid=111"
                                ),
                                array(
                                  "type"=> "postback",
                                  "label"=> "เพิ่มลงรถเข็น",
                                  "data"=> "action=add&itemid=111"
                                ),
                                array(
                                  "type"=> "uri",
                                  "label"=> "รายละเอียด",
                                  "uri"=> "https://www.google.com/"
                                )
                              ]
                            ),
                            array(
                              "thumbnailImageUrl"=> "https://2.bp.blogspot.com/-xAUbzdD07Z8/W9F4070M0JI/AAAAAAAAXAE/67QhUZB4TI4Xyu3GT2-DO0yA5XJtlij-ACLcBGAs/s1600/sao-os.jpg",
                              "imageBackgroundColor"=> "#FFFFFF",
                              "title"=> "Sword Art Online Ordinal Scale",
                              "text"=> "Sword Art Online Ordinal Scale",
                              "defaultAction"=> array(
                                "type"=> "uri",
                                "label"=> "รายละเอียด",
                                "uri"=> "https://www.google.com/"
                              ),
                              "actions"=> [
                                array(
                                  "type"=> "postback",
                                  "label"=> "สั่งซื้อ",
                                  "data"=> "action=buy&itemid=111"
                                ),
                                array(
                                  "type"=> "postback",
                                  "label"=> "เพิ่มลงรถเข็น",
                                  "data"=> "action=add&itemid=111"
                                ),
                                array(
                                  "type"=> "uri",
                                  "label"=> "รายละเอียด",
                                  "uri"=> "https://www.google.com/"
                                )
                              ]
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
