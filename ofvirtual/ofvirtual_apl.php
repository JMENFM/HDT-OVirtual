<?php
//
class ofvirtual_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $use_100perc_fields = true;
   var $classes_100perc_fields = array();
   var $close_modal_after_insert = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $login;
   var $pswd;
   var $remember_me;
   var $remember_me_1;
   var $new_user;
   var $retrieve_pswd;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden   = array();
   var $Field_no_validate  = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['bok']))
          {
              $this->bok = $this->NM_ajax_info['param']['bok'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['login']))
          {
              $this->login = $this->NM_ajax_info['param']['login'];
          }
          if (isset($this->NM_ajax_info['param']['new_user']))
          {
              $this->new_user = $this->NM_ajax_info['param']['new_user'];
          }
          if (isset($this->NM_ajax_info['param']['new_user_sc_target_name']))
          {
              $this->new_user_sc_target_name = $this->NM_ajax_info['param']['new_user_sc_target_name'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['pswd']))
          {
              $this->pswd = $this->NM_ajax_info['param']['pswd'];
          }
          if (isset($this->NM_ajax_info['param']['remember_me']))
          {
              $this->remember_me = $this->NM_ajax_info['param']['remember_me'];
          }
          if (isset($this->NM_ajax_info['param']['retrieve_pswd']))
          {
              $this->retrieve_pswd = $this->NM_ajax_info['param']['retrieve_pswd'];
          }
          if (isset($this->NM_ajax_info['param']['retrieve_pswd_sc_target_name']))
          {
              $this->retrieve_pswd_sc_target_name = $this->NM_ajax_info['param']['retrieve_pswd_sc_target_name'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->scSajaxReservedWords = array('rs', 'rst', 'rsrnd', 'rsargs');
      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (!in_array(strtolower($nmgp_campo), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_campo]))
                   {
                       $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
                   {
                       $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
                   }
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->_rh_css) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['_rh_css'] = $this->_rh_css;
      }
      if (isset($this->_puertoServidor) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['_puertoServidor'] = $this->_puertoServidor;
      }
      if (isset($this->_puertoGateway) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['_puertoGateway'] = $this->_puertoGateway;
      }
      if (isset($this->_user) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['_user'] = $this->_user;
      }
      if (isset($this->_pass) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['_pass'] = $this->_pass;
      }
      if (isset($this->_servidor) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['_servidor'] = $this->_servidor;
      }
      if (isset($this->_gateway) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['_gateway'] = $this->_gateway;
      }
      if (isset($this->_user_name) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['_user_name'] = $this->_user_name;
      }
      if (isset($this->_id_tenant) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['_id_tenant'] = $this->_id_tenant;
      }
      if (isset($this->_id_tenant_user) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['_id_tenant_user'] = $this->_id_tenant_user;
      }
      if (isset($this->_monitores) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['_monitores'] = $this->_monitores;
      }
      if (isset($this->_usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['_usr_login'] = $this->_usr_login;
      }
      if (isset($this->_LDAP_Domain) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['_LDAP_Domain'] = $this->_LDAP_Domain;
      }
      if (isset($_POST["_rh_css"]) && isset($this->_rh_css)) 
      {
          $_SESSION['_rh_css'] = $this->_rh_css;
      }
      if (isset($_POST["_puertoServidor"]) && isset($this->_puertoServidor)) 
      {
          $_SESSION['_puertoServidor'] = $this->_puertoServidor;
      }
      if (!isset($_POST["_puertoServidor"]) && isset($_POST["_puertoservidor"])) 
      {
          $_SESSION['_puertoServidor'] = $_POST["_puertoservidor"];
      }
      if (isset($_POST["_puertoGateway"]) && isset($this->_puertoGateway)) 
      {
          $_SESSION['_puertoGateway'] = $this->_puertoGateway;
      }
      if (!isset($_POST["_puertoGateway"]) && isset($_POST["_puertogateway"])) 
      {
          $_SESSION['_puertoGateway'] = $_POST["_puertogateway"];
      }
      if (isset($_POST["_user"]) && isset($this->_user)) 
      {
          $_SESSION['_user'] = $this->_user;
      }
      if (isset($_POST["_pass"]) && isset($this->_pass)) 
      {
          $_SESSION['_pass'] = $this->_pass;
      }
      if (isset($_POST["_servidor"]) && isset($this->_servidor)) 
      {
          $_SESSION['_servidor'] = $this->_servidor;
      }
      if (isset($_POST["_gateway"]) && isset($this->_gateway)) 
      {
          $_SESSION['_gateway'] = $this->_gateway;
      }
      if (isset($_POST["_user_name"]) && isset($this->_user_name)) 
      {
          $_SESSION['_user_name'] = $this->_user_name;
      }
      if (isset($_POST["_id_tenant"]) && isset($this->_id_tenant)) 
      {
          $_SESSION['_id_tenant'] = $this->_id_tenant;
      }
      if (isset($_POST["_id_tenant_user"]) && isset($this->_id_tenant_user)) 
      {
          $_SESSION['_id_tenant_user'] = $this->_id_tenant_user;
      }
      if (isset($_POST["_monitores"]) && isset($this->_monitores)) 
      {
          $_SESSION['_monitores'] = $this->_monitores;
      }
      if (isset($_POST["_usr_login"]) && isset($this->_usr_login)) 
      {
          $_SESSION['_usr_login'] = $this->_usr_login;
      }
      if (isset($_POST["_LDAP_Domain"]) && isset($this->_LDAP_Domain)) 
      {
          $_SESSION['_LDAP_Domain'] = $this->_LDAP_Domain;
      }
      if (!isset($_POST["_LDAP_Domain"]) && isset($_POST["_ldap_domain"])) 
      {
          $_SESSION['_LDAP_Domain'] = $_POST["_ldap_domain"];
      }
      if (isset($_GET["_rh_css"]) && isset($this->_rh_css)) 
      {
          $_SESSION['_rh_css'] = $this->_rh_css;
      }
      if (isset($_GET["_puertoServidor"]) && isset($this->_puertoServidor)) 
      {
          $_SESSION['_puertoServidor'] = $this->_puertoServidor;
      }
      if (!isset($_GET["_puertoServidor"]) && isset($_GET["_puertoservidor"])) 
      {
          $_SESSION['_puertoServidor'] = $_GET["_puertoservidor"];
      }
      if (isset($_GET["_puertoGateway"]) && isset($this->_puertoGateway)) 
      {
          $_SESSION['_puertoGateway'] = $this->_puertoGateway;
      }
      if (!isset($_GET["_puertoGateway"]) && isset($_GET["_puertogateway"])) 
      {
          $_SESSION['_puertoGateway'] = $_GET["_puertogateway"];
      }
      if (isset($_GET["_user"]) && isset($this->_user)) 
      {
          $_SESSION['_user'] = $this->_user;
      }
      if (isset($_GET["_pass"]) && isset($this->_pass)) 
      {
          $_SESSION['_pass'] = $this->_pass;
      }
      if (isset($_GET["_servidor"]) && isset($this->_servidor)) 
      {
          $_SESSION['_servidor'] = $this->_servidor;
      }
      if (isset($_GET["_gateway"]) && isset($this->_gateway)) 
      {
          $_SESSION['_gateway'] = $this->_gateway;
      }
      if (isset($_GET["_user_name"]) && isset($this->_user_name)) 
      {
          $_SESSION['_user_name'] = $this->_user_name;
      }
      if (isset($_GET["_id_tenant"]) && isset($this->_id_tenant)) 
      {
          $_SESSION['_id_tenant'] = $this->_id_tenant;
      }
      if (isset($_GET["_id_tenant_user"]) && isset($this->_id_tenant_user)) 
      {
          $_SESSION['_id_tenant_user'] = $this->_id_tenant_user;
      }
      if (isset($_GET["_monitores"]) && isset($this->_monitores)) 
      {
          $_SESSION['_monitores'] = $this->_monitores;
      }
      if (isset($_GET["_usr_login"]) && isset($this->_usr_login)) 
      {
          $_SESSION['_usr_login'] = $this->_usr_login;
      }
      if (isset($_GET["_LDAP_Domain"]) && isset($this->_LDAP_Domain)) 
      {
          $_SESSION['_LDAP_Domain'] = $this->_LDAP_Domain;
      }
      if (!isset($_GET["_LDAP_Domain"]) && isset($_GET["_ldap_domain"])) 
      {
          $_SESSION['_LDAP_Domain'] = $_GET["_ldap_domain"];
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['ofvirtual']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['ofvirtual']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['ofvirtual']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['ofvirtual']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['ofvirtual']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_ofvirtual($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->_rh_css)) 
          {
              $_SESSION['_rh_css'] = $this->_rh_css;
          }
          if (!isset($this->_puertoServidor) && isset($this->_puertoservidor)) 
          {
              $this->_puertoServidor = $this->_puertoservidor;
          }
          if (isset($this->_puertoServidor)) 
          {
              $_SESSION['_puertoServidor'] = $this->_puertoServidor;
          }
          if (!isset($this->_puertoGateway) && isset($this->_puertogateway)) 
          {
              $this->_puertoGateway = $this->_puertogateway;
          }
          if (isset($this->_puertoGateway)) 
          {
              $_SESSION['_puertoGateway'] = $this->_puertoGateway;
          }
          if (isset($this->_user)) 
          {
              $_SESSION['_user'] = $this->_user;
          }
          if (isset($this->_pass)) 
          {
              $_SESSION['_pass'] = $this->_pass;
          }
          if (isset($this->_servidor)) 
          {
              $_SESSION['_servidor'] = $this->_servidor;
          }
          if (isset($this->_gateway)) 
          {
              $_SESSION['_gateway'] = $this->_gateway;
          }
          if (isset($this->_user_name)) 
          {
              $_SESSION['_user_name'] = $this->_user_name;
          }
          if (isset($this->_id_tenant)) 
          {
              $_SESSION['_id_tenant'] = $this->_id_tenant;
          }
          if (isset($this->_id_tenant_user)) 
          {
              $_SESSION['_id_tenant_user'] = $this->_id_tenant_user;
          }
          if (isset($this->_monitores)) 
          {
              $_SESSION['_monitores'] = $this->_monitores;
          }
          if (isset($this->_usr_login)) 
          {
              $_SESSION['_usr_login'] = $this->_usr_login;
          }
          if (!isset($this->_LDAP_Domain) && isset($this->_ldap_domain)) 
          {
              $this->_LDAP_Domain = $this->_ldap_domain;
          }
          if (isset($this->_LDAP_Domain)) 
          {
              $_SESSION['_LDAP_Domain'] = $this->_LDAP_Domain;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['ofvirtual']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['ofvirtual']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['ofvirtual']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['ofvirtual']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->_rh_css)) 
          {
              $_SESSION['_rh_css'] = $this->_rh_css;
          }
          if (!isset($this->_puertoServidor) && isset($this->_puertoservidor)) 
          {
              $this->_puertoServidor = $this->_puertoservidor;
          }
          if (isset($this->_puertoServidor)) 
          {
              $_SESSION['_puertoServidor'] = $this->_puertoServidor;
          }
          if (!isset($this->_puertoGateway) && isset($this->_puertogateway)) 
          {
              $this->_puertoGateway = $this->_puertogateway;
          }
          if (isset($this->_puertoGateway)) 
          {
              $_SESSION['_puertoGateway'] = $this->_puertoGateway;
          }
          if (isset($this->_user)) 
          {
              $_SESSION['_user'] = $this->_user;
          }
          if (isset($this->_pass)) 
          {
              $_SESSION['_pass'] = $this->_pass;
          }
          if (isset($this->_servidor)) 
          {
              $_SESSION['_servidor'] = $this->_servidor;
          }
          if (isset($this->_gateway)) 
          {
              $_SESSION['_gateway'] = $this->_gateway;
          }
          if (isset($this->_user_name)) 
          {
              $_SESSION['_user_name'] = $this->_user_name;
          }
          if (isset($this->_id_tenant)) 
          {
              $_SESSION['_id_tenant'] = $this->_id_tenant;
          }
          if (isset($this->_id_tenant_user)) 
          {
              $_SESSION['_id_tenant_user'] = $this->_id_tenant_user;
          }
          if (isset($this->_monitores)) 
          {
              $_SESSION['_monitores'] = $this->_monitores;
          }
          if (isset($this->_usr_login)) 
          {
              $_SESSION['_usr_login'] = $this->_usr_login;
          }
          if (!isset($this->_LDAP_Domain) && isset($this->_ldap_domain)) 
          {
              $this->_LDAP_Domain = $this->_ldap_domain;
          }
          if (isset($this->_LDAP_Domain)) 
          {
              $_SESSION['_LDAP_Domain'] = $this->_LDAP_Domain;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['ofvirtual']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['ofvirtual']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['ofvirtual']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['ofvirtual']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['ofvirtual']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['ofvirtual']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['ofvirtual']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['ofvirtual']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['ofvirtual']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['ofvirtual']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new ofvirtual_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['initialize'])
          {
              $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  unset($_SESSION['scriptcase']['sc_apl_conf']);
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['ofvirtual']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['ofvirtual']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['ofvirtual'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['ofvirtual']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['ofvirtual']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('ofvirtual') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['ofvirtual']['label'] = "Login";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "ofvirtual")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['login'] = '' . $this->Ini->Nm_lang['lang_sec_users_fild_login'] . '';
      $this->nm_new_label['pswd'] = '' . $this->Ini->Nm_lang['lang_sec_users_fild_pswd'] . '';

      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = !isset($str_ajax_bg)         || "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = !isset($str_ajax_border_c)   || "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = !isset($str_ajax_border_s)   || "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = !isset($str_ajax_border_w)   || "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = !isset($str_block_exp)       || "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = !isset($str_block_col)       || "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = !isset($str_msg_ico_title)   || "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = !isset($str_msg_ico_body)    || "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = !isset($str_err_ico_title)   || "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = !isset($str_err_ico_body)    || "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = !isset($str_cal_ico_back)    || "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = !isset($str_cal_ico_for)     || "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = !isset($str_cal_ico_close)   || "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = !isset($str_tab_space)       || "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = !isset($str_bubble_tail)     || "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = !isset($str_label_sort_pos)  || "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = !isset($str_label_sort)      || "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = !isset($str_label_sort_asc)  || "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = !isset($str_label_sort_desc) || "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = !isset($str_img_status_ok)  || "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = !isset($str_img_status_err) || "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
      $this->Ini->Error_icon_span      = !isset($str_error_icon_span)  || "" == trim($str_error_icon_span)  ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = !isset($img_qs_search)        || "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = !isset($img_qs_clean)         || "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = !isset($str_qs_image_padding) || "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';

        $this->classes_100perc_fields['table'] = '';
        $this->classes_100perc_fields['input'] = '';
        $this->classes_100perc_fields['span_input'] = '';
        $this->classes_100perc_fields['span_select'] = '';
        $this->classes_100perc_fields['style_category'] = '';
        $this->classes_100perc_fields['keep_field_size'] = true;
        if ($this->use_100perc_fields) {
            $this->classes_100perc_fields['table'] = ' sc-ui-100perc-table';
            $this->classes_100perc_fields['input'] = ' sc-ui-100perc-input';
            $this->classes_100perc_fields['span_input'] = ' sc-ui-100perc-span-input';
            $this->classes_100perc_fields['span_select'] = ' sc-ui-100perc-span-select';
            $this->classes_100perc_fields['style_category'] = ' style="width: 100%"';
            $this->classes_100perc_fields['keep_field_size'] = false;
        }



      $_SESSION['scriptcase']['error_icon']['ofvirtual']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['ofvirtual'] = "";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_call'] : $this->Embutida_call;

      $this->form_3versions_single = false;

       $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['ofvirtual']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['ofvirtual'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['ofvirtual'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("ofvirtual", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 

      if (is_file($this->Ini->path_aplicacao . 'ofvirtual_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'ofvirtual_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('contr:' == substr($str_link_webhelp, 0, 6))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'ofvirtual/ofvirtual_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "ofvirtual_erro.class.php"); 
      }
      $this->Erro      = new ofvirtual_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['ofvirtual']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['opc_ant'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['opc_ant'] : "";
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9)))
      {
      $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
if (!isset($this->sc_temp__rh_css)) {$this->sc_temp__rh_css = (isset($_SESSION['_rh_css'])) ? $_SESSION['_rh_css'] : "";}
  $this->sc_temp__rh_css = '';
$this->sc_temp__rh_css = '<style>
				#id-new_user-1{		
					display:none !important;
					}
				#id_pwd_show_hide_pswd{
					display:none !important;
				}

			</style>';

echo $this->sc_temp__rh_css;


unset($_SESSION['scriptcase']['sc_apl_seg']);unset($_SESSION['scriptcase']['pass']);
if (isset($this->sc_temp__rh_css)) { $_SESSION['_rh_css'] = $this->sc_temp__rh_css;}
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['ofvirtual']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['ofvirtual']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
            echo $orig_img . '_@@NM@@_';            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->Field_no_validate = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['Field_no_validate'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['Field_no_validate'] : array();
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['Gera_log_access'] = false;
      }

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_login' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'login');
          }
          if ('validate_pswd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pswd');
          }
          if ('validate_remember_me' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'remember_me');
          }
          if ('validate_new_user' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'new_user');
          }
          if ('validate_retrieve_pswd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'retrieve_pswd');
          }
          ofvirtual_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->remember_me))
          {
              $x = 0; 
              $this->remember_me_1 = $this->remember_me;
              $this->remember_me = ""; 
              if ($this->remember_me_1 != "") 
              { 
                  foreach ($this->remember_me_1 as $dados_remember_me_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->remember_me .= ";";
                      } 
                      $this->remember_me .= $dados_remember_me_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              ofvirtual_pack_ajax_response();
              exit;
          }
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          if ($this->nmgp_opcao != "incluir")
          {
              $this->scFormFocusErrorName = '';
          }
          $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  ofvirtual_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro, '', true, true); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  ofvirtual_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, '', true, true);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
