<?php
namespace Anax\IpValidators;

class ExternalApi
{




    public function validateipActionGet($ipAdress = null, $accessKey = null) : string
    {


      // $url = "apikey.json";
      // $data = file_get_contents("http://" . $_SERVER["HTTP_HOST"] . "/dbwebb/ramverk1/me/redovisa/src/IpValidators/apikey.json");
      // $keytest = json_decode($data);
      //
      //
      // $accessKey = $keytest->api_key;
      // echo $accessKey;


          // http://api.ipstack.com/79.138.27.9?access_key=ae68fdd7e0843f6cbbaf81475db34e24
          $curlh  = curl_init('http://api.ipstack.com/'.$ipAdress.'?access_key='.$accessKey.'');
          curl_setopt($curlh, CURLOPT_RETURNTRANSFER, true);


          $json = curl_exec($curlh);
          curl_close($curlh);




          return $json;
    }


    public function validateipJsonActionGet($ipAdress = null, $accessKey = null) : array
    {

        // print_r($ipAdress);
        // $string = file_get_contents("apikey.json");
        // $json_a = json_decode($string, true);
        // echo $json_a;
        // $accessKey = $keytest->api_key;
          // Initialize CURL:

          // http://api.ipstack.com/79.138.27.9?access_key=ae68fdd7e0843f6cbbaf81475db34e24
          $curlh  = curl_init('http://api.ipstack.com/'.$ipAdress.'?access_key='.$accessKey.'');
          curl_setopt($curlh, CURLOPT_RETURNTRANSFER, true);

          // Store the data:
          $json = curl_exec($curlh);
          curl_close($curlh);
          print_r($json);
          // Decode JSON response:
          // $api_result = json_decode($json, true);
          $apiResult = json_decode($json, true);
          // Output the "capital" object inside "location"
          // print_r($api_result);

          return $apiResult;
    }
}
