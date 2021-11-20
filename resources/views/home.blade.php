@extends('layouts.main') @section('content')
<div class="container my-5 py-5">


    <!-- Section: Block Content -->
    <section class="">

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4">

                <!-- Admin card -->
                <div class="card mt-3">

                    <div class="">
                        <i class="fa fa-book fa-lg primary-color z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
                        <div class="float-right text-right p-3">
                            <p class="text-uppercase text-muted mb-1"><small>Books</small></p>
                            <h4 class="font-weight-bold mb-0">{{Arr::get($data,'book_count')}}</h4>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="progress md-progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                        <p class="card-text"></p>
                    </div>

                </div>
                <!-- Admin card -->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">

                <!-- Available books card -->
                <div class="card mt-3">

                    <div class="">
                        <i class="fas fa-chart-pie fa-lg purple z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
                        <div class="float-right text-right p-3">
                            <p class="text-uppercase text-muted mb-1"><small>available books</small></p>
                            <h4 class="font-weight-bold mb-0">{{Arr::get($data,'available_count')}}</h4>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="progress md-progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: {{Arr::get($data,'available_count_percent')}}%" aria-valuenow="{{Arr::get($data,'available_count_percent')}}" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                        <p class="card-text"></p>
                    </div>

                </div>
                <!-- Admin card -->

            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">

                <!-- Subscription card -->
                <div class="card mt-3">

                    <div class="">
                        <i class="fas fa-chart-line fa-lg teal z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
                        <div class="float-right text-right p-3">
                            <p class="text-uppercase text-muted mb-1"><small>subscriptions</small></p>
                            <h4 class="font-weight-bold mb-0">{{Arr::get($data,'subscription_count')}}</h4>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="progress md-progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{Arr::get($data,'subscription_count_percent')}}%" aria-valuenow="{{Arr::get($data,'subscription_count_percent')}}" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                        <p class="card-text"></p>
                    </div>

                </div>
                <!-- Admin card -->

            </div>
            <!--Grid column-->



        </div>
        <!--Grid row-->

    </section>
    <!--Section: Content-->


</div>

@endsection

