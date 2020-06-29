<?php
// require "vendor/autoload.php";

function processMessage($update) {
//     if($update["queryResult"]["queryText"] != "ใช่"){
       if (isset($update["queryResult"]["queryText"])) {
          if($update["queryResult"]["queryText"] == "card"){
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
    "type"=> "bubble",
    "body"=> array(
      "type"=> "box",
      "layout"=> "vertical",
      "contents"=> [
        array(
          "type"=> "box",
          "layout"=> "horizontal",
          "contents"=> [
            array(
              "type"=> "image",
              "url"=> "https://www.pim.ac.th/uploads/content/2015/10/o_1a21hj8a0g3h16gbh3kj1pqaja.png",
//               "flex"=> 5,
              "align"=> "start"
            ),
            array(
              "type"=> "image",
              "url"=> "https://campus.campus-star.com/app/uploads/2016/05/%E0%B8%9D%E0%B8%99-%E0%B8%A8%E0%B8%99%E0%B8%B1%E0%B8%99%E0%B8%98%E0%B8%89%E0%B8%B1%E0%B8%95%E0%B8%A3-%E0%B9%83%E0%B8%99%E0%B8%8A%E0%B8%B8%E0%B8%94%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2-%E0%B8%81%E0%B9%88%E0%B8%AD%E0%B8%99%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B8%88%E0%B8%9A%E0%B9%80%E0%B8%9B%E0%B9%87%E0%B8%99%E0%B8%9A%E0%B8%B1%E0%B8%93%E0%B8%91%E0%B8%B4%E0%B8%95%E0%B9%80%E0%B8%95%E0%B9%87%E0%B8%A1%E0%B8%95%E0%B8%B1%E0%B8%A7-1.jpg",
//               "flex"=> 6,
              "align"=> "end",
              "gravity"=> "center",
              "size"=> "full",
              "aspectRatio"=> "4:3",
              "aspectMode"=> "fit"
            )
          ]
        ),
        array(
          "type"=> "text",
          "text"=> "นางสาว พราวฤดี จันทร์โอสถ",
          "margin"=> "xl",
          "size"=> "sm",
          "align"=> "start",
          "weight"=> "bold"
        ),
        array(
          "type"=> "text",
          "text"=> "PRAOREUDEE JANOSOTH",
          "size"=> "xxs"
        ),
        array(
          "type"=> "text",
          "text"=> "คณะวิทยาการจัดการ สาขาการจัดการธุรกิจการบิน",
          "size"=> "xxs",
          "align"=> "start"
        ),
        array(
          "type"=> "text",
          "text"=> "管理科學學院 航空業務管理處",
  //         "flex"=> 5,
          "size"=> "xxs",
          "color"=> "#666666",
          "wrap"=> true
         ),
        array(
          "type"=> "box",
          "layout"=> "horizontal",
          "contents"=> [
            array(
              "type"=> "box",
              "layout"=> "vertical",
              "spacing"=> "sm",
              "margin"=> "lg",
              "contents"=> [
                array(
                  "type"=> "image",
                  "url"=> "https://www.telzel.com/know/barcode-image.gif",
                  "align"=> "center",
                  "gravity"=> "top",
                  "size"=> "full",
                  "aspectRatio"=> "20:13"
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
//       "flex"=> 0,
      "spacing"=> "sm",
      "contents"=> [
        array(
          "type"=> "box",
          "layout"=> "horizontal",
          "contents"=> [
            array(
              "type"=> "box",
              "layout"=> "vertical",
              "contents"=> [
               array(
                  "type"=> "text",
                  "text"=> "วันออกบัตร",
                  "size"=> "xs"
                ),
                array(
                  "type"=> "text",
                  "text"=> "25 ก.ค. 2563",
                  "size"=> "xs"
                )
              ]
            ),
            array(
              "type"=> "box",
              "layout"=> "vertical",
              "contents"=> [
                array(
                  "type"=> "text",
                  "text"=> "วันหมดอายุบัตร",
                  "size"=> "xs"
                ),
                array(
                  "type"=> "text",
                  "text"=> "25 ก.ค. 2567",
                  "size"=> "xs"
                )
              ]
             )
          ]
        ),
        array(
          "type"=> "spacer",
          "size"=> "sm"
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
                                       "actions"=> [
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
