<?php
/*
 * MyBB: Select All In Code's Plus
 *
 * File: SelectAllinCode.php
 * 
 * Authors: Edson Ordaz & Vintagedaddyo
 *
 * MyBB Version: 1.8
 *
 * Plugin Version: 1.2
 * 
 */

if(!defined("IN_MYBB"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

// Load in showthread
$plugins->add_hook("showthread_start","SAICAP");

// Load in portal 
$plugins->add_hook("portal_start","SAICAP");

function SelectAllinCode_info()
{
    global $lang;

    $lang->load("SelectAllinCode");
    
    $lang->selectallincode_Desc = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="float:right;">' .
        '<input type="hidden" name="cmd" value="_s-xclick">' . 
        '<input type="hidden" name="hosted_button_id" value="AZE6ZNZPBPVUL">' .
        '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">' .
        '<img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1">' .
        '</form>' . $lang->selectallincode_Desc;

    return Array(
        'name' => $lang->selectallincode_Name,
        'description' => $lang->selectallincode_Desc,
        'website' => $lang->selectallincode_Web,
        'author' => $lang->selectallincode_Auth,
        'authorsite' => $lang->selectallincode_AuthSite,
        'version' => $lang->selectallincode_Ver,
        'codename' => $lang->selectallincode_CodeName,
        'compatibility' => $lang->selectallincode_Compat
    );
}

function SelectAllinCode_activate()
{
}

function SelectAllinCode_deactivate()
{
}

function SAICAP()
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
       s.setBaseAndExtent(e, 0, e.parentNode, 1);
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
<!-- Blockquote Expand/Collapse -->
<script type=\"text/javascript\">
$(document).ready(function () {
    $('blockquote').addClass('collapsed');
        $('blockquote').click(function(){
        $(this).toggleClass('expanded collapsed');
        e.preventDefault();
    });
});
</script>
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

  $lang->load("SelectAllinCode");

 // $lang->load("global", false, true);

  $lang->php_code .= ''.$lang->selectallincode_PHP_Code.'';
  $lang->code .= ''.$lang->selectallincode_Code.'';
}
?>