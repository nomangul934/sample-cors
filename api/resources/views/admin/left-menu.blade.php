<label class="sidebar-label">Navigation</label>
<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'admin.manage_university' || Route::currentRouteName() === 'admin.edit_univ'
                        || Route::currentRouteName() === 'admin.past_university' ||  Route::currentRouteName() === 'admin.future_university') active show-sub @endif">
        <div class="sl-menu-item">
            <i class="fa fa-bank tx-22"></i>
            <span class="menu-item-label">Manage Universities</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.manage_university') }}" class="nav-link @if(Route::currentRouteName() === 'admin.manage_university') active @endif">
                View Universities</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.past_university') }}" class="nav-link @if(Route::currentRouteName() === 'admin.past_university') active @endif">
                Past Confirmed</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.future_university') }}" class="nav-link @if(Route::currentRouteName() === 'admin.future_university') active @endif">
                Future Confirmed</a>
        </li>
        
    </ul>
</div>

<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'admin.manage_school' || Route::currentRouteName() === 'admin.edit_school' || Route::currentRouteName() === 'admin.add_school') active show-sub @endif">
        <div class="sl-menu-item">
        <i class="fa fa-briefcase tx-22"></i>
            <span class="menu-item-label">Manage Schools</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.manage_school') }}" class="nav-link @if(Route::currentRouteName() === 'admin.manage_school') active @endif">
                View Schools</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.add_school') }}" class="nav-link @if(Route::currentRouteName() === 'admin.add_school') active @endif">
                Add School</a>
        </li>
    </ul>
</div>

<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'admin.manage_users' || Route::currentRouteName() === 'admin.add_user') active show-sub @endif">
        <div class="sl-menu-item">
        <i class="icon ion-person tx-22"></i>
            <span class="menu-item-label">Manage Users</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.manage_users') }}" class="nav-link @if(Route::currentRouteName() === 'admin.manage_users') active @endif">
                View Users</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.add_user') }}" class="nav-link @if(Route::currentRouteName() === 'admin.add_user') active @endif">
                Add User</a>
        </li>
    </ul>
</div>

<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'admin.manage_fairs' || Route::currentRouteName() === 'admin.edit_fair') active show-sub @endif">
        <div class="sl-menu-item">
        <i class="icon ion-aperture tx-22"></i>
            <span class="menu-item-label">Manage Fairs</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.manage_fairs') }}" class="nav-link @if(Route::currentRouteName() === 'admin.manage_fairs') active @endif">
                View Fairs</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.create_fair') }}" class="nav-link @if(Route::currentRouteName() === 'admin.create_fair') active @endif">
                New Fairs</a>
        </li>
    </ul>
</div>


<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'admin.career_talk_list' || Route::currentRouteName() === 'admin.add_career_talk' ) active show-sub @endif">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Manage Career Talks</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.career_talk_list') }}" class="nav-link @if(Route::currentRouteName() === 'admin.career_talk_list') active @endif">
        Career Talks List</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.add_career_talk') }}" class="nav-link @if(Route::currentRouteName() === 'admin.add_career_talk') active @endif">
        Add Career Talks</a>
        </li>
    </ul>
</div>
<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'admin.manage_workshop' || Route::currentRouteName() === 'admin.edit_workshop') active show-sub @endif">
        <div class="sl-menu-item">
        <i class="icon ion-compass tx-22"></i>
            <span class="menu-item-label">Open Days

</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.manage_workshop') }}" class="nav-link @if(Route::currentRouteName() === 'admin.manage_workshop') active @endif">
                View Open Days</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.manage_workshop') }}" class="nav-link @if(Route::currentRouteName() === 'admin.manage_workshop') active @endif">
                Creat Open Day</a>
        </li>
    </ul>
</div>
<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'admin.manage_workshop' || Route::currentRouteName() === 'admin.edit_workshop') active show-sub @endif">
        <div class="sl-menu-item">
        <i class="icon ion-easel tx-22"></i>
            <span class="menu-item-label">Presentations
</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.manage_workshop') }}" class="nav-link @if(Route::currentRouteName() === 'admin.manage_workshop') active @endif">
                View Presentations</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.manage_workshop') }}" class="nav-link @if(Route::currentRouteName() === 'admin.manage_workshop') active @endif">
                Creat Presentation</a>
        </li>
    </ul>
</div>
<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'admin.manage_workshop' || Route::currentRouteName() === 'admin.edit_workshop') active show-sub @endif">
        <div class="sl-menu-item">
        <i class="icon ion-monitor tx-22"></i>
            <span class="menu-item-label">Webstream Webinars
</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.manage_workshop') }}" class="nav-link @if(Route::currentRouteName() === 'admin.manage_workshop') active @endif">
                View Webinars</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.manage_workshop') }}" class="nav-link @if(Route::currentRouteName() === 'admin.manage_workshop') active @endif">
                Creat Webinar</a>
        </li>
    </ul>
</div>
<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'admin.manage_workshop' || Route::currentRouteName() === 'admin.edit_workshop') active show-sub @endif">
        <div class="sl-menu-item">
        <i class="icon ion-ionic tx-22"></i>
            <span class="menu-item-label">Manage Workshop</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.manage_workshop') }}" class="nav-link @if(Route::currentRouteName() === 'admin.manage_workshop') active @endif">
                View Workshop</a>
        </li>
    </ul>
</div>

<div class="sl-sideleft-menu">
    <a href="#" class="sl-menu-link @if(Route::currentRouteName() === 'admin.fair_delete' || Route::currentRouteName() === 'admin.university_delete'
                                         || Route::currentRouteName() === 'admin.school_delete' || Route::currentRouteName() === 'admin.user_delete'
                                         || Route::currentRouteName() === 'admin.duplicate_users' || Route::currentRouteName() === 'admin.duplicate_university'
                                         || Route::currentRouteName() === 'admin.duplicate_school'|| Route::currentRouteName() === 'admin.fair_view') active show-sub @endif">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">System Clean Up</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
    </a>
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.fair_delete') }}" class="nav-link @if(Route::currentRouteName() === 'admin.fair_delete') active @endif">
                Fairs Delete</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.university_delete') }}" class="nav-link @if(Route::currentRouteName() === 'admin.university_delete') active @endif">
                University Delete</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.school_delete') }}" class="nav-link @if(Route::currentRouteName() === 'admin.school_delete') active @endif">
                School Delete</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.user_delete') }}" class="nav-link @if(Route::currentRouteName() === 'admin.user_delete') active @endif">
                User Delete</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.duplicate_users') }}" class="nav-link @if(Route::currentRouteName() === 'admin.duplicate_users') active @endif">
                Duplicate Users</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.duplicate_university') }}" class="nav-link @if(Route::currentRouteName() === 'admin.duplicate_university') active @endif">
                Duplicate Universitys</a>
        </li>
        <li class="nav-item"><a href="{{ route('admin.duplicate_school') }}" class="nav-link @if(Route::currentRouteName() === 'admin.duplicate_school') active @endif">
                Duplicate Schools</a>
        </li>
    </ul>
</div>

<br>
