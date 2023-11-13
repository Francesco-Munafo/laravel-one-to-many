@extends('layouts.admin')

@section('content')
    <div class="container py-5">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <h1>Editing "{{ $project->title }}"</h1>

            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    aria-describedby="helpTitle" placeholder="Insert a project title"
                    value="{{ old('title', $project->title) }}">
            </div>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="3">{{ old('description', $project->description) }}</textarea>
            </div>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="type_id" class="form-label @error('type_id') is-invalid @enderror">Choose a category</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option selected disabled>Select one</option>
                    <option>No type</option>

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>{{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('type_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror


            <div class="mb-3">
                <label for="image" class="form-label">Select a file</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" placeholder="Select a file" value="{{ $project->image }}">
            </div>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="gitLink" class="form-label">Git Hub Project</label>
                <input type="text" class="form-control @error('git_link') is-invalid @enderror" name="git_link"
                    id="git_link" aria-describedby="helpGitlink" placeholder="Insert a git link for the project"
                    value="{{ old('git_link', $project->git_link) }}">
            </div>
            @error('git_link')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="external_link" class="form-label">External link</label>
                <input type="text" class="form-control @error('external_link') is-invalid @enderror" name="external_link"
                    id="external_link" aria-describedby="helpExternalLink" placeholder="Insert an external link "
                    value="{{ old('external_link', $project->external_link) }}">
            </div>
            @error('external_link')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="publication_date" class="form-label">Publication Date</label>
                <input type="date" class="form-control @error('publication_date') is-invalid @enderror"
                    name="publication_date" id="publication_date" aria-describedby="helpDate"
                    placeholder="Insert the project publication date"
                    value="{{ old('publication_date', $project->publication_date) }}">
            </div>
            @error('publication_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror



            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
