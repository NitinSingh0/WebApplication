<?php
include("connection.php");

$i="CREATE TABLE professor(p_id int not null,name varchar(40) not null,doj date not null,reg_sfc varchar(10) not null,desig varchar(50) not null,type varchar(5) not null,ecm varchar(5) not null,d_id int references department(d_id),primary key(p_id))";

if($obj->query($i)==true)
{
    echo "table professor created";
}
else
{
    echo "table not created",$obj->error;
}
?>