//
      if (!isset($nm_form_submit) && $this->nmgp_opcao != "nada")
      {
          $this->login = "" ;  
          $this->pswd = "" ;  
          $this->remember_me = "" ;  
          $this->new_user = "" ;  
          $this->retrieve_pswd = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dados_form'] as $NM_campo => $NM_valor)
              {
                  $$NM_campo = $NM_valor;
              }
          }
      }
      else
      {
           if ($this->nmgp_opcao != "nada")
           {
           }
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['campos']))
              { 
                  $login = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['campos'][0]; 
                  $pswd = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['campos'][1]; 
                  $remember_me = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['campos'][2]; 
                  $new_user = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['campos'][3]; 
                  $retrieve_pswd = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['campos'][4]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['campos'][0] = $this->login; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['campos'][1] = $this->pswd; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['campos'][2] = $this->remember_me; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['campos'][3] = $this->new_user; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['campos'][4] = $this->retrieve_pswd; 
          if (!empty($this->new_user))
          {
              $trab_saida = $this->new_user;
              $diretorio = explode("/", $trab_saida);
              if (count($diretorio) > 2 || count($diretorio) == 0 || strtolower(substr($this->new_user, 0, 7)) == "http://" || strtolower(substr($this->new_user, 0, 8)) == "https://" || strtolower(substr($this->new_user, 0, 3)) == "../")
              {
                  $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $trab_saida;
              }
              else
              {
                  if (count($diretorio) == 1)
                  {
                      $limpa_dir = 2;
                      $compoe_url = str_replace(".php", "", $trab_saida);
                      $trab_saida = SC_dir_app_name($compoe_url) . "/";
                  }
                  else
                  {
                     $limpa_dir = 3;
                     $trab_saida = $diretorio[0] . "/";
                     $compoe_url = str_replace(".php", "", $diretorio[1]);
                     $trab_saida .= $compoe_url . "/" . $compoe_url . ".php";
                  }
                  $trab_path             = explode("/", $_SERVER['PHP_SELF']);
                  $trab_count_path       = count($trab_path);
                  $path_retorno_aplicacao  = "";
                  for ($ix = 0; $ix + $limpa_dir < $trab_count_path; $ix++)
                  {
                       $path_retorno_aplicacao .=  $trab_path[$ix] . "/";
                  }
                  $path_retorno_aplicacao .=  $trab_saida;
                  $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['redir_target_name'] = $this->new_user_sc_target_name;
                  $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $path_retorno_aplicacao;
                  $nm_apl_dependente = 1; 
               }
               $this->NM_close_db(); 
               $this->nmgp_redireciona(); 
               exit;
           }
          if (!empty($this->retrieve_pswd))
          {
              $trab_saida = $this->retrieve_pswd;
              $diretorio = explode("/", $trab_saida);
              if (count($diretorio) > 2 || count($diretorio) == 0 || strtolower(substr($this->retrieve_pswd, 0, 7)) == "http://" || strtolower(substr($this->retrieve_pswd, 0, 8)) == "https://" || strtolower(substr($this->retrieve_pswd, 0, 3)) == "../")
              {
                  $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $trab_saida;
              }
              else
              {
                  if (count($diretorio) == 1)
                  {
                      $limpa_dir = 2;
                      $compoe_url = str_replace(".php", "", $trab_saida);
                      $trab_saida = SC_dir_app_name($compoe_url) . "/";
                  }
                  else
                  {
                     $limpa_dir = 3;
                     $trab_saida = $diretorio[0] . "/";
                     $compoe_url = str_replace(".php", "", $diretorio[1]);
                     $trab_saida .= $compoe_url . "/" . $compoe_url . ".php";
                  }
                  $trab_path             = explode("/", $_SERVER['PHP_SELF']);
                  $trab_count_path       = count($trab_path);
                  $path_retorno_aplicacao  = "";
                  for ($ix = 0; $ix + $limpa_dir < $trab_count_path; $ix++)
                  {
                       $path_retorno_aplicacao .=  $trab_path[$ix] . "/";
                  }
                  $path_retorno_aplicacao .=  $trab_saida;
                  $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['redir_target_name'] = $this->retrieve_pswd_sc_target_name;
                  $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $path_retorno_aplicacao;
                  $nm_apl_dependente = 1; 
               }
               $this->NM_close_db(); 
               $this->nmgp_redireciona(); 
               exit;
           }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("ofvirtual", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("ofvirtual_fim.php", $this->nm_location, $contr_menu); 
              }
              elseif (!$this->NM_ajax_flag)
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
          if ($this->NM_ajax_flag)
          {
              ofvirtual_pack_ajax_response();
              exit;
          }
      }
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     if (parent.writeFastMenu)
     {
         parent.writeFastMenu(link_atual);
     }
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     if (parent.clearFastMenu)
     {
        parent.clearFastMenu();
     }
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "ofvirtual.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               if (!empty($str_zip)) {
                   exec($str_zip);
               }
               // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
               if ($fp)
               {
                   @fwrite($fp, $str_zip . "\r\n\r\n");
                   @fclose($fp);
               }
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Login") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/6/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/grp__NM__img__NM__hdt30x30.jpg">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="ofvirtual_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="ofvirtual"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_gera_log_insert($orig="Scriptcase", $evento="", $texto="")
   {
       $delim  = "'";
       $delim1 = "'";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $delim  = "#";
           $delim1 = "#";
       } 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (strtolower($_SESSION['scriptcase']['glo_tpbanco']) == 'pdo_sqlsrv' || strtolower($_SESSION['scriptcase']['glo_tpbanco']) == 'pdo_dblib')
       { 
           $dt  = $delim . date('Ymd H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_informix))
       { 
           $dt  = "EXTEND(" . $dt . ", YEAR TO FRACTION)";
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'ofvirtual', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'ofvirtual', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'ofvirtual', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               ofvirtual_pack_ajax_response();
               exit; 
           }
       }
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'login':
               return "" . $this->Ini->Nm_lang['lang_sec_users_fild_login'] . "";
               break;
           case 'pswd':
               return "" . $this->Ini->Nm_lang['lang_sec_users_fild_pswd'] . "";
               break;
           case 'remember_me':
               return "";
               break;
           case 'new_user':
               return "new_user";
               break;
           case 'retrieve_pswd':
               return "retrieve_pswd";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
     if (is_array($filtro) && empty($filtro)) {
         $filtro = '';
     }
//---------------------------------------------------------
     $this->scFormFocusErrorName = '';
     $this->sc_force_zero = array();

     if (!is_array($filtro) && '' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_ofvirtual']) || !is_array($this->NM_ajax_info['errList']['geral_ofvirtual']))
              {
                  $this->NM_ajax_info['errList']['geral_ofvirtual'] = array();
              }
              $this->NM_ajax_info['errList']['geral_ofvirtual'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'login' == $filtro)) || (is_array($filtro) && in_array('login', $filtro)))
        $this->ValidateField_login($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "login";

      if ((!is_array($filtro) && ('' == $filtro || 'pswd' == $filtro)) || (is_array($filtro) && in_array('pswd', $filtro)))
        $this->ValidateField_pswd($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "pswd";

      if ((!is_array($filtro) && ('' == $filtro || 'remember_me' == $filtro)) || (is_array($filtro) && in_array('remember_me', $filtro)))
        $this->ValidateField_remember_me($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "remember_me";

      if ((!is_array($filtro) && ('' == $filtro || 'new_user' == $filtro)) || (is_array($filtro) && in_array('new_user', $filtro)))
        $this->ValidateField_new_user($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "new_user";

      if ((!is_array($filtro) && ('' == $filtro || 'retrieve_pswd' == $filtro)) || (is_array($filtro) && in_array('retrieve_pswd', $filtro)))
        $this->ValidateField_retrieve_pswd($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "retrieve_pswd";


      if (empty($Campos_Crit) && empty($Campos_Falta))
      {
      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_login = $this->login;
    $original_pswd = $this->pswd;
}
if (!isset($this->sc_temp__LDAP_Domain)) {$this->sc_temp__LDAP_Domain = (isset($_SESSION['_LDAP_Domain'])) ? $_SESSION['_LDAP_Domain'] : "";}
if (!isset($this->sc_temp__usr_login)) {$this->sc_temp__usr_login = (isset($_SESSION['_usr_login'])) ? $_SESSION['_usr_login'] : "";}
if (!isset($this->sc_temp__monitores)) {$this->sc_temp__monitores = (isset($_SESSION['_monitores'])) ? $_SESSION['_monitores'] : "";}
if (!isset($this->sc_temp__id_tenant_user)) {$this->sc_temp__id_tenant_user = (isset($_SESSION['_id_tenant_user'])) ? $_SESSION['_id_tenant_user'] : "";}
if (!isset($this->sc_temp__id_tenant)) {$this->sc_temp__id_tenant = (isset($_SESSION['_id_tenant'])) ? $_SESSION['_id_tenant'] : "";}
if (!isset($this->sc_temp__user_name)) {$this->sc_temp__user_name = (isset($_SESSION['_user_name'])) ? $_SESSION['_user_name'] : "";}
if (!isset($this->sc_temp__gateway)) {$this->sc_temp__gateway = (isset($_SESSION['_gateway'])) ? $_SESSION['_gateway'] : "";}
if (!isset($this->sc_temp__servidor)) {$this->sc_temp__servidor = (isset($_SESSION['_servidor'])) ? $_SESSION['_servidor'] : "";}
if (!isset($this->sc_temp__pass)) {$this->sc_temp__pass = (isset($_SESSION['_pass'])) ? $_SESSION['_pass'] : "";}
if (!isset($this->sc_temp__user)) {$this->sc_temp__user = (isset($_SESSION['_user'])) ? $_SESSION['_user'] : "";}
if (!isset($this->sc_temp__puertoGateway)) {$this->sc_temp__puertoGateway = (isset($_SESSION['_puertoGateway'])) ? $_SESSION['_puertoGateway'] : "";}
if (!isset($this->sc_temp__puertoServidor)) {$this->sc_temp__puertoServidor = (isset($_SESSION['_puertoServidor'])) ? $_SESSION['_puertoServidor'] : "";}
  $this->login = $this->login ;


$existe_usuario = $this->select_escalar("SELECT idTUser
									FROM tenants_users
									WHERE usuario = '$this->login'");
if((int)$existe_usuario+0 == 0){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "01.Error. Usuario no encontrado en el sistema";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_ofvirtual';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_ofvirtual';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "01.Error. Usuario no encontrado en el sistema";
 }
;
	if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp__puertoServidor)) { $_SESSION['_puertoServidor'] = $this->sc_temp__puertoServidor;}
 if (isset($this->sc_temp__puertoGateway)) { $_SESSION['_puertoGateway'] = $this->sc_temp__puertoGateway;}
 if (isset($this->sc_temp__user)) { $_SESSION['_user'] = $this->sc_temp__user;}
 if (isset($this->sc_temp__pass)) { $_SESSION['_pass'] = $this->sc_temp__pass;}
 if (isset($this->sc_temp__servidor)) { $_SESSION['_servidor'] = $this->sc_temp__servidor;}
 if (isset($this->sc_temp__gateway)) { $_SESSION['_gateway'] = $this->sc_temp__gateway;}
 if (isset($this->sc_temp__user_name)) { $_SESSION['_user_name'] = $this->sc_temp__user_name;}
 if (isset($this->sc_temp__id_tenant)) { $_SESSION['_id_tenant'] = $this->sc_temp__id_tenant;}
 if (isset($this->sc_temp__id_tenant_user)) { $_SESSION['_id_tenant_user'] = $this->sc_temp__id_tenant_user;}
 if (isset($this->sc_temp__monitores)) { $_SESSION['_monitores'] = $this->sc_temp__monitores;}
 if (isset($this->sc_temp__usr_login)) { $_SESSION['_usr_login'] = $this->sc_temp__usr_login;}
 if (isset($this->sc_temp__LDAP_Domain)) { $_SESSION['_LDAP_Domain'] = $this->sc_temp__LDAP_Domain;}
    $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
    return;
}
}

$bloqueado = $this->leer_fila("SELECT MaxNumIntentos, NumIntentos
						FROM tenants t LEFT JOIN tenants_users tu ON t.idTenant = tu.idTenant
						WHERE usuario = '$this->login'");
$max_int = $bloqueado['MaxNumIntentos'];
$num_int = $bloqueado['NumIntentos'];
if((int)$num_int >= (int)$max_int){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "**.Error. Usuario bloqueado. Contacte con su soporte";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_ofvirtual';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_ofvirtual';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "**.Error. Usuario bloqueado. Contacte con su soporte";
 }
;
	if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp__puertoServidor)) { $_SESSION['_puertoServidor'] = $this->sc_temp__puertoServidor;}
 if (isset($this->sc_temp__puertoGateway)) { $_SESSION['_puertoGateway'] = $this->sc_temp__puertoGateway;}
 if (isset($this->sc_temp__user)) { $_SESSION['_user'] = $this->sc_temp__user;}
 if (isset($this->sc_temp__pass)) { $_SESSION['_pass'] = $this->sc_temp__pass;}
 if (isset($this->sc_temp__servidor)) { $_SESSION['_servidor'] = $this->sc_temp__servidor;}
 if (isset($this->sc_temp__gateway)) { $_SESSION['_gateway'] = $this->sc_temp__gateway;}
 if (isset($this->sc_temp__user_name)) { $_SESSION['_user_name'] = $this->sc_temp__user_name;}
 if (isset($this->sc_temp__id_tenant)) { $_SESSION['_id_tenant'] = $this->sc_temp__id_tenant;}
 if (isset($this->sc_temp__id_tenant_user)) { $_SESSION['_id_tenant_user'] = $this->sc_temp__id_tenant_user;}
 if (isset($this->sc_temp__monitores)) { $_SESSION['_monitores'] = $this->sc_temp__monitores;}
 if (isset($this->sc_temp__usr_login)) { $_SESSION['_usr_login'] = $this->sc_temp__usr_login;}
 if (isset($this->sc_temp__LDAP_Domain)) { $_SESSION['_LDAP_Domain'] = $this->sc_temp__LDAP_Domain;}
    $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
    return;
}
}



