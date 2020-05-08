<?php

public function processMessage($update) {
       if (isset($update["queryResult"]["queryText"])) {
          if($update["queryResult"]["queryText"] == "ลงทะเบียน / ข้อมูลการลงทะเบียน"){
               $this->sendMessage(array(
                   "source" => $update["responseId"],
                   "fulfillmentText"=> 'ข้อความที่จะตอบกลับแบบปกติ',
                   "fulfillmentMessages"=> (
                         array(
                           "platform"=> 'line',
                           "type"=> 'buttons',
                           "payload"=> array(
                                          "line"=> array(
                                          "type"=> "text",
                                          "text"=> $update['originalDetectIntentRequest']['payload']['data']['source']['userId']  
                                       )
                            )
                         )
                       ),
                       "payload" => array(
                              "items"=>(
                                  array(
                                      "simpleResponse"=>
                                         array(
                                             "textToSpeech"=>"response from host"
                                              )
                                  )
                              ),
                       ),
               ));
          }
        }else{
            $this->sendMessage(array(
                "source" => $update["responseId"],
                "fulfillmentText"=> "Error",
                "payload" => array(
                    "items"=>(
                        array(
                            "simpleResponse"=>
                        array(
                            "textToSpeech"=>"Bad request"
                             )
                        )
                    ),
                    ),
               
            ));
            
        }
    }
 

        $update_response = file_get_contents('php://input');
        $update = json_decode($update_response, true);

        if (isset($update["queryResult"]["queryText"])) {
            $this->processMessage($update);
            $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
            fwrite($myfile, $update["queryResult"]["queryText"]);
            fclose($myfile);
        }else{
            $this->sendMessage(array(
                    "source" => $update["responseId"],
                    "fulfillmentText"=> $update["queryResult"]["queryText"],
                    "payload" => array(
                        "items"=>(
                            array(
                                "simpleResponse"=>
                            array(
                                "textToSpeech"=>"Bad request"
                                 )
                            )
                        ),
                        ),
                ));
        }
    

    public function sendMessage($parameters = array()) {
        echo json_encode($parameters);
    }   


?>
