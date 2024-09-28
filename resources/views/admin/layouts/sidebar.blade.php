<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard')}}">{{ Str::limit($seoSetting->title, 5, ' ') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('dashboard')}}">j</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{setSidebarActive(['dashboard'])}}">
                <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Dropdown</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="">test</a></li>

                </ul>
            </li> --}}

            <li class="menu-header">Sections</li>
            <li class="nav-item dropdown {{setSidebarActive(['admin.hero.*', 'admin.typer-title.*'])}} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-ribbon"></i> <span>Hero</span></a>
                        <ul class="dropdown-menu" style="display: none;">
                    <li class="{{setSidebarActive(['admin.typer-title.*'])}}"><a class="nav-link" href="{{route('admin.typer-title.index')}}">Typer Title</a></li>
                    <li class="{{setSidebarActive(['admin.hero.*'])}}"><a class="nav-link" href="{{route('admin.hero.index')}}">Hero Section</a></li>

                </ul>
            </li>
            <li class="nav-item dropdown {{setSidebarActive(['admin.category.*', 'admin.portfolio-item.*', 'admin.portfolio-section-setting.*'])}}">

                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i> <span>Portfolio</span></a>
                        <ul class="dropdown-menu" style="display: none;">

                    <li class="{{setSidebarActive(['admin.category.*'])}}"><a class="nav-link" href="{{route('admin.category.index')}}">Category</a></li>

                    <li class="{{setSidebarActive(['admin.portfolio-item.*'])}}"><a class="nav-link" href="{{route('admin.portfolio-item.index')}}">Portfolio Item</a></li>

                    <li class="{{setSidebarActive(['admin.portfolio-section-setting.*'])}}"><a class="nav-link" href="{{route('admin.portfolio-section-setting.index')}}">Section Setting</a></li>

                </ul>
            </li>
            <li class="nav-item dropdown {{setSidebarActive(['admin.skill-item.*', 'admin.skill-section-setting.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-toolbox"></i> <span>Skill</span></a>
                        <ul class="dropdown-menu" style="display: none;">

                    <li class="{{setSidebarActive(['admin.skill-item.*'])}}"><a class="nav-link" href="{{route('admin.skill-item.index')}}">Skill Items</a></li>
                    <li class="{{setSidebarActive(['admin.skill-section-setting.*'])}}"><a class="nav-link" href="{{route('admin.skill-section-setting.index')}}">Skill Setting</a></li>
                </ul>
            </li>

            <li class="{{setSidebarActive(['admin.service.*'])}}"><a class="nav-link" href="{{route('admin.service.index')}}"><i class="fas fa-tools"></i> <span>Services</span></a></li>
             <li class="{{setSidebarActive(['admin.about.index'])}}"><a class="nav-link" href="{{route('admin.about.index')}}"><i class="fas fa-info-circle"></i> <span>About</span></a></li>
             <li class="{{setSidebarActive(['admin.experience.index'])}}"><a class="nav-link" href="{{route('admin.experience.index')}}"><i class="fas fa-star"></i> <span>Experiences</span></a></li>
             <li class="nav-item dropdown {{setSidebarActive(['admin.feedback.*', 'admin.feedback-section-setting.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-comments"></i><span>Feedback</span></a>
                        <ul class="dropdown-menu" style="display: none;">

                    <li class="{{setSidebarActive(['admin.feedback.*'])}}"><a class="nav-link" href="{{route('admin.feedback.index')}}">Feedback</a></li>
                    <li class="{{setSidebarActive(['admin.feedback-section-setting.*'])}}"><a class="nav-link" href="{{route('admin.feedback-section-setting.index')}}">Feedback Section</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{setSidebarActive(['admin.blog-category.*', 'admin.blog.*', 'admin.blog-section-setting.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-blog"></i><span>Blog</span></a>
                        <ul class="dropdown-menu" style="display: none;">

                    <li class="{{setSidebarActive(['admin.blog-category.*'])}}"><a class="nav-link" href="{{route('admin.blog-category.index')}}">Category</a></li>

                    <li class="{{setSidebarActive(['admin.blog.*'])}}"><a class="nav-link" href="{{route('admin.blog.index')}}">Blog List</a></li>

                    <li class="{{setSidebarActive(['admin.blog-section-setting.*'])}}"><a class="nav-link" href="{{route('admin.blog-section-setting.index')}}">Blog Section Setting</a></li>

                </ul>
            </li>
            <li class="nav-item dropdown {{setSidebarActive(['admin.contact-section-setting.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card-alt"></i><span>Contact</span></a>
                        <ul class="dropdown-menu" style="display: none;">

                    <li class="{{setSidebarActive(['admin.contact-section-setting.*'])}}"><a class="nav-link" href="{{route('admin.contact-section-setting.index')}}">Section Setting</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{setSidebarActive(['admin.footer-social.*', 'admin.footer-info.*', 'admin.contact-info.*', 'admin.useful-link.*', 'admin.help-link.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shoe-prints"></i><span>Footer</span></a>
                        <ul class="dropdown-menu" style="display: none;">

                    <li class="{{setSidebarActive(['admin.footer-social.*'])}}"><a class="nav-link" href="{{route('admin.footer-social.index')}}">Footer Social</a></li>
                    <li class="{{setSidebarActive(['admin.footer-info.*'])}}"><a class="nav-link" href="{{route('admin.footer-info.index')}}">Footer Info</a></li>
                    <li class="{{setSidebarActive(['admin.contact-info.*'])}}"><a class="nav-link" href="{{route('admin.contact-info.index')}}">Footer Contact Info</a></li>
                    <li class="{{setSidebarActive(['admin.useful-link.*'])}}"><a class="nav-link" href="{{route('admin.useful-link.index')}}">Footer Useful Link</a></li>
                    <li class="{{setSidebarActive(['admin.help-link.*'])}}"><a class="nav-link" href="{{route('admin.help-link.index')}}">Footer Help Link</a></li>
                </ul>
            </li>
            <li class="menu-header">Settings</li>
            <li class="{{setSidebarActive(['admin.settings.*', 'admin.general-setting.*', 'admin.seo-settings.index'])}}"><a class="nav-link" href="{{route('admin.settings.index')}}"><i class="fas fa-cogs"></i> <span>Setting</span></a></li>

            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}
        </ul>
    </aside>
</div>
