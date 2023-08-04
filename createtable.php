<?php

    $servername="localhost";
    $username="root";
    $password="";
    $database="mydb";
	
    $conn=mysqli_connect($servername,$username,$password,$database);

    $sql="CREATE TABLE  department (d_id int not null auto_increment,name varchar(50),n_r_s varchar(20),n_v_s varchar(20),primary key(d_id))";
    $sql="CREATE TABLE  professor (p_id int not null auto_increment primary key,name varchar(50),doj date,reg_sfc_both varchar(10),designation varchar(50),typr_r_v varchar(10),ecm_y_n varchar(10),d_id int references department(d_id))";
    $sql="CREATE TABLE unavailability(p_id int references professor(p_id),date date,reason varchar(50))";
    $sql="CREATE TABLE programme (pr_id int not null auto_increment primary key,pr_name varchar(50) ,strength int ,stream varchar(20),d_id int references department(d_id))";
    $sql="CREATE TABLE courses (c_id int not null auto_increment primary key,c_name varchar(50),sem varchar(20),pr_id int references programme(pr_id))";
    $sql="CREATE TABLE exam (e_id int not null auto_increment primary key ,type_c_r_a varchar(20))";
    $sql="CREATE TABLE timetable(pr_id int references programme(pr_id),c_id int references courses(c_id),e_id int references exam(e_id),date date,f_time time,t_time time, no_of_blocks int(20),academic_year varchar(20))";
    $sql="CREATE TABLE allot (p_id int references professor(p_id),pr_id int references programme(pr_id),c_id int references courses(c_id), e_id int references exam(e_id),date date,role_ps_js_ss varchar(20))";
    $sql="CREATE TABLE login(u_name varchar(20) auto_increment primary key  ,pass varchar(20),type_ad_o varchar(10),status_a_ina varchar(10))";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo "Table created";
    } 
    else
    {
        echo "Table2123 not created";
    }
	$conn->close();
?>