<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">Seguimiento de Contrato</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body" id="bodySegCtto">
			<div class="row">
				<div class="col-lg-12">
					<fieldset class="fieldFormHorizontal">
						<legend>&nbsp;</legend>
						<div class="col-lg-12">
							<div class="row form-group">
								<div class="col-lg-2">
									<label>Filtrar por:</label>
									<select class="form-control form-control-sm" onclick="filtro(this.value);">
										<option value="cliente">Cliente</option>
										<option value="contrato">Contrato(Afiliación)</option>
									</select>
								</div>
								<div class="col-lg-2" id="divTipoDoc">
									<label>Tipo Doc</label>
									<select type="text" class="form-control form-control-sm m-input" id="tipoDocSegCon">
										<option>Seleccione</option>
										<?php
											$prueba = controladorEmpresa::
											ctrtipoDoc();
										?> 
									</select>
								</div>
								<div class="col-lg-2" id="divNumDoc">
									<label>Numero Doc</label>
									<input type="text" class="form-control form-control-sm m-input" id="numDocSegCon">
								</div>
								<div class="col-lg-1" id="divBtnCli">
									<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									<button class="btn btn-sm btnGuardarKqPst" id="btnBuscarCliente"><i class="fa fa-search"></i></button>
								</div>
								<div class="col-lg-2" id="divLoc">
									<label>Localidad</label>
									<select type="text" class="form-control form-control-sm m-input" id="localidadSegCon">
										<?php
											$tabla = "vtama_localidad";
											$item1 = "cod_localidad";
											$item2 = "dsc_localidad";
											$prueba = controladorEmpresa::
											ctrSelects($tabla,$item1,$item2);
										?> 
									</select>
								</div>
								<div class="col-lg-2" id="divCtt">
									<label>Contrato</label>
									<input type="text" class="form-control form-control-sm m-input" id="cttSegCon">
								</div>
								<div class="col-lg-1" id="divBtnCtt">
									<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									<button class="btn btn-sm btnGuardarKqPst" id="btnBuscarContrato" onclick="getDatosCtt();"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<fieldset class="fieldFormHorizontal">
						<legend class="tittle-box">Principal</legend>
						<div class="col-lg-12">
							<div class="row form-group">
								<div class="col-lg-3">
									<label>Cliente</label>
									<input type="text" class="form-control form-control-sm m-input" id="dscCliSegCtt" disabled>
								</div>
								<div class="col-lg-2">
									<label>Contrato</label>
									<input type="text" class="form-control form-control-sm m-input" id="dscLocSegCtt" disabled>
								</div>
								<div class="col-lg-2">
									<label>&nbsp;</label>
									<input type="text" class="form-control form-control-sm m-input" id="numCttSegCtt" disabled>
								</div>
								<div class="col-lg-1">
									<label>&nbsp;</label>
									<input type="text" class="form-control form-control-sm m-input" id="tipCttSegCtt" disabled>
								</div>
								<div class="col-lg-3">
									<label>Programa</label>
									<input type="text" class="form-control form-control-sm m-input" id="progSegCtt" disabled>
								</div>
								<div class="col-lg-1">
									<label style="margin-top: 6px;">
										Modif.
									</label>
									<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
										<label>
											<input type="checkbox" id="modificadoSegCtt" disabled="" name="">
											<span class="jurid"></span>
										</label>
									</span>
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
								<div class="col-lg-10" id="divTableServicios">
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
											<table class="table">
												<thead>
													<th>Refinanciamiento</th>
												</thead>
												<tbody id="tbodyRef">
													<tr>
														<td id="numRef"></td>
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
				<div class="col-lg-12">
					<ul class="nav nav-tabs  m-tabs-line m-tabs-line--danger" role="tablist">
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_2_1" role="tab">
								Resumen
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_2" role="tab">
								Contrato
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_3" role="tab">
								Cuotas
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_4" role="tab">
								Comprobantes
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_5" role="tab">
								Uso Serv.
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_6" role="tab">
								Titular
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_7" role="tab">
								Gestión
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_8" role="tab">
								Beneficiario(s)
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_9" role="tab">
								Transferencia
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_10" role="tab">
								Observaciones
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_11" role="tab">
								C. Especiales
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_12" role="tab">
								G. Cartera
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Cuotas Pendientes</legend>
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-10">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						                				<div class="table-responsive" id="cuotasPendientes">
															<table class="table">
																<thead>
																	<th>Tipo</th>
																	<th>Cuota</th>
																	<th>Estado</th>
																	<th>Fecha Vencimiento</th>
																	<th>Fecha Cancelación</th>
																	<th>Subtotal</th>
																	<th>Interés</th>
																	<th>I.G.V.</th>
																	<th>Total</th>
																	<th>Saldo</th>
																	<th>Mora</th>
																</thead>
																<tbody id="tbodyCuotas">
																	<tr>
																		<td></td>
																		<td></td>		
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																</tbody>
																<tfoot>
																	<tr>
																		<td></td>
																		<td></td>		
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td>Total</td>
																		<td>-----></td>
																		<td id="total">0,00</td>
																		<td id="saldoTotal">0,00</td>
																		<td id="moraTotal">0,00</td>
																	</tr>
																</tfoot>
															</table>
														</div>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="row">
														<div class="col-lg-12">
															<i class="fa fa-circle" style="color: #FF0000"></i>&nbsp;&nbsp;&nbsp;Cuotas Vencidas
														</div>
														<div class="col-lg-12">
															<i class="fa fa-circle" style="color: #0050CC"></i>&nbsp;&nbsp;&nbsp;Cuotas por Vencer
															<br><br>
														</div>
														<div class="col-lg-12">
															<u>Tipo de Cuotas<br><br></u>
														</div>
														<div class="col-lg-12">
															ARM : Cuotas por Servicio.
														</div>
														<div class="col-lg-12">
															FMA :  Foma.
														</div>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-8">
									<div class="row">
										<div class="col-lg-12">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Cuotas</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-6">
															<div class="row">
																<div class="col-lg-12">
																	<label>Regulares</label>
																	<br>
																</div>
																<div class="col-lg-4">
																	<label>Total</label>
																	<input type="text" class="form-control form-control-sm m-input" id="cuoTotReg" disabled>
																</div>
																<div class="col-lg-4">
																	<label>Cancel.</label>
																	<input type="text" class="form-control form-control-sm m-input" id="cuoCanReg" disabled>
																</div>
																<div class="col-lg-4">
																	<label>Pendi.</label>
																	<input type="text" class="form-control form-control-sm m-input" id="cuoPenReg" disabled>
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="row">
																<div class="col-lg-12">
																	<label>FOMA</label>
																	<br>
																</div>
																<div class="col-lg-4">
																	<label>Total</label>
																	<input type="text" class="form-control form-control-sm m-input" id="cuoTotFOMA" disabled>
																</div>
																<div class="col-lg-4">
																	<label>Cancel.</label>
																	<input type="text" class="form-control form-control-sm m-input" id="cuoCanFOMA" disabled>
																</div>
																<div class="col-lg-4">
																	<label>Pendi.</label>
																	<input type="text" class="form-control form-control-sm m-input" id="cuoPenFOMA" disabled>
																</div>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-12">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Saldos</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-12">
															<table class="myTableEstado">
																<thead>
																	<th class="static">&nbsp;</th>
																	<th class="first-col">Subtotal</th>
																	<th>Interés</th>
																	<th>I.G.V.</th>
																	<th>Total</th>
																	<th>Emitido</th>
																	<th>Cancelado</th>
																	<th>Saldo</th>
																</thead>
																<tbody>
																	<tr>
																		<th scope="row" class="static">CUOI</th>
																		<td class="first-col">1.768,00</td>
																		<td>0,00</td>
																		<td>0,00</td>
																		<td>1.768,00</td>
																		<td>0,00</td>
																		<td>1.768,00</td>
																		<td>0,00</td>
																	</tr>
																	<tr>
																		<th scope="row" class="static">Financiado</th>
																		<td class="first-col">3.282,00</td>
																		<td>16,20</td>
																		<td>0,00</td>
																		<td>3.298,00</td>
																		<td>0,00</td>
																		<td>0,00</td>
																		<td>3.298,00</td>
																	</tr>
																	<tr>
																		<th scope="row" class="static">FOMA</th>
																		<td class="first-col">300,00</td>
																		<td>0,00</td>
																		<td>0,00</td>
																		<td>300,00</td>
																		<td>0,00</td>
																		<td>0,00</td>
																		<td>300,00</td>
																	</tr>
																</tbody>
															</table>
															<br>
														</div>
														<div class="col-lg-6">
															<div class="row">
																<div class="col-lg-2">
																	<label>Estado</label>
																</div>
																<div class="col-lg-8">
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="row">
																<div class="col-lg-2">
																	<label>Moneda</label>
																</div>
																<div class="col-lg-8">
																	<input type="text" class="form-control form-control-sm m-input" id="">
																</div>
															</div>
														</div>
													</div>	
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Detalle</legend>
										<div class="col-lg-12">
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="270">
												<div class="table-responsive">
													<table class="table">
														<thead>
															<th>Servicio</th>
															<th>Tipo Servicio</th>
															<th>Saldo Financiar</th>
														</thead>
														<tbody style="height: 170px;">
															<tr>
																<td>0</td>
																<td>DERECHO DE USO</td>
																<td>4.132,00</td>
															</tr>
														</tbody>
														<tfoot>
															<tr>
																<td></td>
																<td>Total:</td>
																<td>4.132,00</td>
															</tr>
														</tfoot>
													</table>
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
										<legend class="tittle-box">&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-2">
													<label>
														Propietario
													</label>
												</div>
												<div class="col-lg-3">
													<input type="text" class="form-control form-control-sm m-input" name="idPropietario" id="idPropietario" disabled>
												</div>
												<div class="col-lg-7">
													<input type="text" class="form-control form-control-sm m-input" name="dscPropietario" id="dscPropietario" disabled>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Espacio</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Camposanto</label>
													<input type="text" class="form-control form-control-sm m-input" id="campoSantoSegCtt" disabled>
												</div>
												<div class="col-lg-3">
													<label>Plataforma</label>
													<input type="text" class="form-control form-control-sm m-input" id="platSegCtt" disabled>
												</div>
												<div class="col-lg-3">
													<label>Área</label>
													<input type="text" class="form-control form-control-sm m-input" id="areaSegCtt" disabled>
												</div>
												<div class="col-lg-3">
													<label>Tipo de Espacio</label>
													<input type="text" class="form-control form-control-sm m-input" id="tipEspSegCtt" disabled>
												</div>
												<div class="col-lg-1">
													<label>Eje Hor.</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-1">
													<label>Eje Vert.</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-1">
													<label>Espacio</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-2">
													<button type="button" id="btn2Com" class="btn btn-sm btnGuardarKqPst mt25">
														<i class="fa fa-list"></i>
													</button>
													<button type="button" id="btn2Com" class="btn btn-sm btnGuardarKqPst mt25">
														<i class="fa fa-search"></i>
													</button>
												</div>
												<div class="col-lg-1">
													<label>Nivel</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Interés</label>
													<input type="text" class="form-control form-control-sm input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>Cuota Inicial</label>
													<input type="text" class="form-control form-control-sm input" id="" disabled>
												</div>												
												<div class="col-lg-3">
													<label>Subtotal</label>
													<input type="text" class="form-control form-control-sm input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>T. Necesidad</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>Saldo</label>
													<input type="text" class="form-control form-control-sm input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>I.G.V.</label>
													<input type="text" class="form-control form-control-sm input" id="" disabled>
												</div>												
												<div class="col-lg-3">
													<label>Total</label>
													<input type="text" class="form-control form-control-sm input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>Moneda</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="row">
									<ul class="nav nav-tabs  m-tabs-line m-tabs-line--warning" role="tablist">
										<li class="nav-item m-tabs__item">
											<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1" role="tab">Servicios Principales</a>
										</li>
										<li class="nav-item m-tabs__item">
										<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab">Servicio Incluidos</a>
										</li>
										<li class="nav-item m-tabs__item">
											<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_3" role="tab">Descuentos</a>
										</li>
										<li class="nav-item m-tabs__item">
										<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_4" role="tab">Endosos</a>
										</li>
									</ul>
									<div class="col-lg-12">
										<div class="tab-content">
											<div id="m_tabs_6_1" class="tab-pane active" role="tabpanel">
												<div class="col-lg-12">
													<div class="row">
															<div class="table-responsive">
																<table class="table m-table">
																	<thead>
																		<th>N°</th>
																		<th>Codigo</th>
																		<th>Descripción</th>
																		<th>Ctd</th>
																		<th>Ctd U.</th>
																		<th>Precio Venta</th>
																		<th>Cuoi Mín.</th>
																		<th>Cuoi</th>
																		<th>Subtotal</th>
																		<th>I.G.V.</th>
																		<th>Total</th>
																	</thead>
																	<tbody>
																		<tr>
																			<td>1</td>
																			<td>DU000035</td>
																			<td>POR SERVICIO DE DERECHO DE USO</td>
																			<td>1</td>
																			<td>0</td>
																			<td>9.300,00</td>
																			<td>3.815,00</td>
																			<td>3.815,00</td>
																			<td>7.600,00</td>
																			<td>0,00</td>
																			<td>7.600,00</td>
																		</tr>
																		<tr>
																			<td></td>
																		</tr>
																	</tbody>
																	<tfoot>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td>Total:</td>
																		<td>7.600,00</td>
																	</tfoot>
																</table>
															</div>
													</div>
												</div>
											</div>
											<div id="m_tabs_6_2" class="tab-pane" role="tabpanel">
												<div class="col-lg-12">
													<div class="row">
														<div class="table-responsive">
															<table class="table m-table">
																<thead>
																	<th>N°</th>
																	<th>Servicio Secundario</th>
																	<th>Servicio</th>
																	<th>Ctd</th>
																	<th>Ctd U.</th>
																	<th>Total Venta</th>
																</thead>
																<tbody>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																	<tr>
																		<td></td>
																	</tr>
																</tbody>
																<tfoot>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																</tfoot>
															</table>
														</div>
													</div>
												</div>
											</div>
											<div id="m_tabs_6_3" class="tab-pane" role="tabpanel">
												<div class="col-lg-12">
													<div class="row">
														<div class="table-responsive">
															<table class="table m-table">
																<thead>
																	<th>Usuario</th>
																	<th>F. Registro</th>
																	<th>Tipo de Descuento</th>
																	<th>%</th>
																	<th>Libre</th>
																	<th>Valor</th>
																	<th>Dscto.</th>
																</thead>
																<tbody>
																	<tr>
																		<td>TRAMOS</td>
																		<td>25/04/2019 16:53</td>
																		<td>DESCUENTO LIBRE</td>
																		<td><input type="checkbox" name=""></td>
																		<td><input type="checkbox" name=""></td>
																		<td>1.700,00</td>
																		<td>1.700,00</td>
																	</tr>
																	<tr>
																		<td></td>
																	</tr>
																</tbody>
																<tfoot>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td>Total:</td>
																	<td>1.700,00</td>
																</tfoot>
															</table>
														</div>
													</div>
												</div>
											</div>
											<div id="m_tabs_6_4" class="tab-pane" role="tabpanel">
												<div class="col-lg-12">
													<div class="row">
														<div class="table-responsive">
															<table class="table m-table">
																<thead>
																	<th>Uuario</th>
																	<th>F. Registro</th>
																	<th>Estado</th>
																	<th>F. Vencimiento</th>
																	<th>F. Cancelación</th>
																	<th>Entidad</th>
																	<th>Total</th>
																	<th>Saldo</th>
																	<th>Emitido</th>
																</thead>
																<tbody>
																	<tr>
																		<td>1</td>
																		<td>DU000035</td>
																		<td>POR SERVICIO DE DERECHO DE USO</td>
																		<td>1</td>
																		<td>9.300,00</td>
																		<td>3.815,00</td>
																		<td>7.600,00</td>
																		<td>0,00</td>
																		<td>7.600,00</td>
																	</tr>
																	<tr>
																		<td></td>
																	</tr>
																</tbody>
																<tfoot>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td>Total:</td>
																	<td>0,00</td>
																	<td>0,00</td>
																	<td>0,00</td>
																</tfoot>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_3" role="tabpanel">
							<div class="row form-group">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Cuotas(8)</legend>
										<div class="col-lg-12">
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="300">
				                				<div class="table-responsive">
													<table class="table">
														<thead>
															<th>N°</th>
															<th>Tipo de Cuota</th>
															<th>Estado</th>
															<th>Fecha Vencimiento</th>
															<th>Fecha Cancelación</th>
															<th>Subtotal</th>
															<th>Interes</th>
															<th>I.G.V.</th>
															<th>Total</th>
															<th>Saldo</th>
															<th>Emitido</th>
															<th>Cancelado</th>
															<th>Mora</th>
														</thead>
														<tbody style="height: 200px;">
															<tr>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
														</tbody>
														<tfoot>
															<tr>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td>Total</td>
																<td>0,00</td>
																<td>0,00</td>
																<td>0,00</td>
																<td>0,00</td>
																<td>0,00</td>
																<td>0,00</td>
																<td>0,00</td>
																<td>0,00</td>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-6">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Comprobante por cuota</legend>
										<div class="col-lg-12">
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
				                				<div class="table-responsive">
				                					<table class="table">
				                						<thead>
				                							<th>Comprobante</th>
				                							<th>Número</th>
				                							<th>NC</th>
				                							<th>F. Emisión</th>
				                							<th>M</th>
				                							<th>Total</th>
				                							<th>Saldo</th>
				                							<th>Estado</th>
				                						</thead>
				                					</table>
				                				</div>
				                			</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-6">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Cancelaciones</legend>
										<div class="col-lg-12">
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
				                				<div class="table-responsive">
				                					<table class="table">
				                						<thead>
				                							<th>Caja</th>
				                							<th>Trx</th>
				                							<th>Fecha</th>
				                							<th>F. Pago</th>
				                							<th>M</th>
				                							<th>Importe</th>
				                							<th>Imp S/.</th>
				                						</thead>
				                					</table>
				                				</div>
				                			</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_4" role="tabpanel">
							<div class="row">
								<div class="col-lg-9">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>
														Tipo Comprobante
													</label>
												</div>
												<div class="col-lg-4">
													<select type="text" class="form-control form-control-sm m-input" name="idPropietario" id="idPropietario">
														<option value=""></option>
														<?php
															$prueba = controladorEmpresa::ctrtipoDoc();
													 	?> 
													</select>
												</div>
												<div class="col-lg-1">
													<label>
														Número
													</label>
												</div>
												<div class="col-lg-4">
													<input type="text" class="form-control form-control-sm m-input" name="" id="">
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-3">
									<table style="margin-top: 5px;">
										<tbody>
											<tr>
												<td>
													<label class="m-checkbox">
														Mostrar Todos
													</label>
												</td>
												<td>
													<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
														<label>
															<input type="checkbox" name="" id="personaCheck" disabled="">
															<span></span>
														</label>
													</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-12">
									<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						               	<div class="table-responsive">
											<table class="table">
												<thead>
													<th>Tipo</th>
													<th>Número</th>
													<th>Deudor / Acreedor</th>
													<th>Estado</th>
													<th>Fecha Emisión</th>
													<th>Fecha Cancelación</th>
													<th>Mon</th>
													<th>Total</th>
													<th>Saldo</th>
												</thead>
												<tbody>
													<tr>
														<td></td>
														<td></td>		
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="row">
									<ul class="nav nav-tabs  m-tabs-line m-tabs-line--warning" role="tablist">
										<li class="nav-item m-tabs__item">
											<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_5_1" role="tab">Cancelaciones</a>
										</li>
										<li class="nav-item m-tabs__item">
										<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_5_2" role="tab">Nota de Crédito</a>
										</li>
									</ul>
									<div class="col-lg-12">
										<div class="tab-content">
											<div id="m_tabs_5_1" class="tab-pane active" role="tabpanel">
												<div class="col-lg-12">
													<div class="row">
															<div class="table-responsive">
																<table class="table m-table">
																	<thead>
																		<th>Caja</th>
																		<th>Trx</th>
																		<th>Usuario</th>
																		<th>Fecha</th>
																		<th>Forma de Pago</th>
																		<th>N° Documento</th>
																		<th>M</th>
																		<th>Importe</th>
																		<th>Imp S/.</th>
																	</thead>
																	<tbody>
																		<tr>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																		</tr>
																		<tr>
																			<td></td>
																		</tr>
																	</tbody>
																</table>
															</div>
													</div>
												</div>
											</div>
											<div id="m_tabs_5_2" class="tab-pane" role="tabpanel">
												<div class="col-lg-12">
													<div class="row">
														<div class="col-lg-6">
															<div class="table-responsive">
																<table class="table m-table">
																	<thead>
																		<th>N° Documento</th>
																		<th>Estado</th>
																		<th>F. Emisión</th>
																		<th>M</th>
																		<th>Total</th>
																		<th>Saldo</th>
																	</thead>
																	<tbody>
																		<tr>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																		</tr>
																		<tr>
																			<td></td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="table-responsive">
																<table class="table m-table">
																	<thead>
																		<th>Tipo</th>
																		<th>Número</th>
																		<th>Estado</th>
																		<th>F. Emisión</th>
																		<th>F. Cancelación</th>
																		<th>M</th>
																		<th>Total</th>
																		<th>Saldo</th>
																	</thead>
																	<tbody>
																		<tr>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																		</tr>
																		<tr>
																			<td></td>
																		</tr>
																	</tbody>
																</table>
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
						<div class="tab-pane" id="m_tabs_2_5" role="tabpanel">
							<div class="row">
								<div class="col-lg-4">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">&nbsp;</legend>
										<div class="col-lg-12">
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="695">
												<div class="table-responsive">
													<table class="table">
														<thead>
															<th>N°</th>
															<th>F. Servicio</th>
															<th>Tipo Autorización</th>
														</thead>
														<tbody style="height: 400px;">
															<tr>
																<td></td>
																<td></td>
																<td></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-8">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-8">
													<label>
														Tipo
													</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-4">
													<label>Autoriz.</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-8">
													<label>Estado</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-4">
													<label>F. Servicio</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Beneficiario</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-12">
													<label>Apellido Paterno</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-12">
													<label>Apellido Materno</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-12">
													<label>Nombre</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>Documento</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-6">
													<label>F. Nacimiento</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-6">
													<label>F. Deceso</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-6">
													<label>Lugar Deceso</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Espacio</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-6">
													<label>Camposanto</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-6">
													<label>Plataforma</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-6">
													<label>Área</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>Eje Horizontal</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>Eje Vertical</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-6">
													<label>Espacio</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-6">
													<label>T. Espacio</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-6">
													<label>Nivel</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-6">
													<label>Profundidad</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_6" role="tabpanel">
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Titular</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-2">
													<label>Cliente</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-5">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-1">
													<label style="margin-top: 6px;">
														Juridico
													</label>
													<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
														<label>
															<input type="checkbox" id="juridico" disabled="" name="">
															<span class="jurid"></span>
														</label>
													</span>
												</div>
												<div class="col-lg-2"></div>
												<div class="col-lg-2" style="text-align: right;">
													<span data-toggle="modal" data-target="#m_modal_deuda">
														<button type="button" class="m-btn btn btn-sm btnGuardarKqPst mt25" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Deuda Titular" onclick="">
															<i class="fa fa-list"></i>
														</button>
													</span>
													<span data-toggle="modal" data-target="#m_modal_observacion_cliente">
														<button type="button" class="m-btn btn btn-sm btnGuardarKqPst mt25" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Observaciones Cliente" onclick="">
															<i class="fa fa-user-o"></i>
														</button>
													</span>
												</div>
												<div class="col-lg-3">
													<label>Documento</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-6">
													<label>E-mail</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-8">
													<label>Dirección</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-2">
													<label>Telefono</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-2">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">2do Titular / Apoderado</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-2">
													<label>Cliente</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-5">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-1">
													<label style="margin-top: 6px;">
														Juridico
													</label>
													<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
														<label>
															<input type="checkbox" id="juridico" disabled="" name="">
															<span class="jurid"></span>
														</label>
													</span>
												</div>
												<div class="col-lg-2"></div>
												<div class="col-lg-2" style="text-align: right;">
													<span data-toggle="modal" data-target="#m_modal_deuda">
														<button type="button" class="m-btn btn btn-sm btnGuardarKqPst mt25" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Deuda Titular" onclick="">
															<i class="fa fa-list"></i>
														</button>
													</span>
													<span data-toggle="modal" data-target="#m_modal_observacion_cliente">
														<button type="button" class="m-btn btn btn-sm btnGuardarKqPst mt25" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Observaciones Cliente" onclick="">
															<i class="fa fa-user-o"></i>
														</button>
													</span>
												</div>
												<div class="col-lg-3">
													<label>Documento</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-6">
													<label>E-mail</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-8">
													<label>Dirección</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-2">
													<label>Telefono</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-2">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Aval</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-2">
													<label>Cliente</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-5">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-1">
													<label style="margin-top: 6px;">
														Juridico
													</label>
													<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
														<label>
															<input type="checkbox" id="juridico" disabled="" name="">
															<span class="jurid"></span>
														</label>
													</span>
												</div>
												<div class="col-lg-2"></div>
												<div class="col-lg-2" style="text-align: right;">
													<span data-toggle="modal" data-target="#m_modal_deuda">
														<button type="button" class="m-btn btn btn-sm btnGuardarKqPst mt25" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Deuda Titular" onclick="">
															<i class="fa fa-list"></i>
														</button>
													</span>
													<span data-toggle="modal" data-target="#m_modal_observacion_cliente">
														<button type="button" class="m-btn btn btn-sm btnGuardarKqPst mt25" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Observaciones Cliente" onclick="">
															<i class="fa fa-user-o"></i>
														</button>
													</span>
												</div>
												<div class="col-lg-3">
													<label>Documento</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-6">
													<label>E-mail</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-8">
													<label>Dirección</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-2">
													<label>Telefono</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-2">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_7" role="tabpanel">
							<div class="row">
								<div class="col-lg-9">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-2">
													<label>
														Canal de Venta
													</label>
												</div>
												<div class="col-lg-5">
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="sedeContrto" id="sedeContrato">
														<option>Selecciona</option>
														<?php
																// $tabla = "vtama_localidad";
																// $item1 = "cod_localidad";
																// $item2 = "dsc_localidad";
																// $prueba = controladorEmpresa::
																// ctrSelects($tabla,$item1,$item2);
														?>
													</select>
												</div>
												<div class="col-lg-2"></div>
												<div class="col-lg-3">
													<table>
														<tbody>
															<tr>
																<td>
																	<label class="">Agencia Funeraria&nbsp;</label>
																</td>
																<td>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" name="" id="observacionesCheck">
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
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Cobrador Asignado</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Cobrador</label>
													<input type="text" class="form-control form-control-sm m-input" name="codCobrador" id="codCobrador">
												</div>
												<div class="col-lg-1">
													<label>&nbsp;</label>
													<button class="btn btn-sm btnGuardarKqPst mt25"><i class="fa fa-search"></i></button>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreCobrador" id="nombreCobrador">
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Personal de Ventas</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Vendedor</label>
													<input type="text" class="form-control form-control-sm m-input" name="codVendedor" id="codVendedor">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreVendedor" id="nombreVendedor">
												</div>
												<div class="col-lg-3">
													<label>Grupo</label>
													<input type="text" class="form-control form-control-sm m-input" name="codGrupo" id="codGrupo">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreGrupo" id="nombreGrupo">
												</div>
												<div class="col-lg-3">
													<label>Tipo Comisionista</label>
													<input type="text" class="form-control form-control-sm m-input" name="codTipoComisionista" id="codTipoComisionista">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreTipoComisionista" id="nombreTipoComisionista">
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Conformación</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Supervisor</label>
													<input type="text" class="form-control form-control-sm m-input" name="codSupervisor" id="codSupervisor">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreSupervisor" id="nombreSupervisor">
												</div>
												<div class="col-lg-3">
													<label>Jefe de Ventas</label>
													<input type="text" class="form-control form-control-sm m-input" name="codJefeVentas" id="codJefeVentas">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreJefeVentas" id="nombreJefeVentas">
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Agencia Funeraria</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Descripcion</label>
													<input type="text" class="form-control form-control-sm m-input" name="codFuneraria" id="codFuneraria">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="dscFuneraria" id="dscFuneraria">
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-3" style="text-align: center; border: 1px solid #6161">
									<i class="fa fa-question"></i><br>
									Se muestra la conformación del equipo de venta correspondiente al vendedor que realizo la venta del contrato.
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_8" role="tabpanel">
							<div class="form-group m-form__group row">
								<div class="col-lg-5">
									<div class="m-form__group row">
										<table class="table m-table">
											<thead>
												<tr>
													<th>
														#
													</th>
													<th>
														Nombre
													</th>
													<th>
														Apellidos
													</th>
													<th>
														Username
													</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row">
													1
													</th>
													<td>
													Jhon
													</td>
													<td>
													Stone
													</td>
													<td>
														@jhon
													</td>
												</tr>
												<tr>
													<th scope="row">
														2
													</th>
													<td>
														Lisa
														</td>
													<td>
														Nilson
													</td>
													<td>
														@lisa
													</td>
												</tr>
												<tr>
													<th scope="row">
																		3
													</th>
													<td>
													Larry
													</td>
													<td>
													the Bird
													</td>
													<td>
														@twitter
													</td>
												</tr>
												<tr>
													<th scope="row">
														4
													</th>
													<td>
														Larry
													</td>
													<td>
														the Bird
													</td>
													<td>
														@twitter
													</td>
												</tr>
												<tr>
													<th scope="row">
														5
													</th>
													<td>
														Larry
													</td>
													<td>
														the Bird
													</td>
													<td>
														@twitter
													</td>
												</tr>
												<tr>
													<th scope="row">
														6
													</th>
													<td>
														Larry
													</td>
													<td>
														the Bird
													</td>
													<td>
														@twitter
													</td>
												</tr>
												<tr>
													<th scope="row">
														7
													</th>
													<td>
														Larry
													</td>
													<td>
														the Bird
													</td>
													<td>
														@twitter
													</td>
												</tr>
												<tr>
													<th scope="row">
														8
													</th>
													<td>
														Larry
													</td>
													<td>
														the Bird
													</td>
													<td>
														@twitter
													</td>
												</tr>
												<tr>
													<th scope="row">
														9
													</th>
													<td>
														Larry
													</td>
													<td>
														the Bird
													</td>
													<td>
														@twitter
													</td>
												</tr>
												<tr>
													<th scope="row">
														10
													</th>
													<td>
														Larry
													</td>
													<td>
														the Bird
													</td>
													<td>
														@twitter
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="col-lg-7">
									<div class="row">
										<div class="col-lg-12">
											<ul class="nav nav-tabs  m-tabs-line m-tabs-line--warning" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_4_1" role="tab">General</a>
												</li>
												<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_4_2" role="tab">Observaciones</a>
												</li>
											</ul>
										</div>
										<div class="col-lg-12">
											<div class="tab-content">
												<div id="m_tabs_4_1" class="tab-pane active" role="tabpanel">
													<div class="col-lg-12">
														<div class="row">
															<fieldset class="fieldFormHorizontal">
																<legend class="tittle-box">N° Servicio</legend>
																<div class="col-lg-12">
																	<div class="row form-group">
																		<div class="col-lg-6">
																			<label class="">
																				Tipo de documento: &nbsp;
																			</label>
																			<select class="form-control form-control-sm m-input custom-select custom-select-danger selectTipoDoc" id="tipoDocBenef" name="tipoDocBenef">
																				<option value="vacio">
																					Seleccione
																				</option>
																				<?php
																					$prueba = controladorEmpresa::
																					ctrtipoDoc();
																				?> 		
																			</select>
																		</div>
																		<div class="col-lg-6">
																			<label>
																				N° Documento:&nbsp;
																			</label>
																			<input type="text" class="form-control form-control-sm m-input">
																		</div>
																		<div class="col-lg-6">
																			<label class="">
																				Apellido paterno:
																			</label>
																			<input type="text" class="form-control form-control-sm m-input" id="apePatBenef">
																		</div>
																		<div class="col-lg-6">
																			<label>
																				Apellido Materno:
																			</label>
																			<input type="text" class="form-control form-control-sm m-input" id="apeMatBenef">
																		</div>
																		<div class="col-lg-12">
																			<label class="">
																				Nombres:
																			</label>
																			<input type="text" class="form-control form-control-sm m-input" id="nombreBenef">
																		</div>
																		<div class="col-lg-6">
																			<label>
																				Fecha de nacimiento:
																			</label>
																			<div class="input-group date">
																				<input type="text" class="form-control form-control-sm m-input" readonly="" placeholder="Seleccionar fecha" id="m_datepicker_4_1">
																				<div class="input-group-append">
																					<span class="input-group-text">
																						<i class="la la-calendar-check-o"></i>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-lg-6">
																			<label>
																					Fecha de deceso:
																				</label>
																			<div class="input-group date">
																				<input type="text" class="form-control form-control-sm m-input" readonly="" placeholder="Seleccionar fecha" id="m_datepicker_4_2">
																				<div class="input-group-append">
																					<span class="input-group-text">
																						<i class="la la-calendar-check-o"></i>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="col-lg-6">
																			<label class="">
																				Religión:
																			</label>
																			<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="religionBenef" id="religionBenef">
																				<option value="">
																					Seleccione
																				</option>
																					<?php
																			 		 	$tabla="vtama_religion";
																			 		 	$item1="cod_religion";
																			 		 	$item2="dsc_religion";
											 								 			$prueba=controladorEmpresa::ctrSelects($tabla,$item1,$item2);
																					?> 
																			</select>
																		</div>
																		<div class="col-lg-6">
																			<label class="">
																				Estado civil: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																			</label>
																			<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="ecivilNvoCliWiz" name="option">
																				<option value="">
																					Seleccione
																				</option>
																					<?php
														  							$prueba=controladorEmpresa::ctrestadocivil();
																				 	?> 
																			</select>
																		</div>
																		<div class="col-lg-6">
																			<label class="">
																				Sexo: &nbsp;
																			</label>
																			<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="option">
																				<option value="M">
																					Masculino
																				</option>
																				<option value="F">
																					Femenino
																				</option>
																			</select>
																		</div>
																		<div class="col-lg-6">
																			<label class="">
																				Parentescos: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																			</label>
																			<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="option">
																				<option value="">
																					Seleccione
																				</option>
																				<option>
																					Abuelo(a)
																				</option>
																				<option>
																					Conyugue
																				</option>
																				<option>
																					Esposo(a)
																				</option>
																				<option>
																					Hermano(a)
																				</option>
																				<option>
																					Madre
																				</option>
																				<option>
																					Padre
																				</option>
																				<option>
																					Otros
																				</option>
																				<option>
																					Titular
																				</option>
																			</select>
																		</div>
																		<div class="col-lg-6">
																			<label class="">
																				Lugar deceso: &nbsp;
																			</label>
																			<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="option">
																				<option value="">
																					Seleccione
																				</option>
																				<option>
																					1
																				</option>
																				<option>
																					2
																				</option>
																				<option>
																					3
																				</option>
																				<option>
																					4
																				</option>
																				<option>
																					5
																				</option>
																			</select>
																		</div>
																		<div class="col-lg-6">
																			<label>Motivo Deceso</label>
																			<select class="form-control form-control-sm m-input">
																				<option value="">Seleccione</option>
																			</select>
																		</div>
																		<div class="col-lg-3">
																			<label class="">
																				Peso: &nbsp;
																			</label>
																			<input type="text" class="form-control form-control-sm m-input" placeholder="">
																		</div>
																		<div class="col-lg-3">
																			<label class="">
																				Talla: &nbsp;
																			</label>
																			<input type="text" class="form-control form-control-sm m-input" placeholder="">
																		</div>
																		<div class="col-lg-6">
																			<table>
																				<tbody>
																					<tr>
																						<td>
																							<label class="m-checkbox">
																								¿Pasó autopsia?&nbsp;&nbsp;
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
															</fieldset>
														</div>
													</div>
												</div>
												<div id="m_tabs_4_2" class="tab-pane" role="tabpanel">
													<div class="col-lg-12">
														<div class="row">
															<div class="m-scrollable table-responsive" data-scrollbar-shown="true" data-scrollable="true" data-max-height="500">
																<table class="table m-table">
																	<thead>
																		<th>Tipo de Observación</th>
																		<th>Observación</th>
																		<th>Usuario</th>
																		<th>Fecha Registro</th>
																		<th>A</th>
																	</thead>
																	<tbody>
																		<tr>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																		</tr>
																		<tr>
																			<td></td>
																		</tr>
																	</tbody>
																	<tfoot>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																	</tfoot>
																</table>
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
						<div class="tab-pane" id="m_tabs_2_9" role="tabpanel">
							<div class="row">
								<div class="col-lg-3">
									<fieldset class="fieldFormHorizontal">
										<legend>&nbsp;</legend>
										<div class="col-lg-12">
											<div class="m-scrollable table-responsive" data-scrollbar-shown="true" data-scrollable="true" data-max-height="675">
												<table class="table">
													<thead>
														<th>Transferencia</th>
														<th></th>
													</thead>
													<tbody></tbody>
												</table>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-9">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">General</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Registro de Contrato</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-1">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>Fecha</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-2">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Datos del Solicitante</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-4">
													<label>Documento</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-4">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-4">
													<label>Relación</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-12">
													<label>Apellido y Nombres</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Datos del Fallecido</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-4">
													<label>Documento</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-4">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-4">
													<label>Relación</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-12">
													<label>Apellido y Nombres</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Resumen de la solicitud</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-2">
													<label>Detalle de la solicitud</label>
												</div>
												<div class="col-lg-5">
													<table style="margin-top: 5px;">
														<tbody>
															<tr>
																<td>
																	<label class="m-checkbox">
																		Estado de Cuenta al día del contrato
																	</label>
																</td>
																<td>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" name="" id="personaCheck" disabled="">
																			<span></span>
																		</label>
																	</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="col-lg-5">
													<table style="margin-top: 5px;">
														<tbody>
															<tr>
																<td>
																	<label class="m-checkbox">
																		¿Fallecido es el afiliado?
																	</label>
																</td>
																<td>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" name="" id="personaCheck" disabled="">
																			<span></span>
																		</label>
																	</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="col-lg-12">
													<textarea type="text" class="form-control form-control-sm m-input" id="" disabled></textarea>
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Datos del Fallecido</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-2">
													<label>Importe</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-4">
												</div>
												<div class="col-lg-3">
													<label>Fecha de transferencia</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-12">
													<label>Solicitante(egreso)</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_10" role="tabpanel">
									<div class="row">
										<div class="col-lg-4">
											<label class=" ">Área</label>
											<input type="text" class="form-control form-control-sm m-input" name="area" id="area">
										</div>
										<div class="col-lg-6"></div>
										<div class="col-lg-2">
											<table>
												<tbody>
													<tr>
														<td>
															<label class="m-checkbox">Mostrar Todas&nbsp;</label>
														</td>
														<td>
															<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																<label>
																	<input type="checkbox" name="" id="observacionesCheck">
																	<span></span>
																</label>
															</span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="col-lg-12">
											<br>
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
												<div class="table-responsive">
													<table class="table m-table">
														<thead>
															<th>N°</th>
															<th>Observación</th>
															<th>Usuario</th>
															<th>F. Registro</th>
															<th>Auto</th>
														</thead>
														<tbody>
															<tr>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td></td>
															</tr>
														</tbody>
														<tfoot>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
									</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_11" role="tabpanel">
							<div class="row">
										<div class="col-lg-12">
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
												<div class="table-responsive">
													<table class="table m-table">
														<thead>
															<th>N°</th>
															<th>Condición</th>
															<th>F. Registro</th>
															<th>F. Autorizado</th>
															<th>Usuario Reg</th>
															<th>Usuario Aut</th>
															<th>Observación</th>
															<th>A</th>
														</thead>
														<tbody>
															<tr>
																<td></td>
															</tr>
															<tr>
																<td></td>
															</tr>
														</tbody>
														<tfoot>
														<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_12" role="tabpanel">
							<div class="row">
								<div class="col-lg-12">
									<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
										<div class="table-responsive">
											<table class="table m-table">
												<thead>
													<th>Periodo</th>
													<th>Tipo Cartera</th>
													<th>Gestor</th>
													<th>Cuotas</th>
													<th>Deuda</th>
													<th>Cobrado</th>
													<th>Fecha Registro</th>
													<th>Acción</th>
													<th>Observaciones</th>
												</thead>
												<tbody>
													<tr>
														<td></td>
													</tr>
													<tr>
														<td></td>
													</tr>
												</tbody>
												<tfoot>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tfoot>
											</table>
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
</div>
</div>



<?php
include "modals/modalObservacionCliente.php";
include "modals/modalTablaDeuda.php";
 ?>