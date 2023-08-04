<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Blog Detail
            </h2>
        </div>
    </x-slot>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $blog->title }}</h2>
                <p class="card-text">Published on: {{ Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</p>
                <hr>
                <p class="card-text mt-3">
                    {!! $blog->descr !!}
                </p>
            </div>
        </div>
        <div class="be-comment-block">
            <h1 class="comments-title">Comments ({{ count($blog->comments) }})</h1>
            @forelse ($blog->comments as $comment)
                <div class="be-comment">
                    <div class="be-img-comment">
                        <a href="javascript:void(0);">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""
                                class="be-ava-comment">
                        </a>
                    </div>

                    <div class="be-comment-content">
                        <span class="be-comment-name">
                            <a href="javascript:void(0);">{{ $comment->user->name }}</a>
                        </span>
                        <span class="be-comment-time">
                            <i class="fa fa-clock-o"></i>
                            {{ Carbon\Carbon::parse($comment->user->created_at)->format('F d, Y h:ma') }}
                        </span>

                        <p class="be-comment-text">
                            {!! $comment->comment !!}
                        </p>
                    </div>
                </div>
            @empty
            @endforelse

            <form class="form-block" method="POST" action="{{ route('blog-post-comment') }}">
                @csrf
                <input type="hidden" name="blog_id" id="blog_id" value="{{ request()->id }}">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <textarea name="comment" id="comment" class="form-input" required="" placeholder="Your text"></textarea>
                            @error('comment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary pull-right">submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
