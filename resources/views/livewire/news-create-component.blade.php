<div>
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <h2 class="lg-title">Create a News</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="single-block-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="mb-5 text-center">
                        <button class="btn btn-info" wire:click="generateAuthor" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="generateAuthor">Generate Random Author</span>
                            <span wire:loading wire:target="generateAuthor">Generating...</span>
                        </button>
                    </div>
                    @if ($view_author)
                    <div class="sidebar sidebar-right">
                        <div class="sidebar-wrap mt-5 mt-lg-0">
                            <div class="sidebar-widget about mb-5 text-center p-3">
                                <div class="about-author">
                                    @if($author_picture)
                                        <img src="{{ $author_picture }}" alt="Author photo" class="img-fluid">
                                    @else
                                        <div class="bg-light rounded p-5 mt-2">
                                            <i class="ti-user" style="font-size: 5rem;"></i>
                                        </div>
                                    @endif
                                </div>
                                <h4 class="mb-0 mt-4">{{$author_name.' - '.$author_gender}}</h4>
                                <p>{{$author_email.' - '.$author_cell}}</p>
                                <p>{{$author_location.' - '.$author_nat}}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="mb-5" style="text-align: end;">
                        <button class="btn btn-info" wire:click="generateNews" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="generateNews">Generate Random News</span>
                            <span wire:loading wire:target="generateNews">Generating...</span>
                        </button>
                    </div>
                    @if ($view_news)
                    <div class="row">
                        <div class="col-md-12">
                            <article class="post">
                                <div class="post-header mb-5 text-center">
                                    <div class="meta-cat">
                                        <a class="post-category font-extra text-color text-uppercase font-sm letter-spacing-1"
                                            href="{{$news_url}}" target="_blank">view news</a>
                                    </div>
                                    <h2 class="post-title mt-2">
                                        {{$news_title}}
                                    </h2>

                                    <div class="post-meta">
                                        <span class="text-uppercase font-sm letter-spacing-1 mr-3">by {{$news_name}}</span>
                                        <span class="text-uppercase font-sm letter-spacing-1">{{$news_publishedAt}}</span>
                                    </div>
                                </div>

                                <div class="post-img mb-4 text-center">
                                    @if($news_urlToImage)
                                        <a href="{{$news_url}}"><img class="img-fluid" src="{{ $news_urlToImage }}" alt=""></a>
                                    @else
                                        <div class="bg-light rounded p-5 mt-2 text-center">
                                            <i class="ti-user" style="font-size: 5rem;"></i>
                                        </div>
                                    @endif
                                </div>

                                <div class="post-body">
                                    <div class="entry-content">
                                        <p> {{$news_description}}</p>
                                        <h2 class="mt-4 mb-3">{{$news_title}}</h2>
                                        <p> {{$news_content}}</p>
                                </div>
                            </article>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    
        @if($successMessage)
            <div class="alert alert-success">
                {{ $successMessage }}
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                <h4>Author Data</h4>
                <button class="btn btn-info" wire:click="generateAuthor" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="generateAuthor">Generate Random Author</span>
                    <span wire:loading wire:target="generateAuthor">Generating...</span>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="author_name">Name</label>
                                <input type="text" class="form-control @error('author_name') is-invalid @enderror" id="author_name" wire:model.live="author_name">
                                @error('author_name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="author_gender">Gender</label>
                                <select class="form-control @error('author_gender') is-invalid @enderror" id="author_gender" wire:model.live="author_gender">
                                    <option value="">Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('author_gender') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 form-group">
                                <label for="author_email">Email</label>
                                <input type="email" class="form-control @error('author_email') is-invalid @enderror" id="author_email" wire:model.live="author_email">
                                @error('author_email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="author_cell">Phone</label>
                                <input type="text" class="form-control @error('author_cell') is-invalid @enderror" id="author_cell" wire:model.live="author_cell">
                                @error('author_cell') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 form-group">
                                <label for="author_location">Location</label>
                                <input type="text" class="form-control @error('author_location') is-invalid @enderror" id="author_location" wire:model.live="author_location">
                                @error('author_location') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="author_nat">Nationality</label>
                                <input type="text" class="form-control @error('author_nat') is-invalid @enderror" id="author_nat" wire:model.live="author_nat">
                                @error('author_nat') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        @if($author_picture)
                            <img src="{{ $author_picture }}" alt="Author photo" class="img-fluid rounded mt-2" style="max-height: 200px;">
                        @else
                            <div class="bg-light rounded p-5 mt-2">
                                <i class="ti-user" style="font-size: 5rem;"></i>
                            </div>
                        @endif
                        <input type="hidden" wire:model.live="author_picture">
                        @error('author_picture') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                <h4>News Data</h4>
                <button class="btn btn-info" wire:click="generateNews" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="generateNews">Generate Random News</span>
                    <span wire:loading wire:target="generateNews">Generating...</span>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="news_name">Source</label>
                        <input type="text" class="form-control @error('news_name') is-invalid @enderror" id="news_name" wire:model.live="news_name">
                        @error('news_name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="news_publishedAt">Publication Date</label>
                        <input type="datetime-local" class="form-control @error('news_publishedAt') is-invalid @enderror" id="news_publishedAt" wire:model.live="news_publishedAt">
                        @error('news_publishedAt') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 form-group">
                        <label for="news_title">Title</label>
                        <input type="text" class="form-control @error('news_title') is-invalid @enderror" id="news_title" wire:model.live="news_title">
                        @error('news_title') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 form-group">
                        <label for="news_description">Description</label>
                        <textarea class="form-control @error('news_description') is-invalid @enderror" id="news_description" rows="3" wire:model.live="news_description"></textarea>
                        @error('news_description') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 form-group">
                        <label for="news_url">URL</label>
                        <input type="url" class="form-control @error('news_url') is-invalid @enderror" id="news_url" wire:model.live="news_url">
                        @error('news_url') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="news_urlToImage">Image URL</label>
                        <input type="url" class="form-control @error('news_urlToImage') is-invalid @enderror" id="news_urlToImage" wire:model.live="news_urlToImage">
                        @error('news_urlToImage') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 form-group">
                        <label for="news_content">Content</label>
                        <textarea class="form-control @error('news_content') is-invalid @enderror" id="news_content" rows="6" wire:model.live="news_content"></textarea>
                        @error('news_content') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>
                @if($news_urlToImage)
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <img src="{{ $news_urlToImage }}" alt="Preview" class="img-fluid rounded mt-2" style="max-height: 300px;">
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-end mb-5">
            <button class="btn btn-primary btn-lg" wire:click="saveNews" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="saveNews">Save News</span>
                <span wire:loading wire:target="saveNews">Saving...</span>
            </button>
        </div>
    </div>
</div>
