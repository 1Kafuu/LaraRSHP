<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
  class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0">
  <!-- SIDEBAR HEADER -->
  <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
    class="flex items-center gap-2 pt-8 sidebar-header pb-7">
    <a href="index.html">
      <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
        <img class="dark:hidden" src="{{ asset('image/logo/logo.svg') }}" alt="Logo" />
        <img class="hidden dark:block" src="{{ asset('image/logo/logo-dark.svg') }}" alt="Logo" />
      </span>

      <img class="logo-icon" :class="sidebarToggle ? 'lg:block' : 'hidden'"
        src="{{ asset('image/logo/logo-icon.svg') }}" alt="Logo" />
    </a>
  </div>
  <!-- SIDEBAR HEADER -->

  <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
    <!-- Sidebar Menu -->
    <nav x-data="{selected: $persist('Dashboard')}">
      <!-- Menu Group -->
      <div>
        <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
          <span class="menu-group-title" :class="sidebarToggle ? 'lg:hidden' : ''">
            MENU
          </span>

          <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'" class="mx-auto fill-current menu-group-icon"
            width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
              fill="" />
          </svg>
        </h3>

        <ul class="flex flex-col gap-4 mb-6">
          <!-- Menu Item Dashboard -->
          <li>
            <a href="{{ route('dashboard') }}" @click="selected = (selected === 'Dashboard' ? '':'Dashboard')"
              class="menu-item group"
              :class=" (selected === 'Dashboard') || (page === 'dashboard') ? 'menu-item-active' : 'menu-item-inactive'">
              <svg
                :class="(selected === 'Dashboard') || (page === 'dashboard') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                  fill="currentColor" />
              </svg>

              <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                Dashboard
              </span>
            </a>
          </li>
          <!-- Menu Item Dashboard -->

          <li>
            <a href="{{ route('datauser') }}" @click="selected = (selected === 'DataUser' ? '':'DataUser')"
              class="menu-item group"
              :class=" (selected === 'DataUser') || (page === 'datauser') ? 'menu-item-active' : 'menu-item-inactive'">
              <svg
                :class="(selected === 'DataUser') || (page === 'datauser') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
              </svg>

              <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                Data User
              </span>
            </a>
          </li>

          <!-- Menu Item Data Role User -->
          <li>
            <a href="#" @click.prevent="selected = (selected === 'Role' ? '':'Role')" class="menu-item group"
              :class=" (selected === 'Role') || (page === 'datarole' || page === 'dataroleuser') ? 'menu-item-active' : 'menu-item-inactive'">
              <svg
                :class="(selected === 'Role') || (page === 'datarole' || page === 'dataroleuser') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11 21H5.6C5.03995 21 4.75992 21 4.54601 20.891C4.35785 20.7951 4.20487 20.6422 4.10899 20.454C4 20.2401 4 19.9601 4 19.4V17.6841C4 17.0485 4 16.7306 4.04798 16.4656C4.27087 15.2344 5.23442 14.2709 6.46558 14.048C6.5425 14.0341 6.6237 14.0242 6.71575 14.0172C6.94079 14 7.05331 13.9914 7.20361 14.0026C7.35983 14.0143 7.4472 14.0297 7.59797 14.0722C7.74302 14.1131 8.00429 14.2315 8.52682 14.4682C8.98953 14.6778 9.48358 14.8304 10 14.917M19.8726 15.2038C19.8044 15.2079 19.7357 15.21 19.6667 15.21C18.6422 15.21 17.7077 14.7524 17 14C16.2923 14.7524 15.3578 15.2099 14.3333 15.2099C14.2643 15.2099 14.1956 15.2078 14.1274 15.2037C14.0442 15.5853 14 15.9855 14 16.3979C14 18.6121 15.2748 20.4725 17 21C18.7252 20.4725 20 18.6121 20 16.3979C20 15.9855 19.9558 15.5853 19.8726 15.2038ZM15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
              </svg>

              <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                Role
              </span>

              <svg class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                :class="[(selected === 'Role') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]"
                width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>

            <!-- Dropdown Menu Start -->
            <div class="overflow-hidden transform translate" :class="(selected === 'Role') ? 'block' :'hidden'">
              <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                <li>
                  <a href="{{ route('datarole') }}" class="menu-dropdown-item group"
                    :class="page === 'datarole' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                    Data Role
                  </a>
                </li>
              </ul>

              <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                <li>
                  <a href="{{ route('dataroleuser') }}" class="menu-dropdown-item group"
                    :class="page === 'dataroleuser' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                    Data Role User
                  </a>
                </li>
              </ul>
            </div>
            <!-- Dropdown Menu End -->
          </li>
          <!-- Menu Item Data Role User -->

          <!-- Menu Item Tables -->
          <li>
            <a href="#" @click.prevent="selected = (selected === 'Hewan' ? '':'Hewan')" class="menu-item group"
              :class="(selected === 'Hewan') || (page === 'datapet' || page === 'datapemilik' || page === 'datajenishewan' || page === 'datarashewan') ? 'menu-item-active' : 'menu-item-inactive'">
              <svg
                :class="(selected === 'Hewan') || (page === 'datapet' || page === 'datapemilik' || page === 'datajenishewan' || page === 'datarashewan') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4.41003 16.75C4.17003 19.64 6.35003 22 9.25003 22H14.04C17.3 22 19.54 19.37 19 16.15C18.43 12.77 15.17 10 11.74 10C8.02003 10 4.72003 13.04 4.41003 16.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10.47 7.5C11.8507 7.5 12.97 6.38071 12.97 5C12.97 3.61929 11.8507 2.5 10.47 2.5C9.08926 2.5 7.96997 3.61929 7.96997 5C7.96997 6.38071 9.08926 7.5 10.47 7.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.3 8.69995C18.4046 8.69995 19.3 7.80452 19.3 6.69995C19.3 5.59538 18.4046 4.69995 17.3 4.69995C16.1955 4.69995 15.3 5.59538 15.3 6.69995C15.3 7.80452 16.1955 8.69995 17.3 8.69995Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 12.7C21.8284 12.7 22.5 12.0284 22.5 11.2C22.5 10.3715 21.8284 9.69995 21 9.69995C20.1716 9.69995 19.5 10.3715 19.5 11.2C19.5 12.0284 20.1716 12.7 21 12.7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M3.96997 10.7C5.07454 10.7 5.96997 9.80452 5.96997 8.69995C5.96997 7.59538 5.07454 6.69995 3.96997 6.69995C2.8654 6.69995 1.96997 7.59538 1.96997 8.69995C1.96997 9.80452 2.8654 10.7 3.96997 10.7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
              </svg>

              <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                Hewan
              </span>

              <svg class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                :class="[(selected === 'Hewan') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]"
                width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>

            <!-- Dropdown Menu Start -->
            <div class="overflow-hidden transform translate" :class="(selected === 'Hewan') ? 'block' :'hidden'">

              <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                <li>
                  <a href="{{ route('datapemilik') }}" class="menu-dropdown-item group"
                    :class="page === 'datapemilik' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                    Pemilik
                  </a>
                </li>
              

              
                <li>
                  <a href="{{ route('datapet') }}" class="menu-dropdown-item group"
                    :class="page === 'datapet' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                    Pet
                  </a>
                </li>
              

              
                <li>
                  <a href="{{ route('datajenishewan') }}" class="menu-dropdown-item group"
                    :class="page === 'datajenishewan' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                    Jenis Hewan
                  </a>
                </li>
    

                <li>
                  <a href="{{ route('datarashewan') }}" class="menu-dropdown-item group"
                    :class="page === 'datarashewan' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                    Ras Hewan
                  </a>
                </li>
              </ul>
            </div> 
            <!-- Dropdown Menu End -->
          </li>
          <!-- Menu Item Tables -->

          <!-- Menu Item Tindakan Medis -->
          <li>
            <a href="#" @click.prevent="selected = (selected === 'Tindakan Medis' ? '':'Tindakan Medis')" class="menu-item group"
              :class="(selected === 'Tindakan Medis') || (page === 'datakategori' || page === 'datakategoriklinis' || page === 'datakodetindakan') ? 'menu-item-active' : 'menu-item-inactive'">
              <svg
                :class="(selected === 'Tindakan Medis') || (page === 'datakategori' || page === 'datakategoriklinis' || page === 'datakodetindakan') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M8.50391 4.25C8.50391 3.83579 8.83969 3.5 9.25391 3.5H15.2777C15.4766 3.5 15.6674 3.57902 15.8081 3.71967L18.2807 6.19234C18.4214 6.333 18.5004 6.52376 18.5004 6.72268V16.75C18.5004 17.1642 18.1646 17.5 17.7504 17.5H16.248V17.4993H14.748V17.5H9.25391C8.83969 17.5 8.50391 17.1642 8.50391 16.75V4.25ZM14.748 19H9.25391C8.01126 19 7.00391 17.9926 7.00391 16.75V6.49854H6.24805C5.83383 6.49854 5.49805 6.83432 5.49805 7.24854V19.75C5.49805 20.1642 5.83383 20.5 6.24805 20.5H13.998C14.4123 20.5 14.748 20.1642 14.748 19.75L14.748 19ZM7.00391 4.99854V4.25C7.00391 3.00736 8.01127 2 9.25391 2H15.2777C15.8745 2 16.4468 2.23705 16.8687 2.659L19.3414 5.13168C19.7634 5.55364 20.0004 6.12594 20.0004 6.72268V16.75C20.0004 17.9926 18.9931 19 17.7504 19H16.248L16.248 19.75C16.248 20.9926 15.2407 22 13.998 22H6.24805C5.00541 22 3.99805 20.9926 3.99805 19.75V7.24854C3.99805 6.00589 5.00541 4.99854 6.24805 4.99854H7.00391Z"
                  fill="currentColor" />
              </svg>

              <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                Tindakan Medis
              </span>

              <svg class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                :class="[(selected === 'Tindakan Medis') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]"
                width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>

            <!-- Dropdown Menu Start -->
            <div class="overflow-hidden transform translate" :class="(selected === 'Tindakan Medis') ? 'block' :'hidden'">
              <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                <li>
                  <a href="{{ route('datakategori') }}" class="menu-dropdown-item group"
                    :class="page === 'datakategori' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                    Data Kategori
                  </a>
                </li>

                <li>
                  <a href="{{ route('datakategoriklinis') }}" class="menu-dropdown-item group"
                    :class="page === 'datakategoriklinis' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                    Data Kategori Klinis
                  </a>
                </li>

                <li>
                  <a href="{{ route('datakodetindakan') }}" class="menu-dropdown-item group"
                    :class="page === 'datakodetindakan' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                    Data Kode Tindakan
                  </a>
                </li>
              </ul>
            </div>
            <!-- Dropdown Menu End -->
          </li>
          <!-- Menu Item Temu Dokter -->
          <li>
            <a href="#" @click.prevent="selected = (selected === 'Riwayat Periksa' ? '':'Riwayat Periksa')" class="menu-item group"
              :class="(selected === 'Riwayat Periksa') || (page === 'datatemu' || page === 'datarekammedis') ? 'menu-item-active' : 'menu-item-inactive'">
              <svg
                :class="(selected === 'Tindakan Medis') || (page === 'datatemu' || page === 'datarekammedis') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="22" height="24" viewBox="-5 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="medical-receipt-3" transform="translate(-2 -2)"> <rect id="secondary" fill="#2ca9bc" width="10" height="5" rx="2.5" transform="translate(10.968 18.501) rotate(-45)"></rect> <path id="primary" d="M7,8h6M7,12h4m5.73.73a2.52,2.52,0,0,1,3.54,0h0a2.52,2.52,0,0,1,0,3.54l-4,4a2.52,2.52,0,0,1-3.54,0h0a2.52,2.52,0,0,1,0-3.54ZM18.2,18.2l-3.4-3.4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <path id="primary-2" data-name="primary" d="M8,21H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3H16a1,1,0,0,1,1,1V8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g>
              </svg>

              <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                Riwayat Periksa
              </span>

              <svg class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                :class="[(selected === 'Riwayat Periksa') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]"
                width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>

            <!-- Dropdown Menu Start -->
            <div class="overflow-hidden transform translate" :class="(selected === 'Riwayat Periksa') ? 'block' :'hidden'">
              <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                <li>
                  <a href="{{ route('datatemu') }}" class="menu-dropdown-item group"
                    :class="page === 'datatemu' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                    Temu Dokter
                  </a>
                </li>

                <li>
                  <a href="{{ route('datarekam') }}" class="menu-dropdown-item group"
                    :class="page === 'datarekam' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                    Rekam Medis
                  </a>
                </li>
              </ul>
            </div>
            <!-- Dropdown Menu End -->
          </li>
        </ul>
      </div>
    </nav>
    <!-- Sidebar Menu -->
  </div>
</aside>