<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--full-height">
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
									</select>
								</div>
								<div class="col-lg-2">
									<label>Contrato</label>
									<input type="text" class="form-control form-control-sm m-input" id="dscLocSegCtt" disabled>
								</div>
								<div class="col-lg-1">
									<label>&nbsp;</label>
									<input type="text" class="form-control form-control-sm m-input" id="tipCttSegCtt" disabled>
								</div>
								<div class="col-lg-3">
									<label>Programa</label>
									<input type="text" class="form-control form-control-sm m-input" id="progSegCtt" disabled>
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
								<div class="col-lg-12">
									<label>Auditoria de Contrato</label>
								</div>
								<div class="col-lg-12" style="text-align: center;">
									<button class="m-btn btn btn-danger btn-sm">
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
											<table class="table">
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
											</table>
										</div>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
										<div class="table-responsive">
											<table class="table">
												<thead>
													<th>Refinanciamiento</th>
												</thead>
												<tbody>
													<tr>
														<td>2</td>
													</tr>
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
									<input type="text" class="form-control form-control-sm m-input" id="" disabled>
								</div>
								<div class="col-lg-8">
									<label>&nbsp;</label>
									<input type="text" class="form-control form-control-sm m-input" id="" disabled>
								</div>
								<div class="col-lg-4">
									<label>Titular Anterior</label>
									<input type="text" class="form-control form-control-sm m-input" id="" disabled>
								</div>
								<div class="col-lg-8">
									<label>&nbsp;</label>
									<input type="text" class="form-control form-control-sm m-input" id="" disabled>
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
								<div class="col-lg-12">
									<label></label>
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
															<input type="text" class="form-control form-control-sm m-input" id="cidCliente" disabled>
														</div>
														<div class="col-lg-5">
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-3">
															<label>Doc. Identidad</label>
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="tipoDocTitular" disabled>
																<?php
																$prueba = controladorEmpresa::ctrtipoDoc();
																?>
															</select>
														</div>
														<div class="col-lg-4">
															<label>&nbsp;</label>
															<input type="text" class="form-control form-control-sm m-input" id="numDocTitular" disabled>
														</div>
														<div class="col-lg-5">
															<label>Fch. Nacimiento</label>
															<div class="input-group date">
																<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_4" data-date-format="mm/dd/yyyy" disabled />
																<div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
																</div>
															</div>
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
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="paisTitular2" name="paisTitular2" disabled>
														<option value="0">
															Seleccione el país
														</option>
														<?php
															$prueba = controladorEmpresa::
																		ctrPais();
														?> 
													</select>
												</div>
												<div class="col-lg-3">
													<label>Departamento</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="departamentoTitular2" id="departamentoTitular2" disabled>
														<option value="">
															Seleccione
														</option>
													</select>
												</div>
												<div class="col-lg-3">
													<label>Provincia</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="provinciaTitular2" id="provinciaTitular2" disabled>
														<option value="">
															Seleccione
														</option>
													</select>
												</div>
												<div class="col-lg-3">
													<label>Distrito</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="distritoTitular2" id="distritoTitular2" disabled>
														<option value="">
															Seleccione
														</option>
													</select>
												</div>
												<div class="col-lg-12">
													<label>Dirección</label>
													<input type="text" class="form-control form-control-sm m-input" name="direccionTitular2" id="direccionTitular2" disabled>
												</div>
												<div class="col-lg-12">
													<label>Referencia</label>
													<textarea class="form-control form-control-sm m-input" rows="2" name="refDirTitular2" id="refDirTitular2" disabled></textarea>
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
															<input type="text" class="form-control form-control-sm m-input" id="cidCliente" disabled>
														</div>
														<div class="col-lg-5">
															<button type="button" id="btn2Com" class="btn btn-sm btn-danger mt25">
																<i class="fa fa-search"></i>
															</button>
															<button type="button" id="btn2Com" class="btn btn-sm btn-danger mt25">
															<i class="fa fa-user-o"></i>
															</button>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-3">
															<label>Doc. Identidad</label>
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="tipoDocTitular" disabled>
																<?php
																$prueba = controladorEmpresa::ctrtipoDoc();
																?>
															</select>
														</div>
														<div class="col-lg-4">
															<label>&nbsp;</label>
															<input type="text" class="form-control form-control-sm m-input" id="numDocTitular" disabled>
														</div>
														<div class="col-lg-5">
															<label>Fch. Nacimiento</label>
															<div class="input-group date">
																<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_4" data-date-format="mm/dd/yyyy" disabled />
																<div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
																</div>
															</div>
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
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="paisTitular2" name="paisTitular2" disabled>
														<option value="0">
															Seleccione el país
														</option>
														<?php
															$prueba = controladorEmpresa::
																		ctrPais();
														?> 
													</select>
												</div>
												<div class="col-lg-3">
													<label>Departamento</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="departamentoTitular2" id="departamentoTitular2" disabled>
														<option value="">
															Seleccione
														</option>
													</select>
												</div>
												<div class="col-lg-3">
													<label>Provincia</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="provinciaTitular2" id="provinciaTitular2" disabled>
														<option value="">
															Seleccione
														</option>
													</select>
												</div>
												<div class="col-lg-3">
													<label>Distrito</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="distritoTitular2" id="distritoTitular2" disabled>
														<option value="">
															Seleccione
														</option>
													</select>
												</div>
												<div class="col-lg-12">
													<label>Dirección</label>
													<input type="text" class="form-control form-control-sm m-input" name="direccionTitular2" id="direccionTitular2" disabled>
												</div>
												<div class="col-lg-12">
													<label>Referencia</label>
													<textarea class="form-control form-control-sm m-input" rows="2" name="refDirTitular2" id="refDirTitular2" disabled></textarea>
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
 ?>