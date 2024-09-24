@extends('backend.layouts.templateadmin')
@section('content')
<div class="title pb-20">
    <h2 class="h3 mb-0">Hospital Overview</h2>
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
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
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
            <div class="pd-20 card-box mb-30">
                <div class="calendar-wrap">
                    <div id="calendar" class="fc fc-bootstrap4 fc-ltr"><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><h2>September 2024</h2></div><div class="fc-right"><button type="button" class="fc-today-button btn btn-primary disabled" disabled="">today</button><div class="btn-group"><button type="button" class="fc-prev-button btn btn-primary" aria-label="prev"><span class="fa fa-chevron-left"></span></button><button type="button" class="fc-next-button btn btn-primary" aria-label="next"><span class="fa fa-chevron-right"></span></button></div></div><div class="fc-center"><div class="btn-group"><button type="button" class="fc-month-button btn btn-primary active">month</button><button type="button" class="fc-agendaWeek-button btn btn-primary ">week</button><button type="button" class="fc-agendaDay-button btn btn-primary ">day</button></div></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view" style=""><table class="table-bordered"><thead class="fc-head"><tr><td class="fc-head-container "><div class="fc-row table-bordered"><table class="table-bordered"><thead><tr><th class="fc-day-header  fc-sun"><span>Sun</span></th><th class="fc-day-header  fc-mon"><span>Mon</span></th><th class="fc-day-header  fc-tue"><span>Tue</span></th><th class="fc-day-header  fc-wed"><span>Wed</span></th><th class="fc-day-header  fc-thu"><span>Thu</span></th><th class="fc-day-header  fc-fri"><span>Fri</span></th><th class="fc-day-header  fc-sat"><span>Sat</span></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class=""><div class="fc-scroller fc-day-grid-container" style="overflow: hidden; height: 790.8px;"><div class="fc-day-grid fc-unselectable"><div class="fc-row fc-week table-bordered" style="height: 131px;"><div class="fc-bg"><table class="table-bordered"><tbody><tr><td class="fc-day  fc-sun fc-past" data-date="2024-09-01"></td><td class="fc-day  fc-mon fc-past" data-date="2024-09-02"></td><td class="fc-day  fc-tue fc-past" data-date="2024-09-03"></td><td class="fc-day  fc-wed fc-past" data-date="2024-09-04"></td><td class="fc-day  fc-thu fc-past" data-date="2024-09-05"></td><td class="fc-day  fc-fri fc-past" data-date="2024-09-06"></td><td class="fc-day  fc-sat fc-past" data-date="2024-09-07"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2024-09-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-mon fc-past" data-date="2024-09-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-tue fc-past" data-date="2024-09-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-wed fc-past" data-date="2024-09-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-thu fc-past" data-date="2024-09-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-fri fc-past" data-date="2024-09-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-sat fc-past" data-date="2024-09-07"><span class="fc-day-number">7</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week table-bordered" style="height: 131px;"><div class="fc-bg"><table class="table-bordered"><tbody><tr><td class="fc-day  fc-sun fc-past" data-date="2024-09-08"></td><td class="fc-day  fc-mon fc-past" data-date="2024-09-09"></td><td class="fc-day  fc-tue fc-past" data-date="2024-09-10"></td><td class="fc-day  fc-wed fc-past" data-date="2024-09-11"></td><td class="fc-day  fc-thu fc-past" data-date="2024-09-12"></td><td class="fc-day  fc-fri fc-past" data-date="2024-09-13"></td><td class="fc-day  fc-sat fc-past" data-date="2024-09-14"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2024-09-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-mon fc-past" data-date="2024-09-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-tue fc-past" data-date="2024-09-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-wed fc-past" data-date="2024-09-11"><span class="fc-day-number">11</span></td><td class="fc-day-top fc-thu fc-past" data-date="2024-09-12"><span class="fc-day-number">12</span></td><td class="fc-day-top fc-fri fc-past" data-date="2024-09-13"><span class="fc-day-number">13</span></td><td class="fc-day-top fc-sat fc-past" data-date="2024-09-14"><span class="fc-day-number">14</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week table-bordered" style="height: 131px;"><div class="fc-bg"><table class="table-bordered"><tbody><tr><td class="fc-day  fc-sun fc-past" data-date="2024-09-15"></td><td class="fc-day  fc-mon fc-past" data-date="2024-09-16"></td><td class="fc-day  fc-tue fc-past" data-date="2024-09-17"></td><td class="fc-day  fc-wed fc-past" data-date="2024-09-18"></td><td class="fc-day  fc-thu fc-past" data-date="2024-09-19"></td><td class="fc-day  fc-fri fc-past" data-date="2024-09-20"></td><td class="fc-day  fc-sat fc-past" data-date="2024-09-21"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2024-09-15"><span class="fc-day-number">15</span></td><td class="fc-day-top fc-mon fc-past" data-date="2024-09-16"><span class="fc-day-number">16</span></td><td class="fc-day-top fc-tue fc-past" data-date="2024-09-17"><span class="fc-day-number">17</span></td><td class="fc-day-top fc-wed fc-past" data-date="2024-09-18"><span class="fc-day-number">18</span></td><td class="fc-day-top fc-thu fc-past" data-date="2024-09-19"><span class="fc-day-number">19</span></td><td class="fc-day-top fc-fri fc-past" data-date="2024-09-20"><span class="fc-day-number">20</span></td><td class="fc-day-top fc-sat fc-past" data-date="2024-09-21"><span class="fc-day-number">21</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week table-bordered" style="height: 131px;"><div class="fc-bg"><table class="table-bordered"><tbody><tr><td class="fc-day  fc-sun fc-past" data-date="2024-09-22"></td><td class="fc-day  fc-mon fc-today alert alert-info" data-date="2024-09-23"></td><td class="fc-day  fc-tue fc-future" data-date="2024-09-24"></td><td class="fc-day  fc-wed fc-future" data-date="2024-09-25"></td><td class="fc-day  fc-thu fc-future" data-date="2024-09-26"></td><td class="fc-day  fc-fri fc-future" data-date="2024-09-27"></td><td class="fc-day  fc-sat fc-future" data-date="2024-09-28"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2024-09-22"><span class="fc-day-number">22</span></td><td class="fc-day-top fc-mon fc-today alert alert-info" data-date="2024-09-23"><span class="fc-day-number">23</span></td><td class="fc-day-top fc-tue fc-future" data-date="2024-09-24"><span class="fc-day-number">24</span></td><td class="fc-day-top fc-wed fc-future" data-date="2024-09-25"><span class="fc-day-number">25</span></td><td class="fc-day-top fc-thu fc-future" data-date="2024-09-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-fri fc-future" data-date="2024-09-27"><span class="fc-day-number">27</span></td><td class="fc-day-top fc-sat fc-future" data-date="2024-09-28"><span class="fc-day-number">28</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week table-bordered" style="height: 131px;"><div class="fc-bg"><table class="table-bordered"><tbody><tr><td class="fc-day  fc-sun fc-future" data-date="2024-09-29"></td><td class="fc-day  fc-mon fc-future" data-date="2024-09-30"></td><td class="fc-day  fc-tue fc-other-month fc-future" data-date="2024-10-01"></td><td class="fc-day  fc-wed fc-other-month fc-future" data-date="2024-10-02"></td><td class="fc-day  fc-thu fc-other-month fc-future" data-date="2024-10-03"></td><td class="fc-day  fc-fri fc-other-month fc-future" data-date="2024-10-04"></td><td class="fc-day  fc-sat fc-other-month fc-future" data-date="2024-10-05"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2024-09-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-mon fc-future" data-date="2024-09-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-tue fc-other-month fc-future" data-date="2024-10-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2024-10-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2024-10-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2024-10-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2024-10-05"><span class="fc-day-number">5</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week table-bordered" style="height: 135px;"><div class="fc-bg"><table class="table-bordered"><tbody><tr><td class="fc-day  fc-sun fc-other-month fc-future" data-date="2024-10-06"></td><td class="fc-day  fc-mon fc-other-month fc-future" data-date="2024-10-07"></td><td class="fc-day  fc-tue fc-other-month fc-future" data-date="2024-10-08"></td><td class="fc-day  fc-wed fc-other-month fc-future" data-date="2024-10-09"></td><td class="fc-day  fc-thu fc-other-month fc-future" data-date="2024-10-10"></td><td class="fc-day  fc-fri fc-other-month fc-future" data-date="2024-10-11"></td><td class="fc-day  fc-sat fc-other-month fc-future" data-date="2024-10-12"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-future" data-date="2024-10-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-mon fc-other-month fc-future" data-date="2024-10-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-tue fc-other-month fc-future" data-date="2024-10-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2024-10-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2024-10-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2024-10-11"><span class="fc-day-number">11</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2024-10-12"><span class="fc-day-number">12</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
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

                <div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
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
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By
            <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
    </div>
</div>

@endsection
