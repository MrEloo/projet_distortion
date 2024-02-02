<?php
session_start();
require "config/autoload.php";

$newRouter = new Router();
$newRouter->handleRequest($_GET);
