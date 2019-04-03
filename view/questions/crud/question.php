<?php
namespace Anax\View;
use \Anax\TextFilter\TextFilter;
use Anax\Questions\HTMLForm\CreateComment;
use Anax\Questions\HTMLForm\voteForm;


$urlToView = url("questions");
$urlTest = url("questions/user");
$filter = new TextFilter();
$filters = ["markdown"];
$urlsend = url("VoteApi/test");
$di->get("session")->set("VoteAction", 1);


// vote form funkar inte som tänkt. Det blir inte e variable. 

?>
<div id='answerBorder' style="background-color:transparent">
    <div id='answerTextMargin'>

        <!--
  This is where we print out the question information for the thread topic.
  -->
        <?php 
        $filteredQAuthor = $filter->parse("Author: " .  $question[0]->author, $filters); 
        $filteredQTitle = $filter->parse("Title: " .  $question[0]->title, $filters); 
        print_r("<h2> " . $filteredQAuthor->text  . "</h2>" );
        echo "points " . $question[0]->points;
        ?>

        <h3> <?php print_r($filteredQTitle->text) ; ?> </h3>
        <?php $voteForm = new voteForm($this->di, $question[0]->author, $question[0]->id); 
          print_r($voteForm->getHTML()); ?>
        <?php print_r( $question[0]->text); ?>
        <?php 
          $valueId = $question[0]->id;        

          
          
      ?>
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
      echo "points " . $value->points;

      ${"voteForm$value->author"} = new voteForm($this->di, $value->author, null, $value->id, null);
      print_r(${"voteForm$value->author"}->getHTML());
      
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
    echo "<h1> workinghere</h1>";
    echo "<div id='answerBorder'>";
    echo "<h1> Answer</h1>";
    echo "<div id='answerTextMargin'>";
    // echo ":  " . $value->id . "<br>";
    echo "<h2> Author: " .  $filteredAuthorQ->text . "</h2>";
    // echo "hello11123333";
    echo $value->points;
    // echo "<input href="" type='submit' name='vote' value='Upvote' /> <br>";
    print_r($value->author);

    echo "points " . $value->points;
    // $di, $email, $threadId = null, $commentId = null  ,$answerId = null
    ${"voteForm $value->author"} = new voteForm($this->di, $value->author, null, null, $value->id);
    print_r(${"voteForm $value->author"}->getHTML());
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
        echo "this is where we looking";
        echo $comment->points;
        ${"voteForm$value->author"} = new voteForm($this->di, $comment->author);
        print_r(${"voteForm$value->author"}->getHTML());
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