<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Neu v1.4 | Responsive Admin Skin</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet"/>

    <!-- Boostrap Theme -->
    <link id="skinCss" href="css/theme-base.css" rel="stylesheet"/>
    <link href="css/boostrap-overrides.css" rel="stylesheet"/>
    <link id="themeCss" href="css/theme.css" rel="stylesheet"/>

    <!-- Add custom CSS here -->
    <link href="assets/css/sidebar.css" rel="stylesheet"/>

    <!-- Plugins -->
    <link href="assets/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/ezmark.css"/>
    <link href="assets/plugins/morris.js-0.4.3/morris.css" rel="stylesheet">
    <link href="assets/css/animate-custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/plugins/calendar/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css">
    <link href="assets/css/pushy.css" rel="stylesheet"/>
    <link href="assets/css/panel.css" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/weather-icons/weather-icons.css">
    <link href="assets/select/select2.css" rel="stylesheet"/>
    <link rel="stylesheet" media="screen" type="text/css" href="colorPicker/colpick/css/colpick.css"/>

</head>
<body onload="initPieChart();">

<!-- preloader -->
<div class='preloader-wrapper'>
    <div class="preloader">
        <img src="img/preloader.png" alt='loading image'/>
    </div>
</div><!-- / preloader -->

<!-- Slide out chat panel -->
<div class="pushy pushy-right">
    <div class="well-lg no-radius">
        <i class="icon-group"></i>&nbsp;&nbsp;&nbsp;<strong>Chat</strong>&nbsp;&nbsp;<span
                class="text-transparent">(4)</span>
        <a href="#" class="close-chat-panel" aria-hidden="true"><span
                    class="icon-remove pull-right text-transparent"></span></a>
        <br><br>
        <div class="input-group inverse input-group-sm no-padding">
            <span class="input-group-addon"><i class="icon-search text-transparent"></i></span>
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <div class="clearfix"></div>
    </div>
    <ul class="chat align-center-vert-alt">
        <li>
            <a href="#" class="pull-left"><img src="img/tn_user_07.jpg" alt="User" class="img-circle user-thumbnail-xs"></a>
            <small><a href="#"> Amin Bhatnagar<span class="text-online pull-right"><i
                                class="icon-circle text-online "></i></span></a></small>
            <div class="clearfix"></div>
        </li>
        <li>
            <a href="#" class="pull-left"><img src="img/tn_user_02.jpg" alt="User" class="img-circle user-thumbnail-xs"></a>
            <small><a href="#mypanel">Gina Wheeling<span class="text-online pull-right"><i
                                class="icon-circle text-online "></i></span></a></small>
            <div class="clearfix"></div>
        </li>
        <li>
            <a href="#" class="pull-left"><img src="img/tn_user_03.jpg" alt="User" class="img-circle user-thumbnail-xs"></a>
            <small><a href="#">Ryan Smith<span class="text-online pull-right"><i
                                class="icon-circle text-online "></i></span></a></small>
            <div class="clearfix"></div>
        </li>
        <li>
            <a href="#" class="pull-left"><img src="img/tn_user_04.jpg" alt="User" class="img-circle user-thumbnail-xs"></a>
            <small><a href="#">Hai Thatcher<span class="text-online pull-right"><i class="icon-circle text-online "></i></span></a>
            </small>
            <div class="clearfix"></div>
        </li>
        <li>
            <a href="#" class="pull-left"><img src="img/tn_user_05.jpg" alt="User" class="img-circle user-thumbnail-xs"></a>
            <small><a href="#">Jane Doe<span class="text-online pull-right"><i
                                class="icon-circle text-danger"></i></span></a></small>
            <div class="clearfix"></div>
        </li>
        <li>
            <a href="#" class="pull-left"><img src="img/tn_user_06.jpg" alt="User" class="img-circle user-thumbnail-xs"></a>
            <small><a href="#">Carson Winters<span class="text-online pull-right"><i
                                class="icon-circle text-danger "></i></span></a></small>
            <div class="clearfix"></div>
        </li>
        <li class="idle">
            <a href="#" class="pull-left"><img src="img/tn_user_01.jpg" alt="User" class="img-circle user-thumbnail-xs"></a>
            <small><a href="#">Peyton Max <span class="pull-right"><i class="icon-circle"></i></span></a></small>
            <div class="clearfix"></div>
        </li>
        <li class="idle">
            <a href="#" class="pull-left"><img src="img/tn_user_05.jpg" alt="User" class="img-circle user-thumbnail-xs"></a>
            <small><a href="#">Brianna Winters<span class="pull-right"><i class="icon-circle"></i></span></a></small>
            <div class="clearfix"></div>
        </li>
        <li class="idle">
            <a href="#" class="pull-left"><img src="img/tn_user_03.jpg" alt="User" class="img-circle user-thumbnail-xs"></a>
            <small><a href="#">Micheal Anderson<span class="pull-right"><i class="icon-circle"></i></span></a></small>
            <div class="clearfix"></div>
        </li>
    </ul>

