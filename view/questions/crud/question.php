<?php
namespace Anax\View;
use \Anax\TextFilter\TextFilter;
use Anax\Questions\HTMLForm\CreateComment;

$urlToView = url("questions");
$urlTest = url("questions/user");
$filter = new TextFilter();
$filters = ["markdown"];

?>
<div id='answerBorder' style="background-color:transparent">
    <div id='answerTextMargin'>
        <!--
  This is where we print out the question information for the thread topic.
  -->
        <h1>HELLO DEAR WORLD</h1>
        <?php 
        $filteredQAuthor = $filter->parse("Author: " .  $question[0]->author, $filters); 
        $filteredQTitle = $filter->parse("Title: " .  $question[0]->title, $filters); 
        print_r("<h2> " . $filteredQAuthor->text  . "</h2>" ); ?>
        <h3> <?php print_r($filteredQTitle->text) ; ?> </h3>
        <?php print_r( $question[0]->text); ?>
        <a href="<?php url("Downvote") ?>"></a>
    </div>


    <?php
  /*
  *Print out the comments for the question / thread topic.
  *
  */
  echo "<div id='commentSection'>";
  echo "<h4> comments </h4>";
  foreach ($questionComments as $value) {
    $filteredAuthor = $filter->parse("Author:" .  $value->author, $filters); 
    $filteredcomment = $filter->parse($value->comment, $filters); 


    if ($value->answerId == "0") {
      echo "<div id='commentText';'>";
      echo $filteredAuthor->text;
      echo "Comment: " .  $filteredcomment->text . "<br>";
      echo "</div>";
    }

  }
  echo "</div>";
  print_r($commentForm);


?>
</div>


<div class="" style="background-color:transparent">
    <br>
    <?php

$i = 0;

  foreach ($questionAnswers as $value) {
    $filteredAuthorQ = $filter->parse($value->author, $filters); 
    $filteredtextQ = $filter->parse($value->text, $filters); 

    echo "<div id='answerBorder'>";
    echo "<h1> Answer</h1>";
    echo "<div id='answerTextMargin'>";
    // echo ":  " . $value->id . "<br>";
    echo "<h2> Author: " .  $filteredAuthorQ->text . "</h2>";
    echo "Answer: " .  $filteredtextQ->text;
    echo "</div>";

    /*
    *
    *This second foreach is to print out comments to the answers.
    */
    echo "<div id='commentSection'>";
    echo "<h4> comments </h4>";
    echo "<div>";
    foreach ($questionComments as $comment) {
      $userUrl = url("questions/user/" . $comment->author );
      $commentAuthor = $filter->parse("Author:  "."<a href='$userUrl'>". $comment->author ."</a>", $filters) ; 
      $commentText = $filter->parse("Comment: " .$comment->comment, $filters); 
      if ($comment->answerId == $value->id ) {
        
        echo "<div id='commentText';'>";
        // echo "> " . $comment->id . "<br>";
        echo   $commentAuthor->text   . "<br>";
        echo   $commentText->text . "<br>";
        // echo "> " .  $comment->answerId . "<br>";
        // print_r($answersHtmls[$i]);
        echo "</div>";
      }
    }
    echo "</div>";
      print_r($answersHtmls[$i]);
    echo "</div>";
    echo "</div>";
    $i++;
  }

  /*
  *
  *Print out the comment field for answers.
  * var $answerForm is a array with pre loaded forms with specific ids for
  * comments html code.
  */
  print_r($answerForm);
?>
</div>