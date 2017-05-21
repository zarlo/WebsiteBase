<?php

use Delight\Auth\Auth;
use Delight\Db\PdoDatabase;

include 'config.php';
include 'Class/Page.php';

class Core
{

  private $Page;

  public $db;
  public $Auth;
  public $config;
  public $Base_URL;
  public $Base_Path;
  public $Request_URL;

  function __construct()
  {
    $this->Base_Path = "../" . __DIR__;
    echo $this->Base_Path;
    $this->config = json_decode(file_get_contents("Config.json"));

    $t = new \Delight\Db\PdoDsn(
      'mysql:dbname=' . $this->config["db"] . ';host=' . $this->config["Host"] . ';charset=utf8mb4',
      $this->config["User"],
      $this->config["Password"]
    );

    $this->Request_URL = rtrim(explode('?',$_SERVER['HTTP_HOST'])[0], '/');

    $this->Base_URL = $_SERVER['HTTP_HOST'];

    $this->db = \Delight\Db\PdoDatabase::fromDsn($t);

    $this->Auth = new \Delight\Auth\Auth($this->db,true);

    $this->Page = new Page();

  }

  public function Render()
  {

      $Content;
      $Template;

      if(empty($this->Request_URL))
      {
        $this->Request_URL = "index";
      }

      if(file_exists("/Page/" . $this->Request_URL . ".html"))
      {

      $this->Page->LoadTemplate("/Page/" . $this->Request_URL . ".html");

      }
      elseif (file_exists("/Page/" . $this->Base_URL . "/" . $this->Request_URL . ".html"))
      {

      $this->Page->LoadTemplate("/Page/" . $this->Base_URL . "/" . $this->Request_URL . ".html");

      }
      else
      {

        $Data = $this->db->selectRow(
          'SELECT * FROM Page WHERE url = ?',
          [ $this->Request_URL ]
        );

       if($Data == null)
       {

         $Data = $this->db->selectRow(
           'SELECT * FROM Page WHERE url = ?',
           [ $this->Base_URL . "/" . $this->Request_URL ]
         );

       }

       if($Data == null)
       {

          $this->Page->LoadTemplate("/Error/404.html");

       }
       else
       {

        $this->Page->LoadTemplate($Data['Template']);

       }

      }

     $this->Page->Render();

  }

}

?>
