@extends('layouts.dashboard.app')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{__('Dashboard')}}</a></li>
<li class="breadcrumb-item"><a href="{{ route('bookings.index') }}">{{__('Bookings')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">({{__('Draft')}}) {{ $draft->id }}</li>
@endsection

@section('content')
<div id='mainContent'>
    <div class="row gap-20 pos-r">
        <div class="col-md-6">
            <div class="bd bgc-white h-100">
                <div class="layers">
                    <div class="layer peers bgc-light-blue-500 c-white w-100 p-20">
                        <div class="peer">
                            <h5 class="mB-0">{{__('Booking Draft')}}: {{ $draft->id }}</h5>
                        </div>
                        <div class="peer">
                            @if ($draft->is_complete)
                                <span class="badge badge-pill badge-light text-success mL-10">Complete</span>
                            @else
                                <span class="badge badge-pill badge-light text-danger mL-10">Incomplete</span>
                            @endif
                        </div>
                    </div>
                    <div class="layer w-100 pY-10">
                        <table class="table-borderless">
                            <tbody>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('Building')}}</th>
                                    <td class="pX-20 pY-10 va-t" >
                                        @isset($draft->room)
                                            {{$draft->room->building->name}}
                                        @else
                                            <strong class="text-danger">no room picked</strong>
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('Room')}}</th>
                                    <td class="pX-20 pY-10 va-t" >
                                        @isset($draft->room)
                                            {{$draft->room->name}}
                                        @else
                                            <strong class="text-danger">no room picked</strong>
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('Start use')}}</th>
                                    <td class="pX-20 pY-10 va-t" >
                                        @isset($draft->start_datetime)
                                            {{$draft->start_datetime->format('d/m/Y H:i')}}
                                        @else
                                            <strong class="text-danger">not set</strong>
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('End use')}}</th>
                                    <td class="pX-20 pY-10 va-t" >
                                        @isset($draft->end_datetime)
                                            {{$draft->end_datetime->format('d/m/Y H:i')}}
                                        @else
                                            <strong class="text-danger">not set</strong>
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('Purpose')}}</th>
                                    <td class="pX-20 pY-10 va-t" >
                                        @isset($draft->purpose)
                                            {{$draft->purpose}}
                                        @else
                                            <strong class="text-danger">not set</strong>
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('Facilities required')}}</th>
                                    <td class="pX-20 pY-10 va-t">
                                        @forelse ( $draft->facilities as $facility )
                                            {{ $loop->first ? '' : ', '}}
                                            {{ ucwords(__($facility->name)) }}
                                        @empty
                                        -
                                        @endforelse
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pX-20 pY-10 va-t" scope="row">{{__('Other comments')}}</th>
                                    <td class="pX-20 pY-10 va-t" >{{ isset($draft->comments) ? $draft->comments : '-'}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="layer w-100 pB-20">
                        <a name="edit" id="edit" class="btn btn-link" href="#" role="button" style="margin-left: 8px"><i class="ti-pencil"></i> Edit</a>|<button type="button" class="btn btn-link c-grey-500">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 order-md-last order-first">
            <div class="bd bgc-white h-100">
                <div class="layers">
                    <div class="layer bdB peers w-100 p-20">
                        <div class="peer peer-greed">
                            <h5 class="mB-0"><strong>Completion: {{ $draft->completion['percent'] }}%</strong></h5>
                        </div>
                        <div class="peer">
                            @if ($draft->is_complete)
                                <button type="button" class="btn btn-primary mL-20" data-toggle="modal" data-target="#commitModal"><i class="ti-alert"></i> Sign form</button>
                            @else
                                <button type="button" class="btn btn-primary mL-20" disabled title="Complete the followng"><i class="ti-alert"></i> Sign form</button>
                            @endif
                        </div>
                    </div>
                    <div class="layer w-100 p-20">
                        <ul class="list-group">
                            @foreach ($draft->completion['messages'] as $message)
                                <li class="list-group-item">
                                    @switch($message['status'])
                                        @case('complete')
                                            <i class="fas fa-check-circle mR-10 text-success"></i>
                                            @break
                                        @case('incomplete')
                                            <i class="fas fa-times-circle mR-10 text-danger"></i>
                                            @break
                                        @case('warning')
                                            <i class="fas fa-exclamation-circle mR-10 c-amber-700"></i>
                                            @break
                                        @default

                                    @endswitch
                                    {{ $message['message'] }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($draft->is_complete)
<div class="modal fade" id="commitModal" tabindex="-1" role="dialog" aria-labelledby="commitModalTitle" aria-hidden="true">
    <form action="{{route('drafts.commit', ['id' => $draft->trimmed_id])}}" method="post">
        @method('PUT')
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commitModalTitle">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="layers">
                    <div class="layer w-100">
                        Once signed, all data are considered <strong class="text-danger">final</strong> and <strong class="text-danger">cannot be changed</strong>.
                    </div>
                    <div class="layer w-100 pT-20">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="agree" id="agree" required>
                            <label class="custom-control-label" for="agree">By clicking submit, I acknowledge that all submitted data are <strong class="text-danger">valid</strong> and will <strong class="text-danger">not</strong> be changed.</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Sign</button>
            </div>
            </div>
        </div>
    </form>
</div>
@endif
@endsection
