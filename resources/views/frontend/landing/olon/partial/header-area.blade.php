<div class="header-area">
    <!--Start Header Area-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-lg-3">
                <div class="log-link">
                    {{--
                    <p>Well come visitor you can</p>
                    <h5>
                        <a href="login.html">Login</a> or <a href="login.html">Create an account</a>
                    </h5>
                    --}}
                </div>
            </div>
            <div class="col-sm-4 col-lg-6">
                <div class="logo text-center">
                    <a href="index.html">

                        <img src="{!! $stud->getLogo() !!}" alt=""/>
                        <h4 class="text-center">
                            {!! $stud->getName() !!}
                        </h4>
                    </a>
                </div>
            </div>
            <div class="col-sm-4 col-lg-3">
                <div class="cart-info float-right">
                    {{--
                    <a href="cart.html">
                        <h5>My cart <span>2</span> items - <span>$390</span>
</h5>
                        <i class="fa fa-shopping-cart">
</i>
                    </a>
                    --}}
                    <div class="cart-hover">
                        {{--
                        <ul class="header-cart-pro">
                            <li>
                                <div class="image">
                                    <a href="#">
                                        <img alt="cart item"
                                             src="{!! url('theme/y/img/cart-1.jpg') !!}">
                                    </a>
                                </div>
                                <div class="content fix">
                                    <a href="#">Product Name</a>
                                    <span
                                            class="price">Price: $130</span>
                                    <span class="quantity">Quantity: 1</span>
                                </div>
                                <i class="fa fa-trash delete">
                                </i>
                            </li>
                            <li>
                                <div class="image">
                                    <a href="#">
                                        <img alt="cart item"
                                             src="{!! url('theme/y/img/cart-2.jpg') !!}">
                                    </a>
                                </div>
                                <div class="content fix">
                                    <a href="#">Product Name</a>
                                    <span
                                            class="price">Price: $130</span>
                                    <span class="quantity">Quantity: 2</span>
                                </div>
                                <i class="fa fa-trash delete">
                                </i>
                            </li>
                        </ul>
                        <div class="header-button-price">
                            <a href="checkout.html">
                                <i class="fa fa-sign-out">
                                </i>
                                <span>Check Out</span>
                            </a>
                            <div class="total-price">
                                <h3>Total Price : <span>$390</span>
                                </h3>
                            </div>
                        </div>
                        --}}
                    </div>
                </div>
                <div class="search float-right">
                    {{--
                    <input type="text" value="" placeholder="Search Here...."/>
                    <button class="submit">
                        <i class="fa fa-search">
                        </i>
                    </button>
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Header Area-->