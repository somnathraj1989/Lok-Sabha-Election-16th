<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Training Venue Details</title>
<?php
include('header/header.php');
?>
<script type="text/javascript" language="javascript">

function validate()
{
	var subdivision=document.getElementById("Subdivision").value;
	var venuename=document.getElementById("venuename").value;
	var venueaddress1=document.getElementById("venueaddress1").value;
	var venueaddress2=document.getElementById("venueaddress2").value; 
	
	if(subdivision=="0")
	{
		document.getElementById("msg").innerHTML="Select Subdivision";
		document.getElementById("Subdivision").focus();
		return false;
	}
	if(venuename=="")
	{
		document.getElementById("msg").innerHTML="Enter the Venue Name";
		document.getElementById("venuename").focus();
		return false;
	}
	if(venueaddress1=="")
	{
		document.getElementById("msg").innerHTML="Enter the address of Venue";
		document.getElementById("venueaddress1").focus();
		return false;
	}
	if(maximumcapacity=="" || maximumcapacity=="0")
	{
		document.getElementById("msg").innerHTML="Enter Maximum capacity";
		document.getElementById("maximumcapacity").focus();
		return false;
	}
}
</script>

<script language="JavaScript" src="js/gen_validatorv4.js"
    type="text/javascript" xml:space="preserve"></script>
</head>
<?php
include_once('inc/db_trans.inc.php');
include_once('function/training2_fun.php');
$action=isset($_REQUEST['submit'])?$_REQUEST['submit']:"";
if($action=='Save')
{
	$subdiv_cd=$_POST['Subdivision'];
	$venuename=clean_spl($_POST['venuename']);
	$venueaddress1=clean_spl($_POST['venueaddress1']);
	$venueaddress2=clean_spl($_POST['venueaddress2']);
	$usercd=$user_cd;
	$venue_cd=$_POST['hid_venue_code'];
	
	if($venue_cd=='')
	{
	$rsmaxcode=fatch_venue2_maxcode($subdiv_cd);
	$rowmaxcode=getRows($rsmaxcode);
	if($rowmaxcode[0]==null)
		$venue_cd=$subdiv_cd."01";
	else
		$venue_cd=sprintf("%06d",$rowmaxcode[0]+1);
	}
	
	if(isset($_REQUEST['venue_cd']))
	{
		$dt = new DateTime();
		$posted_date=$dt->format('Y-m-d H:i:s');
		$ret=update_trainingvenue2($venue_cd,$subdiv_cd,$venuename,$venueaddress1,$venueaddress2,$usercd,$posted_date);
		if($ret==1)
		{
			redirect("training-venue2.php?msg=success");
		}
    }
	else
	{
	
	$ret=save_trainingvenue2($venue_cd,$subdiv_cd,$venuename,$venueaddress1,$venueaddress2,$usercd);
	}
	if($ret==1)
	{
		$msg="<div class='alert-success'>Record saved successfully</div>";
	}
}
?>

<?php
if(isset($_REQUEST['venue_cd']))
{
	$venue_cd=decode($_REQUEST['venue_cd']);

	$rstrainingvenue=fatch_training_venue2($venue_cd);
	$rowtrainingvanue=getRows($rstrainingvenue);
}
if(isset($_REQUEST['msg']))
{
	if($_REQUEST['msg']=='success')
	{
		$msg="<div class='alert-success'>Record updated successfully</div>";
	}
}
?>
<script language="javascript" type="text/javascript">
function bind_all()
{ 
<?php	if(isset($_REQUEST['venue_cd']))
	{	?>
	var hid_venue_code=document.getElementById('hid_venue_code');
	hid_venue_code.value="<?php echo $rowtrainingvanue['venue_cd']; ?>";

	var subdiv = document.getElementById('Subdivision');
	for (var i = 0; i < subdiv.options.length; i++) 
	{
		if (subdiv.options[i].value == "<?php echo $rowtrainingvanue['subdivisioncd']; ?>")
		{
			subdiv.options[i].selected = true;
		}
    }
	var venuename=document.getElementById('venuename');
	venuename.value="<?php echo $rowtrainingvanue['venuename']; ?>";
	var venueaddress1=document.getElementById('venueaddress1');
	venueaddress1.value="<?php echo $rowtrainingvanue['venueaddress1']; ?>";
	var venueaddress2=document.getElementById('venueaddress2');
	venueaddress2.value="<?php echo $rowtrainingvanue['venueaddress2']; ?>";
<?php } ?>
}
</script>
<body oncontextmenu="return false;" onload="javascript: bind_all();">
<div width="100%" align="center">
<table cellpadding="2" cellspacing="0" border="0" width="100%">
<tr>
  <td align="center"><table width="1000px" class="table_blue">
  <tr><td align="center"><div width="50%" class="h2"><?php print isset($environment)?$environment:""; ?></div></td>
</tr>
<tr><td align="center"><?php print $district; ?> DISTRICT</td></tr>
<tr><td align="center"><?php //echo $subdiv_name." SUBDIVISION"; ?></td></tr>
<tr><td align="center">TRAINING VENUE DETAILS ENTRY</td></tr>
<tr><td align="center"><form method="post" name="form1" id="form1">
  <table width="70%" class="form" cellpadding="0">
    <tr>
      <td align="center" colspan="2"><img src="images/blank.gif" alt="" height="1px" /></td>
    </tr>
    <tr>
      <td height="16px" colspan="2" align="center"><?php print isset($msg)?$msg:""; ?><span id="msg" class="error"></span></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><img src="images/blank.gif" alt="" height="2px" /></td>
    </tr>
    <tr>
      <td align="right" colspan="2"><strong>»</strong>&nbsp;<a href="training_venue2_list.php" class="k-button">List Training Venue</a></td>
    </tr>
    <tr>
      <td align="left"><span class="error">*</span>Sub Division</td>
      <td align="left"><select name="Subdivision" id="Subdivision" style="width:258px;">
      <option value="0">-Select Subdivision-</option>
                            <?php 	$districtcd=$dist_cd;
									$rsBn=fatch_Subdivision($districtcd);
									$num_rows=rowCount($rsBn);
									if($num_rows>0)
									{
										for($i=1;$i<=$num_rows;$i++)
										{
											$rowBn=getRows($rsBn);
											echo "<option value='$rowBn[0]'>$rowBn[2]</option>";
										}
									}
									$rsBn=null;
									$num_rows=0;
									$rowBn=null;
									$districtcd=0;
							?>
      				</select></td>

    </tr>
    <tr>
      <td align="left"><span class="error">*</span>Venue Name</td>
      <td align="left"><input type="text" name="venuename" id="venuename" maxlength="50" style="width:250px;" /></td>
    </tr>
    <tr>
      <td align="left"><span class="error">*</span>Venue Address</td>
      <td align="left"><input type="text" name="venueaddress1" id="venueaddress1" maxlength="50" style="width:250px;" /></td>
    </tr>
    <tr><td>&nbsp;</td><td align="left"><input type="text" name="venueaddress2" id="venueaddress2" maxlength="50" style="width:250px;" /></td>
    <input type="hidden" id="hid_venue_code" name="hid_venue_code" /></tr>
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Save" class="button" onclick="javascript:return validate();" /></td>
    </tr>
    <tr><td></td><td colspan="2" align="left">&nbsp;</td></tr>
  </table>
</form>
</td></tr></table>
</td></tr>
</table>
</div>
</body>
</html>