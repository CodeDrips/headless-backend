@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
  	@if(get_the_post_thumbnail_url())

	  <section class="featured-post">

	    <div class="featured-post__gradient"></div>

	    <div class="grid-container">

	        <div class="grid-x grid-margin-x">

	          <div class="cell small-12 medium-12">
	            
	            <img class="featured-post__image" src="{{ get_the_post_thumbnail_url() }}" alt="{{ get_bloginfo('name', 'display') }} - {{ get_the_title() }}">

	          </div>

	        </div>

	    </div>

	  </section>

	@endif
    @include('partials.content-blocks')
  @endwhile
@endsection
