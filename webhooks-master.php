<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'lMGsbFR4DBpd5t5u7AL31RqMxqM/tEe02YYOcf1TXOD1mprdXoPtkyRKbs+Q3APyFZVDLGZmxYXyZD7T1tvt0ztKmVRR73ngC3zduOM+r3qDohGFuNa5tV0aKp9M3GMFaPU3XEjPikIDPch8QLU0/QdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == 'id') {
			// Get text sent/
			//print_r($event);
			$userId = $event['source']['userId'];
			$text = $event['message'][0]['text'];
			//$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
// 				'text' => "wowwwww"
				'text' => $userId
// 				'text' => $userId
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				//'messages' => "wowwwww",
				'messages' => [$messages],
			];
			print_r( $data );
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
		if ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == 'lo' ) {
			$userId = $event['source']['userId'];
			//$text = '35.65910807942215,139.70372892916203';
			$replyToken = $event['replyToken'];
			$text = $replyToken;
			print_r($event);
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			//print_r( $data );
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";

		}
	}
}
echo "OK";