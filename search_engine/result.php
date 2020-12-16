<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<title>Result page</title>
</head>
<body>
 <form class="navbar-form" action="result.php" method="GET">
    <div class="input-group add-on">
      <input class="form-control" placeholder="Search" name="user_query" id="srch-term" type="text" style="width:400px; height: 35px; font-size: 20px;">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" name="search" ><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>

</body>
</html>
<?php
require 'database.php';

	if(isset($_GET['search'])){
		$get_val=$_GET['user_query'];
		if($get_val==''){
	
	echo "<center><b>Please go back, and write something in the search box!</b></center>";
	exit();
}

		$result_query="SELECT * FROM sites WHERE site_keywords like '%$get_val%'";

		$run_result=mysql_query($result_query);
		if(mysql_num_rows($run_result)<1){
	
	echo "<center><b>Oops! sorry, nothing was found in the database!</b></center>";
	exit();
}

		while($row_result=mysql_fetch_array($run_result)){
			$site_title = $row_result['site_title'];
		 $site_link = $row_result['site_link'];
		 $site_desc = $row_result['site_desc'];
		 $site_image = $row_result['site_image'];

			echo "<div class='results'>
				<h2>$site_title</h2>
				<a href='$site_link' target='_blank'>$site_link</a>
				<p align='justify'>$site_desc</p>
				<img src='images/$site_image' width=100 height=100/>	
		</div>";
		}
		
	}

?>
	





