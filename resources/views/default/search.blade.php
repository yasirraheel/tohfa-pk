@extends('layouts.app')

@section('title'){{ __('misc.search_results') ?? 'Search Results' }}@endsection

@section('content')
<section class="section section-sm">

<div class="container">
	<div class="row">

    <div class="col-lg-12 py-5">
  		<h1 class="mb-0 text-break">
  			{{ trans('misc.result_of') ?? 'Search results for' }} "{{ $query }}"
  		</h1>
  		<p class="lead text-muted mt-0">{{ $results->count() }} {{ __('misc.results_found') ?? 'results found' }}</p>
  	  </div>

		<div class="col-md-12">
			@if ($results->count() > 0)

				<div class="row">
					@foreach($results as $result)
						<div class="col-md-4 mb-4">
							<div class="card h-100">
								<div class="card-body">
									<h5 class="card-title">{{ $result->title ?? 'Result' }}</h5>
									<p class="card-text">{{ $result->description ?? '' }}</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>

	  @else
	    		<div class="text-center py-5">
					<i class="bi bi-search display-1 text-muted"></i>
	    			<h3 class="mt-3 fw-light">
	    				{{ trans('misc.no_results_found') ?? 'No results found' }}
	    			</h3>
					<p class="text-muted">{{ __('misc.try_different_keywords') ?? 'Try using different keywords' }}</p>
				</div>
	    	@endif

		</div><!-- col-md-12 -->
	</div><!-- row -->
</div><!-- container -->
</section>
@endsection
