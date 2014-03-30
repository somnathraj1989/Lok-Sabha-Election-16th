<?php
date_default_timezone_set('Asia/Calcutta');
include_once('inc/db_trans.inc.php');
$sql="delete from second_appt where per_poststat<>'PR'";
$i=execDelete($sql);

$sql29="insert into second_appt (`pers_off`,per_poststat,`groupid`,`assembly`,`assembly_name`,`mem_no`,`pccd`,`pcname`,`pr_personcd`,`p1_personcd`,`p2_personcd`,`p3_personcd`, `pa_personcd`,`pb_personcd`,`pr_name`,`p1_name`,`p2_name`,`p3_name`,`pa_name`,`pb_name`,`pr_designation`,`p1_designation`,`p2_designation`,`p3_designation`,`pa_designation`,`pb_designation`,`pr_status`,`p1_status`,`p2_status`,`p3_status`,`pa_status`,`pb_status`,pr_post_stat,p1_post_stat,p2_post_stat,p3_post_stat,pa_post_stat,pb_post_stat, `pr_officecd`,`p1_officecd`,`p2_officecd`,`p3_officecd`,`pa_officecd`,`pb_officecd`,`pr_officename`,`p1_officename`,`p2_officename`, `p3_officename`,`pa_officename`,`pb_officename`,`pr_officeaddress`,`p1_officeaddress`,`p2_officeaddress`,`p3_officeaddress`, `pa_officeaddress`,`pb_officeaddress`,`pr_postoffice`,`p1_postoffice`,`p2_postoffice`,`p3_postoffice`,`pa_postoffice`, `pb_postoffice`,`pr_subdivision`,`p1_subdivision`,`p2_subdivision`,`p3_subdivision`,`pa_subdivision`,`pb_subdivision`, `pr_policestn`,`p1_policestn`,`p2_policestn`,p3_policestn,`pa_policestn`,`pb_policestn`,`district`,`pr_pincode`,`p1_pincode`, `p2_pincode`,`p3_pincode`,`pa_pincode`,`pb_pincode`,`dcrcgrp`,`dc_venue`,`dc_address`,`dc_date`,dc_time,`rc_venue`,`traingcode`, `training_venue`,`venuecode`,`venue_addr1`,`venue_addr2`,`training_date`,`training_time`,polldate,polltime) 
select distinct p1_officecd,p1_status,`groupid`,`assembly`,`assembly_name`,`mem_no`,`pccd`,`pcname`,`pr_personcd`,`p1_personcd`,`p2_personcd`,
`p3_personcd`, `pa_personcd`,`pb_personcd`,`pr_name`,`p1_name`,`p2_name`,`p3_name`,`pa_name`,`pb_name`,`pr_designation`,`p1_designation`,
`p2_designation`,`p3_designation`,`pa_designation`,`pb_designation`,`pr_status`,`p1_status`,`p2_status`,`p3_status`,`pa_status`,`pb_status`, pr_post_stat,p1_post_stat,p2_post_stat,p3_post_stat,pa_post_stat,pb_post_stat, `pr_officecd`,`p1_officecd`,`p2_officecd`,`p3_officecd`,`pa_officecd`,`pb_officecd`,`pr_officename`,`p1_officename`,`p2_officename`, `p3_officename`,`pa_officename`,`pb_officename`,`pr_officeaddress`,`p1_officeaddress`,`p2_officeaddress`,`p3_officeaddress`, `pa_officeaddress`,`pb_officeaddress`,`pr_postoffice`,`p1_postoffice`,`p2_postoffice`,`p3_postoffice`,`pa_postoffice`, `pb_postoffice`,`pr_subdivision`,`p1_subdivision`,`p2_subdivision`,`p3_subdivision`,`pa_subdivision`,`pb_subdivision`, `pr_policestn`,`p1_policestn`,`p2_policestn`,p3_policestn,`pa_policestn`,`pb_policestn`,`district`,`pr_pincode`,`p1_pincode`, `p2_pincode`,`p3_pincode`,`pa_pincode`,`pb_pincode`,`dcrcgrp`,`dc_venue`,`dc_address`,`dc_date`,dc_time,`rc_venue`,`traingcode`, `training_venue`,`venuecode`,`venue_addr1`,`venue_addr2`,`training_date`,`training_time`,polldate,polltime
from second_appt";
$i=execUpdate($sql29);

