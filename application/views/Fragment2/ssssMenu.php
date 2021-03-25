<div class="tab-menu-horizontal">
                     <div class="container">
                        <div class="row">      
                           <div class="iq-menu-horizontal-tab">
                              <nav class="iq-sidebar-menu">                     
                              <ul id="iq-sidebar-toggle" class="iq-menu d-flex justify-content-left">
                                 <li class="active">
                                    <a href="<?=base_url('FOController/')?>" class="active iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>Dashboard</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                 </li>
                                 <li class="active">
                                    <a href="#menu-design" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="true"><i class="ri-menu-3-line"></i><span>Customer</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                    <ul id="menu-design" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                       <li><a href="<?=base_url('FOController/request_customer')?>"><i class="ri-git-commit-line"></i>Request Customer</a></li>
                                       <li class="active"><a href="horizontal-top-menu.html"><i class="ri-text-spacing"></i>Daftar Customer</a></li>
                                       <!-- <li><a href="two-sidebar.html"><i class="ri-indent-decrease"></i>Two Sidebar</a></li> -->
                                       <!-- <li><a href="vertical-top-menu.html"><i class="ri-line-height"></i>Vertical block menu</a></li> -->
                                    </ul>
                                 </li>
                                 <li>
                                    <a href="#social" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-record-circle-line"></i><span>Social</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                    <ul id="social" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                       <li>
                                          <a href="#mailbox" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Email</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                          <ul id="mailbox" class="iq-submenu iq-submenu-data collapse" data-parent="#social">
                                             <li><a href="app/index.html">Inbox</a></li>
                                             <li><a href="app/email-compose.html">Email Compose</a></li>
                                          </ul>
                                       </li>
                                       <li><a href="chat.html">Chat</a></li>
                                       <li><a href="todo.html">Todo</a></li>
                                       <li><a href="calendar.html">Calendar</a></li>
                                       <li>
                                          <a href="#user-info" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>User</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                          <ul id="user-info" class="iq-submenu iq-submenu-data collapse" data-parent="#social">
                                             <li><a href="profile.html">User Profile</a></li>
                                             <li><a href="profile-edit.html">User Edit</a></li>
                                             <li><a href="add-user.html">User Add</a></li>
                                             <li><a href="user-list.html">User List</a></li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </li>

                                 <li class="active"> 
                                    <a href="#ui-elements" class=" active iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-pencil-ruler-line"></i><span>Daftar Pengajuan</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                 </li>
                                 <!-- <li>
                                    <a href="#forms" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-profile-line"></i><span>Forms</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                    <ul id="forms" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                       <li><a href="form-layout.html">Form Elements</a></li>
                                       <li><a href="form-validation.html">Form Validation</a></li>
                                       <li><a href="form-switch.html">Form Switch</a></li>
                                       <li><a href="form-chechbox.html">Form Checkbox</a></li>
                                       <li><a href="form-radio.html">Form Radio</a></li>
                                       <li>
                                          <a href="#forms-wizard" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Forms Wizard</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                          <ul id="forms-wizard" class="iq-submenu collapse iq-submenu-data" data-parent="#forms">
                                             <li><a href="form-wizard.html">Simple Wizard</a></li>
                                             <li><a href="form-wizard-validate.html">Validate Wizard</a></li>
                                             <li><a href="form-wizard-vertical.html">Vertical Wizard</a></li>
                                          </ul>
                                       </li>
                                        <li>
                                          <a href="#tables" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Table</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                          <ul id="tables" class="iq-submenu collapse iq-submenu-data" data-parent="#forms">
                                             <li><a href="tables-basic.html">Basic Tables</a></li>
                                             <li><a href="data-table.html">Data Table</a></li>
                                             <li><a href="table-editable.html">Editable Table</a></li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </li>
                                 <li>
                                    <a href="#Pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-record-circle-line"></i><span>Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                    <ul id="Pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                       <li>
                                          <a href="#charts" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Charts</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                          <ul id="charts" class="iq-submenu iq-submenu-data collapse" data-parent="#Pages">
                                             <li><a href="chart-morris.html">Morris Chart</a></li>
                                             <li><a href="chart-high.html">High Charts</a></li>
                                             <li><a href="chart-am.html">Am Charts</a></li>
                                             <li><a href="chart-apex.html">Apex Chart</a></li>
                                          </ul>
                                       </li>
                                       <li>
                                          <a href="#icons" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Icons</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                          <ul id="icons" class="iq-submenu iq-submenu-data collapse" data-parent="#Pages">
                                             <li><a href="icon-dripicons.html">Dripicons</a></li>
                                             <li><a href="icon-fontawesome-5.html">Font Awesome 5</a></li>
                                             <li><a href="icon-lineawesome.html">line Awesome</a></li>
                                             <li><a href="icon-remixicon.html">Remixicon</a></li>
                                             <li><a href="icon-unicons.html">unicons</a></li>
                                          </ul>
                                       </li>
                                       <li>
                                          <a href="#authentication" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Authentication</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                          <ul id="authentication" class="iq-submenu iq-submenu-data collapse" data-parent="#Pages">
                                             <li><a href="sign-in.html">Login</a></li>
                                             <li><a href="sign-up.html">Register</a></li>
                                             <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                             <li><a href="pages-confirm-mail.html">Confirm Mail</a></li>
                                             <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                          </ul>
                                       </li>
                                       <li>
                                          <a href="#map" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Maps</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                          <ul id="map" class="iq-submenu iq-submenu-data collapse" data-parent="#Pages">
                                             <li><a href="pages-map.html">Google Map</a></li>
                                             <li><a href="#">Vector Map</a></li>
                                          </ul>
                                       </li>
                                       <li>
                                          <a href="#extra-pages" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Extra Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                          <ul id="extra-pages" class="iq-submenu iq-submenu-data collapse" data-parent="#Pages">
                                             <li><a href="pages-timeline.html">Timeline</a></li>
                                             <li><a href="pages-invoice.html">Invoice</a></li>
                                             <li><a href="blank-page.html">Blank Page</a></li>
                                             <li><a href="pages-error.html">Error 404</a></li>
                                             <li><a href="pages-error-500.html">Error 500</a></li>
                                             <li><a href="pages-pricing.html">Pricing</a></li>
                                             <li><a href="pages-pricing-one.html">Pricing 1</a></li>
                                             <li><a href="pages-maintenance.html">Maintenance</a></li>
                                             <li><a href="pages-comingsoon.html">Coming Soon</a></li>
                                             <li><a href="pages-faq.html">Faq</a></li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </li> -->
                              </ul>
                           </nav>
                           </div>
                        </div>
                     </div>
                  </div>
     