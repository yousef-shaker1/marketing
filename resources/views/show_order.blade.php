@extends('layout.master')
@section('css')
    @livewireStyles
@endsection

@section('title')
    الاوردرات
@endsection

@section('content')
    <div class="row g-3">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h6 class="card-title">كل المبلغ</h6>
                    <h4 class="card-text">
                        <?php
                        $totalPrice = \App\Models\Product::where('group_id', $id)->sum('price');
                        $totalGain = \App\Models\Product::where('group_id', $id)->sum('gain');
                        $total = $totalPrice + $totalGain;
                        
                        $totalOrder = \App\Models\Order::whereHas('product', function ($query) use ($id) {
                            $query->where('group_id', $id); // الفلترة باستخدام group_id من المنتج
                        })->get();
                        
                        if ($totalOrder->isEmpty()) {
                            // إذا كانت النتائج فارغة
                            $totalOrder = 0;
                        } else {
                            // إذا كانت هناك نتائج، قم بحساب المجموع
                            $totalOrder = $totalOrder->sum(function ($order) {
                                return ($order->product->price + $order->product->gain) * $order->amount;
                            });
                        }
                        
                        // حساب إجمالي المبالغ لجميع الطلبات التي في حالة "تمت بنجاح"
                        $totalOrderAmount = \App\Models\Order::where('status', 'تمت بنجاح')
                            ->whereHas('product', function ($query) use ($id) {
                                $query->where('group_id', $id); // الفلترة باستخدام group_id من المنتج
                            })
                            ->get();
                        
                        if ($totalOrderAmount->isEmpty()) {
                            // إذا كانت النتائج فارغة
                            $totalOrderAmount = 0;
                        } else {
                            // إذا كانت هناك نتائج، قم بحساب المجموع
                            $totalOrderAmount = $totalOrderAmount->sum(function ($order) {
                                return ($order->product->price + $order->product->gain) * $order->amount;
                            });
                        }
                        
                        // حساب إجمالي المبالغ لجميع الطلبات التي في حالة "رفض"
                        $totalOrderrejected = \App\Models\Order::where('status', 'رفض')
                            ->whereHas('product', function ($query) use ($id) {
                                $query->where('group_id', $id); // الفلترة باستخدام group_id من المنتج
                            })
                            ->get();
                        
                        if ($totalOrderrejected->isEmpty()) {
                            // إذا كانت النتائج فارغة
                            $totalOrderrejected = 0;
                        } else {
                            // إذا كانت هناك نتائج، قم بحساب المجموع
                            $totalOrderrejected = $totalOrderrejected->sum(function ($order) {
                                return ($order->product->price + $order->product->gain) * $order->amount;
                            });
                        }
                        
                        ?>
                        {{ $totalOrder }} EGP
                    </h4>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h6 class="card-title">الاوردرات المقبولة</h6>
                    <h4 class="card-text">
                        {{ $totalOrderAmount }} EGP
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h6 class="card-title">الاوردرات المرفوضة</h6>
                    <h4 class="card-text">
                        {{ $totalOrderrejected }} EGP

                    </h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    {{-- <h6 class="card-title">اللي انا حصتة</h6> --}}
                    <h4 class="card-text">
                        {{-- {{\App\Models\order::where('status', 'قبول')->count() + \App\Models\clothingorder::where('status', 'قبول')->count()}} order --}}
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    @livewire('show-order', ['id' => $id])

    @livewireScripts
@endsection

@section('js')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addOrderModal').modal('hide');
            $('#updateOrderModal').modal('hide');
            $('#deleteOrderModal').modal('hide');
        });
    </script>
@endsection
