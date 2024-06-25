@extends('dashboard.home')
@inject('clients', 'App\Models\Client')
@inject('donations', 'App\Models\DonationRequest')

@section('title')
    Dashboard
@endsection
@section('small_title')
    /Statistics
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!--Clients -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $clients->count() }}</h3>
                    <p>Clients</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- Donation Requests -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $donations->count() }}</h3>
                    <p>Donation Requests</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
