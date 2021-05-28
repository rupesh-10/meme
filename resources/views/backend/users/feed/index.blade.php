@extends('frontend.layouts.default')
@section('content')
	<section>
		<div class="gap gray-bg" id="app">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
							</div><!-- sidebar -->
                            <meme-component></meme-component>
							<div class="col-lg-3">

							</div><!-- sidebar -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection
@section('scripts')
<script src="{{ asset('backend/js/user/meme/index.js') }}"></script>
@endsection



