<div>
    @include('livewire.model-group')
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
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addGroupModal">
                <i class="fas fa-plus"></i> Add Group
            </button>
        </div>
    
        <div class="table-responsive">
            <div class="input-group mb-3">
            <input wire:model.live="search" placeholder="Search" class="form-control form-control-lg" type="text">
        </div>
            <table class="table table-hover align-middle table-bordered shadow-sm" style="background-color: #fff; border-radius: 8px;">
                <thead class="table-light text-center">
                    <tr>
                        <th>#</th>
                        <th>اسم الجروب</th>
                        <th>اسم صاحب الجروب</th>
                        <th>ارقام التليفون</th>
                        <th>العنوان</th>
                        <th>امكانية الشحن</th>
                        <th>الفئة</th>
                        <th>التقييم</th>
                        <th>كل الاوردرات</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groups as $group)
                        <tr>
                            <td class="text-center">{{ $groups->firstItem() + $loop->index }}</td>
                            <td>{{ $group->group_name }}</td>
                            <td>{{ $group->person_name }}</td>
                            <td>
                                <div>{{ $group->phone_number1 }}</div>
                                <div>{{ $group->phone_number2 }}</div>
                            </td>
                            <td>{{ $group->address }}</td>
                            <td class="text-center">
                                <span class="badge {{ $group->has_shipping === 'yes' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $group->has_shipping === 'yes' ? 'متوفر' : 'غير متوفر' }}
                                </span>
                            </td>
                            <td>{{ $group->category }}</td>
                            <td class="text-center">
                                @if($group->evaluation !== 0)
                                    {{ str_repeat('★', $group->evaluation) }} {{ str_repeat('☆', 5 - $group->evaluation) }}
                                @else
                                    <span class="text-danger">لم يتم التقييم</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('order', ['id' => $group->id]) }}" class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-eye"></i> View Orders
                                </a>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#updateGroupModal" wire:click="editGroup({{ $group->id }})">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteGroupModal" wire:click="deleteGroup({{ $group->id }})">
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
            {{ $groups->links() }}
        </div>
    </div>
</div>
