@extends('layouts.dashboard.app')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{__('Dashboard')}}</a></li>
<li class="breadcrumb-item"><a href="{{ route('bookings.index') }}">{{__('Bookings')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $booking->id }}</li>
@endsection

@section('content')
<input type="hidden" name="bid" value="{{ $booking->id }}">
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
                        <div id="code-container" class="peers gap-20 ai-c mB-10 mT-20">
                            <h5 class="peer m-0">Access code: </h5>
                            <h5 id="code" class="peer m-0 bd pX-10 pY-5 fw-700 ta-c h-100" style="box-sizing: content-box; min-width: 75px; min-height: 26px">
                            </h5>
                            <span class="peer"><i class="loading-cog fas fa-circle-notch d-n"></i></span>
                            <small class="w-100 pY-5">Click button to generate access code</small>
                        </div>
                        <button type="button" id="generate" class="btn btn-primary">Generate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
<script>
    var x;
    $('#generate').click(function() {
        $.ajax({
            method: 'post',
            url: '/api/accessCode',
            data: $.param({
                _token: $('meta[name=csrf-token]').attr('content'),
                bid: $('input[name=bid]').val(),
            }),
            beforeSend: function(xhr) {
                $('#generate').attr('disabled', 'disabled');
                $('#code-container small').remove();
                $('#code').text('');
                $('#code-container .loading-cog').removeClass('d-n').addClass('d-ib');
                clearInterval(x);
            },
            success: function(data) {
                console.log(data);
                $('#code').text(data.code);
                $('#code-container .loading-cog').removeClass('d-ib').addClass('d-n');
                var eventTime= data.expiry;
                var currentTime = Math.floor(Date.now() / 1000);
                var diffTime = eventTime - currentTime;
                var duration = moment.duration(diffTime*1000, 'milliseconds');
                var interval = 1000;
                $('#code-container').append(`<small class="w-100 pY-5">Code will expire in <span class="countdown"></span></small>`);
                x = setInterval(async function(){
                    duration = moment.duration(duration - interval, 'milliseconds');
                    console.log(moment.utc(duration.as('milliseconds')).format('HH:mm:ss'));
                    $('.countdown').text(moment.utc(duration.as('milliseconds')).format('HH:mm:ss'));
                    if(duration.seconds() < 0) {
                        $('#generate').attr('disabled', false);
                        clearInterval(x);
                        await $('#code-container small').remove();
                        $('#code-container').append(`<small class="w-100 pY-5 text-danger"><strong>Expired. Please generate another code</strong></small>`);
                    }
                }, interval);
            },
            error: function(xhr, message, error) {
                console.log(xhr, message, error);
                $('#generate').attr('disabled', false);
                $('#code-container .loading-cog').removeClass('d-ib').addClass('d-n');
                $('#code-container').append(`<small class="w-100 pY-5 text-danger"><strong>Failed to obtain access code. Please try again</strong></small>`);
            }
        });
    })
</script>
@endsection
