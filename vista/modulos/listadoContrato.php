<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--full-height">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">Listado de Contratos</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="formFiltroContrato">
				<form class="filtroContrato">
					<div class="row">
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-2">
									<label class="tittle-box">Fecha</label>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4">
									<label>Tipo Fecha</label>
									<select class="form-control m-input custom-select custom-select-danger" name="tipoFecha" id="tipoFecha" onchange="creaTablaContrato();">
										<option value="GEN">Fecha de Generación</option>
										<option value="EMI">Fecha de Emisión</option>		
										<option value="ACT">Fecha de Activación</option>
									</select>
								</div>
								<div class="col-lg-4">
									<label>Desde</label>
									<div class="input-group date">
										<input type="text" class="form-control m-input" id="m_datepicker_1" data-date-format="dd/mm/yyyy" value="<?php echo date('d/m/Y',strtotime(date('m/01/Y'))); ?>" onchange="creaTablaContrato();" />
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="la la-calendar-check-o"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<label>Hasta</label>
									<div class="input-group date">
										<input type="text" class="form-control m-input" id="m_datepicker_2" data-date-format="dd/mm/yyyy" value="<?php echo date('d/m/Y',strtotime(date('m/30/Y'))); ?>" onchange="creaTablaContrato();"/>
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="la la-calendar-check-o"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-2 tittle-box">Cliente</div>
							</div>
							<div class="row">
								<div class="col-lg-3">
									<label>Codigo</label>
									<input type="text" class="form-control m-input" name="codCliCon" id="codCliCon" disabled onchange="creaTablaContrato();">
								</div>
								<div class="col-lg-7">
									<label>Apellidos y Nombres</label>
									<input type="text" class="form-control m-input" name="nombreCliCon" id="nombreCliCon" disabled>
								</div>
								<div class="col-lg-1">
									<label>&nbsp;</label>
									<span data-toggle="modal" data-target="#m_modal_2">
										<button type="button" class="m-btn btn btn-danger" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar cliente" onclick="creaTablaCliente('contrato');">
											<i class="la la-search"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-2 tittle-box">Filtros Varios</div>
							</div>
							<div class="row">
								<div class="col-lg-3">
									<label>Localidad</label>
									<select class="form-control m-input custom-select custom-select-danger" name="localidad" id="localidad" onchange="creaTablaContrato();">
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
									<label>Saldo</label>
									<select class="form-control m-input custom-select custom-select-danger" name="saldo" id="saldo" onchange="">
										<option value="">Todos</option>
										<option value="SI">Con Saldo</option>
										<option value="NO">Sin saldo</option>
									</select>
								</div>
								<div class="col-lg-2">
									<label>N° Contrato</label>
									<input type="text" class="form-control m-input" name="numContrato" id="numContrato" onchange="creaTablaContrato();">
								</div>
								<div class="col-lg-1">
									<label>Tipo Nec.</label>
									<select class="form-control m-input custom-select custom-select-danger" name="tipoNec" id="tipoNec" onchange="creaTablaContrato();">
										<option value="">Selecciona</option>
										<option value="NI">NI</option>
										<option value="NF">NF</option>
									</select>
								</div>
								<div class="col-lg-3">
									<label>Tipo Servicio</label>
									<select class="form-control m-input custom-select custom-select-danger" name="tipoServ" id="tipoServ" onchange="creaTablaContrato();">
										<option value="">Selecciona</option>
										<?php
											$tabla = "vtama_tipo_servicio";
											$item1 = "cod_tipo_servicio";
											$item2 = "dsc_tipo_servicio";
											$prueba = controladorEmpresa::
											ctrSelects($tabla,$item1,$item2);
										?>
									</select>
								</div>
							</div>
						</div>
					</div>	
				</form>
				<br>
				<br>
				<br>
				<div id="tablaContrato"></div>
			</div>
		</div>
	</div>
</div>



<?php 
include "modals/modalTablaClientes.php";
include "modals/modalEditContrato.php";
include "modals/modalResolucionContrato.php";
 ?>