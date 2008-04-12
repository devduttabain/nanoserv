<?php
//
// NanoServ: Home Server
// | Module -> Media
//

require("include/functions.php"); 
require('include/header.php');
$opt["width"] = $_GET["width"];$opt["height"] = $_GET["height"];function optional($alt,$default) {	if(!empty($alt)) return $alt; else return $default;}?><script src="include/jquery.js" type="text/javascript"></script><script type="text/javascript"><!--function switch_media(newitem) {	if(newitem != "modules/media/backend.php") {$.post("modules/media/backend.php", {file: newitem});}	$("#newplaylist").load('modules/media/backend.php'); $("#playlist").html($("#newplaylist").html());	$("#player").attr({ src: "modules/media/player.php?file="+escape(newitem)+"&width=<?php echo optional($opt["width"],$cfg["media-player"]["default-width"])?>&height=<?php echo optional($opt["height"],$cfg["media-player"]["default-height"])?>" });}function syncPlaylist() {	if($("#synctoserver").attr("checked") == true) {		$("#newplaylist").load('modules/media/backend.php');		newplaylist = $("#newplaylist").html();		playlist = $("#playlist").html();		if(newplaylist != playlist) {			$("#playlist").html(newplaylist);			switch_media("modules/media/backend.php");		}		timeout = setTimeout("syncPlaylist()", 2000);	}}function jumpMenu() { 	var newIndex = document.sizejumpform.sizejump.selectedIndex; 	cururl = document.sizejumpform.sizejump.options[ newIndex ].value; 	window.location.assign( cururl );}$(function() {	$("#synctoserver").click(function() {		syncPlaylist();	});});--></script><div id="box" style="width:<?php echo optional($opt["width"],$cfg["media-player"]["default-width"])+300;?>px;height:480px;">	<iframe id="player"  src="modules/media/player.php?width=<?php echo optional($opt["width"],$cfg["media-player"]["default-width"])?>&amp;height=<?php echo optional($opt["height"],$cfg["media-player"]["default-height"])?>" width="<?php echo optional($opt["width"],$cfg["media-player"]["default-width"])?>" height="<?php echo optional($opt["height"],$cfg["media-player"]["default-height"])?>" frameborder="0" scrolling="no" style="float:left;padding:5px;"></iframe>	<iframe id="browser" src="modules/media/browser.php" width="280" height="<?php echo optional($opt["height"],$cfg["media-player"]["default-height"])?>" frameborder="0" scrolling="auto" align="left"></iframe>	<div id="mediasettings">		<label for="synctoserver"><input id="synctoserver" name="synctoserver" type="checkbox" value="1" /> Sync to Server</label>&nbsp;&nbsp;		<form name="sizejumpform" action="media.php">			<select name="sizejump" onchange="jumpMenu()">				<option value="media.php?width=720&amp;height=480" <?php if($opt["width"]==720) echo "selected"?>>720x480</option>				<option value="media.php?width=640&amp;height=480" <?php if($opt["width"]==640) echo "selected"?>>640x480</option>				<option value="media.php?width=320&amp;height=240" <?php if($opt["width"]==320) echo "selected"?>>320x240</option>			</select>			<input type="button" name="Button1" value="Go" onclick="jumpMenu()" />		</form>	</div></div><div id="playlist"></div><div id="newplaylist"></div><?php include('include/footer.php'); ?>