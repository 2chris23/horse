@extends('backend.layouts.base')
@section('title', trans('horse.chooseone') )

@section('topcss')
    <link type="text/css" rel="stylesheet"
          href="{!!url('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/timeline2.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/calendar_custom.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/profile.min.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/gallery.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>

@endsection
@section('content')
    <div class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-lg-6 m-t-35">
                    <div class="text-xs-center">
                        <div class="form-group">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumb_zoom zoom admin_img_width">
                                    <img src="img/admin.jpg" alt="admin" class="admin_img_width">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumb_zoom zoom admin_img_width">
                                </div>
                                <div class="btn_file_position">
                                                    <span class="btn btn-primary btn-file">
                                                        <span class="fileinput-new">Change image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="Changefile">
                                                    </span>
                                    <a href="#" class="btn btn-warning fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="view_friends_imgs">
                                <br/>
                                <p>
                                    <strong>FRIENDS</strong>
                                </p>
                                <div class="friends_img_left">
                                    <div class="thumb_zoom zoom">
                                        <img src="img/mailbox_imgs/2.jpg" class="img-rounded" alt="friend">
                                    </div>
                                    <div class="thumb_zoom zoom">
                                        <img src="img/mailbox_imgs/3.jpg" class="img-rounded" alt="friend">
                                    </div>
                                    <div class="thumb_zoom zoom">
                                        <img src="img/mailbox_imgs/5.jpg" class="img-rounded" alt="friend">
                                    </div>
                                    <div class="thumb_zoom zoom">
                                        <img src="img/mailbox_imgs/6.jpg" class="img-rounded" alt="friend">
                                    </div>
                                    <div class="thumb_zoom zoom">
                                        <img src="img/mailbox_imgs/7.jpg" class="img-rounded" alt="friend">
                                    </div>
                                    <div class="thumb_zoom zoom">
                                        <img src="img/mailbox_imgs/8.jpg" class="img-rounded" alt="friend">
                                    </div>
                                    <div class="thumb_zoom zoom">
                                        <img src="img/mailbox_imgs/10.jpg" class="img-rounded" alt="friend">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 m-t-25">
                    <div>
                        <ul class="nav nav-inline view_user_nav_padding">
                            <li class="nav-item card_nav_hover">
                                <a class="nav-link active" href="#user" id="home-tab"
                                   data-toggle="tab" aria-expanded="true">User
                                    Details</a>
                            </li>
                            <li class="nav-item card_nav_hover">
                                <a class="nav-link" href="#tab2" id="hats-tab" data-toggle="tab">About Me</a>
                            </li>
                            <li class="nav-item card_nav_hover">
                                <a class="nav-link" href="#tab3" id="followers" data-toggle="tab">Followers</a>
                            </li>
                        </ul>
                        <div id="clothing-nav-content" class="tab-content m-t-10">
                            <div role="tabpanel" class="tab-pane fade in active" id="user">
                                <table class="table" id="users">
                                    <tr>
                                        <td>User Name</td>
                                        <td class="inline_edit">
                                                        <span class="editable"
                                                              data-title="Edit User Name">Micheal</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>E-mail</td>
                                        <td>
                                            <span class="editable"
                                                  data-title="Edit E-mail">gankunding@hotmail.com</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td>
                                            <span class="editable" data-title="Edit Phone Number">(999)999-9999</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>
                                            <span class="editable" data-title="Edit Address">Australia</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Created At</td>
                                        <td>1 month ago</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>
                                            <span class="editable" data-title="Edit City">Nakia</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pincode</td>
                                        <td>
                                            <span class="editable" data-title="Edit Pincode">522522</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab2">
                                <div class="card_nav_body_padding">
                                    <p>
                                        Howdy, I'm in About Me.
                                    </p>
                                    <p class="text-justify">
                                        Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                        ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                        consequat. Duis autem vel eum iriure dolor in hendrerit in
                                        vulputate velit esse molestie consequat. Ut wisi enim ad
                                        minim veniam, quis nostrud exerci tation.
                                    </p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab3">
                                <div class="card_nav_body_padding follower_images">
                                    <div class="row">
                                        <div class="col-sm-3 col-xl-2">
                                            <div class="img">
                                                <a href="#">
                                                    <img src="img/mailbox_imgs/2.jpg" class="rounded-circle"
                                                         alt="friend">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 col-xl-9">
                                            <div class="details">
                                                <div class="name">
                                                    <a href="#">Scarlett Johansson</a>
                                                </div>
                                                <div class="time">
                                                    <i class="fa fa-clock-o">
                                                    </i> Last seen: 7 minutes ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-15">
                                        <div class="col-sm-3 col-xl-2">
                                            <div class="img">
                                                <a href="#">
                                                    <img src="img/mailbox_imgs/3.jpg" class="rounded-circle"
                                                         alt="friend">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 col-xl-10">
                                            <div class="details">
                                                <div class="name">
                                                    <a href="#">Mila Kunis</a>
                                                </div>
                                                <div class="time">
                                                    <i class="fa fa-clock-o">
                                                    </i> Online
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-15">
                                        <div class="col-xl-2 col-sm-3">
                                            <div class="img">
                                                <a href="#">
                                                    <img src="img/mailbox_imgs/8.jpg" class="rounded-circle"
                                                         alt="friend">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-sm-9">
                                            <div class="details">
                                                <div class="name">
                                                    <a href="#">George Clooney</a>
                                                </div>
                                                <div class="time">
                                                    <i class="fa fa-clock-o">
                                                    </i> Last seen: 1 hour ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-15">
                                        <div class="col-xl-2 col-sm-3">
                                            <div class="img">
                                                <a href="#">
                                                    <img src="img/mailbox_imgs/6.jpg" class="rounded-circle"
                                                         alt="friend">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-sm-9">
                                            <div class="details">
                                                <div class="name">
                                                    <a href="#">Robert Downey Jr.</a>
                                                </div>
                                                <div class="time">
                                                    <i class="fa fa-clock-o">
                                                    </i> Online
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-15">
                                        <div class="col-xl-2 col-sm-3">
                                            <div class="img">
                                                <a href="#">
                                                    <img src="img/mailbox_imgs/5.jpg" class="rounded-circle"
                                                         alt="friend">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-sm-9">
                                            <div class="details">
                                                <div class="name">
                                                    <a href="#">Ryan Gossling</a>
                                                </div>
                                                <div class="time">
                                                    <i class="fa fa-clock-o">
                                                    </i> Last seen: 45 minutes ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-t-35">
                <div class="card-header bg-white">
                    <div>
                        <i class="fa fa-calendar">
                        </i>
                        Upcoming Events
                    </div>
                </div>
                <div class="card-block m-t-35 padding-body view_user_cal">
                    <div id="calendar_mini" class="bg-primary">
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item calendar-list">
                            <div class="tag tag-pill tag-primary float-xs-right">07:30</div>
                            Meet a friend
                        </a>
                        <a href="#" class="list-group-item calendar-list">
                            <div class="tag tag-pill tag-primary float-xs-right">10:30</div>
                            Seminar on market
                        </a>
                        <a href="#" class="list-group-item calendar-list">
                            <div class="tag tag-pill tag-primary float-xs-right">11:30</div>
                            Meeting with CEO
                        </a>
                        <a href="#" class="list-group-item calendar-list">
                            <div class="tag tag-pill tag-primary float-xs-right">17:30</div>
                            Sales proposal
                        </a>
                        <a href="#" class="list-group-item calendar-list">
                            <div class="tag tag-pill tag-primary float-xs-right">19:30</div>
                            Milestone release
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card m-t-35">
                <div class="card-header bg-white">
                    <div>
                        <i class="fa fa-pencil">
                        </i>
                        Recent Feeds
                    </div>
                </div>
                <div class="card-block m-t-35 padding">
                    <div class="feed">
                        <ul>
                            <li>
                                                    <span>
                                                        <img src="img/roundicons/flat/Office-27.png" alt="text_image"
                                                             class="rounded-circle img-fluid recent_feeds_img"/>
                                                    </span>
                                <h5>
                                    Important Mails
                                </h5>
                                <p>
                                    Mail received from
                                    <strong>John</strong> .
                                </p>
                                <i>1 hr back</i>
                            </li>
                            <li>
                                                    <span>
                                                        <img src="img/roundicons/flat/Technology-07.png"
                                                             alt="text_image"
                                                             class="rounded-circle img-fluid recent_feeds_img"/>
                                                    </span>
                                <h5>
                                    Documents
                                </h5>
                                <p>
                                    <strong>Documents</strong> have sent to
                                    <strong>MJ</strong> .
                                </p>
                                <i>1 hr ago</i>
                            </li>
                            <li>
                                                    <span>
                                                        <img src="img/mailbox_imgs/8.jpg"
                                                             class="rounded-circle img-fluid pull-left recent_feeds_img"
                                                             alt="Image">
                                                    </span>
                                <h5>
                                    Mails
                                </h5>
                                <p>
                                    Mail sent to
                                    <strong>sandy</strong> .
                                </p>
                                <i>2 hr back</i>
                            </li>
                            <li>
                                                    <span>
                                                        <img src="img/mailbox_imgs/6.jpg"
                                                             class="rounded-circle img-fluid pull-left recent_feeds_img"
                                                             alt="Image">
                                                    </span>
                                <h5>
                                    Mails
                                </h5>
                                <p>
                                    Mail sent to
                                    <strong>John</strong> .
                                </p>
                                <i>30 minutes back</i>
                            </li>

                            <li>
                                                    <span>
                                                        <img src="img/roundicons/flat/Office-06.png" alt="text_image"
                                                             class="rounded-circle img-fluid recent_feeds_img"/>
                                                    </span>
                                <h5>
                                    Notice
                                </h5>
                                <p>
                                    <strong>Lorem Ipsum</strong> is simply dummy text of the printing and
                                    typesetting industry.
                                </p>
                                <i>2 hr back</i>
                            </li>
                            <li>
                                                    <span>
                                                        <img src="img/mailbox_imgs/5.jpg"
                                                             class="rounded-circle img-fluid pull-left recent_feeds_img"
                                                             alt="Image">
                                                    </span>
                                <h5>
                                    Mails
                                </h5>
                                <p>
                                    Mail sent to
                                    <strong>Peter</strong> .
                                </p>
                                <i>1 hr back</i>
                            </li>
                            <li class="no-border">
                                                    <span>
                                                        <img src="img/mailbox_imgs/2.jpg"
                                                             class="rounded-circle img-fluid pull-left recent_feeds_img"
                                                             alt="Image">
                                                    </span>
                                <h5>
                                    Important Notice
                                </h5>
                                <p>
                                    <strong>Renny</strong> sent some documents .
                                </p>
                                <i>3 hr back</i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card m-t-35">
    @endsection

    @section('bottomjs')
        <!--Plugin scripts-->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js">
            </script>
            <script type="text/javascript" src="{!!url('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js')!!}">
            </script>
            <script type="text/javascript"
                    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-calendar/0.2.5/js/calendar.min.js">
            </script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js">
            </script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js">
            </script>
            <!--End of Plugin scripts-->
            <!--Page level scripts-->
            <script type="text/javascript" src="{!!url('assets/js/pages/mini_calendar.js')!!}">
            </script>
            <!--End of Page level scripts-->

@endsection
