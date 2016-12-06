<?php
if(!defined("IN_MYBB"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

$plugins->add_hook("showthread_start","SAICAPQCfade");

function SAICAPQCfade_info()
{
	return array(
		"name"			=> "Select All In Code's with Quote And Code fade",
		"description"	=> "Select all in Code and PHP plus collapse and expand fade",
		"website"		=> "https://community.mybb.com/user-6029.html",
		"author"		=> "Edson Ordaz updated & modified by vintagedaddyo",
		"authorsite"	=> "https://community.mybb.com/user-6029.html",
		"version"		=> "1.1",
		"compatibility" => "18*",
		"guid"			=> "608cb4086667cdd6d0d3ba103991c309"
	);
}

function SAICAPQCfade_activate()
{
}

function SAICAPQCfade_deactivate()
{
}

function SAICAPQCfade()
{
	global $headerinclude;
	$headerinclude .= "<script type=\"text/javascript\">
function selectCode(a)
{
   var e = a.parentNode.parentNode.getElementsByTagName('CODE')[0];
   if (window.getSelection)
   {
      var s = window.getSelection();
       if (s.setBaseAndExtent)
      {
         s.setBaseAndExtent(e, 0, e, e.innerText.length - 1);
      }
      else
      {
         var r = document.createRange();
         r.selectNodeContents(e);
         s.removeAllRanges();
         s.addRange(r);
      }
   }
   else if (document.getSelection)
   {
      var s = document.getSelection();
      var r = document.createRange();
      r.selectNodeContents(e);
      s.removeAllRanges();
      s.addRange(r);
   }
   else if (document.selection)
   {
      var r = document.body.createTextRange();
      r.moveToElementText(e);
      r.select();
   }
}
</script>
<style>
.collapsed {
    margin: 0;
    opacity: 0.7;
    padding: 10px;
    overflow: hidden;
    max-height: 150px;
    position: relative;
    background: #FAFAFA; 
    text-align: justify;
    padding-bottom: 25px;
    }

  .collapsed:after {
    left: 1px;
    right: 1px;
    bottom: 0px;
    opacity: 0.9;
    height: 25px;
    color: #4A4A4A;
    font-size: 13px;
    cursor: pointer;
    line-height: 25px;
    font-weight: bold;
    text-align: center;
    position: absolute;
    background: #D3D3D3;
    content: 'Show More';
    border: 1px solid #A5A5A5;
    border-radius: 0px 0px 5px 5px; 
    -moz-border-radius: 0px 0px 5px 5px;
    -webkit-border-radius: 0px 0px 5px 5px;
    -khtml-border-radius: 0px 0px 5px 5px;
    font-family: Tahoma, Verdana, Arial, Sans-Serif;
    }

  .collapsed:hover:after {
    opacity: 1;
    color: #1A1A1A;
    background: #838383;
  } 
</style>
<!-- Blockquote Collapsed/Expand -->
<script type=\"text/javascript\">
$(document).ready(function() {
       $('blockquote').each(function() {
           var active = this,
               expand = function() {
                   if (active.offsetHeight > 250) {
                       $(active).addClass('collapsed').click(function() {
                           $(active).off(\"click\").removeClass('collapsed');
                       });
                   }
               };

           expand();
           $(this).on(\"elementResized\", expand).find(\"img\").one(\"load\", expand);
       });
   });
</script>
<!-- Codeblock Collapsed/Expand -->
<script type=\"text/javascript\">
$(document).ready(function() {
       $('div.codeblock').each(function() {
           var active = this,
               expand = function() {
                   if (active.offsetHeight > 250) {
                       $(active).addClass('collapsed').click(function() {
                           $(active).off(\"click\").removeClass('collapsed');
                       });
                   }
               };

           expand();
           $(this).on(\"elementResized\", expand).find(\"img\").one(\"load\", expand);
       });
   });
</script>";
  global $lang;
  $lang->load("global", false, true);
  $lang->php_code .= " <a href=# onclick=\"selectCode(this); return false;\">(Select All)</a>";
  $lang->code .= " <a href=# onclick=\"selectCode(this); return false;\">(Select All)</a>";
}
?>