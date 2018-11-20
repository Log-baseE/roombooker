@extends('layouts.dashboard.app')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{__('Dashboard')}}</a></li>
<li class="breadcrumb-item"><a href="{{ route('bookings.index') }}">{{__('Bookings')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $booking->id }}</li>
@endsection

@section('content')
<div id='mainContent'>
    <div class="row gap-20 pos-r">
        <div class="col-md-6">
            <div class="bd bgc-white h-100">
                <div class="layers">
                    <div class="layer peers bdB w-100 p-20">
                        <div class="peer">
                            <h5 class="mB-0">{{__('Booking')}}: {{ $booking->id }}</h5>
                        </div>
                        <div class="peer">
                            <span class="badge badge-pill badge-light text-danger mL-10">Incomplete</span>
                        </div>
                    </div>
                    <div class="layer w-100 pY-10">
                        <table class="table-borderless">
                            <tbody>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('Building')}}</th>
                                    <td class="pX-20 pY-10 va-t" >
                                        {{$booking->details->room->building->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('Room')}}</th>
                                    <td class="pX-20 pY-10 va-t" >
                                        {{$booking->details->room->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('Start use')}}</th>
                                    <td class="pX-20 pY-10 va-t" >
                                        {{$booking->details->start_datetime->format('d/m/Y H:i')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('End use')}}</th>
                                    <td class="pX-20 pY-10 va-t" >
                                        {{$booking->details->end_datetime->format('d/m/Y H:i')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('Purpose')}}</th>
                                    <td class="pX-20 pY-10 va-t" >
                                        {{$booking->details->purpose}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('Facilities required')}}</th>
                                    <td class="pX-20 pY-10 va-t">
                                        @forelse ( $booking->details->facilities as $facility )
                                            {{ $loop->first ? '' : ', '}}
                                            {{ ucwords(__($facility->name)) }}
                                        @empty
                                        -
                                        @endforelse
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('Other comments')}}</th>
                                    <td class="pX-20 pY-10 va-t" >{{ isset($booking->details->comments) ? $booking->details->comments : '-'}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 order-md-last order-first">
            <div class="bd bgc-white h-100">
                <div class="layers">
                    <div class="layer bdB bg-secondary c-white peers w-100 p-20">
                        <div class="peer peer-greed">
                            <h5 class="mB-0"><strong>Almost there!</strong></h5>
                        </div>
                    </div>
                    <div class="layer w-100 p-20">
                        <h5>Request a signature from a head of faculty or department by giving them the generated access code below</h5>
                        <div class="peers gap-20 ai-c mB-10 mT-20">
                            <h5 class="peer m-0">Access code: </h5>
                            <h5 class="peer m-0 bd pX-10 pY-5 fw-700 ta-c h-100" style="box-sizing: content-box; min-width: 75px; min-height: 26px"></h5>
                        </div>
                        <button type="button" class="btn btn-primary">Generate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
