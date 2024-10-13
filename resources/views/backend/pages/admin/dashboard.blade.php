@extends('backend.layouts.templateadmin')
@section('content')
<div class="xs-pd-20-10 pd-ltr-20">
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

    <div class="row pb-10">
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20 missions-grid">
            <div class="mission-card">
                <div class="indice">
                    <div class="icon"><i class="fa fa-briefcase"></i></div>
                    <div class="title">Nom de la mission</div>
                    <div class="actions">
                        {{-- <i class="fa fa-comments"></i>
                        <i class="fa fa-ellipsis-h"></i> --}}
                    </div>
                </div>
                <div class="times">
                    <div class="start-time">
                        <i class="fa fa-clock"></i>
                        <div>
                            <p>Heure de début</p>
                            <h3>08:00</h3>
                        </div>
                    </div>
                    <div class="end-time">
                        <i class="fa fa-clock"></i>
                        <div>
                            <p>Heure de fin</p>
                            <h3>08:00</h3>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="resources">
                        <i class="fa fa-users"></i>
                        <span>12</span>
                    </div>
                    <div class="date">
                        <span>Ven. 15.Mars.2023</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-20">
            <a href="#" class="card-box d-block mx-auto pd-20 text-secondary">
                <div class="img pb-30">
                    <img src="vendors/images/medicine-bro.svg" alt="">
                </div>
                <div class="content">
                    <h3 class="h4">Services</h3>
                    <p class="max-width-200">
                        We provide superior health care in a compassionate maner
                    </p>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-20">
            <a href="#" class="card-box d-block mx-auto pd-20 text-secondary">
                <div class="img pb-30">
                    <img src="vendors/images/remedy-amico.svg" alt="">
                </div>
                <div class="content">
                    <h3 class="h4">Medications</h3>
                    <p class="max-width-200">
                        Look for prescription and over-the-counter drug information.
                    </p>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-20">
            <a href="#" class="card-box d-block mx-auto pd-20 text-secondary">
                <div class="img pb-30">
                    <img src="vendors/images/paper-map-cuate.svg" alt="">
                </div>
                <div class="content">
                    <h3 class="h4">Locations</h3>
                    <p class="max-width-200">
                        Convenient locations when and where you need them.
                    </p>
                </div>
            </a>
        </div>
    </div>

    <div class="footer-wrap pd-20 mb-20 card-box">
        DeskApp - Bootstrap 4 Admin Template By
        <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
    </div>
</div>
@endsection
