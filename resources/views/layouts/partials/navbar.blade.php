<nav class="navbar navbar-main navbar-expand-lg  px-0 mx-4 shadow-none border-radius-xl z-index-sticky " id="navbarBlur" data-scroll="false">

            <li class="nav-item d-xl-none ps-3 d-flex align-items-center mt-2">
              <a href="javascript:;" class="nav-link text-white p-2" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>

        
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center ml-5">
            <div class="input-group form-search position-relative">
                <span class="input-group-text text-body">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control rounded-end" id="search-input" placeholder="Type here...">
                <ul id="search-results" 
                    class="dropdown-menu dropdown-menu-end mt-5"
                    style="display: none; position: absolute; z-index: 1000; width: auto; max-height: 300px; overflow-y: auto;">
                    <!-- Results will be appended here -->
                </ul>
            </div>
        </div>
        
          <ul style="height: 70px" class="navbar-nav  justify-content-end ">
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0 " id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="text-center">
                  <img height="30px" style="border-radius: 50%" src="{{asset(Auth::guard('admin')->user()->image)}}" alt="img"><br>
                  <span>{{Auth::guard('admin')->user()->name}}</span>
                </div> 
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="{{route('edit-profile')}}">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img height="20px" src="https://img.icons8.com/?size=100&id=45193&format=png&color=000000" alt="">
                        Edit Profile
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="{{route('admin.logout')}}">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                      <img height="20px" src="https://img.icons8.com/?size=100&id=22112&format=png&color=000000" alt="">
                      Log Out
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

              
