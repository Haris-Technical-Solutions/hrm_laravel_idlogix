




<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Edit Department')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(url('department')); ?>"><?php echo e(__('Department')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Edit Department')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>

    
    <form action="<?php echo e(route('department.update', $department->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card em-card">
                    <div class="card-header">
                        <h5><?php echo e(__('Department Detail')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
 
                            <label for="department_name">Department Name<span class="text-danger">*</span></label>
                            <input type="text" name="department_name" id="department_name" class="form-control" value="<?php echo e(old('department_name', $department->department_name)); ?>" required>
                            </div>

                            <div class="form-group col-md-6">
                            <label for="short_name">Short Name<span class="text-danger">*</span></label>
                            <input type="text" name="short_name" id="short_name" class="form-control" value="<?php echo e(old('short_name', $department->short_name)); ?>" required>
                            </div>

                            <div class="form-group col-md-6">
                            <label for="hod">HOD</label>
                            <input type="number" name="hod" id="hod" class="form-control" value="<?php echo e(old('hod', $department->hod)); ?>">
                            </div>

                            <div class="form-group col-md-6">
                            <label for="client_id">Client<span class="text-danger">*</span></label>
                            <select name="client_id" id="client_id" class="form-control" required>
                            <option value="">Select Client</option>
                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($client->id); ?>" <?php echo e($department->client_id == $client->id ? 'selected' : ''); ?>>
                                    <?php echo e($client->client_name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            </div>

                            <div class="form-group col-md-6">
                            <label for="project_id">Project<span class="text-danger">*</span></label>
                            <select name="project_id" id="project_id" class="form-control">
                            <option value="">Select Project</option>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($project->id); ?>" <?php echo e($department->project_id == $project->id ? 'selected' : ''); ?>>
                                    <?php echo e($project->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            </div>

                            <div class="form-group col-md-6 form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" <?php echo e($department->is_active ? 'checked' : ''); ?>>
                            <label for="is_active" class="form-check-label">Active</label>
                            </div>
                        </div>
                        </div>
                       </div>
                </div>
            </div>

            <div class="float-end">
                <button type="submit" class="btn btn-primary"><?php echo e(__('Update Department')); ?></button>
            </div>
            <br>
                            
    </form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\hrm_laravel_idlogix\resources\views/department/edit.blade.php ENDPATH**/ ?>