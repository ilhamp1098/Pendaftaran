<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard') ?  'active' : ''}}" aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/register*') ?  'active' : ''}}" href="/dashboard/register">
              User
            </a>
          </li>  

          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/wilayah*') ?  'active' : ''}}" href="/dashboard/wilayah">
              Wilayah
            </a>
          </li>        
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/pegawai*') ?  'active' : ''}}" href="/dashboard/pegawai">              
              Pegawai
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/pasien*') ?  'active' : ''}}" href="/dashboard/pasien">              
              Pasien
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/obat*') ?  'active' : ''}}" href="/dashboard/obat">              
              Obat
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/pendaftaran*') ?  'active' : ''}}" href="/dashboard/pendaftaran">              
              Pendaftaran
            </a>
          </li> 
          
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/tindakan*') ?  'active' : ''}}" href="/dashboard/tindakan">              
              Tindakan
            </a>
          </li>  
          
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/tagihan*') ?  'active' : ''}}" href="/dashboard/tagihan">              
              Tagihan
            </a>
          </li>            
          
        </ul> 
      </div>
    </nav>