</div><!-- /slide out chat panel -->

<!-- Container that wraps all content that gets "pushed" when chat panel shows-->
<div id="container">
    <!-- Chat window-->
    <section class="chat-window module">
        <header class="top-bar">
            <div class="pull-left col-lg-10">
                <span class=" icon-facetime-video text-online pull-left"></span>
                <h5 class="chat-title"></h5>
            </div>
            <div class="pull-right">
                <a href="#" class="icon-close"><span class="icon typicons-times"></span></a>
            </div>
        </header>
        <ol class="discussion">
            <li class="other">
                <div class="messages">
                    <p>yeah, they do early flights cause they connect with big airports. they wanna get u to your
                        connection</p>
                    <i>
                        <time class="text-transparent" datetime="2009-11-13T20:00">Ryan • 51 min</time>
                    </i>
                </div>
            </li>
            <li class="self">
                <div class="messages">
                    <p>That makes sense.</p>
                    <p>It's a pretty small airport.</p>
                    <i>
                        <time class="text-transparent" datetime="2009-11-13T20:14">37 mins</time>
                    </i>
                </div>
            </li>
            <li class="other">
                <div class="messages">
                    <p>that mongodb thing looks good, huh?</p>
                    <p>tiny master db, and huge document store</p>
                </div>
            </li>
            <li>
                <div id="text-field">
                    <textarea class="form-control" style="border-style:solid;border-width:5px; resize:none;"
                              placeholder="Type your message"></textarea>
                </div>
            </li>
        </ol>
    </section><!-- /Chat window-->
    <!-- Top Navbar  -->
    <div class="navbar navbar-static-top navbar-default " role="navigation">
        <div class="navbar-header navbar-inverse text-center">
            <button type="button" class="navbar-toggle border-left-med no-radius" id="menu-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <button type="button" class="navbar-toggle border-left-med no-radius" id="user-menu" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="avatar"><img src="img/avatar.jpg" alt="Ryan" class="img-circle"></span>
            </button>
            <!-- logo -->
            <div class="navbar-brand"><a href="index.html"> <img src="img/logo.png" alt="logo"></a></div>
            <!-- / logo -->
        </div>
        <!-- user -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <div>
                <ul class="nav navbar-nav align-center-vert-top-nav navbar-left">
                    <li>
                        <div class="btn-group btn-two-tone" id="colorPickerIgniter">
                            <button type="button" class="btn btn-gray btn-sm">
                                <i class="icon-pencil text-transparent"></i>
                            </button>
                            <button type="button" class="btn btn-gray btn-sm">
                                Color Picker
                            </button>
                        </div>
                    </li>

                    <li></li>

                </ul>
                <div id="colorPickerDiv">
                    <select style="width:150px;margin:25px 0 10px 20px;" id="lessVariables"></select>

                    <span id="colorpicker-full"></span>
                    <button id="btnResetLess" style="margin-left:20px;" class="btn btn-gray btn-sm">Reset</button>
                    <button id="btnConfirmLess" class="btn btn-gray btn-sm">Apply</button>
                    <a target="_blank" href="colorPicker/color-picker.php?action=download" class="download-link">Download
                        Less</a>
                </div>
            </div>
            <ul class="nav navbar-nav navbar-right navbar-user">
                <!-- new messages -->
                <li class="dropdown messages-dropdown">
                    <a href="#" class="dropdown-toggle announcements" data-toggle="dropdown"><i
                                class="icon-envelope-alt"></i><span class="badge">23</span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header header-inverse"><i class="icon-envelope"></i>23 New Messages</li>
                        <li class="message-preview">
                            <a href="#">
                                <img src="img/tn_user_02.jpg" alt="User" class="img-circle user-thumbnail-xs">
                                <span class="name pull-left">Maya Smith</span>
                                <span class="label label-primary pull-right">Just Now</span><br>
                                <span class="message text-transparent">Hi Ryan, I received a message from quis...</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="message-preview">
                            <a href="#">
                                <img src="img/tn_user_01.jpg" alt="User" class="img-circle user-thumbnail-xs">
                                <span class="name pull-left">James Doe</span>
                                <span class="time pull-right text-transparent"><i
                                            class="icon-time"></i> 4:34 PM</span><br>
                                <span class="message text-transparent">Good Afternoon Ryan, Were you able to...</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="message-preview">
                            <a href="#">
                                <img src="img/tn_user_04.jpg" alt="User" class="img-circle user-thumbnail-xs">
                                <span class="name pull-left">Benjamin Taylor</span>
                                <span class="time pull-right text-transparent"><i
                                            class="icon-time"></i> 1:56 PM</span><br>
                                <span class="message text-transparent">Hey, Can you give me a call when you get a...</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-footer text-center">
                            <a href="#">
                                See all new messages
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- alerts -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle announcements" data-toggle="dropdown">
                        <i class="icon-flag-alt"></i><span class="badge animated-delay flash">12</span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header header-inverse"><i class="icon-star"></i>12 Notifications</li>
                        <li class="notification">
                            <a href="#">
                                <span class="pull-left"><span class="label label-success"><i
                                                class="icon-comment"></i></span>  New Comment</span>
                                <span class="time pull-right text-transparent">Just Now</span><br>
                            </a>
                        </li>
                        <li class="notification">
                            <a href="#">
                                <span class="pull-left"><span class="label label-success"><i
                                                class="icon-comment"></i></span>  New Comment</span>
                                <span class="time pull-right text-transparent">5 Minutes Ago</span><br>
                            </a>
                        </li>
                        <li class="notification">
                            <a href="#">
                                <span class="pull-left"><span class="label label-primary"><i
                                                class="icon-user"></i></span>  12 New Users</span>
                                <span class="time pull-right text-transparent">23 Minutes ago</span><br>
                            </a>
                        </li>
                        <li class="notification">
                            <a href="#">
                                <span class="pull-left"><span class="label label-danger"><i
                                                class="icon-flag"></i></span>  Canceled Transaction</span>
                                <span class="time pull-right text-transparent">12 Hours Ago</span><br>
                            </a>
                        </li>
                        <li class="notification">
                            <a href="#">
                                <span class="pull-left"><span class="label label-warning"><i
                                                class="icon-shopping-cart"></i></span>  Canceled Transaction</span>
                                <span class="time pull-right text-transparent">Yesterday</span><br>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-footer text-center">
                            <a href="#">
                                See all notifications
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown alerts-dropdown">
                    <a href="#" class="dropdown-toggle announcements" data-toggle="dropdown"><i
                                class="icon-bar-chart"></i><span class="badge">56</span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header header-inverse"><i class="icon-bar-chart"></i>6 Pending Tasks</li>
                        <li>
                            <a href="javascript:void(0);">
                                        <span class="task">
                                            <span class="desc">November orders </span>
                                        </span>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                         aria-valuemax="100" style="width: 45%">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                        <span class="task">
                                            <span class="desc">Invoices paid</span>
                                        </span>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45"
                                         aria-valuemin="0" aria-valuemax="100" style="width:65%">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                        <span class="task">
                                            <span class="desc">Updates</span>
                                        </span>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45"
                                         aria-valuemin="0" aria-valuemax="100" style="width:35%">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                        <span class="task">
                                            <span class="desc">Unread emails</span>
                                        </span>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="45"
                                         aria-valuemin="0" aria-valuemax="100" style="width:15%">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-footer text-center">
                            <a href="#">
                                See all tasks
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">
                        <div class="menu-btn"><i class="icon-comment-alt"></i><span class="badge">2</span></div>
                    </a>

                </li>
                <li class="avatar dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/avatar.jpg" alt="Ryan"
                                                                                    class="img-circle nav-avatar">Welcome
                        Ryan!<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="user-profile.html"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="email.html"><i class="icon-envelope"></i> Inbox</a></li>
                        <li><a href="#"><i class="icon-gear"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="icon-power-off"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- / nav-collapse -->
    </div>

    <!-- / top Navbar -->
    <!-- Wrapper for content below nav bar -->
    <div id="wrapper">
        <!-- Sidebar -->
        <div class="sidebar-back"></div>
        <div id="sidebar-wrapper" class="stretch-full-height">
            <ul class="sidebar-nav">
                <li id="dashboard">
                    <a href="index.html" class="active-title">
                        <span class="nav-icon"><i class="icon-dashboard icon-2x"></i></span>
                        <span class="sidebar-menu-item-text">Dashboard</span></a>
                </li>
                <li id="email">
                    <a href="email.html">
                        <span class="nav-icon"><i class="icon-envelope-alt icon-2x"></i></span>
                        <span class="sidebar-menu-item-text">Email</span> <span class="responsive-hide badge">103</span>
                    </a>
                </li>
                <li class="nav-header" id="layout">
                    <a href="#">
                        <span class="nav-icon"><i class="icon-folder-open icon-2x"></i></span>
                        <span class="sidebar-menu-item-text">Layouts</span>
                        <i class="icon-chevron-down pull-right"></i>
                    </a>
                    <ul class="nav nav-list collapse submenu" id="layouts">
                        <li><a href="boxedlayout.html">Boxed Layout</a></li>
                        <li><a href="horizontal-nav.html">Horizontal Menu</a></li>
                    </ul>
                </li>
                <li class="nav-header" id="uiMenu">
                    <a href="#">
                        <span class="nav-icon"><i class="icon-tablet icon-2x"></i></span>
                        <span class="sidebar-menu-item-text">UI Set</span>
                        <i class="icon-chevron-down pull-right"></i>
                    </a>
                    <ul class="nav nav-list collapse submenu" id="uiMenus">
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="modals.html">Modals</a></li>
                        <li><a href="panels.html">Panels</a></li>
                        <li><a href="tabs.html">Tabs & Accordians</a></li>
                        <li><a href="sliders.html">Sliders</a></li>
                        <li><a href="notifications.html">Notifications</a></li>
                    </ul>
                </li>
                <li class="nav-header" id="page">
                    <a href="#">
                        <span class="nav-icon"><i class="icon-copy icon-2x"></i></span>
                        <span class="sidebar-menu-item-text">Pages</span>
                        <i class="icon-chevron-down pull-right"></i>
                    </a>
                    <ul class="nav nav-list collapse submenu" id="pages">
                        <li><a href="user-profile.html">User Profile</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="404.html">404 Page</a></li>
                        <li><a href="500.html">500 Page</a></li>
                        <li><a href="lock.html">Lock Screen</a></li>
                        <li><a href="message.html">Send Message</a></li>
                        <li><a href="fileupload.html">File Upload</a></li>
                        <li><a href="file-manager.html">File Manager</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                    </ul>
                </li>
                <li class="nav-header" id="table">
                    <a href="#">
                        <span class="nav-icon"><i class="icon-table icon-2x"></i></span>
                        <span class="sidebar-menu-item-text">Tables</span>
                        <i class="icon-chevron-down pull-right"></i>
                    </a>
                    <ul class="nav nav-list collapse submenu" id="tables">
                        <li><a href="basic.html">Basic</a></li>
                        <li><a href="data.html">Data</a></li>
                    </ul>
                </li>
                <li id="charts">
                    <a href="charts.html">
                        <span class="nav-icon"><i class="icon-bar-chart icon-2x"></i></span>
                        <span class="sidebar-menu-item-text">Charts</span></a>
                </li>
                <li id="map">
                    <a href="maps.html">
                        <span class="nav-icon"><i class="icon-map-marker icon-2x"></i></span>
                        <span class="sidebar-menu-item-text">Map</span></a>
                </li>
                <li id="calender">
                    <a href="calendar.html">
                        <span class="nav-icon"><i class="icon-calendar icon-2x"></i></span>
                        <span class="sidebar-menu-item-text">Calendar</span></a>
                </li>
                <li id="manager">
                    <a href="project-manager.html">
                        <span class="nav-icon"><i class="icon-edit icon-2x"></i></span>
                        <span class="sidebar-menu-item-text">Project Manager</span></a>
                </li>
            </ul>
        </div><!-- /sidebar -->

        <!-- Keep all page content within the page-content-wrapper -->
        <div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">
            <!-- page content header -->
            <div class="row add-padding">
                <div class="pull-left">
                    <h1>Good Morning Ryan</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html" class="text-transparent">Dashboard</a></li>
                        <li><a href="index.html" class="text-transparent">Stats</a></li>
                        <li class="active"><a href="index.html" class="text-transparent">Daily</a></li>
                    </ol>
                </div>
            </div>
            <!-- / page content header -->
            <!--Page Content-->
            <!-- Stats top row-->
            <div class="row no-padding">
                <!--row 1, col 1-->
                <div class="col-md-3 col-sm-6 daily-stats">
                    <div class="panel">
                        <div class="panel-body brand-secondary-bg text-inverse">
                            <div class="pull-left">
                                <div class="badge-circle daily-stat-left">
                                    <div class="big-text"><i class="icon-user"></i></div>
                                </div>
                            </div>
                            <span id="new-comments" class="big-text"></span>
                            <div class="stat text-transparent">
                                <h5>New Users </h5>
                            </div>
                        </div>
                        <div class="panel-footer white-bg">
                            <div class="pull-left">
                                <h6 class=" text-transparent ">Last Week</h6>
                                <div class="daily-stats-compare number">
                                    <span class="text-secondary"><strong>496</strong></span>
                                </div>
                            </div>
                            <div class="pull-right">
                                <span class="icon-arrow-up text-transparent daily-stats-compare"></span>
                                <span class="daily-stats-compare">16%</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div><!--/ row 1, col 1-->
                <!--row 1, col 2-->
                <div class="col-md-3 col-sm-6 daily-stats">
                    <div class="panel">
                        <div class="panel-body brand-warning-bg text-inverse">
                            <div class="pull-left">
                                <div class="badge-circle daily-stat-left">
                                    <div class="big-text"><i class="icon-comment"></i></div>
                                </div>
                            </div>
                            <span id="new-users" class="big-text"></span>
                            <div class="stat text-transparent">
                                <h5>Comments </h5>
                            </div>
                        </div>
                        <div class="panel-footer white-bg">
                            <div class="pull-left">
                                <h6 class=" text-transparent ">Last Week</h6>
                                <div class="daily-stats-compare number">
                                    <span class="text-warning"><strong>2374</strong></span>
                                </div>
                            </div>
                            <div class="pull-right">
                                <span class="icon-arrow-down text-transparent daily-stats-compare"></span>
                                <span class="daily-stats-compare">45%</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div><!--/ row 1, col 2-->
                <!--row 1, col 3-->
                <div class="col-md-3 col-sm-6 daily-stats">
                    <div class="panel">
                        <div class="panel-body brand-primary-bg text-inverse">
                            <div class="pull-left">
                                <div class="badge-circle daily-stat-left">
                                    <div class="big-text"><i class="icon-rss"></i></div>
                                </div>
                            </div>
                            <span id="new-subscribers" class="big-text"></span>
                            <div class="stat text-transparent">
                                <h5>Subscribers </h5>
                            </div>
                        </div>
                        <div class="panel-footer white-bg">
                            <div class="pull-left">
                                <h6 class=" text-transparent ">Last Week</h6>
                                <div class="daily-stats-compare number">
                                    <span class="text-primary"><strong>240</strong></span>
                                </div>
                            </div>
                            <div class="pull-right">
                                <span class="icon-arrow-up text-transparent daily-stats-compare"></span>
                                <span class="daily-stats-compare">22%</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div><!--/ row 1, col 3-->
                <!--row 1, col 4-->
                <div class="col-md-3 col-sm-6 daily-stats">
                    <div class="panel">
                        <div class="panel-body brand-info-bg text-inverse">
                            <div class="pull-left">
                                <div class="badge-circle daily-stat-left">
                                    <div class="big-text"><i class="icon-shopping-cart"></i></div>
                                </div>
                            </div>
                            <span id="new-orders" class="big-text"></span>
                            <div class="stat text-transparent">
                                <h5>Pending Orders </h5>
                            </div>
                        </div>
                        <div class="panel-footer white-bg">
                            <div class="pull-left">
                                <h6 class=" text-transparent ">Last Week</h6>
                                <div class="daily-stats-compare number">
                                    <span class="text-info"><strong>115</strong></span>
                                </div>
                            </div>
                            <div class="pull-right">
                                <span class="icon-arrow-up text-transparent daily-stats-compare"></span>
                                <span class="daily-stats-compare">5%</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div><!--/ row 1, col 4-->
            </div><!--/ row-->
            <!--/ Stats top row-->

            <!-- Stats & Updates Col 1-->
            <div class="col-md-8 no-padding">
                <!--inner row 1-->
                <div class="row">
                    <div class="col-md-6 no-padding">
                        <!-- storage -->
                        <div class="col-md-12">
                            <div class="panel panel-body-only panel-med-gray-solid">
                                <div class="panel-body text-inverse">
                                    <a href="#" class="pull-left"><h5>Storage</h5></a>
                                    <div class="pull-right"><h4>200/250 GB</h4></div>
                                    <div class="clearfix"></div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-gray" role="progressbar"
                                             aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"
                                             style="width:55%"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /storage -->
                        <!-- social share -->
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body no-padding">
                                    <div class="share">
                                        <textarea class="form-control no-border" rows="2"
                                                  placeholder="Share what you've been up to..."></textarea>
                                    </div>
                                </div>
                                <div class="panel-footer icons-medium">
                                    <ul class="list-inline share-buttons pull-left">
                                        <li><a href="#" class="text-transparent"><i class="icon-user"></i></a></li>
                                        <li><a href="#" class="text-transparent"><i class="icon-camera"></i></a></li>
                                        <li><a href="#" class="text-transparent"><i class="icon-twitter "></i></a></li>
                                        <li><a href="#" class="text-transparent"><i class="icon-microphone"></i></a>
                                        </li>
                                    </ul>
                                    <div class="pull-right">
                                        <button class="btn btn-primary btn-xs pull-right">Share</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><!-- / social share -->
                    </div>
                    <div class="col-md-6 no-padding">
                        <!-- weather -->
                        <div class="col-md-12">
                            <div class="panel panel-white-solid weather">
                                <div class="panel-body bg-image-weather">
                                    <div id="weather-clear" class="col-lg-5 pull-left text-center">
                                        <div class="weather-icon-lg">
                                            <div class="icon"><i class="wi-day-cloudy"></i></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 text-center">
                                        <span class="bigger-text">24&deg;C</span>
                                        <h4>New York, NY</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-footer">
                                    <ul class="list-inline share-buttons">
                                        <li class="text-center col-md-2 col-sm-2 col-xs-4">
                                            <h6 class=" text-transparent ">Tues</h6>
                                            <div class="weather-icon-sm">
                                                <div class="icon"><i class="wi-day-cloudy-gusts"></i></div>
                                            </div>
                                        </li>
                                        <li class="text-center col-md-2 col-sm-2 col-xs-4">
                                            <h6 class=" text-transparent ">Wed</h6>
                                            <div class="weather-icon-sm">
                                                <div class="icon"><i class="wi-sprinkle"></i></div>
                                            </div>
                                        </li>
                                        <li class="text-center col-md-2 col-sm-2 col-xs-4">
                                            <h6 class=" text-transparent ">Thurs</h6>
                                            <div class="weather-icon-sm">
                                                <div class="icon"><i class="wi-day-sunny-overcast"></i></div>
                                            </div>
                                        </li>
                                        <li class="text-center col-md-2 col-sm-2 col-xs-4">
                                            <h6 class=" text-transparent ">Fri</h6>
                                            <div class="weather-icon-sm">
                                                <div class="icon"><i class="wi-day-sunny"></i></div>
                                            </div>
                                        </li>
                                        <li class="text-center col-md-2 col-sm-2 col-xs-4">
                                            <h6 class=" text-transparent ">Sat</h6>
                                            <div class="weather-icon-sm">
                                                <div class="icon"><i class="wi-day-lightning"></i></div>
                                            </div>
                                        </li>
                                        <li class="text-center col-md-2 col-sm-2 col-xs-4">
                                            <h6 class=" text-transparent ">Sun</h6>
                                            <div class="weather-icon-sm">
                                                <div class="icon"><i class="wi-day-cloudy"></i></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><!-- /weather -->
                    </div>
                </div>

                <!--inner row 2-->
                <div class="row">
                    <!-- Flot Realtime  -->
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="pull-left"><h4><i class="icon-sitemap"></i> Monthly Traffic Stats</h4></div>
                                <div class="tools pull-right">
                                    <a href="#"><i class="icon-refresh text-transparent"></i></a>
                                    <a href="javascript:;" class="close-panel" data-dismiss="panel"
                                       aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body no-padding">
                                <!-- realtime chart  -->
                                <div id="content">
                                    <div class="demo-container">
                                        <div id="placeholder" class="demo-placeholder"></div>
                                    </div>
                                </div><!-- / realtime chart  -->

                            </div>
                            <div class="panel-footer">
                                <a href="#">
                                    <small>VIEW ALL</small>
                                </a>
                                <a href="#">
                                    <div class="pull-right"><i class="icon-circle-arrow-right"></i></div>
                                </a>
                            </div>
                        </div>
                    </div><!-- / Flot Realtime  -->

                </div><!--/row 2-->
                <!--row 3-->
                <div class="row">
                    <!-- Weekly traffic stats -->
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="pull-left"><h4><i class="icon-signal"></i> Recent Activity</h4></div>
                                <div class="tools pull-right">
                                    <a href="#"><i class="icon-refresh text-transparent"></i></a>
                                    <a href="javascript:;" class="close-panel" data-dismiss="panel"
                                       aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="brand-primary-bg panel-body ">
                                <!-- graph -->
                                <div id="chartContainer" class="chart-canvas" style="height: 300px; width: 100%;">
                                </div>
                                <div id=""></div> <!-- /graph -->
                            </div>
                            <div class="brand-primary-bg panel-footer"></div>
                        </div>
                        <!-- / panel -->
                    </div><!-- / weekly traffics stats -->
                </div><!--/row 3-->
                <!--row 4-->
                <div class="row">
                    <!-- Map -->
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="pull-left"><h4><i class="icon-location-arrow"></i> Recent Visits</h4></div>
                                <div class="tools pull-right">
                                    <a class="btn btn-inverse btn-xs">Visits</a>
                                    <a class="btn btn-inverse btn-xs disabled">Orders</a>&nbsp;&nbsp;&nbsp;
                                    <a href="#"><i class="icon-refresh text-transparent"></i></a>
                                    <a href="javascript:;" class="close-panel" data-dismiss="panel"
                                       aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- google map -->
                            <div class="panel-body no-padding">
                                <section id="google-map">
                                    <div id="my-map"></div>
                                </section>
                            </div><!--/ google map-->
                            <div class="panel-footer text-center">
                                <div class="col-md-3 col-xs-6">
                                    <p><strong>Hits 2013</strong></p>
                                    <span class="sparkline">&nbsp;</span>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <p><strong>Hits 2012</strong></p>
                                    <div class="sparkline2"></div>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <p><strong>Hits 2011</strong></p>
                                    <span class="sparkline">&nbsp;</span>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <p><strong>Hits 2010</strong></p>
                                    <span class="sparkline2">&nbsp;</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div><!--Map-->
            </div>
            <!-- / stats & Updates Col 1-->
            <!-- Stats & Updates Col 2-->
            <div class="col-md-4">
                <!-- notifications-->
                <div class="panel panel-body-only panel-white-solid">
                    <div id="recentAnnouncements" class="panel-body">
                        <div class="carousel slide carousel-fade" id="carousel_fade">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="alert alert-default no-margin">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;
                                        </button>
                                        <ul class="list-inline">
                                            <li><a href="#"><img src="img/tn_user_06.jpg" alt="User"
                                                                 class="img-circle nav-avatar"><span
                                                            class="badge">2</span></a>
                                            </li>
                                            <li><a href="#">&nbsp;New Messages from Carson</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="alert alert-danger no-margin">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4 class="no-margin"><i class="icon-warning-sign"></i> &nbsp;Failed to connect
                                            to server</h4>


                                    </div>
                                </div>
                                <div class="item">
                                    <div class="alert alert-info no-margin">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4 class="no-margin"><i class="icon-spinner"></i> &nbsp;Host 123.654.234 has
                                            been migrated</h4>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="alert alert-danger no-margin">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4 class="no-margin"><i class="icon-trash"></i> &nbsp;Your trash is full</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- / notfications -->
                <!-- todo -->
                <div class="panel panel-white-solid">
                    <div class="panel-heading">
                        <div class="pull-left"><h4><i class="icon-tasks"></i> Todo List</h4></div>
                        <div class="tools pull-right">
                            <a href="#"><i class="icon-refresh text-transparent"></i></a>
                            <a href="javascript:;" class="close-panel" data-dismiss="panel" aria-hidden="true"><i
                                        class="icon-remove text-transparent"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body custom-check">
                        <div class="table-responsive table-no-border">
                            <table id="todo" class="table table-hover custom-check table-striped ">
                                <tbody>
                                <tr>
                                    <td class="tools">
                                        <span class="check"><input type="checkbox" class="checked"></span>
                                        <a href="#">Meet with Arin</a>
                                        <a class="close no-padding-right" aria-hidden="true" data-dismiss="alert"><i
                                                    class="icon-remove"></i></a>
                                        <a href="#" class="text-transparent pull-right"><i
                                                    class="icon-ok text-transparent "></i></a>
                                        <a href="#" class="text-transparent pull-right"><i
                                                    class="icon-pencil text-transparent "></i></a>

                                    </td>

                                </tr>
                                <tr>
                                    <td class="tools">
                                        <span class="check"><input type="checkbox" class="checked"></span>
                                        <a href="#">Send invoice</a>
                                        <a class="close no-padding-right" aria-hidden="true" data-dismiss="alert"><i
                                                    class="icon-remove"></i></a>
                                        <a href="#" class="text-transparent pull-right"><i
                                                    class="icon-ok text-transparent "></i></a>
                                        <a href="#" class="text-transparent pull-right"><i
                                                    class="icon-pencil text-transparent "></i></a>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="tools">
                                        <span class="check"><input type="checkbox" class="checked"></span>
                                        <a href="#">Check messages</a>
                                        <a class="close no-padding-right" aria-hidden="true" data-dismiss="alert"><i
                                                    class="icon-remove"></i></a>
                                        <a href="#" class="text-transparent pull-right"><i
                                                    class="icon-ok text-transparent "></i></a>
                                        <a href="#" class="text-transparent pull-right"><i
                                                    class="icon-pencil text-transparent "></i></a>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-inverse btn-xs"><span class="pull-left"><i class="icon-plus"></i>&nbsp;&nbsp;Add Task</span>
                        </button>
                        <a href="#">
                            <div class="pull-right text-transparent"><i class="icon-circle-arrow-right"></i></div>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div><!-- / todo -->
                <!-- Calendar-->
                <div id="calendar">
                    <div class="panel panel-med-gray-solid">
                        <div class="panel-body no-padding add-radius">
                            <div id="date-popover" class="popover top"
                                 style="cursor: pointer; disadding: block; margin-left:30%; margin-top:370px; width: 175px;">
                                <div class="arrow"></div>
                                <h3 class="popover-title" style="disadding: none;"></h3>
                                <div id="date-popover-content" class="popover-content"></div>
                            </div>
                            <div id="my-calendar"></div>
                        </div>
                    </div>
                </div><!-- / calendar -->
                <!-- Easy Pie Charts-->
                <div id="pie-charts">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="pull-left"><h4><i class="icon-ok-sign"></i> Views</h4></div>
                            <div class="tools pull-right">
                                <a href="#"><i class="icon-refresh text-transparent"></i></a>
                                <a href="javascript:;" class="close-panel" data-dismiss="panel" aria-hidden="true"><i
                                            class="icon-remove text-transparent"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="row col-lg-12 no-padding no-margin">
                                <div class="pull-left">
                                    <div class="no-padding"><h5 class="no-margin">No. of Views</h5></div>
                                    <div class="no-padding"><h3><i
                                                    class="icon-arrow-up text-transparent"></i>&nbsp;<strong>6%</strong>
                                        </h3></div>
                                </div>

                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="chart">
                                    <div class="percentage-light" data-percent="75"><span
                                                class="text-transparent">75%</span></div>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                            <div class="row col-lg-12 no-padding no-margin">
                                <div class="pull-left">
                                    <div class="no-padding"><h5 class="no-margin">No. of Views</h5></div>
                                    <div class="no-padding"><h3><i
                                                    class="icon-arrow-down text-transparent"></i>&nbsp;<strong>12%</strong>
                                        </h3></div>
                                </div>

                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="chart">
                                    <div class="percentage-light" data-percent="52"><span
                                                class="text-transparent">52%</span></div>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="panel-footer">
                            <span class="btn btn-sm btn-secondary">See All Sales</span>
                            <ul class="list-inline pull-right text-transparent icons-medium">
                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                <li class=""><a href="#"><i class="icon-twitter"></i></a></li>
                                <li class=""><a href="#"><i class="icon-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!--/end easy pie charts-->
            </div><!-- / stats & Updates Col 2-->


        </div><!-- /page-content-wrapper -->

    </div><!-- / wrapper for content below nav bar -->
