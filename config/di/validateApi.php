<?php
/**
 * Configuration file for DI container.
 */
return [
    "services" => [
        "validateApi" => [
            "shared" => true,
            "callback" => function () {
                $validateApi = new \Anax\IpValidators\IpValidatorApi();
                return $validateApi;
            },
        ],
    ],
];
