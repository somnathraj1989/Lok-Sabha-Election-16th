<?php
include_once('inc/db_trans.inc.php');
include_once('function/training2_fun.php');
$rec=0;
include_once('inc/commit_con.php');
try {
mysqli_autocommit($link,FALSE);
$sql="update second_rand_table_reserve set slno=? where personcd=?";
$stmt = mysqli_prepare($link, $sql);
if($stmt!=false)
	mysqli_stmt_bind_param($stmt, 'is', $slno,$personcd);

$rsRec=fetch_second_apt_reserve();
$num_rows=rowCount($rsRec);
if($num_rows>0)
{
	for($i=0;$i<$num_rows;$i++)
	{
		$rowRec=getRows($rsRec);
		$personcd=$rowRec['personcd'];
		$slno=($i+1);
		mysqli_stmt_execute($stmt);
		$rec+=mysqli_stmt_affected_rows($stmt);
	}
}
if (!mysqli_commit($link)) {
print("Transaction commit failed\n");
exit();
}
else
{
	print "$rec Record(s) updated successfully\n";
}
mysqli_stmt_close($stmt);
mysqli_close($link);
}
catch(Exception $e)
{
	die("Error occured");//echo "error occured"; //$e->Message();
}
?>