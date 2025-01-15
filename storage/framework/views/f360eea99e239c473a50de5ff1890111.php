




<?php $__env->startSection('page-title'); ?>
   <?php echo e(__("Locations")); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__("Home")); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__("Location")); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>

    <a href="<?php echo e(route('location.create')); ?>" data-title="<?php echo e(__('Create New Location')); ?>" data-bs-toggle="tooltip"
            title="" class="btn btn-sm btn-primary" data-bs-original-title="<?php echo e(__('Create')); ?>">
            <i class="ti ti-plus"></i>
        </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
        
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">

                    <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                                
                                <th><?php echo e(__('Location Name')); ?></th>
                                <th><?php echo e(__('Longitude')); ?></th>
                                <th><?php echo e(__('Latitude')); ?></th>
                                <th><?php echo e(__('Allowed Radius meters')); ?></th>
                                <th><?php echo e(__('Client')); ?></th>
                                <th><?php echo e(__('Active')); ?></th>
                                

                                <th width="200px"><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    
                                    <td><?php echo e($location->location_name); ?></td>
                                    <td><?php echo e($location->longitude); ?></td>
                                    <td><?php echo e($location->latitude); ?></td>
                                    <td><?php echo e($location->allowed_radius_in_meters); ?></td>
                                    <td><?php echo e(!empty($location->client_id) ? $location->client->client_name : ''); ?></td>
                                    <td><?php echo e($location->is_active == 1 ? 'Active' : 'Inactive'); ?></td>
                                    


                                    <td class="Action">
                                        <span>
                                            
                                                

                                                <div class="action-btn bg-info ms-2">
                                                    <a href="<?php echo e(route('location.edit', $location->id)); ?>"
                                                        class="mx-3 btn btn-sm  align-items-center"
                                                        data-bs-toggle="tooltip" title=""
                                                        data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            
                                        

                                            
                                                <div class="action-btn bg-danger ms-2">
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['location.destroy', $location->id], 'id' => 'delete-form-' . $location->id]); ?>

                                                    <a href="#" class="mx-3 btn btn-sm  align-items-center bs-pass-para"
                                                        data-bs-toggle="tooltip" title="" data-bs-original-title="Delete"
                                                        aria-label="Delete"><i
                                                            class="ti ti-trash text-white text-white"></i></a>
                                                    </form>
                                                </div>
                                            
                                      </span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\hrm_laravel_idlogix\resources\views/location/index.blade.php ENDPATH**/ ?>