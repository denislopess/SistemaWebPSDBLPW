<?php


$con = new PDO("pgsql:host=127.0.0.1;dbname=empresa",'postgres','');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
