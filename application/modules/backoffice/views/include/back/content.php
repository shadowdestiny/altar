<!-- Keep all page content within the page-content-wrapper -->
<div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">
    <!-- page content header -->
    <div class="row add-padding">
        <div class="pull-left">
            <h1>Good Morning Ryan</h1>
            <ol class="breadcrumb">
                <li><a href="<?= URL_TEMPLATEBACK; ?>index.html" class="text-transparent">Dashboard</a></li>
                <li><a href="<?= URL_TEMPLATEBACK; ?>index.html" class="text-transparent">Stats</a></li>
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
                                    <li><a href="#"><img src="<?= URL_TEMPLATEBACK; ?>img/tn_user_06.jpg" alt="User"
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
