<?php
// require "vendor/autoload.php";

function processMessage($update) {
//     if($update["queryResult"]["queryText"] != "ใช่"){
       if (isset($update["queryResult"]["queryText"])) {
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
                                          "type"=> "text",
                                          "text"=> $update['queryResult']['parameters']['codeId']."ลงทะเบียนสำเร็จ"//"ลงทะเบียนสำเร็จ"
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
          }else{
               sendMessage(array(
                   "source" => $update["responseId"],
                   "fulfillmentText"=> 'ข้อความที่จะตอบกลับแบบปกติ',
                   "fulfillmentMessages"=> [
                         array(
                           "platform"=> 'line',
                           "type"=> 4,
                           "payload"=> array(
                                
                               //--------------------------------------   
                                 "line"=> array(
                                        
                                         "type"=> "flex",
                                            "altText"=> "Flex Message",
                                            "contents"=> array(
                                              "type"=> "bubble",
                                              "direction"=> "ltr",
                                              "header"=> array(
                                                "type"=> "box",
                                                "layout"=> "vertical",
                                                "contents"=> array(
                                                  array(
                                                    "type"=> "text",
                                                    "text"=> "Header",
                                                    "align"=> "center"
                                                  )
                                                )
                                              ),
                                              "hero"=> array(
                                                "type"=> "image",
                                                "url"=> "https://developers.line.biz/assets/images/services/bot-designer-icon.png",
                                                "size"=> "full",
                                                "aspectRatio"=> "1.51:1",
                                                "aspectMode"=> "fit"
                                             ),
                                              "body"=> array(
                                                "type"=> "box",
                                                "layout"=> "vertical",
                                                "contents"=> array(
                                                  array(
                                                    "type"=> "text",
                                                    "text"=> "Body",
                                                    "align"=> "center"
                                                  )
                                                )
                                              ),
                                              "footer"=> array(
                                                "type"=> "box",
                                                "layout"=> "horizontal",
                                                "contents"=> array(
                                                  array(
                                                    "type"=> "button",
                                                    "action"=> array(
                                                      "type"=> "uri",
                                                      "label"=> "Button",
                                                      "uri"=> "https://linecorp.com"
                                                    )
                                                  )
                                                )
                                              )
                                           )
                                        
                                        
                                        

                                 )
                              //----------------------------------------
                                  
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
