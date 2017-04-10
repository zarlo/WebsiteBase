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

$Request_URL =  rtrim(explode('?',$_SERVER[REQUEST_URI])[0], '/');

require __DIR__ . '/vendor/autoload.php';

\Delight\Cookie\Session::start('Strict');

require 'config.php';

$db = new PDO('mysql:dbname=' . $config['DB']['Table'] . ';host=' . $config['DB']['Host'] . ';charset=utf8mb4', $config['DB']['User'], $config['DB']['Password']);

$auth = new \Delight\Auth\Auth($db,true);


if(substr($Request_URL,0,5) == "/API/")
{
include 'api/API.php';
exit(0);
}


if ($auth->isBanned()) {
 $auth->logout();
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta name="google-site-verification" content="GdtQmyXV8PuPF91C5HtwdEHDWvfvnFG1Z-WynJ4HReI" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Home of PunkSky">
    <meta name="author" content="PunkSky, zarlo">
    <title><?php echo $config['Title'] . ':' .  $Request_URL ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/Main.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<?php include 'Nav.php'; ?>

<div id="Login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <?php include 'Page/Login.php'; ?>
      </div>
    </div>

  </div>
</div>

<div id="Register" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <?php include 'Page/Register.php'; ?>
      </div>
    </div>

  </div>
</div>


    <div class="container">
      <div class="panel panel-default">
        <div class="panel-body">
<?php

  if(empty($Request_URL))
  {
    include 'Page/index.php';
  }
  else
  {
    if(substr($Request_URL,0,5) == "/Blog")
    {
      include 'Page/Blog.php';
    }
    else
    {

      if(file_exists('Page/' . $Request_URL . '.php'))
      {
        include 'Page/' . $Request_URL . '.php';
      }
      else
      {
         include 'Page/Error/404.php';
      }
  }
  }

?>
        </div>
      </div>
      </div>
      <div class="copyright">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <?php echo $Request_URL;?>
              <p> ABN: 21 138 492 088 Copyright © 2016-2017 <a href="https://PunkSky.xyz">PunkSky Technologies</a>. All rights reserved.</p>
            </div>
          </div>
        </div>
      </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
