<html>

<?php

$user = "gathermoney";
$nameUrl = "https://apps.runescape.com/runemetrics/quests?user=$user";
//
$json = file_get_contents($nameUrl);
$questJsonArray = json_decode($json);
$allQuests = $questJsonArray->quests;
if(count($allQuests > 0))
{
	echo "Quests for user <b>$user </b><br/>";
}
for($val = 0; $val < count($allQuests); $val++)
{
	$questJson = $allQuests[$val];
	$quest = new Quest($questJson->title, $questJson->status,$questJson->difficulty,$questJson->members, $questJson->questPoints,$questJson->userEligible);
	echo $quest->title . ": " . $quest->status . "<br/>";
}

class Quest
{
	public $title;
	public $status;
	public $difficulty;
	public $members;
	public $questpoints;
	public $userEligible;
	
	public function __construct($title, $status, $difficulty, $members, $qp, $eligible)
	{
		$this->title = $title;
		$this->status = $status;
		$this->difficulty = $difficulty;
		$this->members = $members;
		$this->questpoints = $qp; 
		$this->userEligible = $eligible;
	}
}
?>

</html>
