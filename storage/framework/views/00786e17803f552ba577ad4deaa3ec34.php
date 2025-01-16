




<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Edit Location')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(url('location')); ?>"><?php echo e(__('Location')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Edit Location')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>

    
    <form action="<?php echo e(route('location.update', $location->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card em-card">
                    <div class="card-header">
                        <h5><?php echo e(__('Location Detail')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="location_name" class="form-label">
                                    <?php echo e(__('Location Name')); ?>

                                    <span class="text-danger pl-1">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="location_name" 
                                    id="location_name" 
                                    class="form-control <?php $__errorArgs = ['location_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    value="<?php echo e(old('location_name', $location->location_name)); ?>" 
                                    
                                    placeholder="Enter Location">
                                <?php $__errorArgs = ['location_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        
                            <div class="form-group col-md-6">
                                <label for="longitude" class="form-label">
                                    <?php echo e(__('Longitude')); ?>

                                    <span class="text-danger pl-1">*</span>
                                </label>
                                <input 
                                    type="number" 
                                    name="longitude" 
                                    id="longitude" 
                                    class="form-control <?php $__errorArgs = ['longitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    step="0.0000000000001" 
                                    value="<?php echo e(old('longitude' ,$location->longitude)); ?>" 
                                    placeholder="Enter Longitude">
                                <?php $__errorArgs = ['longitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        
                            <div class="form-group col-md-6">
                                <label for="latitude" class="form-label">
                                    <?php echo e(__('Latitude')); ?>

                                    <span class="text-danger pl-1">*</span>
                                </label>
                                <input 
                                    type="number" 
                                    name="latitude" 
                                    id="latitude" 
                                    class="form-control <?php $__errorArgs = ['latitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    step="0.0000000000001" 
                                    value="<?php echo e(old('latitude', $location->latitude)); ?>" 
                                    placeholder="Enter Latitude">
                                <?php $__errorArgs = ['latitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        
                            <div class="form-group col-md-6">
                                <label for="radius_in_meters" class="form-label">
                                    <?php echo e(__('Radius in Meters')); ?>

                                    <span class="text-danger pl-1">*</span>
                                </label>
                                <input 
                                    type="number" 
                                    name="radius_in_meters" 
                                    id="radius_in_meters" 
                                    class="form-control <?php $__errorArgs = ['radius_in_meters'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    step="0.0001" 
                                    value="<?php echo e(old('radius_in_meters', $location->allowed_radius_in_meters)); ?>" 
                                    placeholder="Enter Radius in meters">
                                <?php $__errorArgs = ['radius_in_meters'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        
                            <div class="form-group col-md-6">
                                <label for="client_id" class="form-label">
                                    <?php echo e(__('Client')); ?>

                                    <span class="text-danger pl-1">*</span>
                                </label>
                                <select 
                                    name="client_id" 
                                    id="client_id" 
                                    class="form-control <?php $__errorArgs = ['client_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    required>
                                    <option value="">Select Client</option>
                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <option value="<?php echo e($client->id); ?>" <?php echo e($location->client_id == $client->id ? 'selected' : ''); ?>>
                                            <?php echo e($client->client_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['client_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        
                            <div class="form-group col-md-6">
                                <label for="is_active" class="form-label"><?php echo e(__('Is Active')); ?></label>
                                <div class="form-check">
                                    <input 
                                        type="checkbox" 
                                        name="is_active" 
                                        id="is_active" 
                                        class="form-check-input <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                        value="1" <?php echo e($location->is_active ? 'checked' : ''); ?>>
                                    <label for="is_active" class="form-check-label"><?php echo e(__('Active')); ?></label>
                                </div>
                                <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
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
                <button type="submit" class="btn btn-primary"><?php echo e(__('Update Location')); ?></button>
            </div>
            <br>
                            
    </form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\hrm_laravel_idlogix\resources\views/location/edit.blade.php ENDPATH**/ ?>