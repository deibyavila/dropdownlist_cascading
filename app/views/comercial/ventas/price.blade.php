@extends ('admin/layout')

@section ('title') Detalles de Usuarios @stop

@section ('content')

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	
	<tr><td align="center">
	
	<input type="hidden" name="hd_id_modulo" id="hd_id_modulo" value="<?php echo $im;?>">		<?php cabezote("../../",$im);?>
	</td></tr>
	
	<tr>
	<td height="450" align="center" valign="top" bgcolor="#FFFFFF">
	
	<!-- CONTENIDO -->
	
	<input type="hidden" name="hd_nit_cliente" id="hd_nit_cliente" value="<?php if (isset($_POST['nit_cliente'])) echo $_POST['nit_cliente'];?>" >
	
		
	<input type="hidden" name="nit_en_dms" id="nit_en_dms" value="<?php if ($nit_cli_dms!="") echo "si"; else echo "no";?>">
	<table width="955" border="0" cellpadding="0" cellspacing="0" class="letra0">
	<tr>
	<td valign="top">
	
	<table width="100%" border="0" class="letra4n">
	<tr>
	<td width="1%" height="10" align="left"><img src="../../imagenes/v1.jpg" width="7" height="12" /></td>
	<td width="99%" align="left">Crear Cotizaci&oacute;n</td>
	</tr>
	</table>
	
	<table width="100%" border="0" class="letra1"><tr><td height="10" align="center"></td></tr></table>
	
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="letra1">
          <tr>
            <td width="19%" height="20" align="center" background="../../imagenes/e2.jpg"><strong><font color="#FFFFFF">Datos de la Cotizaci&oacute;n </font></strong></td>
            <td width="38%" align="left"><img src="../../imagenes/e1.jpg" width="20" height="20" /></td>
            <td width="43%" align="right">(*) Campos Obligatorios </td>
          </tr>
        </table>
	<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="tabla1">
	<tr>
	<td height="18" align="left" class="td1tabla1">
	
	
	<table width="100%" border="0" cellpadding="0" class="tabla1">
	<tr>
	<td width="16%" height="22" class="td2tabla1"><font color="#000000">*<strong> TIPO DE COTIZACION</strong></font></td>
	<td width="17%" class="td2tabla1">
	<?php
	$num_tipo_coti=2;
	$mat_tipo_coti[0]["id_tipo_coti"]=1; $mat_tipo_coti[0]["nom_tipo_coti"]="AUTOMÓVILES";
	$mat_tipo_coti[1]["id_tipo_coti"]=2; $mat_tipo_coti[1]["nom_tipo_coti"]="COMERCIALES";
	cargar_combo("recargable",$num_tipo_coti,$mat_tipo_coti,"id_tipo_coti","nom_tipo_coti","cmb_tipo_cotizacion","form1","crear_cotizacion.php","_self","combo1","","si","nor");
	?></td>
	<td width="15%" class="td2tabla1">
	<?php
	if ( (isset($_POST['cmb_tipo_cotizacion'])) and ($_POST['cmb_tipo_cotizacion']!="") )
	{
	?>*<strong> Fuente Prospecto </strong><?php
	}
	?>	</td>
	<td width="30%" class="td2tabla1">
	<?php
	if ( (isset($_POST['cmb_tipo_cotizacion'])) and ($_POST['cmb_tipo_cotizacion']!="") )
	{
	list($num_fuentes,$mat_fuentes)=consultar_fuentes_prospecto($conexion,array("tc"=>1));
	cargar_combo("sencillo",$num_fuentes,$mat_fuentes,"id","descripcion","cmb_fuentes_prospecto","form1","crear_cotizacion.php","_self","combo1","","si","nor");
	}
	?>	</td>
	<td width="13%" class="td2tabla1">
	<?php
	if ( (isset($_POST['cmb_tipo_cotizacion'])) and ($_POST['cmb_tipo_cotizacion']!="") )
	{
	?><strong>*&nbsp;Fecha Cotizaci&oacute;n </strong><?php
	}
	?>	</td>
	<td width="9%" class="td2tabla1">
	<?php
	if ( (isset($_POST['cmb_tipo_cotizacion'])) and ($_POST['cmb_tipo_cotizacion']!="") )
	{
	?>
	<input type="hidden" name="txtFecha1" id="txtFecha1" value="<?php echo date("Y-m-d");?>">
	<?php echo date("d/m/Y");?>
	<?php
	}
	?>
	<?php
	/*if ( (isset($_POST['cmb_tipo_cotizacion'])) and ($_POST['cmb_tipo_cotizacion']!="") )
	{
	?>
	<input name="txtFecha1" type="text" class="caja1" id="txtFecha1" value="<?php if (isset($_POST['txtFecha1'])) echo $_POST['txtFecha1'];?>" size="10">
	<script language="JavaScript" type="text/javascript">calendar = new dynCalendar('calendar', 'fecha1','../../calendario/cal_imagenes/');</script>
	<?php
	}
	*/
	?>
	</td>
	</tr>
	</table>
	<table width="100%" border="0" class="letra1">
	<tr>
	<td height="10" align="center"></td>
	</tr>
	</table>
	
	<?php
	if ( (isset($_POST['cmb_tipo_cotizacion'])) and ($_POST['cmb_tipo_cotizacion']!="") )
	{
	?>	
	<input type="hidden" id="hd_tipo_cotizacion" name="hd_tipo_cotizacion" value="<?php echo $_POST['cmb_tipo_cotizacion'];?>">
	<table width="100%" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="tabla2" style="border-collapse:collapse;">
	<tr>
	  <TD height="22" align="center" bgcolor="<?php echo $mat_colores[0]["color6"];?>"><strong><FONT color="#000000">INFORMACION DEL CLIENTE</FONT></strong></TD>
	</tr>
	<tr>
	<TD>
	
	<table width="100%" border="0" class="letra1">
	  <tr>
	<td height="10" align="center"></td>
	  </tr>
	</table>
	<table width="98%" border="0" align="center" class="tabla1" style="border-collapse:collapse;">
	<tr>
	<td width="11%" height="22" class="td2tabla1">* C&eacute;dula</td>
	<td width="19%" class="td2tabla1"><input name="nit_cliente" type="text" class="caja1" id="nit_cliente" onBlur="document.form1.target='_self'; document.form1.action='crear_cotizacion.php'; document.form1.submit();" value="<?php if ($cliente!='') {echo $cliente;}?>" size="20"></td>
	<td width="9%" class="td2tabla1">* Nombre</td>
	<td width="33%" class="td2tabla1">
	<input name="txtnombre" type="text" class="caja1" id="txtnombre" value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txtnombre']; else echo $nombre_cli;?>" size="45" />
	<input type="hidden" name="hdnombre" id="hdnombre" value="<?php if ($_POST['hd_nit_cliente']!=$_POST['nit_cliente']) echo $nombre_cli; else echo $_POST['hdnombre'];?>">
	</td>
	<td width="11%" class="td2tabla1">&nbsp;</td>
	<td width="17%" class="td2tabla1">&nbsp;</td>
	</tr>
	<tr>
	<td height="22" class="td2tabla1">* Ciudad</td>
	<td class="td2tabla1">
	<input name="txtciudad" type="text" class="caja1" id="txtciudad" value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txtciudad']; else echo $ciudad_cli;?>" size="20">
	<input type="hidden" name="hdciudad" id="hdciudad" value="<?php if ($_POST['hd_nit_cliente']!=$_POST['nit_cliente']) echo $ciudad_cli; else echo $_POST['hdciudad'];?>">
	</td>
	<td class="td2tabla1"> &nbsp;&nbsp;Direcci&oacute;n</td>
	<td class="td2tabla1">
	<input name="txtdireccion" type="text" class="caja1" id="txtdireccion" value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txtdireccion']; else echo $direccion_cli;?>" size="45">
	<input type="hidden" name="hddireccion" id="hddireccion" value="<?php if ($_POST['hd_nit_cliente']!=$_POST['nit_cliente']) echo $direccion_cli; else echo $_POST['hddireccion'];?>">
	</td>
	<td class="td2tabla1">&nbsp;&nbsp;Tel&eacute;fono Fijo</td>
	<td class="td2tabla1">
	<input name="txttelefono" type="text" class="caja1" id="txttelefono"value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txttelefono']; else  echo $telefono_cli;?>" size="25" />
	<input type="hidden" name="hdtelefono" id="hdtelefono" value="<?php if ($_POST['hd_nit_cliente']!=$_POST['nit_cliente']) echo $telefono_cli; else echo $_POST['hdtelefono'];?>">
	</td>
	</tr>
	<tr>
	<td height="22" class="td2tabla1">* Celular</td>
	<td class="td2tabla1">
	<input name="txtcelular" type="text" class="caja1" id="txtcelular"  value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txtcelular']; else  echo $celular_cli;?>" size="20" />
	<input type="hidden" name="hdcelular" id="hdcelular" value="<?php if ($_POST['hd_nit_cliente']!=$_POST['nit_cliente']) echo $celular_cli; else echo $_POST['hdcelular'];?>">
	</td>
	<td class="td2tabla1">* Email</td>
	<td class="td2tabla1">
	<input name="txtcorreo" type="text" class="caja1" id="txtcorreo" value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txtcorreo']; else  echo $email_cli;?>"  size="35" />
	<input type="hidden" name="hdcorreo" id="hdcorreo" value="<?php if ($_POST['hd_nit_cliente']!=$_POST['nit_cliente']) echo $email_cli; else echo $_POST['hdcorreo'];?>">
	</td>
	<td class="td2tabla1"><strong>*&nbsp;TIPO CLIENTE </strong></td>
	<td class="td2tabla1"><?php
	list($num_tipos_cli,$mat_tipos_cli)=consultar_tipos_cliente_cotizacion($conexion,array("tc"=>1));
	cargar_combo("sencillo",$num_tipos_cli,$mat_tipos_cli,"id_tipo_cliente","nom_tipo_cliente","cmb_tipos_cliente","form1","crear_cotizacion.php","_self","combo1","","si","nor");
	?></td>
	</tr>
	<tr>
	  <td height="22" class="td2tabla1">
	* <?php
	if ((isset($_POST['cmb_tipo_cotizacion']))and($_POST['cmb_tipo_cotizacion']==1)) echo "Perfil Cliente";
	elseif ((isset($_POST['cmb_tipo_cotizacion']))and($_POST['cmb_tipo_cotizacion']==2)) echo "Act. Económica";
	else echo "";	
	?>	  
	</td>
	  <td colspan="5" class="td2tabla1">
	  	<?php
	if ($_POST['cmb_tipo_cotizacion']==1) 
	{
	//Consultar perfiles de cliente
	list($num_perfiles,$mat_perfiles)=consultar_perfiles_de_cliente($conexion,array("tc"=>1));
	cargar_combo("sencillo",$num_perfiles,$mat_perfiles,"id_perfil","nom_perfil","cmb_perfiles_cliente","form1","crear_cotizacion.php","_self","combo1","","si","nor");
	
	}
	elseif($_POST['cmb_tipo_cotizacion']==2)
	{
	//Consultar perfiles de cliente
	list($num_actividades_econ,$mat_actividades_econ)=consultar_actividades_economicas($conexion,array("tc"=>1));
	cargar_combo("sencillo",$num_actividades_econ,$mat_actividades_econ,"id_act_econ","nom_act_economica","cmb_actividades_economicas","form1","crear_cotizacion.php","_self","combo1","","si","nor");
	}
	else echo "";	
	?>	  </td>
	  </tr>
	</table>
	
	<table width="100%" border="0" class="letra1">
                  <tr>
                    <td height="10" align="center"></td>
                  </tr>
                </table></TD>
	</tr>
	</table>
	
	
	<table width="100%" border="0" class="letra1">
	<tr>
	  <td height="20" align="center"></td>
	</tr>
	</table>
	
	
	
	
	
	<?php
	//HISTORIA DE COTIZACIONES
	if ( (isset($_POST['nit_cliente'])) and ($_POST['nit_cliente']!="") )
	{
	//Consultar historial de cotizaciones del cliente
	list($num_coti_hist,$mat_coti_hist)=consultar_cotizaciones($conexion,array("tc"=>3,"campos"=>"ct.*, mv.descripcion as nom_modelo, t.descripcion as nom_tipo_vehiculo, pl.nom_plan, 
	   	ter.nombres as nom_asesor", "cli_cedula"=>$_POST['nit_cliente']));
	
	
	//Consutlar ultimo vehiculo comprado
	list($num_vh_comprados,$mat_vh_comprados)=consultar_compras_cliente($conexion,array("tc"=>1,"campos"=>" asesor=vendedor,vehiculo=descripcion ","nit"=>$_POST['nit_cliente'],"ordenar_por"=>" fecha DESC "));
	
	?>
	<table width="100%" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="tabla2" style="border-collapse:collapse;">
	<tr>
	<td height="22" align="center" bgcolor="<?php echo $mat_colores[0]["color6"];?>">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td width="57%" align="right"><strong><font color="#000000">HISTORIAL DEL CLIENTE</font></strong></td>
	<td width="43%" align="right" valign="middle">
	<div id="div_historia_mostrar" style="display:block;"><a class="enlace4" href="#" onclick="document.getElementById('div_historia').style.display='block'; document.getElementById('div_historia_ocultar').style.display='block'; document.getElementById('div_historia_mostrar').style.display='none';">Ver Historial</a>&nbsp;&nbsp;&nbsp;</div>
	<div id="div_historia_ocultar" style="display:none;"><a class="enlace4" href="#" onclick="document.getElementById('div_historia').style.display='none';  document.getElementById('div_historia_ocultar').style.display='none';  document.getElementById('div_historia_mostrar').style.display='block';">Ocultar Historial</a>&nbsp;&nbsp;&nbsp;</div>
	</td>
	</tr>
	</table>	  
	
	</td>
	</tr>
	<tr>
	<td>

	<input type="hidden" name="hd_id_cotizacion_hist" id="hd_id_cotizacion_hist" value="">
	<table width="100%" border="0" class="letra1">
	<tr>
	<td height="10" align="center"></td>
	</tr>
	</table>
	
	  <div id="div_historia" style="display:none;">
	  <table width="98%" border="0" align="center" class="letra1">
                    <tr>
                      <td height="10" align="center" valign="top">
	  
	  	<table width="100%" align="center" cellpadding="0" cellspacing="0" class="tabla2" bordercolor="#cccccc" style="border-collapse:collapse;">
	<tr bgcolor="<?php echo $mat_colores[0]["color6"];?>">
	  <td height="18" colspan="6" align="center"><strong>LISTADO DE COTIZACIONES</strong></td>
	  </tr>
	<tr bgcolor="<?php echo $mat_colores[0]["color6"];?>">
	<td width="8%" align="center" class="td2tabla2"><strong>Fecha</strong></td>
	<td width="27%" align="center" class="td2tabla2"><strong>Veh&iacute;culo Cotizado </strong></td>
	<td width="24%" align="center" class="td2tabla2"><strong>Asesor / Sucursal </strong></td>
	<td width="14%" align="center" class="td2tabla2"><strong>Valor Veh&iacute;culo</strong></td>
	<td width="18%" align="center" class="td2tabla2"><strong>Plan</strong></td>
	<!--<td width="9%" align="center" class="td2tabla2"><strong>Seguimiento</strong></td>-->
	<td width="9%" align="center" class="td2tabla2"><strong>Ult. Llamada</strong></td>
	</tr>
	<?php
	if($num_coti_hist>0)
	{
	for($h=0; $h<$num_coti_hist; $h++)
	{
	if (isset($num_ase)) unset($num_ase); if (isset($mat_ase)) unset($mat_ase); 
	list($num_ase,$mat_ase)=consultar_bodega_y_datos_tercero($conexion,array("tc"=>1,"nit"=>$mat_coti_hist[$h]["nit_asesor"]));
	
	//Consultar datos del cliente
	if (isset($num_seg)) unset($num_seg); if (isset($mat_seg)) unset($mat_seg); 
	//ConsulTar seguimeinto
	list($num_seg,$mat_seg)=consultar_seguimiento_cotizaciones($conexion,array("tc"=>2,"id_cotizacion"=>$mat_coti_hist[$h]["id_cot"],"ordenar_por"=>" fecha_llamada DESC "));
	
	?>
	<tr>
	<td align="center" class="td2tabla2"><?php echo formato_fecha("guion_a_slashes_dia_mes_ano",$mat_coti_hist[$h]["fecha_cot"]);?></td>
	<td align="center" class="td2tabla2"><?php echo $mat_coti_hist[$h]["nom_modelo"];?></td>
	<td align="center" class="td2tabla2"><em><?php echo $mat_coti_hist[$h]["nom_asesor"];?></em><?php if ($mat_ase[0]["nom_bodega"]!="") { echo "<br><em>(".$mat_ase[0]["nom_bodega"].")</em>"; } ?></td>
	<td align="center" class="td2tabla2">$<?php echo number_format($mat_coti_hist[$h]["vh_valor"],0,'','.');?></td>
	<td align="center" class="td2tabla2"><?php echo $mat_coti_hist[$h]["nom_plan"];?></td>
	<!--<td align="center" class="td2tabla2"><a class="enlace4" href="#" onclick="document.getElementById('hd_id_cotizacion_hist').value=<?php echo $mat_coti_hist[$h]["id_cot"];?>; document.form1.action='historial_seg_cotizacion.php'; document.form1.target='_blank'; document.form1.submit();">Seguimiento</a></td>-->
	<td align="center" class="td2tabla2"><?php if ((isset($mat_seg[0]["fecha_llamada"]))and($mat_seg[0]["fecha_llamada"]!="")) echo formato_fecha("guion_a_slashes_dia_mes_ano",$mat_seg[0]["fecha_llamada"]); else echo "&nbsp;";?></td>
	</tr>
	<?php
	}
	}
	else
	{
	?>
	<tr>
	<td align="center" colspan="6" height="30" class="td2tabla2">:: El cliente NO ha realizado Cotizaciones ::</td>
	</tr>
	<?php
	}
	?>	
	</table>	
	</td>
                    </tr>
                    <tr>
                      <td height="20" align="center" valign="top">&nbsp;</td>
                      </tr>
                    <tr>
                    <td height="10" align="center" valign="top">
	
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="tabla2" style="border-collapse:collapse;">
	<tr bgcolor="<?php echo $mat_colores[0]["color6"];?>">
	<td height="18" colspan="2" align="center"><strong>VEHICULOS COMPRADOS</strong></td>
	</tr>
	<tr bgcolor="<?php echo $mat_colores[0]["color6"];?>">
	<td width="50%" align="center" class="td2tabla2"><strong>Vehiculo Comprado </strong></td>
	<td width="50%" align="center" class="td2tabla2"><strong>Asesor</strong></td>
	</tr>
	<?php
	if ($num_vh_comprados>0)
	{
	for($v=0; $v<$num_vh_comprados; $v++)
	{
	?>
	<tr>
	<td align="center" class="td2tabla2"><?php echo $mat_vh_comprados[$v]["vehiculo"];?></td>
	<td align="center" class="td2tabla2"><em><?php echo $mat_vh_comprados[$v]["asesor"];?></em></td>
	</tr>
	<?php
	}
	}
	else
	{
	?>
	<tr>
	<td align="center" colspan="2" class="td2tabla2" height="30">:: El cliente NO ha comprado ningún vehículo ::</td>
	</tr>
	<?php
	}
	?>	
	</table>	
	</td>
                    </tr>
                  </table>
	  </div>
	  
	<table width="100%" border="0" class="letra1">
	<tr>
	<td height="10" align="center"></td>
	</tr>
	</table>
	
	
	</td>
	</tr>
	</table>
	<table width="100%" border="0" class="letra1">
	<tr>
	<td height="20" align="center"></td>
	</tr>
	</table>
	<?php
	}
	?>
	
	
	<table width="100%" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="tabla2" style="border-collapse:collapse;">
	<tr>
	  <td height="22" align="center" bgcolor="<?php echo $mat_colores[0]["color6"];?>"><strong><FONT color="#000000">INFORMACION DEL VEHICULO DE INTERES</FONT></strong></td>
	</tr>
	<tr>
	  <td>
	<table width="100%" border="0" class="letra1"><tr><td height="10" align="center"></td></tr></table>
	
	<table width="98%" border="0" align="center" class="tabla1" style="border-collapse:collapse;">
	<tr>
	<td width="13%" height="24" class="td2tabla1">* Veh&iacute;culo Cotizado </td>
	<td width="56%" class="td2tabla1">
	<?php
	if ($_POST['cmb_tipo_cotizacion']==1) $cad_tipos="'A','B'";
	elseif ($_POST['cmb_tipo_cotizacion']==2) $cad_tipos="'C','D'";
	
	//Consultar tipos de vehiculo
	list($num_tipos_vehiculo,$mat_tipos_vehiculo)=consultar_tipo_modelo($conexion,array("tc"=>1,"tipo_in"=>$cad_tipos));
	cargar_combo("recargable",$num_tipos_vehiculo,$mat_tipos_vehiculo,"tipo","descripcion","cmb_tipos_vehiculo","form1","crear_cotizacion.php","_self","combo1","","si","may");
	?>
	<?php
	//Consultar modelos de vehiculo
	if ((isset($_POST['cmb_tipos_vehiculo']))and($_POST['cmb_tipos_vehiculo']!=""))
	  list($num_modelos,$mat_modelos)=consultar_modelos_vehiculo($conexion,array("tc"=>1,"descontinuado"=>"N","marca"=>'010',"tipo"=>$_POST['cmb_tipos_vehiculo'],"ordenar_por"=>" mv.descripcion "));
	else { $num_modelos=0; $mat_modelos=""; }
	
	cargar_combo("recargable",$num_modelos,$mat_modelos,"modelo","descripcion","cmb_modelos_vehiculo","form1","crear_cotizacion.php","_self","combo1","","si","may");
	?>	</td>
	<td class="td2tabla1">* Modelo</td>
	<td class="td2tabla1"><?php
	if ( (isset($_POST['cmb_modelos_vehiculo'])) and ($_POST['cmb_modelos_vehiculo']!="") )
	list($num_anos,$mat_anos)=consultar_modelos_vehiculo($conexion,array("tc"=>2,"modelo"=>$_POST['cmb_modelos_vehiculo']));
	else {$num_anos=0; $mat_anos="";}
	cargar_combo("sencillo",$num_anos,$mat_anos,"ano","ano","cmb_anos","form1","crear_cotizacion.php","_self","combo1","","si","may");
	?></td>
	</tr>
	<tr>
	<td height="24" class="td2tabla1">* Plan</td>
	<td class="td2tabla1">
	
	<?php
	if ( (isset($_POST['cmb_planes'])) and ($_POST['cmb_planes']!="") )
	{
	list($num_plan,$mat_plan)=consultar_planes($conexion,array("tc"=>1,"id_plan"=>$_POST['cmb_planes']));
	$consulta_precio_de=$mat_plan[0]["consulta_precio_de"];
	
	if ($consulta_precio_de==1) 
	{
	list($num_lista_precios,$mat_lista_precios)=consultar_planes($conexion,array("tc"=>1,"id_plan"=>$_POST['cmb_planes']));
	if($num_lista_precios>0) $lista_precios=$mat_lista_precios[0]["lista_precios"];
	else $lista_precios="";
	}
	else
	$lista_precios="";
	}
	else $lista_precios="";
	?>
	
	<?php
	//Consultar planes de compra
	list($num_planes,$mat_planes)=consultar_planes($conexion,array("tc"=>1));
	cargar_combo("recargable",$num_planes,$mat_planes,"id_plan","nom_plan","cmb_planes","form1","crear_cotizacion.php","_self","combo1","","si","may");
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php
	if ($lista_precios!="") { ?><a class="enlace4" href="<?php echo "listas_precios/".$lista_precios;?>" target="_blank">Ver Lista de Precios</a><?php }
	?>	</td>
	<td width="13%" class="td2tabla1">* Valor del Veh&iacute;culo</td>
	<td width="18%" class="td2tabla1">
	<input name="txt_valor_vh" type="text" class="caja1" id="txt_valor_vh" value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txt_valor_vh']; else  echo $_POST['txt_valor_vh'];?>" size="25" onblur="sumar_a_total();"></td>
	</tr>
	
	<?php
	if ($_POST['cmb_tipo_cotizacion']==2)
	{
	?>
	<tr>
	<td height="24" class="td2tabla1">Tipo Carrocer&iacute;a </td>
	<td class="td2tabla1">
	<?php
	//Tipos carroceria
	$num_tipos_carroceria=3;
	$mat_tipos_carroceria[0]["id_tipo_carroc"]=1; $mat_tipos_carroceria[0]["nom_tipo_carroc"]="FURGON";
	$mat_tipos_carroceria[1]["id_tipo_carroc"]=2; $mat_tipos_carroceria[1]["nom_tipo_carroc"]="ESTACAS";
	$mat_tipos_carroceria[2]["id_tipo_carroc"]=3; $mat_tipos_carroceria[2]["nom_tipo_carroc"]="OTROS";
	cargar_combo("sencillo",$num_tipos_carroceria,$mat_tipos_carroceria,"id_tipo_carroc","nom_tipo_carroc","cmb_tipos_carroceria","form1","crear_cotizacion.php","_self","combo1","","si","may");
	?>	</td>
	<td class="td2tabla1">Aprox. Carroceria </td>
	<td class="td2tabla1"><input name="txt_valor_carroceria" type="text" class="caja1" id="txt_valor_carroceria"value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txt_valor_carroceria']; else  echo $_POST['txt_valor_carroceria'];?>" size="25"  onblur="sumar_a_total();"></td>
	</tr>	
	<?php
	}
	?>	
	</table>
	
	<table width="100%" border="0" class="letra1">
	  <tr>
	<td height="10" align="center"></td>
	  </tr>
	</table></td>
	</tr>
	</table>
	
	<table width="100%" border="0" class="letra1">
	<tr>
	  <td height="20" align="center"></td>
	</tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="tabla2" style="border-collapse:collapse;">
              <tr>
                <td height="22" align="center" bgcolor="<?php echo $mat_colores[0]["color6"];?>"><strong><FONT color="#000000">RETOMA DE VEHICULO USADO</FONT></strong></td>
              </tr>
              <tr>
                <td>
	
	<table width="100%" border="0" class="letra1"><tr><td height="10" align="center"></td></tr></table>
	
	
	<table width="98%" border="0" align="center" class="tabla1" style="border-collapse:collapse;">
	<tr>
	<td class="td2tabla1">
	El cliente entrega un veh&iacute;culo usado como parte de pago?

	<input <?php if ( (isset($_POST['rdo_retoma_usado'])) and ($_POST['rdo_retoma_usado']==1) ) echo "checked";?> name="rdo_retoma_usado" id="rdo_retoma_usado" type="radio" value="1" onClick="document.getElementById('div_usado').style.display='block'; sumar_a_total();">SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input <?php if (!isset($_POST['rdo_retoma_usado'])) echo "checked"; elseif ( (isset($_POST['rdo_retoma_usado'])) and ($_POST['rdo_retoma_usado']==2) ) echo "checked";?> name="rdo_retoma_usado" id="rdo_retoma_usado" type="radio" value="2" onClick="document.getElementById('div_usado').style.display='none'; sumar_a_total();">NO	</td>
	</tr>
	</table>
	
	<?php
	if ( ((isset($_POST['rdo_retoma_usado'])) and ($_POST['rdo_retoma_usado']==1)) ) $verusado="si";
	elseif ( ((isset($_POST['rdo_retoma_usado'])) and ($_POST['rdo_retoma_usado']==2)) or (!isset($_POST['rdo_retoma_usado'])) ) $verusado="no";
	?>	
	<div id="div_usado" style="display:<?php if ($verusado=="si") { ?> block; <?php } else { ?>none;<?php } ?>">
	<table width="98%" border="0" align="center" class="tabla1">
	<tr>
	<td width="14%" height="10" align="left" class="td2tabla1">Descripci&oacute;n del Carro </td>
	<td width="41%" align="left" class="td2tabla1"><input name="txt_descripcion_usado" type="text" class="caja1" id="txt_descripcion_usado" value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txt_descripcion_usado']; else  echo $_POST['txt_descripcion_usado'];?>" size="60"></td>
	<td width="5%" align="left" class="td2tabla1">Modelo</td>
	<td width="12%" align="left" class="td2tabla1"><input name="txt_modelo" type="text" class="caja1" id="txt_modelo" value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txt_modelo']; else  echo $_POST['txt_modelo'];?>" size="8" /></td>
	<td width="12%" align="left" class="td2tabla1">Valor Aproximado </td>
	<td width="16%" align="left" class="td2tabla1"><input name="txt_valor_usado" type="text" class="caja1" id="txt_valor_usado" value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txt_valor_usado']; else  echo $_POST['txt_valor_usado'];?>" size="25"  onblur="sumar_a_total();"></td>
	</tr>
	</table>
	</div>
	
	
	<table width="100%" border="0" class="letra1">
	<tr>
	<td height="10" align="center"></td>
	</tr>
	</table>
	
	</td>
            </tr>
            </table>
	<table width="100%" border="0" class="letra1">
              <tr>
                <td height="20" align="center"></td>
              </tr>
            </table>
	<table width="100%" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="tabla2" style="border-collapse:collapse;">
	<tr>
	  <td height="22" align="center" bgcolor="<?php echo $mat_colores[0]["color6"];?>"><strong><FONT color="#000000">EQUIPO ADICIONAL</FONT></strong></td>
	</tr>
	<tr>
	  <td><table width="100%" border="0" class="letra1">
	<tr>
	  <td height="10" align="center"></td>
	</tr>
	  </table>
	  
	<?php
	//Consultar equipo adicional
	list($num_equipo,$mat_equipo)=consultar_equipo_adicional($conexion,array("tc"=>1));
	
	$num_filas=$num_equipo/2;
	$cont=0;
	
	?>
	<input type="hidden" name="hd_num_equipo" id="hd_num_equipo" value="<?php echo $num_equipo;?>">
	<table width="98%" border="0" align="center" class="tabla1" style="border-collapse:collapse;">
	<tr>
	<?php
	for ($c=0; $c<2; $c++)
	{
	?>
	<td class="td2tabla1">&nbsp;</td>
	<td align="center" class="td2tabla1">DESCRIPCION</td>
	<td align="center" class="td2tabla1">VALOR</td>
	<td align="center" class="td2tabla1">FINANCIAR</td>
	<?php if ($c==0) { ?><td class="td2tabla1">&nbsp;</td><?php } ?>
	<?php
	}
	?>
	</tr>
	<?php
	for ($f=0; $f<$num_filas; $f++)
	{
	?>
	<tr>
	<?php
	for ($c=0; $c<2; $c++)
	{
	?>
	<td width="3%" height="22" align="center" class="td2tabla1"><?php if (isset($mat_equipo[$cont]["id_adicionales"])) { ?>
	<input <?php if (isset($_POST["chk_adicional_".$cont])) echo "checked";?> type="checkbox" name="<?php echo "chk_adicional_".$cont;?>" id="<?php echo "chk_adicional_".$cont;?>" value="<?php echo $mat_equipo[$cont]["id_adicionales"];?>" onClick="habilitar_caja_precio_eq_adicional(<?php echo $cont;?>);"> <?php }?> </td>
	<td width="20%" align="left" class="td2tabla1"><?php if (isset($mat_equipo[$cont]["id_adicionales"])) echo $mat_equipo[$cont]["nom_adicionales"];?></td>
	<td width="14%" align="center" class="td2tabla1">
	<?php 
	if (isset($mat_equipo[$cont]["id_adicionales"])) 
	{ 
	?>
	<input <?php  if (!isset($_POST["chk_adicional_".$cont])) echo "disabled";?> name="<?php echo "txt_valor_eq_adicional_".$cont;?>" width="20" type="text" class="caja1" id="<?php echo "txt_valor_eq_adicional_".$cont;?>" value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST["txt_valor_eq_adicional_".$cont]; else  echo $_POST["txt_valor_eq_adicional_".$cont];?>"  onblur="sumar_a_total();">
	<input name="<?php echo "hd_num_meses_financiacion_".$cont;?>" type="hidden" id="<?php echo "hd_num_meses_financiacion_".$cont;?>" value="<?php echo $mat_equipo[$cont]["num_meses_financiacion"];?>">
	<?php 
	}
	?>
	</td>
	<td width="5%" align="center" class="td2tabla1">
	<?php
	if (isset($mat_equipo[$cont]["id_adicionales"])) 
	{
	if ($mat_equipo[$cont]["permitir_financiacion"]==1)
	{
	?>
	<input <?php  if (!isset($_POST["chk_adicional_".$cont])) echo "disabled";?> <?php if (isset($_POST["chk_permitir_financiacion_".$cont])) echo "checked";  ?> type="checkbox" name="<?php echo "chk_permitir_financiacion_".$cont;?>" id="<?php echo "chk_permitir_financiacion_".$cont;?>"  onclick="sumar_a_total();"><?php
	}	
	}
	?>
	</td>
	<?php if ($c==0) { ?><td width="8%" class="td2tabla1">&nbsp;</td>
	<?php } ?>
	<?php	
	$cont++;
	}
	?>
	</tr>
	<?php
	}
	?></table><?php
	
	?>
	<table width="100%" border="0" class="letra1">
	  <tr>
	<td height="10" align="center"></td>
	  </tr>
	</table></td>
	</tr>
	</table>
	<table width="100%" border="0" class="letra1">
	<tr>
	  <td height="20" align="center"></td>
	</tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="tabla2" style="border-collapse:collapse;">
	<tr>
	  <td height="22" align="center" bgcolor="<?php echo $mat_colores[0]["color6"];?>"><strong><FONT color="#000000">FORMA DE PAGO DEL VEHICULO</FONT></strong></td>
	</tr>
	<tr>
	  <td><table width="100%" border="0" class="letra1">
	<tr>
	  <td height="10" align="center"></td>
	</tr>
	  </table>
	  
	<table width="98%" border="0" align="center" class="tabla1" style="border-collapse:collapse;">
	<tr>
	<td width="12%" height="22" class="td2tabla1">Valor Total</td>
	<td width="38%" class="td2tabla1">
	<input name="hd_valor_total" type="hidden" id="hd_valor_total" value="<?php if (isset($_POST['hd_valor_total'])) echo $_POST['hd_valor_total'];?>">
	<input name="txt_valor_total" type="text" class="caja2n" id="txt_valor_total" value="<?php if (isset($_POST['txt_valor_total'])) echo $_POST['txt_valor_total'];?>" size="25" readonly>
	</td>
	<td width="15%" class="td2tabla1">Valor Financiable</td>
	<td width="35%" class="td2tabla1">
	<input name="hd_valor_financiable" type="hidden" id="hd_valor_financiable" value="<?php if (isset($_POST['hd_valor_financiable'])) echo $_POST['hd_valor_financiable'];?>">
	<input name="txt_valor_financiable" type="text" class="caja2r" id="txt_valor_financiable" value="<?php if (isset($_POST['txt_valor_financiable'])) echo $_POST['txt_valor_financiable'];?>" size="25" readonly="readonly" />
	</td>
	</tr>
	<tr>
	<td height="22" class="td2tabla1">Forma de Pago</td>
	<td class="td2tabla1">
	<?php
	if ( ((isset($_POST['rdo_forma_pago'])) and ($_POST['rdo_forma_pago']==1)) or (!isset($_POST['rdo_forma_pago'])) ) $ver="si";
	elseif ( ((isset($_POST['rdo_forma_pago'])) and ($_POST['rdo_forma_pago']==2)) ) $ver="no";	
	?>
	<input <?php if (!isset($_POST['rdo_forma_pago'])) echo "checked"; elseif ( (isset($_POST['rdo_forma_pago'])) and ($_POST['rdo_forma_pago']==1) ) echo "checked";?> name="rdo_forma_pago" id="rdo_forma_pago" type="radio" value="1" 
	onclick="habilitar_campos_credito()">
	CR&Eacute;DITO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input <?php if ( (isset($_POST['rdo_forma_pago'])) and ($_POST['rdo_forma_pago']==2) ) echo "checked";?> name="rdo_forma_pago" id="rdo_forma_pago" type="radio" value="2" 
	onclick="habilitar_campos_contado()">
	CONTADO
	</td>
	<td class="td2tabla1">
	<div id="div_simulador1" style="display:<?php if ($ver=="si") { ?> block; <?php } else { ?>none;<?php } ?>">
	Usar Simulador?
	</div>
	</td>
	<td class="td2tabla1">
	<div id="div_simulador2" style="display:<?php if ($ver=="si") { ?> block; <?php } else { ?>none;<?php } ?>">
	<input <?php if (!isset($_POST['rdo_usar_simulador'])) echo "checked"; elseif ( (isset($_POST['rdo_usar_simulador'])) and ($_POST['rdo_usar_simulador']==1) ) echo "checked";?> name="rdo_usar_simulador" id="rdo_usar_simulador" type="radio" value="1" 
	onclick="document.getElementById('div_tasa1').style.display='block'; 
	 document.getElementById('div_tasa2').style.display='block'; 
	 document.getElementById('txt24cuotas').readOnly=true; 
	 document.getElementById('txt36cuotas').readOnly=true; 
	 document.getElementById('txt48cuotas').readOnly=true; 
	 document.getElementById('txt60cuotas').readOnly=true;
	 document.getElementById('txt72cuotas').readOnly=true; 
	 document.getElementById('txt84cuotas').readOnly=true;
	 document.getElementById('txt24cuotas').value='';
	 document.getElementById('txt36cuotas').value='';
	 document.getElementById('txt48cuotas').value='';
	 document.getElementById('txt60cuotas').value='';
	 document.getElementById('txt72cuotas').value='';
	 document.getElementById('txt84cuotas').value=''; 
	  ">
	SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<input <?php if ( (isset($_POST['rdo_usar_simulador'])) and ($_POST['rdo_usar_simulador']==2) ) echo "checked";?> name="rdo_usar_simulador" id="rdo_usar_simulador" type="radio" value="2" 
	onclick="document.getElementById('div_tasa1').style.display='none'; 
	 document.getElementById('div_tasa2').style.display='none'; 
	 document.getElementById('txt24cuotas').readOnly=false; 
	 document.getElementById('txt36cuotas').readOnly=false; 
	 document.getElementById('txt48cuotas').readOnly=false; 
	 document.getElementById('txt60cuotas').readOnly=false; 
	 document.getElementById('txt72cuotas').readOnly=false; 
	 document.getElementById('txt84cuotas').readOnly=false;
	 document.getElementById('txt24cuotas').value='';
	 document.getElementById('txt36cuotas').value='';
	 document.getElementById('txt48cuotas').value='';
	 document.getElementById('txt60cuotas').value='';
	 document.getElementById('txt72cuotas').value='';
	 document.getElementById('txt84cuotas').value='';
	 ">
	NO
	</div>	
	</td>
	</tr>
	<tr>
	<td height="22" class="td2tabla1">
	<?php
	if ( ($_POST['rdo_forma_pago']==1) and ($_POST['rdo_usar_simulador']==1) ) $usarsimulador="si";
	elseif ( ($_POST['rdo_forma_pago']==1) and ($_POST['rdo_usar_simulador']==2) ) $usarsimulador="no";
	elseif ($_POST['rdo_forma_pago']==2) $usarsimulador="no";
	elseif (!isset($_POST['rdo_forma_pago'])) $usarsimulador="si";
	
	/*
	if ( ((isset($_POST['rdo_usar_simulador'])) and ($_POST['rdo_usar_simulador']==1)) ) $usarsimulador="si";
	elseif ( ((isset($_POST['rdo_usar_simulador'])) and ($_POST['rdo_usar_simulador']==2))  ) $usarsimulador="no";
	elseif ( (!isset($_POST['rdo_usar_simulador'])) and (isset($_POST['rdo_forma_pago'])) ) $usarsimulador="no";
	else $usarsimulador="si";
	*/
	?>
	<div id="div_tasa1" style="display:<?php if ($usarsimulador=="si") { ?> block; <?php } else { ?>none;<?php } ?>">
	Tasa Mensual	
	</div>	
	</td>
	<td colspan="3" class="td2tabla1">
	<div id="div_tasa2" style="display:<?php if ($usarsimulador=="si") { ?> block; <?php } else { ?>none;<?php } ?>">
	<input class="caja1" size="5" type="text" name="txt_tasa" id="txt_tasa" value="<?php if (isset($_POST['txt_tasa'])) echo $_POST['txt_tasa'];?>" onblur="calcular_cuotas_fijas();">
	&nbsp;% <em>(Use el punto como Separador de decimales)</em>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="btn_calcular_cuotas" type="button" class="boton2" id="btn_calcular_cuotas" onclick="calcular_cuotas_fijas();" value="Calcular Cuotas">
	</div>
	</td>
	</tr>
	</table>
	
	<table width="100%" border="0" class="letra1">
	<tr>
	<td height="16" align="center"></td>
	</tr>
	</table>
	<table width="98%" border="0" align="center" class="tabla1" style="border-collapse:collapse;" size="25">
	<tr>
	<td width="12%" height="22" class="td2tabla1">* Cuota Inicial</td>
	<td width="38%" class="td2tabla1">
	<input name="hdcuotaini" type="hidden" id="hdcuotaini" value="<?php if (isset($_POST['hdcuotaini'])) echo $_POST['hdcuotaini'];?>">
	<input name="txtcuotaini" type="text" class="caja1" id="txtcuotaini"  value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txtcuotaini']; else echo $_POST['txtcuotaini'];?>" size="25" onblur="calcular_cuotas_fijas();">
	</td>
	<td width="15%" class="td2tabla1">* Saldo</td>
	<td width="35%" class="td2tabla1">
	<input name="hdsaldo" type="hidden" id="hdsaldo" value="<?php if (isset($_POST['hdsaldo'])) echo $_POST['hdsaldo'];?>">
	<input readonly name="txtsaldo" type="text" class="caja1" id="txtsaldo"  value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txtsaldo'];  else echo $_POST['txtsaldo'];?>" size="25" />
	</td>
	</tr>
	</table>
	
	<div id="div_credito" style="display:<?php if ($ver=="si") { ?> block; <?php } else { ?>none;<?php } ?>">
	<table width="98%" border="0" align="center" class="tabla1" style="border-collapse:collapse;" size="25">
	<tr>
	<td width="12%" height="22" class="td2tabla1">&nbsp;&nbsp;24 Cuotas </td>
	<td width="38%" class="td2tabla1">
	<input name="hd24cuotas" type="hidden" id="hd24cuotas" value="<?php if (isset($_POST['hd24cuotas'])) echo $_POST['hd24cuotas'];?>">
	<input <?php if ($usarsimulador=="si") { ?>readonly<?php } ?> name="txt24cuotas" type="text" class="caja1" id="txt24cuotas"  value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txt24cuotas']; else echo $_POST['txt24cuotas'];?>" size="25" />
	</td>
	<td width="15%" class="td2tabla1">&nbsp;&nbsp;60 Cuotas </td>
	<td width="35%" class="td2tabla1">
	<input name="hd60cuotas" type="hidden" id="hd60cuotas" value="<?php if (isset($_POST['hd60cuotas'])) echo $_POST['hd60cuotas'];?>">
	<input <?php if ($usarsimulador=="si") { ?>readonly<?php } ?> name="txt60cuotas" type="text" class="caja1" id="txt60cuotas"  value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txt60cuotas']; else echo $_POST['txt60cuotas'];?>" size="25" />
	</td>
	</tr>
	<tr>
	<td height="22" class="td2tabla1">&nbsp;&nbsp;36 Cuotas </td>
	<td class="td2tabla1">
	<input name="hd36cuotas" type="hidden" id="hd36cuotas" value="<?php if (isset($_POST['hd36cuotas'])) echo $_POST['hd36cuotas'];?>">
	<input <?php if ($usarsimulador=="si") { ?>readonly<?php } ?> name="txt36cuotas" type="text" class="caja1" id="txt36cuotas"  value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txt36cuotas']; else echo $_POST['txt36cuotas'];?>" size="25" />
	</td>
	<td class="td2tabla1">&nbsp;&nbsp;72 Cuotas </td>
	<td class="td2tabla1">
	<input name="hd72cuotas" type="hidden" id="hd72cuotas" value="<?php if (isset($_POST['hd72cuotas'])) echo $_POST['hd72cuotas'];?>">
	<input <?php if ($usarsimulador=="si") { ?>readonly<?php } ?> name="txt72cuotas" type="text" class="caja1" id="txt72cuotas"  value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txt72cuotas']; else echo $_POST['txt72cuotas'];?>" size="25" />
	</td>
	</tr>
	<tr>
	<td height="22" class="td2tabla1">&nbsp;&nbsp;48 Cuotas </td>
	<td class="td2tabla1">
	<input name="hd48cuotas" type="hidden" id="hd48cuotas" value="<?php if (isset($_POST['hd48cuotas'])) echo $_POST['hd48cuotas'];?>">
	<input <?php if ($usarsimulador=="si") { ?>readonly<?php } ?> name="txt48cuotas" type="text" class="caja1" id="txt48cuotas"  value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txt48cuotas']; else echo $_POST['txt48cuotas'];?>" size="25" />
	</td>
	<td class="td2tabla1">&nbsp;&nbsp;84 Cuotas </td>
	<td class="td2tabla1">
	<input name="hd84cuotas" type="hidden" id="hd84cuotas" value="<?php if (isset($_POST['hd84cuotas'])) echo $_POST['hd84cuotas'];?>">
	<input <?php if ($usarsimulador=="si") { ?>readonly<?php } ?> name="txt84cuotas" type="text" class="caja1" id="txt84cuotas"  value="<?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txt84cuotas']; else echo $_POST['txt84cuotas'];?>" size="25" />
	</td>
	</tr>
	</table>
	</div>
	
	<table width="100%" border="0" class="letra1">
	<tr>
	<td height="10" align="center"></td>
	</tr>
	</table>
	
	</td>
	</tr>
	</table>
	<table width="100%" border="0" class="letra1">
	<tr>
	  <td height="20" align="center"></td>
	</tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="tabla2" style="border-collapse:collapse;">
	<tr>
	  <td height="22" align="center" bgcolor="<?php echo $mat_colores[0]["color6"];?>"><strong><FONT color="#000000">NOTAS ADICIONALES</FONT></strong></td>
	</tr>
	<tr>
	  <td><table width="100%" border="0" class="letra1">
	<tr>
	  <td height="10" align="center"></td>
	</tr>
	  </table>
	  <table width="98%" border="0" align="center" class="tabla1" style="border-collapse:collapse;">
	<tr>
	  <td width="65%" height="22" class="td2tabla1">Digite aqui las notas adicionales de la Cotizaci&oacute;n:</td>
	  <td width="19%" class="td2tabla1"><strong>*&nbsp;Fecha pr&oacute;ximo Contacto </strong></td>
	  <td width="16%" class="td2tabla1">
	<input readonly name="txtFecha2" type="text" class="caja1" id="txtFecha2" value="<?php if (isset($_POST['txtFecha2'])) echo $_POST['txtFecha2'];?>" size="10" />
	<script language="JavaScript" type="text/javascript">calendar2 = new dynCalendar('calendar2', 'fecha2','../../calendario/cal_imagenes/');</script>
	  </td>
	</tr>
	  </table>
	  <table width="98%" border="0" align="center" class="tabla1" style="border-collapse:collapse;">
	
	<tr>
	  <td height="22" class="td2tabla1"><strong>Obsequios:</strong>
	    <textarea name="txta_obsequios" cols="170" rows="4" class="caja1" id="txta_obsequios"><?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txta_obsequios']; else echo $_POST['txta_obsequios'];?></textarea>
	  </td>
	  </tr>
	<tr>
	  <td width="100%" height="22" class="td2tabla1"><strong>Observaciones:</strong>
	   <textarea name="txta_observaciones" cols="170" rows="4" class="caja1" id="txta_observaciones"><?php if ($_POST['hd_nit_cliente']==$_POST['nit_cliente']) echo $_POST['txta_observaciones']; else echo $_POST['txta_observaciones'];?></textarea></td>
	  </tr>
	  </table>
	  <table width="100%" border="0" class="letra1">
	<tr>
	  <td height="10" align="center"></td>
	</tr>
	  </table></td>
	</tr>
	</table>
	<table width="100%" border="0" class="letra1">
	<tr>
	  <td height="20" align="center"></td>
	</tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="tabla2" style="border-collapse:collapse;">
	<tr>
	  <td height="22" align="center" bgcolor="<?php echo $mat_colores[0]["color6"];?>"><strong><FONT color="#000000">DOCUMENTACION REQUERIDA</FONT></strong></td>
	</tr>
	<tr>
	  <td><table width="100%" border="0" class="letra1">
	  <tr>
	<td height="10" align="center"></td>
	  </tr>
	</table>
	  <table width="98%" border="0" align="center" class="tabla1" style="border-collapse:collapse;" size="25">
	<tr>
	  <td width="44%" height="22" align="left" class="td2tabla1">INDEPENDIENTE</td>
	  <td width="13%" align="left" class="td2tabla1">&nbsp;</td>
	  <td width="43%" align="left" class="td2tabla1">EMPLEADO</td>
	  </tr>
	<tr>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >1. Fotocopia de la c&eacute;dula ampliada al 150% </td>
	  <td class="td2tabla1">&nbsp;</td>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >1. Fotocopia de la c&eacute;dula ampliada al 150% </td>
	</tr>
	<tr>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >2. Extractos Bancarios (3 ultimos meses)</td>
	  <td class="td2tabla1">&nbsp;</td>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >2. Certificaci&oacute;n Laboral</td>
	</tr>
	<tr>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >3. Camara de Comercio  (vigencia 30 dias) </td>
	  <td class="td2tabla1">&nbsp;</td>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >3. Certificado de Ingresos y Retenciones (DIAN)</td>
	</tr>
	<tr>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >4. RUT</td>
	  <td class="td2tabla1">&nbsp;</td>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >4. Tres &uacute;ltimas colillas de pago</td>
	</tr>
	<tr>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >5. Declaraci&oacute;n de Renta con Anexos</td>
	  <td class="td2tabla1">&nbsp;</td>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >5. Extractos Bancarios (3 ultimos meses)</td>
	</tr>
	<tr>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >6. Balances PyG con Anexos</td>
	  <td class="td2tabla1">&nbsp;</td>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >6. Certificado de Libertad y Tradici&oacute;n</td>
	</tr>
	<tr>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >7. Fotocopia de la Tarjeta de Propiedad del Veh&iacute;culo (<em><strong>Si Aplica</strong></em>)</td>
	  <td class="td2tabla1">&nbsp;</td>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >7. Formulario</td>
	</tr>
	<tr>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >8. Certificado de Ingresos de veh&iacute;culos P&uacute;blicos</td>
	  <td class="td2tabla1">&nbsp;</td>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >8. Otros</td>
	</tr>
	<tr>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >9. Pagos de IVA de los 3 &uacute;ltimos meses</td>
	  <td class="td2tabla1">&nbsp;</td>
	  <td class="td2tabla1">&nbsp;</td>
	</tr>
	<tr>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >10. Formulario</td>
	  <td class="td2tabla1">&nbsp;</td>
	  <td class="td2tabla1">&nbsp;</td>
	</tr>
	<tr>
	  <td align="left" bordercolor="#CCCCCC" class="td2tabla1" >11.Otros</td>
	  <td class="td2tabla1">&nbsp;</td>
	  <td class="td2tabla1">&nbsp;</td>
	</tr>
	  </table>
	<table width="100%" border="0" class="letra1">
	<tr>
	  <td height="10" align="center"></td>
	</tr>
	</table></td>
	</tr>
	</table>
	<?php	  
	}	
	?>
	  
	</td>
        </tr>
        </table>
	<table width="100%" border="0" class="letra1">
          <tr>
            <td height="10" align="center"></td>
          </tr>
        </table>
	<table width="100%" border="0" class="letra1">
        <tr>
        <td height="10" align="center">
	<?php
	if ( (isset($_POST['cmb_tipo_cotizacion'])) and ($_POST['cmb_tipo_cotizacion']!="") )
	{
	?>

	
	<input name="btn_crear" id="btn_crear" type="submit" class="boton1" value="Crear Cotizaci&oacute;n" onClick="return validar_formulario_con_direccionamiento(menini,menconf,vobjetos,vnombres,vtipo,color,destino,target);">
	<?php
	}
	?>
	</td>
        </tr>
        </table>
	<table width="100%" border="0" class="letra1">
              <tr>
                <td height="22" align="center">&nbsp;</td>
              </tr>
            </table></td>
	</tr>
	</table>
	
	</td>
	</tr>
	</table>
	
	<!-- CONTENIDO -->
	
	</td>
	</tr>
	<tr>
	
	</tr>
  </table>

