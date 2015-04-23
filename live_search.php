<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Live Search</title>
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery-1.11.2.min.js"></script>
	<script>
	$(document).ready(function() {
		$("#UserName").keyup(function(){
			var UserName = $("#UserName").val();
			$.ajax({
				type: "POST",
				url: "search.php",
				data: {UserName:UserName},
				success: function(res) {
					$("#UsersList").html(res);
				}
			});
		});
	});
	</script>
</head>
<body>
	<div id="corp">
		<form action="" method="POST">
			<input type="text" name="UserName" id="UserName">
		</form>
		<div id="UsersList">
			
		</div>
	</div>
</body>
</html>