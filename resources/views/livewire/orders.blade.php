<div>
    @include('livewire.model-order')
    
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="text-primary">Manage orders</h5>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addOrderModal">
                <i class="fas fa-plus"></i> Add order
            </button>
        </div>
    
        <div class="table-responsive">
            <div class="input-order mb-3">
            <input wire:model.live="search" placeholder="Search" class="form-control form-control-lg" type="text">
        </div>
            <table class="table table-hover align-middle table-bordered shadow-sm" style="background-color: #fff; border-radius: 8px;">
                <thead class="table-light text-center">
                    <tr>
                        <th>#</th>
                        <th>اسم العميل</th>
                        <th>ارقام التليفون</th>
                        <th>المحافظة</th>
                        <th>العنوان</th>
                        <th>الكمية</th>
                        <th>السعر</th>
                        <th>نسبتي</th>
                        <th>الاجمالي</th>
                        <th>اسم المنتج</th>
                        <th>اسم الجروب</th>
                        <th>الحالة</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="text-center">{{ $orders->firstItem() + $loop->index }}</td>
                            <td>{{ $order->name }}</td>
                            <td>
                                <div>{{ $order->phone1 }}</div>
                                <div>{{ $order->phone2 }}</div>
                            </td>
                            <td>{{ $order->province }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->amount }}</td>
                            <td>{{ $order->product->price }} EGP</td>
                            <td>{{ $order->product->gain  }} EGP</td>
                            <td>{{ ($order->product->price + $order->product->gain) * $order->amount }} EGP</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->product->group->group_name }}</td>
                            <td>
                                <span 
                                    class="badge" 
                                    style="
                                        background-color: 
                                            @if ($order->status == 'تمت بنجاح') #28a745 
                                            @elseif ($order->status == 'معلق') #ffc107 
                                            @elseif ($order->status == 'رفض') #dc3545 
                                            @elseif ($order->status == 'مؤجل') #17a2b8 
                                            @elseif ($order->status == 'قيد المراجعة') #6c757d 
                                            @else #ffffff 
                                            @endif;
                                        color: white;">
                                    {{ $order->status }}
                                </span>
                            </td>
                            
                                                        
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#updateOrderModal" wire:click="editOrder({{ $order->id }})">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteOrderModal" wire:click="deleteOrder({{ $order->id }})">
                                        <i class="fas fa-trash"></i> Remove
                                    </button>
                                </div>

                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"  wire:click="OK_Status({{ $order->id }})">تمت بنجاح</button>
                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"  wire:click="Hanging_Status({{ $order->id }})">معلق</button>
                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"  wire:click="Reject_Status({{ $order->id }})">رفض</button>
                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"  wire:click="Delayed_Status({{ $order->id }})">موجل</button>
                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"  wire:click="Under_review_Status({{ $order->id }})">قيد المراجعة</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
        <div class="d-flex justify-content-center mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</div>
