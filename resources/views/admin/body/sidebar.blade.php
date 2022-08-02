<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        @php
            $logo = App\Models\SiteSetting::findOrFail(1);
        @endphp
        <div>
            <a href="{{route('admin.dashboard')}}">   <img src="{{ asset('image/logo/'.$logo->logo) }}" alt="logo icon" width="50px">
            </a>
        </div>
        <div>
            <a href="{{route('admin.dashboard')}}"> <h4 class="logo-text">{{$logo->company_name}}</h4>  </a>
           
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Brand</div>
            </a>
            <ul>
                <li> <a href="{{route('manage-brand')}}"><i class="bx bx-right-arrow-alt"></i>Manage Brand</a>
                </li>
              
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li> <a href="{{route('manage-category')}}"><i class="bx bx-right-arrow-alt"></i>Manage Category</a> 
                </li>
               
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Home Slider</div>
            </a>
            <ul>
                <li> <a href="{{route('manage-home-slider')}}"><i class="bx bx-right-arrow-alt"></i>Slider Manage</a> 
                </li>
               
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Manage Site</div>
            </a>
            <ul>
                <li> <a href="{{route('site-setting-view')}}"><i class="bx bx-right-arrow-alt"></i>Site Setting</a>
                </li>
               
            </ul>
        </li>
        <li class="menu-label">UI Elements</li>
      
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Product</div>
            </a>
            <ul>
                <li> <a href="{{route('manage-product')}}"><i class="bx bx-right-arrow-alt"></i>Manage Products</a>
                </li>
                
                <li> <a href="{{route('add-new-product')}}"><i class="bx bx-right-arrow-alt"></i>Add New Products</a>
                </li>
               
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Coupon</div>
            </a>
            <ul>
                <li> <a href="{{route('view-product')}}"><i class="bx bx-right-arrow-alt"></i>
               Manage Coupon</a>
                </li>
                
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="fadeIn animated bx bx-grid-small"></i>
                </div>
                <div class="menu-title">Orders</div>
            </a>
            <ul>
                <li> <a href="{{route('pending-order')}}"><i class="bx bx-right-arrow-alt"></i>Pending Orders</a>
                </li>
                <li> <a href="{{route('confirm-order')}}"><i class="bx bx-right-arrow-alt"></i>Confirmed Orders</a>
                </li>
                <li> <a href="{{route('processing-order')}}"><i class="bx bx-right-arrow-alt"></i>Processing Orders</a>
                </li>
                <li> <a href="{{route('picked-order')}}"><i class="bx bx-right-arrow-alt"></i>Picked Orders</a>
                </li>
                <li> <a href="{{route('shiped-order')}}"><i class="bx bx-right-arrow-alt"></i>Shiped Orders</a>
                </li>
                <li> <a href="{{route('delivered-order')}}"><i class="bx bx-right-arrow-alt"></i>Delivered Orders</a>
                </li>
                <li> <a href="{{route('cancel-order')}}"><i class="bx bx-right-arrow-alt"></i>Cancel Orders</a>
                </li>
               
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Return Orders</div>
            </a>
            <ul>
                <li> <a href="{{route('return-order')}}"><i class="bx bx-right-arrow-alt"></i>Return Orders</a>
                </li>
                <li> <a href="{{route('approved-return-order')}}"><i class="bx bx-right-arrow-alt"></i>Approved Return Orders</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Forms & Tables</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Report</div>
            </a>
            <ul>
                <li> <a href="{{route('all-reports-view')}}"><i class="bx bx-right-arrow-alt"></i>All Reports</a>
                </li>
               
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">User</div>
            </a>
            <ul>
                <li> <a href="{{route('all-user-view')}}"><i class="bx bx-right-arrow-alt"></i>All Users</a>
                </li>
               
            </ul>
        </li>
       
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Reviews</div>
            </a>
            <ul>
                <li> <a href="{{route('all-review')}}"><i class="bx bx-right-arrow-alt"></i>All Reviews</a>
                </li>
               
            </ul>
        </li>
       
      
       
    </ul>
    <!--end navigation-->
</div>