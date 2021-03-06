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
						<button type="button" class="btn btnGuardarKqPst m-btn" data-dismiss="modal">
							Aceptar
						</button>
					</div>
				</div>
			</div> 
		</div>	

		<!-- boton movilidad -->
		<div class="sidebar-wrapper stickBotonMovilidad"> 
			<a href="#container" class="btn btn-primary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill m-btn--air" data-toggle="m-tooltip" data-container="body" data-placement="left" title="" data-original-title="Separación de movilidades">
				<i class="fa fa-car"></i>
			</a>
		</div>
		<!-- fin boton movilidad -->

		<!-- leyenda -->
		<div class="sidebar-wrapper stickLeyendaIni" id="container-button"> 
			<a href="#container" class="btn btn-metal m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air toggle-collapse-resumen" onclick="toggleLeyendaIni(this)" id="toggle-button" data-toggle="m-tooltip" data-container="body" data-placement="left" title="" data-original-title="Leyenda">
				<i class="flaticon-info"></i>
			</a>
			<ul class="m-nav-sticky side-nav" id="leyendaIni" style="margin-top: -50px;">
				<li class="m-nav-sticky__item nav-item">
					<div class="row">
						<div class="col-lg-4 offset-lg-4"><b>LEYENDA</b></div>
					</div>
				</li>
				<li class="m-nav-sticky__item nav-item">
					<div class="row">
						<div class="col-md-1">
						<span class="m-badge" style="background-color: #8c9492"></span>
					</div>
						<div class="col-lg-10" style="text-align: left;">
							<p style="margin-bottom: 0;">SERVICIO DE INHUMACIÓN</p>
						</div>
					</div>
				</li>
				<li class="m-nav-sticky__item nav-item">
					<div class="row">
						<div class="col-md-1">
							<span class="m-badge" style="background-color: #34bfa3"></span>
						</div>
						<div class="col-lg-10" style="text-align: left;">
							<p style="margin-bottom: 0;">MISA / MISA EN ESPACIO</p>
						</div>
					</div>
				</li>
				<li class="m-nav-sticky__item nav-item">
					<div class="row">
						<div class="col-md-1">
							<span class="m-badge" style="background-color: #36a3f7"></span>
						</div>
						<div class="col-lg-10" style="text-align: left;">
							<p style="margin-bottom: 0;">TRASLADO INTERNO /EXTERNO</p>
						</div>
					</div>
				</li>
				<li class="m-nav-sticky__item nav-item" >
					<div class="row">
						<div class="col-md-1">
							<span class="m-badge" style="background-color: #444"></span>
						</div>
						<div class="col-lg-10" style="text-align: left;">
							<p style="margin-bottom: 0;">SERVICIO FUNERARIO</p>
						</div>
					</div>
				</li>
				<li class="m-nav-sticky__item nav-item" >
					<div class="row">
						<div class="col-md-1">
							<span class="m-badge" style="background-color: #ffb822"></span>
						</div>
						<div class="col-lg-10" style="text-align: left;">
							<p style="margin-bottom: 0;">SERVICIO DE FLORERIA</p>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<!-- fin leyenda -->

		<!-- END: Subheader -->
	</div>
</div>




