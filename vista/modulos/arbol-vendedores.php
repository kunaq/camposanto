<div class="m-content" id="bodyArbVend"  style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Arbol de vendedores 
					</h3>
				</div>
			</div>
		</div>
		<!--End: Portlet Head-->
		<div class="m-portlet__body">
		<!--begin: Portlet Body-->	
			<!-- <div class="col-xl-12"> -->
				<div class="row">
					<div class="col-lg-5">
						<div class="row">
							<div class="col-lg-12">
								<fieldset class="fieldFormHorizontal">
									<div class="col-lg-12">
										<div class="row ">
											<div class="col-lg-8">
												<div class="m-input-icon m-input-icon--left px-0">
													<input type="text" id="nombreTrabajador" name="nombreTrabajador" class="form-control form-control-sm m-input">
													<span class="m-input-icon__icon m-input-icon__icon--left">
														<span>
															<i class="la la-search"></i>
														</span>
													</span>
												</div>
											</div>
											<div class="col-lg-4">
												<select id="edoTraArbVen" class="form-control form-control-sm ">
													<option value="0">TODOS</option>
													<option value="1">ACTIVO</option>
													<option value="2">INACTIVO</option>
												</select>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="490" style="border: 1px solid #e4e1e1;">
									<ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white ulListaKqPst ulListaVerTrabArbVen col-sm-2 col-md-12" id="listaTrabArbVen" style="border-radius: 3px;margin-bottom: 0; padding-right: 0; overflow-x:hidden; height: auto;">
										<li class="spanTextoActiveKq liListaKqPstTitulo">
											<div class="row">
												<div class="col-md-4"><b>Código</b></div>
												<div class="col-md-8"><b>Apellidos y Nombres</b></div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="row">
							<div class="col-lg-12">
								<fieldset class="fieldFormHorizontal">
									<legend class="tittle-box">Historial de Conformación</legend>
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-5">
												<div class="row">
													<div class="col-lg-2">
														<label>Año</label>
													</div>
													<div class="col-lg-8">
														<select class="form-control form-control-sm m-select2 m-select2-general" id="anioBuscaTraArbVen" class="anioBuscaTraArbVen">
															<?php
															$prueba = controladorEmpresa::ctrAnnoPeriodo();
														  ?>
														 </select>
													</div>
												</div>
											</div>
											<div class="col-lg-4"></div>
											<div class="col-lg-3">
												<p class="pull-right">
													<span data-toggle="modal" data-target="#m_modal_nvoConfigArbVen">
														<button type="button" disabled class="btn btn-sm btnGuardarKqPst" title="Nuevo" id="NvoConfArbVen"  style="margin-right:6px;"><i class="fa fa-plus"></i></button>
													</span>	
													<button type="button" disabled class="btn btn-sm btnEditarKqPst2" title="Modificar" onclick="validaModifArbol();" id="BtnModConfArbVen" style="margin-right:6px;"><i class="fa fa-pencil"></i></button>
													<button type="button" disabled class="btn btn-sm btn-danger" title="Eliminar" id="BtnEliConfArbVen" onclick="eliminaArbol();"><i class="fa fa-trash"></i></button>
												</p>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="195" style="border: 1px solid #e4e1e1;">
											<ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white ulListaKqPst ulListaHistConf col-sm-2 col-md-12" id="listaHistConf" style="border-radius: 3px;margin-bottom: 0; padding-right: 0; overflow-x:hidden; height: auto;">
												<li class="spanTextoActiveKq liListaKqPstTitulo">
													<div class="row">
														<div class="col-md-2"><b>N°</b></div>
														<div class="col-md-2"><b>Año</b></div>
														<div class="col-md-2"><b>Tipo</b></div>
														<div class="col-md-2"><b>Periodo</b></div>
														<div class="col-md-4"><b>Tipo de Comisionista</b></div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-12">
										<ul class="nav nav-tabs  m-tabs-line m-tabs-line--danger" role="tablist">
											<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_2_1" role="tab">
													General
												</a>
											</li>
											<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_2" role="tab">
													Contratos
												</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
												<div class="col-lg-12">
													<div class="form-group row">
														<input type="hidden" id="flgEstado" name="flgEstado">
														<input type="hidden" id="flg_modificacion_grupo" name="flg_modificacion_grupo">
														<input type="hidden" id="cod_trabajador" name="cod_trabajador">
														<input type="hidden" id="flg_activo" name="flg_activo">
														<div class="col-lg-2">
															<label>Año:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="numAnioArbVen" id="numAnioArbVen">
														</div>
														<div class="col-lg-2" style="padding-right: 0">
															<label>T. Período:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="tipoPeriodoArbVen" id="tipoPeriodoArbVen">
														</div>
														<div class="col-lg-2">
															<label>Período:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="periodoArbVen" id="periodoArbVen">
														</div>
													</div>
													<hr>
													<div class="form-group row">
														<div class="col-lg-2">
															<label>Grupo:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="codGrupoArbVen" id="codGrupoArbVen">
														</div>
														<div class="col-lg-8">
															<input type="text" disabled class="form-control form-control-sm m-input" name="dscGrupoArbVen" id="dscGrupoArbVen">
														</div>
													</div>
													<div class="form-group row">
														<div class="col-lg-2">
															<label>Comisionista:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="codComiArbVen" id="codComiArbVen">
														</div>
														<div class="col-lg-8">
															<input type="text" disabled class="form-control form-control-sm m-input" name="dscComiArbVen" id="dscComiArbVen">
														</div>
													</div>
													<div class="form-group row">
														<div class="col-lg-2">
															<label>Supervisor:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="codSupVenArbVen" id="codSupVenArbVen">
														</div>
														<div class="col-lg-8">
															<input type="text" disabled class="form-control form-control-sm m-input" name="dscSupArbVen" id="dscSupArbVen">
														</div>
													</div>
													<div class="form-group row">
														<div class="col-lg-2">
															<label>Jefe Ventas:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="codJefeVenArbVen" id="codJefeVenArbVen">
														</div>
														<div class="col-lg-8">
															<input type="text" disabled class="form-control form-control-sm m-input" name="dscJefeVentaArbVen" id="dscJefeVentaArbVen">
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
												<div class="row">
													<div class="col-lg-3 offset-lg-9 form-group">
														<!-- <p class="pull-right"> -->
															<select class="form-control form-control-sm m-select2 m-select2-general" id="edoCttoArbVen" style="width:100%" >
																<option value="0">TODOS</option>
																<option value="1">EMITIDOS</option>
																<option value="2">ACTIVADOS</option>
																<option value="3">RESUELTOS</option>
															</select>
														<!-- </p> -->
													</div>
													<div class="col-lg-12">
														<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="180">
															<ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white ulListaKqPst ulListaHistConf col-sm-2 col-md-12" id="listaCttos" style="border-radius: 3px;margin-bottom: 0; padding-right: 0; overflow-x:hidden; height: auto;">
																<li class="spanTextoActiveKq liListaKqPstTitulo">
																	<div class="row" style="color: black">
																		<div class="col-md-3"><b>Localidad</b></div>
																		<div class="col-md-3"><b>contrato</b></div>
																		<div class="col-md-1"><b>T. N.</b></div>
																		<div class="col-md-2"><b>Estado</b></div>
																		<div class="col-md-2"><b>Fecha</b></div>
																	</div>
																</li>
															</ul>
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
		<!--End: Portlet Body-->
	</div>
	<!--End::Main Portlet-->
</div>
</div>

<?php
include "modals/modalNvoConfigArbVend.php";
include "modals/modalTablaGrupo.php";
include "modals/modalTablaComisionista.php";
include "modals/modalTablaFueVentas.php";
?>