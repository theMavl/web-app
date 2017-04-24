<?php
$db = pg_connect("host = ec2-54-163-252-55.compute-1.amazonaws.com 
port = 5432 
dbname=d8lg70oqjic6rt 
user=ovkmsbtkpzjuwe 
password=0839b8535aec6bc2df6a12aeae75f2f88396cbce7f0043e64f58307599d3693f");

$result = pg_query($db, "CREATE TABLE IF NOT EXISTS users(
    id SERIAL PRIMARY KEY,
    name varchar(30) DEFAULT NULL,
    pts INT DEFAULT 0);");
$name = $_POST['name'];
$pts = $_POST['pts'];

$result = pg_query($db, "insert into users values (NULL, $name, $pts)");

$result = pg_query($db, "select * from users");

while($row = pg_fetch_assoc($result)) {
    echo $row['id'];
    echo $row['name'];
    echo $row['pts'];
}

?>