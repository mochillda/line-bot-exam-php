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
                                  //--------------
                                 "line"=> array(
                                   "type": "flex",
                                     "altText": "Flex Message",
                                     "contents"=> array(
                                       "type": "bubble",
                                       "hero"=> array(
                                         "type"=> "image",
                                         "url"=> "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_3_movie.png",
                                         "size"=> "full",
                                         "aspectRatio"=> "20:13",
                                         "aspectMode"=> "cover",
                                         "action"=> array(
                                           "type"=> "uri",
                                           "label"=> "Action",
                                           "uri"=> "https://linecorp.com/"
                                         )
                                       ),
                                       "body"=> array(
                                         "type"=> "box",
                                         "layout"=> "vertical",
                                         "spacing"=> "md",
                                         "contents"=> [
                                           array(
                                             "type"=> "text",
                                             "text"=> "BROWN'S ADVENTURE\nIN MOVIE",
                                             "size"=> "xl",
                                             "gravity"=> "center",
                                             "weight"=> "bold",
                                             "wrap"=> true
                                           ),
                                           array(
                                             "type"=> "box",
                                             "layout"=> "baseline",
                                             "margin"=> "md",
                                             "contents"=> [
                                               array(
                                                 "type"=> "icon",
                                                 "url"=> "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png",
                                                 "size"=> "sm"
                                               ),
                                               array(
                                                 "type"=> "icon",
                                                 "url"=> "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png",
                                                 "size"=> "sm"
                                               ),
                                               array(
                                                 "type"=> "icon",
                                                 "url"=> "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png",
                                                 "size"=> "sm"
                                               ),
                                               array(
                                                 "type"=> "icon",
                                                 "url"=> "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png",
                                                 "size"=> "sm"
                                               ),
                                               array(
                                                 "type"=> "icon",
                                                 "url"=> "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gray_star_28.png",
                                                 "size"=> "sm"
                                               ),
                                               array(
                                                 "type"=> "text",
                                                 "text"=> "4.0",
                                                 "flex"=> 0,
                                                 "margin"=> "md",
                                                 "size"=> "sm",
                                                 "color"=> "#999999"
                                               )
                                             ]
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
                                                     "text"=> "Date",
                                                     "flex"=> 1,
                                                     "size"=> "sm",
                                                     "color"=> "#AAAAAA"
                                                   ),
                                                   array(
                                                     "type"=> "text",
                                                     "text"=> "Monday 25, 9:00PM",
                                                     "flex"=> 4,
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
                                                     "text"=> "Place",
                                                     "flex"=> 1,
                                                     "size"=> "sm",
                                                     "color"=> "#AAAAAA"
                                                   },
                                                   array(
                                                     "type"=> "text",
                                                     "text"=> "7 Floor, No.3",
                                                     "flex"=> 4,
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
                                                     "text"=> "Seats",
                                                     "flex"=> 1,
                                                     "size"=> "sm",
                                                     "color"=> "#AAAAAA"
                                                   ),
                                                   array(
                                                     "type"=> "text",
                                                     "text"=> "C Row, 18 Seat",
                                                     "flex"=> 4,
                                                     "size"=> "sm",
                                                     "color"=> "#666666",
                                                     "wrap"=> true
                                                   )
                                                 ]
                                               ),
                                                array(
                                                 "type"=> "box",
                                                 "layout"=> "vertical",
                                                 "margin"=> "xxl",
                                                 "contents"=> [
                                                   array(
                                                     "type"=> "spacer"
                                                   ),
                                                   array(
                                                     "type"=> "image",
                                                     "url"=> "https://scdn.line-apps.com/n/channel_devcenter/img/fx/linecorp_code_withborder.png",
                                                     "size"=> "xl",
                                                     "aspectMode"=> "cover"
                                                   ),
                                                   array(
                                                     "type"=> "text",
                                                     "text"=> "You can enter the theater by using this code instead of a ticket",
                                                     "margin"=> "xxl",
                                                     "size"=> "xs",
                                                     "color"=> "#AAAAAA",
                                                     "wrap"=> true
                                                   )
                                                 ]
                                               )
                                             ]
                                           )
                                         ]
                                       )
                                     )
                                        
                                          

                                  )
                                  //-------------

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
