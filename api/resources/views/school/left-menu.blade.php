<label class="sidebar-label">Navigation</label>
<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'school.fairs_list' || Route::currentRouteName() === 'school.create_fair') active show-sub @endif">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
            <span class="menu-item-label">Fairs</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('school.fairs_list') }}" class="nav-link @if(Route::currentRouteName() === 'school.fairs_list') active @endif">
                Fairs List</a>
        </li>
 
        <li class="nav-item nav-func"><a href="{{ route('school.create_fair') }}" class="nav-link  @if(Route::currentRouteName() === 'school.create_fair') active @endif">
                New Fair</a>
        </li>
    </ul>
</div><!-- sl-sideleft-menu -->

<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'school.univ_lists' || Route::currentRouteName() === 'school.confirmed_universities') active show-sub @endif">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
            <span class="menu-item-label">Universities</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('school.univ_lists') }}" class="nav-link @if(Route::currentRouteName() === 'school.univ_lists') active @endif">
                View Universities</a>
        </li>
 
        <li class="nav-item"><a href="{{ route('school.confirmed_universities') }}" class="nav-link @if(Route::currentRouteName() === 'school.confirmed_universities') active @endif">
                Confirmed Universities</a>
        </li>
    </ul>
</div><!-- sl-sideleft-menu -->





<div class="sl-sideleft-menu">
    <a href="{{ route('school.counselor_lists') }}" class="sl-menu-link @if(Route::currentRouteName() === 'school.counselor_lists') active show-sub @endif">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
            <span class="menu-item-label">Counselor</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
</div><!-- sl-sideleft-menu -->

<div class="sl-sideleft-menu">
    <a href="{{ route('school.students_registration') }}" class="sl-menu-link @if(Route::currentRouteName() === 'school.students_registration') active show-sub @endif">
        <div class="sl-menu-item">
        <i class="icon ion-person-add"></i>
            <span class="menu-item-label">Students Registration</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
</div><!-- sl-sideleft-menu -->

<div class="sl-sideleft-menu">
    <a href="{{ route('school.workshop_list') }}" class="sl-menu-link @if(Route::currentRouteName() === 'school.workshop_list') active show-sub @endif">
        <div class="sl-menu-item">
        <i class="icon ion-compass"></i>
            <span class="menu-item-label">Workshops List</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
</div><!-- sl-sideleft-menu -->
<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'school.career_talk_list' || Route::currentRouteName() === 'school.create_career_talk') active show-sub @endif">
        <div class="sl-menu-item">
        <i class="icon ion-person-stalker"></i>
            <span class="menu-item-label">Manage Career Talks</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('school.career_talk_list') }}" class="nav-link @if(Route::currentRouteName() === 'school.career_talk_list') active @endif">
                View Career Talks</a>
        </li>
        <li class="nav-item"><a href="{{ route('school.create_career_talk') }}" class="nav-link @if(Route::currentRouteName() === 'school.create_career_talk') active @endif">
                Add Career Talks</a>
        </li> 
        <li class="nav-item"><a href="{{ route('school.confirmed_sessions') }}" class="nav-link @if(Route::currentRouteName() === 'school.confirmed_sessions') active @endif">
                Confirmed Sessions</a>
        </li>
        
    </ul>
</div><!-- sl-sideleft-menu -->
<br>
