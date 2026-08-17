@extends('frontend.landing.v3.base')

@section('content')
    @include('frontend.landing.v3.partial.intro')
    <!-- Contact Section -->
    <section id="contact">
        <div class="container content-section">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="done">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            Your message has been sent. Thank you!
                        </div>
                    </div>
                    <form method="post" action="contact.php" id="contactform">
                        <div class="form">
                            <input type="text" name="name" placeholder="Your Name *">
                            <input type="text" name="email" placeholder="Your E-mail Address *">
                            <textarea name="comment" rows="7" placeholder="Type your Message *"></textarea>
                            <input type="submit" id="submit" class="clearfix btn" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
