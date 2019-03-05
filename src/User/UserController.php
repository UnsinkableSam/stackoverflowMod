<?php

namespace Anax\User;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\User\HTMLForm\UserLoginForm;
use Anax\User\HTMLForm\CreateUserForm;
use Anax\User\HTMLForm\UserPage;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class UserController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * @var $data description
     */
    //private $data;



    // /**
    //  * The initialize method is optional and will always be called before the
    //  * target method/action. This is a convienient method where you could
    //  * setup internal properties that are commonly used by several methods.
    //  *
    //  * @return void
    //  */
    // public function initialize() : void
    // {
    //     ;
    // }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
     public function indexActionGet() : object
     {
         $page = $this->di->get("page");

         $page->add("anax/v2/article/default", [
             "content" => "An index page",
         ]);

         return $page->render([
             "title" => "A index page",
         ]);
     }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function loginAction() : object
    {
        $page = $this->di->get("page");
        $form = new UserLoginForm($this->di);
        $form->check();
        if ($this->di->session->has("loggedin")) {
          $this->di->get("response")->redirect("user/user");
        }
        $page->add("anax/v2/article/default", [
            "content" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "A login page",
        ]);
    }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function createAction() : object
    {
        $page = $this->di->get("page");
        $form = new CreateUserForm($this->di);
        $form->check();

        $page->add("anax/v2/article/default", [
            "content" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "A create user page",
        ]);
    }


    public function UserAction() : object
    {
        $page = $this->di->get("page");
        $userPage = new UserPage($this->di);
        $userPage->check();
        $res = $userPage->userInfo();
        

        if ($res) {
          $avatar = $userPage->get_gravatar($res[0]->email);
          $page->add("anax/v2/user/userpage", [
              "res" => $res,
              "avatar" => $avatar,
              "content" => $userPage->getHTML(),
              "email" => $res[0]->email,
        
          ]);
        }

        if (!$res) {
          $message = "not logged in";
          $page->add("anax/v2/error/default", [
              "message" => $message,
              "header" => "Login error",
              "text" => "$message",
          ]);
        }

        return $page->render([
            "title" => "A user page",
        ]);
    }

    public function DownvoteAction()
    {
        return "hello";
    }

    
}