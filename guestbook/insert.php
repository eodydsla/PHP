<?
	$conn = mysqli_connect("localhost", "root", "autoset") or die(mysql_error());
	mysqli_select_db($conn,"test");
	mysqli_query($conn,"set names utf8");

	$query = "INSERT INTO guestbook (name, pass, content) ";
	$query .= " VALUES ('$_POST[name]', '$_POST[pass]', '$_POST[content]')";
	print($query);
	$result = mysqli_query($conn,$query);
	print($result);

?>

<script>
alert("글이 등록되었습니다.");
location.href="guestbook.php";
</script>
