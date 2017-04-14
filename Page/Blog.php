<?php

$Request_Page = explode('/',trim($Request_URL,'/'))[2];

if($Request_Page == "New")
{
include 'Page/Blog/New.php';
}
elseif ($Request_Page == "Edit")
{
include 'Page/Blog/Edit.php';
}
else
{
include 'Page/Blog/index.php';
}

?>

<h1>Comming soon</h1>
