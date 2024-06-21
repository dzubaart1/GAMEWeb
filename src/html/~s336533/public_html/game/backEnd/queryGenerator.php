<?php

	function QueryAllFromTable($table)
	{	
		return "SELECT * FROM $table";
	}

	function QuerySpecificUser($email)
	{
		return "SELECT * FROM gameUsers WHERE email = '$email';";
	}

	function QueryAddNewUser($name, $email, $password)
	{
		return "INSERT INTO gameUsers (name, email, password) VALUES ('$name', '$email', '$password');";
	}

	function QueryAllSpheresForEmail($email)
	{
		return "SELECT * FROM gameSpheres WHERE email = '$email';";
	}

	function QueryHistoryRange($email, $dateFrom, $dateTo)
	{
		return "SELECT date::date, sphere, SUM(xp)
				FROM gameXp
				WHERE email = '$email' AND date::date > '$dateFrom' AND date::date < '$dateTo'
				GROUP BY date::date, email, sphere ORDER BY SUM(xp) DESC;";
	}

	function QueryAddResults($email, $sphere, $xp)
	{
		return "INSERT INTO gameXP VALUES ('$email', '$sphere', NOW(), $xp);";
	}

	function QueryGetUserSpheresXPAtAll($email)
	{
		return "SELECT sphere, SUM(xp) FROM gameXP WHERE email='$email' GROUP BY sphere ORDER BY SUM(xp) DESC;";
	}

	function QueryAddSphere($email, $sphere)
	{
		return "INSERT INTO gameSpheres VALUES ('$email', '$sphere', '#c0c0c0');";
	}

	function QueryRemoveSphere($email, $sphere)
	{
		return "DELETE FROM gameSpheres WHERE sphere = '$sphere' AND email = '$email';";
	}

	function QueryUpdateSphere($email, $newSphere, $oldSphere, $color)
	{

		return "UPDATE gameSpheres SET sphere='$newSphere', color='$color' WHERE email = '$email' AND sphere='$oldSphere';";
	}
?>