$sql30="insert into second_appt (`pers_off`,per_poststat,`groupid`,`assembly`,`assembly_name`,`mem_no`,`pccd`,`pcname`,`pr_personcd`,`p1_personcd`,`p2_personcd`,`p3_personcd`, `pa_personcd`,`pb_personcd`,`pr_name`,`p1_name`,`p2_name`,`p3_name`,`pa_name`,`pb_name`,`pr_designation`,`p1_designation`,`p2_designation`,`p3_designation`,`pa_designation`,`pb_designation`,`pr_status`,`p1_status`,`p2_status`,`p3_status`,`pa_status`,`pb_status`,   pr_post_stat,p1_post_stat,p2_post_stat,p3_post_stat,pa_post_stat,pb_post_stat, `pr_officecd`,`p1_officecd`,`p2_officecd`,`p3_officecd`,`pa_officecd`,`pb_officecd`,`pr_officename`,`p1_officename`,`p2_officename`, `p3_officename`,`pa_officename`,`pb_officename`,`pr_officeaddress`,`p1_officeaddress`,`p2_officeaddress`,`p3_officeaddress`, `pa_officeaddress`,`pb_officeaddress`,`pr_postoffice`,`p1_postoffice`,`p2_postoffice`,`p3_postoffice`,`pa_postoffice`, `pb_postoffice`,`pr_subdivision`,`p1_subdivision`,`p2_subdivision`,`p3_subdivision`,`pa_subdivision`,`pb_subdivision`, `pr_policestn`,`p1_policestn`,`p2_policestn`,p3_policestn,`pa_policestn`,`pb_policestn`,`district`,`pr_pincode`,`p1_pincode`, `p2_pincode`,`p3_pincode`,`pa_pincode`,`pb_pincode`,`dcrcgrp`,`dc_venue`,`dc_address`,`dc_date`,dc_time,`rc_venue`,`traingcode`, `training_venue`,`venuecode`,`venue_addr1`,`venue_addr2`,`training_date`,`training_time`,polldate,polltime) 
select distinct p2_officecd,p2_status,`groupid`,`assembly`,`assembly_name`,`mem_no`,`pccd`,`pcname`,`pr_personcd`,`p1_personcd`,`p2_personcd`,
`p3_personcd`, `pa_personcd`,`pb_personcd`,`pr_name`,`p1_name`,`p2_name`,`p3_name`,`pa_name`,`pb_name`,`pr_designation`,`p1_designation`,
`p2_designation`,`p3_designation`,`pa_designation`,`pb_designation`,`pr_status`,`p1_status`,`p2_status`,`p3_status`,`pa_status`,`pb_status`, pr_post_stat,p1_post_stat,p2_post_stat,p3_post_stat,pa_post_stat,pb_post_stat, `pr_officecd`,`p1_officecd`,`p2_officecd`,`p3_officecd`,`pa_officecd`,`pb_officecd`,`pr_officename`,`p1_officename`,`p2_officename`, `p3_officename`,`pa_officename`,`pb_officename`,`pr_officeaddress`,`p1_officeaddress`,`p2_officeaddress`,`p3_officeaddress`, `pa_officeaddress`,`pb_officeaddress`,`pr_postoffice`,`p1_postoffice`,`p2_postoffice`,`p3_postoffice`,`pa_postoffice`, `pb_postoffice`,`pr_subdivision`,`p1_subdivision`,`p2_subdivision`,`p3_subdivision`,`pa_subdivision`,`pb_subdivision`, `pr_policestn`,`p1_policestn`,`p2_policestn`,p3_policestn,`pa_policestn`,`pb_policestn`,`district`,`pr_pincode`,`p1_pincode`, `p2_pincode`,`p3_pincode`,`pa_pincode`,`pb_pincode`,`dcrcgrp`,`dc_venue`,`dc_address`,`dc_date`,dc_time,`rc_venue`,`traingcode`, `training_venue`,`venuecode`,`venue_addr1`,`venue_addr2`,`training_date`,`training_time` ,polldate,polltime
from second_appt";
$i=execUpdate($sql30);

