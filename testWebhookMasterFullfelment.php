<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$access_token = 'lMGsbFR4DBpd5t5u7AL31RqMxqM/tEe02YYOcf1TXOD1mprdXoPtkyRKbs+Q3APyFZVDLGZmxYXyZD7T1tvt0ztKmVRR73ngC3zduOM+r3qDohGFuNa5tV0aKp9M3GMFaPU3XEjPikIDPch8QLU0/QdB04t89/1O/w1cDnyilFU=';

 $content = file_get_contents('php://input');
        // Parse JSON
        $event = json_decode($content, true);

                if ($event["queryResult"]["queryText"] == 'ลงทะเบียน / ข้อมูลการลงทะเบียน') {
                    $userId = $event['originalDetectIntentRequest']['payload']['data']['source']['userId'];
                    $text   = $event['originalDetectIntentRequest']['payload']['data']['source']['userId'];
                    //$text = $event['source']['userId'];
                    // Get replyToken
                    $replyToken = $event["responseId"];
                    // Build message to reply back
                    $datas = array();
                    $datas['type'] = 'text';
                    $datas['text'] = $userId;
                    // Make a POST Request to Messaging API to reply to sender
                    $url = 'https://api.line.me/v2/bot/message/reply';

                    $messages = array();
                    $messages['replyToken'] = $replyToken;
                    $messages['messages'][] = $datas;
                    $messages['notificationDisabled'] = false;
                    
                    $encodeJson = json_encode($messages);

                    $headers = array('content-type: application/json; charset=UTF-8'
                                    ,"cache-control: no-cache"
                                    , 'Authorization: Bearer ' . $access_token);
                    
			
			
		        $ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $encodeJson);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			
			$result = curl_exec($ch);
			curl_close($ch);
	echo $result . "\r\n";
//                     	$datasReturn = array();
			   
                    
                }else{

                    echo "FALSE NO ID";
                }
