

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Edit Client')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(url('client')); ?>"><?php echo e(__('Client')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Edit Client')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>

    

                <?php echo e(Form::model($client, ['route' => ['client.update', $client->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card em-card">
                            <div class="card-header">
                                <h5><?php echo e(__('Personal Detail')); ?></h5>
                            </div>
                            <div class="card-body">
                                
                                           
                                        
                                        
                                    
                                        
                                     

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <?php echo Form::label('name', __('Name'), ['class' => 'form-label']); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::text('client_name', old('client_name'), [
                                            'class' => 'form-control',
                                            // 'required' => 'required',
                                            'placeholder' => 'Enter Client Name',
                                        ]); ?>

                                        <?php $__errorArgs = ['client_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <?php echo Form::label('address', __('Address'), ['class' => 'form-label']); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::text('address', old('address'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter Client Address',
                                        ]); ?>

                                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <?php echo Form::label('phoneno', __('Phone'), ['class' => 'form-label']); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::number('phone_no', old('phone_no'), ['class' => 'form-control', 'placeholder' => 'Enter Client Phone No']); ?>

                                        <?php $__errorArgs = ['phone_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                
                                    <div class="form-group col-md-6">
                                        <?php echo Form::label('logo', __('Company Logo'), ['class' => 'form-label w-100 mb-2']); ?>

                                        <div class="form-group col-md-12 d-flex align-items-center">
                                            <div class="d-flex align-items-center w-100">
                                                <?php echo Form::file('logo', ['class' => 'form-control me-2', 'accept' => 'image/*', 'style' => 'width: 75%;']); ?>

                                                <?php if(!empty($client->logo_path)): ?>
                                                    <a href="<?php echo e(asset('storage/' . $client->logo_path)); ?>" target="_blank">
                                                        <img src="<?php echo e(asset('storage/' . $client->logo_path)); ?>" alt="Company Logo" class="img-thumbnail" style="width: 50px; height: 50px;">
                                                    </a>
                                                <?php else: ?>
                                                    <p class="ms-2 mb-0">No logo</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                
                                    <div class="form-group col-md-6">
                                        <?php echo Form::label('firstname', __('First Name'), ['class' => 'form-label']); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::text('first_name', old('first_name'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter First Name',
                                        ]); ?>

                                        <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <?php echo Form::label('lastname', __('Last Name'), ['class' => 'form-label']); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::text('last_name', old('last_name'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter Last Name',
                                        ]); ?>

                                        <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <?php echo Form::label('phonenumber', __('Phone Number'), ['class' => 'form-label']); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::number('phone_number', old('phone_number'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter Phone Number',
                                        ]); ?>

                                        <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <?php echo Form::label('email', __('Email'), ['class' => 'form-label']); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::email('email', old('email'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter Client Email',
                                        ]); ?>

                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <?php echo Form::label('is_active', __('Is Active'), ['class' => 'form-label']); ?>

                                        <div class="form-check">
                                            <?php echo Form::checkbox('is_active', 1, old('is_active', $client->is_active) ?? false, [
                                                'class' => 'form-check-input',
                                                'id' => 'is_active',
                                            ]); ?>

                                            <?php echo Form::label('is_active', __('Active'), ['class' => 'form-check-label']); ?>

                                        </div>
                                        <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <?php echo Form::label('erp_client_id', __('ERP Client'), ['class' => 'form-label']); ?>

                                        <div class="form-check">
                                            <?php echo Form::checkbox('erp_client_id', 1, old('erp_client_id', $client->erp_client_id) ?? false, [
                                                'class' => 'form-check-input',
                                                'id' => 'erp_client_id',
                                            ]); ?>

                                            <?php echo Form::label('erp_client_id', __('Enabled'), ['class' => 'form-check-label']); ?>

                                        </div>
                                        <?php $__errorArgs = ['erp_client_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                   
                </div>

                
                    <div class="float-end">
                        <button type="submit" class="btn  btn-primary"><?php echo e('Update'); ?></button>
                    </div>
                    <br>
                
                <div class="col-12">
                    <?php echo Form::close(); ?>

                </div>
            
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\hrm_laravel_idlogix\resources\views/client/edit.blade.php ENDPATH**/ ?>