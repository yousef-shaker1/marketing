<div>

    <!-- Insert Modal -->
    <div wire:ignore.self class="modal fade" id="addGroupModal" tabindex="-1" aria-labelledby="addGroupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGroupModalLabel">Create Group</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="saveGroup">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>اسم الجروب</label>
                            <input type="text" wire:model.live="group_name" class="form-control" placeholder="ادخل اسم الجروب">
                            @error('group_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>اسم صاحب الجروب</label>
                            <input type="text" wire:model.live="person_name" class="form-control" placeholder="ادخل اسم صاحب الجروب">
                            @error('person_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>رقم التليفون 1</label>
                            <input type="text" wire:model.live="phone_number1" class="form-control" placeholder="ادخل رقم التليفون 1">
                            @error('phone_number1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>رقم التليفون2</label>
                            <input type="text" wire:model.live="phone_number2" class="form-control" placeholder="ادخل رقم التليفون 2">
                            @error('phone_number2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>العنوان</label>
                            <input type="text" wire:model.live="address" class="form-control"  placeholder="ادخل العنوان">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>هل يوجد شحن</label>
                            <select wire:model.live="has_shipping" class="form-control">
                                <option value="">اختار</option>
                                <option value="yes">yes</option>
                                <option value="no">no</option>
                            </select>
                            @error('has_shipping')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>الفئة</label>
                            <input type="text" wire:model.live="category" class="form-control" placeholder="ادخل الفئة">
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>التقييم</label>
                            <select wire:model.live="evaluation" class="form-control">
                                <option value="">اختار</option>
                                <option value="0">مش دلوقتي</option>
                                <option value="1">★ - 1 نجمة</option>
                                <option value="2">★★ - 2 نجوم</option>
                                <option value="3">★★★ - 3 نجوم</option>
                                <option value="4">★★★★ - 4 نجوم</option>
                                <option value="5">★★★★★ - 5 نجوم</option>
                            </select>
                            @error('evaluation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


     <!-- Update Group Modal -->
    <div wire:ignore.self class="modal fade" id="updateGroupModal" tabindex="-1"
        aria-labelledby="updateGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateGroupModalLabel">Edit Group</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="updateGroup">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>اسم الجروب</label>
                            <input type="text" wire:model.live="group_name" class="form-control" placeholder="ادخل اسم الجروب">
                            @error('group_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>اسم صاحب الجروب</label>
                            <input type="text" wire:model.live="person_name" class="form-control" placeholder="ادخل اسم صاحب الجروب">
                            @error('person_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>رقم التليفون 1</label>
                            <input type="text" wire:model.live="phone_number1" class="form-control" placeholder="ادخل رقم التليفون 1">
                            @error('phone_number1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>رقم التليفون2</label>
                            <input type="text" wire:model.live="phone_number2" class="form-control" placeholder="ادخل رقم التليفون 2">
                            @error('phone_number2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>العنوان</label>
                            <input type="text" wire:model.live="address" class="form-control"  placeholder="ادخل العنوان">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>هل يوجد شحن</label>
                            <select wire:model.live="has_shipping" class="form-control">
                                <option value="">اختار</option>
                                <option value="yes">yes</option>
                                <option value="no">no</option>
                            </select>
                            @error('has_shipping')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>الفئة</label>
                            <input type="text" wire:model.live="category" class="form-control" placeholder="ادخل الفئة">
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>التقييم</label>
                            <select wire:model.live="evaluation" class="form-control">
                                <option value="">اختار</option>
                                <option value="0">مش دلوقتي</option>
                                <option value="1">★ - 1 نجمة</option>
                                <option value="2">★★ - 2 نجوم</option>
                                <option value="3">★★★ - 3 نجوم</option>
                                <option value="4">★★★★ - 4 نجوم</option>
                                <option value="5">★★★★★ - 5 نجوم</option>
                            </select>
                            @error('evaluation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 

    <!-- Delete Student Modal -->
    <div wire:ignore.self class="modal fade" id="deleteGroupModal" tabindex="-1"
        aria-labelledby="deleteGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteGroupModalLabel">Delete Group</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="destroyGroup">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this data ?</h4>
                        <label>اسم الجروب</label>
                        <input type="text" wire:model.lazy="group_name" class="form-control" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
