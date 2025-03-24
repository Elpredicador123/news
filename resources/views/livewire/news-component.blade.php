<div>
    <!-- Featured Posts Section -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="title">Featured News</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($topNews as $news)
                <div class="col-lg-4 col-md-6">
                    <article class="post-grid mb-5">
                        <div class="post-thumb mb-4">
                            @if($news->urlToImage)
                                <img src="{{ $news->urlToImage }}" alt="{{ $news->title }}" class="img-fluid w-100">
                            @else
                                <div class="bg-light d-flex justify-content-center align-items-center" style="height: 200px;">
                                    <i class="ti-image" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                        </div>
                        <span class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">{{ $news->name }}</span>
                        <h3 class="post-title mt-1"><a href="{{ $news->url }}" target="_blank">{{ $news->title }}</a></h3>
                        <div class="post-meta mt-2">
                            <div class="d-flex align-items-center">
                                @if($news->author->picture)
                                    <img src="{{ $news->author->picture }}" alt="{{ $news->author->name }}" class="img-fluid mr-2" style="width: 26px; height: 26px; border-radius: 50%;">
                                @endif
                                <a href="#" class="text-muted font-sm">{{ $news->author->name }}</a>
                            </div>
                            <span class="text-muted text-capitalize font-sm">{{ $news->publishedAt->format('M d, Y') }}</span>
                        </div>
                        <div class="post-content mt-2">
                            <p>{{ \Illuminate\Support\Str::limit($news->description, 100) }}</p>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="title">All News</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($allNews as $news)
                <div class="col-lg-6 mb-4">
                    <div class="post-card border-0 mb-4">
                        <div class="row">
                            <div class="col-4">
                                @if($news->urlToImage)
                                    <img src="{{ $news->urlToImage }}" alt="{{ $news->title }}" class="img-fluid w-100">
                                @else
                                    <div class="bg-light d-flex justify-content-center align-items-center" style="height: 100%; min-height: 120px;">
                                        <i class="ti-image" style="font-size: 2rem;"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-8">
                                <div class="post-content">
                                    <span class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">{{ $news->name }}</span>
                                    <h3 class="post-title mt-1"><a href="{{ $news->url }}" target="_blank">{{ \Illuminate\Support\Str::limit($news->title, 60) }}</a></h3>
                                    <div class="post-meta mt-2">
                                        <div class="d-flex align-items-center">
                                            @if($news->author->picture)
                                                <img src="{{ $news->author->picture }}" alt="{{ $news->author->name }}" class="img-fluid mr-2" style="width: 20px; height: 20px; border-radius: 50%;">
                                            @endif
                                            <a href="#" class="text-muted font-sm">{{ $news->author->name }}</a>
                                        </div>
                                        <span class="text-muted font-sm">{{ $news->publishedAt->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Custom Pagination -->
            <div class="pagination mt-5 pt-4">
                <ul class="list-inline">
                    @if ($allNews->onFirstPage())
                        <li class="list-inline-item disabled"><span class="disabled">&laquo;</span></li>
                    @else
                        <li class="list-inline-item"><a href="javascript:void(0)" wire:click="previousPage('page')" rel="prev">&laquo;</a></li>
                    @endif

                    @foreach ($allNews->getUrlRange(1, $allNews->lastPage()) as $page => $url)
                        @if ($page == $allNews->currentPage())
                            <li class="list-inline-item"><a href="javascript:void(0)" class="active">{{ $page }}</a></li>
                        @else
                            <li class="list-inline-item"><a href="javascript:void(0)" wire:click="gotoPage({{ $page }}, 'page')">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    @if ($allNews->hasMorePages())
                        <li class="list-inline-item"><a href="javascript:void(0)" wire:click="nextPage('page')" class="prev-posts" rel="next"><i class="ti-arrow-right"></i></a></li>
                    @else
                        <li class="list-inline-item disabled"><span class="disabled"><i class="ti-arrow-right"></i></span></li>
                    @endif
                </ul>
            </div>
        </div>
    </section>
</div>