$sql31="insert into second_appt (`pers_off`,per_poststat,`groupid`,`assembly`,`assembly_name`,`mem_no`,`pccd`,`pcname`,`pr_personcd`,`p1_personcd`,`p2_personcd`,`p3_personcd`, `pa_personcd`,`pb_personcd`,`pr_name`,`p1_name`,`p2_name`,`p3_name`,`pa_name`,`pb_name`,`pr_designation`,`p1_designation`,`p2_designation`,`p3_designation`,`pa_designation`,`pb_designation`,`pr_status`,`p1_status`,`p2_status`,`p3_status`,`pa_status`,`pb_status`,  pr_post_stat,p1_post_stat,p2_post_stat,p3_post_stat,pa_post_stat,pb_post_stat, `pr_officecd`,`p1_officecd`,`p2_officecd`,`p3_officecd`,`pa_officecd`,`pb_officecd`,`pr_officename`,`p1_officename`,`p2_officename`, `p3_officename`,`pa_officename`,`pb_officename`,`pr_officeaddress`,`p1_officeaddress`,`p2_officeaddress`,`p3_officeaddress`, `pa_officeaddress`,`pb_officeaddress`,`pr_postoffice`,`p1_postoffice`,`p2_postoffice`,`p3_postoffice`,`pa_postoffice`, `pb_postoffice`,`pr_subdivision`,`p1_subdivision`,`p2_subdivision`,`p3_subdivision`,`pa_subdivision`,`pb_subdivision`, `pr_policestn`,`p1_policestn`,`p2_policestn`,p3_policestn,`pa_policestn`,`pb_policestn`,`district`,`pr_pincode`,`p1_pincode`, `p2_pincode`,`p3_pincode`,`pa_pincode`,`pb_pincode`,`dcrcgrp`,`dc_venue`,`dc_address`,`dc_date`,dc_time,`rc_venue`,`traingcode`, `training_venue`,`venuecode`,`venue_addr1`,`venue_addr2`,`training_date`,`training_time`,polldate,polltime) 
select distinct p3_officecd,p3_status,`groupid`,`assembly`,`assembly_name`,`mem_no`,`pccd`,`pcname`,`pr_personcd`,`p1_personcd`,`p2_personcd`,
`p3_personcd`, `pa_personcd`,`pb_personcd`,`pr_name`,`p1_name`,`p2_name`,`p3_name`,`pa_name`,`pb_name`,`pr_designation`,`p1_designation`,
`p2_designation`,`p3_designation`,`pa_designation`,`pb_designation`,`pr_status`,`p1_status`,`p2_status`,`p3_status`,`pa_status`,`pb_status`, pr_post_stat,p1_post_stat,p2_post_stat,p3_post_stat,pa_post_stat,pb_post_stat, `pr_officecd`,`p1_officecd`,`p2_officecd`,`p3_officecd`,`pa_officecd`,`pb_officecd`,`pr_officename`,`p1_officename`,`p2_officename`, `p3_officename`,`pa_officename`,`pb_officename`,`pr_officeaddress`,`p1_officeaddress`,`p2_officeaddress`,`p3_officeaddress`, `pa_officeaddress`,`pb_officeaddress`,`pr_postoffice`,`p1_postoffice`,`p2_postoffice`,`p3_postoffice`,`pa_postoffice`, `pb_postoffice`,`pr_subdivision`,`p1_subdivision`,`p2_subdivision`,`p3_subdivision`,`pa_subdivision`,`pb_subdivision`, `pr_policestn`,`p1_policestn`,`p2_policestn`,p3_policestn,`pa_policestn`,`pb_policestn`,`district`,`pr_pincode`,`p1_pincode`, `p2_pincode`,`p3_pincode`,`pa_pincode`,`pb_pincode`,`dcrcgrp`,`dc_venue`,`dc_address`,`dc_date`,dc_time,`rc_venue`,`traingcode`, `training_venue`,`venuecode`,`venue_addr1`,`venue_addr2`,`training_date`,`training_time`,polldate,polltime
from second_appt ";
$i=execUpdate($sql31);

