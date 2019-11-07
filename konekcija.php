<?php 
function konektuj_se(){

global $veza;
 $veza=mysqli_connect("localhost","veb","123456","dogadjaji");

if(mysqli_connect_errno($veza))
die("Problem sa konekcijom");

}


function diskonektuj_se(){

global $veza;
mysqli_close($veza);

}


?>
