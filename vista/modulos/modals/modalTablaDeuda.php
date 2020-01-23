
<div class="modal fade" id="m_modal_deuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Alerta por Deuda de Clientes
					<i class="fa fa-exclamation-triangle exclamation p-left10"></i>
					<i class="fa fa-exclamation-triangle exclamation"></i>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-2"><h6 class="text-blue">El cliente: </h6></div>
					<div class="col-lg-5"><h6 class="text-red" id="nombreCliDeu" style="float: left;"></h6></div>
				</div>
				<div class="row">
					<div class="col-lg-3"><h6 class="text-blue">Tiene una deuda pendiente de:</h6></div>
					<div class="col-lg-2"><h6 class="text-red" id="deudaTotal"></h6></div>
				</div>
				<div id="tablaDeuda">
					<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="250">
		                <div class="table-responsive">
		                    <table id="myTableDeuda" class="table-responsive-m myTableDeuda table-bordered" cellpadding="0" cellspacing="0" border="0" display="block" >
		                    	<thead>
			                        <tr>
			                          <th width="80" style="border-radius: 25px 0px 0px 0px;">Localidad</th>
			                          <th width="90">Contrato</th>
			                          <th width="30">N° Serv.</th>
			                          <th width="200">Servicio</th>
			                          <th width="150">Fecha de Activación</th>
			                          <th width="70">Deuda Total</th>
			                          <th width="30">Ctd. Total Cuotas</th>
			                          <th width="60">Deuda Vencida</th>
			                          <th width="30" style="border-radius: 0px 25px 0px 0px;">Ctd. Cuota(s) Vencida(s)</th>
			                        </tr>
		                    	</thead>
		                    	<tbody id="tbodyDeuda" style="height: 170px;">
		                    	</tbody>
			                    <tfoot>
			                      	<tr>
			                      		<td></td>
			                      		<td></td>
			                      		<td></td>
			                      		<td></td>
			                      		<td>Deuda Total --></td>
			                      		<td id="deuda_total_foot"></td>
			                      		<td></td>
			                      		<td id="deuda_vencida_foot"></td>
			                      		<td></td>
			                      	</tr>
			                    </tfoot>
		                  </table>
		              </div>
		          </div>
				</div>
			</div>
<!-- 			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div> -->
		</div>
	</div>
</div>