$sql32="insert into second_appt (`pers_off`,per_poststat,`groupid`,`assembly`,`assembly_name`,`mem_no`,`pccd`,`pcname`,`pr_personcd`,`p1_personcd`,`p2_personcd`,`p3_personcd`, `pa_personcd`,`pb_personcd`,`pr_name`,`p1_name`,`p2_name`,`p3_name`,`pa_name`,`pb_name`,`pr_designation`,`p1_designation`,`p2_designation`,`p3_designation`,`pa_designation`,`pb_designation`,`pr_status`,`p1_status`,`p2_status`,`p3_status`,`pa_status`,`pb_status`,  pr_post_stat,p1_post_stat,p2_post_stat,p3_post_stat,pa_post_stat,pb_post_stat, `pr_officecd`,`p1_officecd`,`p2_officecd`,`p3_officecd`,`pa_officecd`,`pb_officecd`,`pr_officename`,`p1_officename`,`p2_officename`, `p3_officename`,`pa_officename`,`pb_officename`,`pr_officeaddress`,`p1_officeaddress`,`p2_officeaddress`,`p3_officeaddress`, `pa_officeaddress`,`pb_officeaddress`,`pr_postoffice`,`p1_postoffice`,`p2_postoffice`,`p3_postoffice`,`pa_postoffice`, `pb_postoffice`,`pr_subdivision`,`p1_subdivision`,`p2_subdivision`,`p3_subdivision`,`pa_subdivision`,`pb_subdivision`, `pr_policestn`,`p1_policestn`,`p2_policestn`,p3_policestn,`pa_policestn`,`pb_policestn`,`district`,`pr_pincode`,`p1_pincode`, `p2_pincode`,`p3_pincode`,`pa_pincode`,`pb_pincode`,`dcrcgrp`,`dc_venue`,`dc_address`,`dc_date`,dc_time,`rc_venue`,`traingcode`, `training_venue`,`venuecode`,`venue_addr1`,`venue_addr2`,`training_date`,`training_time`,polldate,polltime) 
select distinct pa_officecd,pa_status,`groupid`,`assembly`,`assembly_name`,`mem_no`,`pccd`,`pcname`,`pr_personcd`,`p1_personcd`,`p2_personcd`,
`p3_personcd`, `pa_personcd`,`pb_personcd`,`pr_name`,`p1_name`,`p2_name`,`p3_name`,`pa_name`,`pb_name`,`pr_designation`,`p1_designation`,
`p2_designation`,`p3_designation`,`pa_designation`,`pb_designation`,`pr_status`,`p1_status`,`p2_status`,`p3_status`,`pa_status`,`pb_status`, pr_post_stat,p1_post_stat,p2_post_stat,p3_post_stat,pa_post_stat,pb_post_stat, `pr_officecd`,`p1_officecd`,`p2_officecd`,`p3_officecd`,`pa_officecd`,`pb_officecd`,`pr_officename`,`p1_officename`,`p2_officename`, `p3_officename`,`pa_officename`,`pb_officename`,`pr_officeaddress`,`p1_officeaddress`,`p2_officeaddress`,`p3_officeaddress`, `pa_officeaddress`,`pb_officeaddress`,`pr_postoffice`,`p1_postoffice`,`p2_postoffice`,`p3_postoffice`,`pa_postoffice`, `pb_postoffice`,`pr_subdivision`,`p1_subdivision`,`p2_subdivision`,`p3_subdivision`,`pa_subdivision`,`pb_subdivision`, `pr_policestn`,`p1_policestn`,`p2_policestn`,p3_policestn,`pa_policestn`,`pb_policestn`,`district`,`pr_pincode`,`p1_pincode`, `p2_pincode`,`p3_pincode`,`pa_pincode`,`pb_pincode`,`dcrcgrp`,`dc_venue`,`dc_address`,`dc_date`,dc_time,`rc_venue`,`traingcode`, `training_venue`,`venuecode`,`venue_addr1`,`venue_addr2`,`training_date`,`training_time`,polldate,polltime
from second_appt where  mem_no='6' or mem_no='5'";
$i=execUpdate($sql32);

