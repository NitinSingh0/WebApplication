<?php
$servername="localhost";
$username="root";
$password="";
$dnname="exam";

$obj=mysqli_connect("$servername","$username","$password");

$i="CREATE DATABASE exam";

if($obj->query($i)==true)
{
    echo "DATABASE exam CREATED";
}
else
{
    echo "DATABASE not CREATED",$obj->error;
}

$i="CREATE TABLE department(d_id int not null,name varchar(40) not null,nvs varchar(40),nrs varchar(40),primary key(d_id))";

if($obj->query($i)==true)
{
    echo "table department created";
}
else
{
    echo "table not created",$obj->error;
}

$i="CREATE TABLE professor(p_id int not null,name varchar(40) not null,doj date not null,reg_sfc varchar(10) not null,desig varchar(50) not null,type varchar(5) not null,ecm varchar(5) not null,d_id int references department(d_id),primary key(p_id))";

if($obj->query($i)==true)
{
    echo "table professor created";
}
else
{
    echo "table not created",$obj->error;
}

$i="CREATE TABLE unavailability(p_id int references professor(p_id),udate date not null,reson varchar(50) not null)";
if($obj->query($i)==true)
{
    echo "table unavailability created";
}
else
{
    echo "table not created",$obj->error;
}

$i="CREATE TABLE programme(pr_id int not null,pr_name varchar(20) not null,strength int not null,stream varchar(5) not null,d_id int references department(d_id),primary key(pr_id))";

if($obj->query($i)==true)
{
    echo "table programme created";
}
else
{
    echo "table not created",$obj->error;
}

$i="CREATE TABLE course(c_id int not null,c_name varchar(20) not null,sem varchar(10),pr_id int references programme(pr_id),primary key(c_id))";
if($obj->query($i)==true)
{
    echo "table course created";
}
else
{
    echo "table not created",$obj->error;
}

$i="CREATE TABLE exam(e_id int not null,type varchar(5) not null,primary key(e_id))";
if($obj->query($i)==true)
{
    echo "table exam created";
}
else
{
    echo "table not created",$obj->error;
}

$i="CREATE TABLE timetable(pr_id int references programme(pr_id),c_id int references course(c_id),e_id int references exam(e_id),t_date date,f_time time,t_time time,no_blocks int,acad_year varchar(10))";
if($obj->query($i)==true)
{
    echo "table timetable created";
}
else
{
    echo "table not created",$obj->error;
}

$i="CREATE TABLE allot(p_id int references professor(p_id),pr_id int references programme(pr_id),c_id int references course(c_id),e_id int references exam(e_id),a_date date,a_role varchar(5))";
if($obj->query($i)==true)
{
    echo "table allot created";
}
else
{
    echo "table not created",$obj->error;
}

$i="CREATE TABLE llogin(u_name varchar(40),pass varchar(20),u_type varchar(10),u_status varchar(10),primary key(u_name))";
if($obj->query($i)==true)
{
    echo "table llogin created";
}
else
{
    echo "table not created",$obj->error;
}
?>