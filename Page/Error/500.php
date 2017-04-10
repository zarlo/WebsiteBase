<center>

<h1>500</h1>
<?php
if(isset($_GET['name']))
{
echo '<p>' . $Request_URL . '/' . $_GET['name'] . '</p>';
}
else {
echo '<p>' . $Request_URL . '</p>';
}
?>
<h2>The server admin's dont know what is going on so you got this page.</h2>

</center>
