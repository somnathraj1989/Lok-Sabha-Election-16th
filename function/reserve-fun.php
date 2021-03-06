<?php
include_once('string_fun.php');
function fatch_PersonDetails($p_id)
{
	//$sql; $rs;
	$sql="SELECT personnela.officer_name, personnela.officecd, personnela.off_desg, office.address1, office.address2, office.postoffice,
	policestation.policestation, office.pin, subdivision.subdivision, DATE_FORMAT(personnela.dateofbirth,'%d-%m-%Y') as dateofbirth,
	personnela.gender,personnela.epic,personnela.forpc,personnela.forassembly,personnela.groupid, personnela.booked, poststat.poststatus, personnela.present_addr1, personnela.present_addr2,
	personnela.assembly_temp as pre_ass_cd,ass_pre.assemblyname AS pre_ass, personnela.assembly_perm as per_ass_cd,ass_per.assemblyname AS per_ass, personnela.assembly_off as post_ass_cd,ass_ofc.assemblyname AS post_ass,personnela.personcd, personnela.email, personnela.mob_no, personnela.poststat, personnela.forsubdivision, personnela.dcrccd, personnela.training2_sch
	 FROM personnela INNER JOIN
    office ON personnela.officecd = office.officecd INNER JOIN 
    assembly AS ass_pre ON personnela.assembly_temp = ass_pre.assemblycd INNER JOIN 
    assembly AS ass_ofc ON personnela.assembly_off = ass_ofc.assemblycd INNER JOIN 
    assembly AS ass_per ON personnela.assembly_perm = ass_per.assemblycd INNER JOIN 
    subdivision ON office.subdivisioncd = subdivision.subdivisioncd INNER JOIN 
    poststat ON personnela.poststat = poststat.post_stat INNER JOIN 
	policestation ON office.policestn_cd = policestation.policestationcd
	Left Join termination On personnela.personcd = termination.personal_id";
	$sql.=" WHERE personnela.personcd='$p_id' and termination.personal_id is null";

	$rs=execSelect($sql);
	connection_close();
	return $rs;
}

function fatch_Random_personnel_for_replacement($forpc,$assembly,$posting_status,$gender)
{
	$sqlc="select count(*) as cnt
	From personnela Inner Join office On personnela.officecd = office.officecd 
  	Inner Join policestation On office.policestn_cd = policestation.policestationcd
  	Inner Join subdivision On office.subdivisioncd = subdivision.subdivisioncd
  	Inner Join poststat On personnela.poststat = poststat.post_stat
  	Inner Join assembly As ass_pre On personnela.assembly_temp = ass_pre.assemblycd
  	Inner Join assembly ass_per On personnela.assembly_perm = ass_per.assemblycd 
  	Inner Join assembly ass_ofc On personnela.assembly_off = ass_ofc.assemblycd
  	Inner Join district On district.districtcd = subdivision.districtcd 
	Left Join termination On personnela.personcd = termination.personal_id";
	$sqlc.=" WHERE termination.personal_id is null and personnela.gender='$gender' and personnela.assembly_temp<>'$assembly' and personnela.assembly_perm<>'$assembly' and personnela.assembly_off<>'$assembly' and personnela.poststat='$posting_status' ";
	$sqlc.=" and (personnela.booked='' or personnela.booked is null) and personnela.forpc='$forpc'";
	$rsc=execSelect($sqlc);
	$rowc=getRows($rsc);
	$limit=$rowc['cnt'];
	//echo $limit; exit;
	$random_no=rand(0,$limit-1);
	$sql="Select personnela.personcd,personnela.officecd,personnela.officer_name,personnela.off_desg,office.address1,
  	office.address2,office.postoffice,policestation.policestation,subdivision.subdivision,district.district,
  office.pin,DATE_FORMAT(personnela.dateofbirth,'%d-%m-%Y') as dateofbirth,personnela.gender,personnela.epic,
  	poststat.poststatus,personnela.present_addr1,personnela.present_addr2,ass_pre.assemblyname As pre_ass,
  	ass_per.assemblyname As per_ass,ass_ofc.assemblyname As post_ass
	From personnela Inner Join office On personnela.officecd = office.officecd
  	Inner Join policestation On office.policestn_cd = policestation.policestationcd 
  	Inner Join subdivision On office.subdivisioncd = subdivision.subdivisioncd
  	Inner Join poststat On personnela.poststat = poststat.post_stat
  	Inner Join assembly As ass_pre On personnela.assembly_temp = ass_pre.assemblycd 
  	Inner Join assembly ass_per On personnela.assembly_perm = ass_per.assemblycd
  	Inner Join assembly ass_ofc On personnela.assembly_off = ass_ofc.assemblycd
  	Inner Join district On district.districtcd = subdivision.districtcd
	Left Join termination On personnela.personcd = termination.personal_id ";
	$sql.=" WHERE termination.personal_id is null and personnela.gender='$gender' and personnela.assembly_temp<>'$assembly' and personnela.assembly_perm<>'$assembly' and personnela.assembly_off<>'$assembly' and personnela.poststat='$posting_status' ";
	$sql.=" and (personnela.booked='' or personnela.booked is null)  and personnela.forpc='$forpc'";
	$sql.=" limit 1 offset $random_no";
	$rs=execSelect($sql);
	connection_close();
	return $rs;
}
function update_personnel_replacement($p_id,$groupid,$ass,$forpc,$booked,$selected,$dcrccd,$training2_sch)
{
	$sql="update personnela set booked='$booked',groupid='$groupid',forpc='$forpc',forassembly='$ass',selected='$selected',dcrccd='$dcrccd', training2_sch='$training2_sch' where personcd='$p_id'";
	$i=execUpdate($sql);
	connection_close();
	return $i;
}
function reserve_replacement_log($new_p_id,$old_p_id,$ass,$groupid,$usercd)
{
	$sql="insert into relpacement_log_reserve (old_personnel, new_personnel, assemblycd, groupid, usercode) values ";
	$sql.="('$old_p_id','$new_p_id','$ass','$groupid','$usercd')";
	$i=execUpdate($sql);
	connection_close();
	return $i;
}

