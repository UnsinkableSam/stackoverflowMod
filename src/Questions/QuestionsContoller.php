<?php

namespace Anax\Questions;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Questions\HTMLForm\CreateForm;
use Anax\Questions\HTMLForm\EditForm;
use Anax\Questions\HTMLForm\DeleteForm;
use Anax\Questions\HTMLForm\UpdateForm;
use Anax\Questions\HTMLForm\CreateComment;
use Anax\Questions\HTMLForm\CreateAnswer;
use Anax\Questions\Tags;
// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class QuestionsContoller implements ContainerInjectableInterface
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
   * Show all items.
   *
   * @return object as a response object
   */
  public function indexActionGet($search = null) : object
  {
      $page = $this->di->get("page");
      $questions = new Questions();
      $questions->setDb($this->di->get("dbqb"));

      $page->add("questions/crud/view-all", [
          "items" => $questions->indexFind($search, $this->di),
      ]);

      return $page->render([
          "title" => "A collection of items",
      ]);
  }



  /**
   * Handler with form to create a new item.
   *
   * @return object as a response object
   */
  public function createAction() : object
  {
      $page = $this->di->get("page");
      $form = new CreateForm($this->di);
      $form->check();

      $page->add("questions/crud/create", [
          "form" => $form->getHTML(),
      ]);

      return $page->render([
          "title" => "Create a item",
      ]);
  }



  /**
   * Handler with form to delete an item.
   *
   * @return object as a response object
   */
  public function deleteAction() : object
  {
      $page = $this->di->get("page");
      $form = new DeleteForm($this->di);
      $form->check();

      $page->add("questions/crud/delete", [
          "form" => $form->getHTML(),
      ]);

      return $page->render([
          "title" => "Delete an item",
      ]);
  }



  /**
   * Handler with form to update an item.
   *
   * @param int $id the id to update.
   *
   * @return object as a response object
   */
  public function updateAction(int $id) : object
  {
      $page = $this->di->get("page");
      $form = new UpdateForm($this->di, $id);
      $form->check();

      $page->add("questions/crud/update", [
          "form" => $form->getHTML(),
      ]);

      return $page->render([
          "title" => "Update an item",
      ]);
  }



  public function questionAction(int $questionId) : object
  {
    
    //   $filter = new TextFilter();
    //   $filters = ["shortcode", "markdown", "clickable", "bbcode"];
    //   print_r($form);
    //   foreach($form as $key => $value){
    //       $form[$key] = $filter->parse($value, $filters);
    //     }
      
      $page = $this->di->get("page");
      $questions = new Questions();
      $questions->setDb($this->di->get("dbqb"));
      $commentForm = new CreateComment($this->di, $questionId);
      $answerForm = new CreateAnswer($this->di, $questionId);
      $commentForm->check();
      $answerForm->check();
      $answers = $questions->answers($questionId, $this->di);

      $page->add("questions/crud/question", [
          "question" => $questions->userInfo($questionId, $this->di),
          "questionComments" => $questions->comments($questionId, $this->di),
          "questionAnswers" => $answers,
          "answerForm" => $answerForm->getHTML(),
          "commentForm" => $commentForm->getHTML(),
          "answersHtmls" => $questions->answersForms($answers, $this->di, $questionId),


      ]);

      return $page->render([
          "title" => "Update an item",
      ]);
  }



  public function tagsAction() : object
  {
      $page = $this->di->get("page");
      $tagsClass = new Tags();
      $tags = $tagsClass->getTags($this->di);
      $page->add("questions/tags", [
          "tags" => $tags,
      ]);

      return $page->render([
          "title" => "Tags",
      ]);
  }

  public function userActionGet($search = null) : object
  {
      $page = $this->di->get("page");
      $questions = new Questions();
      $questions->setDb($this->di->get("dbqb"));
     
      $page->add("questions/crud/view-all", [
          "items" => $questions->indexUser($search, $this->di),
          "comments" =>  $questions->indexUserComments($search, $this->di),
      ]);

      return $page->render([
          "title" => "A collection of items",
      ]);
  }




}