</div><!-- end container for chat panel push-->


<!-- JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Theme Core -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/chat.js"></script>
<script src="assets/js/modernizr-2.6.2.min.js"></script>

<script src="dist/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui-1.10.4.custom.min.js"></script>

<!-- Pushy JS -->
<script src="assets/js/pushy.js"></script>

<!-- Zabuto Calendar -->
<script src="assets/plugins/calendar/zabuto_calendar.js"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [
                {type: "text", label: "Special event", badge: "00"},
                {type: "block", label: "Regular event",}
            ]
        });
    });

    function myDateFunction(id, fromModal) {
        $("#date-popover").hide();
        if (fromModal) {
            $("#" + id + "_modal").modal("hide");
        }
        var date = $("#" + id).data("date");
        var hasEvent = $("#" + id).data("hasEvent");
        if (hasEvent && !fromModal) {
            return false;
        }
        $("#date-popover-content").html('You clicked on date ' + date);
        $("#date-popover").show();
        return true;
    }

    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>
<!-- Sparkline -->
<script src="assets/js/jquery.sparkline.js"></script>

<!-- EzMark -->
<script src="assets/js/jquery.ezmark.js"></script>
<script src="assets/select/select2.js"></script>

<script type="text/javascript">
    $(function () {
        $('.custom-check input').ezMark()
    });
</script>

<!-- Canvas.js-->
<script src="assets/plugins/canvas/canvasjs.min.js"></script>
<!-- ColorPicker -->
<script type="text/javascript" src="colorPicker/colpick/js/colpick.js"></script>
<script type="text/javascript" src="colorPicker/colpick/js/colpick-implem.js"></script>

<!-- Custom -->
<script src="assets/js/sidebar-navbar.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/chart-data.js"></script>

<!-- Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="assets/js/gmap3.js"></script>
<script src="assets/js/gmap.custom-index-map.js"></script>

<!-- Font Awesome Markers -->
<script src="assets/plugins/fontawesome-markers-master/fontawesome-markers.js"></script>

<!-- Easy Pie Charts -->
<script type="text/javascript" src="assets/plugins/jquery-easy-pie-chart/examples/excanvas.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>

<!-- Initialize Carousel-->
<script>$('.carousel').carousel({
        interval: 7000
    })
</script>
<!-- Flot -->
<script type="text/javascript" src="assets/plugins/flot/jquery.flot.js"></script>
<script type="text/javascript" src="assets/plugins/flot/jquery.flot.resize.js"></script>

</body>
</html>
