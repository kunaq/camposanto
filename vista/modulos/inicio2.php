<div class="m-content" style="width: calc(100%); height: calc(100%);">
		<!--Begin::Section-->
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Portlet-->
				<div class="m-portlet  m-portlet--full-height" id="m_portlet">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon">
									<i class="flaticon-calendar"></i>
								</span>
								<h3 class="m-portlet__head-text">
									Visor de prestación de servicios
								</h3>
							</div>
						</div>
					</div>
					<div class="m-portlet__body">
						<div id="calendar"></div>
					</div>
				</div>
				<!--end::Portlet-->
			</div>
		</div>
		<div class="modal fade" id="m_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" id="headerModalVerSerInicio">
						<h5 class="modal-title" id="exampleModalLabel" style="color: white">
							
						</h5>
						<button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white; margin-top: inherit;">
							<span aria-hidden="true">
								&times;
							</span>
						</button>
					</div>
					<div class="modal-body" id="eventoDescripcion" style="height: 420px;">

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							Aceptar
						</button>
					</div>
				</div>
			</div> 
		</div>	

		<!-- leyenda -->
		<div class="sidebar-wrapper stickResumen" id="container-button"> 
				<a href="#container" class="btn btn-outline-metal m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x m-btn--pill m-btn--air toggle-collapse-resumen" onclick="toggleLeyendaIni(this)" id="toggle-button">
					<i class="flaticon-info"></i>
				</a>
				<ul class="m-nav-sticky side-nav" id="leyendaIni" style="margin-top: 30px;">
					<li class="m-nav-sticky__item nav-item">
						<div class="row">
							<div class="col-lg-4 offset-lg-4"><b>Leyenda</b></div>
						</div>
					</li>
					<li class="m-nav-sticky__item nav-item">
						<div class="row">
							<div class="col-md-1">
							<span class="m-badge m-badge--success"></span>
						</div>
							<div class="col-lg-7">
								<input type="text" size="3" maxlength="3" disabled class="form-control form-control-sm m-input" id="imp_cobertura" name="imp_cobertura" placeholder="0,00" style="text-align: right;">
							</div>
						</div>
					</li>
					<li class="m-nav-sticky__item nav-item">
						<div class="row">
							<div class="col-md-1">
							<span class="m-badge" style="color: #f4516c"></span>
						</div>
							<div class="col-lg-7">
								<p>AUT. DE SERVICIO DE INHUMACIÓN</p>
							</div>
						</div>
					</li>
					<li class="m-nav-sticky__item nav-item">
						<div class="row">
							<div class="col-md-1">
							<span class="m-badge m-badge--success"></span>
						</div>
							<div class="col-lg-7">
								<input type="text" disabled class="form-control form-control-sm m-input" id="cuitotal" name="cuitotal" placeholder="0,00" style="text-align: right;">
							</div>
						</div>
					</li>
					<li class="m-nav-sticky__item nav-item">
						<div class="row">
							<div class="col-md-1">
							<span class="m-badge m-badge--success"></span>
						</div>
							<div class="col-lg-7">
								<input type="text" size="3" maxlength="3" disabled class="form-control form-control-sm m-input" id="total1" name="total1" placeholder="0,00" style="text-align: right;">
							</div>
						</div>
					</li>
					<li class="m-nav-sticky__item nav-item" >
						<div class="row">
							<div class="col-md-1">
								<span class="m-badge m-badge--success"></span>
							</div>
							<div class="col-lg-7">
								<input type="text" size="3" maxlength="3" disabled class="form-control form-control-sm m-input" id="saldopagar" name="saldopagar" placeholder="0,00" style="text-align: right;">
								<input type="hidden" id="imp_subtotal" name="imp_subtotal">
								<input type="hidden" id="imp_igv" name="imp_igv">
							</div>
						</div>
					</li>
				</ul>
			</div>
		<!-- fin leyenda -->

		<!-- END: Subheader -->
	</div>
</div>




