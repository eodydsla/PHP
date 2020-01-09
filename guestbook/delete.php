<?
	if ($_GET['mode']!="delete")
	{
?>
<HTML>
<FORM METHOD="POST" 
ACTION="<?=$_SERVER['PHP_SELF']?>?id=<?=$_GET[id]?>&mode=delete">
<TABLE>
	<TR>
		<TD>비밀번호</TD>
		<TD><INPUT TYPE="PASSWORD" NAME="pass"></TD>
		<TD><INPUT TYPE="SUBMIT" VALUE=" 확 인 "></TD>
	</TR>
</TABLE>
<?
		exit;
	} //end if

	$conn = mysqli_connect("localhost", "root", "autoset") or die(mysql_error());
	mysqli_select_db($conn,"test");
	mysqli_query($conn,"set names utf8");

	$query = "SELECT pass FROM guestbook WHERE id='$_GET[id]'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($conn,$result);
	
	if ($row[pass] == $_POST[pass])
	{
		$query = "DELETE FROM guestbook WHERE id='$_GET[id]'";
		$result = mysqli_query($conn,$query);
	}
?>
<script> alert("글이 삭제되었습니다."); location.href="list.php"; </script>