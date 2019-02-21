<?php
/**
 * Configuration file for DI container.
 */
 return [
     "services" => [
         "apikey" => [
             "shared" => true,
             "callback" => function () {
                 $dirs = "ae68fdd7e0843f6cbbaf81475db34e24";
                 return $dirs;
             },
         ],
     ],
 ];
