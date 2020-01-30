<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">Cambio de Titular</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="row">
				<div class="col-lg-10">
					<fieldset class="fieldFormHorizontal">
						<legend class="tittle-box">&nbsp;</legend>
						<div class="col-lg-12">
							<div class="row form-group">
								<div class="col-lg-3">
									<label>Localidad</label>
									<select type="text" class="form-control form-control-sm m-input" id="localidadCamTit">
										<option value="">Seleccione</option>
										<?php
											$tabla = "vtama_localidad";
											$item1 = "cod_localidad";
											$item2 = "dsc_localidad";
											$prueba = controladorEmpresa::
											ctrSelects($tabla,$item1,$item2);
										?>  
									</select>
								</div>
								<div class="col-lg-2">
									<label>Contrato</label>
									<input type="text" class="form-control form-control-sm m-input" id="codCtt">
								</div>
								<div class="col-lg-1">
									<label>&nbsp;</label>
									<input type="text" class="form-control form-control-sm m-input" id="tipoCtt" disabled>
								</div>
								<div class="col-lg-3">
									<label>Programa</label>
									<input type="text" class="form-control form-control-sm m-input" id="progCtt" disabled>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-lg-2">
					<fieldset class="fieldFormHorizontal">
						<legend>&nbsp;</legend>
						<div class="col-lg-12">
							<div class="row form-group">
								<div class="col-lg-12" style="text-align: center;">
									<label>Auditoria de Contrato</label>
								</div>
								<div class="col-lg-12" style="text-align: center;">
									<button class="m-btn btn btnGuardarKqPst btn-sm">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<fieldset class="fieldFormHorizontal">
						<legend class="tittle-box">Servicios</legend>
						<div class="col-lg-12">
							<div class="row form-group">
								<div class="col-lg-10">
									<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
		                				<div class="table-responsive">
											<table class="table myTableServicios" id="myTableServicios">
												<thead>
													<th>N°</th>
													<th>Tipo de Servicio</th>
													<th>Fecha Generación</th>
													<th>Fecha Emisión</th>
													<th>Fecha Activación</th>
													<th>Fecha Anulación</th>
													<th>Fecha Resolución</th>
													<th>Fecha Transferencia</th>
												</thead>
												<tbody id="tbodyServicios"></tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
										<div class="table-responsive">
											<table class="table myTableRefinanciamiento" id="myTableRefinanciamiento">
												<thead>
													<th>Refinanciamiento</th>
												</thead>
												<tbody id="tbodyRefinanciamiento">
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10">
					<fieldset class="fieldFormHorizontal">
						<legend>&nbsp;</legend>
						<div class="col-lg-12">
							<div class="row form-group">
								<div class="col-lg-4">
									<label>Titular</label>
									<input type="text" class="form-control form-control-sm m-input" id="codTitular" disabled>
								</div>
								<div class="col-lg-8">
									<label>&nbsp;</label>
									<input type="text" class="form-control form-control-sm m-input" id="nombreTitular" disabled>
								</div>
								<div class="col-lg-4">
									<label>Titular Anterior</label>
									<input type="text" class="form-control form-control-sm m-input" id="codTitularAnt" disabled>
								</div>
								<div class="col-lg-8">
									<label>&nbsp;</label>
									<input type="text" class="form-control form-control-sm m-input" id="nombreTitularAnt" disabled>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-lg-2">
					<fieldset class="fieldFormHorizontal">
						<legend>&nbsp;</legend>
						<div class="col-lg-12">
							<div class="row form-group">
								<div class="col-lg-12" style="text-align: center">
									<br>
									<br>
									<label class="blue-text"><i class="fa fa-circle"></i> Refinanciamiento vigente</label>
									<br>
									<br>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<ul class="nav nav-tabs  m-tabs-line m-tabs-line--danger" role="tablist">
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_2_1" role="tab">
								Titular
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_2" role="tab">
								Nuevo Titular
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">General</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-7">
															<label>Codigo Cliente</label>
															<input type="text" class="form-control form-control-sm m-input" id="codCliente" disabled>
														</div>
														<div class="col-lg-3">
														</div>
														<div class="col-lg-1">
															<label style="margin-top: 10px;">
																Juridico
															</label>
															<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																<label>
																	<input type="checkbox" id="juridicoTitular" disabled="" name="">
																	<span class="jurid"></span>
																</label>
															</span>
														</div>
														<div class="col-lg-1"></div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-3">
															<label>Doc. Identidad</label>
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="tipoDocTitular" disabled>
																<option value="">Seleccione</option>
																<?php
																$prueba = controladorEmpresa::ctrtipoDoc();
																?>
															</select>
														</div>
														<div class="col-lg-3">
															<label>&nbsp;</label>
															<input type="text" class="form-control form-control-sm m-input" id="numDocTitular" disabled>
														</div>
														<div class="col-lg-5">
															<label>Fch. Nacimiento</label>
															<input type="text" class="form-control form-control-sm m-input" id="fchNacTitular" disabled>
														</div>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="row">
														<div class="col-lg-4">
															<label>Ape. Paterno</label>
															<input type="text" class="form-control form-control-sm m-input" id="apePatTitular" disabled>
														</div>
														<div class="col-lg-4">
															<label>Ape. Materno</label>
															<input type="text" class="form-control form-control-sm m-input" id="apeMatTitular" disabled>
														</div>
														<div class="col-lg-4">
															<label>Nombre</label>
															<input type="text" class="form-control form-control-sm m-input" id="nomTitular" disabled>
														</div>
														<div class="col-lg-12">
															<label>Razon Social</label>
															<input type="text" class="form-control form-control-sm m-input" id="razSocTitular" disabled>
														</div>
														<div class="col-lg-3">
															<label>Tel. Celular 1</label>
															<input type="text" class="form-control form-control-sm m-input" id="cel1Titular" disabled>
														</div>
														<div class="col-lg-3">
															<label>Tel. Cel 2</label>
															<input type="text" class="form-control form-control-sm m-input" id="cel2Titular" disabled>
														</div>
														<div class="col-lg-3">
															<label>Estado Civil</label>
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="edoCivilTitular" disabled>
																<option value="">
																	Seleccione
																</option>
																<?php
						  										$prueba=controladorEmpresa::ctrestadocivil();
																?> 
															</select>
														</div>
														<div class="col-lg-3">
															<label>Sexo</label>
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="sexoTitular" disabled>
																<option value="">
																	Seleccione
																</option>
																<option value="M">
																	Masculino
																</option>
																<option value="F">
																	Femenino
																</option>
															</select>
														</div>
														<div class="col-lg-12">
															<label>E-mail</label>
															<input type="text" class="form-control form-control-sm m-input" id="emailTitular" disabled>
														</div>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Dirección</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>País</label>
													<input type="text" class="form-control form-control-sm m-input" id="paisTitular" disabled>
												</div>
												<div class="col-lg-3">
													<label>Departamento</label>
													<input type="text" class="form-control form-control-sm m-input" id="depTitular" disabled>
												</div>
												<div class="col-lg-3">
													<label>Provincia</label>
													<input type="text" class="form-control form-control-sm m-input" id="provTitular" disabled>
												</div>
												<div class="col-lg-3">
													<label>Distrito</label>
													<input type="text" class="form-control form-control-sm m-input" id="distTitular" disabled>
												</div>
												<div class="col-lg-12">
													<label>Dirección</label>
													<input type="text" class="form-control form-control-sm m-input" name="direccionTitular2" id="direccionTitular" disabled>
												</div>
												<div class="col-lg-12">
													<label>Referencia</label>
													<textarea class="form-control form-control-sm m-input" rows="2" name="refDirTitular2" id="refDirTitular" disabled></textarea>
												</div>
												<div class="col-lg-12">
													<label>Zona</label>
													<textarea class="form-control form-control-sm m-input" rows="2" name="zonaDirTitular2" id="zonaDirTitular2" disabled></textarea>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">General</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-7">
															<label>Codigo Cliente</label>
															<input type="text" class="form-control form-control-sm m-input" id="codNuevoTitular" disabled>
														</div>
														<div class="col-lg-3">
															<span data-toggle="modal" data-target="#m_modal_2">
																<button type="button" class="m-btn btn btnGuardarKqPst btn-sm mt25" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar cliente" onclick="creaTablaCliente('nuevoTitular');">
																	<i class="la la-search"></i>
																</button>
															</span>
															<a href="clientes" type="button" id="btn2Com" class="btn btn-sm btnEditarKqPst2 mt25" target="_blank">
															<i class="fa fa-user-o"></i>
															</a>
														</div>
														<div class="col-lg-1">
															<label style="margin-top: 10px;">
																Juridico
															</label>
															<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																<label>
																	<input type="checkbox" id="juridicoNuevoTitular" disabled="" name="">
																	<span class="jurid"></span>
																</label>
															</span>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-3">
															<label>Doc. Identidad</label>
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="tipoDocNuevoTitular" disabled>
																<option value="">Seleccione</option>
																<?php
																$prueba = controladorEmpresa::ctrtipoDoc();
																?>
															</select>
														</div>
														<div class="col-lg-4">
															<label>&nbsp;</label>
															<input type="text" class="form-control form-control-sm m-input" id="numDocNuevoTitular" disabled>
														</div>
														<div class="col-lg-5">
															<label>Fch. Nacimiento</label>
															<input type="text" class="form-control form-control-sm m-input" id="fchNacNuevoTitular" disabled>
														</div>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="row">
														<div class="col-lg-4">
															<label>Ape. Paterno</label>
															<input type="text" class="form-control form-control-sm m-input" id="apePatNuevoTitular" disabled>
														</div>
														<div class="col-lg-4">
															<label>Ape. Materno</label>
															<input type="text" class="form-control form-control-sm m-input" id="apeMatNuevoTitular" disabled>
														</div>
														<div class="col-lg-4">
															<label>Nombre</label>
															<input type="text" class="form-control form-control-sm m-input" id="nomNuevoTitular" disabled>
														</div>
														<div class="col-lg-12">
															<label>Razon Social</label>
															<input type="text" class="form-control form-control-sm m-input" id="razSocNuevoTitular" disabled>
														</div>
														<div class="col-lg-3">
															<label>Tel. Celular 1</label>
															<input type="text" class="form-control form-control-sm m-input" id="cel1NuevoTitular" disabled>
														</div>
														<div class="col-lg-3">
															<label>Tel. Cel 2</label>
															<input type="text" class="form-control form-control-sm m-input" id="cel2NuevoTitular" disabled>
														</div>
														<div class="col-lg-3">
															<label>Estado Civil</label>
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="edoCivilNuevoTitular" disabled>
																<option value="">
																	Seleccione
																</option>
																<?php
						  										$prueba=controladorEmpresa::ctrestadocivil();
																?> 
															</select>
														</div>
														<div class="col-lg-3">
															<label>Sexo</label>
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="sexoNuevoTitular" disabled>
																<option value="">
																	Seleccione
																</option>
																<option value="M">
																	Masculino
																</option>
																<option value="F">
																	Femenino
																</option>
															</select>
														</div>
														<div class="col-lg-12">
															<label>E-mail</label>
															<input type="text" class="form-control form-control-sm m-input" id="emailNuevoTitular" disabled>
														</div>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Dirección</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>País</label>
													<input type="text" class="form-control form-control-sm m-input" id="paisNuevoTitular" disabled>
												</div>
												<div class="col-lg-3">
													<label>Departamento</label>
													<input type="text" class="form-control form-control-sm m-input" id="departamentoNuevoTitular" disabled>
												</div>
												<div class="col-lg-3">
													<label>Provincia</label>
													<input type="text" class="form-control form-control-sm m-input" id="provinciaNuevoTitular" disabled>
												</div>
												<div class="col-lg-3">
													<label>Distrito</label>
													<input type="text" class="form-control form-control-sm m-input" id="distritoNuevoTitular" disabled>
												</div>
												<div class="col-lg-12">
													<label>Dirección</label>
													<input type="text" class="form-control form-control-sm m-input" name="direccionTitular2" id="direccionNuevoTitular" disabled>
												</div>
												<div class="col-lg-12">
													<label>Referencia</label>
													<textarea class="form-control form-control-sm m-input" rows="2" name="refDirTitular2" id="refDirNuevoTitular" disabled></textarea>
												</div>
												<div class="col-lg-12">
													<label>Zona</label>
													<textarea class="form-control form-control-sm m-input" rows="2" name="zonaDirTitular2" id="zonaDirNuevoTitular" disabled></textarea>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>		
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
</div>



<?php
include "modals/modalObservacionCliente.php";
include "modals/modalTablaDeuda.php";
include "modals/modalTablaClientes.php";
 ?>