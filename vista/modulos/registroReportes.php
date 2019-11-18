<?php 
include "modals/modalTelereporte.php" ?>
<div class="m-content"  style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--full-height">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Registro de reportes (Teleporte)  
					</h3>
				</div>
			</div>
		</div>
		<!--End: Portlet Head-->
		<div class="m-portlet__body">
		<!--begin: Portlet Body-->	
			<div class="card card-transparent flex-row">			
				<div class="col-md-6" style="border-right: solid 1px #dfdfdf">
					<div class="form-group row">
						<p style="margin-left: 1rem; margin-top: 1rem;">Fecha de reporte</p>
					</div>
					<div class="form-group row">
						<div class="col-lg-2">
							<label>Desde:</label>
						</div>
						<div class="col-lg-4">
							<div class="input-group date">
								<input type="text" class="form-control form-control-sm m-input"  id="desdeTeleporte" name="desdeTeleporte" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="la la-calendar-check-o"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="col-lg-2">
							<label>Hasta:</label>
						</div>
						<div class="col-lg-4">
							<div class="input-group date">
								<input type="text" class="form-control form-control-sm m-input"  id="hastaTeleporte" name="hastaTeleporte" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="la la-calendar-check-o"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<p style="margin-left: 1rem; margin-top: 1rem;">Filtros</p>
					</div>
					<div class="form-group row">
						<div class="col-lg-2">
							<label>Beneficiario:</label>
						</div>
						<div class="col-lg-4">
							<input type="text" class="form-control form-control-sm m-input" name="" id="">
						</div>
						<div class="col-lg-2">
							<label>Agencia:</label>
						</div>
						<div class="col-lg-4">
							<input type="text" class="form-control form-control-sm m-input" name="" id="">
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="form-group row">
				<div class="col-md-12">
					<p class="pull-right">
						<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#repBenef" title="Nuevo reporte" id=""  style="margin-right:6px;">Nuevo reporte beneficiario (fallecido)<!-- <i class="fa fa-plus"></i> --></button>	
					</p>										
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-10 offset-md-2 table-responsive">
					<table class="table" style="width:100%" id="tabTelerepote">
						<thead>
							<tr>
								<th style="width: 3rem; text-align: center;padding: 0">#</th>
								<th style="width: 10rem; text-align: center;padding: 0">Fecha</th>
								<th style="width: 10rem; text-align: center;padding: 0">Origen</th>
								<th style="width: 10rem;text-align: center;padding: 0">Canal de Venta</th>
								<th style="width: 10rem; text-align: center;padding: 0">Beneficiario/Fallecido</th>
								<th style="width: 10rem; text-align: center;padding: 0">Agencia</th>
								<th style="width: 10rem; text-align: center;padding: 0">Vendedor</th>
							</tr>
						</thead>
						<tbody>
							<tr onclick="modalTelereporte();">
								<td>1</td>
								<td>20/11/2019</td>
								<td>VTA NUEVA</td>
								<td>REFERIDO</td>
								<td>JOSE PEREZ</td>
								<td>FUN. ASCANIO</td>
								<td>D. HUAMAN</td>
							</tr>
							<tr onclick="modalTelereporte();">
								<td>2</td>
								<td>20/11/2019</td>
								<td>VTA NUEVA</td>
								<td>REFERIDO</td>
								<td>JOSE PEREZ</td>
								<td>FUN. ASCANIO</td>
								<td>D. HUAMAN</td>
							</tr>
							<tr onclick="modalTelereporte();">
								<td>3</td>
								<td>20/11/2019</td>
								<td>VTA NUEVA</td>
								<td>REFERIDO</td>
								<td>JOSE PEREZ</td>
								<td>FUN. ASCANIO</td>
								<td>D. HUAMAN</td>
							</tr>
							<tr onclick="modalTelereporte();">
								<td>4</td>
								<td>20/11/2019</td>
								<td>VTA NUEVA</td>
								<td>REFERIDO</td>
								<td>JOSE PEREZ</td>
								<td>FUN. ASCANIO</td>
								<td>D. HUAMAN</td>
							</tr>
							<tr onclick="modalTelereporte();">
								<td>5</td>
								<td>20/11/2019</td>
								<td>VTA NUEVA</td>
								<td>REFERIDO</td>
								<td>JOSE PEREZ</td>
								<td>FUN. ASCANIO</td>
								<td>D. HUAMAN</td>
							</tr>
							<tr onclick="modalTelereporte();">
								<td>6</td>
								<td>20/11/2019</td>
								<td>VTA NUEVA</td>
								<td>REFERIDO</td>
								<td>JOSE PEREZ</td>
								<td>FUN. ASCANIO</td>
								<td>D. HUAMAN</td>
							</tr>
						</tbody>
					</table>
				</div>				
			</div>
		</div>
	</div>
</div>
</div>