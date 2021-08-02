      <div id="layoutDrawer_nav">
         <!-- Drawer navigation-->
         <nav class="drawer accordion drawer-light bg-white" id="drawerAccordion">
            <div class="drawer-menu">
               <div class="nav">
                  <!-- Drawer section heading (Account)-->
                  <div class="drawer-menu-heading d-sm-none">Account</div>
                  <!-- Drawer link (Notifications)-->
                  <a class="nav-link d-sm-none" href="#!">
                     <div class="nav-link-icon"><i class="material-icons">notifications</i></div>
                     Notifications
                  </a>
                  <!-- Drawer link (Messages)-->
                  <a class="nav-link d-sm-none" href="#!">
                     <div class="nav-link-icon"><i class="material-icons">mail</i></div>
                     Messages
                  </a>
                  <!-- Divider-->
                  <div class="drawer-menu-divider d-sm-none"></div>
                  <!-- Drawer section heading (Interface)-->
                  <div class="drawer-menu-heading">Основное</div>
                  <a class="nav-link" href="{{route('news')}}" target="_blank">
                     <div class="nav-link-icon"><i class="material-icons">language</i></div>
                     Мой сайт
                  </a>
                  <a class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif"
                     href="{{route('admin.categories.index')}}">
                     <div class="nav-link-icon"><i class="material-icons">dashboard</i></div>
                     Категории
                  </a>
                  <!-- Drawer link (Overview)-->
                  <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif"
                     href="{{route('admin.news.index')}}">
                     <div class="nav-link-icon"><i class="material-icons">dashboard</i></div>
                     Новости
                  </a>
                  <a class="nav-link @if(request()->routeIs('admin.rss.*')) active @endif"
                     href="{{route('admin.rss.index')}}">
                     <div class="nav-link-icon"><i class="material-icons">dashboard</i></div>
                     RSS-ленты
                  </a>
               </div>
            </div>
            <!-- Drawer footer        -->
            <div class="drawer-footer border-top">
               <div class="d-flex align-items-center">
                  <i class="material-icons text-muted">account_circle</i>
                  <div class="ms-3">
                     <div class="caption">Logged in as:</div>
                     <div class="small fw-500">Start Bootstrap</div>
                  </div>
               </div>
            </div>
         </nav>
      </div>