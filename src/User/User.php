<?php

namespace Anax\User;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Psr\Container\ContainerInterface;
use Anax\DatabaseActiveRecord\ActiveRecordModel;
/**
 * Example of FormModel implementation.
 */
class User extends ActiveRecordModel implements ContainerInjectableInterface
{
  use ContainerInjectableTrait;
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "User";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $email;
    public $password;
    public $created;
    public $updated;
    public $deleted;
    public $active;


    /**
     * Set the password.
     *
     * @param string $password the password to use.
     *
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    /**
     * Verify the acronym and the password, if successful the object contains
     * all details from the database row.
     *
     * @param string $acronym  acronym to check.
     * @param string $password the password to use.
     *
     * @return boolean true if acronym and password matches, else false.
     */
     public function verifyPassword($email, $password)
      {
          $this->find("email", $email);
          return password_verify($password, $this->password);
      }


    public function save() {
      // $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->db->connect()
           ->insert("User", ["email", "password"])
           ->execute([$this->email, $this->password])
           ->fetch();


    }

    public function hasMail($email) {
      $this->find("email", $email);
      if ($this->email == $email) {
        return true;
      }
      return false;
    }

    public function updateUser($pass) {
      // $this->password = password_hash($this->password, PASSWORD_DEFAULT);

      // Not working as intended.
      $this->setPassword($pass);
      $this->db->connect()
         ->update("User", ["password"])
         ->execute([$this->password])
         ->fetch();
      // $this->db->connect()
      //    ->update("User", ["email", "password"])
      //    ->execute($this->email, [$this->email, $this->password])
      //    ->fetch();
    }
}
