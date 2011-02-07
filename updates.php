<?php include("_inc/hd.php"); ?>
<div id="main_container">
<div id="navbar">
	<ul>
		<li><img src="images/sglogo_small.png" style="width:250px;display:block;float:left;"/></li>
		<li style="display:block;float:left;padding:100px 0 0 10px;"><a href="collection.php">COLLECTION</a></li>
		<li style="display:block;float:left;padding:100px 0 0 40px;"><a href="updates.php">NEWS & EVENTS</a></li>
		<li style="display:block;float:left;padding:100px 0 0 40px;"><a href="about.php">ABOUT US</a></li>
		<li style="display:block;float:left;padding:100px 0 0 40px;"><a href="#">LINKS</a></li>
		<li style="display:block;float:left;padding:100px 0 0 40px;"><a href="contactus.php">CONTACT</a></li>
	</ul></div>
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
<div style="margin-top:80px;">
	<ul>
	<li><small>&copy;2010 Sweet Gwendoline Clothing LLC</small></li></ul>
</div>

		</div>

