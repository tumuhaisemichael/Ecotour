<div>
    <!-- SubHeader =============================================== -->
    <section class="parallax_window_in" data-parallax="scroll"
        data-image-src="{{ asset('assets/tourist/img/pack.jpg') }}" data-natural-width="1400" data-natural-height="470">
        <div id="sub_content_in">
            <div id="animate_intro">
                <h1>Contact EcoTour Uganda</h1>
                <p>"Connecting travelers with the heart of Uganda's natural beauty and communities"</p>
            </div>
        </div>
    </section>
    <!-- End section -->
    <!-- End SubHeader ============================================ -->

    <section class="wrapper add_bottom_30">
        <div class="divider_border"></div>
        <div class="container">

            <div class="row">

                <aside class="col-md-3">
                    <div class="box_style_2">
                        <h4 class="nomargin_top">Contact Information</h4>
                        <p>
                            123 Safari Rd, Kampala, Uganda
                            <br> +256 (0) 123 456 789a
                            <br>
                            <a href="mailto:info@ecotouruganda.com">info@ecotouruganda.com</a>
                        </p>
                        <h5>Get Directions</h5>
                        <form action="http://maps.google.com/maps" method="get" target="_blank">
                            <div class="form-group">
                                <input type="text" name="saddr" placeholder="Enter your location"
                                    class="form-control styled">
                                <input type="hidden" name="daddr" value="Kampala, Uganda">
                                <!-- Write here your end point -->
                            </div>
                            <input type="submit" value="Get Directions" class="btn_1 add_bottom_15">
                        </form>
                        <hr class="styled">
                        <h4>Departments</h4>
                        <ul class="contacts_info">
                            <li>Customer Service
                                <br>
                                <a href="tel:+2560123456789">+256 123 456 789</a>
                                <br><a href="mailto:support@ecotouruganda.com">support@ecotouruganda.com</a>
                                <br>
                                <small>Monday to Friday, 9am - 6pm</small>
                            </li>
                            <li>General Inquiries
                                <br>
                                <a href="tel:+2560123456789">+256 123 456 789</a>
                                <br><a href="mailto:info@ecotouruganda.com">info@ecotouruganda.com</a>
                                <br>
                                <p><small>Monday to Friday, 9am - 6pm</small></p>
                            </li>
                        </ul>
                    </div>
                </aside>
                <!--End aside -->

                <div class="col-md-9">
                    <h3>Contact Us</h3>
                    <p>
                        Whether you have questions, feedback, or would like to learn more about our tours, feel free to
                        reach out. We're here to help make your travel experience in Uganda unforgettable!
                    </p>
                    <div>
                        <div id="message-contact"></div>
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form wire:submit.prevent="submitForm">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" wire:model="first_name" class="form-control styled"
                                            placeholder="Jane">
                                        @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" wire:model="last_name" class="form-control styled"
                                            placeholder="Doe">
                                        @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" wire:model="email" class="form-control styled"
                                            placeholder="jane.doe@example.com">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number:</label>
                                        <input type="text" wire:model="phone" class="form-control styled"
                                            placeholder="+256 123 456 789">
                                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Your Message:</label>
                                <textarea rows="5" wire:model="message" class="form-control styled"
                                    style="height:100px;" placeholder="Hello EcoTour Uganda!"></textarea>
                                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" value="Submit" class="btn_1">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- End col lg 9 -->
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </section>
    <!-- End section -->
</div>