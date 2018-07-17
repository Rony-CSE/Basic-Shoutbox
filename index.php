<?php
include_once "/classes/Shout.php";
$shout = new Shout();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Basic Shoutbox</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrapper clr">
		<header class="headsection clr">
			<h2>Basic Shoutbox with PHP OOP & MySQLi</h2>
		</header>
		<section class="content clr">
			<div class="box">
				<ul>

					<?php
						$getData = $shout->getAllData();
						if ($getData) {
							while ($data = $getData->fetch_assoc()) {
					?>
					<li><span><?php echo $data['time'];?></span> - <b><?php echo $data['name'];?></b> <?php echo $data['body'];?></li>
					<?php } } ?>

				</ul>
			</div>
			<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$shoutdata = $shout->insertData($_POST);
			}
			?>
			<div class="shoutform clr">
				<form action="index.php" method="post">
					<table>
						<tr>
							<td>Name</td>
							<td>:</td>
							<td><input type="text" name="name" placeholder="Enter your name here" required></td>
						</tr>
						<tr>
							<td>body</td>
							<td>:</td>
							<td><input type="text" name="body" placeholder="Enter your text here" required></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><input type="submit" name="shoutit" value="Shout It"></td>
						</tr>
					</table>
				</form>
			</div>
		</section>
		<footer class="footsection clr">
			<h2>&copy; Copyright Creative Teach World.</h2>
		</footer>
	</div>
</body>
</html>