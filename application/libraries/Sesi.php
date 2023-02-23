<?php
class Sesi
{
	function semua_sesi()
	{
		echo "<pre>";
		print_r ($this->session->all_userdata());
		echo "</pre>";
	}
}