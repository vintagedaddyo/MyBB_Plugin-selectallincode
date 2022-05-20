<?php
/*
 * MyBB: Select All In Code's Quote Only fade
 *
 * File: SelectAllinCodeQuoteonlyfade.php
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
$plugins->add_hook("showthread_start","SAICAPQuoteOnlyfade");

// Load in portal 
$plugins->add_hook("portal_start","SAICAPQuoteOnlyFade");

function SelectAllinCodeQuoteOnlyfade_info()
{
    global $lang;

    $lang->load("SelectAllinCodeQuoteOnlyfade");
    
    $lang->selectallincodequoteonlyfade_Desc = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="float:right;">' .
        '<input type="hidden" name="cmd" value="_s-xclick">' . 
        '<input type="hidden" name="hosted_button_id" value="AZE6ZNZPBPVUL">' .
        '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">' .
        '<img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1">' .
        '</form>' . $lang->selectallincodequoteonlyfade_Desc;

    return Array(
        'name' => $lang->selectallincodequoteonlyfade_Name,
        'description' => $lang->selectallincodequoteonlyfade_Desc,
        'website' => $lang->selectallincodequoteonlyfade_Web,
        'author' => $lang->selectallincodequoteonlyfade_Auth,
        'authorsite' => $lang->selectallincodequoteonlyfade_AuthSite,
        'version' => $lang->selectallincodequoteonlyfade_Ver,
        'codename' => $lang->selectallincodequoteonlyfade_CodeName,
        'compatibility' => $lang->selectallincodequoteonlyfade_Compat
    );
}

function SelectAllinCodeQuoteOnlyfade_activate()
{
}

function SelectAllinCodeQuoteOnlyfade_deactivate()
{
}

function SAICAPQuoteOnlyfade()
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

.blockquote-collapsed {
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

  .blockquote-collapsed:after {
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

  .blockquote-collapsed:hover:after {
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
                       $(active).addClass('blockquote-collapsed').click(function() {
                           $(active).off(\"click\").removeClass('blockquote-collapsed');
                       });
                   }
               };

           expand();

           $(this).on(\"elementResized\", expand).find(\"img\").one(\"load\", expand);
       });
   });
</script>";
  global $lang;

  $lang->load("SelectAllinCodeQuoteOnlyfade");

 // $lang->load("global", false, true);

  $lang->php_code .= ''.$lang->selectallincodequoteonlyfade_PHP_Code.'';
  $lang->code .= ''.$lang->selectallincodequoteonlyfade_Code.'';
}
?>