$user_active = $this->select_escalar("SELECT active
								FROM tenants_users
								WHERE usuario = '$this->login'");

if($user_active != 'Y'){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "02.Error. Usuario no encontrado en el sistema. Contacte con su soporte";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_ofvirtual';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_ofvirtual';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "02.Error. Usuario no encontrado en el sistema. Contacte con su soporte";
 }
;
	if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp__puertoServidor)) { $_SESSION['_puertoServidor'] = $this->sc_temp__puertoServidor;}
 if (isset($this->sc_temp__puertoGateway)) { $_SESSION['_puertoGateway'] = $this->sc_temp__puertoGateway;}
 if (isset($this->sc_temp__user)) { $_SESSION['_user'] = $this->sc_temp__user;}
 if (isset($this->sc_temp__pass)) { $_SESSION['_pass'] = $this->sc_temp__pass;}
 if (isset($this->sc_temp__servidor)) { $_SESSION['_servidor'] = $this->sc_temp__servidor;}
 if (isset($this->sc_temp__gateway)) { $_SESSION['_gateway'] = $this->sc_temp__gateway;}
 if (isset($this->sc_temp__user_name)) { $_SESSION['_user_name'] = $this->sc_temp__user_name;}
 if (isset($this->sc_temp__id_tenant)) { $_SESSION['_id_tenant'] = $this->sc_temp__id_tenant;}
 if (isset($this->sc_temp__id_tenant_user)) { $_SESSION['_id_tenant_user'] = $this->sc_temp__id_tenant_user;}
 if (isset($this->sc_temp__monitores)) { $_SESSION['_monitores'] = $this->sc_temp__monitores;}
 if (isset($this->sc_temp__usr_login)) { $_SESSION['_usr_login'] = $this->sc_temp__usr_login;}
 if (isset($this->sc_temp__LDAP_Domain)) { $_SESSION['_LDAP_Domain'] = $this->sc_temp__LDAP_Domain;}
    $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
    return;
}
}

