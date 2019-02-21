<?php
/**
 * Configuration file for DI container.
 */
 return [
     "services" => [
         "ExternalApi" => [
             "shared" => true,
             "callback" => function () {
                 $validate = new \Anax\IpValidators\ExternalApi();
                 return $validate;
             },
         ],
     ],
 ];
