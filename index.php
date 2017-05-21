<?php

function sanitize_output($buffer) {
    $search = array(
        '/\>[^\S ]+/s',
        '/[^\S ]+\</s',
        '/(\s)+/s'
    );
    $replace = array(
        '>',
        '<',
        '\\1'
    );
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}

ob_start("sanitize_output");

require __DIR__ . '/vendor/autoload.php';

\Delight\Cookie\Session::start('Strict');

include 'Class/Core.php';

$Core = new Core();


if(file_exists("Install/index.php"))
{
echo "<p>Remove the install folder to use the site</p>";
}

echo $Core->Request_URL;

if(substr($Core->Request_URL,0,5) == "/API/")
{

  header('Content-Type: application/json');
  $method = $_SERVER['REQUEST_METHOD'];

  $data = json_decode(file_get_contents('php://input'), true);

  $Request = explode('/',trim($Core->Request_URL,'/'));

  $r = array();

  include 'api/' . $Request[1] . "/" . $Request[2] . "/API.php";

  echo json_encode($r);

exit(0);

}

echo $Core->Render();

?>
