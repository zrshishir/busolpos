@if (Auth::guest())
        <!-- <li><a href="{{ url('/auth/login') }}">Login</a></li> -->
        <!-- <li><a href="{{ url('/auth/register') }}">Register</a></li> -->
@elseif(Auth::user()->user_type == "admin")
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
    
        <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">Settings</a>
            <ul class="dropdown-menu">
                <li><a tabindex="-1" href="{{ url('/branch') }}">Branch</a></li>
                <li><a tabindex="-1" href="{{ url('/category') }}">Category</a></li>
            </ul>
        </li>
        <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">Products</a>
            <ul class="dropdown-menu">
                <li><a tabindex="-1" href="{{ url('/product') }}">Products</a></li>
                <li><a tabindex="-1" href="{{ url('/branchproduct') }}">Branch Product</a></li>
            </ul>
        </li>
        <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">Business</a>
            <ul class="dropdown-menu">
                <li><a tabindex="-1" href="{{ url('/purchage') }}">Purchage</a></li>
                <li><a tabindex="-1" href="{{ url('/sale') }}">Sale</a></li>
            </ul>
        </li>
         <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">Reports</a>
            <ul class="dropdown-menu">
                <li><a tabindex="-1" href="{{ url('/') }}">Today</a></li>
               
            </ul>
        </li>
             
</ul>
@else
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
    
        <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">Member</a>
            <ul class="dropdown-menu">
                <!-- <li><a tabindex="-1" href="{{ url('/product') }}">Product</a></li> -->
                <li><a tabindex="-1" href="{{ url('/member') }}">Member</a></li>
            </ul>
        </li>
        <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">Finance</a>
            <ul class="dropdown-menu">
                <!-- <li><a tabindex="-1" href="{{ url('/product') }}">Product</a></li> -->
                <li><a tabindex="-1" href="{{ url('/appformandpassbook') }}">Entry Form & Passbook</a></li>
               <!--  <li><a tabindex="-1" href="{{ url('/share') }}">Shares</a></li>
                <li><a tabindex="-1" href="{{ url('/saving') }}">Savings</a></li>
                <li><a tabindex="-1" href="{{ url('/loanapplicationmoneyreceipt') }}">Loan App Money Receipt</a></li> -->
            </ul>
        </li>
        <li class="dropdown-submenu pull-right"><a tabindex="-1" href="#">General Settings</a>
            <ul class="dropdown-menu">
                <li><a tabindex="-1" href="{{ url('/domain') }}">Domains</a></li>
                <li><a tabindex="-1" href="{{ url('/zone') }}">Zones</a></li>
                <li><a tabindex="-1" href="{{ url('/area') }}">Areas</a></li>
                <li><a tabindex="-1" href="{{ url('/brn') }}">Branches</a></li>
                <li><a tabindex="-1" href="{{ url('/division') }}">Divisions</a></li>
                <li><a tabindex="-1" href="{{ url('/district') }}">Districts</a></li>
                <li><a tabindex="-1" href="{{ url('/thana') }}">Pollice Stations</a></li>
                <li><a tabindex="-1" href="{{ url('/union') }}">Unions</a></li>
                <li><a tabindex="-1" href="{{ url('/ward') }}">Wards</a></li>
            </ul>
        </li>

    </ul>
@endif