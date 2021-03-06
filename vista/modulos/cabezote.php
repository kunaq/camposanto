<?php 
include "modals/modalConfiguraciones.php"; ?>
<header id="m_header" class="m-grid__item m-header "  minimize-offset="200" minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-dark " style="padding: 0 4px; background: white;">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-stack__item--center m-brand__logo">
									<a href="inicio2" class="m-brand__logo-wrapper">
										<img src="vista/img/logo_muya_nombre-sf.png" style="width: 140px;">
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- BEGIN: Left Aside Minimize Toggle -->
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block" style="margin-bottom: 45px;color:#c99231; margin-left: 40px;">
										<i class="m-menu__ver-arrow la la-angle-double-left"></i>
										<i class="m-menu__ver-arrow la la-angle-double-right"></i>
									</a>
									<!-- END -->
									<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
									<!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>
						<!-- NOMBRE -->
						<div class="text-header"> 
							<h3>SG5 - GESTIÓN DE CAMPOSANTO </h3>
						</div>
						
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light" style="vertical-align: sub;">
											<!-- <div class="m-card-user__details"> -->
													<span class="user_name">
														<?php echo $_SESSION['nombre']; ?>
													</span>
													<p class="m--font-weight-300">
														<?php echo $_SESSION['dsc_localidad']; ?>
													</p>
											<!-- </div> -->
										</li>
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="vista/img/user_m_2.png" alt=""/>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="color: #ffffff;"></span>
												<div class="m-dropdown__inner" style="width: 10rem;float: right;">
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">
																		Section
																	</span>
																</li>
																<li class="m-nav__item">
																	<span data-toggle="modal" data-target="#m_modal_configuraciones">
																		<a href="#" class="m-nav__link">
																			<i class="m-nav__link-icon la la-cog"></i>
																			<span class="m-nav__link-title">
																				<span class="m-nav__link-wrap">
																					<span class="m-nav__link-text">
																						Mi Perfil
																					</span>
																				</span>
																			</span>
																		</a>
																	</span>
																</span>
															</a>
														</span>
													</li>
													<li class="m-nav__separator m-nav__separator--fit"></li>
													<li class="m-nav__item">
														<a class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-danger m-btn--bolder" onclick="cierraSesion();">
															Salir
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- END: Topbar -->
			</div>
		</div>
	</div>
</header>