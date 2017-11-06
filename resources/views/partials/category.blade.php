<aside class="col-md-4">
    <div class="widget widget-category">
        <h3 class="widget-title">Category</h3>
        <ul>
            @foreach (App\Category::take(5)->get() as $category)
            <li>
                <a href="{{ '/category/' . $category->id . '/posts' }}">{{ $category->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</aside>
