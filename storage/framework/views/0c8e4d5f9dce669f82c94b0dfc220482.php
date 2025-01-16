

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Clients')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Client')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <a href="<?php echo e(route('client.export')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-original-title="<?php echo e(__('Export')); ?>" class="btn btn-sm btn-primary">
        <i class="ti ti-file-export"></i>
    </a>

    <a href="#" data-url="<?php echo e(route('client.file.import')); ?>" data-ajax-popup="true"
        data-title="<?php echo e(__('Import  Employee CSV File')); ?>" data-bs-toggle="tooltip" title=""
        class="btn btn-sm btn-primary" data-bs-original-title="<?php echo e(__('Import')); ?>">
        <i class="ti ti-file"></i>
    </a>
    
        <a href="<?php echo e(route('client.create')); ?>" data-title="<?php echo e(__('Create New Client')); ?>" data-bs-toggle="tooltip"
            title="" class="btn btn-sm btn-primary" data-bs-original-title="<?php echo e(__('Create')); ?>">
            <i class="ti ti-plus"></i>
        </a>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header card-body table-border-style">
                    
                    <div class="table-responsive">
                        <table class="table" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('ID')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Address')); ?></th>
                                    <th><?php echo e(__('Phone Number')); ?></th>
                                    <th><?php echo e(__('Active')); ?></th>
                                    
                                    
                                        <th width="200px"><?php echo e(__('Action')); ?></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                 <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <tr>
                                            <td>
                                            <?php echo e($client->id); ?>

                                            </td>
                                            <td><?php echo e($client->client_name); ?></td>
                                            <td><?php echo e($client->address); ?></td>
                                            <td><?php echo e($client->phone_no); ?></td>
                                            <td><?php echo e($client->is_active); ?></td>
                                            <td class="Action">
                                                
                                                    <span>
                                                        
                                                            <div class="action-btn bg-info ms-2">
                                                                <a href="<?php echo e(route('client.edit', $client->id)); ?>"
                                                                    class="mx-3 btn btn-sm  align-items-center"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                                    <i class="ti ti-pencil text-white"></i>
                                                                </a>
                                                            </div>
                                                        

                                                        
                                                            <div class="action-btn bg-danger ms-2">
                                                                <?php echo Form::open([
                                                                    'method' => 'DELETE',
                                                                    'route' => ['client.destroy', $client->id],
                                                                    'id' => 'delete-form-' . $client->id,
                                                                ]); ?>

                                                                <a href="#"
                                                                    class="mx-3 btn btn-sm  align-items-center bs-pass-para"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="Delete" aria-label="Delete"><i
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\hrm_laravel_idlogix\resources\views/client/index.blade.php ENDPATH**/ ?>