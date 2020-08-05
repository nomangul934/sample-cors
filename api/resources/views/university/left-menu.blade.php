
<!--<div class="input-group input-group-search">
    <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
<!--</div><!-- input-group -->

<label class="sidebar-label">Navigation</label>
<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'university.invitations_list'
                        || Route::currentRouteName() === 'university.past_university' ||  Route::currentRouteName() === 'university.future_university') active show-sub @endif">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Fairs</span>
        </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('university.invitations_list') }}" class="nav-link @if(Route::currentRouteName() === 'university.invitations_list') active @endif">
                Fairs</a>
        </li>
        <li class="nav-item"><a href="{{ route('university.past_university') }}" class="nav-link @if(Route::currentRouteName() === 'university.past_university') active @endif">
                Past Confirmed</a>
        </li>
        <li class="nav-item"><a href="{{ route('university.future_university') }}" class="nav-link @if(Route::currentRouteName() === 'university.future_university') active @endif">
                Future Confirmed</a>
        </li>

    </ul>
</div>
<div class="sl-sideleft-menu">

    <a href="{{ route('university.schools_list') }}" class="sl-menu-link  @if(Route::currentRouteName() === 'university.schools_list') active @endif">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-calculator-outline tx-22"></i>
            <span class="menu-item-label">Schools</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

    <a href="{{ route('university.users_list') }}" class="sl-menu-link  @if(Route::currentRouteName() === 'university.users_list') active @endif">
        <div class="sl-menu-item">
        <i class="icon ion-person tx-22"></i>
            <span class="menu-item-label">Users</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
</div><!-- sl-sideleft-menu -->

<br>
