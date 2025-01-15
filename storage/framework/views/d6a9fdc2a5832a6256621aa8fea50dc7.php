

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Create Department')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(url('department')); ?>"><?php echo e(__('Department')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Create Department')); ?></li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
    <form action="<?php echo e(route('department.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card em-card">
                    <div class="card-header">
                        <h5><?php echo e(__('Department Detail')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="department_name" class="form-label"><?php echo e(__('Department Name')); ?><span class="text-danger pl-1">*</span></label>
                                <input type="text" name="department_name" id="department_name" class="form-control" value="<?php echo e(old('department_name')); ?>" required placeholder="Enter Department Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="short_name" class="form-label"><?php echo e(__('Short Name')); ?><span class="text-danger pl-1">*</span></label>
                                <input type="text" name="short_name" id="short_name" class="form-control" value="<?php echo e(old('short_name')); ?>" required placeholder="Enter Department Short Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hod" class="form-label"><?php echo e(__('hod')); ?><span class="text-danger pl-1">*</span></label>
                                <input type="number" name="hod" id="hod" class="form-control" value="<?php echo e(old('hod')); ?>" placeholder="Enter HOD">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="client_id" class="form-label"><?php echo e(__('Client')); ?><span class="text-danger pl-1">*</span></label>
                                <select name="client_id" id="client_id" class="form-control" required>
                                    <?php
                                        $clients = \App\Models\Client::getallClients();
                                    ?>
                                    <option value="">Select Client</option>
                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($client->id); ?>" <?php echo e(old('client_id') == $client->id ? 'selected' : ''); ?>>
                                            <?php echo e($client->client_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
    
                            <div class="form-group col-md-6">
                                <label for="project_id" class="form-label"><?php echo e(__('Project')); ?><span class="text-danger pl-1">*</span></label>
                                <select name="project_id" id="project_id" class="form-control">
                                    <?php
                                        $projects = \App\Models\Project::getAllProjects();
                                    ?>
                                    <option value="">Select Project</option>
                                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($project->id); ?>" <?php echo e(old('project_id') == $project->id ? 'selected' : ''); ?>>
                                            <?php echo e($project->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="is_active" class="form-label"><?php echo e(__('Is Active')); ?></label>
                                <div class="form-check">
                                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" <?php echo e(old('is_active') ? 'checked' : ''); ?>>
                                    <label for="is_active" class="form-check-label"><?php echo e(__('Active')); ?></label>
                                </div>
                            </div>
                     </div>
                 </div>
                </div>
         </div>
     </div>

    <div class="float-end">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Create')); ?></button>
    </div>
    <br>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\hrm_laravel_idlogix\resources\views/department/create.blade.php ENDPATH**/ ?>