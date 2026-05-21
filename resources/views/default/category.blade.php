@extends('layouts.app')

@section('title'){{ Lang::has('categories.' . $category->slug) ? __('categories.' . $category->slug).' -' : $category->name.' -' }}@endsection

@if ($category->description != '')
@section('description_custom'){{ Helper::removeLineBreak($category->description) . ' - ' }}@endsection
@endif

@if ($category->keywords != '')
@section('keywords_custom'){{ $category->keywords . ',' }}@endsection
@endif

@section('content')
<section class="section section-sm">

  <div class="container">

    <div class="col-lg-12 py-5">
      <h1 class="mb-0">
        {{ Lang::has('categories.' . $category->slug) ? __('categories.' . $category->slug) : $category->name }}
      </h1>
      @if ($category->subcategories ?? false)
        <div class="my-3">
          @foreach ($category->subcategories as $subcategory)
          <a href="{{ url('category', [$category->slug, $subcategory->slug]) }}" class="mb-2 btn btn-sm rounded-pill btn-outline-custom btn-tags px-4 me-1">
            {{ Lang::has('subcategories.' . $subcategory->slug) ? __('subcategories.' . $subcategory->slug) : $subcategory->name }}
          </a>
          @endforeach
        </div>
      @endif
      
      @if ($category->description)
        <p class="lead text-muted mt-3">{{ $category->description }}</p>
      @endif
    </div>

    <!-- Col MD -->
    <div class="col-md-12">

      <div class="row">

        @if (isset($items) && $items->count() > 0)
        <div class="dataResult">
          {{-- Add your content items here --}}
          @foreach($items as $item)
            <div class="col-md-4 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->title ?? 'Item' }}</h5>
                  <p class="card-text">{{ $item->description ?? '' }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        @else
        <div class="text-center py-5">
          <i class="bi bi-folder2-open display-1 text-muted"></i>
          <h3 class="mt-3 fw-light">
            {{ __('misc.no_content_in_category') ?? 'No content available in this category yet' }}
          </h3>
          <p class="text-muted">{{ __('misc.check_back_later') ?? 'Check back later for updates' }}</p>
        </div>
        @endif

      </div><!-- row -->
    </div><!-- container wrap-ui -->
</section>
@endsection