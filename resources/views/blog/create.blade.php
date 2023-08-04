<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Blog
            </h2>
        </div>
    </x-slot>
    <div class="container card mt-5">
        <form class="row g-3 mt-2 mb-3" action="{{ route('add-blog-save') }}" method="POST">
            @csrf
            <div class="col-12">
                <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                    aria-label="First name">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <textarea id="description" name="description" cols="142" placeholder="Description"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" placeholder="Content" class="btn btn-success"
                    style="background-color:green"">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
