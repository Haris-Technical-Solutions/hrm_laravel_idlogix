<?php

    $logo = \App\Models\Utility::get_file('uploads/logo/');
    $company_logo = \App\Models\Utility::GetLogo();
    $users = \Auth::user();
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
    $currantLang = $users->currentLanguage();
    $emailTemplate = App\Models\EmailTemplate::getemailTemplate();
    $lang = Auth::user()->lang;
?>

<?php if(isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on'): ?>
    <nav class="dash-sidebar light-sidebar transprent-bg">
    <?php else: ?>
        <nav class="dash-sidebar light-sidebar">
<?php endif; ?>



<div class="navbar-wrapper">
    <div class="m-header main-logo">
        <a href="<?php echo e(route('dashboard')); ?>" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="<?php echo e($logo . (isset($company_logo) && !empty($company_logo) ? $company_logo . '?' . time() : 'logo-dark.png' . '?' . time())); ?>"
                alt="<?php echo e(config('app.name', 'HRMGo')); ?>" class="logo logo-lg" style="height: 40px;">
        </a>
    </div>
    <div class="navbar-content">
        <ul class="dash-navbar">

            <!-- dashboard-->
            <?php if(\Auth::user()->type != 'company'): ?>
                <li class="dash-item">
                    <a href="<?php echo e(route('dashboard')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-home"></i></span><span class="dash-mtext"><?php echo e(__('Dashboard')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if(\Auth::user()->type == 'company'): ?>
                <li class="dash-item dash-hasmenu  <?php echo e(Request::segment(1) == 'null' ? 'active dash-trigger' : ''); ?>">
                    <a href="#" class="dash-link"><span class="dash-micon"><i class="ti ti-home"></i></span><span
                            class="dash-mtext"><?php echo e(__('Dashboard')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu ">
                        <li
                            class="dash-item <?php echo e(Request::segment(1) == null || Request::segment(1) == 'report' ? ' active dash-trigger' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Overview')); ?></a>
                        </li>

                        <?php if(Gate::check('Manage Report')): ?>
                            <li class="dash-item dash-hasmenu">
                                <a href="#!" class="dash-link"><span class=""><i
                                            class=""></i></span><span
                                        class="dash-mtext"><?php echo e(__('Report')); ?></span><span class="dash-arrow"><i
                                            data-feather="chevron-right"></i></span></a>
                                <ul class="dash-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Report')): ?>
                                        <li class="dash-item">
                                            <a class="dash-link"
                                                href="<?php echo e(route('report.income-expense')); ?>"><?php echo e(__('Income Vs Expense')); ?></a>
                                        </li>

                                        <li class="dash-item">
                                            <a class="dash-link"
                                                href="<?php echo e(route('report.monthly.attendance')); ?>"><?php echo e(__('Monthly Attendance')); ?></a>
                                        </li>

                                        <li class="dash-item">
                                            <a class="dash-link"
                                                href="<?php echo e(route('report.leave')); ?>"><?php echo e(__('Leave')); ?></a>
                                        </li>


                                        <li class="dash-item">
                                            <a class="dash-link"
                                                href="<?php echo e(route('report.account.statement')); ?>"><?php echo e(__('Account Statement')); ?></a>
                                        </li>


                                        <li class="dash-item">
                                            <a class="dash-link"
                                                href="<?php echo e(route('report.payroll')); ?>"><?php echo e(__('Payroll')); ?></a>
                                        </li>


                                        <li class="dash-item">
                                            <a class="dash-link"
                                                href="<?php echo e(route('report.timesheet')); ?>"><?php echo e(__('Timesheet')); ?></a>
                                        </li>
                                    <?php endif; ?>


                                </ul>
                            </li>
                        <?php endif; ?>


                    </ul>
                </li>
            <?php endif; ?>
            <!--dashboard-->

            <!-- user-->
            
 
            <!-- user-->

            <!-- client-->
            <?php if(\Auth::user()->type == 'company'): ?>
                <li class="dash-item">
                    <a href="<?php echo e(route('client.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Client')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if(\Auth::user()->type == 'company'): ?>
            <li class="dash-item">
                <a href="<?php echo e(route('department.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Department')); ?></span></a>
            </li>
        <?php endif; ?>
        <?php if(\Auth::user()->type == 'company'): ?>
        <li class="dash-item">
            <a href="<?php echo e(route('designation.index')); ?>" class="dash-link"><span class="dash-micon"><i
                        class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Designation')); ?></span></a>
        </li>
    <?php endif; ?>
            <!-- employee-->
            
            <!-- employee-->

            <!-- payroll-->
            
            <!-- payroll-->

            

            <!-- timesheet-->
            
            <!--timesheet-->

            <!-- performance-->
            
            <!--performance-->

            <!--fianance-->
            
            <!-- fianance-->

            <!--trainning-->
            

            <!-- tranning-->


            <!-- HR-->
            
            <!-- HR-->

            <!-- recruitment-->
            
            <!-- recruitment-->
            <!--contract-->
            

            <!--end-->


            <!-- ticket-->
            

            <!-- Event-->
            


            <!--meeting-->
            


            <!-- Zoom meeting-->
            

            <!-- assets-->
            


            <!-- document-->
            

            <!--company policy-->



            
            <!--chats-->
            

            

            <?php if(\Auth::user()->type == 'super admin'): ?>
                <?php if(Gate::check('Manage Plan')): ?>
                    <li class="dash-item ">
                        <a href="<?php echo e(route('plans.index')); ?>" class="dash-link"><span
                                class="dash-micon"><i class=" ti ti-trophy"></i></span><span
                                class="dash-mtext"><?php echo e(__('Plan')); ?></span></a>

                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(\Auth::user()->type == 'super admin'): ?>
                <li class="dash-item ">
                    <a href="<?php echo e(route('plan_request.index')); ?>" class="dash-link"><span
                            class="dash-micon"><i class="ti ti-arrow-down-right-circle"></i></span><span
                            class="dash-mtext"><?php echo e(__('Plan Request')); ?></span></a>

                </li>
            <?php endif; ?>


            <?php if(\Auth::user()->type == 'super admin'): ?>
                <li class="dash-item dash-hasmenu  <?php echo e(Request::segment(1) == '' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('referral-program.index')); ?>" class="dash-link">
                        <span class="dash-micon"><i class="ti ti-discount-2"></i></span><span
                            class="dash-mtext"><?php echo e(__('Referral Program')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(Auth::user()->type == 'super admin'): ?>
                <?php if(Gate::check('manage coupon')): ?>
                    <li
                        class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'coupons' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('coupons.index')); ?>" class="dash-link"><span
                                class="dash-micon"><i class="ti ti-gift"></i></span><span
                                class="dash-mtext"><?php echo e(__('Coupon')); ?></span></a>

                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(\Auth::user()->type == 'super admin'): ?>
                
                <li class="dash-item ">
                    <a href="<?php echo e(route('order.index')); ?>"
                        class="dash-link <?php echo e(request()->is('orders*') ? 'active' : ''); ?>"><span
                            class="dash-micon"><i class="ti ti-shopping-cart"></i></span><span
                            class="dash-mtext"><?php echo e(__('Order')); ?></span></a>

                </li>
                
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'super admin'): ?>
                <li
                    class="dash-item <?php echo e(Request::route()->getName() == 'email_template.show' || Request::segment(1) == 'email_template_lang' || Request::route()->getName() == 'manageemail.lang' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('manage.email.language', [$emailTemplate->id, \Auth::user()->lang])); ?>"
                        class="dash-link"><span class="dash-micon"><i
                                class="ti ti-template"></i></span><span
                            class="dash-mtext"><?php echo e(__('Email Templates')); ?></span></a>
                </li>
            <?php endif; ?>
            <!--report-->
            <!-- <?php if(Gate::check('Manage Report')): ?>
<li class="dash-item dash-hasmenu">
<a href="#!" class="dash-link"><span class="dash-micon"><i
class="ti ti-list"></i></span><span
class="dash-mtext"><?php echo e(__('Report')); ?></span><span
class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
<ul class="dash-submenu">
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Report')): ?>
<li class="dash-item">
<a class="dash-link"
href="<?php echo e(route('report.income-expense')); ?>"><?php echo e(__('Income Vs Expense')); ?></a>
</li>

<li class="dash-item">
<a class="dash-link"
href="<?php echo e(route('report.monthly.attendance')); ?>"><?php echo e(__('Monthly Attendance')); ?></a>
</li>

<li class="dash-item">
<a class="dash-link"
href="<?php echo e(route('report.leave')); ?>"><?php echo e(__('Leave')); ?></a>
</li>


<li class="dash-item">
<a class="dash-link"
href="<?php echo e(route('report.account.statement')); ?>"><?php echo e(__('Account Statement')); ?></a>
</li>



<li class="dash-item">
<a class="dash-link"
href="<?php echo e(route('report.timesheet')); ?>"><?php echo e(__('Timesheet')); ?></a>
</li>
<?php endif; ?>


</ul>
</li>
<?php endif; ?> -->


            <!--constant-->
            <?php if(Gate::check('Manage Department') ||
                    Gate::check('Manage Designation') ||
                    Gate::check('Manage Document Type') ||
                    Gate::check('Manage Branch') ||
                    Gate::check('Manage Award Type') ||
                    Gate::check('Manage Termination Types') ||
                    Gate::check('Manage Payslip Type') ||
                    Gate::check('Manage Allowance Option') ||
                    Gate::check('Manage Loan Options') ||
                    Gate::check('Manage Deduction Options') ||
                    Gate::check('Manage Expense Type') ||
                    Gate::check('Manage Income Type') ||
                    Gate::check('Manage Payment Type') ||
                    Gate::check('Manage Leave Type') ||
                    Gate::check('Manage Training Type') ||
                    Gate::check('Manage Job Category') ||
                    Gate::check('Manage Job Stage')): ?>
                
                <!-- <ul class="dash-submenu">
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Branch')): ?>
<li class="dash-item <?php echo e(request()->is('branch*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('branch.index')); ?>"><?php echo e(__('Branch')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Department')): ?>
<li class="dash-item <?php echo e(request()->is('department*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('department.index')); ?>"><?php echo e(__('Department')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Designation')): ?>
<li class="dash-item <?php echo e(request()->is('designation*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('designation.index')); ?>"><?php echo e(__('Designation')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Document Type')): ?>
<li class="dash-item <?php echo e(request()->is('document*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('document.index')); ?>"><?php echo e(__('Document Type')); ?></a>
</li>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Award Type')): ?>
<li class="dash-item <?php echo e(request()->is('awardtype*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('awardtype.index')); ?>"><?php echo e(__('Award Type')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Termination Types')): ?>
<li
class="dash-item <?php echo e(request()->is('terminationtype*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('terminationtype.index')); ?>"><?php echo e(__('Termination Type')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Payslip Type')): ?>
<li class="dash-item <?php echo e(request()->is('paysliptype*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('paysliptype.index')); ?>"><?php echo e(__('Payslip Type')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Allowance Option')): ?>
<li
class="dash-item <?php echo e(request()->is('allowanceoption*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('allowanceoption.index')); ?>"><?php echo e(__('Allowance Option')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Loan Option')): ?>
<li class="dash-item <?php echo e(request()->is('loanoption*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('loanoption.index')); ?>"><?php echo e(__('Loan Option')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Deduction Option')): ?>
<li
class="dash-item <?php echo e(request()->is('deductionoption*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('deductionoption.index')); ?>"><?php echo e(__('Deduction Option')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Expense Type')): ?>
<li class="dash-item <?php echo e(request()->is('expensetype*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('expensetype.index')); ?>"><?php echo e(__('Expense Type')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Income Type')): ?>
<li class="dash-item <?php echo e(request()->is('incometype*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('incometype.index')); ?>"><?php echo e(__('Income Type')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Payment Type')): ?>
<li class="dash-item <?php echo e(request()->is('paymenttype*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('paymenttype.index')); ?>"><?php echo e(__('Payment Type')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Leave Type')): ?>
<li class="dash-item <?php echo e(request()->is('leavetype*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('leavetype.index')); ?>"><?php echo e(__('Leave Type')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Termination Type')): ?>
<li
class="dash-item <?php echo e(request()->is('terminationtype*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('terminationtype.index')); ?>"><?php echo e(__('Termination Type')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Goal Type')): ?>
<li class="dash-item <?php echo e(request()->is('goaltype*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('goaltype.index')); ?>"><?php echo e(__('Goal Type')); ?></a>
</li>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Training Type')): ?>
<li class="dash-item <?php echo e(request()->is('trainingtype*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('trainingtype.index')); ?>"><?php echo e(__('Training Type')); ?></a>
</li>
<?php endif; ?>

<?php if(\Auth::user()->type !== 'hr'): ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Job Category')): ?>
<li
class="dash-item <?php echo e(request()->is('job-category*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('job-category.index')); ?>"><?php echo e(__('Job Category')); ?></a>
</li>
<?php endif; ?>
<?php endif; ?>

<?php if(\Auth::user()->type !== 'hr'): ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Job Stage')): ?>
<li
class="dash-item <?php echo e(request()->is('job-stage*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('job-stage.index')); ?>"><?php echo e(__('Job Stage')); ?></a>
</li>
<?php endif; ?>
<?php endif; ?>

<li
class="dash-item <?php echo e(request()->is('performanceType*') ? 'active' : ''); ?>">
<a class="dash-link"
href="<?php echo e(route('performanceType.index')); ?>"><?php echo e(__('Performance Type')); ?></a>
</li>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Competencies')): ?>
<li class="dash-item <?php echo e(request()->is('competencies*') ? 'active' : ''); ?>">

<a class="dash-link"
href="<?php echo e(route('competencies.index')); ?>"><?php echo e(__('Competencies')); ?></a>
</li>
<?php endif; ?>
</ul> -->
            <?php endif; ?>
            <!--constant-->

            <?php if(\Auth::user()->type == 'super admin'): ?>
                <?php echo $__env->make('landingpage::menu.landingpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(Gate::check('Manage System Settings')): ?>
                <li class="dash-item ">
                    <a href="<?php echo e(route('settings.index')); ?>" class="dash-link"><span
                            class="dash-micon"><i class="ti ti-settings"></i></span><span
                            class="dash-mtext"><?php echo e(__('Settings')); ?></span></a>
                </li>
            <?php endif; ?>
            <!--------------------- Start System Setup ----------------------------------->

            

            <!--------------------- End System Setup ----------------------------------->
</ul>

</div>
</div>
</nav>
<?php /**PATH E:\laragon\www\hrm_laravel_idlogix\resources\views/partial/Admin/menu.blade.php ENDPATH**/ ?>