function delete_prev_data_second_rand_reserve($personcd,$new_p_id)
{
	$sql="delete from second_rand_table_reserve where personcd='$personcd' or personcd='$new_p_id'";
	$i=execDelete($sql);
	//print $sql; exit;
	connection_close();
	return $i;
}
function second_appointment_letter_reserve($personcd)
{
	$sql="Select personnela.groupid,
	  assembly.assemblycd,
	  assembly.assemblyname,
	  pc.pccd,
	  pc.pcname,
	  personnela.officer_name,
	  personnela.personcd,
	  office.office,
	  office.address1,
	  office.address2,
	  office.postoffice,
	  subdivision.subdivision,
	  policestation.policestation,
	  district.district,
	  office.pin,
	  office.officecd,
	  dcrcmaster.dc_venue,
	  dcrcmaster.dc_addr,
	  Date_Format(dcrc_party.dc_date, '%d/%m/%Y') As dc_date,
	  dcrc_party.dc_date As dc_dateD,
	  dcrc_party.dc_time,
	  dcrcmaster.rcvenue,
	  personnela.poststat,
	  personnela.off_desg,
	  personnela.dcrccd,
	  poststat.poststatus
	From personnela
	  Inner Join office On personnela.officecd = office.officecd
	  Inner Join subdivision On subdivision.subdivisioncd = office.subdivisioncd
	  Inner Join policestation
		On office.policestn_cd = policestation.policestationcd
	  Inner Join district On office.districtcd = district.districtcd        
	  Left Join pc On personnela.forpc = pc.pccd And personnela.forsubdivision =
		pc.subdivisioncd
	  Left Join assembly On personnela.forassembly = assembly.assemblycd
	  Inner Join dcrcmaster On personnela.dcrccd = dcrcmaster.dcrcgrp
	  Inner Join dcrc_party On dcrc_party.dcrcgrp = dcrcmaster.dcrcgrp
	  Inner Join poststat On personnela.poststat = poststat.post_stat ";
	$sql.=" where personnela.booked='R' and personnela.personcd='$personcd'";
	/*if($forassembly!='' || $forassembly!=null || $forassembly!=0)
		$sql.=" and personnela.forassembly='$forassembly'";
	elseif($forpc!='' || $forpc!=null || $forpc!=0)
		$sql.=" and personnela.forpc='$forpc'";
	if($group_id!='' || $group_id!=null)
		$sql.=" and personnela.groupid='$group_id'";
	$sql.=" order by personnela.forpc,personnela.forassembly,office.subdivisioncd,office.blockormuni_cd,office.officecd,personnela.groupid, personnela.poststat";*/
//	print $sql; exit;
	$rs=execSelect($sql);
	connection_close();
	return $rs;
}
function second_appointment_letter_reserve3_print($personcd)
{
	$sql="SELECT `slno`,`groupid`,`assembly`,`pcname`,`personcd`,`person_name`,`person_designation`,`post_status`,	
	`post_stat`,`officecd`,`office_name`,`office_address`,`post_office`,`subdivision`,`police_stn`,`district`,
	`pincode`,`dc_venue`,`dc_address`,date_format(`dc_date`,'%d/%m/%Y') as dc_date,`dc_time`,`rc_venue`,`traingcode`,`training_venue`,`venuecode`,
	`venue_addr1`,`venue_addr2`,date_format(`training_date`,'%d/%m/%Y') as training_date,`training_time`,date_format(`polldate`,'%d/%m/%Y') as polldate,`polltime` 
	FROM `second_rand_table_reserve`";
	$sql.=" where personcd ='$personcd'";
	//echo $sql; exit;
	$rs=execSelect($sql);
	connection_close();
	return $rs;
}
?>