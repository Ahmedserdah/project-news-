<?php

session_start();
const servername = 'localhost';
const username = 'root';
const password = '';
const dbname = 'project_news';

$conn=mysqli_connect(servername,username,password,dbname);

if(mysqli_connect_error()){
    echo "connection error";
}