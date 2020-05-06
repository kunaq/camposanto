<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="sidebar-wrapper stickButtons" id="container-button">
			<ul>
				<li style="list-style: none;">
					<a href="#container" class="btn btnGuardarKqPst m-btn--square m-btn m-btn--icon btn-lg m-btn--icon-only" style="border-top-left-radius: .25rem !important;" data-toggle="m-tooltip" data-container="body" disabled data-placement="left" title="" data-original-title="Grabar cambios" id="guardarbtn" onclick="btnGuardarBloqueo();">
						<i class="fa fa-save"></i>
					</a>
				</li>
				<li style="list-style: none;" >
					<a href="#container" class="btn btnEditarKqPst2 m-btn--square m-btn m-btn--icon btn-lg m-btn--icon-only" style="border-bottom-left-radius: .25rem !important;" data-toggle="m-tooltip" data-container="body" data-placement="left" title="" data-original-title="Nueva busqueda" id="btnReseBloqEsp" onclick="resetBusqueda();">
						<i class="fa fa-sticky-note"></i>
					</a>
				</li>
			</ul> 					
		</div> 
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Bloqueo y desbloqueo de espacios
					</h3>
				</div>
			</div>
		</div>
		<!--end: Portlet Head-->
		<div class="m-portlet__body" style="padding-top: 0">

			<fieldset class="fieldFormHorizontal">
			<legend class="tittle-box">Espacio</legend>
				<div class="col-lg-12">
					<div class="row form-group">
						<div class="col-lg-3">
							<label>Camposanto</label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="camposantoBloqEsp" required id="camposantoBloqEsp" disabled="disabled">
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
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="tipoPlatBloqEsp"  id="tipoPlatBloqEsp" onchange="buscaPlataforma(this.value);">
								<option value="">Tipo de plataforma</option>
								<?php
						           $prueba = controladorEmpresa::ctrTipoPlataforma();
								  ?>
							</select>
						</div>
						<div class="col-lg-4">
							<label>Plataforma: </label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="plataformaBloqEsp" id="plataformaBloqEsp"  onchange="buscaArea(this.value);">
								<option disabled value="">Plataforma</option>
							</select>
							<input type="hidden" id="flg_nicho" name="flg_nicho">
						</div>
						<div class="col-lg-2">
							<label>Área: </label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="areaBloqEsp" id="areaBloqEsp"  onchange="buscaEjex(this.value);">
								<option value="">Área</option>
							</select>			
						</div>
					</div>
					<div class="row form-group">
						<div class="col-lg-2">
							<label>Eje Horiz:</label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="ejexBloqEsp" id="ejexBloqEsp"  onchange="buscaEjey(this.value);">
								<option disabled value="">Eje Hor.</option>
							</select>
						</div>
						<div class="col-lg-2">
							<label>Eje Vert:</label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="ejeyBloqEsp" id="ejeyBloqEsp"  onchange="buscaEspacio(this.value);">
								<option disabled value="">Eje Ver.</option>
							</select>
						</div>
						<div class="col-lg-3">
							<label>Espacio:</label>
							<select class="form-control form-control-sm m-input" name="espacioBloqEsp" id="espacioBloqEsp" onchange="buscanomEspacio(this.value);">
							</select>
							<input type="hidden" id="tipo_espacioBloqEsp" name="tipo_espacioBloqEsp">
							<input type="hidden" id="flg_libreBloqEsp" name="flg_libreBloqEsp">
							<input type="hidden" id="estado_espacioBloqEsp" name="estado_espacioBloqEsp">
							<input type="hidden" id="existeEvento" name="existeEvento">
							<input type="hidden" id="existeEventoBloqueo" name="existeEventoBloqueo">
							<input type="hidden" id="flg_bloqueo_resolucion" name="flg_bloqueo_resolucion">
							<input type="hidden" id="flg_bloqueado" name="flg_bloqueado">
						</div>
						<div class="col-lg-3">
							<div class="m-input-icon m-input-icon--right">
								<label>Tipo: </label>
								<input type="text" class="form-control form-control-sm m-input" name="tipoEspacioBloqEsp" id="tipoEspacioBloqEsp" disabled >
							</div>
						</div>
						<div class="col-lg-2">
							<br>
							<h4 id="estadoBloqEsp" class="estadoBloqEsp"></h4>
						</div>
					</div>
				</div>
			</fieldset>
			<fieldset class="fieldFormHorizontal">
			<legend class="tittle-box">Bloqueo / Desbloqueo</legend>
				<div class="col-lg-12">
					<div class="row form-group">
						<div class="col-lg-4">
							<label>Tipo bloqueo</label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="tipoBloqueo" required id="tipoBloqueo">
								<option value="">Seleccione...</option>
								<?php
									$tabla = "vtama_tipo_bloqueo";
									$item1 = "cod_tipo_bloqueo";
									$item2 = "dsc_tipo_bloqueo";
						            $prueba = controladorEmpresa::ctrSelects($tabla,$item1,$item2);
								?>
							</select>
							<input type="hidden" name="flg_bloqueo" id="flg_bloqueo">
							<input type="hidden" name="flg_desbloqueo" id="flg_desbloqueo">
						</div>
						<div class="col-lg-4">
							<label>Fecha evento:</label>
							<input type="text" class="form-control form-control-sm m-input" name="fchEvenBloqEsp" id="fchEvenBloqEsp" disabled >
						</div>
						<div class="col-lg-4">
							<label>Usuario:</label>
							<input type="text" class="form-control form-control-sm m-input" name="usuarioBloqEsp" id="usuarioBloqEsp" disabled >
						</div>
					</div>
					<div class="row form-group">
						<div class="col-lg-4">
							<label>Solicitante:</label>
							<div class="input-group m-input-group">
								<input type="text" class="form-control form-control-sm m-input" name="codSolicitanteBloqEsp" id="codSolicitanteBloqEsp" disabled>
								<div class="input-group-append">
									<span data-toggle="modal" data-target="#m_modal_4">
										<button type="button" class="btn btn-sm btnGuardarKqPst" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar vendedor" onclick="creaTablaVendedor('bloqueo');"> 
											<i class="fa fa-search">
											</i>
										</button>
									</span>
								</div>
							</div>
							<input type="hidden" id="cdtBloqueo" name="cdtBloqueo">
							<input type="hidden" id="cdtEspacioMes" name="cdtEspacioMes">
						</div>
						<div class="col-lg-8">
							<label>&nbsp;</label>
							<input type="text" class="form-control form-control-sm m-input" name="dscSolicitanteBloqEsp" id="dscSolicitanteBloqEsp" disabled>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-lg-12">
							<label>Observación:</label>
							<textarea class="form-control form-control-sm m-input" rows="3" name="obsvBloqEsp" id="obsvBloqEsp"></textarea>
						</div>
					</div>
				</div>
			</fieldset>
			<fieldset class="fieldFormHorizontal">
			<legend class="tittle-box">Historial</legend>
				<div class="col-lg-12">
					<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						<div class="table-responsive">
							<table class="table m-table">
								<thead>
									<th>Fecha evento</th>
									<th>Tipo bloqueo</th>
									<th>Usuario</th>
									<th>Solicitante</th>
									<th>Activo</th>
								</thead>
								<tbody id="bodyHistorialBloq">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</fieldset>

		</div>
		<!--End::Portlet Body-->
	</div> 
	<!--End::Main Portlet-->
</div>
</div>
<?php
include "modals/modalTablaTrabajadores.php";
 ?>