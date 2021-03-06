<?php
/**
 * Interface to edit place locations
 *
 * phpGedView: Genealogy Viewer
 * Copyright (C) 2002 to 2008 PGV Development Team. All rights reserved.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @package PhpGedView
 * @subpackage Edit
 * @version $Id: flags.php 4462 2008-12-08 00:57:39Z canajun2eh $
 */

if (!defined('PGV_PHPGEDVIEW')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

require_once "config.php";
require "modules/googlemap/defaultconfig.php";
if (file_exists('modules/googlemap/config.php')) require('modules/googlemap/config.php');
require "includes/functions/functions_edit.php";
require $INDEX_DIRECTORY."pgv_changes.php";

loadLangFile("pgv_facts, googlemap:lang, googlemap:help_text");

if (isset($_REQUEST['countrySelected'])) $countrySelected = $_REQUEST['countrySelected'];
if (isset($_REQUEST['action'])) $action = $_REQUEST['action'];

$saveLanguage = $LANGUAGE;
$LANGUAGE = $deflang;
loadLangFile("pgv_country");
$LANGUAGE = $saveLanguage;

if(!function_exists('scandir')) {
	function scandir($dir, $sortorder = 0) {
		if(is_dir($dir)) {
			$dirlist = opendir($dir);
			while( ($file = readdir($dirlist)) !== false) {
				if(!is_dir($file)) {
					$files[] = $file;
				}
			}
			($sortorder == 0) ? asort($files) : rsort($files); // arsort was replaced with rsort
		return $files;
		} else {
			return FALSE;
			break;
		}
	}
}

if(!isset($countrySelected)) $countrySelected="Countries";

print_simple_header($pgv_lang["flags_edit"]);

$country = array();
$rep = opendir('./places/flags/');
while ($file = readdir($rep)) {
	if (stristr($file, ".gif")) {
		$country[] = substr($file, 0, strlen($file)-4);
	}
}
closedir($rep);
sort($country);

if($countrySelected == "Countries") {
	$flags = $country;
}
else {
	$flags = array();
	$rep = opendir('./places/'.$countrySelected.'/flags/');
	while ($file = readdir($rep)) {
		if (stristr($file, ".gif")) {
			$flags[] = substr($file, 0, strlen($file)-4);
		}
	}
	closedir($rep);
	sort($flags);
}

if ($action == "ChangeFlag") {
?>
	<script type="text/javascript">
	<!--
		function edit_close() {
<?php if($_POST["selcountry"] == "Countries") { ?>
			window.opener.document.editplaces.icon.value = "places/flags/<?php echo $flags[$_POST["FLAGS"]];?>.gif";
			window.opener.document.getElementById('flagsDiv').innerHTML = "<img src=\"places/flags/<?php echo $country[$_POST["FLAGS"]];?>.gif\">&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"change_icon();return false;\"><?php echo $pgv_lang["pl_change_flag"]?></a>&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"remove_icon();return false;\"><?php echo $pgv_lang["pl_remove_flag"]?></a>";
<?php } else { ?>
			window.opener.document.editplaces.icon.value = "places/<?php echo $countrySelected."/flags/".$flags[$_POST["FLAGS"]];?>.gif";
			window.opener.document.getElementById('flagsDiv').innerHTML = "<img src=\"places/<?php echo $countrySelected."/flags/".$flags[$_POST["FLAGS"]];?>.gif\">&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"change_icon();return false;\"><?php echo $pgv_lang["pl_change_flag"]?></a>&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"remove_icon();return false;\"><?php echo $pgv_lang["pl_remove_flag"]?></a>";
<?php } ?>
			window.close();
		}
	//-->
	</script>
<?php
	if ($EDIT_AUTOCLOSE && !PGV_DEBUG) {
		echo "\n<script type=\"text/javascript\">\n<!--\nedit_close();\n//-->\n</script>";
	}
	echo "<div class=\"center\"><a href=\"javascript:;\" onclick=\"edit_close();\">".$pgv_lang["close_window"]."</a></div><br />\n";
	print_simple_footer();
	exit;
}
else {
?>
<script type="text/javascript">
<!--
	function enableButtons() {
		document.flags.save1.disabled = "";
		document.flags.save2.disabled = "";
	}

	function selectCountry() {
		if (document.flags.COUNTRYSELECT.value == "Countries") {
			window.location="module.php?mod=googlemap&pgvaction=flags";
		}
		else {
			window.location="module.php?mod=googlemap&pgvaction=flags&countrySelected=" + document.flags.COUNTRYSELECT.value;
		}
	}

	function edit_close() {
		window.close();
	}

var helpWin;
function helpPopup(which) {
	if ((!helpWin)||(helpWin.closed)) helpWin = window.open('module.php?mod=googlemap&pgvaction=editconfig_help&help='+which,'_blank','left=50,top=50,width=500,height=320,resizable=1,scrollbars=1');
	else helpWin.location = 'modules/googlemap/editconfig_help.php?help='+which;
	return false;
}

function getHelp(which) {
	if ((helpWin)&&(!helpWin.closed)) helpWin.location='module.php?mod=googlemap&pgvaction=editconfig_help&help='+which;
}

//-->
</script>
<?php

}
	if (!isset($_SESSION['flags_countrylist'])) {
		$countryList = array();
		$placesDir = scandir('./places/');
		for ($i = 0; $i < count($country); $i++) {
			if (count(preg_grep('/'.$country[$i].'/', $placesDir)) != 0) {
				$rep = opendir('./places/'.$country[$i].'/');
				while ($file = readdir($rep)) {
					if (stristr($file, "flags")) {
						$countryList[] = $country[$i];
					}
				}
				closedir($rep);
			}
		}
		$_SESSION['flags_countrylist'] = serialize($countryList);
	} else {
		$countryList = unserialize($_SESSION['flags_countrylist']);
	}
?>

<form method="post" id="flags" name="flags" action="module.php?mod=googlemap&pgvaction=flags&countrySelected=<?php echo $countrySelected;?>">
	<input type="hidden" name="action" value="ChangeFlag" />
	<input type="hidden" name="selcountry" value="<?php echo $countrySelected;?>" />
	<input id="savebutton" name="save1" type="submit" disabled="true" value="<?php echo $pgv_lang["save"];?>" /><br />
	<table class="facts_table">
		<tr>
			<td class="optionbox" colspan="4">
				<?php print_help_link("PLE_FLAGS_help", "qm", "PLE_FLAGS");?>
				<select name="COUNTRYSELECT" dir="ltr" tabindex="0" onchange="selectCountry()">
					<option value="Countries"><?php echo $pgv_lang["pl_countries"]; ?></option>
					<?php for ($i = 0; $i < count($countryList); $i++) {
						echo "	<option value=\"".$countryList[$i]."\"";
						if ($countrySelected == $countryList[$i]) echo " selected=\"selected\" ";
						echo ">".$countries[$countryList[$i]]."</option>\n";
					} ?>
				</select>
			</td>
		</tr>
		<tr>
<?php
	$j = 1;
	for ($i = 0; $i < count($flags); $i++) {
		if ($countrySelected == "Countries") {
			$tempstr = "	<td><input type=\"radio\" dir=\"ltr\" tabindex=\"".($i+1)."\" name=\"FLAGS\" value=\"".$i."\" onchange=\"enableButtons();\"><img src=\"places/flags/".$flags[$i].".gif\" alt=\"".$flags[$i]."\"  title=\"";
			if (array_key_exists( $country[$i], $countries))
				$tempstr .=$countries[$country[$i]];
			else if ($flags[$i]=="blank") {
				$tempstr .=$countries["???"];
				$flags[$i]="???";
			}
			else
				$tempstr .= $flags[$i];
			echo $tempstr."\">&nbsp;&nbsp;".$flags[$i]."</input></td>\n";
		}
		else {
			echo "	<td><input type=\"radio\" dir=\"ltr\" tabindex=\"".($i+1)."\" name=\"FLAGS\" value=\"".$i."\" onchange=\"enableButtons();\"><img src=\"places/".$countrySelected."/flags/".$flags[$i].".gif\">&nbsp;&nbsp;".$flags[$i]."</input></td>\n";
		}
		if ($j == 4) {
			echo "	</tr><tr>\n";
			$j = 0;
		}
		$j = $j + 1;
	}
?>
		</tr>
	</table>
	<input id="savebutton" name="save2" type="submit" disabled="true" value="<?php echo $pgv_lang["save"];?>" /><br />
</form>
<?php
echo "<div class=\"center\"><a href=\"javascript:;\" onclick=\"edit_close();\">".$pgv_lang["close_window"]."</a></div><br />\n";

print_simple_footer();
?>
