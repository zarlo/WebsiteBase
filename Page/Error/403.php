<center>
<h1>403</h1>
<?php
if(isset($_GET['name']))
{
echo '<p>' . $Request_URL . '/' . $_GET['name'] . '</p>';
}
else {
echo '<p>' . $Request_URL . '</p>';
}
?>
<h2>The server admin's don't want to show you this file.</h2>
</center>
