<?php
session_start();
include_once('libs/session.php');
include_once('libs/database.php');
include_once('libs/role.php');
include_once('libs/helper.php');
redirect('admin/dashboard.php');
?>