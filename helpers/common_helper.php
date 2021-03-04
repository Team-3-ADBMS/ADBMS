<?php

function islogin()
{
	$CI = &get_instance();
	if ($CI->session->userdata('user')) {
		return true;
	} else {
		return false;
	}
}

function dd()
{
	echo "<pre>";
	$args = func_get_args();
	foreach ($args as $arg) {
		var_dump($arg);
		echo "<br>";
	}
	exit;
}

function getCusAllAccountIDs()
{
	$CI = &get_instance();
	$customer_id = $CI->session->userdata('user')['customer_id'];
	$query = "SELECT ACCT_ID FROM ACCOUNT_MST AC 
				WHERE AC.CUSTOMER_ID = '$customer_id'";
	$query = $CI->db->query($query);
	return $query->result_array();
}
