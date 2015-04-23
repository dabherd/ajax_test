<?php 
try {
	$conn = new PDO('mysql:host=localhost;dbname=ci_test1_db', 'root', '');
} catch(PDOException $e) {
	echo "PDO Exception". $e->getCode();
}
if (isset($_POST['UserName']) && $_POST['UserName'] != "") {
	$sql = $conn->prepare("SELECT * FROM users WHERE username LIKE :UserName");
	$sql->execute(array(
	              'UserName' => '%'.$_POST['UserName'].'%'
	              ));
	if ($sql->rowCount() == 0) {
		echo 'No user was found';
	} else {
		while ($data=$sql->fetch()) {
			?>
			<div class="User">
				<img src="" alt="Loading Image">
				<span class="UserName"><?php echo $data['username']; ?></span>
				<span class="UserInfo"><?php echo $data['email']; ?></span>
				<span class="UserInfo"><?php echo $data['user_type']; ?></span>
			</div>
			<?php 			
		}
	}
} else {
	echo "Type a username";
}

?>