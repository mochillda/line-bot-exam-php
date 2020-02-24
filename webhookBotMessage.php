<?php
echo "ddddddddddddddddddddd";
// function processMessage($update) {
//     if($update["queryResult"]["queryText"] == "yes"){
//         sendMessage(array(
//             "source" => $update["responseId"],
//             "fulfillmentText"=>$update['queryResult']['parameters']['codeId'],
//            // "fulfillmentText"=>$update['originalDetectIntentRequest']['payload']['data']['source']['userId'],
//             "payload" => array(
//                 "items"=>[
//                     array(
//                         "simpleResponse"=>
//                     array(
//                         "textToSpeech"=>"response from host"
//                          )
//                     )
//                 ],
//                 ),
           
//         ));
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
//     }else{
//         sendMessage(array(
//             "source" => $update["responseId"],
//             "fulfillmentText"=> "Error",
//             "payload" => array(
//                 "items"=>[
//                     array(
//                         "simpleResponse"=>
//                     array(
//                         "textToSpeech"=>"Bad request"
//                          )
//                     )
//                 ],
//                 ),
           
//         ));
        
//     }
// }
 
// function sendMessage($parameters) {
//     echo json_encode($parameters);
// }
 
// $update_response = file_get_contents("php://input");
// $update = json_decode($update_response, true);
// // print_r(json_encode($update));
// if (isset($update["queryResult"]["queryText"])) {
//     processMessage($update);
//     $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
//    fwrite($myfile, $update["queryResult"]["queryText"]);
//     fclose($myfile);
// }else{
//      sendMessage(array(
//             "source" => $update["responseId"],
//             "fulfillmentText"=> $update["queryResult"]["queryText"],
//             "payload" => array(
//                 "items"=>[
//                     array(
//                         "simpleResponse"=>
//                     array(
//                         "textToSpeech"=>"Bad request"
//                          )
//                     )
//                 ],
//                 ),
           
//         ));
// }


?>
//------------
