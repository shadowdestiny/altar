<!-- Top Navbar  -->
<div class="navbar navbar-static-top navbar-default " role="navigation">
    <div class="navbar-header navbar-inverse text-center">
        <button type="button" class="navbar-toggle border-left-med no-radius" id="menu-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- logo -->
        <div class="navbar-brand"><a href="<?= ROOT_URL; ?>"> <img src="<?= URL_ASSETS; ?>logos/logoaltar.png"
                                                                   alt="logo"
                                                                   width="75%"></a>
        </div>
        <!-- / logo -->
    </div>
    <!-- user -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <div>
            <ul class="nav navbar-nav align-center-vert-top-nav navbar-left">


            </ul>

        </div>
        <ul class="nav navbar-nav navbar-right navbar-user">

            <li class="avatar dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?= $this->session->userdata('username'); ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li><a href="<?= ROOT_URL; ?>backoffice/closeSession"><i class="icon-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div><!-- / nav-collapse -->
</div>

<!-- Wrapper for content below nav bar -->
<div id="wrapper">