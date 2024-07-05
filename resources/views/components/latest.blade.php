<section id="latest_changes" class="latest_changes">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h3>Latest updates</h3>
        </div>
        <div class="row">
            <div class="justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <div id="latest_changes_carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($latest_changes as $latest_change)
                            <div class="carousel-item @if($loop->first) active @endif" data-bs-interval="3000">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ $latest_change->library }}</h5>
                                        <p class="card-text text-center"><small class="text-muted">Updated
                                                on {{ $latest_change->last_edited }}</small></p>
                                        <div class="d-flex justify-content-center">
                                            @if($latest_change->is_disabled)
                                                <a href="{{ route('show_library', $latest_change->library_name_slug) }}"
                                                   class="btn btn-danger"><i class="bi bi-exclamation-triangle-fill"></i> Broken link</a>
                                            @else
                                                <a href="{{ route('show_library', $latest_change->library_name_slug) }}"
                                                   class="btn btn-primary"><i class="bi bi-search"></i> Explore</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button"
                            data-bs-target="#latest_changes_carousel"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                            data-bs-target="#latest_changes_carousel"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
