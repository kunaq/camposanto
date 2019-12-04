<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">Refinanciamiento</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="row">
				<div class="col-lg-6">
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
								<legend>&nbsp;</legend>
								<div class="col-lg-12">
									<div class="row form-group">
										<div class="col-lg-6">
											<label>Motivo</label>
											<select type="text" class="form-control form-control-sm m-input" id=""></select>
										</div>
										<div class="col-lg-6">
											<label>Interés</label>
											<select type="text" class="form-control form-control-sm m-input" id=""></select>
										</div>
										<div class="col-lg-12" style="border-bottom: 1px solid #6161">
											<div class="row form-group">
												<div class="col-lg-6">
													<label>1er Vencimiento</label>
													<div class="input-group date">
														<input type="text" class="form-control m-input"  id="m_datepicker_1" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-calendar-check-o"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="col-lg-3">
													<label>CUI Ref</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>C x Emitir</label>
													<input type="text" class="form-control form-control-sm m-input" id="">
												</div>
											</div>
										</div>
										<div class="col-lg-12" style="border-bottom: 1px solid #6161">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Saldo Ctt.</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>FOMA</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>C. Total</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-3">
													<label>C. Emitida</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
											</div>
										</div>
										<div class="col-lg-12" style="text-align: center; vertical-align: middle; margin-top: 10px">
											<button class="btn btn-sm btnGuardarKqPst">Generar Cronograma</button>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-12">
							<fieldset class="fieldFormHorizontal">
								<legend class="tittle-box">Datos</legend>
								<div class="col-lg-12">
									<div class="row form-group">
										<div class="col-lg-4">
											<label>Localidad</label>
											<select type="text" class="form-control form-control-sm m-input" id="">
											</select>
										</div>
										<div class="col-lg-4">
											<label>Contrato</label>
											<input type="text" class="form-control form-control-sm m-input" id="">
										</div>
										<div class="col-lg-2">
											<label>&nbsp;</label>
											<input type="text" class="form-control form-control-sm m-input" id="">
										</div>
										<div class="col-lg-2">
											<label>&nbsp;</label>
											<input type="text" class="form-control form-control-sm m-input" id="">
										</div>
										<div class="col-lg-12">
											<label>Tipo</label>
											<input type="text" class="form-control form-control-sm m-input" id="">
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
											<table class="myTableSaldos">
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
										</div>
										<div class="col-lg-12">
											&nbsp;
										</div>
										<div class="col-lg-6">
											<label>Estado</label>
											<input type="text" class="form-control form-control-sm m-input" id="" disabled>
										</div>
										<div class="col-lg-6">
											<label>Moneda</label>
											<input type="text" class="form-control form-control-sm m-input" id="" disabled>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<ul class="nav nav-tabs  m-tabs-line m-tabs-line--danger" role="tablist">
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_2_1" role="tab">
								Refinanciamiento
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_2" role="tab">
								Cronograma Actual
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
							<div class="row">
								<div class="col-lg-4">
									<div class="row">
										<div class="col-lg-12">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Conformación</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-12">
															<table class="table">
																<thead>
																	<th>N°</th>
																	<th>Tipo de Servicio</th>
																</thead>
																<tbody style="height: 80px;">
																	<tr>
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
										<div class="col-lg-12">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">
													<table>
														<tbody>
															<tr>
																<td>Cuotas Definidas</td>
																<td>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger mt10">
																		<label class="cb">
																			<input type="checkbox" name="" id="cuoDefCheck" onchange="cuoDefinidas();">
																			<span></span>
																		</label>
																	</span>
																</td>
															</tr>
														</tbody>
													</table>
												</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-1"></div>
														<div class="col-lg-4 form-group">
															<label>Cuota Inicial</label>
														</div>
														<div class="col-lg-6 form-group">	
															<input type="text" class="form-control form-control-sm m-input" id="cuoInicial" disabled>
														</div>
														<div class="col-lg-1"></div>
														<div class="col-lg-1"></div>
														<div class="col-lg-4 form-group">
															<label>Cuota Final</label>
														</div>
														<div class="col-lg-6 form-group">
															<input type="text" class="form-control form-control-sm m-input" id="cuoFinal" disabled>
														</div>
														<div class="col-lg-1"></div>
														<div class="col-lg-1"></div>
														<div class="col-lg-4 form-group">
															<label>Valor de Cuota</label>
														</div>
														<div class="col-lg-6 form-group">
															<input type="text" class="form-control form-control-sm m-input" id="valCuota" disabled>
														</div>

														<div class="col-lg-2"></div>
														<div class="col-lg-8" style="text-align: center;">
															<button class="btn btn-sm btnGuardarKqPst mt25" id="btnGenCuoDef" disabled>Generar >>></button>
														</div>
														<div class="col-lg-2"></div>
													</div>
												</div>
											</fieldset>
										</div>
										<div class="col-lg-12">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Cronograma FOMA</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-2"></div>
														<div class="col-lg-8">
															<label>Total Cuotas</label>
															<input type="text" class="form-control form-control-sm m-input" id="">
														</div>
														<div class="col-lg-2"></div>
														<div class="col-lg-2"></div>
														<div class="col-lg-8" style="text-align: center;">
															<button class="btn btn-sm btnGuardarKqPst mt25">Generar >>></button>
														</div>
														<div class="col-lg-2"></div>
													</div>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="col-lg-8">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Detalle de Cuotas</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-12">
													<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="530">
						                				<div class="table-responsive">
															<table class="table">
																<thead>
																	<th>N° de Cuota</th>
																	<th>Tipo de Cuota</th>
																	<th>Estado</th>
																	<th>Fecha Vencimiento</th>
																	<th>Subtotal</th>
																	<th>Interes</th>
																	<th>I.G.V.</th>
																	<th>Total</th>
																	<th>Saldo</th>
																</thead>
																<tbody style="height: 450px;">
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
																<tfoot>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td>Total</td>
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
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
							<div class="row form-group">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Detalle de Cuotas - Cronograma Actual</legend>
										<div class="col-lg-12">
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="300">
				                				<div class="table-responsive">
													<table class="table">
														<thead>
															<th>N° Cuota</th>
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
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
</div>



<?php
// include "modals/modalObservacionCliente.php";
// include "modals/modalTablaDeuda.php";
 ?>