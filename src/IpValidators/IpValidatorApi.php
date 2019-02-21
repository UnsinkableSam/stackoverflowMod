<?php
namespace Anax\IpValidators;

use Anax\Commons\ContainerInjectableInterface;

use Anax\Commons\ContainerInjectableTrait;

class IpValidatorApi implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;




    /**
     * @var string $db a sample member variable that gets initialised
     */
    // private $db = "not active";



        /**
         * This is the index method action, it handles:
         * ANY METHOD mountpoint
         * ANY METHOD mountpoint/
         * ANY METHOD mountpoint/index
         *
         * @return string
         */
    // public function indexAction() : object
    // {
    //
    //
    //       $title = " | Ip Json API";
    //
    //
    //
    //       $page = $this->di->get("page");
    //       $page->add(
    //           "anax/v2/ip-validator/ipApi",
    //           [
    //               "header" => "hello",
    //               "text" => "text",
    //           ]
    //       );
    //
    //
    //       return $page->render([
    //           "title" => "$title"
    //       ]);
    // }



    public function validateipActionGet($ipAdress = null) : array
    {

        $ipInfo["IP"] = $ipAdress;

        if (filter_var($ipAdress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $ipInfo["Type"] = "Valid IPv4";
            $ipInfo["Domain"] = gethostbyaddr($ipAdress) ?? "" ;
            $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
            return [$ipInfoJson];
        } else {
            if (filter_var($ipAdress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                $ipInfo["Type"] = "Valid IPv6";
                $ipInfo["Domain"] = gethostbyaddr($ipAdress) ?? "";
                $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
                return [$ipInfoJson];
            }
        }
        $ipInfo["Type"] = "Invalid IP";
        $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
        return [$ipInfoJson];
    }
}
