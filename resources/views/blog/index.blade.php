<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Blogs
            </h2>
            <a href="{{ route('add-blog') }}">Add Blog</a>
        </div>
    </x-slot>
    <section class="blog-listing gray-bg">
        <div class="container">
            <div class="row align-items-start">
                @forelse ($blogs as $blog)
                <div class="col-sm-4">
                    <div class="blog-grid">
                        <div class="blog-info">
                            <h5><a href="#">{{ $blog->title }}</a></h5>
                            <p class="fw-bold">{{ Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</p>
                            <p class="min-tx-show">{!! $blog->descr !!}</p>
                            <div class="btn-bar">
                                <a href="{{ route('blog-detail',$blog->id) }}" class="px-btn-arrow">
                                    <span>Read More</span>
                                    <i class="arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <h2>No Blogs Available</h2>
                @endforelse
            </div>
        </div>
    </section>
</x-app-layout>
