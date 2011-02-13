<?php require_once 'header.php'; ?>

	<img src="images/updates_header.jpg" width="754" alt="Sweet Gwendoline Updates" />
	<div style="margin-top:30px;">						
<?php
/* grab updates from twitter and display */

$xml = "http://twitter.com/statuses/user_timeline/sweetgwendolin.xml";
echo '<ul>';
$data = simplexml_load_file($xml);
if($data){
	foreach($data->status as $update){
		echo '<li>';
		echo twitterify($update->text);
		echo '<small>'.date('m/d/Y', strtotime($update->created_at)).'</small>';
		echo '</li>';
		echo '<br />';
	}
} else {
	echo "<li>an error has occured while attempting to retrive update information from twitter</li>";
}
echo '</ul>';

function twitterify($ret) {
  $ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
  $ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
  $ret = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $ret);
  $ret = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $ret);
  return $ret;
}
?>	

</div>
<?php require_once 'footer.php'; ?>
