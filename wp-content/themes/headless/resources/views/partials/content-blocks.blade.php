@isset($content_blocks)
	@foreach ($content_blocks as $c)
		@isset($c['acf_fc_layout'])
			@include('components.' . $c['acf_fc_layout'], $c)
		@endisset
	@endforeach
@endisset