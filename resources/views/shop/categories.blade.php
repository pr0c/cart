<div class="shop-menu">
    @if($categories != null)
        <div class="categories">
            @foreach($categories as $category)
                @if($category->parent == null)
                    <div class="category">
                        <div class="main-category">
                            <i class="toggle ri-arrow-drop-right-line"></i>
                            <span id="{{ $category->id }}" class="category-title {{ $category_id == $category->id ? 'active' : '' }}">
                                <a href="{{ URL::route('products', $category->id) }}">{{ $category->title }}</a>
                            </span>
                        </div>
                        @if($category->child != null && $category->child->count() > 0)
                            <div class="child-categories" {{ $category_id != $category->id && !$category->isChildren($category_id) ? 'hidden' : ''}}>
                                @foreach($category->child as $children)
                                    <span id="{{ $category->id }}" class="category-title {{ $category_id == $children->id ? 'active' : '' }}">
                                        <a href="{{ URL::route('products', $children->id) }}">{{ $children->title }}</a>
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
