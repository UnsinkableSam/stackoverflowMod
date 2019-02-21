<?php
namespace Anax\IpValidators;

class InternalValidator
{



    public function validateLocalActionGet($ipAdress = null) : array
    {

        $ipInfo["IP"] = $ipAdress;

        if (filter_var($ipAdress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $ipInfo["Type"] = "Valid IPv4";
            $ipInfo["Domain"] = gethostbyaddr($ipAdress);
            $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
            return [$ipInfoJson];
        } else {
            if (filter_var($ipAdress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                $ipInfo["Type"] = "Valid IPv6";
                $ipInfo["Domain"] = gethostbyaddr($ipAdress);
                $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
                return [$ipInfoJson];
            }
        }
          $ipInfo["Type"] = "Invalid IP";
          $ipInfo["Domain"] = "None";
          $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
          return [$ipInfoJson];
    }
}
