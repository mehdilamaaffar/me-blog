<main class="col-md-4">
    <div class="widget widget-category">
        <h3 class="widget-title">Category</h3>
        <ul>
            @foreach ($categories as $category)
            <li><a href="{{ route('category.posts', $category->id) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>

</main>

