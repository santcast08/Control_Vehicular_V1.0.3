<?php
class form_detalle_movilizacion_impresion_form extends form_detalle_movilizacion_impresion_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " Detalle Movilizacion"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " Detalle Movilizacion"); } ?></TITLE>
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
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
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
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_desc ?>'], 
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_asc ?>']{opacity:1!important;} 
   .scFormLabelOddMult a img{opacity:0;transition:all .2s;} 
   .scFormLabelOddMult:HOVER a img{opacity:1;transition:all .2s;} 
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_detalle_movilizacion_impresion/form_detalle_movilizacion_impresion_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_detalle_movilizacion_impresion_sajax_js.php");
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
<?php

include_once('form_detalle_movilizacion_impresion_jquery.php');

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


  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

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
   });
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
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
 include_once("form_detalle_movilizacion_impresion_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
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
<?php
$_SESSION['scriptcase']['error_span_title']['form_detalle_movilizacion_impresion'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_detalle_movilizacion_impresion'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " Detalle Movilizacion"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " Detalle Movilizacion"; } ?></span></td>
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
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
   if (!isset($this->nmgp_cmp_hidden['iddetalle_movilizacion_']))
   {
       $this->nmgp_cmp_hidden['iddetalle_movilizacion_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['detalle_movilizacion_distancia_']))
   {
       $this->nmgp_cmp_hidden['detalle_movilizacion_distancia_'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
$labelRowCount = 0;
?>
   <tr class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


    ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_origen_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_origen_'] == 'off') { $sStyleHidden_detalle_movilizacion_origen_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['detalle_movilizacion_origen_']) || $this->nmgp_cmp_hidden['detalle_movilizacion_origen_'] == 'on') {
      if (!isset($this->nm_new_label['detalle_movilizacion_origen_'])) {
          $this->nm_new_label['detalle_movilizacion_origen_'] = "Origen"; } ?>

    <TD class="scFormLabelOddMult css_detalle_movilizacion_origen__label" id="hidden_field_label_detalle_movilizacion_origen_" style="<?php echo $sStyleHidden_detalle_movilizacion_origen_; ?>" > <?php echo $this->nm_new_label['detalle_movilizacion_origen_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_destino_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_destino_'] == 'off') { $sStyleHidden_detalle_movilizacion_destino_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['detalle_movilizacion_destino_']) || $this->nmgp_cmp_hidden['detalle_movilizacion_destino_'] == 'on') {
      if (!isset($this->nm_new_label['detalle_movilizacion_destino_'])) {
          $this->nm_new_label['detalle_movilizacion_destino_'] = "Destino"; } ?>

    <TD class="scFormLabelOddMult css_detalle_movilizacion_destino__label" id="hidden_field_label_detalle_movilizacion_destino_" style="<?php echo $sStyleHidden_detalle_movilizacion_destino_; ?>" > <?php echo $this->nm_new_label['detalle_movilizacion_destino_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_fecha_inicio_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_fecha_inicio_'] == 'off') { $sStyleHidden_detalle_movilizacion_fecha_inicio_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['detalle_movilizacion_fecha_inicio_']) || $this->nmgp_cmp_hidden['detalle_movilizacion_fecha_inicio_'] == 'on') {
      if (!isset($this->nm_new_label['detalle_movilizacion_fecha_inicio_'])) {
          $this->nm_new_label['detalle_movilizacion_fecha_inicio_'] = "Fecha Salida"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['detalle_movilizacion_fecha_inicio_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_detalle_movilizacion_fecha_inicio__label" id="hidden_field_label_detalle_movilizacion_fecha_inicio_" style="<?php echo $sStyleHidden_detalle_movilizacion_fecha_inicio_; ?>" > <?php echo $this->nm_new_label['detalle_movilizacion_fecha_inicio_'] ?><br><span class="scFormDataHelpOddMult"><?php echo $date_format_show ?></span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_fecha_fin_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_fecha_fin_'] == 'off') { $sStyleHidden_detalle_movilizacion_fecha_fin_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['detalle_movilizacion_fecha_fin_']) || $this->nmgp_cmp_hidden['detalle_movilizacion_fecha_fin_'] == 'on') {
      if (!isset($this->nm_new_label['detalle_movilizacion_fecha_fin_'])) {
          $this->nm_new_label['detalle_movilizacion_fecha_fin_'] = "Fecha Llegada"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['detalle_movilizacion_fecha_fin_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_detalle_movilizacion_fecha_fin__label" id="hidden_field_label_detalle_movilizacion_fecha_fin_" style="<?php echo $sStyleHidden_detalle_movilizacion_fecha_fin_; ?>" > <?php echo $this->nm_new_label['detalle_movilizacion_fecha_fin_'] ?><br><span class="scFormDataHelpOddMult"><?php echo $date_format_show ?></span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_distancia_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_distancia_'] == 'off') { $sStyleHidden_detalle_movilizacion_distancia_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['detalle_movilizacion_distancia_']) || $this->nmgp_cmp_hidden['detalle_movilizacion_distancia_'] == 'on') {
      if (!isset($this->nm_new_label['detalle_movilizacion_distancia_'])) {
          $this->nm_new_label['detalle_movilizacion_distancia_'] = "Distancia"; } ?>

    <TD class="scFormLabelOddMult css_detalle_movilizacion_distancia__label" id="hidden_field_label_detalle_movilizacion_distancia_" style="<?php echo $sStyleHidden_detalle_movilizacion_distancia_; ?>" > <?php echo $this->nm_new_label['detalle_movilizacion_distancia_'] ?> </TD>
   <?php } ?>

   <?php if ((!isset($this->nmgp_cmp_hidden['iddetalle_movilizacion_']) || $this->nmgp_cmp_hidden['iddetalle_movilizacion_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['iddetalle_movilizacion_'])) {
          $this->nm_new_label['iddetalle_movilizacion_'] = "Iddetalle Movilizacion"; } ?>

    <TD class="scFormLabelOddMult css_iddetalle_movilizacion__label" id="hidden_field_label_iddetalle_movilizacion_" style="<?php echo $sStyleHidden_iddetalle_movilizacion_; ?>" > <?php echo $this->nm_new_label['iddetalle_movilizacion_'] ?> </TD>
   <?php }?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_detalle_movilizacion_impresion);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_detalle_movilizacion_impresion = $this->form_vert_form_detalle_movilizacion_impresion;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_detalle_movilizacion_impresion))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['detalle_movilizacion_origen_']))
           {
               $this->nmgp_cmp_readonly['detalle_movilizacion_origen_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['detalle_movilizacion_destino_']))
           {
               $this->nmgp_cmp_readonly['detalle_movilizacion_destino_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['detalle_movilizacion_fecha_inicio_']))
           {
               $this->nmgp_cmp_readonly['detalle_movilizacion_fecha_inicio_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['detalle_movilizacion_fecha_fin_']))
           {
               $this->nmgp_cmp_readonly['detalle_movilizacion_fecha_fin_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['detalle_movilizacion_distancia_']))
           {
               $this->nmgp_cmp_readonly['detalle_movilizacion_distancia_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['iddetalle_movilizacion_']))
           {
               $this->nmgp_cmp_readonly['iddetalle_movilizacion_'] = 'on';
           }
   foreach ($this->form_vert_form_detalle_movilizacion_impresion as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->id_movilizacion_ = $this->form_vert_form_detalle_movilizacion_impresion[$sc_seq_vert]['id_movilizacion_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['detalle_movilizacion_origen_'] = true;
           $this->nmgp_cmp_readonly['detalle_movilizacion_destino_'] = true;
           $this->nmgp_cmp_readonly['detalle_movilizacion_fecha_inicio_'] = true;
           $this->nmgp_cmp_readonly['detalle_movilizacion_fecha_fin_'] = true;
           $this->nmgp_cmp_readonly['detalle_movilizacion_distancia_'] = true;
           $this->nmgp_cmp_readonly['iddetalle_movilizacion_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['detalle_movilizacion_origen_']) || $this->nmgp_cmp_readonly['detalle_movilizacion_origen_'] != "on") {$this->nmgp_cmp_readonly['detalle_movilizacion_origen_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['detalle_movilizacion_destino_']) || $this->nmgp_cmp_readonly['detalle_movilizacion_destino_'] != "on") {$this->nmgp_cmp_readonly['detalle_movilizacion_destino_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['detalle_movilizacion_fecha_inicio_']) || $this->nmgp_cmp_readonly['detalle_movilizacion_fecha_inicio_'] != "on") {$this->nmgp_cmp_readonly['detalle_movilizacion_fecha_inicio_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['detalle_movilizacion_fecha_fin_']) || $this->nmgp_cmp_readonly['detalle_movilizacion_fecha_fin_'] != "on") {$this->nmgp_cmp_readonly['detalle_movilizacion_fecha_fin_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['detalle_movilizacion_distancia_']) || $this->nmgp_cmp_readonly['detalle_movilizacion_distancia_'] != "on") {$this->nmgp_cmp_readonly['detalle_movilizacion_distancia_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['iddetalle_movilizacion_']) || $this->nmgp_cmp_readonly['iddetalle_movilizacion_'] != "on") {$this->nmgp_cmp_readonly['iddetalle_movilizacion_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->detalle_movilizacion_origen_ = $this->form_vert_form_detalle_movilizacion_impresion[$sc_seq_vert]['detalle_movilizacion_origen_']; 
       $detalle_movilizacion_origen_ = $this->detalle_movilizacion_origen_; 
       $sStyleHidden_detalle_movilizacion_origen_ = '';
       if (isset($sCheckRead_detalle_movilizacion_origen_))
       {
           unset($sCheckRead_detalle_movilizacion_origen_);
       }
       if (isset($this->nmgp_cmp_readonly['detalle_movilizacion_origen_']))
       {
           $sCheckRead_detalle_movilizacion_origen_ = $this->nmgp_cmp_readonly['detalle_movilizacion_origen_'];
       }
       if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_origen_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_origen_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['detalle_movilizacion_origen_']);
           $sStyleHidden_detalle_movilizacion_origen_ = 'display: none;';
       }
       $bTestReadOnly_detalle_movilizacion_origen_ = true;
       $sStyleReadLab_detalle_movilizacion_origen_ = 'display: none;';
       $sStyleReadInp_detalle_movilizacion_origen_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["detalle_movilizacion_origen_"]) &&  $this->nmgp_cmp_readonly["detalle_movilizacion_origen_"] == "on"))
       {
           $bTestReadOnly_detalle_movilizacion_origen_ = false;
           unset($this->nmgp_cmp_readonly['detalle_movilizacion_origen_']);
           $sStyleReadLab_detalle_movilizacion_origen_ = '';
           $sStyleReadInp_detalle_movilizacion_origen_ = 'display: none;';
       }
       $this->detalle_movilizacion_destino_ = $this->form_vert_form_detalle_movilizacion_impresion[$sc_seq_vert]['detalle_movilizacion_destino_']; 
       $detalle_movilizacion_destino_ = $this->detalle_movilizacion_destino_; 
       $sStyleHidden_detalle_movilizacion_destino_ = '';
       if (isset($sCheckRead_detalle_movilizacion_destino_))
       {
           unset($sCheckRead_detalle_movilizacion_destino_);
       }
       if (isset($this->nmgp_cmp_readonly['detalle_movilizacion_destino_']))
       {
           $sCheckRead_detalle_movilizacion_destino_ = $this->nmgp_cmp_readonly['detalle_movilizacion_destino_'];
       }
       if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_destino_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_destino_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['detalle_movilizacion_destino_']);
           $sStyleHidden_detalle_movilizacion_destino_ = 'display: none;';
       }
       $bTestReadOnly_detalle_movilizacion_destino_ = true;
       $sStyleReadLab_detalle_movilizacion_destino_ = 'display: none;';
       $sStyleReadInp_detalle_movilizacion_destino_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["detalle_movilizacion_destino_"]) &&  $this->nmgp_cmp_readonly["detalle_movilizacion_destino_"] == "on"))
       {
           $bTestReadOnly_detalle_movilizacion_destino_ = false;
           unset($this->nmgp_cmp_readonly['detalle_movilizacion_destino_']);
           $sStyleReadLab_detalle_movilizacion_destino_ = '';
           $sStyleReadInp_detalle_movilizacion_destino_ = 'display: none;';
       }
       $this->detalle_movilizacion_fecha_inicio_ = $this->form_vert_form_detalle_movilizacion_impresion[$sc_seq_vert]['detalle_movilizacion_fecha_inicio_']; 
       $detalle_movilizacion_fecha_inicio_ = $this->detalle_movilizacion_fecha_inicio_; 
       $sStyleHidden_detalle_movilizacion_fecha_inicio_ = '';
       if (isset($sCheckRead_detalle_movilizacion_fecha_inicio_))
       {
           unset($sCheckRead_detalle_movilizacion_fecha_inicio_);
       }
       if (isset($this->nmgp_cmp_readonly['detalle_movilizacion_fecha_inicio_']))
       {
           $sCheckRead_detalle_movilizacion_fecha_inicio_ = $this->nmgp_cmp_readonly['detalle_movilizacion_fecha_inicio_'];
       }
       if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_fecha_inicio_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_fecha_inicio_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['detalle_movilizacion_fecha_inicio_']);
           $sStyleHidden_detalle_movilizacion_fecha_inicio_ = 'display: none;';
       }
       $bTestReadOnly_detalle_movilizacion_fecha_inicio_ = true;
       $sStyleReadLab_detalle_movilizacion_fecha_inicio_ = 'display: none;';
       $sStyleReadInp_detalle_movilizacion_fecha_inicio_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["detalle_movilizacion_fecha_inicio_"]) &&  $this->nmgp_cmp_readonly["detalle_movilizacion_fecha_inicio_"] == "on"))
       {
           $bTestReadOnly_detalle_movilizacion_fecha_inicio_ = false;
           unset($this->nmgp_cmp_readonly['detalle_movilizacion_fecha_inicio_']);
           $sStyleReadLab_detalle_movilizacion_fecha_inicio_ = '';
           $sStyleReadInp_detalle_movilizacion_fecha_inicio_ = 'display: none;';
       }
       $this->detalle_movilizacion_fecha_fin_ = $this->form_vert_form_detalle_movilizacion_impresion[$sc_seq_vert]['detalle_movilizacion_fecha_fin_']; 
       $detalle_movilizacion_fecha_fin_ = $this->detalle_movilizacion_fecha_fin_; 
       $sStyleHidden_detalle_movilizacion_fecha_fin_ = '';
       if (isset($sCheckRead_detalle_movilizacion_fecha_fin_))
       {
           unset($sCheckRead_detalle_movilizacion_fecha_fin_);
       }
       if (isset($this->nmgp_cmp_readonly['detalle_movilizacion_fecha_fin_']))
       {
           $sCheckRead_detalle_movilizacion_fecha_fin_ = $this->nmgp_cmp_readonly['detalle_movilizacion_fecha_fin_'];
       }
       if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_fecha_fin_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_fecha_fin_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['detalle_movilizacion_fecha_fin_']);
           $sStyleHidden_detalle_movilizacion_fecha_fin_ = 'display: none;';
       }
       $bTestReadOnly_detalle_movilizacion_fecha_fin_ = true;
       $sStyleReadLab_detalle_movilizacion_fecha_fin_ = 'display: none;';
       $sStyleReadInp_detalle_movilizacion_fecha_fin_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["detalle_movilizacion_fecha_fin_"]) &&  $this->nmgp_cmp_readonly["detalle_movilizacion_fecha_fin_"] == "on"))
       {
           $bTestReadOnly_detalle_movilizacion_fecha_fin_ = false;
           unset($this->nmgp_cmp_readonly['detalle_movilizacion_fecha_fin_']);
           $sStyleReadLab_detalle_movilizacion_fecha_fin_ = '';
           $sStyleReadInp_detalle_movilizacion_fecha_fin_ = 'display: none;';
       }
       $this->detalle_movilizacion_distancia_ = $this->form_vert_form_detalle_movilizacion_impresion[$sc_seq_vert]['detalle_movilizacion_distancia_']; 
       $detalle_movilizacion_distancia_ = $this->detalle_movilizacion_distancia_; 
       if (!isset($this->nmgp_cmp_hidden['detalle_movilizacion_distancia_']))
       {
           $this->nmgp_cmp_hidden['detalle_movilizacion_distancia_'] = 'off';
       }
       $sStyleHidden_detalle_movilizacion_distancia_ = '';
       if (isset($sCheckRead_detalle_movilizacion_distancia_))
       {
           unset($sCheckRead_detalle_movilizacion_distancia_);
       }
       if (isset($this->nmgp_cmp_readonly['detalle_movilizacion_distancia_']))
       {
           $sCheckRead_detalle_movilizacion_distancia_ = $this->nmgp_cmp_readonly['detalle_movilizacion_distancia_'];
       }
       if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_distancia_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_distancia_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['detalle_movilizacion_distancia_']);
           $sStyleHidden_detalle_movilizacion_distancia_ = 'display: none;';
       }
       $bTestReadOnly_detalle_movilizacion_distancia_ = true;
       $sStyleReadLab_detalle_movilizacion_distancia_ = 'display: none;';
       $sStyleReadInp_detalle_movilizacion_distancia_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["detalle_movilizacion_distancia_"]) &&  $this->nmgp_cmp_readonly["detalle_movilizacion_distancia_"] == "on"))
       {
           $bTestReadOnly_detalle_movilizacion_distancia_ = false;
           unset($this->nmgp_cmp_readonly['detalle_movilizacion_distancia_']);
           $sStyleReadLab_detalle_movilizacion_distancia_ = '';
           $sStyleReadInp_detalle_movilizacion_distancia_ = 'display: none;';
       }
       $this->iddetalle_movilizacion_ = $this->form_vert_form_detalle_movilizacion_impresion[$sc_seq_vert]['iddetalle_movilizacion_']; 
       $iddetalle_movilizacion_ = $this->iddetalle_movilizacion_; 
       if (!isset($this->nmgp_cmp_hidden['iddetalle_movilizacion_']))
       {
           $this->nmgp_cmp_hidden['iddetalle_movilizacion_'] = 'off';
       }
       $sStyleHidden_iddetalle_movilizacion_ = '';
       if (isset($sCheckRead_iddetalle_movilizacion_))
       {
           unset($sCheckRead_iddetalle_movilizacion_);
       }
       if (isset($this->nmgp_cmp_readonly['iddetalle_movilizacion_']))
       {
           $sCheckRead_iddetalle_movilizacion_ = $this->nmgp_cmp_readonly['iddetalle_movilizacion_'];
       }
       if (isset($this->nmgp_cmp_hidden['iddetalle_movilizacion_']) && $this->nmgp_cmp_hidden['iddetalle_movilizacion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['iddetalle_movilizacion_']);
           $sStyleHidden_iddetalle_movilizacion_ = 'display: none;';
       }
       $bTestReadOnly_iddetalle_movilizacion_ = true;
       $sStyleReadLab_iddetalle_movilizacion_ = 'display: none;';
       $sStyleReadInp_iddetalle_movilizacion_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["iddetalle_movilizacion_"]) &&  $this->nmgp_cmp_readonly["iddetalle_movilizacion_"] == "on"))
       {
           $bTestReadOnly_iddetalle_movilizacion_ = false;
           unset($this->nmgp_cmp_readonly['iddetalle_movilizacion_']);
           $sStyleReadLab_iddetalle_movilizacion_ = '';
           $sStyleReadInp_iddetalle_movilizacion_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['delete'] == "off") {
        $sDisplayDelete = 'display: none';
    }
    else {
        $sDisplayDelete = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayDelete. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['update'] == "off") {
        $sDisplayUpdate = 'display: none';
    }
    else {
        $sDisplayUpdate = '';
    }
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = $sDisplayUpdate;
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_detalle_movilizacion_impresion_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_detalle_movilizacion_impresion_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detalle_movilizacion_impresion_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_detalle_movilizacion_impresion_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detalle_movilizacion_impresion_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_detalle_movilizacion_impresion_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_origen_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_origen_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="detalle_movilizacion_origen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->detalle_movilizacion_origen_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_detalle_movilizacion_origen__line" id="hidden_field_data_detalle_movilizacion_origen_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_detalle_movilizacion_origen_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_detalle_movilizacion_origen__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_detalle_movilizacion_origen_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["detalle_movilizacion_origen_"]) &&  $this->nmgp_cmp_readonly["detalle_movilizacion_origen_"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_origen_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_origen_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_origen_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_origen_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_origen_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_origen_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_origen_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_origen_'] = array(); 
    }

   $old_value_detalle_movilizacion_fecha_inicio_ = $this->detalle_movilizacion_fecha_inicio_;
   $old_value_detalle_movilizacion_fecha_fin_ = $this->detalle_movilizacion_fecha_fin_;
   $old_value_detalle_movilizacion_distancia_ = $this->detalle_movilizacion_distancia_;
   $old_value_iddetalle_movilizacion_ = $this->iddetalle_movilizacion_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_detalle_movilizacion_fecha_inicio_ = $this->detalle_movilizacion_fecha_inicio_;
   $unformatted_value_detalle_movilizacion_fecha_fin_ = $this->detalle_movilizacion_fecha_fin_;
   $unformatted_value_detalle_movilizacion_distancia_ = $this->detalle_movilizacion_distancia_;
   $unformatted_value_iddetalle_movilizacion_ = $this->iddetalle_movilizacion_;

   $nm_comando = "SELECT rutas_Destino, rutas_Destino  FROM rutas  GROUP BY rutas_Destino ORDER BY rutas_Destino";

   $this->detalle_movilizacion_fecha_inicio_ = $old_value_detalle_movilizacion_fecha_inicio_;
   $this->detalle_movilizacion_fecha_fin_ = $old_value_detalle_movilizacion_fecha_fin_;
   $this->detalle_movilizacion_distancia_ = $old_value_detalle_movilizacion_distancia_;
   $this->iddetalle_movilizacion_ = $old_value_iddetalle_movilizacion_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_origen_'][] = $rs->fields[0];
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
   $detalle_movilizacion_origen__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->detalle_movilizacion_origen__1))
          {
              foreach ($this->detalle_movilizacion_origen__1 as $tmp_detalle_movilizacion_origen_)
              {
                  if (trim($tmp_detalle_movilizacion_origen_) === trim($cadaselect[1])) { $detalle_movilizacion_origen__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->detalle_movilizacion_origen_) === trim($cadaselect[1])) { $detalle_movilizacion_origen__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="detalle_movilizacion_origen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detalle_movilizacion_origen_) . "\"><span id=\"id_ajax_label_detalle_movilizacion_origen_" . $sc_seq_vert . "\">" . $detalle_movilizacion_origen__look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_detalle_movilizacion_origen_();
   $x = 0 ; 
   $detalle_movilizacion_origen__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->detalle_movilizacion_origen__1))
          {
              foreach ($this->detalle_movilizacion_origen__1 as $tmp_detalle_movilizacion_origen_)
              {
                  if (trim($tmp_detalle_movilizacion_origen_) === trim($cadaselect[1])) { $detalle_movilizacion_origen__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->detalle_movilizacion_origen_) === trim($cadaselect[1])) { $detalle_movilizacion_origen__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($detalle_movilizacion_origen__look))
          {
              $detalle_movilizacion_origen__look = $this->detalle_movilizacion_origen_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_detalle_movilizacion_origen_" . $sc_seq_vert . "\" class=\"css_detalle_movilizacion_origen__line\" style=\"" .  $sStyleReadLab_detalle_movilizacion_origen_ . "\">" . $this->form_encode_input($detalle_movilizacion_origen__look) . "</span><span id=\"id_read_off_detalle_movilizacion_origen_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_detalle_movilizacion_origen_ . "\">";
   echo " <span id=\"idAjaxSelect_detalle_movilizacion_origen_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_detalle_movilizacion_origen__obj\" style=\"\" id=\"id_sc_field_detalle_movilizacion_origen_" . $sc_seq_vert . "\" name=\"detalle_movilizacion_origen_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_origen_'][] = ''; 
   echo "  <option value=\"\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->detalle_movilizacion_origen_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->detalle_movilizacion_origen_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_movilizacion_origen_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_movilizacion_origen_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_destino_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_destino_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="detalle_movilizacion_destino_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->detalle_movilizacion_destino_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_detalle_movilizacion_destino__line" id="hidden_field_data_detalle_movilizacion_destino_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_detalle_movilizacion_destino_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_detalle_movilizacion_destino__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_detalle_movilizacion_destino_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["detalle_movilizacion_destino_"]) &&  $this->nmgp_cmp_readonly["detalle_movilizacion_destino_"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_destino_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_destino_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_destino_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_destino_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_destino_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_destino_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_destino_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_destino_'] = array(); 
    }

   $old_value_detalle_movilizacion_fecha_inicio_ = $this->detalle_movilizacion_fecha_inicio_;
   $old_value_detalle_movilizacion_fecha_fin_ = $this->detalle_movilizacion_fecha_fin_;
   $old_value_detalle_movilizacion_distancia_ = $this->detalle_movilizacion_distancia_;
   $old_value_iddetalle_movilizacion_ = $this->iddetalle_movilizacion_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_detalle_movilizacion_fecha_inicio_ = $this->detalle_movilizacion_fecha_inicio_;
   $unformatted_value_detalle_movilizacion_fecha_fin_ = $this->detalle_movilizacion_fecha_fin_;
   $unformatted_value_detalle_movilizacion_distancia_ = $this->detalle_movilizacion_distancia_;
   $unformatted_value_iddetalle_movilizacion_ = $this->iddetalle_movilizacion_;

   $nm_comando = "SELECT rutas_Destino, rutas_Destino  FROM rutas  GROUP BY rutas_Destino ORDER BY rutas_Destino";

   $this->detalle_movilizacion_fecha_inicio_ = $old_value_detalle_movilizacion_fecha_inicio_;
   $this->detalle_movilizacion_fecha_fin_ = $old_value_detalle_movilizacion_fecha_fin_;
   $this->detalle_movilizacion_distancia_ = $old_value_detalle_movilizacion_distancia_;
   $this->iddetalle_movilizacion_ = $old_value_iddetalle_movilizacion_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_destino_'][] = $rs->fields[0];
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
   $detalle_movilizacion_destino__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->detalle_movilizacion_destino__1))
          {
              foreach ($this->detalle_movilizacion_destino__1 as $tmp_detalle_movilizacion_destino_)
              {
                  if (trim($tmp_detalle_movilizacion_destino_) === trim($cadaselect[1])) { $detalle_movilizacion_destino__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->detalle_movilizacion_destino_) === trim($cadaselect[1])) { $detalle_movilizacion_destino__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="detalle_movilizacion_destino_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detalle_movilizacion_destino_) . "\"><span id=\"id_ajax_label_detalle_movilizacion_destino_" . $sc_seq_vert . "\">" . $detalle_movilizacion_destino__look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_detalle_movilizacion_destino_();
   $x = 0 ; 
   $detalle_movilizacion_destino__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->detalle_movilizacion_destino__1))
          {
              foreach ($this->detalle_movilizacion_destino__1 as $tmp_detalle_movilizacion_destino_)
              {
                  if (trim($tmp_detalle_movilizacion_destino_) === trim($cadaselect[1])) { $detalle_movilizacion_destino__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->detalle_movilizacion_destino_) === trim($cadaselect[1])) { $detalle_movilizacion_destino__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($detalle_movilizacion_destino__look))
          {
              $detalle_movilizacion_destino__look = $this->detalle_movilizacion_destino_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_detalle_movilizacion_destino_" . $sc_seq_vert . "\" class=\"css_detalle_movilizacion_destino__line\" style=\"" .  $sStyleReadLab_detalle_movilizacion_destino_ . "\">" . $this->form_encode_input($detalle_movilizacion_destino__look) . "</span><span id=\"id_read_off_detalle_movilizacion_destino_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_detalle_movilizacion_destino_ . "\">";
   echo " <span id=\"idAjaxSelect_detalle_movilizacion_destino_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_detalle_movilizacion_destino__obj\" style=\"\" id=\"id_sc_field_detalle_movilizacion_destino_" . $sc_seq_vert . "\" name=\"detalle_movilizacion_destino_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['Lookup_detalle_movilizacion_destino_'][] = ''; 
   echo "  <option value=\"\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->detalle_movilizacion_destino_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->detalle_movilizacion_destino_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_movilizacion_destino_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_movilizacion_destino_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_fecha_inicio_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_fecha_inicio_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detalle_movilizacion_fecha_inicio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detalle_movilizacion_fecha_inicio_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_detalle_movilizacion_fecha_inicio__line" id="hidden_field_data_detalle_movilizacion_fecha_inicio_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_detalle_movilizacion_fecha_inicio_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_detalle_movilizacion_fecha_inicio__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_detalle_movilizacion_fecha_inicio_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["detalle_movilizacion_fecha_inicio_"]) &&  $this->nmgp_cmp_readonly["detalle_movilizacion_fecha_inicio_"] == "on")) { 

 ?>
<input type="hidden" name="detalle_movilizacion_fecha_inicio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detalle_movilizacion_fecha_inicio_) . "\"><span id=\"id_ajax_label_detalle_movilizacion_fecha_inicio_" . $sc_seq_vert . "\">" . $detalle_movilizacion_fecha_inicio_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_detalle_movilizacion_fecha_inicio_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-detalle_movilizacion_fecha_inicio_<?php echo $sc_seq_vert ?> css_detalle_movilizacion_fecha_inicio__line" style="<?php echo $sStyleReadLab_detalle_movilizacion_fecha_inicio_; ?>"><?php echo $this->form_encode_input($detalle_movilizacion_fecha_inicio_); ?></span><span id="id_read_off_detalle_movilizacion_fecha_inicio_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_detalle_movilizacion_fecha_inicio_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_detalle_movilizacion_fecha_inicio__obj" style="" id="id_sc_field_detalle_movilizacion_fecha_inicio_<?php echo $sc_seq_vert ?>" type=text name="detalle_movilizacion_fecha_inicio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detalle_movilizacion_fecha_inicio_) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['detalle_movilizacion_fecha_inicio_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['detalle_movilizacion_fecha_inicio_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['detalle_movilizacion_fecha_inicio_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_movilizacion_fecha_inicio_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_movilizacion_fecha_inicio_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_fecha_fin_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_fecha_fin_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detalle_movilizacion_fecha_fin_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detalle_movilizacion_fecha_fin_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_detalle_movilizacion_fecha_fin__line" id="hidden_field_data_detalle_movilizacion_fecha_fin_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_detalle_movilizacion_fecha_fin_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_detalle_movilizacion_fecha_fin__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_detalle_movilizacion_fecha_fin_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["detalle_movilizacion_fecha_fin_"]) &&  $this->nmgp_cmp_readonly["detalle_movilizacion_fecha_fin_"] == "on")) { 

 ?>
<input type="hidden" name="detalle_movilizacion_fecha_fin_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detalle_movilizacion_fecha_fin_) . "\"><span id=\"id_ajax_label_detalle_movilizacion_fecha_fin_" . $sc_seq_vert . "\">" . $detalle_movilizacion_fecha_fin_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_detalle_movilizacion_fecha_fin_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-detalle_movilizacion_fecha_fin_<?php echo $sc_seq_vert ?> css_detalle_movilizacion_fecha_fin__line" style="<?php echo $sStyleReadLab_detalle_movilizacion_fecha_fin_; ?>"><?php echo $this->form_encode_input($detalle_movilizacion_fecha_fin_); ?></span><span id="id_read_off_detalle_movilizacion_fecha_fin_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_detalle_movilizacion_fecha_fin_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_detalle_movilizacion_fecha_fin__obj" style="" id="id_sc_field_detalle_movilizacion_fecha_fin_<?php echo $sc_seq_vert ?>" type=text name="detalle_movilizacion_fecha_fin_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detalle_movilizacion_fecha_fin_) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['detalle_movilizacion_fecha_fin_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['detalle_movilizacion_fecha_fin_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['detalle_movilizacion_fecha_fin_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_movilizacion_fecha_fin_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_movilizacion_fecha_fin_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['detalle_movilizacion_distancia_']) && $this->nmgp_cmp_hidden['detalle_movilizacion_distancia_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detalle_movilizacion_distancia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detalle_movilizacion_distancia_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_detalle_movilizacion_distancia__line" id="hidden_field_data_detalle_movilizacion_distancia_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_detalle_movilizacion_distancia_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_detalle_movilizacion_distancia__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_detalle_movilizacion_distancia_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["detalle_movilizacion_distancia_"]) &&  $this->nmgp_cmp_readonly["detalle_movilizacion_distancia_"] == "on")) { 

 ?>
<input type="hidden" name="detalle_movilizacion_distancia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detalle_movilizacion_distancia_) . "\"><span id=\"id_ajax_label_detalle_movilizacion_distancia_" . $sc_seq_vert . "\">" . $detalle_movilizacion_distancia_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_detalle_movilizacion_distancia_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-detalle_movilizacion_distancia_<?php echo $sc_seq_vert ?> css_detalle_movilizacion_distancia__line" style="<?php echo $sStyleReadLab_detalle_movilizacion_distancia_; ?>"><?php echo $this->form_encode_input($this->detalle_movilizacion_distancia_); ?></span><span id="id_read_off_detalle_movilizacion_distancia_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_detalle_movilizacion_distancia_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_detalle_movilizacion_distancia__obj" style="" id="id_sc_field_detalle_movilizacion_distancia_<?php echo $sc_seq_vert ?>" type=text name="detalle_movilizacion_distancia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detalle_movilizacion_distancia_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['detalle_movilizacion_distancia_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['detalle_movilizacion_distancia_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['detalle_movilizacion_distancia_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_movilizacion_distancia_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_movilizacion_distancia_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['iddetalle_movilizacion_']) && $this->nmgp_cmp_hidden['iddetalle_movilizacion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="iddetalle_movilizacion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($iddetalle_movilizacion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_iddetalle_movilizacion__line" id="hidden_field_data_iddetalle_movilizacion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_iddetalle_movilizacion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_iddetalle_movilizacion__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_iddetalle_movilizacion_<?php echo $sc_seq_vert ?>" class="css_iddetalle_movilizacion__line" style="<?php echo $sStyleReadLab_iddetalle_movilizacion_; ?>"><?php echo $this->form_encode_input($this->iddetalle_movilizacion_); ?></span><span id="id_read_off_iddetalle_movilizacion_<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_iddetalle_movilizacion_; ?>"><input type="hidden" id="id_sc_field_iddetalle_movilizacion_<?php echo $sc_seq_vert ?>" name="iddetalle_movilizacion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($iddetalle_movilizacion_) . "\">"?>
<span id="id_ajax_label_iddetalle_movilizacion_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($iddetalle_movilizacion_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_iddetalle_movilizacion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_iddetalle_movilizacion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_detalle_movilizacion_origen_))
       {
           $this->nmgp_cmp_readonly['detalle_movilizacion_origen_'] = $sCheckRead_detalle_movilizacion_origen_;
       }
       if ('display: none;' == $sStyleHidden_detalle_movilizacion_origen_)
       {
           $this->nmgp_cmp_hidden['detalle_movilizacion_origen_'] = 'off';
       }
       if (isset($sCheckRead_detalle_movilizacion_destino_))
       {
           $this->nmgp_cmp_readonly['detalle_movilizacion_destino_'] = $sCheckRead_detalle_movilizacion_destino_;
       }
       if ('display: none;' == $sStyleHidden_detalle_movilizacion_destino_)
       {
           $this->nmgp_cmp_hidden['detalle_movilizacion_destino_'] = 'off';
       }
       if (isset($sCheckRead_detalle_movilizacion_fecha_inicio_))
       {
           $this->nmgp_cmp_readonly['detalle_movilizacion_fecha_inicio_'] = $sCheckRead_detalle_movilizacion_fecha_inicio_;
       }
       if ('display: none;' == $sStyleHidden_detalle_movilizacion_fecha_inicio_)
       {
           $this->nmgp_cmp_hidden['detalle_movilizacion_fecha_inicio_'] = 'off';
       }
       if (isset($sCheckRead_detalle_movilizacion_fecha_fin_))
       {
           $this->nmgp_cmp_readonly['detalle_movilizacion_fecha_fin_'] = $sCheckRead_detalle_movilizacion_fecha_fin_;
       }
       if ('display: none;' == $sStyleHidden_detalle_movilizacion_fecha_fin_)
       {
           $this->nmgp_cmp_hidden['detalle_movilizacion_fecha_fin_'] = 'off';
       }
       if (isset($sCheckRead_detalle_movilizacion_distancia_))
       {
           $this->nmgp_cmp_readonly['detalle_movilizacion_distancia_'] = $sCheckRead_detalle_movilizacion_distancia_;
       }
       if ('display: none;' == $sStyleHidden_detalle_movilizacion_distancia_)
       {
           $this->nmgp_cmp_hidden['detalle_movilizacion_distancia_'] = 'off';
       }
       if (isset($sCheckRead_iddetalle_movilizacion_))
       {
           $this->nmgp_cmp_readonly['iddetalle_movilizacion_'] = $sCheckRead_iddetalle_movilizacion_;
       }
       if ('display: none;' == $sStyleHidden_iddetalle_movilizacion_)
       {
           $this->nmgp_cmp_hidden['iddetalle_movilizacion_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_detalle_movilizacion_impresion = $guarda_form_vert_form_detalle_movilizacion_impresion;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div>
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
<?php
if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['run_iframe'] != "R")
{
    $NM_btn = false;
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
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
<?php
}
?>
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
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_detalle_movilizacion_impresion");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_detalle_movilizacion_impresion");
 parent.scAjaxDetailHeight("form_detalle_movilizacion_impresion", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_detalle_movilizacion_impresion", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_detalle_movilizacion_impresion", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_movilizacion_impresion']['sc_modal'])
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
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_b.sc-unique-btn-1").length && $("#sc_b_sai_b.sc-unique-btn-1").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
	}
</script>
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
<?php 
 } 
} 
?> 
