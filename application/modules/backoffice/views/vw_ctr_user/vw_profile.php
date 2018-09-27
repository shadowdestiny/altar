<!-- Keep all page content within the page-content-wrapper -->
<div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">

    <!-- Col 1 -->
    <div class="col-md-12 no-breadcrumb">
        <!-- basic info -->
        <div class="col-md-12 no-padding">
            <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                <div class="panel-heading">
                    <div class="tools pull-right">
                        <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i
                                    class="icon-remove text-transparent"></i></a></div>
                </div>
                <div id="announcement" class="panel-body no-padding-top">
                    <ul class="list-inline">
                        <li>
                            <div class="chart-small">
                                <div class="percentage-light" data-percent="75"><span
                                            class="text-transparent">75%</span></div>
                            </div>
                        </li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li class="align-center-vert">
                            <h4>Complete your Profile</h4>
                            <h2 class="text-transparent">Your profile is 75% complete</h2>
                            <button class="btn btn-primary btn-sm">Update</button>&nbsp;&nbsp;
                            <button class="btn btn-default btn-sm">Skip</button>

                        </li>
                    </ul>
                    <br>
                    <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                </div>

            </div>

        </div>
        <div id="profile-main-widget" class="col-md-12 no-padding">
            <div class="panel text-center">
                <div class="panel-body bgimg-clouds">
                    <div class="col-sm-12  no-padding text-center">
                        <div class="tools pull-right icons-medium text-transparent">
                            <a href="#" data-toggle="modal" data-target="#modal_upload_image"><i
                                        class="icon-camera text-transparent"></i></a>
                            <a href="#"><i class="icon-cog text-transparent"></i></a>
                            <a href="#"><i class="icon-pencil text-transparent"></i></a>
                        </div>
                        <div class="clearfix"></div>
                        <!-- user -->
                        <ul class="list-inline list-unstyled">
                            <li>
                                <div class="avatar text-center avatar-lg animated flipInX">
                                    <img src="<?= URL_ASSETS; ?>profiles/dannyasd.jpg" alt="Ryan" class="img-circle"
                                         width="135">
                                </div>
                            </li>
                            <li class="align-center-vert">
                                <div class="leftarrowdiv-white">
                                    <div class="well-lg transparent">
                                        <ul class="list-unstyled">
                                            <li class="no-padding-left"><h2><?= $fullname; ?></h2></li>
                                            <li class="no-padding-left"><h5 class="text-transparent">Web Designer at
                                                    Smith
                                                    & Smith Studios</h5></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            </li>
                        </ul>
                    </div>
                    <br><br>
                    <div class="col-sm-3 col-xs-6">
                        <div class="text-inverse">
                            <span class="number"><i class="icon-group"></i>&nbsp;2,540</span>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="text-inverse">
                            <span class="number"><i class="icon-heart"></i>&nbsp;3,070</span>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="text-inverse">
                            <span class="number"><i class="icon-twitter"></i>&nbsp;645</span>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="text-inverse">
                            <span class="number"><i class="icon-rss"></i>&nbsp;1,301</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>  <!-- / basic info -->
        <!-- Edit personal info -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li><a href="#user" data-toggle="tab"><i class="icon-user"></i>&nbsp;&nbsp;&nbsp;About me</a>
            <li><a href="#education" data-toggle="tab"><i class="icon-book"></i>&nbsp;&nbsp;&nbsp;Education</a></li>
            <li><a href="#resume" data-toggle="tab"><i class="icon-file-text"></i>&nbsp;&nbsp;&nbsp;Work Experience</a>
            </li>
            <li><a href="#accolades" data-toggle="tab"><i class="icon-star"></i>&nbsp;&nbsp;&nbsp;Accolades</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content add-shadow">
            <div class="tab-pane active" id="user">
                <h3>Basic Info</h3>
                <p><a href="#" id="info" data-type="text" data-pk="1" data-title="Enter Info">Vivamus id felis a arcu
                        posuere blandit eu accumsan enim. Nunc massa arcu, placerat luctus lacus a, consequat suscipit
                        eros. Nunc malesuada, mi consectetur hendrerit bibendum, dui magna luctus erat, pharetra rhoncus
                        sem lorem in mi. Integer ac vestibulum dui. Nullam eleifend arcu nec eros dapibus tristique.
                        Donec dictum orci tortor, in porttitor nisi posuere id. </a>
                </p><br>
                <p><strong>Find me:</strong></p>
                <button class="btn btn-default"><i class="icon-flickr"></i></button>
                <button class="btn btn-default"><i class="icon-tumblr"></i></button>
                <button class="btn btn-default"><i class="icon-android"></i></button>
            </div>
            <div class="tab-pane" id="education">
                <h3>Education</h3>
                <h4>International University of Italy</h4>
                M.F.A Graphic Design<br>
                <span class="text-transparent">2007&mdash;2011</span>
                <br><br>
                <h4>State University</h4>
                B.A. Liberal Arts<br>
                <span class="text-transparent">2002&mdash;2007</span>
                <br><br>
                <h4>Provisional Certificate</h4>
                Department of Education<br>
                <span class="text-transparent">2001</span>
                <br><br>
            </div>
            <div class="tab-pane" id="resume">
                <h3>Work Experience</h3>
                <h4>Art & Technology Center</h4>
                Teacher of Design<br>
                <span class="text-transparent">2011&mdash;Present</span>
                <br><br>
                <h4>The New Studio</h4>
                Intern<br>
                <span class="text-transparent">June 2011&mdash;August 2011</span>
                <br><br>
                <h4>Smith's Construction</h4>
                Crate Builder / Carpenter<br>
                <span class="text-transparent">2005&mdash;2011</span>
                <br><br>
            </div>
            <div class="tab-pane" id="accolades">
                <h3>Accolades</h3>

                <h4><a href="#" id="accolade-1" data-type="text" data-pk="1" data-title="Enter Accolade">Best of
                        Competition&nbsp;&nbsp;&nbsp;<i class="icon-pencil text-transparent"></i></a></h4>

                2013 ADDY Awards<br>
                <span class="text-transparent">2013</span>
                <br><br>
                <h4><a href="#" id="accolade-2" data-type="text" data-pk="1" data-title="Enter Accolade">Oustanding
                        Student Achievement&nbsp;&nbsp;&nbsp;<i class="icon-pencil text-transparent"></i></a></h4>
                International University of Italy<br>
                <span class="text-transparent">2011</span>
                <br><br>
                <h4><a href="#" id="accolade-3" data-type="text" data-pk="1" data-title="Enter Accolade">Certificate of
                        Excellence&nbsp;&nbsp;&nbsp;<i class="icon-pencil text-transparent"></i></a></h4>
                Creative Annual Award<br>
                <span class="text-transparent">2010</span>
                <br><br>
            </div>
        </div>
    </div><!--/ Col 1 -->



</div><!--/ page-content-wrapper-->