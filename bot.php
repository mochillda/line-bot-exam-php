<?php

// include composer autoload
require "vendor/autoload.php";
// การตั้งเกี่ยวกับ bot
require_once('bot_settings.php');

///////////// ส่วนของการเรียกใช้งาน class ผ่าน namespace
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
//use LINE\LINEBot\Event;
//use LINE\LINEBot\Event\BaseEvent;
//use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\AudioMessageBuilder;
use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\ImagemapActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder ;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;
use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\MessageBuilder\ImagemapMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\DatetimePickerTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;

// เชื่อมต่อกับ LINE Messaging API
$access_token = 'lMGsbFR4DBpd5t5u7AL31RqMxqM/tEe02YYOcf1TXOD1mprdXoPtkyRKbs+Q3APyFZVDLGZmxYXyZD7T1tvt0ztKmVRR73ngC3zduOM+r3qDohGFuNa5tV0aKp9M3GMFaPU3XEjPikIDPch8QLU0/QdB04t89/1O/w1cDnyilFU=';
$httpClient = new CurlHTTPClient($access_token);
$bot = new LINEBot($httpClient, array('channelSecret' => 'c26ca6b94dd522e9c9440326215124a5'));

function processMessage($update) {
    if($update["queryResult"]["queryText"] == "ใช่"){
        sendMessage(array(
            "source" => $update["responseId"],
//             "fulfillmentText"=>$update['queryResult'],
            "fulfillmentText"=>$update['queryResult']['parameters']['codeId'],
           // "fulfillmentText"=>$update['originalDetectIntentRequest']['payload']['data']['source']['userId'],
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

// // คำสั่งรอรับการส่งค่ามาของ LINE Messaging API
// $content = file_get_contents('php://input');
 
// // แปลงข้อความรูปแบบ JSON  ให้อยู่ในโครงสร้างตัวแปร array
// $events = json_decode($content, true);
// if(!is_null($events)){
//     // ถ้ามีค่า สร้างตัวแปรเก็บ replyToken ไว้ใช้งาน
//     $replyToken = $events['events'][0]['replyToken'];
// }
// // ส่วนของคำสั่งจัดเตียมรูปแบบข้อความสำหรับส่ง
// $textMessageBuilder = new TextMessageBuilder(json_encode($events));
 
// //l ส่วนของคำสั่งตอบกลับข้อความ
// $response = $bot->replyMessage($replyToken,$textMessageBuilder);
// if ($response->isSucceeded()) {
//     echo 'Succeeded!';
//     return;
// }
 
// // Failed
// echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
