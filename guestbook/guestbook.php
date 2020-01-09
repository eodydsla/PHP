<?
	$conn = mysqli_connect("localhost", "root", "autoset") or die(mysql_error());
	mysqli_select_db($conn,"test");
	mysqli_query($conn,"set names utf8");

	$query = "SELECT * FROM guestbook ORDER BY id DESC";
	$result = mysqli_query($conn,$query);
	$total = mysqli_affected_rows($conn);
	print($total);
	$pagesize=5;
?>

<FORM ACTION="insert.php" METHOD="POST">
<TABLE BORDER=1 WIDTH=500>
	<TR>
		<TD>이름</TD><TD><INPUT TYPE="TEXT" NAME="name"></TD>
		<TD>비밀번호</TD><TD><INPUT TYPE="PASSWORD" NAME="pass"></TD>
	</TR>
	<TR>
		<TD COLSPAN=4><TEXTAREA NAME="content" COLS=65 ROWS=5></TEXTAREA></TD>
	</TR>
	<TR>
		<TD COLSPAN=4 align=right><INPUT TYPE="SUBMIT" VALUE="확인"></TD>
	</TR>
</TABLE>
</FORM>
<BR>


<?
    $no = $_GET['no'] ?? 0;
	for($i= $no ; $i < $no + $pagesize ; $i++) {

		if ($i < $total)
		{
			mysqli_data_seek($result,$i);
			$row = mysqli_fetch_array($result);
?>
<TABLE WIDTH=500 BORDER=1>
	<TR>
		<TD>No. <?=$row['id']?></TD>
		<TD> <?=$row['name']?></TD>
		<TD>(<?=$row['wdate']?>)</TD>
		<TD><a href="delete.php?id=<?=$row['id']?>">del</a></TD>
	</TR>
	<TR>
		<TD COLSPAN=4><?=$row['content']?></TD>
	</TR>
</TABLE>
<?
		} //end if
	} //end for

	$prev = $no - $pagesize; // 이전 페이지는 시작 글에서 $scale을 뺀 값부터
	$next = $no + $pagesize; // 다음 페이지는 시작 글에서 $scale을 더한 값부터

	if ($prev >= 0) {
		echo "<a href='{$_SERVER['PHP_SELF']}?no=$prev'>이전</a>";
	}

	if ($next < $total) {
		echo "<a href='{$_SERVER['PHP_SELF']}?no=$next'>다음</a></center>";
	}
?>
