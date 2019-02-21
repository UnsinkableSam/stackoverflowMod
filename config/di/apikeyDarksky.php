<?php
/**
 * Configuration file for DI container.
 */
 return [
     "services" => [
         "apikeyDarkSky" => [
             "shared" => true,
             "callback" => function () {
                 $dirs = "87abcd4f5a83d4f77caf6be317702207";
                 return $dirs;
             },
         ],
     ],
 ];
