<?php
//require_once 'page/test/test_v.php';
require_once 'tbl/con_container_main.php';
require_once 'tbl/con_certificate_main.php';
require_once 'model/install/install_m.php';
require_once 'page/install/install_v_c.php';
require_once 'config.php';
require_once 'sql_db.php';

$dbconn= new SqlDb();


$ob2= new Install_m();
$ob2->installer($dbconn);