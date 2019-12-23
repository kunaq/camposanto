<?php

if (isset($_POST['variable1'])) {
	$codPro = $_POST['variable1'];
}else{
	$codPro = "";
}

 ?>
<div class="m-content"  style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--full-height">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Registro de Prospectos
					</h3>
				</div>
			</div>
		</div>
		<!--End: Portlet Head-->
		<div class="m-portlet__body">
		<!--begin: Portlet Body-->	
		 <!-- <div class="col-lg-12"> -->
			<div class="row">
				<div class="col-lg-12">
				<form enctype="multipart/form-data" id="formConfigPeriodo" role="form" method="POST">
					<!-- <div class="row">
						<div class="col-md-12">
							<p class="pull-right">
								<button type="button" class="btn btn-sm btn-primary btnGuardarKqPst" title="Nuevo" id=""  style="margin-right:6px;"><i class="fa fa-plus"></i></button>	
								<button type="button" class="btn btn-sm btn-primary btnEditarKqPst2" title="Modificar" id="" style="margin-right:6px;"><i class="fa fa-pencil"></i></button>
								<button type="button" class="btn btn-sm btn-primary btnEliminarKqPst" title="Eliminar" id=""><i class="fa fa-trash"></i></button>
							</p>										
						</div>
					</div> -->
					<div class="row">
						<div class="col-md-8">
							<fieldset class="fieldFormHorizontal" style="padding-left: 1rem;padding-right: 1rem">
								<legend class="tittle-box">Prospecto</legend>							
									<div class="form-group row">
										<div class="col-lg-2">
											<label>Codigo:</label>
										</div>
										<div class="col-lg-3">
											<input type="text" class="form-control form-control-sm m-input" disabled id="codProspecto" value="<?php echo $codPro; ?>"/>
										</div>
										<div class="col-lg-2" style="text-align: center;">
											<label>Importe:</label>
										</div>
										<div class="col-lg-3">
											<input type="text" class="form-control form-control-sm m-input" id="importe"/>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-2">
											<label class="">
												Tipo Doc.:
											</label>
										</div>
										<div class="col-lg-2">
											<select class="form-control form-control-sm m-input custom-select custom-select-danger " onchange="DocLenghtProspecto(this.value);" id="tipoDocRegPro">
												<option value="vacio">
													Seleccione
												</option>
												<?php
													$prueba = controladorEmpresa::
													ctrtipoDoc();
												  ?> 		
											</select>
										</div>
										<div class="col-lg-2" style="text-align: center;">
											<label class="">
												N° Doc.:
											</label>
										</div>
										<div class="col-lg-3">
											<input type="text" class="form-control form-control-sm m-input" id="numDocRegPro" name="numDocRegPro">
										</div>
										<div class="col-lg-3">
											<div class="row">
												<div class="col-md-6">
													<label class="m-checkbox">
														Jurídico
													</label>
												</div>
												<div class="col-md-6">
													<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
														<label>
															<input type="checkbox"  id="juridico" onclick="esJuridica();">
															<span></span>
														</label>
													</span>
												</div>
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-2">
											<label>Apellido Paterno</label>
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control form-control-sm m-input" id="apePaterno"/>
										</div>
										<div class="col-md-2">
											<label>Apellido Materno</label>
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control form-control-sm m-input" id="apeMaterno"/>
										</div>
									</div>
									<br>
									<div class="row" id="divNombre">
										<div class="col-md-2">
											<label>Nombres</label>
										</div>
										<div class="col-md-10">
											<input type="text" class="form-control form-control-sm m-input" id="nombre"/>
										</div>
									</div>
									<div class="row" id="divRazonSocial">
										<div class="col-md-2">
											<label>Razon Social</label>
										</div>
										<div class="col-md-10">
											<input type="text" class="form-control form-control-sm m-input" id="razonSocial"/>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-2">
											<label>Dirección</label>
										</div>
										<div class="col-md-10">
											<input type="text" class="form-control form-control-sm m-input" id="direccion" name=""/>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-2">
											<label class="">
												País:
											</label>
										</div>
										<div class="col-lg-4">
											<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="pais" name="pais" onchange="buscaDepartamento(this.value);">
												<option value="0">
													Seleccione el país
												</option>
												<?php
													$prueba = controladorEmpresa::
													ctrPais();
												  ?> 
											</select>
										</div>
										<div class="col-lg-2">
											<label class="">
												Departamento:
											</label>
										</div>
										<div class="col-lg-4">
											<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="departamento" id="departamento" onchange="buscaProvincia(this.value);">
												<option value="">
													Seleccione
												</option>
											</select>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-2">
											<label class="">
												Provincia:
											</label>
										</div>
										<div class="col-lg-4">
											<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="provincia" id="provincia" onchange="buscaDistrito(this.value);">
												<option value="">
													Seleccione
												</option>
											</select>
										</div>
										<div class="col-lg-2">
											<label class="">
												Distrito:
											</label>
										</div>
										<div class="col-lg-4">
											<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="distrito">
												<option value="">
													Seleccione
												</option>
											</select>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-2">
											<label class="">
												Teléfono fijo 1:
											</label>
										</div>
										<div class="col-lg-4">
											<input type="text" class="form-control form-control-sm m-input" placeholder="" id="telefono1">
										</div>
										<div class="col-lg-2">
											<label class="">
												Teléfono fijo 2:
											</label>
										</div>
										<div class="col-lg-4">
											<input type="text" class="form-control form-control-sm m-input" placeholder="" id="telefono2">
										</div>
									</div>
									<br>
							</fieldset>
						</div>
						<div class="col-md-4">
							<fieldset class=" fieldFormHorizontal" style="margin-bottom: 0.53rem; padding: 1rem;">
								<legend class="tittle-box">Registro</legend>
								<div class="row">
									<div class="col-lg-9">
										<label>Fecha / Días Transcurridos</label>
										<input type="text" class="form-control form-control-sm m-input" disabled id="fechaReg" value="<?php echo date('d/m/Y',strtotime(date('m/d/Y'))); ?>"/>
									</div>
									<div class="col-lg-3">
										<label>&nbsp;</label>
										<input type="text" class="form-control form-control-sm m-input" disabled id="numDias" />
									</div>
								</div>	
								<br>
								<div class="row">
									<div class="col-lg-12">
										<label>Usuario</label>
										<input type="text" class="form-control form-control-sm m-input" disabled id="usuario" value="<?php echo $_SESSION['nombre'] ?>" />
									</div>
								</div>								
							</fieldset>
							<br>
							<fieldset class="fieldFormHorizontal" style=" padding: 1rem;">
								<legend class="tittle-box">Prospección</legend>
								<div class="form-group row">
									<div class="col-lg-12">
										<label>Canal venta</label>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<select class="form-control form-control-sm m-select2 m-select2-general" id="canalVenta">
											<?php
												$tabla = "vtama_canal_venta";
												$item1 = "cod_canal_venta";
												$item2 = "dsc_canal_venta";
												$prueba = controladorEmpresa::
												ctrSelects($tabla,$item1,$item2);
											?> 
										</select>
									</div>
								</div>	
								<br>
								<div class="form-group row">
									<div class="col-lg-12">
										<label>Calificación:</label>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<select class="form-control form-control-sm m-select2 m-select2-general" id="calificacion">
											<?php
												$tabla = "vtama_calificacion_prospecto";
												$item1 = "cod_calificacion";
												$item2 = "dsc_calificacion";
												$prueba = controladorEmpresa::
												ctrSelects($tabla,$item1,$item2);
											?> 
										</select>
									</div>
								</div>								
							</fieldset>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">
							<fieldset class="fieldFormHorizontal" style=" padding: 1rem; margin: 0 2rem 0 .6rem;">
							<legend class="tittle-box">Prospecto de</legend>
								<div class="row">
									<div class="col-lg-3">
										<label>Vendedor</label>
									</div>
									<div class="col-lg-3">
										<input type="text" class="form-control form-control-sm m-input" id="codVendedor" onchange="buscarVendedor(this.value)" />
									</div>
									<div class="col-lg-1">
										<span data-toggle="modal" data-target="#m_modal_4">
											<button class="btn btnGuardarKqPst btn-sm" type="button" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar vendedor" onclick="creaTablaVendedor();">
												<i class="la la-search"></i>
											</button>
										</span>
									</div>
									<div class="col-md-5">
										<input type="text" class="form-control form-control-sm m-input" disabled id="dscVendedor"/>
									</div>
								</div>	
								<br>								
								<div class="row">
									<div class="col-lg-3">
										<label>Grupo</label>
									</div>
									<div class="col-lg-3">
										<input type="text" class="form-control form-control-sm m-input" disabled id="codGrupo" onchange="buscarGrupo(this.value)"/>
									</div>
									<div class="col-lg-6">
										<input type="text" class="form-control form-control-sm m-input" disabled id="dscGrupo"/>
									</div>
								</div>	
								<br>	
								<div class="row">
									<div class="col-lg-3">
										<label>Supervisor</label>
									</div>
									<div class="col-lg-3">
										<input type="text" class="form-control form-control-sm m-input" disabled id="codSupervisor" onchange="buscarSupervisor(this.value)"/>
									</div>
									<div class="col-lg-6">
										<input type="text" class="form-control form-control-sm m-input" disabled id="dscSupervisor"/>
									</div>
								</div>	
								<br>
								<div class="row">
									<div class="col-lg-3">
										<label>Jefe ventas</label>
									</div>
									<div class="col-lg-3">
										<input type="text" class="form-control form-control-sm m-input" disabled id="codJefeVentas" onchange="buscarJefeVentas(this.value)"/>
									</div>
									<div class="col-lg-6">
										<input type="text" class="form-control form-control-sm m-input" disabled id="dscJefeVentas"/>
									</div>
								</div>			
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="fieldFormHorizontal" style=" padding: 1rem;s">
							<legend class="tittle-box">Observaciones</legend>
								<div class="row">
									<div class="col-lg-12">
										<textarea class="form-control form-control-sm m-input" id="observacion" rows="7"></textarea>
									</div>
								</div>	
								<br>
							</fieldset>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<fieldset class=" fieldFormHorizontal" style=" padding: 1rem; margin-left: 0.6rem;">
								<legend class="tittle-box">Estado de gestión</legend>
								<div class="row">
									<div class="col-lg-2">
										<select class="form-control form-control-sm m-select2 m-select2-general" id="estado">
											<option value="ACT">
												ACTIVO
											</option>
											<option value="VTA">
												CIERRE
											</option>
											<option value="CAD">
												CADUCO
											</option>
											<option value="TRU">
												TRUNCO
											</option>
										</select>
									</div>
									<div id="cttoRegPro" class="col-lg-9" hidden>
										<div class="row">
											<div class="col-lg-2"></div>
											<div class="col-lg-2">
												<label>Contrato vendido:</label>
											</div>
											<div class="col-lg-3">
												<select class="form-control form-control-sm" id="localidadRegPro">
													<?php
													$tabla = "vtama_localidad";
													$item1 = "cod_localidad";
													$item2 = "dsc_localidad";
													$prueba = controladorEmpresa::
													ctrSelects($tabla,$item1,$item2);
														?>
												</select>
											</div>
											<div class="col-lg-3">
												<input type="text" class="form-control form-control-sm m-input" id="codCttRegPro"/>
											</div>
											<div class="col-lg-1">
												<input type="text" class="form-control form-control-sm m-input" id="numServRegPro"/>
											</div>
											<div class="col-lg-1">
												<input type="text" class="form-control form-control-sm m-input" id="tipoCttRegPro"/>
											</div>
										</div>
									</div>
								</div>	
								<br>									
							</fieldset>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<p class="pull-right">
								<button type="button" class="btn btn-sm btn-primary btnGuardarKqPst" title="Nuevo" id=""  style="margin-right:6px;" onclick="obtenerValores()"><i class="fa fa-plus"></i></button>	
								<button type="button" class="btn btn-sm btn-primary btn-danger" title="Eliminar" id="btnEliminarFila"><i class="fa fa-trash"></i></button>
							</p>										
						</div>
					</div>
					<div class="row">
						<div class="table-responsive col-lg-12">
						<table class="table" width="100%" id="tabRegConRegPro">
							<thead>
								<tr>
									<th>N°</th>
									<th>Fecha Contacto</th>
									<th width="80">Calificación</th>
									<th>Cierre</th>
									<th>Consejero</th>
									<th>Prim. o Seg.</th>
									<th>Observaciones</th>
								</tr>
							</thead>
							<tbody id="tabBodyRegPro">
