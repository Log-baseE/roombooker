@extends('layouts.dashboard.app')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{__('Dashboard')}}</a></li>
<li class="breadcrumb-item"><a href="{{ route('bookings.index') }}">{{__('Bookings')}}</a></li>
<li class="breadcrumb-item"><a href="{{ route('drafts.index') }}">{{__('Drafts')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $draft->id }}</li>
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
                            <span class="badge badge-pill badge-light text-danger mL-10">Incomplete</span>
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
                                        - <strong class="text-warning">(Are you sure you won't be needing any facilities?)</strong>
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
                            <h5 class="mB-0"><strong>Completion: xx%</strong></h5>
                        </div>
                        <div class="peer">
                            <button type="button" class="btn btn-primary mL-20" data-toggle="modal" data-target="#commitModal"><i class="ti-alert"></i> Sign form</button>
                        </div>
                    </div>
                    <div class="layer w-100 p-20">
                        <ul class="list-group">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
@endsection
