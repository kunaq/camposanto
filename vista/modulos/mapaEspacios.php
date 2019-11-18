<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">Listado de Contratos</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="row">
				<div class="col-lg-12">
					<fieldset class="fieldFormHorizontal">
					<legend class="tittle-box">Filtros</legend>
						<div class="col-lg-12">
							<div class="row form-group">
								<div class="col-lg-3">
									<label>Camposanto</label>
									<select class="form-control form-control-sm m-input custom-select custom-select-danger"id="camposanto">
										<?php
										  	$tabla = "vtama_camposanto";
										  	$item1 = "cod_camposanto";
										 	$item2 = "dsc_camposanto";
										 	$prueba = controladorEmpresa::ctrCamposanto();
										  ?>
									</select>
								</div>
								<div class="col-lg-3">
									<label> Tipo plataforma:</label>
									<select class="form-control m-input m-select2 m-select2-general" name="tipoPlat" id="tipoPlat" onchange="buscaPlataforma(this.value);">
										<option value="">Tipo de plataforma</option>
										<option value="TP001">NICHO</option>
										<option value="TP002">PLATAFORMAS</option>
									</select>
								</div>
								<div class="col-lg-3">
									<label>Plataforma</label>
									<select class="form-control m-input m-select2 m-select2-general" name="plataforma" id="plataforma" onchange="buscaArea(this.value);">
										<option disabled value="">Plataforma</option>
									</select>
								</div>
								<div class="col-lg-3">
									<label>Área Plataform</label>
									<select class="form-control m-input m-select2 m-select2-general" name="area" id="area"onchange="creaMapa(this.value);">
										<option value="">Área</option>
									</select>	
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<br>
			<br>
			<br>
			<div class="row">
				<div class="col-lg-12">
					<div id="mapaEpacio"></div>
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
					<h4 id="numCttSideBar" style="display: inline;"></h4><h4 style="display: inline;"> - </h4><h4 id="codSerSideBar" style="display: inline;"></h4>
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active m-scrollable" id="m_quick_sidebar_tabs_contrato" role="tabpanel">
				<div class="row">
					<div class="col-lg-12">
						<table class="table">
							<tbody>
								<tr>
									<td class="leftText">Fecha Emisión</td>
									<td class="datosSideBar" id="fchEmiSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Fecha Activación</td>
									<td class="datosSideBar" id="fchActSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Fecha Resolución</td>
									<td class="datosSideBar" id="fchResSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Fecha Anulación</td>
									<td class="datosSideBar" id="fchAnuSideBar"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-lg-12 button-box" id="buttons-box">
					</div>
					<div class="col-lg-12">
						<label>Detalles</label>
					</div>
					<div class="col-lg-12">
						<table class="table">
							<tbody>
								<tr>
									<td class="leftText">Cliente</td>
									<td class="datosSideBar" id="clienteSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Tipo Necesidad</td>
									<td class="datosSideBar" id="tipoNecSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Vendedor</td>
									<td class="datosSideBar" id="vendedorSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Tipo Servicio</td>
									<td class="datosSideBar" id="tipoServSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">N° Cuotas</td>
									<td class="datosSideBar" id="numCuotasSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Total</td>
									<td class="datosSideBar" id="totalSideBar"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

include "modals/modalDetallesEspacio.php";

 ?>