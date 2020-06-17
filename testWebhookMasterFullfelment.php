<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'pvPYSIrSxg+1yLOJ9mRQRWgW6pE6GW84ew7cXGoVgpx8krUbOSTZeHOkj/qbvH8DkO/vbbWJKDEHi55gdlCl2QU8UIM4x7uAIY3tPTuJ6LJRtzm4TLcefTM5Fl3VHAy39c6V/XNP7Z+CZ2dKIAZZJwdB04t89/1O/w1cDnyilFU=';

$content = file_get_contents('php://input');
$event = json_decode($content, true);
// print_r($events);
		if ($event['queryResult']['queryText'] == 'ลงทะเบียน / ข้อมูลการลงทะเบียน') {

			$userId = $event['originalDetectIntentRequest']['payload']['data']['source']['userId'];
			$text = $event['originalDetectIntentRequest']['payload']['data']['source']['userId'];

			$replyToken = $event['originalDetectIntentRequest']['payload']['data']["replyToken"];

			$messages = [
				'type' => 'text',
				'text' => '999999'//$userId
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
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
		

