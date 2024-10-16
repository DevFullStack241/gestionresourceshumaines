@extends('backend.layouts.template')
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Calendar</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Calendar
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row pb-10">
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">75</div>
                        <div class="font-14 text-secondary weight-500">
                            Appointment
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);">
                            <i class="icon-copy dw dw-calendar1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">124,551</div>
                        <div class="font-14 text-secondary weight-500">
                            Total Patient
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#ff5b5b" style="color: rgb(255, 91, 91);">
                            <span class="icon-copy ti-heart"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">400+</div>
                        <div class="font-14 text-secondary weight-500">
                            Total Doctor
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon">
                            <i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">$50,000</div>
                        <div class="font-14 text-secondary weight-500">Earning</div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#09cc06" style="color: rgb(9, 204, 6);">
                            <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pd-20 card-box mb-30">
        <div class="calendar-wrap">
            <div id="calendar" class="fc fc-bootstrap4 fc-ltr">
                <div class="fc-toolbar fc-header-toolbar">
                    <div class="fc-clear"></div>
                </div>
            </div>
        </div>
        <!-- calendar modal -->
        <div id="modal-view-event" class="modal modal-top fade calendar-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 class="h4">
                            <span class="event-icon weight-400 mr-3"></span><span class="event-title"></span>
                        </h4>
                        <div class="event-body"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-view-event-add" class="modal modal-top fade calendar-modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="add-event">
                        <div class="modal-body">
                            <h4 class="text-blue h4 mb-10">Add Event Detail</h4>
                            <div class="form-group">
                                <label>Event name</label>
                                <input type="text" class="form-control" name="ename">
                            </div>
                            <div class="form-group">
                                <label>Event Date</label>
                                <input type="text" class="datetimepicker form-control" name="edate">
                            </div>
                            <div class="form-group">
                                <label>Event Description</label>
                                <textarea class="form-control" name="edesc"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Event Color</label>
                                <select class="form-control" name="ecolor">
                                    <option value="fc-bg-default">fc-bg-default</option>
                                    <option value="fc-bg-blue">fc-bg-blue</option>
                                    <option value="fc-bg-lightgreen">
                                        fc-bg-lightgreen
                                    </option>
                                    <option value="fc-bg-pinkred">fc-bg-pinkred</option>
                                    <option value="fc-bg-deepskyblue">
                                        fc-bg-deepskyblue
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Event Icon</label>
                                <select class="form-control" name="eicon">
                                    <option value="circle">circle</option>
                                    <option value="cog">cog</option>
                                    <option value="group">group</option>
                                    <option value="suitcase">suitcase</option>
                                    <option value="calendar">calendar</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
