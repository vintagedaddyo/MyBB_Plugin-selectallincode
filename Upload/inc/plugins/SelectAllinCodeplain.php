<?php
/*
 * MyBB: Select All In Code plain
 *
 * File: SelectAllinCodeplain.php
 * 
 * Authors: Edson Ordaz & Vintagedaddyo
 *
 * MyBB Version: 1.8
 *
 * Plugin Version: 1.3
 * 
 */

if(!defined("IN_MYBB"))
{
  die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

// Load in showthread
$plugins->add_hook("showthread_start","SAICAPCodePlain");

// Load in portal 
$plugins->add_hook("portal_start","SAICAPCodePlain");

function SelectAllinCodePlain_info()
{
    global $lang;

    $lang->load("SelectAllinCodeplain");
    
    $lang->selectallincodeplain_Desc = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="float:right;">' .
        '<input type="hidden" name="cmd" value="_s-xclick">' . 
        '<input type="hidden" name="hosted_button_id" value="AZE6ZNZPBPVUL">' .
        '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">' .
        '<img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1">' .
        '</form>' . $lang->selectallincodeplain_Desc;

    return Array(
        'name' => $lang->selectallincodeplain_Name,
        'description' => $lang->selectallincodeplain_Desc,
        'website' => $lang->selectallincodeplain_Web,
        'author' => $lang->selectallincodeplain_Auth,
        'authorsite' => $lang->selectallincodeplain_AuthSite,
        'version' => $lang->selectallincodeplain_Ver,
        'codename' => $lang->selectallincodeplain_CodeName,
        'compatibility' => $lang->selectallincodeplain_Compat
    );
}

function SelectAllinCodePlain_activate()
{
}

function SelectAllinCodePlain_deactivate()
{
}

function SAICAPCodePlain()
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
</script>";
  global $lang;

  $lang->load("SelectAllinCodeplain");

 // $lang->load("global", false, true);

  $lang->php_code .= ''.$lang->selectallincodeplain_PHP_Code.'';
  $lang->code .= ''.$lang->selectallincodeplain_Code.'';
}
?>