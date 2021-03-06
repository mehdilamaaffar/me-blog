@extends('layouts.admin')

@section('content')

@include('partials.errors')

@include('partials.status')

<a href="/admin/posts" class="go-back"><span class="ion-arrow-left-c"></span> Go back</a>

<form class="form-horizontal" method="POST" action="{{ route('posts.store') }}">
    {{ csrf_field() }}

    <fieldset>

    <!-- Form Name -->
    <legend class="pb-1">Add new post</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-2 control-label" for="title">title</label>
        <div class="col-md-9">
            <input id="title" name="title" value="{{ old('title') }}" type="text" onkeydown="titleSlug(this)" placeholder="title" class="form-control" required>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-2 control-label" for="category">category</label>
        <div class="col-md-9">
            <select name="category_id" class="form-control" id="categorySelect">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>

            <div>
                <a id="addNewCategory" href="#addNewCategory">add new category</a>
                <a id="returnCategoriesList" href="#returnCategoriesList">Return previous list</a>

                <input id="categoryNameInput" name="category_name" value="{{ old('slug') }}" type="text" placeholder="category name" class="form-control">
            </div>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-2 control-label" for="title slug">title slug</label>
        <div class="col-md-9">
            <input id="titleSlugId" name="slug" value="{{ old('slug') }}" type="text" placeholder="" class="form-control">
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-2 control-label" for="content">content</label>
        <div class="col-md-9">
            <textarea class="form-control" name="content" placeholder="Content" rows="10" required>{{ old('content') }}</textarea>
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-2 control-label" for="description">description</label>
        <div class="col-md-9">
            <textarea class="form-control" rows="4" name="meta_description" placeholder="description">{{ old('meta_description') }}</textarea>
        </div>
    </div>

    <!-- Multiple Radios -->
    <div class="form-group">
        <label class="col-md-2 control-label" for="radios">Save as draft</label>
        <div class="col-md-4">
            <div class="radio">
                <label for="radios-0">
                <input type="radio" name="is_draft" value="0" checked="checked">no</label>
            </div>
            <div class="radio">
                <label for="radios-1">
                <input type="radio" name="is_draft" value="1">yes</label>
            </div>
        </div>
    </div>

    <!-- Button (Double) -->
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button class="btn btn-success">Post</button>
        </div>
    </div>

    </fieldset>
</form>
@endsection

@push('scripts')
<script>
    function titleSlug(title) {
        var titleSlugId = document.getElementById('titleSlugId');

        var title = title.value.trim();

        var formatedtitleSlug = title.replace(/ /g, '-');

        titleSlugId.placeholder = formatedtitleSlug;

        titleSlugId.value = formatedtitleSlug;
    }
</script>

<script>
    var categorySelect = document.getElementById('categorySelect');
    var categoryNameInput = document.getElementById('categoryNameInput');
    categoryNameInput.style.display = 'none';

    var addNewCategory = document.getElementById('addNewCategory');
    var returnCategoriesList = document.getElementById('returnCategoriesList');
    returnCategoriesList.style.display = 'none';

    lastSelectedCategoryId =  document.getElementById('categorySelect').options[categorySelect.selectedIndex].value;

    addNewCategory.addEventListener('click', function(e) {
        e.preventDefault();

        categorySelect.style.display = 'none';
        categorySelect.options[categorySelect.selectedIndex].value = null;

        addNewCategory.style.display = 'none';
        returnCategoriesList.style.display = 'inline';

        categoryNameInput.style.display = 'inline';
    });

    returnCategoriesList.addEventListener('click', function(e) {
        e.preventDefault();

        addNewCategory.style.display = 'inline';
        categoryNameInput.style.display = 'none';

        categorySelect.style.display = 'inline';
        returnCategoriesList.style.display = 'none';
    });
</script>
@endpush