$idtenant = $this->select_escalar("SELECT idTenant
							    FROM tenants_users
							    WHERE usuario = '$this->login'");


if((int)$idtenant+0 == 0){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "03.Error de Conexión";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_ofvirtual';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_ofvirtual';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "03.Error de Conexión";
 }
;
	if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp__puertoServidor)) { $_SESSION['_puertoServidor'] = $this->sc_temp__puertoServidor;}
 if (isset($this->sc_temp__puertoGateway)) { $_SESSION['_puertoGateway'] = $this->sc_temp__puertoGateway;}
 if (isset($this->sc_temp__user)) { $_SESSION['_user'] = $this->sc_temp__user;}
 if (isset($this->sc_temp__pass)) { $_SESSION['_pass'] = $this->sc_temp__pass;}
 if (isset($this->sc_temp__servidor)) { $_SESSION['_servidor'] = $this->sc_temp__servidor;}
 if (isset($this->sc_temp__gateway)) { $_SESSION['_gateway'] = $this->sc_temp__gateway;}
 if (isset($this->sc_temp__user_name)) { $_SESSION['_user_name'] = $this->sc_temp__user_name;}
 if (isset($this->sc_temp__id_tenant)) { $_SESSION['_id_tenant'] = $this->sc_temp__id_tenant;}
 if (isset($this->sc_temp__id_tenant_user)) { $_SESSION['_id_tenant_user'] = $this->sc_temp__id_tenant_user;}
 if (isset($this->sc_temp__monitores)) { $_SESSION['_monitores'] = $this->sc_temp__monitores;}
 if (isset($this->sc_temp__usr_login)) { $_SESSION['_usr_login'] = $this->sc_temp__usr_login;}
 if (isset($this->sc_temp__LDAP_Domain)) { $_SESSION['_LDAP_Domain'] = $this->sc_temp__LDAP_Domain;}
    $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
    return;
}
} 

else{
	
	$tenant_active = $this->select_escalar("SELECT active
										FROM tenants
										WHERE idTenant = $idtenant ");
	
	if($tenant_active != 'Y'){
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "04.Error de Conexión. Contacte con su soporte";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_ofvirtual';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_ofvirtual';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "04.Error de Conexión. Contacte con su soporte";
 }
;
		if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp__puertoServidor)) { $_SESSION['_puertoServidor'] = $this->sc_temp__puertoServidor;}
 if (isset($this->sc_temp__puertoGateway)) { $_SESSION['_puertoGateway'] = $this->sc_temp__puertoGateway;}
 if (isset($this->sc_temp__user)) { $_SESSION['_user'] = $this->sc_temp__user;}
 if (isset($this->sc_temp__pass)) { $_SESSION['_pass'] = $this->sc_temp__pass;}
 if (isset($this->sc_temp__servidor)) { $_SESSION['_servidor'] = $this->sc_temp__servidor;}
 if (isset($this->sc_temp__gateway)) { $_SESSION['_gateway'] = $this->sc_temp__gateway;}
 if (isset($this->sc_temp__user_name)) { $_SESSION['_user_name'] = $this->sc_temp__user_name;}
 if (isset($this->sc_temp__id_tenant)) { $_SESSION['_id_tenant'] = $this->sc_temp__id_tenant;}
 if (isset($this->sc_temp__id_tenant_user)) { $_SESSION['_id_tenant_user'] = $this->sc_temp__id_tenant_user;}
 if (isset($this->sc_temp__monitores)) { $_SESSION['_monitores'] = $this->sc_temp__monitores;}
 if (isset($this->sc_temp__usr_login)) { $_SESSION['_usr_login'] = $this->sc_temp__usr_login;}
 if (isset($this->sc_temp__LDAP_Domain)) { $_SESSION['_LDAP_Domain'] = $this->sc_temp__LDAP_Domain;}
    $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
    return;
}
} else{
		
	
		$ldapconfig = $this->leer_fila("SELECT LDAP_Server,LDAP_Domain, LDAP_Basedn, LDAP_Usersdn FROM tenants 
							 WHERE idTenant= $idtenant");

		$port = '389';
		$host = $ldapconfig['LDAP_Server'];
		$basedn = $ldapconfig['LDAP_Basedn'];
		$usersdn = $ldapconfig['LDAP_Usersdn'];
		$domain = $ldapconfig['LDAP_Domain'];
		
			if($host == ''){
				
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "06.Error de Conexión. Reason: LDAP_Server not define";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_ofvirtual';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_ofvirtual';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "06.Error de Conexión. Reason: LDAP_Server not define";
 }
;
				if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp__puertoServidor)) { $_SESSION['_puertoServidor'] = $this->sc_temp__puertoServidor;}
 if (isset($this->sc_temp__puertoGateway)) { $_SESSION['_puertoGateway'] = $this->sc_temp__puertoGateway;}
 if (isset($this->sc_temp__user)) { $_SESSION['_user'] = $this->sc_temp__user;}
 if (isset($this->sc_temp__pass)) { $_SESSION['_pass'] = $this->sc_temp__pass;}
 if (isset($this->sc_temp__servidor)) { $_SESSION['_servidor'] = $this->sc_temp__servidor;}
 if (isset($this->sc_temp__gateway)) { $_SESSION['_gateway'] = $this->sc_temp__gateway;}
 if (isset($this->sc_temp__user_name)) { $_SESSION['_user_name'] = $this->sc_temp__user_name;}
 if (isset($this->sc_temp__id_tenant)) { $_SESSION['_id_tenant'] = $this->sc_temp__id_tenant;}
 if (isset($this->sc_temp__id_tenant_user)) { $_SESSION['_id_tenant_user'] = $this->sc_temp__id_tenant_user;}
 if (isset($this->sc_temp__monitores)) { $_SESSION['_monitores'] = $this->sc_temp__monitores;}
 if (isset($this->sc_temp__usr_login)) { $_SESSION['_usr_login'] = $this->sc_temp__usr_login;}
 if (isset($this->sc_temp__LDAP_Domain)) { $_SESSION['_LDAP_Domain'] = $this->sc_temp__LDAP_Domain;}
    $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
    return;
}
} elseif($basedn == ''){
				
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "06.Error de Conexión. Reason: LDAP_Basedn not define";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_ofvirtual';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_ofvirtual';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "06.Error de Conexión. Reason: LDAP_Basedn not define";
 }
;
				if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp__puertoServidor)) { $_SESSION['_puertoServidor'] = $this->sc_temp__puertoServidor;}
 if (isset($this->sc_temp__puertoGateway)) { $_SESSION['_puertoGateway'] = $this->sc_temp__puertoGateway;}
 if (isset($this->sc_temp__user)) { $_SESSION['_user'] = $this->sc_temp__user;}
 if (isset($this->sc_temp__pass)) { $_SESSION['_pass'] = $this->sc_temp__pass;}
 if (isset($this->sc_temp__servidor)) { $_SESSION['_servidor'] = $this->sc_temp__servidor;}
 if (isset($this->sc_temp__gateway)) { $_SESSION['_gateway'] = $this->sc_temp__gateway;}
 if (isset($this->sc_temp__user_name)) { $_SESSION['_user_name'] = $this->sc_temp__user_name;}
 if (isset($this->sc_temp__id_tenant)) { $_SESSION['_id_tenant'] = $this->sc_temp__id_tenant;}
 if (isset($this->sc_temp__id_tenant_user)) { $_SESSION['_id_tenant_user'] = $this->sc_temp__id_tenant_user;}
 if (isset($this->sc_temp__monitores)) { $_SESSION['_monitores'] = $this->sc_temp__monitores;}
 if (isset($this->sc_temp__usr_login)) { $_SESSION['_usr_login'] = $this->sc_temp__usr_login;}
 if (isset($this->sc_temp__LDAP_Domain)) { $_SESSION['_LDAP_Domain'] = $this->sc_temp__LDAP_Domain;}
    $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
    return;
}
} elseif($usersdn == ''){
				
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "06.Error de Conexión. Reason: LDAP_Userdn not define";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_ofvirtual';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_ofvirtual';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "06.Error de Conexión. Reason: LDAP_Userdn not define";
 }
;
				if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp__puertoServidor)) { $_SESSION['_puertoServidor'] = $this->sc_temp__puertoServidor;}
 if (isset($this->sc_temp__puertoGateway)) { $_SESSION['_puertoGateway'] = $this->sc_temp__puertoGateway;}
 if (isset($this->sc_temp__user)) { $_SESSION['_user'] = $this->sc_temp__user;}
 if (isset($this->sc_temp__pass)) { $_SESSION['_pass'] = $this->sc_temp__pass;}
 if (isset($this->sc_temp__servidor)) { $_SESSION['_servidor'] = $this->sc_temp__servidor;}
 if (isset($this->sc_temp__gateway)) { $_SESSION['_gateway'] = $this->sc_temp__gateway;}
 if (isset($this->sc_temp__user_name)) { $_SESSION['_user_name'] = $this->sc_temp__user_name;}
 if (isset($this->sc_temp__id_tenant)) { $_SESSION['_id_tenant'] = $this->sc_temp__id_tenant;}
 if (isset($this->sc_temp__id_tenant_user)) { $_SESSION['_id_tenant_user'] = $this->sc_temp__id_tenant_user;}
 if (isset($this->sc_temp__monitores)) { $_SESSION['_monitores'] = $this->sc_temp__monitores;}
 if (isset($this->sc_temp__usr_login)) { $_SESSION['_usr_login'] = $this->sc_temp__usr_login;}
 if (isset($this->sc_temp__LDAP_Domain)) { $_SESSION['_LDAP_Domain'] = $this->sc_temp__LDAP_Domain;}
    $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
    return;
}
} elseif($domain == ''){
				
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "06.Error de Conexión. Reason: LDAP_Domain not define";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_ofvirtual';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_ofvirtual';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "06.Error de Conexión. Reason: LDAP_Domain not define";
 }
;
				if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp__puertoServidor)) { $_SESSION['_puertoServidor'] = $this->sc_temp__puertoServidor;}
 if (isset($this->sc_temp__puertoGateway)) { $_SESSION['_puertoGateway'] = $this->sc_temp__puertoGateway;}
 if (isset($this->sc_temp__user)) { $_SESSION['_user'] = $this->sc_temp__user;}
 if (isset($this->sc_temp__pass)) { $_SESSION['_pass'] = $this->sc_temp__pass;}
 if (isset($this->sc_temp__servidor)) { $_SESSION['_servidor'] = $this->sc_temp__servidor;}
 if (isset($this->sc_temp__gateway)) { $_SESSION['_gateway'] = $this->sc_temp__gateway;}
 if (isset($this->sc_temp__user_name)) { $_SESSION['_user_name'] = $this->sc_temp__user_name;}
 if (isset($this->sc_temp__id_tenant)) { $_SESSION['_id_tenant'] = $this->sc_temp__id_tenant;}
 if (isset($this->sc_temp__id_tenant_user)) { $_SESSION['_id_tenant_user'] = $this->sc_temp__id_tenant_user;}
 if (isset($this->sc_temp__monitores)) { $_SESSION['_monitores'] = $this->sc_temp__monitores;}
 if (isset($this->sc_temp__usr_login)) { $_SESSION['_usr_login'] = $this->sc_temp__usr_login;}
 if (isset($this->sc_temp__LDAP_Domain)) { $_SESSION['_LDAP_Domain'] = $this->sc_temp__LDAP_Domain;}
    $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
    return;
}
}

		$adServer = "ldap://".$host;

		$ldap = ldap_connect($adServer) ;
		
		if($ldap == false) {
			
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "05.Error de Conexión";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_ofvirtual';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_ofvirtual';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "05.Error de Conexión";
 }
