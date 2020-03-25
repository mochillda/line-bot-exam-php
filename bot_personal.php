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
          }else if($update["queryResult"]["queryText"] == "คำถาม"){
               sendMessage(array(
                   "source" => $update["responseId"],
                   "fulfillmentText"=> 'ข้อความที่จะตอบกลับแบบปกติ',
                   "fulfillmentMessages"=> [
                         array(
                           "platform"=> 'line',
                           "type"=> 4,
                           "payload"=> array(
                                 "line"=> array(
                                     "type"=> "flex",
                "altText"=> "Flex Message",
                "contents"=> array(
                  "type": "carousel",
                  "contents"=> [
                    array(
                      "type"=> "bubble",
                      "hero"=> array(
                        "type"=> "image",
                        "url"=> "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_5_carousel.png",
                        "size"=> "full",
                        "aspectRatio"=> "20:13",
                        "aspectMode"=> "cover"
                      ),
                      "body"=> array(
                        "type"=> "box",
                        "layout"=> "vertical",
                        "spacing"=> "sm",
                        "contents"=> [
                          array(
                            "type"=> "text",
                            "text"=> "Arm Chair, White",
                            "size"=> "xl",
                            "weight"=>"bold",
                            "wrap"=> true
                          ),
                          array(
                            "type"=> "box",
                            "layout"=> "baseline",
                            "contents"=> [
                              array(
                                "type"=> "text",
                                "text"=> "$49",
                                "flex"=> 0,
                                "size"=> "xl",
                                "weight"=> "bold",
                                "wrap"=> true
                              ),
                              array(
                                "type"=> "text",
                                "text"=> ".99",
                                "flex"=> 0,
                                "size"=> "sm",
                                "weight"=> "bold",
                                "wrap"=> true
                              )
                            ]
                          )
                        ]
                      ),
                      "footer"=> array(
                        "type"=>"box",
                        "layout"=> "vertical",
                        "spacing"=> "sm",
                        "contents"=> [
                          array(
                            "type"=> "button",
                            "action"=> array(
                              "type"=> "uri",
                              "label"=> "Add to Cart",
                              "uri"=> "https://linecorp.com"
                            ),
                            "style"=> "primary"
                          ),
                          array(
                            "type"=> "button",
                            "action"=> array(
                              "type"=> "uri",
                              "label"=> "Add to whishlist",
                              "uri"=> "https://linecorp.com"
                            )
                          )
                        ]
                      )
                    ),
            array(
              "type"=> "text",
              "text"=> "Temporarily out of stock",
              "flex"=> 0,
              "margin"=> "md",
              "size"=> "xxs",
              "color"=> "#FF5551",
              "wrap"=> true
            )
          ]
        ),
        "footer"=> array(
          "type"=> "box",
          "layout"=> "vertical",
          "spacing"=> "sm",
          "contents"=> [
            (
              "type"=> "button",
              "action"=> array(
                "type"=> "uri",
                "label"=> "Add to Cart",
                "uri"=> "https://linecorp.com"
              ),
              "flex"=> 2,
              "color"=> "#AAAAAA",
              "style"=> "primary"
            ),
            array(
              "type"=> "button",
              "action"=> array(
                "type"=> "uri",
                "label"=> "Add to wish list",
                "uri"=> "https://linecorp.com"
              )
            )
          ]
        )
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
          }else{
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
                                                  "label"=> "EEE",
                                                  "text"=> "EEE"
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
