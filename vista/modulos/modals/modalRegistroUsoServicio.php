<!-- Modal containt-->
<div class="modal fade" id="m_modal_registro_uso_servicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div id="m_modal_1_loader" class="loader"></div>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Registro de Uso de Servicio
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="480">
					<div class="row">
						<div class="col-lg-12">
							<fieldset class="fieldFormHorizontal">
								<legend>&nbsp;</legend>
								<div class="col-lg-12">
									<div class="row form-group">
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-4">
													<label>Localidad</label>
													<select type="text" class="form-control form-control-sm m-input" id="">
														<?php
															$tabla = "vtama_localidad";
															$item1 = "cod_localidad";
															$item2 = "dsc_localidad";
															$prueba = controladorEmpresa::
															ctrSelects($tabla,$item1,$item2);
														  ?> 
													</select>
												</div>
												<div class="col-lg-4">
													<label>Tipo Autorización</label>
													<select type="text" class="form-control form-control-sm m-input" id="" onchange="tipoAutorizacion(this.value)">
														<option value="">Selecciona</option>
														<?php
															$tabla = "vtama_tipo_autorizacion";
															$item1 = "cod_tipo_autorizacion";
															$item2 = "dsc_tipo_autorizacion";
															$prueba = controladorEmpresa::
															ctrSelects($tabla,$item1,$item2);
														  ?> 
													</select>
												</div>
												<div class="col-lg-4">
													<label>N° Uso Servicio</label>
													<input type="text" class="form-control form-control-sm m-input" id="">
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-4">
													<label>Estado</label>
													<select class="form-control form-control-sm m-input" id="etdServicio">
														<?php
															$tabla = "vtama_estado_autorizacion";
															$item1 = "cod_estado_autorizacion";
															$item2 = "dsc_autorizacion";
															$prueba = controladorEmpresa::
															ctrSelects($tabla,$item1,$item2);
														  ?>
													</select>
												</div>
												<div class="col-lg-4">
													<label>Usuario</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-4">
													<label>Fecha Registro</label>
													<div class="input-group date">
													<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_3" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>" disabled/>
													<div class="input-group-append">
														<span class="input-group-text">
															<i class="la la-calendar-check-o"></i>
														</span>
													</div>
												</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="row" id="atzServicioInh">
						<div class="col-lg-12">
							<ul class="nav nav-tabs  m-tabs-line m-tabs-line--danger" role="tablist">
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_2_1" role="tab">
										General
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_2" role="tab">
										Detalle
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_3" role="tab">
										Lapida
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_4" role="tab">
										Control Documentario
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
									<div class="row">
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">&nbsp;</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-3">
																	<label>N° Contrato</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-3">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-1">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<table class="mt25">
																		<tbody>
																			<tr>
																				<td>
																					<label class="label-checkbox">
																						Caso Morgue
																					</label>
																				</td>
																				<td>
																					<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																						<label>
																							<input type="checkbox" name="">
																							<span></span>
																						</label>
																					</span>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
																<div class="col-lg-3">
																	<label></label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-6">
																	<label>Tipo de Programa</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-1">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" name="">
																</div>
																<div class="col-lg-3">
																	<label>N° Orden Ingreso</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Datos Beneficiario</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-4">
																	<label>Tipo Documento</label>
																	<select class="form-control form-control-sm m-input"></select>
																</div>
																<div class="col-lg-3">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<button class="btn btn-sm btn-danger mt25">
																		<i class="fa fa-search"></i>
																	</button>
																</div>
																<div class="col-lg-3">
																	<label>Fecha Nacimiento</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-9">
																	<label>Apellido Paterno</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Sexo</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9">
																	<label>Apellido Materno</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Estado Civil</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9">
																	<label>Nombres</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Religión</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9 advise">
																	(Por favor ingresar los datos del beneficiario)
																</div>
																<div class="col-lg-3">
																	<label>Nacionalidad</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Datos Generales</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-2">
																	<label>Fecha Servicio</label>
																	<input class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<label>Fecha Deceso</label>
																	<input class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<label>Lugar Deceso</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-2">
																	<label>Motivo Deceso</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-2">
																	<label>Parentesco</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-2" style="text-align: center;">
																	<label style="margin-top: 6px;">
																		Titular Fallecido
																	</label>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" id="" >
																			<span class="jurid"></span>
																		</label>
																	</span>
																</div>
																<div class="col-lg-3">
																	<label>Agencia Funeraria</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-1" style="text-align: center;">
																	<button class="btn btn-sm btn-danger mt25">
																		<i class="fa fa-search"></i>
																	</button>
																</div>
																<div class="col-lg-8">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Observaciones</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-12">
																	<textarea class="form-control form-control-sm m-input" rows="2"></textarea>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
									<div class="row form-group">
										<div class="col-lg-5">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Servicios a Descargar</legend>
												<div class="col-lg-12">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						                				<div class="table-responsive">
						                					<table class="table">
						                						<thead>
						                							<th>Serv.</th>
						                							<th>Servicio</th>
						                							<th>Ctd</th>
						                							<th>P</th>
						                						</thead>
						                					</table>
						                				</div>
						                			</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-2">
											<div class="row">
												<div class="col-lg-12 advise">
													<button class="btn btn-danger btn-sm"><i class="fa fa-play"></i></button>
												</div>
												<div class="col-lg-12 advise">
													<button class="btn btn-danger btn-sm mt25"><i class="fa fa-forward"></i></button>
												</div>
											</div>
										</div>
										<div class="col-lg-5">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Servicios Descargados</legend>
												<div class="col-lg-12">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						                				<div class="table-responsive">
						                					<table class="table">
						                						<thead>
						                							<th>Serv.</th>
						                							<th>Servicio</th>
						                							<th>Ctd</th>
						                							<th>P</th>
						                						</thead>
						                					</table>
						                				</div>
						                			</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-12">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Espacio Anterior</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-4">
															<label>Camposanto</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>ESPERANZ ETERNA CAÑETE</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Plataforma</label>
															<select class="form-control form-control-sm m-input">
																<option>PLAT - 11 - MADRE DEL AMOR GERMOSO</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Área</label>
															<select class="form-control form-control-sm m-input">
																<option>ÁREA UNICA</option>
															</select>
														</div>
														<div class="col-lg-1">
															<label>Eje.Horiz.</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>A</option>
															</select>
														</div>
														<div class="col-lg-1">
															<label>Eje Vert.</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-1">
															<label>Espacio</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-1">
															<button class="btn btn-sm btn-danger mt25"><i class="fa fa-list"></i></button>
														</div>
														<div class="col-lg-3">
															<label>Tipo</label>
															<input type="text" class="form-control form-control-sm m-input" id="">
														</div>
														<div class="col-lg-2">
															<label>N° Nivel</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-2">
															<label>Profundidad</label>
															<input type="text" class="form-control form-control-sm m-input" id="">
														</div>
													</div>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_3" role="tabpanel">
									<div class="row">
										<div class="col-lg-4">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Datos</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-12">
															<label>Beneficiario</label>
															<textarea class="form-control form-control-sm m-input" rows="3"></textarea>
														</div>
														<div class="col-lg-12">
															<label>Fecha Nacimiento</label>
															<div class="input-group date">
																<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_5" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
																<div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
																</div>
															</div>
														</div>
														<div class="col-lg-12">
															<label>Fecha Deceso</label>
															<div class="input-group date">
																<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_6" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
																<div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
											<div class="row">
												<div class="col-lg-4"></div>
												<div class="col-lg-8">
													<table>
														<tbody>
															<tr>
																<td>
																	<label class="label-checkbox">
																		Replicar Datos a Lapida
																	</label>
																</td>
																<td>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" name="">
																			<span></span>
																		</label>
																	</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="col-lg-8">
											<fieldset class="fieldFormHorizontal">
												<legend>&nbsp;</legend>
												<div style="height: 300px;"></div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_4" role="tabpanel">
									<div class="row">
										<div class="col-lg-12">
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="400">
				                				<div class="table-responsive">
													<table class="table">
														<thead>
															<th><i class="fa fa-check"></i></th>
															<th>Código</th>
															<th>Documento</th>
															<th>Usuario de Registro</th>
															<th>Fecha de Registro</th>
															<th></th>
														</thead>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="atzServicioMisa">
						<div class="col-lg-12">
							<ul class="nav nav-tabs  m-tabs-line m-tabs-line--danger" role="tablist">
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_2_2_1" role="tab">
										General
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_2_2" role="tab">
										Detalle
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="m_tabs_2_1_2" role="tabpanel">
									<div class="row">
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">&nbsp;</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-3">
																	<label>N° Contrato</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-3">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-1">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-4">
																	<label>Tipo Necesidad</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-6">
																	<label>Tipo de Programa</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Datos Beneficiario</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-4">
																	<label>Tipo Documento</label>
																	<select class="form-control form-control-sm m-input"></select>
																</div>
																<div class="col-lg-3">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<button class="btn btn-sm btn-danger mt25">
																		<i class="fa fa-search"></i>
																	</button>
																</div>
																<div class="col-lg-3">
																	<label>Fecha Nacimiento</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-9">
																	<label>Apellido Paterno</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Sexo</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9">
																	<label>Apellido Materno</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Estado Civil</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9">
																	<label>Nombres</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Religión</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9 advise">
																	(Por favor ingresar los datos del beneficiario)
																</div>
																<div class="col-lg-3">
																	<label>Nacionalidad</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Datos Generales</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-2">
																	<label>Fecha Servicio</label>
																	<input class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																</div>
																<div class="col-lg-2">
																</div>
																<div class="col-lg-3">
																</div>
																<div class="col-lg-2">
																	<label>Parentesco</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-12">
																	<label>Conmemoración</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-7">
																	<label>Sacerdote</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-5">
																	<label>Cantante</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Observaciones</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-12">
																	<textarea class="form-control form-control-sm m-input" rows="2"></textarea>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_2_2" role="tabpanel">
									<div class="row form-group">
										<div class="col-lg-5">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Servicios a Descargar</legend>
												<div class="col-lg-12">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						                				<div class="table-responsive">
						                					<table class="table">
						                						<thead>
						                							<th>Serv.</th>
						                							<th>Servicio</th>
						                							<th>Ctd</th>
						                							<th>P</th>
						                						</thead>
						                					</table>
						                				</div>
						                			</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-2">
											<div class="row">
												<div class="col-lg-12 advise">
													<button class="btn btn-danger btn-sm"><i class="fa fa-play"></i></button>
												</div>
												<div class="col-lg-12 advise">
													<button class="btn btn-danger btn-sm mt25"><i class="fa fa-forward"></i></button>
												</div>
											</div>
										</div>
										<div class="col-lg-5">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Servicios Descargados</legend>
												<div class="col-lg-12">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						                				<div class="table-responsive">
						                					<table class="table">
						                						<thead>
						                							<th>Serv.</th>
						                							<th>Servicio</th>
						                							<th>Ctd</th>
						                							<th>P</th>
						                						</thead>
						                					</table>
						                				</div>
						                			</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-12" style="text-align: center;">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">&nbsp;</legend>
												<div class="col-lg-12">
													<i class="fa fa-question"></i>
													<br>
													<h4 class="tittle-box">Seleccione y descargue los servicios que tenga cantidad disponible</h4>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="atzServicioMisaEsp">
						<div class="col-lg-12">
							<ul class="nav nav-tabs  m-tabs-line m-tabs-line--danger" role="tablist">
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_2_3_1" role="tab">
										General
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_3_2" role="tab">
										Detalle
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="m_tabs_2_3_1" role="tabpanel">
									<div class="row">
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">&nbsp;</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-3">
																	<label>N° Contrato</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-3">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-1">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-4">
																	<label>Tipo Necesidad</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-6">
																	<label>Tipo de Programa</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Datos Beneficiario</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-4">
																	<label>Tipo Documento</label>
																	<select class="form-control form-control-sm m-input"></select>
																</div>
																<div class="col-lg-3">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<button class="btn btn-sm btn-danger mt25">
																		<i class="fa fa-search"></i>
																	</button>
																</div>
																<div class="col-lg-3">
																	<label>Fecha Nacimiento</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-9">
																	<label>Apellido Paterno</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Sexo</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9">
																	<label>Apellido Materno</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Estado Civil</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9">
																	<label>Nombres</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Religión</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9 advise">
																	(Por favor ingresar los datos del beneficiario)
																</div>
																<div class="col-lg-3">
																	<label>Nacionalidad</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Datos Generales</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-2">
																	<label>Fecha Servicio</label>
																	<input class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																</div>
																<div class="col-lg-2">
																</div>
																<div class="col-lg-3">
																</div>
																<div class="col-lg-2">
																	<label>Parentesco</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-12">
																	<label>Conmemoración</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-7">
																	<label>Sacerdote</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-5">
																	<label>Cantante</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Observaciones</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-12">
																	<textarea class="form-control form-control-sm m-input" rows="2"></textarea>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_3_2" role="tabpanel">
									<div class="row form-group">
										<div class="col-lg-5">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Servicios a Descargar</legend>
												<div class="col-lg-12">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						                				<div class="table-responsive">
						                					<table class="table">
						                						<thead>
						                							<th>Serv.</th>
						                							<th>Servicio</th>
						                							<th>Ctd</th>
						                							<th>P</th>
						                						</thead>
						                					</table>
						                				</div>
						                			</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-2">
											<div class="row">
												<div class="col-lg-12 advise">
													<button class="btn btn-danger btn-sm"><i class="fa fa-play"></i></button>
												</div>
												<div class="col-lg-12 advise">
													<button class="btn btn-danger btn-sm mt25"><i class="fa fa-forward"></i></button>
												</div>
											</div>
										</div>
										<div class="col-lg-5">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Servicios Descargados</legend>
												<div class="col-lg-12">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						                				<div class="table-responsive">
						                					<table class="table">
						                						<thead>
						                							<th>Serv.</th>
						                							<th>Servicio</th>
						                							<th>Ctd</th>
						                							<th>P</th>
						                						</thead>
						                					</table>
						                				</div>
						                			</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-12" style="text-align: center;">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">&nbsp;</legend>
												<div class="col-lg-12">
													<i class="fa fa-question"></i>
													<br>
													<h4 class="tittle-box">Seleccione y descargue los servicios que tenga cantidad disponible</h4>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="atzTrasladoExt">
						<div class="col-lg-12">
							<ul class="nav nav-tabs  m-tabs-line m-tabs-line--danger" role="tablist">
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_2_4_1" role="tab">
										General
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_4_2" role="tab">
										Detalle
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_4_3" role="tab">
										Lapida
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_4_4" role="tab">
										Control Documentario
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="m_tabs_2_4_1" role="tabpanel">
									<div class="row">
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">&nbsp;</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-3">
																	<label>N° Contrato</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-3">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-1">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<table class="mt25">
																		<tbody>
																			<tr>
																				<td>
																					<label class="label-checkbox">
																						Caso Morgue
																					</label>
																				</td>
																				<td>
																					<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																						<label>
																							<input type="checkbox" name="">
																							<span></span>
																						</label>
																					</span>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
																<div class="col-lg-3">
																	<label></label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-6">
																	<label>Tipo de Programa</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-1">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" name="">
																</div>
																<div class="col-lg-3">
																	<label>N° Orden Ingreso</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Datos Beneficiario</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-4">
																	<label>Tipo Documento</label>
																	<select class="form-control form-control-sm m-input"></select>
																</div>
																<div class="col-lg-3">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<button class="btn btn-sm btn-danger mt25">
																		<i class="fa fa-search"></i>
																	</button>
																</div>
																<div class="col-lg-3">
																	<label>Fecha Nacimiento</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-9">
																	<label>Apellido Paterno</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Sexo</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9">
																	<label>Apellido Materno</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Estado Civil</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9">
																	<label>Nombres</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Religión</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9 advise">
																	(Por favor ingresar los datos del beneficiario)
																</div>
																<div class="col-lg-3">
																	<label>Nacionalidad</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Datos Generales</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-2">
																	<label>Fecha Servicio</label>
																	<input class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<label>Fecha Deceso</label>
																	<input class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<label>Lugar Deceso</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-2">
																	<label>Motivo Deceso</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-2">
																	<label>Parentesco</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-2" style="text-align: center;">
																	<label style="margin-top: 6px;">
																		Titular Fallecido
																	</label>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" id="" >
																			<span class="jurid"></span>
																		</label>
																	</span>
																</div>
																<div class="col-lg-3">
																	<label>Agencia Funeraria</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-1" style="text-align: center;">
																	<button class="btn btn-sm btn-danger mt25">
																		<i class="fa fa-search"></i>
																	</button>
																</div>
																<div class="col-lg-8">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Observaciones</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-12">
																	<textarea class="form-control form-control-sm m-input" rows="2"></textarea>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_4_2" role="tabpanel">
									<div class="row form-group">
										<div class="col-lg-5">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Servicios a Descargar</legend>
												<div class="col-lg-12">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						                				<div class="table-responsive">
						                					<table class="table">
						                						<thead>
						                							<th>Serv.</th>
						                							<th>Servicio</th>
						                							<th>Ctd</th>
						                							<th>P</th>
						                						</thead>
						                					</table>
						                				</div>
						                			</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-2">
											<div class="row">
												<div class="col-lg-12 advise">
													<button class="btn btn-danger btn-sm"><i class="fa fa-play"></i></button>
												</div>
												<div class="col-lg-12 advise">
													<button class="btn btn-danger btn-sm mt25"><i class="fa fa-forward"></i></button>
												</div>
											</div>
										</div>
										<div class="col-lg-5">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Servicios Descargados</legend>
												<div class="col-lg-12">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						                				<div class="table-responsive">
						                					<table class="table">
						                						<thead>
						                							<th>Serv.</th>
						                							<th>Servicio</th>
						                							<th>Ctd</th>
						                							<th>P</th>
						                						</thead>
						                					</table>
						                				</div>
						                			</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-12">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Espacio Anterior</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-4">
															<label>Camposanto</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>ESPERANZ ETERNA CAÑETE</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Plataforma</label>
															<select class="form-control form-control-sm m-input">
																<option>PLAT - 11 - MADRE DEL AMOR GERMOSO</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Área</label>
															<select class="form-control form-control-sm m-input">
																<option>ÁREA UNICA</option>
															</select>
														</div>
														<div class="col-lg-2">
															<label>Eje.Horiz.</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>A</option>
															</select>
														</div>
														<div class="col-lg-2">
															<label>Eje Vert.</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-2">
															<label>Espacio</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-1">
															<button class="btn btn-sm btn-danger mt25"><i class="fa fa-list"></i></button>
														</div>
														<div class="col-lg-3">
															<label>Tipo</label>
															<input type="text" class="form-control form-control-sm m-input" id="">
														</div>
														<div class="col-lg-2">
															<label>N° Nivel</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-12">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Espacio Nuevo</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-4">
															<label>Camposanto</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>ESPERANZ ETERNA CAÑETE</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Plataforma</label>
															<select class="form-control form-control-sm m-input">
																<option>PLAT - 11 - MADRE DEL AMOR GERMOSO</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Área</label>
															<select class="form-control form-control-sm m-input">
																<option>ÁREA UNICA</option>
															</select>
														</div>
														<div class="col-lg-2">
															<label>Eje.Horiz.</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>A</option>
															</select>
														</div>
														<div class="col-lg-2">
															<label>Eje Vert.</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-2">
															<label>Espacio</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-3">
															<label>Tipo</label>
															<input type="text" class="form-control form-control-sm m-input" id="">
														</div>
														<div class="col-lg-1">
															<label>N° Nivel</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-2">
															<label>Profundidad</label>
															<input type="text" class="form-control form-control-sm m-input" id="">
														</div>
													</div>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_4_3" role="tabpanel">
									<div class="row">
										<div class="col-lg-4">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Datos</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-12">
															<label>Beneficiario</label>
															<textarea class="form-control form-control-sm m-input" rows="3"></textarea>
														</div>
														<div class="col-lg-12">
															<label>Fecha Nacimiento</label>
															<div class="input-group date">
																<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_5" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
																<div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
																</div>
															</div>
														</div>
														<div class="col-lg-12">
															<label>Fecha Deceso</label>
															<div class="input-group date">
																<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_6" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
																<div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
											<div class="row">
												<div class="col-lg-4"></div>
												<div class="col-lg-8">
													<table>
														<tbody>
															<tr>
																<td>
																	<label class="label-checkbox">
																		Replicar Datos a Lapida
																	</label>
																</td>
																<td>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" name="">
																			<span></span>
																		</label>
																	</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="col-lg-8">
											<fieldset class="fieldFormHorizontal">
												<legend>&nbsp;</legend>
												<div style="height: 300px;"></div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_4_4" role="tabpanel">
									<div class="row">
										<div class="col-lg-12">
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="400">
				                				<div class="table-responsive">
													<table class="table">
														<thead>
															<th><i class="fa fa-check"></i></th>
															<th>Código</th>
															<th>Documento</th>
															<th>Usuario de Registro</th>
															<th>Fecha de Registro</th>
															<th></th>
														</thead>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="atzTrasladoInt">
						<div class="col-lg-12">
							<ul class="nav nav-tabs  m-tabs-line m-tabs-line--danger" role="tablist">
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_2_5_1" role="tab">
										General
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_5_2" role="tab">
										Detalle
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_5_3" role="tab">
										Lapida
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_5_4" role="tab">
										Control Documentario
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="m_tabs_2_5_1" role="tabpanel">
									<div class="row">
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">&nbsp;</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-3">
																	<label>N° Contrato</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-3">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-1">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<table class="mt25">
																		<tbody>
																			<tr>
																				<td>
																					<label class="label-checkbox">
																						Caso Morgue
																					</label>
																				</td>
																				<td>
																					<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																						<label>
																							<input type="checkbox" name="">
																							<span></span>
																						</label>
																					</span>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
																<div class="col-lg-3">
																	<label></label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-6">
																	<label>Tipo de Programa</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-1">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" name="">
																</div>
																<div class="col-lg-3">
																	<label>N° Orden Ingreso</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Datos Beneficiario</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-4">
																	<label>Tipo Documento</label>
																	<select class="form-control form-control-sm m-input"></select>
																</div>
																<div class="col-lg-3">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<button class="btn btn-sm btn-danger mt25">
																		<i class="fa fa-search"></i>
																	</button>
																</div>
																<div class="col-lg-3">
																	<label>Fecha Nacimiento</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-9">
																	<label>Apellido Paterno</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Sexo</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9">
																	<label>Apellido Materno</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Estado Civil</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9">
																	<label>Nombres</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Religión</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9 advise">
																	(Por favor ingresar los datos del beneficiario)
																</div>
																<div class="col-lg-3">
																	<label>Nacionalidad</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Datos Generales</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-2">
																	<label>Fecha Servicio</label>
																	<input class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<label>Fecha Deceso</label>
																	<input class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<label>Lugar Deceso</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-2">
																	<label>Motivo Deceso</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-2">
																	<label>Parentesco</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-2" style="text-align: center;">
																	<label style="margin-top: 6px;">
																		Titular Fallecido
																	</label>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" id="" >
																			<span class="jurid"></span>
																		</label>
																	</span>
																</div>
																<div class="col-lg-3">
																	<label>Agencia Funeraria</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-1" style="text-align: center;">
																	<button class="btn btn-sm btn-danger mt25">
																		<i class="fa fa-search"></i>
																	</button>
																</div>
																<div class="col-lg-8">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Observaciones</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-12">
																	<textarea class="form-control form-control-sm m-input" rows="2"></textarea>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_5_2" role="tabpanel">
									<div class="row form-group">
										<div class="col-lg-5">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Servicios a Descargar</legend>
												<div class="col-lg-12">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						                				<div class="table-responsive">
						                					<table class="table">
						                						<thead>
						                							<th>Serv.</th>
						                							<th>Servicio</th>
						                							<th>Ctd</th>
						                							<th>P</th>
						                						</thead>
						                					</table>
						                				</div>
						                			</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-2">
											<div class="row">
												<div class="col-lg-12 advise">
													<button class="btn btn-danger btn-sm"><i class="fa fa-play"></i></button>
												</div>
												<div class="col-lg-12 advise">
													<button class="btn btn-danger btn-sm mt25"><i class="fa fa-forward"></i></button>
												</div>
											</div>
										</div>
										<div class="col-lg-5">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Servicios Descargados</legend>
												<div class="col-lg-12">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						                				<div class="table-responsive">
						                					<table class="table">
						                						<thead>
						                							<th>Serv.</th>
						                							<th>Servicio</th>
						                							<th>Ctd</th>
						                							<th>P</th>
						                						</thead>
						                					</table>
						                				</div>
						                			</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-12">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Espacio Anterior</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-4">
															<label>Camposanto</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>ESPERANZ ETERNA CAÑETE</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Plataforma</label>
															<select class="form-control form-control-sm m-input">
																<option>PLAT - 11 - MADRE DEL AMOR GERMOSO</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Área</label>
															<select class="form-control form-control-sm m-input">
																<option>ÁREA UNICA</option>
															</select>
														</div>
														<div class="col-lg-2">
															<label>Eje.Horiz.</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>A</option>
															</select>
														</div>
														<div class="col-lg-2">
															<label>Eje Vert.</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-2">
															<label>Espacio</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-1">
															<button class="btn btn-sm btn-danger mt25"><i class="fa fa-list"></i></button>
														</div>
														<div class="col-lg-3">
															<label>Tipo</label>
															<input type="text" class="form-control form-control-sm m-input" id="">
														</div>
														<div class="col-lg-2">
															<label>N° Nivel</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-12">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Espacio Nuevo</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-4">
															<label>Camposanto</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>ESPERANZ ETERNA CAÑETE</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Plataforma</label>
															<select class="form-control form-control-sm m-input">
																<option>PLAT - 11 - MADRE DEL AMOR GERMOSO</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Área</label>
															<select class="form-control form-control-sm m-input">
																<option>ÁREA UNICA</option>
															</select>
														</div>
														<div class="col-lg-2">
															<label>Eje.Horiz.</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>A</option>
															</select>
														</div>
														<div class="col-lg-2">
															<label>Eje Vert.</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-2">
															<label>Espacio</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-1">
															<button class="btn btn-sm btn-danger mt25"><i class="fa fa-list"></i></button>
														</div>
														<div class="col-lg-2">
															<label>Tipo</label>
															<input type="text" class="form-control form-control-sm m-input" id="">
														</div>
														<div class="col-lg-1">
															<label>N° Nivel</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-2">
															<label>Profundidad</label>
															<input type="text" class="form-control form-control-sm m-input" id="">
														</div>
													</div>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_5_3" role="tabpanel">
									<div class="row">
										<div class="col-lg-4">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Datos</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-12">
															<label>Beneficiario</label>
															<textarea class="form-control form-control-sm m-input" rows="3"></textarea>
														</div>
														<div class="col-lg-12">
															<label>Fecha Nacimiento</label>
															<div class="input-group date">
																<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_5" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
																<div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
																</div>
															</div>
														</div>
														<div class="col-lg-12">
															<label>Fecha Deceso</label>
															<div class="input-group date">
																<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_6" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
																<div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
											<div class="row">
												<div class="col-lg-4"></div>
												<div class="col-lg-8">
													<table>
														<tbody>
															<tr>
																<td>
																	<label class="label-checkbox">
																		Replicar Datos a Lapida
																	</label>
																</td>
																<td>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" name="">
																			<span></span>
																		</label>
																	</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="col-lg-8">
											<fieldset class="fieldFormHorizontal">
												<legend>&nbsp;</legend>
												<div style="height: 300px;"></div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_5_4" role="tabpanel">
									<div class="row">
										<div class="col-lg-12">
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="400">
				                				<div class="table-responsive">
													<table class="table">
														<thead>
															<th><i class="fa fa-check"></i></th>
															<th>Código</th>
															<th>Documento</th>
															<th>Usuario de Registro</th>
															<th>Fecha de Registro</th>
															<th></th>
														</thead>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="atzServicioFun">
						<div class="col-lg-12">
							<ul class="nav nav-tabs  m-tabs-line m-tabs-line--danger" role="tablist">
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_2_6_1" role="tab">
										General
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_6_2" role="tab">
										Detalle
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="m_tabs_2_6_1" role="tabpanel">
									<div class="row">
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">&nbsp;</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-3">
																	<label>N° Contrato</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-3">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-1">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<table class="mt25">
																		<tbody>
																			<tr>
																				<td>
																					<label class="label-checkbox">
																						Caso Morgue
																					</label>
																				</td>
																				<td>
																					<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																						<label>
																							<input type="checkbox" name="">
																							<span></span>
																						</label>
																					</span>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
																<div class="col-lg-3">
																	<label></label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-6">
																	<label>Tipo de Programa</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-1">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" name="">
																</div>
																<div class="col-lg-3">
																	<label>N° Orden Ingreso</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Datos Beneficiario</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-4">
																	<label>Tipo Documento</label>
																	<select class="form-control form-control-sm m-input"></select>
																</div>
																<div class="col-lg-3">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2">
																	<button class="btn btn-sm btn-danger mt25">
																		<i class="fa fa-search"></i>
																	</button>
																</div>
																<div class="col-lg-3">
																	<label>Fecha Nacimiento</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-9">
																	<label>Apellido Paterno</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Sexo</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9">
																	<label>Apellido Materno</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-3">
																	<label>Estado Civil</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-7">
																	<label>Nombres</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-2" style="text-align: center;">
																	<label style="margin-top: 6px;">
																		Titular Fallecido
																	</label>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" id="" >
																			<span class="jurid"></span>
																		</label>
																	</span>
																</div>
																<div class="col-lg-3">
																	<label>Religión</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-9 advise">
																	(Por favor ingresar los datos del beneficiario)
																</div>
																<div class="col-lg-3">
																	<label>Nacionalidad</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Datos de Deceso</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-2">
																	<label>Fecha Deceso</label>
																	<input class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-4">
																	<label>Lugar Deceso</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-3">
																	<label>Motivo Deceso</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-3">
																	<label>Parentesco</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-12">
													<fieldset class="fieldFormHorizontal">
														<legend class="tittle-box">Datos de Servicio</legend>
														<div class="col-lg-12">
															<div class="row form-group">
																<div class="col-lg-3">
																	<label>Fecha Servicio</label>
																	<input type="date" class="form-control form-control-sm m-input" id="">
																</div>
																<div class="col-lg-6"></div>
																<div class="col-lg-3">
																	<div class="m-form__group form-group row">
																		<label class="col-lg-4 col-form-label" style="font-weight: 500; color: #000099;">
																			Destino:
																		</label>
																		<div class="col-lg-8">
																			<div class="m-radio-list">
																				<label class="m-radio">
																					<input type="radio" name="example_6" value="1">
																					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Horno Crematorio
																					<span></span>
																				</label>
																				<label class="m-radio">
																					<input type="radio" name="example_6" value="2">
																					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cementerio
																					<span></span>
																				</label>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-lg-8">
																	<label>Salón Veratorio</label>
																	<select class="form-control form-control-sm m-input" id=""></select>
																</div>
																<div class="col-lg-4">
																	<label>&nbsp;</label>
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
																<di class="col-lg-12">
																	<label>Observaciones</label>
																	<textarea class="form-control form-control-sm m-input" rows="2" id=""></textarea>
																</di>
															</div>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_6_2" role="tabpanel">
									<div class="row form-group">
										<div class="col-lg-5">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Servicios a Descargar</legend>
												<div class="col-lg-12">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						                				<div class="table-responsive">
						                					<table class="table">
						                						<thead>
						                							<th>Serv.</th>
						                							<th>Servicio</th>
						                							<th>Ctd</th>
						                							<th>P</th>
						                						</thead>
						                					</table>
						                				</div>
						                			</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-2">
											<div class="row">
												<div class="col-lg-12 advise">
													<button class="btn btn-danger btn-sm"><i class="fa fa-play"></i></button>
												</div>
												<div class="col-lg-12 advise">
													<button class="btn btn-danger btn-sm mt25"><i class="fa fa-forward"></i></button>
												</div>
											</div>
										</div>
										<div class="col-lg-5">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Servicios Descargados</legend>
												<div class="col-lg-12">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						                				<div class="table-responsive">
						                					<table class="table">
						                						<thead>
						                							<th>Serv.</th>
						                							<th>Servicio</th>
						                							<th>Ctd</th>
						                							<th>P</th>
						                						</thead>
						                					</table>
						                				</div>
						                			</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-12">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Espacio Anterior</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-4">
															<label>Camposanto</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>ESPERANZ ETERNA CAÑETE</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Plataforma</label>
															<select class="form-control form-control-sm m-input">
																<option>PLAT - 11 - MADRE DEL AMOR GERMOSO</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Área</label>
															<select class="form-control form-control-sm m-input">
																<option>ÁREA UNICA</option>
															</select>
														</div>
														<div class="col-lg-2">
															<label>Eje.Horiz.</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>A</option>
															</select>
														</div>
														<div class="col-lg-2">
															<label>Eje Vert.</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-2">
															<label>Espacio</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-1">
															<button class="btn btn-sm btn-danger mt25"><i class="fa fa-list"></i></button>
														</div>
														<div class="col-lg-3">
															<label>Tipo</label>
															<input type="text" class="form-control form-control-sm m-input" id="">
														</div>
														<div class="col-lg-2">
															<label>N° Nivel</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-12">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Espacio Nuevo</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-4">
															<label>Camposanto</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>ESPERANZ ETERNA CAÑETE</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Plataforma</label>
															<select class="form-control form-control-sm m-input">
																<option>PLAT - 11 - MADRE DEL AMOR GERMOSO</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label>Área</label>
															<select class="form-control form-control-sm m-input">
																<option>ÁREA UNICA</option>
															</select>
														</div>
														<div class="col-lg-2">
															<label>Eje.Horiz.</label>
															<select class="form-control form-control-sm m-input" id="">
																<option>A</option>
															</select>
														</div>
														<div class="col-lg-2">
															<label>Eje Vert.</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-2">
															<label>Espacio</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-3">
															<label>Tipo</label>
															<input type="text" class="form-control form-control-sm m-input" id="">
														</div>
														<div class="col-lg-1">
															<label>N° Nivel</label>
															<select class="form-control form-control-sm m-input" id=""></select>
														</div>
														<div class="col-lg-2">
															<label>Profundidad</label>
															<input type="text" class="form-control form-control-sm m-input" id="">
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
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" onclick="">
					Guardar
				</button>
			</div>
		</div>
	</div>
</div>