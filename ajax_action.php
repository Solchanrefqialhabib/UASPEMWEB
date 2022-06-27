<?php 
	include "config.php";
	$uid=$_POST["uid"];
	$judul=mysqli_real_escape_string($con,$_POST["judul"]);
	$penerbit=mysqli_real_escape_string($con,$_POST["penerbit"]);
	$penulis=mysqli_real_escape_string($con,$_POST["penulis"]);
	if($uid=="0"){
		$sql="insert into user (Judul,Penerbit,Penulis) values ('{$judul}','{$penerbit}','{$penulis}')";
		if($con->query($sql)){
			$uid=$con->insert_id;
			echo"<tr class='{$uid}'>
				<td>{$judul}</td>
				<td>{$penerbit}</td>
				<td>{$penulis}</td>
				<td><a href='#' class='btn btn-primary edit' uid='{$uid}'>Edit</a></td>
				<td><a href='#' class='btn btn-danger del' uid='{$uid}'>Delete</a></td>					
			</tr>";
			
		}
	}else{
		$sql="update user set Judul='{$judul}',Penerbit='{$penerbit}',penulis='{$penulis}' where UID='{$uid}'";
		if($con->query($sql)){
			echo"
				<td>{$judul}</td>
				<td>{$penerbit}</td>
				<td>{$penulis}</td>
				<td><a href='#' class='btn btn-primary edit' uid='{$uid}'>Edit</a></td>
				<td><a href='#' class='btn btn-danger del' uid='{$uid}'>Delete</a></td>					
			";
		}
	}
?>