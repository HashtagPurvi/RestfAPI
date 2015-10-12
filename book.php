<?php
/**
 * Created by PhpStorm.
 * User: pagrawal
 * Date: 10/12/15
 * Time: 3:23 PM
 */

$host = '127.0.0.1';
$user = 'root';
$password = '';

$link = mysql_connect($host,$user,$password) or die ('Error');

//var_dump($link);
mysql_select_db('chat') or die ('Database Error');

header("Content-Type: text/xml");

$path = $_SERVER['PATH_INFO'];
if($path !=null)
{
    $path_params = spliti("/",$path);
}

if($_SERVER['REQUEST_METHOD']=='GET') {

    if($path_params[1] !=null) {

        settype($path_params[1],'integer');
        $query = 'SELECT name, author, isbn FROM book where id = $path_params[1]';
    }

    else
        $query = 'SELECT name, author, isbn FROM book';

    $result = mysql_query($query) or die('Query Failed' . mysql_error());

    echo "<books>";

    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        echo "<book>";

        foreach ($line as $key => $col_value)
            echo "<key>$col_value</key>";
        echo "</book>";
    }
    echo "</books>";

    mysql_free_result($result);
}
mysql_close($link);
