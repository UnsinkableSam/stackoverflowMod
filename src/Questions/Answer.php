<?php

namespace Anax\Questions;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class Answer extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Answers";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $author;
    public $text;


    public function userInfo($id = null, $di)
    {

        $this->setDb($di->get("dbqb"));
        $res = $this->findAllWhere("id = ?", $id);
        return $res;
    }


    public function questionAnswers($id = null, $di)
    {
        
        $this->setDb($di->get("dbqb"));
        $res = $this->findAllWhere("questionID = ?", $id);

        return $res;
    }


    public function comments($id = null, $di)
    {
        $comments = new Comments();
        $res = $comments->answerComments($id, $di);
        return $res;
    }


}