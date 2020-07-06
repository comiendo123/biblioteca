<?php
$cnmysql = new mysqli("localhost","root","","dbbiblioteca");
if ($cnmysql){
    echo "echo";
}else {echo "flse";}
?>