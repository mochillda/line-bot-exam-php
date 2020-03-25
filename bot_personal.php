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
                           "type"=> 'buttons',
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
          }else if($update["queryResult"]["queryText"] == "บัตร นศ."){
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
                                     "altText"=> "this is a buttons template",
                                     "template" => array(
                                              "type"=> "buttons",
                                              "actions"=> [
                                                array(
                                                  "type"=> "message",
                                                  "label"=> "บัตรนักศึกษา",
                                                  "text"=> "บัตรนักศึกษา"
                                                ),
                                                array(
                                                  "type"=> "message",
                                                  "label"=> "REG",
                                                  "text"=> "REG"
                                                ),
                                                array(
                                                  "type"=> "message",
                                                  "label"=> "E-Learnig",
                                                  "text"=> "E-Larnig"
                                                ),
                                                array(
                                                  "type"=> "message",
                                                  "label"=> "FFF",
                                                  "text"=> "FFF"
                                                )
                                              ],
                                              "thumbnailImageUrl"=> "https://huntscholarships.com/wp-content/uploads/2012/08/panyapiwat.jpg",
                                              "title"=> "ข้อมูลนักศึกษา",
                                              "text"=> "กรุณาเลือก"
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
          }else if($update["queryResult"]["queryText"] == "คำถาม"){
               sendMessage(array(
                   "source" => $update["responseId"],
                   "fulfillmentText"=> 'ข้อความที่จะตอบกลับแบบปกติ',
                   "fulfillmentMessages"=> [
                         array(
                           "platform"=> 'line',
                           "payload"=> array(
                                  
                                 "line"=> array(
                                    "type"=> "flex",
                                     "altText"=> "Flex Message",
                                     "contents"=> array(
                                       "type"=> "bubble",
                                       "hero"=> array(
                                         "type"=> "image",
                                         "url"=> "https://huntscholarships.com/wp-content/uploads/2012/08/panyapiwat.jpg",
                                         "size"=> "full",
                                         "aspectRatio"=> "20:13",
                                         "aspectMode"=> "cover",
                                         "action"=> array(
                                           "type"=> "uri",
                                           "label"=> "Line",
                                           "uri"=> "https://linecorp.com/"
                                         )
                                       ),
                                       "body"=> array(
                                         "type"=> "box",
                                         "layout"=> "vertical",
                                         "contents"=> [
                                           array(
                                             "type"=> "text",
                                             "text"=> "Q&A",
                                             "size"=> "xl",
                                             "weight"=> "bold"
                                           ),
                                           array(
                                             "type"=> "box",
                                             "layout"=> "vertical",
                                             "spacing"=> "sm",
                                             "margin"=> "lg",
                                             "contents"=> [
                                               array(
                                                 "type"=> "box",
                                                 "layout"=> "baseline",
                                                 "spacing"=> "sm",
                                                 "contents"=> [
                                                   array(
                                                     "type"=> "text",
                                                     "text"=> "คำอธิบาย",
                                                     "flex"=> 2,
                                                     "size"=> "sm",
                                                     "color"=> "#AAAAAA"
                                                   ),
                                                   array(
                                                     "type"=> "text",
                                                     "text"=>"คำถามที่นักศึกษาถามบ่อย",
                                                     "flex"=> 5,
                                                     "size"=> "sm",
                                                     "color"=> "#666666",
                                                     "wrap"=> true
                                                   )
                                                 ]
                                               ),
                                               array(
                                                 "type"=> "box",
                                                 "layout"=> "baseline",
                                                 "spacing"=> "sm",
                                                 "contents"=> [
                                                   array(
                                                     "type"=> "text",
                                                     "text"=> "กรุณาเลือก",
                                                     "flex"=> 2,
                                                     "size"=> "sm",
                                                     "color"=> "#AAAAAA"
                                                   ),
                                                   array(
                                                     "type"=> "text",
                                                     "text"=> "ตามหมวดหมู่",
                                                     "flex"=> 5,
                                                     "size"=> "sm",
                                                     "color"=> "#666666",
                                                     "wrap"=> true
                                                   )
                                                 ]
                                               )
                                             ]
                                           )
                                         ]
                                       ),
                                       "footer"=> array(
                                         "type"=> "box",
                                         "layout"=> "vertical",
                                         "flex"=> 0,
                                         "spacing"=> "sm",
                                         "contents"=> [
                                           array(
                                             "type"=> "spacer",
                                             "size"=> "sm"
                                           ),
                                           array(
                                             "type"=> "button",
                                             "action"=> array(
                                               "type"=> "message",
                                               "label"=> "ระบบ REG",
                                               "text"=> "ระบบ REG"
                                             )
                                           ),
                                           array(
                                             "type"=> "button",
                                             "action"=> array(
                                               "type"=> "message",
                                               "label"=> "ระบบ E-Learning",
                                               "text"=> "ระบบ E-Learning"
                                             )
                                           ),
                                           array(
                                             "type"=> "button",
                                             "action"=> array(
                                               "type"=> "message",
                                               "label"=> "ระบบ Internal Servic",
                                               "text"=> "ระบบ Internal Service"
                                             )
                                           ),
                                           array(
                                             "type"=> "button",
                                             "action"=> array(
                                               "type"=> "message",
                                               "label"=> "ระบบ PIM Application",
                                               "text"=> "ระบบ PIM Application"
                                             )
                                           ),
                                           array(
                                             "type"=> "button",
                                             "action"=> array(
                                               "type"=> "message",
                                               "label"=> "ระบบ Room Tracking",
                                               "text"=> "ระบบ Room Tracking"
                                             )
                                           )
                                         ]
                                       )
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
