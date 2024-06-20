function OnClickAddResultsBtn()
{
	location.assign("/pages/addResultsPage.php"); 	
}

function OnClickEditSpheresBtn()
{
	location.assign("/pages/editSpheresPage.php"); 	
}

function OnClickHistoryBtn()
{
	location.assign("/pages/historyPage.php"); 	
}

function onExit()
{
    document.cookie = "message=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    ocument.cookie = "message=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/components;";
    document.cookie = "email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/components;";
}