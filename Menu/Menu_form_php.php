<?php
include_once('Menu_session.php');
session_start();
   $_SESSION['scriptcase']['Menu']['glo_nm_path_prod']      = "";
   $_SESSION['scriptcase']['Menu']['glo_nm_path_imag_temp'] = "";
   //check publication with the prod
   $str_path_apl_url  = $_SERVER['PHP_SELF'];
   $str_path_apl_url  = str_replace("\\", '/', $str_path_apl_url);
   $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
   $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
   //check prod
   if(empty($_SESSION['scriptcase']['Menu']['glo_nm_path_prod']))
   {
           /*check prod*/$_SESSION['scriptcase']['Menu']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
   }
   //check tmp
   if(empty($_SESSION['scriptcase']['Menu']['glo_nm_path_imag_temp']))
   {
           /*check tmp*/$_SESSION['scriptcase']['Menu']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   //end check publication with the prod
class Menu_form_php
{
      var $sc_script_name;
      var $nm_location;
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include

   function init()
   {
      $Campos_Mens_erro = "";
      $_SESSION['scriptcase']['Menu']['contr_erro'] = 'off';
      $sc_site_ssl   = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys          = str_replace("\\", '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(!isset($_SESSION['scriptcase']['Menu']['glo_nm_path_prod']) || empty($_SESSION['scriptcase']['Menu']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['Menu']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      $str_path_web  = $_SERVER['PHP_SELF'];
      $str_path_web  = str_replace("\\", '/', $str_path_web);
      $str_path_web  = str_replace('//', '/', $str_path_web);
      $str_root      = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $path_link     = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $path_link     = substr($path_link, 0, strrpos($path_link, '/')) . '/';
      $this->nm_location  = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $this->nm_location  = substr($_SERVER['PHP_SELF'], 0, $this->nm_location + 1) ;  
      $this->nm_location .= "index.php"; 
      $this->menu_sc_init = 1;
      $path_imag_cab = $path_link . "_lib/img";
      $path_imag_apl = $str_root . $path_link . "_lib/img";
      $path_libs     = $str_root . $_SESSION['scriptcase']['Menu']['glo_nm_path_prod'] . "/lib/php";
      $path_third    = $str_root . $_SESSION['scriptcase']['Menu']['glo_nm_path_prod'] . "/third";
      $path_adodb    = $str_root . $_SESSION['scriptcase']['Menu']['glo_nm_path_prod'] . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $str_root . $_SESSION['scriptcase']['Menu']['glo_nm_path_imag_temp'];
      $this->path_css = $str_root . $path_link . "_lib/css/";
      $path_lib_php   = $str_root . $path_link . "_lib/lib/php";
      $this->str_lang      = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "es";
      $this->str_conf_reg  = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "es_es";
      if (isset($_SESSION['scriptcase']['Menu']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['Menu']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['Menu']['actual_lang']) || $_SESSION['scriptcase']['Menu']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['Menu']['actual_lang'] = $this->str_lang;
          $SC_arq_lang = fopen($_SESSION['scriptcase']['dir_temp'] . "/sc_actual_lang_" . $_SERVER['SERVER_NAME'] . ".txt", "w");
          fwrite ($SC_arq_lang, $this->str_lang);
          fclose ($SC_arq_lang);
      }
      $this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Tema_ame_V9/Tema_ame_V9";
       if (isset($_SESSION['scriptcase']['user_logout']))
       {
           foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
           {
               if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
               {
                   unset($_SESSION['scriptcase']['user_logout'][$ind]);
                   $nm_apl_dest = $parms['R'];
                   $dir = explode("/", $nm_apl_dest);
                   if (count($dir) == 1)
                   {
                       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                       $nm_apl_dest = $path_link . SC_dir_app_name($nm_apl_dest) . "/";
                   }
?>
                   <html>
                   <body>
                    <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
                   </form>
                   <script>
                    document.FRedirect.submit();
                   </script>
                   </body>
                   </html>
<?php
                   exit;
               }
           }
       }
      if (!function_exists("NM_is_utf8"))
      {
          include_once("../_lib/lib/php/nm_utf8.php");
      }
      if (!function_exists("SC_dir_app_ini"))
      {
          include_once("../_lib/lib/php/nm_ctrl_app_name.php");
      }
      SC_dir_app_ini('Control_Vehicular');
      if (!defined("SC_ERROR_HANDLER"))
      {
          define("SC_ERROR_HANDLER", 1);
          include_once(dirname(__FILE__) . "/Menu_erro.php");
      }
      if (isset($_GET['sc_apl_menu']))
      {
          $_SESSION['scriptcase']['sc_usa_grupo']     = $_GET['sc_usa_grupo'];
          $_SESSION['scriptcase']['sc_item_menu']     = $_GET['sc_item_menu'];
          $_SESSION['scriptcase']['sc_apl_menu']      = $_GET['sc_apl_menu'];
          $_SESSION['scriptcase']['sc_apl_menu_link'] = urldecode($_GET['sc_apl_link']);
          $_SESSION['scriptcase']['sc_ult_apl_menu']  = array();
      }
      $this->sc_menu_item   = $_SESSION['scriptcase']['sc_item_menu'];
      $this->sc_script_name = $_SESSION['scriptcase']['sc_apl_menu'];
      include("../_lib/lang/". $this->str_lang .".lang.php");
      include("../_lib/css/" . $this->str_schema_all . "_menuH.php");
      include("../_lib/lang/config_region.php");
      include("../_lib/lang/lang_config_region.php");
      $this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("es");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
      foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
          {
              $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      }
      foreach ($this->Nm_lang as $ind => $dados)
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
          {
              $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
              $this->Nm_lang[$ind] = $dados;
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
          {
              $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      $this->regionalDefault();
      if (isset($_SESSION['scriptcase']['Menu']['session_timeout']['redir'])) {
          $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
';
          $SS_cod_html .= "<HTML>\r\n";
          $SS_cod_html .= " <HEAD>\r\n";
          $SS_cod_html .= "  <TITLE></TITLE>\r\n";
          $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "/>\r\n";
          if ($_SESSION['scriptcase']['proc_mobile']) {
              $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
          }
          $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
          $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
          if ($_SESSION['scriptcase']['Menu']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/sys__NM__ico__NM__favicons_ame_nuevo.png\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scMenuHPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div>\r\n";
              $SS_cod_html .= "    <table class=\"scMenuHTable\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scMenuHHeader\"><td class=\"scMenuHHeaderFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['Menu']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['Menu']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['Menu']['session_timeout']['redir'] . "');\r\n";
          }
          $SS_cod_html .= "      function sc_session_redir(url_redir)\r\n";
          $SS_cod_html .= "      {\r\n";
          $SS_cod_html .= "         if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n";
          $SS_cod_html .= "         {\r\n";
          $SS_cod_html .= "            window.parent.sc_session_redir(url_redir);\r\n";
          $SS_cod_html .= "         }\r\n";
          $SS_cod_html .= "         else\r\n";
          $SS_cod_html .= "         {\r\n";
          $SS_cod_html .= "             if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n";
          $SS_cod_html .= "             {\r\n";
          $SS_cod_html .= "                 window.close();\r\n";
          $SS_cod_html .= "                 window.opener.sc_session_redir(url_redir);\r\n";
          $SS_cod_html .= "             }\r\n";
          $SS_cod_html .= "             else\r\n";
          $SS_cod_html .= "             {\r\n";
          $SS_cod_html .= "                 window.location = url_redir;\r\n";
          $SS_cod_html .= "             }\r\n";
          $SS_cod_html .= "         }\r\n";
          $SS_cod_html .= "      }\r\n";
          $SS_cod_html .= "    </script>\r\n";
          $SS_cod_html .= " </body>\r\n";
          $SS_cod_html .= "</HTML>\r\n";
          unset($_SESSION['scriptcase']['Menu']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      if (is_file($path_lib_php . "/nm_functions.php"))  
      {  
          $this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
      }  
      if (is_file($path_lib_php . "/nm_api.php"))  
      {  
          $this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
      }  
      if (is_file($path_lib_php . "/nm_data.class.php"))  
      {
          $this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
          $this->nm_data = new nm_data("es");
      }
$this->sc_Include($path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
include_once($path_adodb . "/adodb.inc.php"); 
$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('Menu'); 
perfil_lib($path_libs);
if (!isset($_SESSION['sc_session'][1]['SC_Check_Perfil']))
{
    if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($path_libs, $_SESSION['scriptcase']['Menu']['glo_nm_path_prod']);
    $_SESSION['sc_session'][1]['SC_Check_Perfil'] = true;
}
$nm_falta_var    = ""; 
$nm_falta_var_db = ""; 
if (isset($_SESSION['scriptcase']['Menu']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['Menu']['glo_nm_conexao']))
{
    db_conect_devel($_SESSION['scriptcase']['Menu']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['Menu']['glo_nm_path_prod'], 'Control_Vehicular', 2); 
}
if (isset($_SESSION['scriptcase']['Menu']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['Menu']['glo_nm_perfil']))
{
   $_SESSION['scriptcase']['glo_perfil'] = $_SESSION['scriptcase']['Menu']['glo_nm_perfil'];
}
if (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = "";
    carrega_perfil($_SESSION['scriptcase']['glo_perfil'], $path_libs, "");
    if (empty($_SESSION['scriptcase']['glo_senha_protect']))
    {
        $nm_falta_var .= "Perfil=" . $_SESSION['scriptcase']['glo_perfil'] . "; ";
    }
}
if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
{
    $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
    if (strlen($SC_temp) == 2)
    {
       $_SESSION['scriptcase']['Menu']['SC_sep_date']  = substr($SC_temp, 0, 1); 
       $_SESSION['scriptcase']['Menu']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
   }
   else
    {
       $_SESSION['scriptcase']['Menu']['SC_sep_date']  = $SC_temp; 
       $_SESSION['scriptcase']['Menu']['SC_sep_date1'] = $SC_temp; 
   }
}
if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
{
    $nm_falta_var_db .= "glo_tpbanco; ";
}
else
{
    $nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
}
if (!isset($_SESSION['scriptcase']['glo_servidor']))
{
    $nm_falta_var_db .= "glo_servidor; ";
}
else
{
    $nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
}
if (!isset($_SESSION['scriptcase']['glo_banco']))
{
    $nm_falta_var_db .= "glo_banco; ";
}
else
{
    $nm_banco = $_SESSION['scriptcase']['glo_banco']; 
}
if (!isset($_SESSION['scriptcase']['glo_usuario']))
{
    $nm_falta_var_db .= "glo_usuario; ";
}
else
{
    $nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
}
if (!isset($_SESSION['scriptcase']['glo_senha']))
{
    $nm_falta_var_db .= "glo_senha; ";
}
else
{
    $nm_senha = $_SESSION['scriptcase']['glo_senha']; 
}
$nm_con_db2 = array();
$nm_database_encoding = "";
if (isset($_SESSION['scriptcase']['glo_database_encoding']))
{
    $nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
}
$nm_arr_db_extra_args = array();
if (isset($_SESSION['scriptcase']['glo_use_ssl']))
{
    $nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
{
    $nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
{
    $nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
{
    $nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
{
    $nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
{
    $nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
{
    $nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
{
    $nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
{
    $nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
{
    $nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
{
    $nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
}
$nm_con_persistente = "";
$nm_con_use_schema  = "";
if (isset($_SESSION['scriptcase']['glo_use_persistent']))
{
    $nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
}
if (isset($_SESSION['scriptcase']['glo_use_schema']))
{
    $nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
}
if (!empty($nm_falta_var) || !empty($nm_falta_var_db))
{
    if (empty($nm_falta_var_db))
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
        echo "  " . $nm_falta_var;
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    else
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font>";
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    if (isset($_SESSION['scriptcase']['nm_ret_exec']) && '' != $_SESSION['scriptcase']['nm_ret_exec'])
    { 
        if (isset($_SESSION['sc_session'][1]['Menu']['sc_outra_jan']) && $_SESSION['sc_session'][1]['Menu']['sc_outra_jan'])
        {
            echo "<a href='javascript:window.close()'><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
        else 
        { 
            echo "<a href='" . $_SESSION['scriptcase']['nm_ret_exec'] . "><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
    } 
    exit ;
} 
if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
{
    $nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
{
    $nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
}
$sc_tem_trans_banco = false;
$this->nm_bases_access    = array("access", "ado_access");
$this->nm_bases_db2       = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
$this->nm_bases_ibase     = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
$this->nm_bases_informix  = array("informix", "informix72", "pdo_informix");
$this->nm_bases_mssql     = array("mssql", "ado_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib");
$this->nm_bases_mysql     = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql");
$this->nm_bases_postgres  = array("postgres", "postgres64", "postgres7", "pdo_pgsql");
$this->nm_bases_oracle    = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle");
$this->nm_bases_sqlite    = array("sqlite", "sqlite3", "pdosqlite");
$this->nm_bases_sybase    = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
$this->nm_bases_vfp       = array("vfp");
$this->nm_bases_odbc      = array("odbc");
$this->nm_bases_progress  = array("progress", "pdo_progress_odbc");
$_SESSION['scriptcase']['sc_num_page'] = 1;
$_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQXOZSX7HABYHQrqDMNOVIB/Dur/HIJsDcFYZ1FaHAvCD5BODMNKZSJ3DWF/VoBiDcJUZSX7Z1BYHuFaDMvOVIBsH5B3VoF7HQNmZkBiHABYHuFaHgveHArsDWFGDoBqHQNwZ9F7HAvOV5XGDMrYVcFeH5XCHIJsHQBiZSBqZ1rYHQJwDEBODkFeH5FYVoFGHQJKDQFaHAN7HuJeHgvOV9FeHEFYHIrqHQBsZ1BiHArKV5JeHgrKZSJ3DWFqDorqHQJKDQJsZ1vCV5FGHuNOV9FeDWXCDoraD9XOZ1X7Z1BeV5BODEBOZSXeDuFYVoFaHQJKDQJsZ1vCV5FGHuNOV9FeDWB3VoraHQBiZ1B/HArYV5FUDEvsHEJqV5FaVoBOD9XsZSFGHANOD5F7HgrYDkFCDWXCDoX7D9XOZ1FUZ1NOD5BqDEBeHEBUDWF/HIJsD9XsZ9JeD1BeD5F7DMvmVcXKV5X7VoJwD9BiZSBOHAN7V5B/DMvCHErCDWXCHIBqD9XsDQFaHIBeVWJsHgrwVIFCDur/HIJeHQNwZ1FGHArKV5FUDMrYZSXeV5FqHIJsHQNmDuBqDSvCV5BOHgvOVIB/DWB3VErqHQNwVIraZ1vOZMB/HgNKDkB/H5FYHMB/DcBiDQBOZ1BYHuB/DMrYZSJqDuX7HIXGDcFYZkFUZ1rYHQJsHgrKHErsDWXCHMJeDcBiDQBOD1BeD5rqHuvmVcBOH5B7VoBqHQXOZkBiDSvmD5JeHgNKHEJqDWF/HMJsHQXsDQBOZ1BYHuBODMNODkBsH5FqHIX7HQNwVIraZ1rYHuFUHgNOHENiDuFaHMB/HQJKDuBOZ1zGV5BOHgrwDkBsV5F/HMFUHQJmVIraD1rwV5FGDEBeHEXeH5X/DoF7HQNmDQBqDSN7HQB/DMNOVIB/DWFYHMrqHQXGVIraZ1rYD5JwHgveDkXKHEFqHIraDcXGZ9JeZ1BYHQXGHgrwVIB/HEFYHMJeHQBiZ1FUZ1rYHQJeHgrKZSJ3DWFqHIJwHQJeDQBOD1BeD5rqHuvmVcBOH5B7VoBqD9XOH9B/D1rwD5BiDErKHEFiDWX7ZuFaD9JKDQB/Z1NaV5JwHuNODkFCDWXCVENUHQFYH9BqZ1NOV5FaDEvsHErCV5FqDoraD9JKZSX7D1vOV5JwHuBYZSNiHEX/VoraD9BiH9FaHIBeZMBODErKVkXeV5FaDoB/D9NmDQBOZ1rwV5BqHgvsDkFCDWJeDoFGD9XOZ1rqD1rKD5rqDMBYHEJGH5FYVoB/HQXGZ9rqD1BeD5rqHuvmVcBOH5B7VoBqD9XOH9B/D1rwD5BiDEBeHEFiV5FaDoXGD9NmDQB/Z1rwHuB/DMBYV9FeH5XKDoXGHQXGZ1X7HAN7HuJeHgvCHEJqH5FYHIFGHQFYH9BiDSBYHQFaHgrwVcFeH5FqHMFUHQXGH9BqHArYHQJwDEBODkFeH5FYVoFGHQJKDQBqHAvmV5JeDMvOZSNiDWB3VorqHQNmVINUHAvsZMB/HgBeHEFiV5B3DoF7D9XsDuFaHAveHuraDMvmVIBODWF/HMF7HQBsZ1FGHAN7ZMXGDEBeDkXKDuJeHIBiDcJeZSBiHArYHQXGDMBYVIBsDWXCDoJsDcBwH9B/Z1rYHQJwHgBeHEJGH5FYDoB/DcJeZSX7DSBYV5FUHgvsDkBOHEFYVoraD9BsVIraHArKV5B/DMzGHAFKDWF/HMBqD9NmDQX7Z1N7D5BqHgvsDkBOHEFYVorqDcBqZ1B/HIrwV5JeDMzGHEFiDWX7VoFaDcBwDQFGD1BOV5BiHgrKVcFKDWFYDoJeDcBwZ1FGHArYD5rqDEvsHEXeDWX7VoFaD9XsZSFGHANOHuFaHuNOZSrCH5FqDoXGHQJmZ1BiDSvOV5FUHgveHEBOV5JeZura";
 $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['Menu']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['Menu']['glo_nm_conexao']))
{ 
   $this->Db = db_conect_devel($_SESSION['scriptcase']['Menu']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['Menu']['glo_nm_path_prod'], 'Control_Vehicular'); 
} 
else 
{ 
   $this->Db = db_conect($nm_tpbanco, $nm_servidor, $nm_usuario, $nm_senha, $nm_banco, $glo_senha_protect, "S", $nm_con_persistente, $nm_con_db2, $nm_database_encoding, $nm_arr_db_extra_args); 
} 
$this->nm_tpbanco = $nm_tpbanco; 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_ibase) && function_exists('ibase_timefmt'))
{
    ibase_timefmt('%Y-%m-%d %H:%M:%S');
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_sybase))
{
   $this->Db->fetchMode = ADODB_FETCH_BOTH;
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_db2))
{
   $this->Db->fetchMode = ADODB_FETCH_NUM;
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_mssql))
{
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_oracle))
{
   $this->Db->Execute("alter session set nls_date_format         = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_timestamp_format    = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_timestamp_tz_format = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_time_format         = 'hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_time_tz_format      = 'hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_numeric_characters  = '.,'");
   $_SESSION['sc_session'][$this->Ini->sc_page]['Menu']['decimal_db'] = ".";
} 
//
      $this->tab_grupo[0] = "Control_Vehicular/";
      if ($_SESSION['scriptcase']['sc_usa_grupo'] != "S")
      {
          $this->tab_grupo[0] = "";
      }
      $_SESSION['scriptcase']['Menu']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
  $this->estilo();

if($this->sc_script_name == 'app_Login'):
    $this->sc_logged_out($this->sc_temp_logged_user, $this->sc_temp_logged_date_login);
endif;
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'off';
      $_SESSION['scriptcase']['sc_ult_apl_menu'] = array();
      unset($_SESSION['scriptcase']['sc_usa_grupo']);
if ($this->Db)
{
    $this->Db->Close(); 
}
      $link_url = false;
      $parms_session = "";

      if (isset($_SESSION['scriptcase']['sc_def_menu']['Menu']))
      {
         foreach($_SESSION['scriptcase']['sc_def_menu']['Menu'] as $id_item => $arr_item)
         {
             if ($_SESSION['scriptcase']['sc_item_menu'] == $id_item)
             { 
                 if ($arr_item['lnk_url'])
                 { 
                    $apl_run = $arr_item['url'];
                    $link_url = true;
                 } 
                 else 
                 { 
                    $this->menu_sc_init = (isset($arr_item['sc_init'])) ? $arr_item['sc_init'] : 1;
                    $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . $arr_item['url']; 
                    $parms_session = $arr_item['parm']; 
                 } 
                break; 
             } 
         }
      }
      {
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_2")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_usuario") . "/?nm_run_menu=1&nm_apl_menu=Menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_28")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_cargo") . "/?nm_run_menu=1&nm_apl_menu=Menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_29")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_dependencia") . "/?nm_run_menu=1&nm_apl_menu=Menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_3")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_vehiculos") . "/?nm_run_menu=1&nm_apl_menu=Menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_6")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_rutas") . "/?nm_run_menu=1&nm_apl_menu=Menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_7")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tipo_mantenimiento") . "/?nm_run_menu=1&nm_apl_menu=Menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_9")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_movilizacion") . "/?nm_run_menu=1&nm_apl_menu=Menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_30")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_mantenimiento") . "/?nm_run_menu=1&nm_apl_menu=Menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_24")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("control_buscar_vehiculo") . "/?nm_run_menu=1&nm_apl_menu=Menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_32")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("control_buscar_movilizacion") . "/?nm_run_menu=1&nm_apl_menu=Menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_19")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("app_Login") . "/?script_case_init=" . $_SESSION['sc_session'][1]['Menu']['init'] . "&script_case_session=" . session_id() . "";
      }
      }
      if (!$link_url)
      {
          $pos = strpos($apl_run, "?");
          if ($pos !== false)
          {
              $parms = "";
              $temp = explode("&", substr($apl_run, $pos + 1));
              foreach ($temp as $cada_parm)
              {
                  $parte_parm = explode("=", $cada_parm);
                  $parms .= (!empty($parms)) ? "?@?" . $parte_parm[0] . "?#?" : $parte_parm[0] . "?#?";
                  $parms .= (isset($parte_parm[1])) ? $parte_parm[1] : "";
              }
              $apl_run =  substr($apl_run, 0, $pos);
          }
      }
      if ($parms_session != "")
      {
          $parms  = isset($parms) ? $parms : '';
          $parms  = $parms_session . (substr($parms_session, -3, 3) != '?@?' ? '?@?' : '') . $parms;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

      <html><body>
        <form name="fmenu" method="post" action="<?php echo NM_encode_input($apl_run); ?>">
          <input type=hidden name="nmgp_parms" value="<?php  echo NM_encode_input($parms); ?>"> 
          <input type=hidden name="script_case_init" value="<?php echo $this->menu_sc_init ?>"> 
          <input type=hidden name="script_case_session" value="<?php echo NM_encode_input(session_id()) ?>"> 
          <input type=hidden name="nm_apl_menu" value="Menu"> 
<?php
      if (isset($_SESSION['scriptcase']['menu_mobile']) && $_SESSION['scriptcase']['menu_mobile'] == "Menu")
      {
?>
          <input type=hidden name="nmgp_url_saida" value="<?php echo $this->nm_location ?>"> 
<?php
      }
?>
        </form>
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
<?php
      if (isset($_SESSION['scriptcase']['menu_mobile']) && $_SESSION['scriptcase']['menu_mobile'] == "Menu")
      {
?>
          window.history.pushState('Object', 'Menu', '<?php echo $this->nm_location ?>');
<?php
      }
      if ($link_url)
      {
?>
          window.location='<?php echo $apl_run; ?>'; 
<?php
      }
      else
      {
?>
          (function() { document.fmenu.submit(); })();
<?php
      }
?>
      </script>
      </body></html>
<?php
   }
   function Gera_sc_init($apl_menu)
   {
        $_SESSION['scriptcase']['Menu']['sc_init'][$apl_menu] = rand(2, 10000);
        $_SESSION['sc_session'][$_SESSION['scriptcase']['Menu']['sc_init'][$apl_menu]] = array();
        $this->menu_sc_init = $_SESSION['scriptcase']['Menu']['sc_init'][$apl_menu];
        return  $this->menu_sc_init;
   }
function estilo()
{
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'on';
  
?>
<style>
ul#css3menu1 li.topmenu>a {	
	background-color: rgba(35, 35, 35, 0);
	padding: 15px 18px 15px;
	border-top: 1px solid #A3861C;
}
	
ul#css3menu1 li.topmenu:hover > a, ul#css3menu1 li.topmenu a.pressed {
    background-color: #005DA1;
    border-style: solid;
    border-color: #A3861C transparent transparent transparent;
}
	
.sombra1 {
color: #ffffff;
text-shadow: 1px 1px 1px #000000;
font-size: 12px;
font-weight: bold;
font-family: 'Arial', sans-serif;
}
	
.scMenuIframe {
width: 100% !important;
height: 100% !important;
background-repeat: no-repeat;
background-size: cover !important;
	}
</style>

<?php


$_SESSION['scriptcase']['Menu']['contr_erro'] = 'off';
}
function sc_logged($user, $ip = '')
	{
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'on';
  
		$str_sql = "SELECT date_login, ip FROM sec_logged WHERE login = '". $user ."' AND sc_session <> '_SC_FAIL_SC_'";

		 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->data = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->data = false;
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;

		if($this->data  === FALSE || !isset($this->data->fields[0]))
		{
            $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
			$this->sc_logged_in($user, $ip);
			return true;
		}
		else
		{
            if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_logged']))
{
unset($_SESSION['scriptcase']['sc_apl_conf']['app_logged']);
}
;
            $_SESSION['scriptcase']['sc_apl_seg']['app_logged'] = "on";;
			 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . "" . SC_dir_app_name('app_logged') . "/", "Menu_form_php.php", "user?#?" . NM_encode_input($user) . "?@?","_self", 440, 630);
 };
			return false;
		}
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'off';
}
function sc_verify_logged()
	{
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
  
		$str_sql = "SELECT count(*) FROM sec_logged WHERE login = '". $this->sc_temp_logged_user . "' AND date_login = '". $this->sc_temp_logged_date_login ."' AND sc_session <> '_SC_FAIL_SC_'";
		 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs_logged[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Db->ErrorMsg();
      } 
;
		if($this->rs_logged[0][0] != 1)
		{
			 if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
 if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . "" . SC_dir_app_name('app_Login') . "/", "Menu_form_php.php", "","_parent", 440, 630);
 };
		}
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'off';
}
function sc_logged_in($user, $ip = '')
	{
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
  
        $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
		$this->sc_temp_logged_user = $user;
		$this->sc_temp_logged_date_login = microtime(true);

        $str_sql = "DELETE FROM sec_logged WHERE login = '". $user . "' AND sc_session = '_SC_FAIL_SC_' AND ip = '".$ip."'";
        
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: Menu";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

    	$str_sql = "INSERT INTO sec_logged(login, date_login, sc_session, ip) VALUES ('". $user ."', '". $this->sc_temp_logged_date_login ."', '". session_id() ."', '". $ip ."')";
	    
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: Menu";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'off';
}
function sc_logged_in_fail($user, $ip = '')
    {
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'on';
  
        $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
        $str_sql = "INSERT INTO sec_logged(login, date_login, sc_session, ip) VALUES ('" . $user . "', '" . microtime(true) . "', '_SC_FAIL_SC_', '" . $ip . "')";
        
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: Menu";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
        return true;
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'off';
}
function sc_logged_is_blocked($ip = '')
    {
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'on';
  
        $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
        $minutes_ago = strtotime("-10 minutes");
        $str_select = "SELECT count(*) FROM sec_logged WHERE sc_session = '_SC_BLOCKED_SC_' AND ip = '".$ip."' AND date_login > '". $minutes_ago ."'";
         
      $nm_select = $str_select; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs_logged[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Db->ErrorMsg();
      } 
;
        if($this->rs_logged  !== FALSE && $this->rs_logged[0][0] == 1)
        {
            $message = $this->Nm_lang['lang_user_blocked'];
                $message = sprintf($message, 10);
                
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $message;
;
                return true;
        }

        $str_select = "SELECT count(*) FROM sec_logged WHERE sc_session = '_SC_FAIL_SC_' AND ip = '".$ip."' AND date_login > '". $minutes_ago ."'";
         
      $nm_select = $str_select; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs_logged[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Db->ErrorMsg();
      } 
;

        if($this->rs_logged  !== FALSE && $this->rs_logged[0][0] == 10)
        {
            $str_sql = "INSERT INTO sec_logged(login, date_login, sc_session, ip) VALUES ('blocked', '". microtime(true) ."', '_SC_BLOCKED_SC_', '". $ip ."')";
            
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: Menu";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
            $message = $this->Nm_lang['lang_user_blocked'];
                $message = sprintf($message, 10);
                
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $message;
;
                return true;
        }
        return false;
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'off';
}
function sc_logged_out($user, $date_login = '')
	{
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
  
		$date_login = ($date_login == '' ? "" : " AND date_login = '". $date_login ."'");

		$str_sql = "SELECT sc_session FROM sec_logged WHERE login = '". $user ."' ". $date_login . " AND sc_session <> '_SC_FAIL_SC_'";
		 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->data[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->data = false;
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->data[0][0]) && !empty($this->data[0][0]))
        {
			$session_bkp = $_SESSION;
			$sessionid = session_id();
			session_write_close();

			session_id($this->data[0][0]);
			session_start();
			$_SESSION['logged_user'] = 'logout';
			session_write_close();

			session_id($sessionid);
			session_start();
			$_SESSION = $session_bkp;
		}


		$str_sql = "DELETE FROM sec_logged WHERE login = '". $user . "' " . $date_login;
		
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: Menu";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
		 unset($_SESSION['logged_date_login']);
 unset($this->sc_temp_logged_date_login);
 unset($_SESSION['logged_user']);
 unset($this->sc_temp_logged_user);