$sql33="insert into second_appt (`pers_off`,per_poststat,`groupid`,`assembly`,`assembly_name`,`mem_no`,`pccd`,`pcname`,`pr_personcd`,`p1_personcd`,`p2_personcd`,`p3_personcd`, `pa_personcd`,`pb_personcd`,`pr_name`,`p1_name`,`p2_name`,`p3_name`,`pa_name`,`pb_name`,`pr_designation`,`p1_designation`,`p2_designation`,`p3_designation`,`pa_designation`,`pb_designation`,`pr_status`,`p1_status`,`p2_status`,`p3_status`,`pa_status`,`pb_status`,  pr_post_stat,p1_post_stat,p2_post_stat,p3_post_stat,pa_post_stat,pb_post_stat, `pr_officecd`,`p1_officecd`,`p2_officecd`,`p3_officecd`,`pa_officecd`,`pb_officecd`,`pr_officename`,`p1_officename`,`p2_officename`, `p3_officename`,`pa_officename`,`pb_officename`,`pr_officeaddress`,`p1_officeaddress`,`p2_officeaddress`,`p3_officeaddress`, `pa_officeaddress`,`pb_officeaddress`,`pr_postoffice`,`p1_postoffice`,`p2_postoffice`,`p3_postoffice`,`pa_postoffice`, `pb_postoffice`,`pr_subdivision`,`p1_subdivision`,`p2_subdivision`,`p3_subdivision`,`pa_subdivision`,`pb_subdivision`, `pr_policestn`,`p1_policestn`,`p2_policestn`,p3_policestn,`pa_policestn`,`pb_policestn`,`district`,`pr_pincode`,`p1_pincode`, `p2_pincode`,`p3_pincode`,`pa_pincode`,`pb_pincode`,`dcrcgrp`,`dc_venue`,`dc_address`,`dc_date`,dc_time,`rc_venue`,`traingcode`, `training_venue`,`venuecode`,`venue_addr1`,`venue_addr2`,`training_date`,`training_time`,polldate,polltime) 
select distinct pb_officecd,pb_status,`groupid`,`assembly`,`assembly_name`,`mem_no`,`pccd`,`pcname`,`pr_personcd`,`p1_personcd`,`p2_personcd`,
`p3_personcd`, `pa_personcd`,`pb_personcd`,`pr_name`,`p1_name`,`p2_name`,`p3_name`,`pa_name`,`pb_name`,`pr_designation`,`p1_designation`,
`p2_designation`,`p3_designation`,`pa_designation`,`pb_designation`,`pr_status`,`p1_status`,`p2_status`,`p3_status`,`pa_status`,`pb_status`, pr_post_stat,p1_post_stat,p2_post_stat,p3_post_stat,pa_post_stat,pb_post_stat, `pr_officecd`,`p1_officecd`,`p2_officecd`,`p3_officecd`,`pa_officecd`,`pb_officecd`,`pr_officename`,`p1_officename`,`p2_officename`, `p3_officename`,`pa_officename`,`pb_officename`,`pr_officeaddress`,`p1_officeaddress`,`p2_officeaddress`,`p3_officeaddress`, `pa_officeaddress`,`pb_officeaddress`,`pr_postoffice`,`p1_postoffice`,`p2_postoffice`,`p3_postoffice`,`pa_postoffice`, `pb_postoffice`,`pr_subdivision`,`p1_subdivision`,`p2_subdivision`,`p3_subdivision`,`pa_subdivision`,`pb_subdivision`, `pr_policestn`,`p1_policestn`,`p2_policestn`,p3_policestn,`pa_policestn`,`pb_policestn`,`district`,`pr_pincode`,`p1_pincode`, `p2_pincode`,`p3_pincode`,`pa_pincode`,`pb_pincode`,`dcrcgrp`,`dc_venue`,`dc_address`,`dc_date`,dc_time,`rc_venue`,`traingcode`, `training_venue`,`venuecode`,`venue_addr1`,`venue_addr2`,`training_date`,`training_time`,polldate,polltime
from second_appt where   mem_no='6'";
$i=execUpdate($sql33);

echo "Completed";
?>