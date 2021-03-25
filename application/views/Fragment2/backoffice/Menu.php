<div class="tab-menu-horizontal">
   <div class="container">
      <div class="row">
         <div class="iq-menu-horizontal-tab">
            <nav class="iq-sidebar-menu">
               <ul id="iq-sidebar-toggle" class="iq-menu d-flex justify-content-left">
                  <li>
                     <a href="<?= base_url('BOController') ?>" class="active iq-waves-effect collapsed" data-toggle="" aria-expanded="false"><i class="ri-home-4-line"></i><span>Dashboard</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                  </li>
                  <li>
                     <a href="#social" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-record-circle-line"></i><span>Social</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="social" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li>
                           <a href="#mailbox" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><span>Email</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                           <ul id="mailbox" class="iq-submenu iq-submenu-data collapse" data-parent="#social">
                              <li><a href="app/index.html">Inbox</a></li>
                              <li><a href="app/email-compose.html">Email Compose</a></li>
                           </ul>
                        </li>
                        <li><a href="chat.html">Chat</a></li>
                        <li><a href="todo.html">Todo</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li>
                           <a href="#user-info" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><span>User</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
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
                     <a href="<?= base_url('BOController/pengajuan') ?>" class=" active iq-waves-effect collapsed" aria-expanded="false"><i class="ri-pencil-ruler-line"></i><span>Daftar Pengajuan</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                  </li>
               </ul>
            </nav>
         </div>
      </div>
   </div>
</div>