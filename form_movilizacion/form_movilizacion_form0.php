<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Ingreso Hoja de Rutas y Control de Combustible y Kilometraje"); } else { echo strip_tags("Ingreso Hoja de Rutas y Control de Combustible y Kilometraje"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/sys__NM__ico__NM__favicons_ame_nuevo.png">
<?php
header("X-XSS-Protection: 1; mode=block");
?>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  #quicksearchph_t {
   position: relative;
  }
  #quicksearchph_t img {
   position: absolute;
   top: 0;
   right: 0;
  }
 </style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['embutida_pdf']))
 {
 ?>
<?php
    if ((isset($this->nmgp_tipo_pdf) && $this->nmgp_tipo_pdf == "pb") || (isset($this->nmgp_cor_print) && $this->nmgp_cor_print == "PB"))
    {
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form_bw.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form_bw<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
    }
    else
    {
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
    }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_movilizacion/form_movilizacion_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_movilizacion_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).show();
       $("#sc_b_ini_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ini_" + str_pos).show();
       $("#gbl_sc_b_ini_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).show();
       $("#sc_b_ret_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ret_" + str_pos).show();
       $("#gbl_sc_b_ret_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).hide();
       $("#sc_b_ini_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ini_" + str_pos).hide();
       $("#gbl_sc_b_ini_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).hide();
       $("#sc_b_ret_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ret_" + str_pos).hide();
       $("#gbl_sc_b_ret_off_" + str_pos).show();
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).show();
       $("#sc_b_fim_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_fim_" + str_pos).show();
       $("#gbl_sc_b_fim_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).show();
       $("#sc_b_avc_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_avc_" + str_pos).show();
       $("#gbl_sc_b_avc_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).hide();
       $("#sc_b_fim_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_fim_" + str_pos).hide();
       $("#gbl_sc_b_fim_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).hide();
       $("#sc_b_avc_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_avc_" + str_pos).hide();
       $("#gbl_sc_b_avc_off_" + str_pos).show();
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_movilizacion_jquery.php');

?>
var applicationKeys = "";
applicationKeys += "ctrl+shift+right";
applicationKeys += ",";
applicationKeys += "ctrl+shift+left";
applicationKeys += ",";
applicationKeys += "ctrl+right";
applicationKeys += ",";
applicationKeys += "ctrl+left";
applicationKeys += ",";
applicationKeys += "alt+q";
applicationKeys += ",";
applicationKeys += "escape";
applicationKeys += ",";
applicationKeys += "ctrl+enter";
applicationKeys += ",";
applicationKeys += "ctrl+s";
applicationKeys += ",";
applicationKeys += "ctrl+delete";
applicationKeys += ",";
applicationKeys += "f1";
applicationKeys += ",";
applicationKeys += "ctrl+shift+c";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    case (["ctrl+shift+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_fim");
      break;
    case (["ctrl+shift+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ini");
      break;
    case (["ctrl+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ava");
      break;
    case (["ctrl+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ret");
      break;
    case (["alt+q"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_sai");
      break;
    case (["escape"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_cnl");
      break;
    case (["ctrl+enter"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_inc");
      break;
    case (["ctrl+s"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_alt");
      break;
    case (["ctrl+delete"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_exc");
      break;
    case (["f1"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_webh");
      break;
    case (["ctrl+shift+c"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_copy");
      break;
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys.inc.js"></script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys_setup.js"></script>
<script type="text/javascript">
function process_hotkeys(hotkey)
{
  if (hotkey == "sys_format_fim") {
    if (typeof scBtnFn_sys_format_fim !== "undefined" && typeof scBtnFn_sys_format_fim === "function") {
      scBtnFn_sys_format_fim();
        return true;
    }
  }
  if (hotkey == "sys_format_ini") {
    if (typeof scBtnFn_sys_format_ini !== "undefined" && typeof scBtnFn_sys_format_ini === "function") {
      scBtnFn_sys_format_ini();
        return true;
    }
  }
  if (hotkey == "sys_format_ava") {
    if (typeof scBtnFn_sys_format_ava !== "undefined" && typeof scBtnFn_sys_format_ava === "function") {
      scBtnFn_sys_format_ava();
        return true;
    }
  }
  if (hotkey == "sys_format_ret") {
    if (typeof scBtnFn_sys_format_ret !== "undefined" && typeof scBtnFn_sys_format_ret === "function") {
      scBtnFn_sys_format_ret();
        return true;
    }
  }
  if (hotkey == "sys_format_sai") {
    if (typeof scBtnFn_sys_format_sai !== "undefined" && typeof scBtnFn_sys_format_sai === "function") {
      scBtnFn_sys_format_sai();
        return true;
    }
  }
  if (hotkey == "sys_format_cnl") {
    if (typeof scBtnFn_sys_format_cnl !== "undefined" && typeof scBtnFn_sys_format_cnl === "function") {
      scBtnFn_sys_format_cnl();
        return true;
    }
  }
  if (hotkey == "sys_format_inc") {
    if (typeof scBtnFn_sys_format_inc !== "undefined" && typeof scBtnFn_sys_format_inc === "function") {
      scBtnFn_sys_format_inc();
        return true;
    }
  }
  if (hotkey == "sys_format_alt") {
    if (typeof scBtnFn_sys_format_alt !== "undefined" && typeof scBtnFn_sys_format_alt === "function") {
      scBtnFn_sys_format_alt();
        return true;
    }
  }
  if (hotkey == "sys_format_exc") {
    if (typeof scBtnFn_sys_format_exc !== "undefined" && typeof scBtnFn_sys_format_exc === "function") {
      scBtnFn_sys_format_exc();
        return true;
    }
  }
  if (hotkey == "sys_format_webh") {
    if (typeof scBtnFn_sys_format_webh !== "undefined" && typeof scBtnFn_sys_format_webh === "function") {
      scBtnFn_sys_format_webh();
        return true;
    }
  }
  if (hotkey == "sys_format_copy") {
    if (typeof scBtnFn_sys_format_copy !== "undefined" && typeof scBtnFn_sys_format_copy === "function") {
      scBtnFn_sys_format_copy();
        return true;
    }
  }
    return false;
}

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
     scQuickSearchInit(false, '');
     if (document.getElementById('SC_fast_search_t')) {
         scQuickSearchKeyUp('t', null);
     }
     scQSInit = false;
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchInit(bPosOnly, sPos) {
     if (!bPosOnly) {
       if (document.getElementById('SC_fast_search_t')) {
           if ('' == sPos || 't' == sPos) {
               scQuickSearchSize('SC_fast_search_t', 'SC_fast_search_close_t', 'SC_fast_search_submit_t', 'quicksearchph_t');
           }
       }
     }
   }
   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {
     var oInput = $('#' + sIdInput),
         oClose = $('#' + sIdClose),
         oSubmit = $('#' + sIdSubmit),
         oPlace = $('#' + sPlaceHolder),
         iInputP = parseInt(oInput.css('padding-right')) || 0,
         iInputB = parseInt(oInput.css('border-right-width')) || 0,
         iInputW = oInput.outerWidth(),
         iPlaceW = oPlace.outerWidth(),
         oInputO = oInput.offset(),
         oPlaceO = oPlace.offset(),
         iNewRight;
     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;
     oInput.css({
       'height': Math.max(oInput.height(), 16) + 'px',
       'padding-right': iInputP + 16 + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px'
     });
     oClose.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     oSubmit.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
   }
   function scQuickSearchKeyUp(sPos, e) {
     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {
       $('#SC_fast_search_close_' + sPos).show();
       $('#SC_fast_search_submit_' + sPos).hide();
     }
     else {
       $('#SC_fast_search_close_' + sPos).hide();
       $('#SC_fast_search_submit_' + sPos).show();
     }
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
     }
   }
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("form_detalle_movilizacion", "500");
    }
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['recarga'];
}
     if ('' != $this->idvehiculo)
     {
         $this->lookup_idvehiculo($look_rpc_idvehiculo);
         $look_rpc_idvehiculo =  str_replace('<', '&lt;', $look_rpc_idvehiculo);
     }
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_movilizacion_js0.php");
?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
<script type="text/javascript"> 
 // Adiciona um elemento
 //----------------------
 function nm_add_sel(sOrig, sDest, fCBack, sRow)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  // Varre itens da origem
  for (i = 0; i < oOrig.length; i++)
  {
   // Item na origem selecionado e valido
   if (oOrig.options[i].selected && !oOrig.options[i].disabled)
   {
    // Recupera valores da origem
    sText  = oOrig.options[i].text;
    sValue = oOrig.options[i].value;
    // Cria item no destino
    oDest.options[oDest.length] = new Option(sText, sValue);
    // Desabilita item na origem
    oOrig.options[i].style.color = "#A0A0A0";
    oOrig.options[i].disabled    = true;
    oOrig.options[i].selected    = false;
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (fCBack)
  {
   fCBack(sRow);
  }
 }
 // Adiciona todos os elementos
 //-----------------------------
 function nm_add_all(sOrig, sDest, fCBack, sRow)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  // Varre itens da origem
  for (i = 0; i < oOrig.length; i++)
  {
   // Item na origem valido
   if (!oOrig.options[i].disabled)
   {
    // Recupera valores da origem
    sText  = oOrig.options[i].text;
    sValue = oOrig.options[i].value;
    // Cria item no destino
    oDest.options[oDest.length] = new Option(sText, sValue);
    // Desabilita item na origem
    oOrig.options[i].style.color = "#A0A0A0";
    oOrig.options[i].disabled    = true;
    oOrig.options[i].selected    = false;
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (fCBack)
  {
   fCBack(sRow);
  }
 }
 // Remove um elemento
 //--------------------
 function nm_del_sel(sOrig, sDest, fCBack, sRow)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  aSel  = new Array();
  atxt  = new Array();
  solt  = new Array();
  j     = 0;
  z     = 0;
  // Remove itens selecionados na origem
  for (i = oOrig.length - 1; i >= 0; i--)
  {
   // Item na origem selecionado
   if (oOrig.options[i].selected)
   {
    aSel[j] = oOrig.options[i].value;
    atxt[j] = oOrig.options[i].text;
    j++;
    oOrig.options[i] = null;
   }
  }
  // Habilita itens no destino
  for (i = 0; i < oDest.length; i++)
  {
   if (oDest.options[i].disabled && in_array(aSel, oDest.options[i].value))
   {
    oDest.options[i].disabled    = false;
    oDest.options[i].style.color = "";
    solt[z] = oDest.options[i].value;
    z++;
   }
  }
  for (i = 0; i < aSel.length; i++)
  {
   if (!in_array(solt, aSel[i]))
   {
    oDest.options[oDest.length] = new Option(atxt[i], aSel[i]);
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (fCBack)
  {
   fCBack(sRow);
  }
 }
 // Remove todos os elementos
 //---------------------------
 function nm_del_all(sOrig, sDest, fCBack, sRow)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  aSel  = new Array();
  atxt  = new Array();
  solt  = new Array();
  j     = 0;
  z     = 0;
  // Remove todos os itens na origem
  while (0 < oOrig.length)
  {
   i       = oOrig.length - 1;
   aSel[j] = oOrig.options[i].value;
   atxt[j] = oOrig.options[i].text;
   j++;
   oOrig.options[i] = null;
  }
  // Habilita itens no destino
  for (i = 0; i < oDest.length; i++)
  {
   if (oDest.options[i].disabled && in_array(aSel, oDest.options[i].value))
   {
    oDest.options[i].disabled    = false;
    oDest.options[i].style.color = "";
    solt[z] = oDest.options[i].value;
    z++;
   }
  }
  for (i = 0; i < aSel.length; i++)
  {
   if (!in_array(solt, aSel[i]))
   {
    oDest.options[oDest.length] = new Option(atxt[i], aSel[i]);
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (fCBack)
  {
   fCBack(sRow);
  }
 }
 function nm_sincroniza(sOrig, sDest)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  // Varre itens do destino
  for (i = 0; i < oDest.length; i++)
  {
     dValue = oDest.options[i].value;
     bFound = false;
     for (x = 0; x < oOrig.length && !bFound; x++)
     {
         oValue = oOrig.options[x].value;
         if (dValue == oValue)
         {
             // Desabilita item na origem
             oOrig.options[x].style.color = "#A0A0A0";
             oOrig.options[x].disabled    = true;
             oOrig.options[x].selected    = false;
             bFound = true;
         }
     }
  }
 }
 var nm_quant_pack;
 function nm_pack(sOrig, sDest)
 {
    if (!document.F1.elements[sOrig] || !document.F1.elements[sDest]) return;
    obj_sel = document.F1.elements[sOrig];
    str_val = "";
    nm_quant_pack = 0;
    for (i = 0; i < obj_sel.length; i++)
    {
         if ("" != str_val)
         {
             str_val += "@?@";
             nm_quant_pack++;
         }
         str_val += obj_sel.options[i].value;
    }
    document.F1.elements[sDest].value = str_val;
 }
 function nm_pack_sel(sOrig, sDest)
 {
    if (!document.F1.elements[sOrig] || !document.F1.elements[sDest]) return;
    obj_sel = document.F1.elements[sOrig];
    str_val = "";
    nm_quant_pack = 0;
    for (i = 0; i < obj_sel.length; i++)
    {
         if (obj_sel.options[i].selected)
         {
             if ("" != str_val)
             {
                 str_val += "@?@";
                 nm_quant_pack++;
             }
             str_val += obj_sel.options[i].value;
         }
    }
    document.F1.elements[sDest].value = str_val;
 }
 function nm_del_combo(sOcombo)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOcombo];
  aSel  = new Array();
  j     = 0;
  // Remove todos os itens na origem
  while (0 < oOrig.length)
  {
   i       = oOrig.length - 1;
   aSel[j] = oOrig.options[i].value;
   j++;
   oOrig.options[i] = null;
  }
 }
 function nm_add_item(sDest, sText, sValue, sSelected)
 {
  oDest = document.F1.elements[sDest];
  oDest.options[oDest.length] = new Option(sText, sValue);
  if (sSelected == 'selected')
  {
      oDest.options[oDest.length -1].selected = true;
  }
 }
 function in_array(aArray, sElem)
 {
  for (iCount = 0; iCount < aArray.length; iCount++)
  {
   if (sElem == aArray[iCount])
   {
    return true;
   }
  }
  return false;
 }
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_movilizacion'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_movilizacion'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="100%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Ingreso Hoja de Rutas y Control de Combustible y Kilometraje"; } else { echo "Ingreso Hoja de Rutas y Control de Combustible y Kilometraje"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['pdf_view'])
{
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Escape)", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Delete)", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = ($this->nmgp_botoes['print'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bprint", "scBtnFn_sys_format_imp()", "scBtnFn_sys_format_imp()", "sc_b_prt_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="45%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_movilizacion']))
           {
               $this->nmgp_cmp_readonly['id_movilizacion'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_movilizacion']))
    {
        $this->nm_new_label['id_movilizacion'] = "Numero de Movilización";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_movilizacion = $this->id_movilizacion;
   $sStyleHidden_id_movilizacion = '';
   if (isset($this->nmgp_cmp_hidden['id_movilizacion']) && $this->nmgp_cmp_hidden['id_movilizacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_movilizacion']);
       $sStyleHidden_id_movilizacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_movilizacion = 'display: none;';
   $sStyleReadInp_id_movilizacion = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_movilizacion"]) &&  $this->nmgp_cmp_readonly["id_movilizacion"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_movilizacion']);
       $sStyleReadLab_id_movilizacion = '';
       $sStyleReadInp_id_movilizacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_movilizacion']) && $this->nmgp_cmp_hidden['id_movilizacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_movilizacion" value="<?php echo $this->form_encode_input($id_movilizacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_movilizacion_label" id="hidden_field_label_id_movilizacion" style="<?php echo $sStyleHidden_id_movilizacion; ?>"><span id="id_label_id_movilizacion"><?php echo $this->nm_new_label['id_movilizacion']; ?></span></TD>
    <TD class="scFormDataOdd css_id_movilizacion_line" id="hidden_field_data_id_movilizacion" style="<?php echo $sStyleHidden_id_movilizacion; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_movilizacion_line" style="vertical-align: top;padding: 0px">
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { 
 ?>
<span id="id_read_on_id_movilizacion" css_id_movilizacion_line" style="<?php echo $sStyleReadLab_id_movilizacion; ?>"><?php echo $this->form_encode_input($this->id_movilizacion); ?></span><span id="id_read_off_id_movilizacion" style="<?php echo $sStyleReadInp_id_movilizacion; ?>"><input type="hidden" name="id_movilizacion" value="<?php echo $this->form_encode_input($id_movilizacion) . "\">"?><span id="id_ajax_label_id_movilizacion"><?php echo nl2br($id_movilizacion); ?></span>
</span><?php } else { ?>
&nbsp;
<?php } ?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_movilizacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_movilizacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['movilizacion_fecha']))
    {
        $this->nm_new_label['movilizacion_fecha'] = "Fecha";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_fecha = $this->movilizacion_fecha;
   $sStyleHidden_movilizacion_fecha = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_fecha']) && $this->nmgp_cmp_hidden['movilizacion_fecha'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_fecha']);
       $sStyleHidden_movilizacion_fecha = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_fecha = 'display: none;';
   $sStyleReadInp_movilizacion_fecha = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_fecha']) && $this->nmgp_cmp_readonly['movilizacion_fecha'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_fecha']);
       $sStyleReadLab_movilizacion_fecha = '';
       $sStyleReadInp_movilizacion_fecha = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_fecha']) && $this->nmgp_cmp_hidden['movilizacion_fecha'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_fecha" value="<?php echo $this->form_encode_input($movilizacion_fecha) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_movilizacion_fecha_label" id="hidden_field_label_movilizacion_fecha" style="<?php echo $sStyleHidden_movilizacion_fecha; ?>"><span id="id_label_movilizacion_fecha"><?php echo $this->nm_new_label['movilizacion_fecha']; ?></span></TD>
    <TD class="scFormDataOdd css_movilizacion_fecha_line" id="hidden_field_data_movilizacion_fecha" style="<?php echo $sStyleHidden_movilizacion_fecha; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_fecha_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["movilizacion_fecha"]) &&  $this->nmgp_cmp_readonly["movilizacion_fecha"] == "on") { 

 ?>
<input type="hidden" name="movilizacion_fecha" value="<?php echo $this->form_encode_input($movilizacion_fecha) . "\">" . $movilizacion_fecha . ""; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_fecha" class="sc-ui-readonly-movilizacion_fecha css_movilizacion_fecha_line" style="<?php echo $sStyleReadLab_movilizacion_fecha; ?>"><?php echo $this->form_encode_input($movilizacion_fecha); ?></span><span id="id_read_off_movilizacion_fecha" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_fecha; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_fecha_obj" style="" id="id_sc_field_movilizacion_fecha" type=text name="movilizacion_fecha" value="<?php echo $this->form_encode_input($movilizacion_fecha) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['movilizacion_fecha']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['movilizacion_fecha']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['movilizacion_fecha']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_fecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_fecha_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idusuario']))
   {
       $this->nm_new_label['idusuario'] = "Conductor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idusuario = $this->idusuario;
   $sStyleHidden_idusuario = '';
   if (isset($this->nmgp_cmp_hidden['idusuario']) && $this->nmgp_cmp_hidden['idusuario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idusuario']);
       $sStyleHidden_idusuario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idusuario = 'display: none;';
   $sStyleReadInp_idusuario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idusuario']) && $this->nmgp_cmp_readonly['idusuario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idusuario']);
       $sStyleReadLab_idusuario = '';
       $sStyleReadInp_idusuario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idusuario']) && $this->nmgp_cmp_hidden['idusuario'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idusuario" value="<?php echo $this->form_encode_input($this->idusuario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idusuario_label" id="hidden_field_label_idusuario" style="<?php echo $sStyleHidden_idusuario; ?>"><span id="id_label_idusuario"><?php echo $this->nm_new_label['idusuario']; ?></span></TD>
    <TD class="scFormDataOdd css_idusuario_line" id="hidden_field_data_idusuario" style="<?php echo $sStyleHidden_idusuario; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idusuario_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idusuario"]) &&  $this->nmgp_cmp_readonly["idusuario"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_idusuario']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_idusuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_idusuario']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_idusuario'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_idusuario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_idusuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_idusuario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_idusuario'] = array(); 
    }

   $old_value_id_movilizacion = $this->id_movilizacion;
   $old_value_movilizacion_fecha = $this->movilizacion_fecha;
   $old_value_idvehiculo = $this->idvehiculo;
   $old_value_movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $old_value_movilizacion_hora_salida_hora = $this->movilizacion_hora_salida_hora;
   $old_value_movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $old_value_movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $old_value_movilizacion_hora_llegada_hora = $this->movilizacion_hora_llegada_hora;
   $old_value_movilizacion_total_galones = $this->movilizacion_total_galones;
   $old_value_movilizacion_km_salida = $this->movilizacion_km_salida;
   $old_value_movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $old_value_movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $old_value_movilizacion_excedente = $this->movilizacion_excedente;
   $old_value_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $old_value_movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $old_value_movilizacion_costo_galon = $this->movilizacion_costo_galon;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_movilizacion = $this->id_movilizacion;
   $unformatted_value_movilizacion_fecha = $this->movilizacion_fecha;
   $unformatted_value_idvehiculo = $this->idvehiculo;
   $unformatted_value_movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $unformatted_value_movilizacion_hora_salida_hora = $this->movilizacion_hora_salida_hora;
   $unformatted_value_movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $unformatted_value_movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $unformatted_value_movilizacion_hora_llegada_hora = $this->movilizacion_hora_llegada_hora;
   $unformatted_value_movilizacion_total_galones = $this->movilizacion_total_galones;
   $unformatted_value_movilizacion_km_salida = $this->movilizacion_km_salida;
   $unformatted_value_movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $unformatted_value_movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $unformatted_value_movilizacion_excedente = $this->movilizacion_excedente;
   $unformatted_value_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $unformatted_value_movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $unformatted_value_movilizacion_costo_galon = $this->movilizacion_costo_galon;

   $nm_comando = "SELECT idusuario, concat(usuario_apellidos,\" \",usuario_nombres)  FROM usuario, cargo WHERE  usuario.usuario_cargo = cargo.idcargo AND cargo.idcargo= 1 ORDER BY usuario_apellidos, usuario_nombres";

   $this->id_movilizacion = $old_value_id_movilizacion;
   $this->movilizacion_fecha = $old_value_movilizacion_fecha;
   $this->idvehiculo = $old_value_idvehiculo;
   $this->movilizacion_hora_salida = $old_value_movilizacion_hora_salida;
   $this->movilizacion_hora_salida_hora = $old_value_movilizacion_hora_salida_hora;
   $this->movilizacion_total_combustible = $old_value_movilizacion_total_combustible;
   $this->movilizacion_hora_llegada = $old_value_movilizacion_hora_llegada;
   $this->movilizacion_hora_llegada_hora = $old_value_movilizacion_hora_llegada_hora;
   $this->movilizacion_total_galones = $old_value_movilizacion_total_galones;
   $this->movilizacion_km_salida = $old_value_movilizacion_km_salida;
   $this->movilizacion_cant_km_adicional = $old_value_movilizacion_cant_km_adicional;
   $this->movilizacion_km_llegada = $old_value_movilizacion_km_llegada;
   $this->movilizacion_excedente = $old_value_movilizacion_excedente;
   $this->movilizacion_recorrido_vehiculo = $old_value_movilizacion_recorrido_vehiculo;
   $this->movilizacion_total_km_recorrido = $old_value_movilizacion_total_km_recorrido;
   $this->movilizacion_costo_galon = $old_value_movilizacion_costo_galon;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_idusuario'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $idusuario_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idusuario_1))
          {
              foreach ($this->idusuario_1 as $tmp_idusuario)
              {
                  if (trim($tmp_idusuario) === trim($cadaselect[1])) { $idusuario_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idusuario) === trim($cadaselect[1])) { $idusuario_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idusuario" value="<?php echo $this->form_encode_input($idusuario) . "\">" . $idusuario_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idusuario();
   $x = 0 ; 
   $idusuario_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idusuario_1))
          {
              foreach ($this->idusuario_1 as $tmp_idusuario)
              {
                  if (trim($tmp_idusuario) === trim($cadaselect[1])) { $idusuario_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idusuario) === trim($cadaselect[1])) { $idusuario_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idusuario_look))
          {
              $idusuario_look = $this->idusuario;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idusuario\" class=\"css_idusuario_line\" style=\"" .  $sStyleReadLab_idusuario . "\">" . $this->form_encode_input($idusuario_look) . "</span><span id=\"id_read_off_idusuario\" style=\"" . $sStyleReadInp_idusuario . "\">";
   echo " <span id=\"idAjaxSelect_idusuario\"><select class=\"sc-js-input scFormObjectOdd css_idusuario_obj\" style=\"\" id=\"id_sc_field_idusuario\" name=\"idusuario\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_idusuario'][] = ''; 
   echo "  <option value=\"\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idusuario) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idusuario)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idusuario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idusuario_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['libre']))
    {
        $this->nm_new_label['libre'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $libre = $this->libre;
   $sStyleHidden_libre = '';
   if (isset($this->nmgp_cmp_hidden['libre']) && $this->nmgp_cmp_hidden['libre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['libre']);
       $sStyleHidden_libre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_libre = 'display: none;';
   $sStyleReadInp_libre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['libre']) && $this->nmgp_cmp_readonly['libre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['libre']);
       $sStyleReadLab_libre = '';
       $sStyleReadInp_libre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['libre']) && $this->nmgp_cmp_hidden['libre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="libre" value="<?php echo $this->form_encode_input($libre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_libre_label" id="hidden_field_label_libre" style="<?php echo $sStyleHidden_libre; ?>"><span id="id_label_libre"><?php echo $this->nm_new_label['libre']; ?></span></TD>
    <TD class="scFormDataOdd css_libre_line" id="hidden_field_data_libre" style="<?php echo $sStyleHidden_libre; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_libre_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_libre css_libre_line" style="<?php echo $sStyleReadLab_libre; ?>"><?php echo $this->form_encode_input($this->libre); ?></span><span id="id_read_off_libre" style="<?php echo $sStyleReadInp_libre; ?>"><span id="id_ajax_label_libre"><?php echo $libre?></span>
</span><input type="hidden" name="libre" value="<?php echo $this->form_encode_input($libre); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_libre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_libre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idvehiculo']))
    {
        $this->nm_new_label['idvehiculo'] = "Vehiculo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idvehiculo = $this->idvehiculo;
   $sStyleHidden_idvehiculo = '';
   if (isset($this->nmgp_cmp_hidden['idvehiculo']) && $this->nmgp_cmp_hidden['idvehiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idvehiculo']);
       $sStyleHidden_idvehiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idvehiculo = 'display: none;';
   $sStyleReadInp_idvehiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idvehiculo']) && $this->nmgp_cmp_readonly['idvehiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idvehiculo']);
       $sStyleReadLab_idvehiculo = '';
       $sStyleReadInp_idvehiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idvehiculo']) && $this->nmgp_cmp_hidden['idvehiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idvehiculo" value="<?php echo $this->form_encode_input($idvehiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idvehiculo_label" id="hidden_field_label_idvehiculo" style="<?php echo $sStyleHidden_idvehiculo; ?>"><span id="id_label_idvehiculo"><?php echo $this->nm_new_label['idvehiculo']; ?></span></TD>
    <TD class="scFormDataOdd css_idvehiculo_line" id="hidden_field_data_idvehiculo" style="<?php echo $sStyleHidden_idvehiculo; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idvehiculo_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="idvehiculo" value="<?php echo $this->form_encode_input($idvehiculo); ?>"><span id="id_ajax_label_idvehiculo"><?php echo nl2br($idvehiculo); ?></span>
 <SPAN id="id_lookup_idvehiculo"><?php echo $look_rpc_idvehiculo; ?></SPAN></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idvehiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idvehiculo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['libre2']))
    {
        $this->nm_new_label['libre2'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $libre2 = $this->libre2;
   $sStyleHidden_libre2 = '';
   if (isset($this->nmgp_cmp_hidden['libre2']) && $this->nmgp_cmp_hidden['libre2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['libre2']);
       $sStyleHidden_libre2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_libre2 = 'display: none;';
   $sStyleReadInp_libre2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['libre2']) && $this->nmgp_cmp_readonly['libre2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['libre2']);
       $sStyleReadLab_libre2 = '';
       $sStyleReadInp_libre2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['libre2']) && $this->nmgp_cmp_hidden['libre2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="libre2" value="<?php echo $this->form_encode_input($libre2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_libre2_label" id="hidden_field_label_libre2" style="<?php echo $sStyleHidden_libre2; ?>"><span id="id_label_libre2"><?php echo $this->nm_new_label['libre2']; ?></span></TD>
    <TD class="scFormDataOdd css_libre2_line" id="hidden_field_data_libre2" style="<?php echo $sStyleHidden_libre2; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_libre2_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_libre2 css_libre2_line" style="<?php echo $sStyleReadLab_libre2; ?>"><?php echo $this->form_encode_input($this->libre2); ?></span><span id="id_read_off_libre2" style="<?php echo $sStyleReadInp_libre2; ?>"><span id="id_ajax_label_libre2"><?php echo $libre2?></span>
</span><input type="hidden" name="libre2" value="<?php echo $this->form_encode_input($libre2); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_libre2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_libre2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_ruta']))
    {
        $this->nm_new_label['movilizacion_ruta'] = "Ciudad de Destino Final";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_ruta = $this->movilizacion_ruta;
   $sStyleHidden_movilizacion_ruta = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_ruta']) && $this->nmgp_cmp_hidden['movilizacion_ruta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_ruta']);
       $sStyleHidden_movilizacion_ruta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_ruta = 'display: none;';
   $sStyleReadInp_movilizacion_ruta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_ruta']) && $this->nmgp_cmp_readonly['movilizacion_ruta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_ruta']);
       $sStyleReadLab_movilizacion_ruta = '';
       $sStyleReadInp_movilizacion_ruta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_ruta']) && $this->nmgp_cmp_hidden['movilizacion_ruta'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_ruta" value="<?php echo $this->form_encode_input($movilizacion_ruta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_movilizacion_ruta_label" id="hidden_field_label_movilizacion_ruta" style="<?php echo $sStyleHidden_movilizacion_ruta; ?>"><span id="id_label_movilizacion_ruta"><?php echo $this->nm_new_label['movilizacion_ruta']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['php_cmp_required']['movilizacion_ruta']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['php_cmp_required']['movilizacion_ruta'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_movilizacion_ruta_line" id="hidden_field_data_movilizacion_ruta" style="<?php echo $sStyleHidden_movilizacion_ruta; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_ruta_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["movilizacion_ruta"]) &&  $this->nmgp_cmp_readonly["movilizacion_ruta"] == "on") { 

 ?>
<input type="hidden" name="movilizacion_ruta" value="<?php echo $this->form_encode_input($movilizacion_ruta) . "\">" . $movilizacion_ruta . ""; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_ruta" class="sc-ui-readonly-movilizacion_ruta css_movilizacion_ruta_line" style="<?php echo $sStyleReadLab_movilizacion_ruta; ?>"><?php echo $this->form_encode_input($this->movilizacion_ruta); ?></span><span id="id_read_off_movilizacion_ruta" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_ruta; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_ruta_obj" style="" id="id_sc_field_movilizacion_ruta" type=text name="movilizacion_ruta" value="<?php echo $this->form_encode_input($movilizacion_ruta) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_ruta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_ruta_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>
<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="100%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['movilizacion_funcionario']))
   {
       $this->nm_new_label['movilizacion_funcionario'] = "Funcionario";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_funcionario = $this->movilizacion_funcionario;
   $sStyleHidden_movilizacion_funcionario = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_funcionario']) && $this->nmgp_cmp_hidden['movilizacion_funcionario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_funcionario']);
       $sStyleHidden_movilizacion_funcionario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_funcionario = 'display: none;';
   $sStyleReadInp_movilizacion_funcionario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_funcionario']) && $this->nmgp_cmp_readonly['movilizacion_funcionario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_funcionario']);
       $sStyleReadLab_movilizacion_funcionario = '';
       $sStyleReadInp_movilizacion_funcionario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_funcionario']) && $this->nmgp_cmp_hidden['movilizacion_funcionario'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="movilizacion_funcionario" value="<?php echo $this->form_encode_input($this->movilizacion_funcionario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php  $this->movilizacion_funcionario_1 = explode(";", trim($this->movilizacion_funcionario)) ; ?>
    <TD class="scFormDataOdd css_movilizacion_funcionario_line" id="hidden_field_data_movilizacion_funcionario" style="<?php echo $sStyleHidden_movilizacion_funcionario; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_funcionario_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_funcionario_label"><span id="id_label_movilizacion_funcionario"><?php echo $this->nm_new_label['movilizacion_funcionario']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['php_cmp_required']['movilizacion_funcionario']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['php_cmp_required']['movilizacion_funcionario'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["movilizacion_funcionario"]) &&  $this->nmgp_cmp_readonly["movilizacion_funcionario"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_movilizacion_funcionario']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_movilizacion_funcionario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_movilizacion_funcionario']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_movilizacion_funcionario'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_movilizacion_funcionario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_movilizacion_funcionario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_movilizacion_funcionario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_movilizacion_funcionario'] = array(); 
    }

   $old_value_id_movilizacion = $this->id_movilizacion;
   $old_value_movilizacion_fecha = $this->movilizacion_fecha;
   $old_value_idvehiculo = $this->idvehiculo;
   $old_value_movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $old_value_movilizacion_hora_salida_hora = $this->movilizacion_hora_salida_hora;
   $old_value_movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $old_value_movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $old_value_movilizacion_hora_llegada_hora = $this->movilizacion_hora_llegada_hora;
   $old_value_movilizacion_total_galones = $this->movilizacion_total_galones;
   $old_value_movilizacion_km_salida = $this->movilizacion_km_salida;
   $old_value_movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $old_value_movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $old_value_movilizacion_excedente = $this->movilizacion_excedente;
   $old_value_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $old_value_movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $old_value_movilizacion_costo_galon = $this->movilizacion_costo_galon;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_movilizacion = $this->id_movilizacion;
   $unformatted_value_movilizacion_fecha = $this->movilizacion_fecha;
   $unformatted_value_idvehiculo = $this->idvehiculo;
   $unformatted_value_movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $unformatted_value_movilizacion_hora_salida_hora = $this->movilizacion_hora_salida_hora;
   $unformatted_value_movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $unformatted_value_movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $unformatted_value_movilizacion_hora_llegada_hora = $this->movilizacion_hora_llegada_hora;
   $unformatted_value_movilizacion_total_galones = $this->movilizacion_total_galones;
   $unformatted_value_movilizacion_km_salida = $this->movilizacion_km_salida;
   $unformatted_value_movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $unformatted_value_movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $unformatted_value_movilizacion_excedente = $this->movilizacion_excedente;
   $unformatted_value_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $unformatted_value_movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $unformatted_value_movilizacion_costo_galon = $this->movilizacion_costo_galon;

   $nm_comando = "SELECT idusuario, concat(usuario_apellidos,' ',usuario_nombres)  FROM usuario  WHERE usuario_cargo <> 1 ORDER BY usuario_apellidos, usuario_nombres";

   $this->id_movilizacion = $old_value_id_movilizacion;
   $this->movilizacion_fecha = $old_value_movilizacion_fecha;
   $this->idvehiculo = $old_value_idvehiculo;
   $this->movilizacion_hora_salida = $old_value_movilizacion_hora_salida;
   $this->movilizacion_hora_salida_hora = $old_value_movilizacion_hora_salida_hora;
   $this->movilizacion_total_combustible = $old_value_movilizacion_total_combustible;
   $this->movilizacion_hora_llegada = $old_value_movilizacion_hora_llegada;
   $this->movilizacion_hora_llegada_hora = $old_value_movilizacion_hora_llegada_hora;
   $this->movilizacion_total_galones = $old_value_movilizacion_total_galones;
   $this->movilizacion_km_salida = $old_value_movilizacion_km_salida;
   $this->movilizacion_cant_km_adicional = $old_value_movilizacion_cant_km_adicional;
   $this->movilizacion_km_llegada = $old_value_movilizacion_km_llegada;
   $this->movilizacion_excedente = $old_value_movilizacion_excedente;
   $this->movilizacion_recorrido_vehiculo = $old_value_movilizacion_recorrido_vehiculo;
   $this->movilizacion_total_km_recorrido = $old_value_movilizacion_total_km_recorrido;
   $this->movilizacion_costo_galon = $old_value_movilizacion_costo_galon;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_movilizacion_funcionario'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $movilizacion_funcionario_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->movilizacion_funcionario_1))
          {
              foreach ($this->movilizacion_funcionario_1 as $tmp_movilizacion_funcionario)
              {
                  if (trim($tmp_movilizacion_funcionario) === trim($cadaselect[1])) { $movilizacion_funcionario_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->movilizacion_funcionario) === trim($cadaselect[1])) { $movilizacion_funcionario_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="movilizacion_funcionario" value="<?php echo $this->form_encode_input($movilizacion_funcionario) . "\">" . $movilizacion_funcionario_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_movilizacion_funcionario();
   $x = 0 ; 
   $movilizacion_funcionario_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->movilizacion_funcionario_1))
          {
              foreach ($this->movilizacion_funcionario_1 as $tmp_movilizacion_funcionario)
              {
                  if (trim($tmp_movilizacion_funcionario) === trim($cadaselect[1])) { $movilizacion_funcionario_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->movilizacion_funcionario) === trim($cadaselect[1])) { $movilizacion_funcionario_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($movilizacion_funcionario_look))
          {
              $movilizacion_funcionario_look = $this->movilizacion_funcionario;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_movilizacion_funcionario\" class=\"css_movilizacion_funcionario_line\" style=\"" .  $sStyleReadLab_movilizacion_funcionario . "\">" . $this->form_encode_input($movilizacion_funcionario_look) . "</span><span id=\"id_read_off_movilizacion_funcionario\" style=\"" . $sStyleReadInp_movilizacion_funcionario . "\">";
   echo "<table style=\"display: inline-block\"><tr><td>" ; 
   echo " <span id=\"idAjaxSelect_movilizacion_funcionario\"><select class=\"sc-js-input scFormObjectOdd css_movilizacion_funcionario_obj\" style=\"\" id=\"id_sc_field_movilizacion_funcionario\" name=\"movilizacion_funcionario_orig\" size=\"10\" multiple onDblClick=\"nm_add_sel('movilizacion_funcionario_orig', 'movilizacion_funcionario_dest', null);  \" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['Lookup_movilizacion_funcionario'][] = ''; 
   echo "  <option value=\"\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          foreach ($this->movilizacion_funcionario_1 as $Dados)
          {
              if ($Dados === $cadaselect[1])
              {
                  echo " disabled=\"disabled\" style=\"color: #A0A0A0\"";
                  break;
              }
          }
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "</td>";
   echo "<td align=\"center\">";
   echo "<div class='scBtnPassField' id='movilizacion_funcionario_all_right'>";
   echo         $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bpassfld_rightall", "nm_add_all('movilizacion_funcionario_orig', 'movilizacion_funcionario_dest', null);    return false;", "nm_add_all('movilizacion_funcionario_orig', 'movilizacion_funcionario_dest', null);    return false;", "Bbpassfld_rightall", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
;
   echo "</div>";
   echo "<div class='scBtnPassField'>";
   echo         $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bpassfld_right", "nm_add_sel('movilizacion_funcionario_orig', 'movilizacion_funcionario_dest', null);    return false;", "nm_add_sel('movilizacion_funcionario_orig', 'movilizacion_funcionario_dest', null);    return false;", "Bbpassfld_righ", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
;
   echo "</div>";
   echo "<div class='scBtnPassField'>";
   echo         $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bpassfld_left", "nm_del_sel('movilizacion_funcionario_dest', 'movilizacion_funcionario_orig', null);    return false;", "nm_del_sel('movilizacion_funcionario_dest', 'movilizacion_funcionario_orig', null);    return false;", "Bbpassfld_left", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
;
   echo "</div>";
   echo "<div class='scBtnPassField' id='movilizacion_funcionario_all_left'>";
   echo         $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bpassfld_leftall", "nm_del_all('movilizacion_funcionario_dest', 'movilizacion_funcionario_orig', null);    return false;", "nm_del_all('movilizacion_funcionario_dest', 'movilizacion_funcionario_orig', null);    return false;", "Bbpassfld_leftall", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
;
   echo "</div>";
   echo "</td>";
   echo "<td>";
   echo " <select class=\"sc-js-input scFormObjectOdd css_movilizacion_funcionario_obj\" style=\"\" name=\"movilizacion_funcionario_dest\"  onBlur=\"scCssBlur(this);\"  onFocus=\"scCssFocus(this);\"  size=10 multiple onDblClick=\"nm_del_sel('movilizacion_funcionario_dest', 'movilizacion_funcionario_orig', null);  \" alt=\"{type: 'select', enterTab: false}\">";
   $x = 0 ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          foreach ($this->movilizacion_funcionario_1 as $Dados)
          {
              if ($Dados === $cadaselect[1])
              {
                  echo "  <option value=\"$cadaselect[1]\" selected>$cadaselect[0] </option>"; 
                  break;
              }
          }
          $x++ ; 
   }  ; 
   echo " </select>" ; 
   echo " <input type=\"hidden\" name=\"movilizacion_funcionario\" value=\"\">" ; 
   echo "</td></tr></table>";
   echo " <script>document.F1.movilizacion_funcionario_dest.selectedIndex = -1;</script>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_funcionario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_funcionario_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_movilizacion_funcionario_dumb = ('' == $sStyleHidden_movilizacion_funcionario) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_movilizacion_funcionario_dumb" style="<?php echo $sStyleHidden_movilizacion_funcionario_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_hora_salida']))
    {
        $this->nm_new_label['movilizacion_hora_salida'] = "Fecha y Hora de Salida";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $movilizacion_hora_salida_hora = $this->movilizacion_hora_salida_hora;
   $guarda_datahora = $this->field_config['movilizacion_hora_salida']['date_format'];
   $this->field_config['movilizacion_hora_salida']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
   $sStyleHidden_movilizacion_hora_salida = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_hora_salida']) && $this->nmgp_cmp_hidden['movilizacion_hora_salida'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_hora_salida']);
       $sStyleHidden_movilizacion_hora_salida = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_hora_salida = 'display: none;';
   $sStyleReadInp_movilizacion_hora_salida = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_hora_salida']) && $this->nmgp_cmp_readonly['movilizacion_hora_salida'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_hora_salida']);
       $sStyleReadLab_movilizacion_hora_salida = '';
       $sStyleReadInp_movilizacion_hora_salida = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_hora_salida']) && $this->nmgp_cmp_hidden['movilizacion_hora_salida'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_hora_salida" value="<?php echo $this->form_encode_input($movilizacion_hora_salida) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_movilizacion_hora_salida_hora_label" id="hidden_field_label_movilizacion_hora_salida" style="<?php echo $sStyleHidden_movilizacion_hora_salida; ?>"><span id="id_label_movilizacion_hora_salida"><?php echo $this->nm_new_label['movilizacion_hora_salida']; ?></span></TD>
    <TD class="scFormDataOdd css_movilizacion_hora_salida_hora_line" id="hidden_field_data_movilizacion_hora_salida" style="<?php echo $sStyleHidden_movilizacion_hora_salida; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_hora_salida_hora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["movilizacion_hora_salida"]) &&  $this->nmgp_cmp_readonly["movilizacion_hora_salida"] == "on") { 

 ?>
<input type="hidden" name="movilizacion_hora_salida" value="<?php echo $this->form_encode_input($movilizacion_hora_salida) . "\">" . $movilizacion_hora_salida . ""; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_hora_salida" class="sc-ui-readonly-movilizacion_hora_salida css_movilizacion_hora_salida_line" style="<?php echo $sStyleReadLab_movilizacion_hora_salida; ?>"><?php echo $this->form_encode_input($movilizacion_hora_salida); ?></span><span id="id_read_off_movilizacion_hora_salida" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_hora_salida; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_hora_salida_obj" style="" id="id_sc_field_movilizacion_hora_salida" type=text name="movilizacion_hora_salida" value="<?php echo $this->form_encode_input($movilizacion_hora_salida) ?>"
 size=8 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['movilizacion_hora_salida']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['movilizacion_hora_salida']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['movilizacion_hora_salida']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>


<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["movilizacion_hora_salida_hora"]) &&  $this->nmgp_cmp_readonly["movilizacion_hora_salida_hora"] == "on") { 

 ?>
<input type="hidden" name="movilizacion_hora_salida_hora" value="<?php echo $this->form_encode_input($movilizacion_hora_salida_hora) . "\">" . $movilizacion_hora_salida_hora . ""; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_hora_salida_hora" class="sc-ui-readonly-movilizacion_hora_salida_hora css_movilizacion_hora_salida_hora_line" style="<?php echo $sStyleReadLab_movilizacion_hora_salida; ?>"><?php echo $this->form_encode_input($movilizacion_hora_salida_hora); ?></span><span id="id_read_off_movilizacion_hora_salida_hora" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_hora_salida; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_hora_salida_hora_obj" style="" id="id_sc_field_movilizacion_hora_salida_hora" type=text name="movilizacion_hora_salida_hora" value="<?php echo $this->form_encode_input($movilizacion_hora_salida_hora) ?>"
 size=8 alt="{datatype: 'time', dateSep: '<?php echo $this->field_config['movilizacion_hora_salida']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['movilizacion_hora_salida']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', timeSep: '<?php echo $this->field_config['movilizacion_hora_salida_hora']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['movilizacion_hora_salida_hora']['date_format']; ?>'}" ><?php
$tmp_form_data = $this->field_config['movilizacion_hora_salida_hora']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_hora_salida_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_hora_salida_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['movilizacion_total_combustible']))
    {
        $this->nm_new_label['movilizacion_total_combustible'] = "Costo Total de Combustible";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $sStyleHidden_movilizacion_total_combustible = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_total_combustible']) && $this->nmgp_cmp_hidden['movilizacion_total_combustible'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_total_combustible']);
       $sStyleHidden_movilizacion_total_combustible = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_total_combustible = 'display: none;';
   $sStyleReadInp_movilizacion_total_combustible = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_total_combustible']) && $this->nmgp_cmp_readonly['movilizacion_total_combustible'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_total_combustible']);
       $sStyleReadLab_movilizacion_total_combustible = '';
       $sStyleReadInp_movilizacion_total_combustible = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_total_combustible']) && $this->nmgp_cmp_hidden['movilizacion_total_combustible'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_total_combustible" value="<?php echo $this->form_encode_input($movilizacion_total_combustible) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_movilizacion_total_combustible_label" id="hidden_field_label_movilizacion_total_combustible" style="<?php echo $sStyleHidden_movilizacion_total_combustible; ?>"><span id="id_label_movilizacion_total_combustible"><?php echo $this->nm_new_label['movilizacion_total_combustible']; ?></span></TD>
    <TD class="scFormDataOdd css_movilizacion_total_combustible_line" id="hidden_field_data_movilizacion_total_combustible" style="<?php echo $sStyleHidden_movilizacion_total_combustible; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_total_combustible_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="movilizacion_total_combustible" value="<?php echo $this->form_encode_input($movilizacion_total_combustible); ?>"><span id="id_ajax_label_movilizacion_total_combustible"><?php echo nl2br($movilizacion_total_combustible); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_total_combustible_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_total_combustible_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_hora_llegada']))
    {
        $this->nm_new_label['movilizacion_hora_llegada'] = "Fecha y Hora de Llegada";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $movilizacion_hora_llegada_hora = $this->movilizacion_hora_llegada_hora;
   $guarda_datahora = $this->field_config['movilizacion_hora_llegada']['date_format'];
   $this->field_config['movilizacion_hora_llegada']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
   $sStyleHidden_movilizacion_hora_llegada = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_hora_llegada']) && $this->nmgp_cmp_hidden['movilizacion_hora_llegada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_hora_llegada']);
       $sStyleHidden_movilizacion_hora_llegada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_hora_llegada = 'display: none;';
   $sStyleReadInp_movilizacion_hora_llegada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_hora_llegada']) && $this->nmgp_cmp_readonly['movilizacion_hora_llegada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_hora_llegada']);
       $sStyleReadLab_movilizacion_hora_llegada = '';
       $sStyleReadInp_movilizacion_hora_llegada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_hora_llegada']) && $this->nmgp_cmp_hidden['movilizacion_hora_llegada'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_hora_llegada" value="<?php echo $this->form_encode_input($movilizacion_hora_llegada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_movilizacion_hora_llegada_hora_label" id="hidden_field_label_movilizacion_hora_llegada" style="<?php echo $sStyleHidden_movilizacion_hora_llegada; ?>"><span id="id_label_movilizacion_hora_llegada"><?php echo $this->nm_new_label['movilizacion_hora_llegada']; ?></span></TD>
    <TD class="scFormDataOdd css_movilizacion_hora_llegada_hora_line" id="hidden_field_data_movilizacion_hora_llegada" style="<?php echo $sStyleHidden_movilizacion_hora_llegada; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_hora_llegada_hora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["movilizacion_hora_llegada"]) &&  $this->nmgp_cmp_readonly["movilizacion_hora_llegada"] == "on") { 

 ?>
<input type="hidden" name="movilizacion_hora_llegada" value="<?php echo $this->form_encode_input($movilizacion_hora_llegada) . "\">" . $movilizacion_hora_llegada . ""; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_hora_llegada" class="sc-ui-readonly-movilizacion_hora_llegada css_movilizacion_hora_llegada_line" style="<?php echo $sStyleReadLab_movilizacion_hora_llegada; ?>"><?php echo $this->form_encode_input($movilizacion_hora_llegada); ?></span><span id="id_read_off_movilizacion_hora_llegada" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_hora_llegada; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_hora_llegada_obj" style="" id="id_sc_field_movilizacion_hora_llegada" type=text name="movilizacion_hora_llegada" value="<?php echo $this->form_encode_input($movilizacion_hora_llegada) ?>"
 size=8 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['movilizacion_hora_llegada']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['movilizacion_hora_llegada']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['movilizacion_hora_llegada']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>


<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["movilizacion_hora_llegada_hora"]) &&  $this->nmgp_cmp_readonly["movilizacion_hora_llegada_hora"] == "on") { 

 ?>
<input type="hidden" name="movilizacion_hora_llegada_hora" value="<?php echo $this->form_encode_input($movilizacion_hora_llegada_hora) . "\">" . $movilizacion_hora_llegada_hora . ""; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_hora_llegada_hora" class="sc-ui-readonly-movilizacion_hora_llegada_hora css_movilizacion_hora_llegada_hora_line" style="<?php echo $sStyleReadLab_movilizacion_hora_llegada; ?>"><?php echo $this->form_encode_input($movilizacion_hora_llegada_hora); ?></span><span id="id_read_off_movilizacion_hora_llegada_hora" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_hora_llegada; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_hora_llegada_hora_obj" style="" id="id_sc_field_movilizacion_hora_llegada_hora" type=text name="movilizacion_hora_llegada_hora" value="<?php echo $this->form_encode_input($movilizacion_hora_llegada_hora) ?>"
 size=8 alt="{datatype: 'time', dateSep: '<?php echo $this->field_config['movilizacion_hora_llegada']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['movilizacion_hora_llegada']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', timeSep: '<?php echo $this->field_config['movilizacion_hora_llegada_hora']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['movilizacion_hora_llegada_hora']['date_format']; ?>'}" ><?php
$tmp_form_data = $this->field_config['movilizacion_hora_llegada_hora']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_hora_llegada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_hora_llegada_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['movilizacion_total_galones']))
    {
        $this->nm_new_label['movilizacion_total_galones'] = "Total de Galones Consumidos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_total_galones = $this->movilizacion_total_galones;
   $sStyleHidden_movilizacion_total_galones = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_total_galones']) && $this->nmgp_cmp_hidden['movilizacion_total_galones'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_total_galones']);
       $sStyleHidden_movilizacion_total_galones = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_total_galones = 'display: none;';
   $sStyleReadInp_movilizacion_total_galones = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_total_galones']) && $this->nmgp_cmp_readonly['movilizacion_total_galones'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_total_galones']);
       $sStyleReadLab_movilizacion_total_galones = '';
       $sStyleReadInp_movilizacion_total_galones = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_total_galones']) && $this->nmgp_cmp_hidden['movilizacion_total_galones'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_total_galones" value="<?php echo $this->form_encode_input($movilizacion_total_galones) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_movilizacion_total_galones_label" id="hidden_field_label_movilizacion_total_galones" style="<?php echo $sStyleHidden_movilizacion_total_galones; ?>"><span id="id_label_movilizacion_total_galones"><?php echo $this->nm_new_label['movilizacion_total_galones']; ?></span></TD>
    <TD class="scFormDataOdd css_movilizacion_total_galones_line" id="hidden_field_data_movilizacion_total_galones" style="<?php echo $sStyleHidden_movilizacion_total_galones; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_total_galones_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="movilizacion_total_galones" value="<?php echo $this->form_encode_input($movilizacion_total_galones); ?>"><span id="id_ajax_label_movilizacion_total_galones"><?php echo nl2br($movilizacion_total_galones); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_total_galones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_total_galones_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_km_salida']))
    {
        $this->nm_new_label['movilizacion_km_salida'] = "Kilometraje de Salida del Vehículo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_km_salida = $this->movilizacion_km_salida;
   $sStyleHidden_movilizacion_km_salida = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_km_salida']) && $this->nmgp_cmp_hidden['movilizacion_km_salida'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_km_salida']);
       $sStyleHidden_movilizacion_km_salida = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_km_salida = 'display: none;';
   $sStyleReadInp_movilizacion_km_salida = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_km_salida']) && $this->nmgp_cmp_readonly['movilizacion_km_salida'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_km_salida']);
       $sStyleReadLab_movilizacion_km_salida = '';
       $sStyleReadInp_movilizacion_km_salida = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_km_salida']) && $this->nmgp_cmp_hidden['movilizacion_km_salida'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_km_salida" value="<?php echo $this->form_encode_input($movilizacion_km_salida) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_movilizacion_km_salida_label" id="hidden_field_label_movilizacion_km_salida" style="<?php echo $sStyleHidden_movilizacion_km_salida; ?>"><span id="id_label_movilizacion_km_salida"><?php echo $this->nm_new_label['movilizacion_km_salida']; ?></span></TD>
    <TD class="scFormDataOdd css_movilizacion_km_salida_line" id="hidden_field_data_movilizacion_km_salida" style="<?php echo $sStyleHidden_movilizacion_km_salida; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_km_salida_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="movilizacion_km_salida" value="<?php echo $this->form_encode_input($movilizacion_km_salida); ?>"><span id="id_ajax_label_movilizacion_km_salida"><?php echo nl2br($movilizacion_km_salida); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_km_salida_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_km_salida_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['movilizacion_cant_km_adicional']))
    {
        $this->nm_new_label['movilizacion_cant_km_adicional'] = "Cantidad de Kilometraje Adicional";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $sStyleHidden_movilizacion_cant_km_adicional = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_cant_km_adicional']) && $this->nmgp_cmp_hidden['movilizacion_cant_km_adicional'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_cant_km_adicional']);
       $sStyleHidden_movilizacion_cant_km_adicional = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_cant_km_adicional = 'display: none;';
   $sStyleReadInp_movilizacion_cant_km_adicional = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_cant_km_adicional']) && $this->nmgp_cmp_readonly['movilizacion_cant_km_adicional'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_cant_km_adicional']);
       $sStyleReadLab_movilizacion_cant_km_adicional = '';
       $sStyleReadInp_movilizacion_cant_km_adicional = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_cant_km_adicional']) && $this->nmgp_cmp_hidden['movilizacion_cant_km_adicional'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_cant_km_adicional" value="<?php echo $this->form_encode_input($movilizacion_cant_km_adicional) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_movilizacion_cant_km_adicional_label" id="hidden_field_label_movilizacion_cant_km_adicional" style="<?php echo $sStyleHidden_movilizacion_cant_km_adicional; ?>"><span id="id_label_movilizacion_cant_km_adicional"><?php echo $this->nm_new_label['movilizacion_cant_km_adicional']; ?></span></TD>
    <TD class="scFormDataOdd css_movilizacion_cant_km_adicional_line" id="hidden_field_data_movilizacion_cant_km_adicional" style="<?php echo $sStyleHidden_movilizacion_cant_km_adicional; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_cant_km_adicional_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["movilizacion_cant_km_adicional"]) &&  $this->nmgp_cmp_readonly["movilizacion_cant_km_adicional"] == "on") { 

 ?>
<input type="hidden" name="movilizacion_cant_km_adicional" value="<?php echo $this->form_encode_input($movilizacion_cant_km_adicional) . "\">" . $movilizacion_cant_km_adicional . ""; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_cant_km_adicional" class="sc-ui-readonly-movilizacion_cant_km_adicional css_movilizacion_cant_km_adicional_line" style="<?php echo $sStyleReadLab_movilizacion_cant_km_adicional; ?>"><?php echo $this->form_encode_input($this->movilizacion_cant_km_adicional); ?></span><span id="id_read_off_movilizacion_cant_km_adicional" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_cant_km_adicional; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_cant_km_adicional_obj" style="" id="id_sc_field_movilizacion_cant_km_adicional" type=text name="movilizacion_cant_km_adicional" value="<?php echo $this->form_encode_input($movilizacion_cant_km_adicional) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['movilizacion_cant_km_adicional']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['movilizacion_cant_km_adicional']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['movilizacion_cant_km_adicional']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_cant_km_adicional_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_cant_km_adicional_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_km_llegada']))
    {
        $this->nm_new_label['movilizacion_km_llegada'] = "Kilometraje de Llegada del Vehículo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $sStyleHidden_movilizacion_km_llegada = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_km_llegada']) && $this->nmgp_cmp_hidden['movilizacion_km_llegada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_km_llegada']);
       $sStyleHidden_movilizacion_km_llegada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_km_llegada = 'display: none;';
   $sStyleReadInp_movilizacion_km_llegada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_km_llegada']) && $this->nmgp_cmp_readonly['movilizacion_km_llegada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_km_llegada']);
       $sStyleReadLab_movilizacion_km_llegada = '';
       $sStyleReadInp_movilizacion_km_llegada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_km_llegada']) && $this->nmgp_cmp_hidden['movilizacion_km_llegada'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_km_llegada" value="<?php echo $this->form_encode_input($movilizacion_km_llegada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_movilizacion_km_llegada_label" id="hidden_field_label_movilizacion_km_llegada" style="<?php echo $sStyleHidden_movilizacion_km_llegada; ?>"><span id="id_label_movilizacion_km_llegada"><?php echo $this->nm_new_label['movilizacion_km_llegada']; ?></span></TD>
    <TD class="scFormDataOdd css_movilizacion_km_llegada_line" id="hidden_field_data_movilizacion_km_llegada" style="<?php echo $sStyleHidden_movilizacion_km_llegada; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_km_llegada_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["movilizacion_km_llegada"]) &&  $this->nmgp_cmp_readonly["movilizacion_km_llegada"] == "on") { 

 ?>
<input type="hidden" name="movilizacion_km_llegada" value="<?php echo $this->form_encode_input($movilizacion_km_llegada) . "\">" . $movilizacion_km_llegada . ""; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_km_llegada" class="sc-ui-readonly-movilizacion_km_llegada css_movilizacion_km_llegada_line" style="<?php echo $sStyleReadLab_movilizacion_km_llegada; ?>"><?php echo $this->form_encode_input($this->movilizacion_km_llegada); ?></span><span id="id_read_off_movilizacion_km_llegada" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_km_llegada; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_km_llegada_obj" style="" id="id_sc_field_movilizacion_km_llegada" type=text name="movilizacion_km_llegada" value="<?php echo $this->form_encode_input($movilizacion_km_llegada) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['movilizacion_km_llegada']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['movilizacion_km_llegada']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_km_llegada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_km_llegada_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['movilizacion_excedente']))
    {
        $this->nm_new_label['movilizacion_excedente'] = "Excedente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_excedente = $this->movilizacion_excedente;
   $sStyleHidden_movilizacion_excedente = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_excedente']) && $this->nmgp_cmp_hidden['movilizacion_excedente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_excedente']);
       $sStyleHidden_movilizacion_excedente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_excedente = 'display: none;';
   $sStyleReadInp_movilizacion_excedente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_excedente']) && $this->nmgp_cmp_readonly['movilizacion_excedente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_excedente']);
       $sStyleReadLab_movilizacion_excedente = '';
       $sStyleReadInp_movilizacion_excedente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_excedente']) && $this->nmgp_cmp_hidden['movilizacion_excedente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_excedente" value="<?php echo $this->form_encode_input($movilizacion_excedente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_movilizacion_excedente_label" id="hidden_field_label_movilizacion_excedente" style="<?php echo $sStyleHidden_movilizacion_excedente; ?>"><span id="id_label_movilizacion_excedente"><?php echo $this->nm_new_label['movilizacion_excedente']; ?></span></TD>
    <TD class="scFormDataOdd css_movilizacion_excedente_line" id="hidden_field_data_movilizacion_excedente" style="<?php echo $sStyleHidden_movilizacion_excedente; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_excedente_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="movilizacion_excedente" value="<?php echo $this->form_encode_input($movilizacion_excedente); ?>"><span id="id_ajax_label_movilizacion_excedente"><?php echo nl2br($movilizacion_excedente); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_excedente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_excedente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_recorrido_vehiculo']))
    {
        $this->nm_new_label['movilizacion_recorrido_vehiculo'] = "Kilometros Recorridos por el Vehículo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $sStyleHidden_movilizacion_recorrido_vehiculo = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_recorrido_vehiculo']) && $this->nmgp_cmp_hidden['movilizacion_recorrido_vehiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_recorrido_vehiculo']);
       $sStyleHidden_movilizacion_recorrido_vehiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_recorrido_vehiculo = 'display: none;';
   $sStyleReadInp_movilizacion_recorrido_vehiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_recorrido_vehiculo']) && $this->nmgp_cmp_readonly['movilizacion_recorrido_vehiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_recorrido_vehiculo']);
       $sStyleReadLab_movilizacion_recorrido_vehiculo = '';
       $sStyleReadInp_movilizacion_recorrido_vehiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_recorrido_vehiculo']) && $this->nmgp_cmp_hidden['movilizacion_recorrido_vehiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_recorrido_vehiculo" value="<?php echo $this->form_encode_input($movilizacion_recorrido_vehiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_movilizacion_recorrido_vehiculo_label" id="hidden_field_label_movilizacion_recorrido_vehiculo" style="<?php echo $sStyleHidden_movilizacion_recorrido_vehiculo; ?>"><span id="id_label_movilizacion_recorrido_vehiculo"><?php echo $this->nm_new_label['movilizacion_recorrido_vehiculo']; ?></span></TD>
    <TD class="scFormDataOdd css_movilizacion_recorrido_vehiculo_line" id="hidden_field_data_movilizacion_recorrido_vehiculo" style="<?php echo $sStyleHidden_movilizacion_recorrido_vehiculo; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_recorrido_vehiculo_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="movilizacion_recorrido_vehiculo" value="<?php echo $this->form_encode_input($movilizacion_recorrido_vehiculo); ?>"><span id="id_ajax_label_movilizacion_recorrido_vehiculo"><?php echo nl2br($movilizacion_recorrido_vehiculo); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_recorrido_vehiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_recorrido_vehiculo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['movilizacion_total_km_recorrido']))
    {
        $this->nm_new_label['movilizacion_total_km_recorrido'] = "Total de Kilometraje Real Recorrido";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $sStyleHidden_movilizacion_total_km_recorrido = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_total_km_recorrido']) && $this->nmgp_cmp_hidden['movilizacion_total_km_recorrido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_total_km_recorrido']);
       $sStyleHidden_movilizacion_total_km_recorrido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_total_km_recorrido = 'display: none;';
   $sStyleReadInp_movilizacion_total_km_recorrido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_total_km_recorrido']) && $this->nmgp_cmp_readonly['movilizacion_total_km_recorrido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_total_km_recorrido']);
       $sStyleReadLab_movilizacion_total_km_recorrido = '';
       $sStyleReadInp_movilizacion_total_km_recorrido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_total_km_recorrido']) && $this->nmgp_cmp_hidden['movilizacion_total_km_recorrido'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_total_km_recorrido" value="<?php echo $this->form_encode_input($movilizacion_total_km_recorrido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_movilizacion_total_km_recorrido_label" id="hidden_field_label_movilizacion_total_km_recorrido" style="<?php echo $sStyleHidden_movilizacion_total_km_recorrido; ?>"><span id="id_label_movilizacion_total_km_recorrido"><?php echo $this->nm_new_label['movilizacion_total_km_recorrido']; ?></span></TD>
    <TD class="scFormDataOdd css_movilizacion_total_km_recorrido_line" id="hidden_field_data_movilizacion_total_km_recorrido" style="<?php echo $sStyleHidden_movilizacion_total_km_recorrido; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_total_km_recorrido_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="movilizacion_total_km_recorrido" value="<?php echo $this->form_encode_input($movilizacion_total_km_recorrido); ?>"><span id="id_ajax_label_movilizacion_total_km_recorrido"><?php echo nl2br($movilizacion_total_km_recorrido); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_total_km_recorrido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_total_km_recorrido_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_costo_galon']))
    {
        $this->nm_new_label['movilizacion_costo_galon'] = "Valor del Combustible";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_costo_galon = $this->movilizacion_costo_galon;
   $sStyleHidden_movilizacion_costo_galon = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_costo_galon']) && $this->nmgp_cmp_hidden['movilizacion_costo_galon'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_costo_galon']);
       $sStyleHidden_movilizacion_costo_galon = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_costo_galon = 'display: none;';
   $sStyleReadInp_movilizacion_costo_galon = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['movilizacion_costo_galon']) && $this->nmgp_cmp_readonly['movilizacion_costo_galon'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_costo_galon']);
       $sStyleReadLab_movilizacion_costo_galon = '';
       $sStyleReadInp_movilizacion_costo_galon = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_costo_galon']) && $this->nmgp_cmp_hidden['movilizacion_costo_galon'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_costo_galon" value="<?php echo $this->form_encode_input($movilizacion_costo_galon) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_movilizacion_costo_galon_label" id="hidden_field_label_movilizacion_costo_galon" style="<?php echo $sStyleHidden_movilizacion_costo_galon; ?>"><span id="id_label_movilizacion_costo_galon"><?php echo $this->nm_new_label['movilizacion_costo_galon']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['php_cmp_required']['movilizacion_costo_galon']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['php_cmp_required']['movilizacion_costo_galon'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_movilizacion_costo_galon_line" id="hidden_field_data_movilizacion_costo_galon" style="<?php echo $sStyleHidden_movilizacion_costo_galon; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_costo_galon_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["movilizacion_costo_galon"]) &&  $this->nmgp_cmp_readonly["movilizacion_costo_galon"] == "on") { 

 ?>
<input type="hidden" name="movilizacion_costo_galon" value="<?php echo $this->form_encode_input($movilizacion_costo_galon) . "\">" . $movilizacion_costo_galon . ""; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_costo_galon" class="sc-ui-readonly-movilizacion_costo_galon css_movilizacion_costo_galon_line" style="<?php echo $sStyleReadLab_movilizacion_costo_galon; ?>"><?php echo $this->form_encode_input($this->movilizacion_costo_galon); ?></span><span id="id_read_off_movilizacion_costo_galon" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_costo_galon; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_costo_galon_obj" style="" id="id_sc_field_movilizacion_costo_galon" type=text name="movilizacion_costo_galon" value="<?php echo $this->form_encode_input($movilizacion_costo_galon) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['movilizacion_costo_galon']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['movilizacion_costo_galon']['format_pos'] || 3 == $this->field_config['movilizacion_costo_galon']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 3, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['movilizacion_costo_galon']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['movilizacion_costo_galon']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['movilizacion_costo_galon']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_costo_galon_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_costo_galon_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>
<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="55%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detalle_movilizacion']))
    {
        $this->nm_new_label['detalle_movilizacion'] = "Ingreso de Rutas de la Movilización";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detalle_movilizacion = $this->detalle_movilizacion;
   $sStyleHidden_detalle_movilizacion = '';
   if (isset($this->nmgp_cmp_hidden['detalle_movilizacion']) && $this->nmgp_cmp_hidden['detalle_movilizacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detalle_movilizacion']);
       $sStyleHidden_detalle_movilizacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detalle_movilizacion = 'display: none;';
   $sStyleReadInp_detalle_movilizacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detalle_movilizacion']) && $this->nmgp_cmp_readonly['detalle_movilizacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detalle_movilizacion']);
       $sStyleReadLab_detalle_movilizacion = '';
       $sStyleReadInp_detalle_movilizacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detalle_movilizacion']) && $this->nmgp_cmp_hidden['detalle_movilizacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detalle_movilizacion" value="<?php echo $this->form_encode_input($detalle_movilizacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detalle_movilizacion_line" id="hidden_field_data_detalle_movilizacion" style="<?php echo $sStyleHidden_detalle_movilizacion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detalle_movilizacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_detalle_movilizacion_label"><span id="id_label_detalle_movilizacion"><?php echo $this->nm_new_label['detalle_movilizacion']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['foreign_key']['id_movilizacion'] = $this->nmgp_dados_form['id_movilizacion'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['where_filter'] = "Id_Movilizacion = " . $this->nmgp_dados_form['id_movilizacion'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['where_detal']  = "Id_Movilizacion = " . $this->nmgp_dados_form['id_movilizacion'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_movilizacion']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init'] ]['form_detalle_movilizacion']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_movilizacion_empty.htm' : $this->Ini->link_form_detalle_movilizacion_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y&sc_ifr_height=500';
if (isset($this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion']) && 'nmsc_iframe_liga_form_detalle_movilizacion' != $this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['form_detalle_movilizacion_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_detalle_movilizacion"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="100%" name="nmsc_iframe_liga_form_detalle_movilizacion"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_movilizacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_movilizacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['pdf_view'])
{
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna_off", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-15", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-16", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-17", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-18", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal_off", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-19", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_movilizacion");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_movilizacion");
 parent.scAjaxDetailHeight("form_movilizacion", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_movilizacion", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_movilizacion", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<script type="text/javascript">
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-5").length && $("#sc_b_del_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_format_imp() {
		if ($("#sc_b_prt_t.sc-unique-btn-6").length && $("#sc_b_prt_t.sc-unique-btn-6").is(":visible")) {
			nm_gp_form_print()
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-11").length && $("#sc_b_sai_t.sc-unique-btn-11").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-12").length && $("#sc_b_ini_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
		if ($("#sc_b_ini_off_b.sc-unique-btn-13").length && $("#sc_b_ini_off_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-14").length && $("#sc_b_ret_b.sc-unique-btn-14").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
		if ($("#sc_b_ret_off_b.sc-unique-btn-15").length && $("#sc_b_ret_off_b.sc-unique-btn-15").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-16").length && $("#sc_b_avc_b.sc-unique-btn-16").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
		if ($("#sc_b_avc_off_b.sc-unique-btn-17").length && $("#sc_b_avc_off_b.sc-unique-btn-17").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-18").length && $("#sc_b_fim_b.sc-unique-btn-18").is(":visible")) {
			nm_move ('final');
			 return;
		}
		if ($("#sc_b_fim_off_b.sc-unique-btn-19").length && $("#sc_b_fim_off_b.sc-unique-btn-19").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
