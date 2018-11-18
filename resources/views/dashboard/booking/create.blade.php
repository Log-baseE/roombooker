@extends('layouts.dashboard.app')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('bookings.index') }}">Bookings</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ __('New') }}</li>
@endsection

@section('content')
<div id='mainContent'>
    <div class="row gap-20 pos-r">
        <div class="col-md-4">
            <div class="bd bgc-white h-100">
                <div class="layers">
                    <div class="layer w-100 pX-20 pT-20">
                        <h6 class="lh-1 font-weight-bold">{{__('MAKE A BOOKING')}}</h6>
                    </div>
                    <div class="layer w-100 p-20">
                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="building">Building <span class="c-red-500">*</span></label>
                                <select class="custom-select" name="building" id="building">
                                    <option selected>Select one</option>
                                    <option value="">A</option>
                                    <option value="">B</option>
                                    <option value="">C</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="room">Room <span class="c-red-500">*</span></label>
                                <select class="custom-select" name="room" id="room" disabled>
                                    <option selected>Select a building first</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="startDateTime">Start datetime <span class="c-red-500">*</span></label>
                                    <input class="form-control datetimepicker-input" type="datetime" name="startDateTime" id="startDateTime" class="form-control" placeholder="Select a date & time" data-toggle="datetimepicker" data-target="#startDateTime">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="endDateTime">End datetime <span class="c-red-500">*</span></label>
                                    <input class="form-control datetimepicker-input" type="datetime" name="endDateTime" id="endDateTime" class="form-control" placeholder="Select a date & time"  data-toggle="datetimepicker" data-target="#endDateTime">
                                </div>
                            </div>
                            <div class="form-row">
                                <div id="facilities" class="form-group col-12">
                                    <label class="d-b" for="facilities">Facilities required</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="ac" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Air conditioning</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="ac" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Air conditioning</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="ac" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Air conditioning</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="purpose">Purpose <span class="c-red-500">*</span></label>
                                <input type="text" class="form-control" name="purpose" id="purpose" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="comment">Other comments</label>
                                <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                            </div>
                            <button class="btn btn-dark" type="submit">
                                <i class="ti-save fsz-xs mR-5"></i>
                                {{__('Save draft')}}
                            </button>
                            <button class="btn btn-link c-red-500" type="submit">
                                {{__('Cancel')}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div id='full-calendar'></div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
    <script>

    </script>
@endsection
