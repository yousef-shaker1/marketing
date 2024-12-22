<?php use Carbon\Carbon;?>
@extends('layout.master')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection

@section('title')
 home
@endsection

@section('content')
  <div class="container mt-4">
          <!-- row -->
    <div class="row g-3">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h6 class="card-title">all orders</h6>
                    <h4 class="card-text">
                        {{-- {{\App\Models\order::count() +  \App\Models\clothingorder::count()}} orders --}}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h6 class="card-title">Daily Orders</h6>
                    <h4 class="card-text">
                        {{-- {{\App\Models\order::whereDate('created_at', Carbon::today())->count() }} order --}}
                    </h4>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h6 class="card-title">customers</h6>
                    <h4 class="card-text">
                        {{-- {{\App\Models\customer::count() }} customer --}}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h6 class="card-title">Complete orders</h6>
                    <h4 class="card-text">
                        {{-- {{\App\Models\order::where('status', 'قبول')->count() + \App\Models\clothingorder::where('status', 'قبول')->count()}} order --}}
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row g-3">
        <div class="col-md-12 col-lg-12 col-xl-7">
            <div class="card mb-3">
                <div class="card-header bg-transparent">
                    <h4 class="card-title mb-0">اوردرات المنتجات و الملابس</h4>
                </div>
                <div style="max-width: 400px; margin: auto;">
                    {{-- {{ $chart1->render() }} --}}
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-5">
            <div class="card mb-3">
                <div class="card-header bg-transparent">
                    <h4 class="main-content-label">الاوردرات</h4>
                </div>
                <div style="max-width: 400px; margin: auto;">
                    {{-- {{ $chartjs2->render() }} --}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js')

@endsection