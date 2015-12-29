@include('layouts.head')
@include('layouts.navigation')

<div id="main">
	@include('layouts.header')
	<div class="wbad__content">
		@yield('content')
	</div>	
</div>

@include('layouts.footer')