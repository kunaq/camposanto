<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">Visor de Uso de Servicios</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="row">
				<div class="col-lg-4">
					<fieldset class="fieldFormHorizontal">
						<div class="row" style="margin-top: 1rem;">
							<div class="col-lg-6">
								<div class="col-lg-12 form-group">
									<label>Fecha de Servicio</label>
									<div class="input-group date">
										<input type="text" class="form-control form-control-sm m-input"  id="fechVPS" data-date-format="dd/mm/yyyy" value="" autocomplete="off"/>
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="la la-calendar-check-o"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-lg-12 form-group">
									<label>Localidad</label>
									<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="localidadVPS" id="localidadVPS" onchange="">
										<?php
											$tabla = "vtama_localidad";
											$item1 = "cod_localidad";
											$item2 = "dsc_localidad";
											$prueba = controladorEmpresa::
											ctrSelects($tabla,$item1,$item2);
										?>
									</select>
								</div>
							</div>
						</div>
					</fieldset>
					<div class="row ">
						<div class="col-lg-12">
							<div class="m-input-icon m-input-icon--left px-0">
								<input type="text" id="buscaBenefVPS" name="buscaBenefVPS" class="form-control form-control-sm m-input mayuscula">
								<span class="m-input-icon__icon m-input-icon__icon--left">
									<span>
										<i class="la la-search"></i>
									</span>
								</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="27rem" style="border: 1px solid #e4e1e1;">
								<ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white ulListaKqPst ulListaBenefVSP col-sm-2 col-md-12" id="listaBenefVSP" style="border-radius: 3px;margin-bottom: 0; padding-right: 0; overflow-x:hidden; height: auto;">
									<li class="spanTextoActiveKq liListaKqPstTitulo">
										<div class="row">
											<div class="col-md-2"><b>Hora</b></div>
											<div class="col-md-2"><b>Tipo Aut</b></div>
											<div class="col-md-2"><b>Estado</b></div>
											<div class="col-md-6"><b>Beneficiario (fallecido)</b></div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<fieldset class="fieldFormHorizontal">
						<legend>&nbsp;</legend>
						<div class="col-lg-12" style="height: 35rem;">
							<table class="table">
								<thead>
									<th>Hora</th>
									<th>FU</th>
									<th>IN</th>
									<th>ME</th>
									<th>MI</th>
									<th>TI</th>
									<th>TE</th>
								</thead>
								<tbody style="font-size: 0.5rem;">
									<tr>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td onclick="mostrarSidebar('0000000434',3);">(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
									</tr>
									<tr>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td onclick="mostrarSidebar('0000000434',3);">(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
									</tr>
									<tr>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td>(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
										<td onclick="mostrarSidebar('0000000434',3);">(1)<br>QUINTANILLA ALVARADO VDA DE OLIVERA</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td>Total</td>
										<td>0</td>
										<td>0</td>
										<td>0</td>
										<td>0</td>
										<td>0</td>
										<td>0</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="m_quick_sidebar-contrato" class="m-quick-sidebar-contrato m-quick-sidebar-contrato--tabbed m-quick-sidebar-contrato--skin-light">
	<div class="m-quick-sidebar-contrato__content">
		<span id="m_quick_sidebar-contrato_close" class="m-quick-sidebar-contrato__close" onclick="hideSidebar();">
			<i class="la la-close"></i>
		</span>
		<ul id="m_quick_sidebar-contrato_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--danger" role="tablist">
			<li class="nav-item m-tabs__item">
				<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_quick_sidebar_tabs_contrato" role="tab">
					<h4 id="numCttSideBarVPS" style="display: inline;"></h4><h4 style="display: inline;"> - </h4><h4 id="codSerSideBarVPS" style="display: inline;"></h4>
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active m-scrollable" id="m_quick_sidebar_tabs_contrato" role="tabpanel">
				<div class="row">
					<div class="col-lg-2">
						<label>Tipo</label>
					</div>
					<div class="col-lg-10">
						<input type="text" class="form-control form-control-sm m-input" id="dsc_autorizacionVPS" name="dsc_autorizacionVPS" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2">
						<label>Autorización</label>
					</div>
					<div class="col-lg-5">
						<input type="text" class="form-control form-control-sm m-input" id="localidadBenefVPS" name="localidadBenefVPS" disabled>
					</div>
					<div class="col-lg-5">
						<input type="text" class="form-control form-control-sm m-input" id="numUsoServicioVPS" name="numUsoServicioVPS" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2">
						<label>Contrato</label>
					</div>
					<div class="col-lg-5">
						<input type="text" class="form-control form-control-sm m-input" id="localidadCttoVPS" name="localidadCttoVPS" disabled>
					</div>
					<div class="col-lg-1">
						<input type="text" class="form-control form-control-sm m-input" id="tipoNecVPS" name="tipoNecVPS" disabled>
					</div>
					<div class="col-lg-3">
						<input type="text" class="form-control form-control-sm m-input" id="numCttoSideVPS" name="numCttoSideVPS" disabled>
					</div>
					<div class="col-lg-1">
						<input type="text" class="form-control form-control-sm m-input" id="numServSideVPS" name="numServSideVPS" disabled>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5 button-box">
                        <a href="seguimientoContrato?localidad=00001&amp;contrato=0000001784" target="_blank">
                        	<button type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" data-container="body" data-placement="top" title="Seguimiento">
	                            <i class="la la-eye"></i>
	                        </button>
	                    </a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
<?php

// include "modals/modalVisorServicio.php";



 ?>