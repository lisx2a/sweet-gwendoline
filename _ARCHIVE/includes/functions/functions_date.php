<?php
/**
* Date Functions that can be used by any page in PGV
*
* phpGedView: Genealogy Viewer
* Copyright (C) 2002 to 2009 PGV Development Team.  All rights reserved.
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
* @version $Id: functions_date.php 4881 2009-01-23 09:18:22Z fisharebest $
*/

if (!defined('PGV_PHPGEDVIEW')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

define('PGV_FUNCTIONS_DATE_PHP', '');

require_once 'includes/classes/class_date.php';

/**
* translate gedcom age string
*
* Examples:
* 4y 8m 10d.
* Chi
* INFANT
*
* @param string $agestring gedcom AGE field value
* @param bool $show_years;
* @return string age in user language
* @see http://homepages.rootsweb.com/~pmcbride/gedcom/55gcch2.htm#AGE_AT_EVENT
*/
function get_age_at_event($agestring, $show_years) {
	global $pgv_lang, $lang_short_cut, $LANGUAGE;

	// Allow special processing for different languages
	$func="age_localisation_{$lang_short_cut[$LANGUAGE]}";
	if (!function_exists($func)) {
		$func="DefaultAgeLocalisation";
	}
	// Localise the age
	$func($agestring, $show_years);

	return $agestring;
}

// Localise an age.  This is a default function, and may be overridden in includes/extras/functions.xx.php
function DefaultAgeLocalisation(&$agestring, &$show_years) {
	global $pgv_lang;

	$agestring=preg_replace(
		array(
			'/\bchi(ld)?\b/i',
			'/\binf(ant)?\b/i',
			'/\bsti(llborn)?\b/i',
			'/\b1y/i',
			'/(\d+)y/i',
			'/\b1m/i',
			'/(\d+)m/i',
			'/\b1d/i',
			'/(\d+)d/i',
			'/\b1w/i',      
			'/(\d+)w/i'		
		),
		array(
			$pgv_lang['child'],
			$pgv_lang['infant'],
			$pgv_lang['stillborn'],
			($show_years || preg_match('/[dm]/', $agestring)) ? '1 '.$pgv_lang['year1'] : '1',
			($show_years || preg_match('/[dm]/', $agestring)) ? '$1 '.$pgv_lang['years'] : '$1',
			'1 '.$pgv_lang['month1'],
			'$1 '.$pgv_lang['months'],
			'1 '.$pgv_lang['day1'],
			'$1 '.$pgv_lang['days'],
	  	'1 '.$pgv_lang['week1'],		 
			'$1 '.$pgv_lang['weeks']	
		),
		$agestring
	);
}

/**
* Parse a time string into its different parts
* @param string $timestr the time as it was taken from the TIME tag
* @return array returns an array with the hour, minutes, and seconds
*/
function parse_time($timestr)
{
	$time = explode(':', $timestr.':0:0');
	$time[0] = min(((int) $time[0]), 23); // Hours: integer, 0 to 23
	$time[1] = min(((int) $time[1]), 59); // Minutes: integer, 0 to 59
	$time[2] = min(((int) $time[2]), 59); // Seconds: integer, 0 to 59
	$time['hour'] = $time[0];
	$time['minutes'] = $time[1];
	$time['seconds'] = $time[2];

	return $time;
}

////////////////////////////////////////////////////////////////////////////////
// This pair of functions converts between the internal gedcom date and the
// text that the user sees when editing a date on a form.
// They can be overridden by the presence of gedcom_to_edit_date_XX() in
// includes/extras/functions.XX.php
////////////////////////////////////////////////////////////////////////////////
function default_gedcom_to_edit_date($datestr)
{
	// Don't do too much here - it will annoy experienced PGV users.
	// Maybe just remove calendar escapes, which we will be able to automatically
	// recreate?
	return $datestr;
}
function default_edit_to_gedcom_date($datestr)
{
	global $pgv_lang;
	// The order of these keywords is significant, to avoid partial matches.  In particular:
	// ads:adr_leap_year:adr to prevent "Adar" matching "Adar Sheni" or "Adar I" matching "Adar II"
	// \b prevents the german JULI matching @#DJULIAN@, etc.

	foreach (array('jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec','vend','brum','frim','nivo','pluv','vent','germ','flor','prai','mess','ther','fruc','comp','tsh','csh','ksl','tvt','shv','nsn','iyr','svn','tmz','aav','ell','abt','aft','bef','bet','cal','est','from','int','to','b.c.') as $keyword) {
		$datestr=preg_replace("/\b".str_replace('.','[.]?',$pgv_lang[$keyword])."\b/i", strtoupper($keyword), $datestr);
	}

	foreach (array('ads','adr_leap_year','adr','jan_1st','feb_1st','mar_1st','apr_1st','may_1st','jun_1st','jul_1st','aug_1st','sep_1st','oct_1st','nov_1st','dec_1st') as $keyword) {
		$datestr=preg_replace("/\b".str_replace('.','[.]?',$pgv_lang[$keyword])."\b/i", strtoupper(substr($keyword,0,3)), $datestr);
	}

	foreach (array('and') as $keyword) {
		$datestr=preg_replace("/\b".str_replace('.','[.]?',$pgv_lang[$keyword])."\b/i", strtoupper($keyword), $datestr);
	}

	return $datestr;
}

////////////////////////////////////////////////////////////////////////////////
// Convert a unix timestamp into a formated date-time value, for logs, etc.
// We can't just use date("$DATE_FORMAT- $TIME_FORMAT") as this doesn't
// support internationalisation.
// Don't attempt to convert into other calendars, as not all days start at
// midnight, and we can only get it wrong.
////////////////////////////////////////////////////////////////////////////////
function format_timestamp($time) {
	global $DATE_FORMAT, $TIME_FORMAT;
	
	return
		strip_tags(timestamp_to_gedcom_date($time)->Display(false, $DATE_FORMAT)).
		' - '.
		date($TIME_FORMAT, $time);
}

////////////////////////////////////////////////////////////////////////////////
// Get the current julian day on the server
////////////////////////////////////////////////////////////////////////////////
function server_jd() {
	return timestamp_to_jd(time());
}

////////////////////////////////////////////////////////////////////////////////
// Get the current julian day on the client
////////////////////////////////////////////////////////////////////////////////
function client_jd() {
	return timestamp_to_jd(client_time());
}

////////////////////////////////////////////////////////////////////////////////
// Convert a unix-style timestamp into a julian-day
////////////////////////////////////////////////////////////////////////////////
function timestamp_to_jd($time) {
	return timestamp_to_gedcom_date($time)->JD();
}

////////////////////////////////////////////////////////////////////////////////
// Convert a unix-style timestamp into a GedcomDate object
////////////////////////////////////////////////////////////////////////////////
function timestamp_to_gedcom_date($time) {
	return new GedcomDate(strtoupper(date('j M Y', $time)));
}

////////////////////////////////////////////////////////////////////////////////
// Get the current timestamp of the client, not the server
////////////////////////////////////////////////////////////////////////////////
function client_time() {
	if (isset($_SESSION['timediff'])) {
		return time()-$_SESSION['timediff'];
	} else {
		return time();
	}
}

?>
