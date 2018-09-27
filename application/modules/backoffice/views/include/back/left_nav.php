<!-- Sidebar -->
<div class="sidebar-back"></div>
<div id="sidebar-wrapper" class="stretch-full-height">
    <ul class="sidebar-nav">
        <!--<li id="dashboard">
            <a href="index.html" class="active-title">
                <span class="nav-icon"><i class="icon-dashboard icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Dashboard</span></a>
        </li>-->
        <li id="menu_users">
            <a href="<?= ROOT_URL; ?>backoffice/Ctr_user">
                <span class="nav-icon"><i class="icon-user icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Usuarios</span></a>
        </li>
        <li id="menu_category">
            <a href="<?= ROOT_URL; ?>backoffice/Ctr_category">
                <span class="nav-icon"><i class="icon-check-sign icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Categorias</span></a>
        </li>
        <li id="menu_termsConditions">
            <a href="<?= ROOT_URL; ?>backoffice/Ctr_termsconditions">
                <span class="nav-icon"><i class="icon-file-alt icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Términos y Condiciones</span></a>
        </li>
        <li id="menu_termsConditions">
            <a href="<?= ROOT_URL; ?>backoffice/Ctr_privacy">
                <span class="nav-icon"><i class="icon-file-alt icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Aviso de privacidad</span></a>
        </li>
        <li id="menu_category">
            <a href="<?= ROOT_URL; ?>backoffice/Ctr_aboutus">
                <span class="nav-icon"><i class="icon-chevron-sign-right icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Acerca de Nosotros</span></a>
        </li>
        <li id="menu_category">
            <a href="<?= ROOT_URL; ?>backoffice/Ctr_help">
                <span class="nav-icon"><i class="icon-chevron-sign-right icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Ayuda</span></a>
        </li>
        <li id="menu_blog">
            <a href="<?= ROOT_URL; ?>backoffice/Ctr_autor">
                <span class="nav-icon"><i class="icon-comments icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Autores</span>
            </a>
        </li>
        <li id="menu_video">
            <a href="<?= ROOT_URL; ?>backoffice/Ctr_video">
                <span class="nav-icon"><i class="icon-youtube-play icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Videos</span>
            </a>
        </li>
        <li id="menu_blog">
            <a href="<?= ROOT_URL; ?>backoffice/Ctr_blog">
                <span class="nav-icon"><i class="icon-comments icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Blog</span>
            </a>
        </li>
        <li class="nav-header" id="menu">
            <a>
                <span class="nav-icon"><i class="icon-picture icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Publicidad</span>
                <i class="icon-chevron-down pull-right"></i>
            </a>
            <ul class="nav nav-list collapse submenu" id="uiMenu">
                <li><a href="<?= ROOT_URL; ?>backoffice/Ctr_advertising/index/banner">Banners</a></li>
                <li><a href="<?= ROOT_URL; ?>backoffice/Ctr_advertising/index/column">Columnas</a></li>
            </ul>
        </li>
        <li class="nav-header" id="menu">
            <a>
                <span class="nav-icon"><i class="icon-money icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Cupones</span>
                <i class="icon-chevron-down pull-right"></i>
            </a>
            <ul class="nav nav-list collapse submenu" id="uiMenu">
                <li><a href="<?= ROOT_URL; ?>backoffice/Ctr_coupon/index/price">Por Precio</a></li>
                <li><a href="<?= ROOT_URL; ?>backoffice/Ctr_coupon/index/percentage">Por Porcentaje</a></li>
            </ul>
        </li>
        <li class="nav-header" id="menu">
            <a>
                <span class="nav-icon"><i class="icon-money icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Contenido Home</span>
                <i class="icon-chevron-down pull-right"></i>
            </a>
            <ul class="nav nav-list collapse submenu" id="uiMenu">
                <li><a href="<?= ROOT_URL; ?>backoffice/Ctr_content/">Página Principal</a></li>
                <li><a href="<?= ROOT_URL; ?>backoffice/Ctr_content/register/">Página Registrar</a></li>
            </ul>
        </li>

    </ul>
</div><!-- /sidebar -->