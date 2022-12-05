<div class="sidebar" data-color="warning" data-active-color="success">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <!-- <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div> -->
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          Papikos
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ request()->routeIs('mahasiswa.index') ? 'active':''}} ">
            <a href="{{ route('mahasiswa.index') }}">
              <i class="nc-icon nc-satisfied"></i>
              <p>Data Mahasiswa</p>
            </a>
          </li>
          <li>
          <li class="{{ request()->routeIs('pemilik.index') ? 'active':''}} ">
            <a href="{{ route('pemilik.index') }}">
              <i class="nc-icon nc-single-02"></i>
              <p>Data Pemilik</p>
            </a>
          </li>
          <li>
          <li class="{{ request()->routeIs('kost.index') ? 'active':''}} ">
            <a href="{{ route('kost.index') }}">
              <i class="nc-icon nc-istanbul"></i>
              <p>Kost</p>
            </a>
          </li>
        </ul>
      </div>
    </div>