;
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'off';
}
function sc_looged_check_logout()
    {
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_email'])) {$_SESSION['usr_email'] = "";}
if (!isset($this->sc_temp_usr_email)) {$this->sc_temp_usr_email = (isset($_SESSION['usr_email'])) ? $_SESSION['usr_email'] : "";}
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  
        if(isset($this->sc_temp_logged_user) && ($this->sc_temp_logged_user == 'logout' || empty($this->sc_temp_logged_user)))
        {
             unset($_SESSION['usr_login']);
 unset($this->sc_temp_usr_login);
 unset($_SESSION['logged_user']);
 unset($this->sc_temp_logged_user);
 unset($_SESSION['logged_date_login']);
 unset($this->sc_temp_logged_date_login);
 unset($_SESSION['usr_email']);
 unset($this->sc_temp_usr_email);
;
        }
if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
if (isset($this->sc_temp_usr_email)) {$_SESSION['usr_email'] = $this->sc_temp_usr_email;}
$_SESSION['scriptcase']['Menu']['contr_erro'] = 'off';
}
   function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $alt_modal=0, $larg_modal=0)
   {
      if (is_array($nm_apl_parms))
      {
          $tmp_parms = "";
          foreach ($nm_apl_parms as $par => $val)
          {
              $par = trim($par);
              $val = trim($val);
              $tmp_parms .= str_replace(".", "_", $par) . "?#?";
              if (substr($val, 0, 1) == "$")
              {
                  $tmp_parms .= $$val;
              }
              elseif (substr($val, 0, 1) == "{")
              {
                  $val        = substr($val, 1, -1);
                  $tmp_parms .= $this->$val;
              }
              elseif (substr($val, 0, 1) == "[")
              {
                  $tmp_parms .= $_SESSION['sc_session'][1]['Menu'][substr($val, 1, -1)];
              }
              else
              {
                  $tmp_parms .= $val;
              }
              $tmp_parms .= "?@?";
          }
          $nm_apl_parms = $tmp_parms;
      }
      $nm_apl_retorno = $_SERVER['PHP_SELF'];
      $nm_apl_retorno = str_replace("\\", '/', $nm_apl_retorno);
      $nm_apl_retorno = str_replace('//', '/', $nm_apl_retorno);
      $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
      if (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../")
      {
          echo "<SCRIPT type=\"text/javascript\">";
          if (strtolower($nm_target) == "_blank")
          {
              echo "window.open ('" . $nm_apl_dest . "');";
          }
          else
          {
              echo "window.location='" . $nm_apl_dest . "';";
          }
          echo "</SCRIPT>";
          exit;
      }
      $dir = explode("/", $nm_apl_dest);
      if (count($dir) == 1)
      {
          $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
          $nm_apl_dest = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . $nm_apl_dest . "/" . $nm_apl_dest . ".php";
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

      <HTML>
      <HEAD>
       <TITLE>Menu</TITLE>
     <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
       <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
       <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
       <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
       <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
       <META http-equiv="Pragma" content="no-cache"/>
      </HEAD>
      <BODY>
      <form name="Fredir" method="post" 
                            target="_self"> 
        <input type="hidden" name="nmgp_parms" value="<?php echo NM_encode_input($nm_apl_parms) ?>"/>
<?php
   if ($nm_target == "_blank")
   {
?>
         <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
        <input type="hidden" name="nmgp_url_saida" value="<?php echo NM_encode_input($nm_apl_retorno) ?>">
        <input type="hidden" name="script_case_init" value="1"/> 
        <input type=hidden name="script_case_session" value="<?php echo NM_encode_input(session_id()) ?>"> 
<?php
   }
?>
      </form> 
      <SCRIPT type="text/javascript">
          window.onload = function(){
             submit_Fredir();
          };
          function submit_Fredir()
          {
              document.Fredir.target = "<?php echo $nm_target_form ?>"; 
              document.Fredir.action = "<?php echo $nm_apl_dest ?>";
              document.Fredir.submit();
          }
      </SCRIPT>
      </BODY>
      </HTML>
<?php
     if ($nm_target != "_blank")
     {
         exit;
     }
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['scriptcase']['reg_conf']['html_dir_only'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
}
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('Control_Vehicular');
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
if ($Sem_Session && (!isset($nmgp_start) || $nmgp_start != "SC")) {
    $NM_dir_atual = getcwd();
    if (empty($NM_dir_atual)) {
        $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
        $str_path_sys  = str_replace("\\", '/', $str_path_sys);
    }
    else {
        $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
        $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
    }
    $str_path_web    = $_SERVER['PHP_SELF'];
    $str_path_web    = str_replace("\\", '/', $str_path_web);
    $str_path_web    = str_replace('//', '/', $str_path_web);
    $path_aplicacao  = substr($str_path_web, 0, strrpos($str_path_web, '/'));
    $path_aplicacao  = substr($path_aplicacao, 0, strrpos($path_aplicacao, '/'));
    $root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
    if (is_file($root . $_SESSION['scriptcase']['Menu']['glo_nm_path_imag_temp'] . "/sc_apl_default_Control_Vehicular.txt")) {
        $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['Menu']['glo_nm_path_imag_temp'] . "/sc_apl_default_Control_Vehicular.txt"));
        if (isset($apl_def[0]) && $apl_def[0] != "Menu") {
            $_SESSION['scriptcase']['sem_session'] = true;
            if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                $_SESSION['scriptcase']['Menu']['session_timeout']['redir'] = $apl_def[0];
            }
            else {
                $_SESSION['scriptcase']['Menu']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
            }
            $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
            $_SESSION['scriptcase']['Menu']['session_timeout']['redir_tp'] = $Redir_tp;
        }
    }
    if (is_file($root . $_SESSION['scriptcase']['Menu']['glo_nm_path_imag_temp'] . "/sc_actual_lang_" . $_SERVER['SERVER_NAME'] . ".txt")) {
        $lang_atu = file_get_contents($root . $_SESSION['scriptcase']['Menu']['glo_nm_path_imag_temp'] . "/sc_actual_lang_" . $_SERVER['SERVER_NAME'] . ".txt");
        $_SESSION['scriptcase']['Menu']['session_timeout']['lang'] = $lang_atu;
    }
}
$controle = new Menu_form_php();
$controle->init();
?>
