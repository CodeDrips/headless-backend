<section class="posts-feed post-feed--reviews">

	<div class="grid-container">

		<div class="grid-x grid-margin-x">

	    	<div class="cell small-12 medium-12">

	    		<h2 class="posts-feed__section-title">Read more like this</h2>

	    	</div>

	    </div>

    	<div class="grid-x grid-margin-x reviews-slider">

    		@foreach($single_post['related'] as $p)

		    	<div class="cell small-12 medium-4">

		    		<a href="{{ $p['permalink'] }}">
			    		<img class="posts-feed__image" src="{{ $p['image'] }}" alt="{{ get_bloginfo('name', 'display') }} - {{ $p['title'] }}">
			    	</a>

		    		<h2 class="posts-feed__title"><a href="{{ $p['permalink'] }}">{{ $p['title'] }}</a></h2>

		    		<p class="posts-feed__excerpt">{!! $p['excerpt'] !!}</p>

		    		<a class="btn btn--border" href="{{ $c['permalink'] }}">Continue Reading</a>

		    	</div>

	    	@endforeach

	    </div>

	</div>

</section>