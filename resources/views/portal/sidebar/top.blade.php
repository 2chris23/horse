<?php $logo =url("landing/images/basic/logo.png"); ?>
<?php $logo =url("portal_/images/logoportal.png"); ?>
<div class="colored-header">
    <!-- Top Bar -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Header Top Left -->
                <div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">
                    <ul class="listnone">
                        <li>
                            <a href="about.html">
                                <i class="fa fa-heart-o" aria-hidden="true">
                                </i> About</a>
                        </li>
                        <li>
                            <a href="faqs.html">
                                <i class="fa fa-folder-open-o" aria-hidden="true">
                                </i> FAQS</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-globe" aria-hidden="true">
                                </i>
                                Language <span class="caret">
</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{!! route('lengauje',['lang'=>'en']) !!}">English</a></li>
                                <li><a href="{!! route('lengauje',['lang'=>'es']) !!}">Español</a></li>
                                <li><a href="{!! route('lengauje',['lang'=>'nl']) !!}">Nederlands</a></li>
                                <li><a href="{!! route('lengauje',['lang'=>'de']) !!}">Deutsch</a></li>

                                <li><a href="{!! route('lengauje',['lang'=>'fr']) !!}">Français</a></li>
                                <li><a href="{!! route('lengauje',['lang'=>'it']) !!}">Italiano</a></li>
                                <li><a href="{!! route('lengauje',['lang'=>'pt']) !!}">Português</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Header Top Right Social -->
                <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
                    <div class="pull-right">
                        <ul class="listnone">
                            <li>
                                <a href="login.html">
                                    <i class="fa fa-sign-in">
                                    </i> Log in</a>
                            </li>
                            <li>
                                <a href="register.html">
                                    <i class="fa fa-unlock" aria-hidden="true">
                                    </i> Register</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-profile-male"
                                       aria-hidden="true">
                                    </i> Umair <span
                                            class="caret">
</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="profile.html">User Profile</a>
                                    </li>
                                    <li>
                                        <a href="profile-2.html">User Profile 2</a>
                                    </li>
                                    <li>
                                        <a href="archives.html">Archives</a>
                                    </li>
                                    <li>
                                        <a href="active-ads.html">Active Ads</a>
                                    </li>
                                    <li>
                                        <a href="pending-ads.html">Pending Ads</a>
                                    </li>
                                    <li>
                                        <a href="favourite.html">Favourite Ads</a>
                                    </li>
                                    <li>
                                        <a href="messages.html">Message Panel</a>
                                    </li>
                                    <li>
                                        <a href="deactive.html">Account Deactivation</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- Navigation Menu -->
    @include('portal.menu.menu')
</div>