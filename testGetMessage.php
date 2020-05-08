<?php

        header("Content-type:application/json; charset=UTF-8");

        require "vendor/autoload.php";
        require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');


        $access_token = 'lMGsbFR4DBpd5t5u7AL31RqMxqM/tEe02YYOcf1TXOD1mprdXoPtkyRKbs+Q3APyFZVDLGZmxYXyZD7T1tvt0ztKmVRR73ngC3zduOM+r3qDohGFuNa5tV0aKp9M3GMFaPU3XEjPikIDPch8QLU0/QdB04t89/1O/w1cDnyilFU=';

        $content = file_get_contents('php://input');
        // Parse JSON
        $events = json_decode($content, true);

        // // Validate parsed JSON data
         if (!is_null($events['events'])) {
        //  // Loop through each event
            foreach ($events['events'] as $event) {
        //      // Reply only when message sent is in 'text' format
                if ($event['message']['text'] == 'ลงทะเบียน / ข้อมูลการลงทะเบียน') {
                    // Get text sent
                    //print_r($event);
                    $userId = $event['source']['userId'];
                    $text   = $event['message']['text'];
                    //$text = $event['source']['userId'];
                    // Get replyToken
                    $replyToken = $event['replyToken'];
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
                    
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_PROXY, PROXY);
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $encodeJson);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    
                    $result = curl_exec($ch);
                    $err = curl_error($ch);
                    curl_close($ch);

                    $datasReturn = array();
                    if ($err) {
                        $datasReturn['result'] = 'E';
                        $datasReturn['message'] = $err;
                    } else {
                        if($result == "{}"){
                            $datasReturn['result'] = 'S';
                            $datasReturn['message'] = 'Success';
                        }else{
                            $datasReturn['result'] = 'E';
                            $datasReturn['message'] = $result;
                        }
                    }
                    
                    print_r($datasReturn);

                    //echo $result . "\r\n";

                    //echo "OK";
                }else{

                    echo "FALSE NO ID";
                }
            }
        }else{
            echo "FALSE";
        }

    
?>
