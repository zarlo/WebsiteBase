<center>

<h1>401</h1>
<?php
if(isset($_GET['name']))
{
echo '<p>' . $Request_URL . '/' . $_GET['name'] . '</p>';
}
else {
echo '<p>' . $Request_URL . '</p>';
}
?>
<h2>The server admin's found the file you're looking for but your not authorised to see it.</h2>

</center>
