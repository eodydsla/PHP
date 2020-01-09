<?
# 쿠키를 이용한 카운터 프로그램
	$cnt = 0;
	if(file_exists("count.dat")){
		$fp=fopen("count.dat","r");// 파일에서 총 방문자 수를 읽어옴 
		$cnt=fgets($fp,20);// 파일에서 총 방문자 수를 읽어옴 
		$cnt=trim($cnt); // 가져온 값에서 빈 공간을 없앰 
		fclose($fp);
    }
	else{
		$cnt = 0;
	};
	if(!isset($_COOKIE['visit'])) {// 쿠키가 설정되지 않았으면
		$cnt++; 
		$fp= fopen("count.dat","w");// 파일을 쓰기모드로 열고
		fwrite($fp,$cnt);// 파일에다 $count 값을 저장 
		fclose($fp);// 파일을 닫음 
		setcookie("visit",$cnt,time() + 5);// 쿠키를 생성 (5초 유지)

	}
	echo $cnt;// 총 방문자 수를 출력 
?>