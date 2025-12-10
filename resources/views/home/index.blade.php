<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> f0b4f5c (.)
<?php

declare(strict_types=1);

?>
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
@extends('geo::layouts.app')
@section('content')
	{{--
	<script src="{{asset('data/farmshopGeoJson.js')}}"></script>
	--}}
	<div class="progress" id="map_progress" style="height: 50px;">
  		<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
  			<span id="current-progress"></span>
  		</div>
	</div>

    <div id="map" class="sidebar-map"></div>
@endsection
