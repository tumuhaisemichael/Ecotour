<div>
    <!-- SubHeader =============================================== -->
    <section class="header-video">
        <div id="hero_video">
            <div id="animate_intro">
                <h3>Enjoy a Perfect Tour</h3>
                <p>
                    Find the best Tours and Excursion at the best price
                </p>
            </div>
        </div>
        <img src="{{ asset('assets/tourist/img/video_fix.png')}}" alt="" class="header-video--media"
            data-video-src="{{ asset('assets/tourist/video/intro')}}"
            data-teaser-source="{{ asset('assets/tourist/video/intro')}}" data-provider="" data-video-width="1920"
            data-video-height="750">
    </section>
    <!-- End Header video -->
    <!-- End SubHeader ============================================ -->
    <section class="wrapper">
        <div class="divider_border"></div>

        <div class="container">
            <div class="main_title">
                <h2>Top <span>Eco-Friendly</span> Tours</h2>
                <p>Experience the beauty of Uganda while supporting sustainable tourism and local communities.</p>
            </div>
            <div class="row">
                @forelse($experiences as $experience)
                <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                    <div class="img_wrapper">
                        @if($loop->first)
                        <div class="ribbon">
                            <span>Community Favorite</span>
                        </div>
                        @endif
                        <div class="price_grid">
                            <sup>$</sup>{{ number_format($experience->price, 0) }}
                        </div>
                        <div class="img_container">
                            <a href="{{ route('tourist.booking-details', ['id' => $experience->id]) }}">
                                @if($experience->photo)
                                <img src="{{ Storage::url($experience->photo) }}" width="800" height="533"
                                    class="img-responsive" alt="{{ $experience->title }}">
                                @else
                                <img src="{{ asset('assets/ecotour/img/tour_default.jpg') }}" width="800" height="533"
                                    class="img-responsive" alt="Default Tour Image">
                                @endif
                                <div class="short_info">
                                    <h3>{{ $experience->title }}</h3>
                                    <em>{{ ucfirst($experience->category) }}</em>
                                    <p>
                                        {{ Str::limit($experience->description, 100) }}
                                    </p>
                                    {{-- You might want to add a rating system later --}}
                                    <div class="score_wp">Excellent
                                        <div class="score">8.9</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>No experiences available at the moment.</p>
                </div>
                @endforelse
            </div>

            <!-- End row -->

            <div class="main_title_2">
                <h3>Explore More <span>Sustainable</span> Tours</h3>
                <p>Support local communities and enjoy authentic Ugandan experiences.</p>
            </div>
            <div class="row list_tours">
                <div class="col-sm-6">
                    <h3>New Eco Tours</h3>
                    <ul>
                        <li>
                            <div>
                                <a href="#">
                                    <i class="fa fa-paw fa-2x" aria-hidden="true"></i> <!-- Gorilla icon -->
                                    <h4>Gorilla Trekking Experience</h4>
                                    <small>Duration: Full Day</small>

                                </a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#">
                                    <i class="fa fa-home fa-2x" aria-hidden="true"></i> <!-- Village icon -->
                                    <h4>Village Life Tour</h4>
                                    <small>Duration: 2 hours</small>

                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6">
                    <h3>Featured Cultural Experiences</h3>
                    <ul>
                        <li>
                            <div>
                                <a href="#">
                                    <i class="fa fa-music fa-2x" aria-hidden="true"></i> <!-- Dance icon -->
                                    <h4>Traditional Dance Evening</h4>
                                    <small>Duration: 1.5 hours</small>

                                </a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#">
                                    <i class="fa fa-shopping-basket fa-2x" aria-hidden="true"></i> <!-- Market icon -->
                                    <h4>Local Market Visit</h4>
                                    <small>Duration: 1 hour</small>

                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End list_tours row -->

        </div>

        <!-- End container -->
    </section>
</div>