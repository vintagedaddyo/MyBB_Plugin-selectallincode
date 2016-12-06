<?php
if(!defined("IN_MYBB"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

$plugins->add_hook("showthread_start","SAICAPCodeOnly");

function SelectAllinCodeOnly_info()
{
	return array(
		"name"			=> "Select All In Code's Plus",
		"description"	=> "Select all in Code and PHP plus expand and collapse",
		"website"		=> "https://community.mybb.com/user-6029.html",
		"author"		=> "Edson Ordaz updated & modified by vintagedaddyo",
		"authorsite"	=> "https://community.mybb.com/user-6029.html",
		"version"		=> "1.1",
		"compatibility" => "18*",
		"guid"			=> "608cb4086667cdd6d0d3ba103991c309"
	);
}

function SelectAllinCodeOnly_activate()
{
}

function SelectAllinCodeOnly_deactivate()
{
}

function SAICAPCodeOnly()
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
.no_bottom_border {
    border-bottom: 0;
}
.collapsed, .expanded {
    overflow: hidden;
    border: 1px solid #D3D3D3;
    background: #FAFAFA;
    text-align: justify;
    padding: 10px;
    border-radius: 5px;
    margin: 0;
    position: relative;
}
.collapsed {
    max-height: 75px;
    opacity: 0.7;
}
.expanded {
    height: 100%;
    opacity: 1;
    padding-bottom: 35px;
}
.collapsed:after, .expanded:after {
    position: absolute;
    height: 25px;
    bottom: 0px;
    left: 1px;
    right: 1px;
    cursor: pointer;
    border: 1px solid #A5A5A5;
    background: #D3D3D3;
    color: #4A4A4A;
    text-align: center;
    line-height: 25px;
    font-weight: bold;
    font-family: Tahoma, Verdana, Arial, Sans-Serif;
    font-size: 13px;
    border-radius: 0px 0px 5px 5px;
}
.collapsed:after {
    content: 'Show More';
    opacity: 0.9;
}
.expanded:after {
    content: 'Show Less';
    opacity: 0.7;
}
.collapsed:hover:after, .expanded:hover:after {
    opacity: 1;
    background: #838383;
    color: #1A1A1A;
}
</style>
<!-- Codeblock Expand/Collapse -->
<script type=\"text/javascript\">
$(document).ready(function () {
    $('div.codeblock').addClass('collapsed');
        $('div.codeblock').click(function(){
        $(this).toggleClass('expanded collapsed');
        e.preventDefault();
    });
});
</script>";
	global $lang;
	$lang->load("global", false, true);
	$lang->php_code .= " <a href=# onclick=\"selectCode(this); return false;\">(Select All)</a>";
	$lang->code .= " <a href=# onclick=\"selectCode(this); return false;\">(Select All)</a>";
}
?>