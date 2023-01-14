<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ '/admin/dashboard' }}">
         
         <div class="sidebar-brand-text mx-3">Admin </div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{ '/admin/dashboard' }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
             aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Categories</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ '/category/create' }}">Create</a>
                 <a class="collapse-item" href="{{ '/category/manage' }}">Manage</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subcategory"
              aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-cog"></i>
              <span>Sub Categories</span>
          </a>
          <div id="subcategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href=" {{ '/subcategory/create' }} ">Create</a>
                  <a class="collapse-item" href="{{ '/subcategory/mange' }}">Manage</a>
              </div>
          </div>
      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brand"
              aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-cog"></i>
              <span>Brand</span>
          </a>
          <div id="brand" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href=" {{'/brand/create'}} ">Create</a>
                  <a class="collapse-item" href="{{'/brand/mange'}} ">Manage</a>
              </div>
          </div>
      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#color"
              aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-palette"></i>
              <span>Color</span>
          </a>
          <div id="color" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href=" {{'/color/create'}} ">Create</a>
                  <a class="collapse-item" href="{{'/color/mange'}}">Manage</a>
              </div>
          </div>
      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#size"
              aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-cog"></i>
              <span>Size</span>
          </a>
          <div id="size" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="{{'/size/create'}}">Create</a>
                  <a class="collapse-item" href="{{'/size/mange'}}">Manage</a>
              </div>
          </div>
      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#vendor"
              aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-cog"></i>
              <span>Vendors</span>
          </a>
          <div id="vendor" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="{{url('/vendor/manage')}}">Manage</a>
              </div>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#vendorProducts"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Vendor Products</span>
        </a>
        <div id="vendorProducts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/vendor/products')}}">Manage</a>
            </div>
        </div>
    </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user"
              aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-cog"></i>
              <span>Users</span>
          </a>
          <div id="user" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="cards.html">Manage</a>
              </div>
          </div>
      </li>
     
 </ul>