@extends('layouts.dashboard.app')

@section('content')
<div id='mainContent'>
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-6">
            <div class="bd bgc-white">
                <div class="layers">
                    <div class="layer w-100 pX-20 pT-20">
                        <h6 class="lh-1 font-weight-bold">BUILDINGS</h6>
                    </div>
                    <div class="layer w-100 p-20">
                        @forelse ($buildings as $building)
                            <a class="btn btn-light border-secondary mt-2" href="#" role="button">{{ $building->name }}</a>
                        @empty
                            <p>No buildings</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="masonry-item col-md-6">
            <div class="bd bgc-white">
                <div class="layers">
                    <div class="layer w-100 pX-20 pT-20">
                        <h6 class="lh-1 font-weight-bold">ROOMS</h6>
                    </div>
                    <div class="layer w-100 p-20">
                        @forelse ($buildings as $building)
                            <a class="btn btn-light border-secondary mt-2" href="#" role="button">{{ $building->name }}</a>
                        @empty
                            <p>{{ !isset($b) ? __('Click on a building to view its available rooms') : __('No rooms in this building') }}</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