<!-- 								<tr>
									<td style="text-align: center;">1</td>
									<td>20/10/2019</td>
									<td>
										<select class="form-control form-control-sm m-select2 m-select2-general">
											<?php
												$tabla = "vtama_calificacion_prospecto";
												$item1 = "cod_calificacion";
												$item2 = "dsc_calificacion";
												$prueba = controladorEmpresa::
												ctrSelects($tabla,$item1,$item2);
											?> 
										</select>
									</td>
									<td>
										<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
											<label>
												<input type="checkbox"  name="">
												<span></span>
											</label>
										</span>
									</td>
									<td>
										<select class="form-control form-control-sm m-select2 m-select2-general">
											<?php $prueba = controladorEmpresa::ctrTrabajador(); ?>
										</select>
									</td>
									<td>
										<select class="form-control form-control-sm m-select2 m-select2-general">
											<option value="1">Primera</option>
											<option value="2" selected>Segunda</option>
										</select>
									</td>
									<td>
										<textarea class="form-control form-control-sm m-input" rows="1" style="width: 400px;">Observaciones lorem ipsun lorem ipsun lorem ipsun lorem ipsun lorem ipsun lorem ipsun lorem ipsun lorem ipsun lorem ipsun
										</textarea>
									</td>
								</tr> -->
							</tbody>
						</table>
						</div>
					</div>
				</form>	
				</div>			
			</div>
		<!-- </div> -->
		<!--End: Portlet Body-->
		<div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-lg-7"></div>
					<div class="col-lg-4 m--align-right" id="btnNuevo">
						<button href="#" class="btn btnGuardarKqPst m-btn m-btn--custom m-btn--icon" data-wizard-action="submit" onclick="registrarProspecto()">
							<span>
								<i class="fa fa-save"></i>
								&nbsp;&nbsp;
								<span>
									Guardar
								</span>
							</span>
						</button>
					</div>
					<div class="col-lg-4 m--align-right" id="btnEditar">
						<button href="#" class="btn btnGuardarKqPst m-btn m-btn--custom m-btn--icon" data-wizard-action="submit" onclick="registrarProspecto()">
							<span>
								<i class="fa fa-save"></i>
								&nbsp;&nbsp;
								<span>
									Guardar
								</span>
							</span>
						</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	<!--End::Main Portlet-->
	</div>
</div>
</div>


<?php
include "modals/modalTablaTrabajadores.php";
?>
