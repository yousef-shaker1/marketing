<div>

    <!-- Insert Modal -->
    <div wire:ignore.self class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOrderModalLabel">Create Order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="saveOrder">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>اسم العميل</label>
                            <input type="text" wire:model.live="name" class="form-control" placeholder="ادخل اسم العميل">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>رقم التليفون 1</label>
                            <input type="text" wire:model.live="phone1" class="form-control" placeholder="ادخل رقم التليفون 1">
                            @error('phone1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>رقم التليفون 2</label>
                            <input type="text" wire:model.live="phone2" class="form-control" placeholder="ادخل رقم التليفون 2">
                            @error('phone2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>المحافظة</label>
                            <select wire:model.live="province" class="form-control" id="province">
                                <option value="">اختر المحافظة</option>
                                <option value="القاهرة">القاهرة</option>
                                <option value="الإسكندرية">الإسكندرية</option>
                                <option value="الدقهلية">الدقهلية</option>
                                <option value="الجيزة">الجيزة</option>
                                <option value="الشرقية">الشرقية</option>
                                <option value="القليوبية">القليوبية</option>
                                <option value="المنوفية">المنوفية</option>
                                <option value="الشرقية">الشرقية</option>
                                <option value="الغربية">الغربية</option>
                                <option value="دمياط">دمياط</option>
                                <option value="الفيوم">الفيوم</option>
                                <option value="بني سويف">بني سويف</option>
                                <option value="سوهاج">سوهاج</option>
                                <option value="أسيوط">أسيوط</option>
                                <option value="قنا">قنا</option>
                                <option value="الأقصر">الأقصر</option>
                                <option value="أسوان">أسوان</option>
                                <option value="المنيا">المنيا</option>
                                <option value="سوهاج">سوهاج</option>
                                <option value="السويس">السويس</option>
                                <option value="بورسعيد">بورسعيد</option>
                                <option value="الإسماعيلية">الإسماعيلية</option>
                                <option value="الحدود الشمالية">الحدود الشمالية</option>
                                <option value="مصر القديمة">مصر القديمة</option>
                            </select>
                            @error('province')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>العنوان</label>
                            <input type="text" wire:model.live="address" class="form-control" placeholder="ادخل رقم العنوان">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>الكمية</label>
                            <input type="text" wire:model.live="amount" class="form-control"  placeholder="ادخل الكمية">
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status">الحالة</label>
                            <select wire:model.live="status" class="form-control" id="status">
                                <option value="">اختر الحالة</option>
                                <option value="تمت بنجاح">تمت بنجاح</option>
                                <option value="معلق">معلق</option>
                                <option value="رفض">رفض</option>
                                <option value="مؤجل">مؤجل</option>
                                <option value="قيد المراجعة">قيد المراجعة</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="product_id">المنتج</label>
                            <select wire:model.live="product_id" class="form-control" id="product_id">
                                <option value="">اختر الحالة</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('status')
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
    <div wire:ignore.self class="modal fade" id="updateOrderModal" tabindex="-1"
        aria-labelledby="updateOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateOrderModalLabel">Edit Group</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal">&times;</button>
                </div>
                    <form wire:submit.prevent="updateOrder">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>اسم العميل</label>
                                <input type="text" wire:model.live="name" class="form-control" placeholder="ادخل اسم العميل">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>رقم التليفون 1</label>
                                <input type="text" wire:model.live="phone1" class="form-control" placeholder="ادخل رقم التليفون 1">
                                @error('phone1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>رقم التليفون 2</label>
                                <input type="text" wire:model.live="phone2" class="form-control" placeholder="ادخل رقم التليفون 2">
                                @error('phone2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>المحافظة</label>
                                <select wire:model.live="province" class="form-control" id="province">
                                    <option value="">اختر المحافظة</option>
                                    <option value="القاهرة">القاهرة</option>
                                    <option value="الإسكندرية">الإسكندرية</option>
                                    <option value="الدقهلية">الدقهلية</option>
                                    <option value="الجيزة">الجيزة</option>
                                    <option value="الشرقية">الشرقية</option>
                                    <option value="القليوبية">القليوبية</option>
                                    <option value="المنوفية">المنوفية</option>
                                    <option value="الشرقية">الشرقية</option>
                                    <option value="الغربية">الغربية</option>
                                    <option value="دمياط">دمياط</option>
                                    <option value="الفيوم">الفيوم</option>
                                    <option value="بني سويف">بني سويف</option>
                                    <option value="سوهاج">سوهاج</option>
                                    <option value="أسيوط">أسيوط</option>
                                    <option value="قنا">قنا</option>
                                    <option value="الأقصر">الأقصر</option>
                                    <option value="أسوان">أسوان</option>
                                    <option value="المنيا">المنيا</option>
                                    <option value="سوهاج">سوهاج</option>
                                    <option value="السويس">السويس</option>
                                    <option value="بورسعيد">بورسعيد</option>
                                    <option value="الإسماعيلية">الإسماعيلية</option>
                                    <option value="الحدود الشمالية">الحدود الشمالية</option>
                                    <option value="مصر القديمة">مصر القديمة</option>
                                </select>
                                @error('province')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>العنوان</label>
                                <input type="text" wire:model.live="address" class="form-control" placeholder="ادخل رقم العنوان">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>الكمية</label>
                                <input type="text" wire:model.live="amount" class="form-control"  placeholder="ادخل الكمية">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status">الحالة</label>
                                <select wire:model.live="status" class="form-control" id="status">
                                    <option value="">اختر الحالة</option>
                                    <option value="تمت بنجاح">تمت بنجاح</option>
                                    <option value="معلق">معلق</option>
                                    <option value="رفض">رفض</option>
                                    <option value="مؤجل">مؤجل</option>
                                    <option value="قيد المراجعة">قيد المراجعة</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_id">المنتج</label>
                                <select wire:model.live="product_id" class="form-control" id="product_id">
                                    <option value="">اختر الحالة</option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @error('status')
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
    <div wire:ignore.self class="modal fade" id="deleteOrderModal" tabindex="-1"
        aria-labelledby="deleteOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteOrderModalLabel">Delete Order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="destroyOrder">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this data ?</h4>
                        <label>اسم العميل</label>
                        <input type="text" wire:model.lazy="name" class="form-control" readonly>
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