;
			if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp__puertoServidor)) { $_SESSION['_puertoServidor'] = $this->sc_temp__puertoServidor;}
 if (isset($this->sc_temp__puertoGateway)) { $_SESSION['_puertoGateway'] = $this->sc_temp__puertoGateway;}
 if (isset($this->sc_temp__user)) { $_SESSION['_user'] = $this->sc_temp__user;}
 if (isset($this->sc_temp__pass)) { $_SESSION['_pass'] = $this->sc_temp__pass;}
 if (isset($this->sc_temp__servidor)) { $_SESSION['_servidor'] = $this->sc_temp__servidor;}
 if (isset($this->sc_temp__gateway)) { $_SESSION['_gateway'] = $this->sc_temp__gateway;}
 if (isset($this->sc_temp__user_name)) { $_SESSION['_user_name'] = $this->sc_temp__user_name;}
 if (isset($this->sc_temp__id_tenant)) { $_SESSION['_id_tenant'] = $this->sc_temp__id_tenant;}
 if (isset($this->sc_temp__id_tenant_user)) { $_SESSION['_id_tenant_user'] = $this->sc_temp__id_tenant_user;}
 if (isset($this->sc_temp__monitores)) { $_SESSION['_monitores'] = $this->sc_temp__monitores;}
 if (isset($this->sc_temp__usr_login)) { $_SESSION['_usr_login'] = $this->sc_temp__usr_login;}
 if (isset($this->sc_temp__LDAP_Domain)) { $_SESSION['_LDAP_Domain'] = $this->sc_temp__LDAP_Domain;}
    $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
    return;
}
}else{

			$username = $this->login ;                    
			$password = $this->pswd ;  
			
			if (strpos($username, '@') == false) {
				$ldaprdn = $username .'@'. $domain;
			} 

			
			ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

			$bind = @ldap_bind($ldap, $ldaprdn, $password);
		

			if ($bind) {
				$datos = $this->leer_fila("SELECT puertoServidor, puertoGateway, UserBase64, PassBase64, servidor, 
										gateway, LDAP_Domain
									FROM tenants
									WHERE idTenant = $idtenant");
				$datosUser = $this->leer_fila("SELECT idTUser, activar_monitores, Name
									FROM tenants_users
									WHERE usuario = '$this->login' AND idTenant = $idtenant");

				$this->sc_temp__puertoServidor = $datos['puertoServidor'];
				$this->sc_temp__puertoGateway =  $datos['puertoGateway'];
				$this->sc_temp__user =  $datos['UserBase64'];
				$this->sc_temp__pass =  $datos['PassBase64'];
				$this->sc_temp__servidor =  $datos['servidor'];
				$this->sc_temp__gateway =  $datos['gateway'];
				$this->sc_temp__user_name = $datosUser['Name'];
				$this->sc_temp__id_tenant = $idtenant;
				$this->sc_temp__id_tenant_user = $datosUser['idTUser'];
				$this->sc_temp__monitores = $datosUser['activar_monitores'];
				
				
				$this->sc_temp__usr_login = $this->login;
				$this->sc_temp__LDAP_Domain = $datos['LDAP_Domain'];
				
				$this->validate_success(3);
				 if (isset($this->sc_temp__puertoServidor)) { $_SESSION['_puertoServidor'] = $this->sc_temp__puertoServidor;}
 if (isset($this->sc_temp__puertoGateway)) { $_SESSION['_puertoGateway'] = $this->sc_temp__puertoGateway;}
 if (isset($this->sc_temp__user)) { $_SESSION['_user'] = $this->sc_temp__user;}
 if (isset($this->sc_temp__pass)) { $_SESSION['_pass'] = $this->sc_temp__pass;}
 if (isset($this->sc_temp__servidor)) { $_SESSION['_servidor'] = $this->sc_temp__servidor;}
 if (isset($this->sc_temp__gateway)) { $_SESSION['_gateway'] = $this->sc_temp__gateway;}
 if (isset($this->sc_temp__user_name)) { $_SESSION['_user_name'] = $this->sc_temp__user_name;}
 if (isset($this->sc_temp__id_tenant)) { $_SESSION['_id_tenant'] = $this->sc_temp__id_tenant;}
 if (isset($this->sc_temp__id_tenant_user)) { $_SESSION['_id_tenant_user'] = $this->sc_temp__id_tenant_user;}
 if (isset($this->sc_temp__monitores)) { $_SESSION['_monitores'] = $this->sc_temp__monitores;}
 if (isset($this->sc_temp__usr_login)) { $_SESSION['_usr_login'] = $this->sc_temp__usr_login;}
 if (isset($this->sc_temp__LDAP_Domain)) { $_SESSION['_LDAP_Domain'] = $this->sc_temp__LDAP_Domain;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('ctl_portalservicios_ofvirtual') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
				
			} else {
				
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "07.Error - Usuario o contraseña incorrectos";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_ofvirtual';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_ofvirtual';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "07.Error - Usuario o contraseña incorrectos";
 }
;
				
				
     $nm_select ="UPDATE tenants_users SET NumIntentos = ($num_int)+1 WHERE usuario = '$this->login'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                ofvirtual_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
				if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp__puertoServidor)) { $_SESSION['_puertoServidor'] = $this->sc_temp__puertoServidor;}
 if (isset($this->sc_temp__puertoGateway)) { $_SESSION['_puertoGateway'] = $this->sc_temp__puertoGateway;}
 if (isset($this->sc_temp__user)) { $_SESSION['_user'] = $this->sc_temp__user;}
 if (isset($this->sc_temp__pass)) { $_SESSION['_pass'] = $this->sc_temp__pass;}
 if (isset($this->sc_temp__servidor)) { $_SESSION['_servidor'] = $this->sc_temp__servidor;}
 if (isset($this->sc_temp__gateway)) { $_SESSION['_gateway'] = $this->sc_temp__gateway;}
 if (isset($this->sc_temp__user_name)) { $_SESSION['_user_name'] = $this->sc_temp__user_name;}
 if (isset($this->sc_temp__id_tenant)) { $_SESSION['_id_tenant'] = $this->sc_temp__id_tenant;}
 if (isset($this->sc_temp__id_tenant_user)) { $_SESSION['_id_tenant_user'] = $this->sc_temp__id_tenant_user;}
 if (isset($this->sc_temp__monitores)) { $_SESSION['_monitores'] = $this->sc_temp__monitores;}
 if (isset($this->sc_temp__usr_login)) { $_SESSION['_usr_login'] = $this->sc_temp__usr_login;}
 if (isset($this->sc_temp__LDAP_Domain)) { $_SESSION['_LDAP_Domain'] = $this->sc_temp__LDAP_Domain;}
    $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
    return;
}
}

		}
	}
	
}
if (isset($this->sc_temp__puertoServidor)) { $_SESSION['_puertoServidor'] = $this->sc_temp__puertoServidor;}
if (isset($this->sc_temp__puertoGateway)) { $_SESSION['_puertoGateway'] = $this->sc_temp__puertoGateway;}
if (isset($this->sc_temp__user)) { $_SESSION['_user'] = $this->sc_temp__user;}
if (isset($this->sc_temp__pass)) { $_SESSION['_pass'] = $this->sc_temp__pass;}
if (isset($this->sc_temp__servidor)) { $_SESSION['_servidor'] = $this->sc_temp__servidor;}
if (isset($this->sc_temp__gateway)) { $_SESSION['_gateway'] = $this->sc_temp__gateway;}
if (isset($this->sc_temp__user_name)) { $_SESSION['_user_name'] = $this->sc_temp__user_name;}
if (isset($this->sc_temp__id_tenant)) { $_SESSION['_id_tenant'] = $this->sc_temp__id_tenant;}
if (isset($this->sc_temp__id_tenant_user)) { $_SESSION['_id_tenant_user'] = $this->sc_temp__id_tenant_user;}
if (isset($this->sc_temp__monitores)) { $_SESSION['_monitores'] = $this->sc_temp__monitores;}
if (isset($this->sc_temp__usr_login)) { $_SESSION['_usr_login'] = $this->sc_temp__usr_login;}
if (isset($this->sc_temp__LDAP_Domain)) { $_SESSION['_LDAP_Domain'] = $this->sc_temp__LDAP_Domain;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_login != $this->login || (isset($bFlagRead_login) && $bFlagRead_login)))
    {
        $this->ajax_return_values_login(true);
    }
    if (($original_pswd != $this->pswd || (isset($bFlagRead_pswd) && $bFlagRead_pswd)))
    {
        $this->ajax_return_values_pswd(true);
    }
}
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off'; 
      }
      }
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_login(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['login'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->login) > 190) 
          { 
              $hasError = true;
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_users_fild_login'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 190 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['login']))
              {
                  $Campos_Erros['login'] = array();
              }
              $Campos_Erros['login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 190 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['login']) || !is_array($this->NM_ajax_info['errList']['login']))
              {
                  $this->NM_ajax_info['errList']['login'] = array();
              }
              $this->NM_ajax_info['errList']['login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 190 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'login';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_login

    function ValidateField_pswd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['pswd'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pswd) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_users_fild_pswd'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pswd']))
              {
                  $Campos_Erros['pswd'] = array();
              }
              $Campos_Erros['pswd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pswd']) || !is_array($this->NM_ajax_info['errList']['pswd']))
              {
                  $this->NM_ajax_info['errList']['pswd'] = array();
              }
              $this->NM_ajax_info['errList']['pswd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pswd';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pswd

    function ValidateField_remember_me(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['remember_me'])) {
       return;
   }
      if ($this->remember_me == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->remember_me = "0";
      } 
      else 
      { 
          if (is_array($this->remember_me))
          {
              $x = 0; 
              $this->remember_me_1 = array(); 
              foreach ($this->remember_me as $ind => $dados_remember_me_1 ) 
              {
                  if ($dados_remember_me_1 != "") 
                  {
                      $this->remember_me_1[] = $dados_remember_me_1;
                  } 
              } 
              $this->remember_me = ""; 
              foreach ($this->remember_me_1 as $dados_remember_me_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->remember_me .= ";";
                   } 
                   $this->remember_me .= $dados_remember_me_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'remember_me';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_remember_me

    function ValidateField_new_user(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['new_user'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->new_user) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'new_user';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_new_user

    function ValidateField_retrieve_pswd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['retrieve_pswd'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->retrieve_pswd) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'retrieve_pswd';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_retrieve_pswd

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['login'] = $this->login;
    $this->nmgp_dados_form['pswd'] = $this->pswd;
    $this->nmgp_dados_form['remember_me'] = $this->remember_me;
    $this->nmgp_dados_form['new_user'] = $this->new_user;
    $this->nmgp_dados_form['retrieve_pswd'] = $this->retrieve_pswd;
    $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function ajax_return_values()
   {
          $this->ajax_return_values_login();
          $this->ajax_return_values_pswd();
          $this->ajax_return_values_remember_me();
          $this->ajax_return_values_new_user();
          $this->ajax_return_values_retrieve_pswd();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- login
   function ajax_return_values_login($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("login", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->login);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['login'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pswd
   function ajax_return_values_pswd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pswd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pswd);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pswd'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array(''),
              );
          }
   }

          //----- remember_me
   function ajax_return_values_remember_me($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("remember_me", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->remember_me);
              $aLookup = array();
              $this->_tmp_lookup_remember_me = $this->remember_me;

$aLookup[] = array(ofvirtual_pack_protect_string('1') => str_replace('<', '&lt;',ofvirtual_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_remember_me'] . "")));
$_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['Lookup_remember_me'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['remember_me']) && !empty($this->NM_ajax_info['select_html']['remember_me']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['remember_me']);
          }
          $this->NM_ajax_info['fldList']['remember_me'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-remember_me',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['remember_me']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['remember_me']['valList'][$i] = ofvirtual_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['remember_me']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['remember_me']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['remember_me']['labList'] = $aLabel;
          }
   }

          //----- new_user
   function ajax_return_values_new_user($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("new_user", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->new_user);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['new_user'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- retrieve_pswd
   function ajax_return_values_retrieve_pswd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("retrieve_pswd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->retrieve_pswd);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['retrieve_pswd'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
       $this->NM_ajax_info['summary_line'] = $this->getSummaryLine();
   } // ajax_add_parameters
//
function leer_fila($sql) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
     
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs_fila = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_fila = false;
          $this->rs_fila_erro = $this->Db->ErrorMsg();
      } 


    $fila = array();
    
    while(!$this->rs_fila->EOF)     {
        $fila = $this->coger_fila($this->rs_fila->fields);
         break;
   }
     
    $this->rs_fila->Close();
    unset ($this->rs_fila);
   return $fila;
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function select_escalar ($select) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  	

	 
      $nm_select = $select; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_escalar = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs_escalar[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_escalar = false;
          $this->rs_escalar_erro = $this->Db->ErrorMsg();
      } 

	
	$result = false;
	if (isset($this->rs_escalar[0][0]))   {  
		$result = $this->rs_escalar[0][0];
	}
		
	return $result;
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function coger_fila($array) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
	foreach ($array as $key => &$campo) {
		if(is_int($key))    {
        	unset($array[$key]);
    	}
	}
	
	return $array;
	

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function quitar_campos($array, $campos) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
	foreach ($campos as $campo) {
        unset($array["$campo"]);
	}
	return $array;
	

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function insertar_fila($tabla, $array) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
	$campos = implode(", ", array_keys($array));
	$valores = "'".implode("', '", array_values($array))."'";
	$insert_sql = "INSERT INTO $tabla ($campos) VALUES ($valores)";
    
     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                ofvirtual_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
	$id = $this->select_escalar("SELECT LAST_INSERT_ID();");
	return $id;
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function sql_connect_db () {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  

	$server = $_SESSION['scriptcase']['glo_servidor'];
	$database = $_SESSION['scriptcase']['glo_banco'];
	$user = $_SESSION['scriptcase']['glo_usuario'];
	$pass = decode_string($_SESSION['scriptcase']['glo_senha']);
	

	$result = "";
	
	$conexion = mysqli_connect($server,$user,$pass, $database);
	if (mysqli_connect_errno($conexion))  {	
		$result = "ERROR DE CONEXION: " . mysqli_connect_error();
		return $result;
  	} else {
		mysqli_autocommit($conexion, false);
		$result = $conexion;
	}
	
	
	return $result;

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function sql_close_db ($conexion) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  

	$result = mysqli_close (  $conexion );
	
	return $result;

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function sql_rollback ($conexion) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  

	$result = mysqli_rollback ($conexion);
	if ($result) {$result = $this->sql_close_db ($conexion);}
	
	return $result;

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function sql_commit ($conexion) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  

	$result = mysqli_commit ($conexion);
	if ($result) {$result = $this->sql_close_db ($conexion);}
	
	return $result;

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function exec_sql ($conexion, $sql) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  

		
	$result ="";
	if (! mysqli_query($conexion, $sql)) {
    	$result = "ERROR - " . mysqli_error($conexion); 
	}

	if ($result == ""){			
		$j = mysqli_warning_count($conexion); 
	
		if ($j > 0) { 
			$result = "Total de errores o avisos: $j - \n";
			$e = mysqli_get_warnings($conexion); 
			$j = min ($j, 10);	
			for ($i = 0; $i < $j; $i++) { 
				$result .= "$e->errno: $e->message\n";
				$e->next(); 
			} 
		} 
	}
	
	return $result;

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function validate_success($_group_id) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sett_session_expire)) {$this->sc_temp_sett_session_expire = (isset($_SESSION['sett_session_expire'])) ? $_SESSION['sett_session_expire'] : "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
if (!isset($this->sc_temp__mobile)) {$this->sc_temp__mobile = (isset($_SESSION['_mobile'])) ? $_SESSION['_mobile'] : "";}
  
	
	$sql = "SELECT 	app_name,
					priv_access, priv_insert, priv_delete, priv_update, priv_export, priv_print
			  FROM sec_groups_apps
			  WHERE group_id = $_group_id";


	 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 


	$arr_default = array(
						'access' => 'off',
						'insert' => 'off',
						'delete' => 'off',
						'update' => 'off',
						'export' => 'btn_display_off',
						'print'  => 'btn_display_off',
						);
	if ($this->rs !== false) {
		$arr_perm = array();
		while (!$this->rs->EOF) 	{
			$app = $this->rs->fields[0];

			if(!isset($arr_perm[$app])) 		{
			   $arr_perm[$app] = $arr_default;
			}
			if( $this->rs->fields[1] == 'Y') {
				$arr_perm[$app][ 'access' ] = 'on';
			}
			if($this->rs->fields[2] == 'Y') {
				$arr_perm[$app][ 'insert' ] = 'on';
			}
			if($this->rs->fields[3] == 'Y') {
				$arr_perm[$app][ 'delete' ] = 'on';
			}
			if($this->rs->fields[4] == 'Y') {
				$arr_perm[$app][ 'update' ] = 'on';
			}
			if($this->rs->fields[5] == 'Y') {
				$arr_perm[$app]['export'] =  'btn_display_on';
			}
			if($this->rs->fields[6] == 'Y') {
				$arr_perm[$app]['print'] =  'btn_display_on';
			}


			$this->rs->MoveNext();	
		}
		$this->rs->Close();

		foreach($arr_perm as $app => $perm) 	{
			$_SESSION['scriptcase']['sc_apl_seg'][$app] = $perm['access'];;

			$_SESSION['scriptcase']['sc_apl_conf'][$app]['insert'] = $perm['insert'];
			$_SESSION['scriptcase']['sc_apl_conf'][$app]['delete'] = $perm['delete'];
			$_SESSION['scriptcase']['sc_apl_conf'][$app]['update'] = $perm['update'];
			if ($perm['export'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['xls'] = 'on';
}
elseif ($perm['export'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['xls'] = 'off';
}
elseif ($perm['export'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['xls'] = 'on';
}
elseif ($perm['export'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['xls'] = 'off';
}
elseif ($perm['export'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']]['xls'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']] = 'xls';
}
;
			if ($perm['export'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['word'] = 'on';
}
elseif ($perm['export'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['word'] = 'off';
}
elseif ($perm['export'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['word'] = 'on';
}
elseif ($perm['export'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['word'] = 'off';
}
elseif ($perm['export'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']]['word'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']] = 'word';
}
;
			if ($perm['export'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['pdf'] = 'on';
}
elseif ($perm['export'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['pdf'] = 'off';
}
elseif ($perm['export'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['pdf'] = 'on';
}
elseif ($perm['export'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['pdf'] = 'off';
}
elseif ($perm['export'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']]['pdf'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']] = 'pdf';
}
;
			if ($perm['export'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['xml'] = 'on';
}
elseif ($perm['export'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['xml'] = 'off';
}
elseif ($perm['export'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['xml'] = 'on';
}
elseif ($perm['export'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['xml'] = 'off';
}
elseif ($perm['export'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']]['xml'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']] = 'xml';
}
;
			if ($perm['export'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['csv'] = 'on';
}
elseif ($perm['export'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['csv'] = 'off';
}
elseif ($perm['export'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['csv'] = 'on';
}
elseif ($perm['export'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['csv'] = 'off';
}
elseif ($perm['export'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']]['csv'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']] = 'csv';
}
;
			if ($perm['export'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['rtf'] = 'on';
}
elseif ($perm['export'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['rtf'] = 'off';
}
elseif ($perm['export'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['rtf'] = 'on';
}
elseif ($perm['export'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['rtf'] = 'off';
}
elseif ($perm['export'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']]['rtf'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']] = 'rtf';
}
;
			if ($perm['export'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['json'] = 'on';
}
elseif ($perm['export'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['json'] = 'off';
}
elseif ($perm['export'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['json'] = 'on';
}
elseif ($perm['export'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['json'] = 'off';
}
elseif ($perm['export'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']]['json'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']] = 'json';
}
;
			if ($perm['print'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['print'] = 'on';
}
elseif ($perm['print'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['print'] = 'off';
}
elseif ($perm['print'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['print'] = 'on';
}
elseif ($perm['print'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['print'] = 'off';
}
elseif ($perm['print'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['print']]['print'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['print']] = 'print';
}
;

		}
	}

	
	
	$ahora = date('Y-m-d H:i:s');
	$update_sql = "UPDATE sec_users SET UltimoAcceso = '$ahora'
						WHERE login = '$this->sc_temp_usr_login'";
	
     $nm_select = $update_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                ofvirtual_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


	$_mobile = false;
	if($this->is_mobile()) {
		$_mobile = true;
	}
	 if (isset($_mobile)) {$this->sc_temp__mobile = $_mobile;}
;


	$this->NM_gera_log_insert("User", 'login',  $this->Ini->Nm_lang['lang_login_ok'] );


	if($this->sc_temp_sett_session_expire != 'N'){
	}
if (isset($this->sc_temp__mobile)) { $_SESSION['_mobile'] = $this->sc_temp__mobile;}
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->sc_temp_sett_session_expire)) { $_SESSION['sett_session_expire'] = $this->sc_temp_sett_session_expire;}
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function seems_utf8($str){
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
    $length = strlen($str);
    for ($i=0; $i < $length; $i++) {
        $c = ord($str[$i]);
        if ($c < 0x80) $n = 0; # 0bbbbbbb
        elseif (($c & 0xE0) == 0xC0) $n=1; # 110bbbbb
        elseif (($c & 0xF0) == 0xE0) $n=2; # 1110bbbb
        elseif (($c & 0xF8) == 0xF0) $n=3; # 11110bbb
        elseif (($c & 0xFC) == 0xF8) $n=4; # 111110bb
        elseif (($c & 0xFE) == 0xFC) $n=5; # 1111110b
        else return false; # Does not match any model
        for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
            if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))
                return false;
        }
    }
    return true;

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function is_mobile() {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
	$uagent = strtolower( $_SERVER['HTTP_USER_AGENT']);
    if ( empty( $uagent ) ) {
        $is_mobile = false;
    } elseif ( strpos( $uagent, 'mobile' ) !== false 
        || strpos( $uagent, 'android' ) !== false
        || strpos( $uagent, 'silk/' ) !== false
        || strpos( $uagent, 'kindle' ) !== false
        || strpos( $uagent, 'blackberry' ) !== false
        || strpos( $uagent, 'opera mini' ) !== false
        || strpos( $uagent, 'opera mobi' ) !== false 
		|| strpos( $uagent, 'iphone' ) !== false 
		|| strpos( $uagent, 'ipod' ) !== false 			 
		) {
            $is_mobile = true;
    } else {
        $is_mobile = false;
    }
    return $is_mobile;

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function cifrar($simple_string) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
	$ciphering = "AES-128-CTR";

	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;

	$encryption_iv = '1234567891011121';

	$encryption_key = "QchJfjzLnsFZ1hqPN2bqH8FhHbWMtWEqmyFpHBIKQmI4pNj90iBiYgJ0i8MvFe3T";

	$encryption = openssl_encrypt($simple_string, $ciphering,
									$encryption_key, $options, $encryption_iv);

	return $encryption;	

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function descifrar($encryption) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
	
	$ciphering = "AES-128-CTR";

	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;

	$decryption_key = "QchJfjzLnsFZ1hqPN2bqH8FhHbWMtWEqmyFpHBIKQmI4pNj90iBiYgJ0i8MvFe3T";

	$decryption_iv = '1234567891011121';

	$decryption=openssl_decrypt ($encryption, $ciphering, 
			$decryption_key, $options, $decryption_iv);

	return $decryption;	

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function crear_permisos($_clave, $_identidad, $_dest_db='') {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
		
	switch ($_clave) {
    case 'E':								
        $_tabla = 'empresas';
		$_campoid = 'idempresa';
		$limitar_por_roles = '';
		$_limitar_por_identidad = '';
		if($_identidad > 0) {
			$_limitar_por_identidad = ' AND e.idempresa = $_identidad ';
		}
		$_valor_inicial = "if(s.Tipo=0 AND FIND_IN_SET('E', AplicarAGrupos) , -1 , s.DefaultValue)";
        break;
    case 'C':
        $_tabla = 'empresas_centros';
		$_campoid = 'idCentro';
		$limitar_por_roles = '';
		$_limitar_por_identidad = '';
		if($_identidad > 0) {
			$_limitar_por_identidad = ' AND e.idCentro = $_identidad ';
		}
		$_valor_inicial = "if(s.Tipo=0 AND FIND_IN_SET('E', AplicarAGrupos) , -1 , s.DefaultValue)";
			
        break;
    case 'D':
        $_tabla = 'empresas_departamentos';
		$_campoid = 'id_departamento';
		$limitar_por_roles = '';
		$_limitar_por_identidad = '';
		if($_identidad > 0) {
			$_limitar_por_identidad = ' AND e.id_departamento = $_identidad ';
		}
		$_valor_inicial = "if(s.Tipo=0 AND FIND_IN_SET('E', AplicarAGrupos) , -1 , s.DefaultValue)";
			
        break;
	case 'G':
	case 'T':
		$_tabla = 'empleados';
		$_campoid = 'idEmpleado';
		$limitar_por_roles = ' AND e.idEmpleado IN (SELECT idempleado
												 FROM sec_users u
												 INNER JOIN sec_users_groups ug ON ug.login = u.login
												 WHERE ug.group_id NOT IN (s.Excluir_sec_groups))';
		$_limitar_por_identidad = '';
		if($_identidad > 0) {
			$_limitar_por_identidad = ' AND e.idEmpleado = $_identidad ';
		}
		$_valor_inicial = "if(s.Tipo=0 AND (FIND_IN_SET('E', AplicarAGrupos) OR
								 					FIND_IN_SET('C', AplicarAGrupos) OR
													FIND_IN_SET('D', AplicarAGrupos)), -1 , s.DefaultValue)";
			
       
        break;
	}
	
	if(trim($_dest_db) != '') {
		$_dest_db = "$_dest_db.";
	}
	
     $nm_select ="INSERT IGNORE INTO $_dest_db sec_users_permisos ( Clave, idpermiso,  identidad,  si)  						SELECT   g.Clave as Clave, s.idPermiso, e.$_campoid+0 AS identidad, 								 $_valor_inicial AS inicial 						FROM $_dest_db sec_permisos s 						INNER JOIN $_dest_db sec_permisos_grupos g on FIND_IN_SET(g.Clave, s.AplicarAGrupos) 						CROSS   JOIN    $_dest_db $_tabla e 						WHERE  g.Clave IN ('$_clave') $_limitar_por_identidad   $limitar_por_roles							 						ORDER BY s.idPermiso"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                ofvirtual_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function get_permiso($idP, $u, $_clave, $sec_users_permisos, $db='') {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
	$db_qual = '';
	if (strlen($db) > 0) {
		$db_qual = "`$db`.";
	}
	
	$perm = $this->leer_fila("SELECT  p.idpermiso,  identidad, grupo,  permiso,  nombreinterno, tipo, u.clave, 
								tabla,  tablaid,  tablavalor,  tablawhere,  dependede, 
								coalesce(si, -1) as si,  
								if (valores='', 0, coalesce(valores, 0)) as valores, todos as todos,
								coalesce(u.caja1_valor,'') as caja1_valor,  coalesce(u.caja2_valor, '') as caja2_valor,  
								u.check_opcional,  u.check_email_empleado,  u.check_notif_empleado,  u.check_notif_admin
						FROM $db_qual sec_permisos p
						INNER JOIN $db_qual $sec_users_permisos u on p.idPermiso = u.idPermiso 
						WHERE p.idPermiso = $idP AND  u.identidad = '$u' and u.clave='$_clave' ");
 
	if (count($perm) > 0 ) {
		$perm['permiso_nombre'] 		= $perm['nombreinterno'];
		$perm['valores_todos'] 			= $perm['valores'];
		$perm['where'] 					= ' '.$perm['tablaid'].' IN ('.$perm['valores'].') ';
		$perm['todos'] 					= $perm['todos'];
		$perm['padre_where'] 			= '';
		$perm['xvalores']				= '';
		$perm['xvalores_todos']			= '';
		$perm['padre']					= '';
		$perm['padre_permiso']			= '';
		$perm['padre_tabla']			= '';
		$perm['padre_tablaid']			= '';
		$perm['padre_tablavalor']		= '';
		$perm['padre_tablawhere']		= '';
		$perm['padre_dependede']		= '';
		$perm['padre_valores'] 			= '0';
		$perm['padre_xvalores'] 		= '0';
		$perm['padre_where'] 			= '';

		$perm['select'] = "SELECT $db ".$perm['tablaid'].' AS idopcion, '. $perm['tablavalor'].' AS opcion FROM ' . $perm['tabla'];
		if (trim($perm['tablawhere']) != '') {
			$perm['select']  .= ' WHERE '.$perm['tablawhere'];
		}
		$perm 	= $this->permisos_get_xvalores($perm, $u, $_clave, $sec_users_permisos, $db);
	} else {
		$perm = array();
	}
	
	unset($perm['padre_tabla']);
	unset($perm['padre_tablaid']);
	unset($perm['padre_tablavalor']);
	unset($perm['padre_tablawhere']);
	unset($perm['padre_dependede']);
	unset($perm['padre_xvalores']);
	unset($perm['grupo']);
	unset($perm['permiso']);
	unset($perm['nombreinterno']);
	unset($perm['tipo']);
	unset($perm['valores_todos']);
	unset($perm['padre_where']);
	unset($perm['xvalores']);
	unset($perm['xvalores_todos']);
	unset($perm['padre']);
	unset($perm['xvalores']);
	unset($perm['xvalores_todos']);
	unset($perm['padre']);
	unset($perm['padre_permiso']);
	unset($perm['padre_valores']);
	unset($perm['select']);
	
	return $perm;
	
	
	

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function permisos_get_xvalores($perm, $u, $_clave, $sec_users_permisos, $db='') {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
	$db_qual = '';
	if (strlen($db) > 0) {
		$db_qual = "`$db`.";
	}

	$valores			= $perm['valores'];
	$tipo 				= $perm['tipo'];
	$idPadre			= $perm['dependede'];
	$select				= $perm['select'];
	$tabla				= $perm['tabla'];
	$tablaid			= $perm['tablaid'];
	$tablavalor			= $perm['tablavalor'];

	$xvalores 	= '';
	
	switch ($tipo) {
	case 1:
	case 2:
		$xvalores = $this->select_escalar("SELECT coalesce(GROUP_CONCAT(DISTINCT opcion	ORDER BY opcion SEPARATOR ' - ') , '')
										FROM $db_qual sec_permisos_opciones WHERE idopcion IN ($valores)  ");
		$perm['xvalores_todos'] = $xvalores;
		$perm['xvalores']		= $xvalores;
		break;
	case 3:
	case 4:
		$xvalores = $this->select_escalar("SELECT coalesce(GROUP_CONCAT(DISTINCT $tablavalor	ORDER BY $tablavalor SEPARATOR ' - ') , '')
										FROM $db_qual $tabla WHERE $tablaid IN ($valores)  ");
		$perm['xvalores_todos'] = $xvalores;
		$perm['xvalores']		= $xvalores;
			
		if ($idPadre > 0) {
			$padre = $this->leer_fila("SELECT  p.idpermiso,  identidad, clave,  permiso,  nombreinterno, tipo,  
										tabla,  tablaid,  tablavalor,  tablawhere,  dependede, si,  if (valores='', 0, coalesce(valores, 0)) as valores, todos AS todos
											FROM $db_qual sec_permisos p
											INNER JOIN $db_qual $sec_users_permisos u on p.idPermiso = u.idPermiso 
											WHERE p.idPermiso = $idPadre AND  u.identidad = '$u' and u.clave='$_clave' ");

			$valores_padre 				= $padre['valores'];
			$perm['padre_valores'] 		= $valores_padre;
			$campoidpadre 				= $padre['tablaid'];
			$tpadre						= $padre['tabla'];
			$campovpadre				= $padre['tablavalor'];
			$padre_seltodos				= $padre['todos'];
			
			$perm['padre']				= $padre['permiso'];
			$perm['padre_permiso']		= $padre['nombreinterno'];
			$perm['padre_tabla']		= $padre['tabla'];
			$perm['padre_tablaid']		= $padre['tablaid'];
			$perm['padre_tablavalor']	= $padre['tablavalor'];
			$perm['padre_tablawhere']	= $padre['tablawhere'];
			$perm['padre_dependede']	= $padre['dependede'];
			$perm['padre_valores'] 		= $padre['valores'];
			if ($padre_seltodos == 1) {
				$perm['padre_where'] 		= ' 1= 1 ';
				$perm['padre_xvalores'] 	= $this->select_escalar ("SELECT coalesce(GROUP_CONCAT(DISTINCT $campovpadre	ORDER BY $campovpadre SEPARATOR ' - ') , '')
																FROM $db_qual $tpadre 
																WHERE  1 = 1 ");
			} else {
				$perm['padre_where'] 		= ' '.$padre['tablaid'].' IN ('.$padre['valores'].') ';
				$perm['padre_xvalores'] 	= $this->select_escalar ("SELECT coalesce(GROUP_CONCAT(DISTINCT $campovpadre	ORDER BY $campovpadre SEPARATOR ' - ') , '')
																FROM $db_qual $tpadre 
																WHERE  $campoidpadre IN ($valores_padre) ");
			}
			
			
			$vpadre_sel   	= $this->select_escalar ("SELECT COALESCE(GROUP_CONCAT(DISTINCT $campoidpadre ),0) FROM $db_qual $tabla WHERE  $tablaid IN ($valores)");
			$vpadre_tod   	= $this->select_escalar ("SELECT COALESCE(GROUP_CONCAT(DISTINCT $campoidpadre ),0) FROM $db_qual $tabla 
												WHERE  $campoidpadre IN ($valores_padre) AND $campoidpadre NOT IN($vpadre_sel) ");

			
			
			
			$vtodos	= $perm['valores'].','.$this->select_escalar ("SELECT COALESCE(GROUP_CONCAT(DISTINCT $tablaid ),0) FROM $db_qual $tabla WHERE  $campoidpadre IN($vpadre_tod) ");
			$perm['valores_todos'] 	= $vtodos;
			if($perm['valores_todos']  == '0,0') {$perm['valores_todos'] = '0';}
			$perm['where'] 			= ' '.$perm['tablaid'].' IN ('.$perm['valores_todos'].') ';
			$perm['xvalores_todos'] 	= $this->select_escalar ("SELECT coalesce(GROUP_CONCAT(DISTINCT $tablavalor	ORDER BY $tablavalor SEPARATOR ' - ') , '')
															FROM $db_qual $tabla WHERE  $tablaid IN($vtodos) ");
			
		} 

		break;		
	}
	
	return $perm;

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function permiso_get_display_value ($idp, $u, $_clave, $tx, $sec_users_permisos, $db='') {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
	$db_qual = '';
	if (strlen($db) > 0) {
		$db_qual = "`$db`.";
	}
	
	$perm = $this->leer_fila ("SELECT  p.idpermiso,  tabla,  tablaid,  tablavalor,  tablawhere,  dependede, si,  
						if (valores='', 0, coalesce(valores, 0)) as valores
							FROM $db_qual sec_permisos p
							INNER JOIN $db_qual $sec_users_permisos u on p.idPermiso = u.idPermiso 
							WHERE p.idPermiso = $idp AND  u.identidad = '$u' and u.clave='$_clave' ");
	$valores			= $perm['valores'];
	$tabla				= $perm['tabla'];
	$tablaid			= $perm['tablaid'];
	$tablavalor			= $perm['tablavalor'];	
	
	if ($perm['dependede'] > 0) {
		$tx = $this->permiso_get_display_value ($perm['dependede'], $u, $_clave, $tx, $sec_users_permisos, $db);
	} 
	
	if 	($perm['valores'] != '0') {		
		$xvalores = $this->select_escalar("SELECT coalesce(GROUP_CONCAT(DISTINCT $tablavalor	ORDER BY $tablavalor 
														SEPARATOR ' - ') , '')
										FROM $db_qual $tabla WHERE $tablaid IN ($valores)  ");
		$tx[] = '<b>'.$perm['tabla'].'</b>: '.$xvalores;
	}
	
	return $tx;

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function permiso_get_select ($idp, $u, $_clave, $sec_users_permisos, $db='') {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
	$db_qual = '';
	if (strlen($db) > 0) {
		$db_qual = "`$db`.";
	}
	
	
	$tx = $this->get_permisos_tablas ($idp, $u, $_clave, array(), $sec_users_permisos, $db);
	$sel = array();
	$where = array();
	
	for ($i=0; $i< count($tx); $i++) {
		if ($i == 0) {
			$t 			= $tx[$i]['tab'];
			$ind 		= $tx[$i]['tid'];
			$sel[] = "SELECT DISTINCT $t.$ind AS $ind FROM $db_qual $t ";
		} else {
			$t 			= $tx[$i]['tab'];
			$t_ant 		= $tx[$i-1]['tab'];
			$ind 		= $tx[$i]['tid'];
			$ind_ant 	= $tx[$i-1]['tid'];
			$sel[] = "INNER JOIN $db_qual $t ON $t.$ind = $t_ant.$ind ";
		}
		
		if ($tx[$i]['val'] != '0') {
			$t 			= $tx[$i]['tab'];
			$ind 		= $tx[$i]['tid'];
			$val 		= $tx[$i]['val'];
			$where[] = " $t.$ind IN ($val) ";
		}
		
	}
	
	$select = implode(' ', $sel);
	if (count($where) > 0) {
		$where = " WHERE ".implode (' OR ', $where);
	} else {
		$where = '';
	}
	$select = $select.$where;
	return $select;

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function get_permisos_tablas ($idp, $u, $_clave, $tx, $sec_users_permisos, $db='') {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
	$db_qual = '';
	if (strlen($db) > 0) {
		$db_qual = "`$db`.";
	}
	
	
	$sql = "SELECT  p.idpermiso,  tabla,  tablaid,  tablavalor,  tablawhere,  dependede, si,  
						if (valores='', 0, coalesce(valores, 0)) as valores
							FROM $db_qual sec_permisos p
							INNER JOIN $db_qual  $sec_users_permisos u on p.idPermiso = u.idPermiso 
							WHERE p.idPermiso = $idp AND  u.identidad = '$u' and u.clave='$_clave' ";
	
	
	$perm = $this->leer_fila ($sql);
	$tab = array();
	$tab['tab'] = $perm['tabla'];
	$tab['tid'] = $perm['tablaid'];
	$tab['val'] = $perm['valores'];
	$tx[] = $tab;
	
	if ($perm['dependede'] > 0) {
		
		$tx = $this->get_permisos_tablas ($perm['dependede'], $u, $_clave, $tx, $sec_users_permisos, $db) ;
	}
	return $tx;
	
	

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function get_nombre_interno($p) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
	$p = strtolower($this->remove_accents($p));
	$p = str_replace(' ', '-', $p); 				
    $p = preg_replace('/[^A-Za-z0-9\-]/', '', $p); 	
	$p = preg_replace('/-+/', '-',$p);				
	return $p;

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function acceso_permitido($id, $permiso) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
	if (! isset($permiso)) {return false;}
	if ($permiso['todos'] == 1) {return true;}
	
	$todos 	= ','.$permiso['valores_todos'].',';
	$xid	= ','.$id.',';
	
	if (strpos($todos, $xid) !== false) {
		return true;
	} else {
		return false;
	} 

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
function remove_accents($string) {
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
  
    if ( !preg_match('/[\x80-\xff]/', $string) )
        return $string;

    if ($this->seems_utf8($string)) {
        $chars = array(
        chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
        chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
        chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
        chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
        chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
        chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
        chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
        chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
        chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
        chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
        chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
        chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
        chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
        chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
        chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
        chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
        chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
        chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
        chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
        chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
        chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
        chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
        chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
        chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
        chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
        chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
        chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
        chr(195).chr(191) => 'y',
        chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
        chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
        chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
        chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
        chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
        chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
        chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
        chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
        chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
        chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
        chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
        chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
        chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
        chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
        chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
        chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
        chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
        chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
        chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
        chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
        chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
        chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
        chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
        chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
        chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
        chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
        chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
        chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
        chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
        chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
        chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
        chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
        chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
        chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
        chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
        chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
        chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
        chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
        chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
        chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
        chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
        chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
        chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
        chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
        chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
        chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
        chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
        chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
        chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
        chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
        chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
        chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
        chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
        chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
        chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
        chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
        chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
        chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
        chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
        chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
        chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
        chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
        chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
        chr(197).chr(190) => 'z', chr(197).chr(191) => 's',
        chr(226).chr(130).chr(172) => 'E',
        chr(194).chr(163) => '');

        $string = strtr($string, $chars);
    } else {
        $chars['in'] = chr(128).chr(131).chr(138).chr(142).chr(154).chr(158)
            .chr(159).chr(162).chr(165).chr(181).chr(192).chr(193).chr(194)
            .chr(195).chr(196).chr(197).chr(199).chr(200).chr(201).chr(202)
            .chr(203).chr(204).chr(205).chr(206).chr(207).chr(209).chr(210)
            .chr(211).chr(212).chr(213).chr(214).chr(216).chr(217).chr(218)
            .chr(219).chr(220).chr(221).chr(224).chr(225).chr(226).chr(227)
            .chr(228).chr(229).chr(231).chr(232).chr(233).chr(234).chr(235)
            .chr(236).chr(237).chr(238).chr(239).chr(241).chr(242).chr(243)
            .chr(244).chr(245).chr(246).chr(248).chr(249).chr(250).chr(251)
            .chr(252).chr(253).chr(255);

        $chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";

        $string = strtr($string, $chars['in'], $chars['out']);
        $double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254));
        $double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');
        $string = str_replace($double_chars['in'], $double_chars['out'], $string);
    }

    return $string;

$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              ofvirtual_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
      { 
          $nm_saida_global = $_SESSION['scriptcase']['nm_sc_retorno']; 
      } 
    if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
    $_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_new_user = $this->new_user;
    $original_retrieve_pswd = $this->retrieve_pswd;
}
if (!isset($this->sc_temp__rh_css)) {$this->sc_temp__rh_css = (isset($_SESSION['_rh_css'])) ? $_SESSION['_rh_css'] : "";}
  echo $this->sc_temp__rh_css;


$this->nmgp_cmp_hidden["new_user"] = 'off'; $this->NM_ajax_info['fieldDisplay']['new_user'] = 'off';
$this->nmgp_cmp_hidden["retrieve_pswd"] = 'off'; $this->NM_ajax_info['fieldDisplay']['retrieve_pswd'] = 'off';
if (isset($this->sc_temp__rh_css)) { $_SESSION['_rh_css'] = $this->sc_temp__rh_css;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_new_user != $this->new_user || (isset($bFlagRead_new_user) && $bFlagRead_new_user)))
    {
        $this->ajax_return_values_new_user(true);
    }
    if (($original_retrieve_pswd != $this->retrieve_pswd || (isset($bFlagRead_retrieve_pswd) && $bFlagRead_retrieve_pswd)))
    {
        $this->ajax_return_values_retrieve_pswd(true);
    }
}
$_SESSION['scriptcase']['ofvirtual']['contr_erro'] = 'off'; 
    }
    if (!empty($this->Campos_Mens_erro)) 
    {
        $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
    }
    $this->nm_guardar_campos();
    $this->nm_formatar_campos();
        $this->initFormPages();
    $login = $this->login;
    $pswd = $this->pswd;
    $remember_me = $this->remember_me;
    $new_user = $this->new_user;
    $retrieve_pswd = $this->retrieve_pswd;
    header("X-XSS-Protection: 1; mode=block");
    header("X-Frame-Options: SAMEORIGIN");
    include_once("ofvirtual_form_user.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $keywords = preg_quote($this->nmgp_arg_fast_search, '/');
            $result = preg_replace('/'. $keywords .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_remember_me()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_remember_me'] . "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              ofvirtual_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_ofvirtual = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['total'] = $qt_geral_reg_ofvirtual;
      $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          ofvirtual_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          ofvirtual_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="", $tp_unaccent=false)
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_accent = $this->Ini->Nm_accent_no;
      if ($tp_unaccent) {
          $Nm_accent = $this->Ini->Nm_accent_yes;
      }
      
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR(255))";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'" . $Nm_accent['arg_i'] . sc_sql_escape($this->Ini->nm_tpbanco, $campo) . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'] . $_SESSION['sc_session']['sc_sql_escape'];
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . sc_sql_escape($this->Ini->nm_tpbanco, $campo) . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'] . $_SESSION['sc_session']['sc_sql_escape'];
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . " not" . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . sc_sql_escape($this->Ini->nm_tpbanco, $campo) . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'] . $_SESSION['sc_session']['sc_sql_escape'];
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "ofvirtual_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['nm_run_menu'] = 2;
       $nmgp_saida_form = "ofvirtual_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['redir_target_name']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['redir_target_name'])
       {
           $sTarget = $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['redir_target_name'];
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['redir_target_name']);
       }
       else
       {
           $sTarget = '_self';
       }
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       ofvirtual_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/grp__NM__img__NM__hdt30x30.jpg">
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           ofvirtual_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       }
       ofvirtual_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
   if ($nm_target == "_blank")
   {
?>
<form name="Fredir" method="post" target="_blank" action="<?php echo $nm_apl_dest; ?>">
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
</form>
<script type="text/javascript">
setTimeout(function() { document.Fredir.submit(); }, 250);
</script>
<?php
    return;
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/grp__NM__img__NM__hdt30x30.jpg">
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<?php
   }
?>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
   </BODY>
   </HTML>
<?php
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "ok":
                return array("sub_form_b.sc-unique-btn-1");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-header">
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo ""; } else { echo "Login"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"></div>
</div>
    </td></tr>
<?php
    }

    function displayAppFooter()
    {
    }

    function displayAppToolbars()
    {
        return true;
    } // displayAppToolbars

    function displayTopToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayTopToolbar

    function displayBottomToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayBottomToolbar

    function getSummaryLine()
    {
        $summaryLine = "[" . $this->Ini->Nm_lang['lang_othr_smry_info_simp'] . "]";
        $summaryLine = str_replace(
            [
                '?final?',
                '?total?',
            ],
            [
                $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['reg_start'] + 1,
                $_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['total'] + 1,
            ],
            $summaryLine
        );

        return $summaryLine;
    } // getSummaryLine

    function scGetColumnOrderRule($fieldName, &$orderColName, &$orderColOrient, &$orderColRule)
    {
        $sortRule = 'nosort';
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['ofvirtual']['ordem_ord'] == " desc") {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
                $orderColRule = $sortRule = 'desc';
            } else {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
                $orderColRule = $sortRule = 'asc';
            }
        }
        return $sortRule;
    }

    function scGetColumnOrderIcon($fieldName, $sortRule)
    {        if ('desc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } elseif ('asc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } elseif ('' != $this->Ini->Label_sort) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } else {
            return '';
        }
    }

    function scIsFieldNumeric($fieldName)
    {
        switch ($fieldName) {
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            default:
                return 'asc';
        }
        return 'asc';
    }
}
?>
