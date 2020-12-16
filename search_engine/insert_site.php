<html>
<head>
	<title>Seach Engine</title>
</head>
<body>
<form action="insert_site.php" method="post" enctype="multipart/form-data">
<table align="center" cellspacing="2" style="width: 500px;  border:2px solid black; " >
<tr>
<td align="center" colspan="5">Inserting new sites:</td>
</tr>
<tr>
	<td>site title:</td>
	<td><input type="text" name="site_title"></td>
</tr>
<tr>
	<td>site link:</td>
	<td><input type="text" name="site_link"></td>
</tr>
<tr>
	<td>site keyword:</td>
	<td><input type="text" name="site_keyword"></td>
</tr>
<tr>
	<td>site description:</td>
	<td><textarea cols="22" rows="6" name="site_desc"></textarea></td>
</tr>
<tr>
	<td>site image:</td>
	<td><input type="file" name="site_image"></td>
</tr>
<tr>
	<td align="center" colspan="5"><input type="submit" name="submit" value="Add site now."></td>
	</tr>
	
</table>
</form>
</body>
</html>

<?php
require 'database.php';
if(isset($_POST['submit'])){
	
		$site_title = $_POST['site_title'];
		 $site_link = $_POST['site_link'];
		 $site_keyword = $_POST['site_keyword'];
		 $site_desc = $_POST['site_desc'];
		 $site_image = $_FILES['site_image']['name'];
		 $site_image_tmp = $_FILES['site_image']['tmp_name'];

		 if($site_title=='' OR $site_link=='' OR $site_keyword=='' OR $site_desc==''){
		
		echo "<script>alert('please fill all the fields!')</script>";
		exit();
			}

		else{
		$insert_query = "INSERT INTO sites (site_title,site_link,site_keywords,site_desc,site_image) values 
		('$site_title','$site_link','$site_keyword','$site_desc','$site_image')";
		move_uploaded_file($site_image_tmp,"images/{$site_image}");
		
			if(mysql_query($insert_query)){
			
			echo "<script>alert('Data inserted into table')</script>";
			
		}
	}
}
?>