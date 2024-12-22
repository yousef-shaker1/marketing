<div>
    @include('livewire.model-product')
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
            <h5 class="text-primary">Manage Groups</h5>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="fas fa-plus"></i> Add Product
            </button>
        </div>
    
        <input wire:model.live="search" placeholder="Search" class="form-control form-control-lg" type="text">
        <br>
        <div class="table-responsive">
            <table class="table table-hover align-middle table-bordered shadow-sm" style="background-color: #fff; border-radius: 8px;">
                <thead class="table-light text-center">
                    <tr>
                        <th>#</th>
                        <th>اسم</th>
                        <th>صورة</th>
                        <th>وصف</th>
                        <th>سعر</th>
                        <th>نسبني</th>
                        <th>مجموع السعر</th>
                        <th>امكانية الشحن</th>
                        <th>الفئة</th>
                        <th>الجروب</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="text-center">{{ $products->firstItem() + $loop->index }}</td>
                            <td class="mb-0 text-muted"><a href="{{ Storage::url($product->img) }}"><img
                                src="{{ Storage::url($product->img) }}" style="width: 80px; height: 50px;"></a></td>                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->gain }}</td>
                            <td>{{ $product->price + $product->gain }}</td>
                            <td class="text-center">
                                <span class="badge {{ $product->has_shipping === 'yes' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $product->has_shipping === 'yes' ? 'متوفر' : 'غير متوفر' }}
                                </span>
                            </td>
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->group->group_name }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#updateProductModal" wire:click="editProduct({{ $product->id }})">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteProductModal" wire:click="deleteProduct({{ $product->id }})">
                                        <i class="fas fa-trash"></i> Remove
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
</div>
