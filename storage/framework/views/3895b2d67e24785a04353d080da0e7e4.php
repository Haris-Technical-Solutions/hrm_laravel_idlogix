<?php $__env->startSection('content'); ?>
    <style>
        .print > table > tbody > tr > td:nth-child(1)
        {
            width:0px !important;
        }
        .print > table > tbody > tr > td:nth-child(3)
        {
            width:0px !important;
        }
        .print > table > tbody > tr > td:nth-child(2)
        {
            align:left !important;
            width:100%;
        }
        /* .print{
            height:100%;
        } */
        .jrPage{
            width:100% !important;
        }
        @media print {
            .print {
                width: 8.5in;
                height: 11in;
            }

            /* .jrPage{
                width:100vh !important;
            } */
             /* .no-print{
                display: none;
             } */

        }
    </style>
    <?php if(view()->exists('report.jasper.filters.'.$filter)): ?>
        <?php echo $__env->make('report.jasper.filters.'.$filter, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <span class="print">
        <?php echo $preview; ?>

    </span>
    <script>
        var url = location.protocol + '//' + location.host + location.pathname;
        function load_filter_fields(filter_fields){
            // console.log(filter_fields, 'load');
            has_param = false
            for(key in filter_fields){
                try {
                    $(`#${key}`).val(filter_fields[key]);
                    has_param = true
                } catch (error) {
                    console.log(error);
                    continue;
                }
            }
            if(has_param){
                $('#<?php echo e($filter); ?>').addClass('show');
            }
        }
        function read_filter_fields(filter_fields){
            let new_url = new URL(url);
            for(key in filter_fields){
                try {

                    if(filter_fields[key]['type'] == 'input'){
                        field = $(`#${filter_fields[key]['field']}`);
                    }else if(filter_fields[key]['type'] == 'select') {
                        field = $(`#${filter_fields[key]['field']} option:selected`);
                    }

                    // -----
                    if(field.val().length > 0){
                        new_url.searchParams.set(filter_fields[key]['field'], field.val());
                    }
                } catch (error) {
                    console.log(error);
                    continue;
                }
            }
            return new_url;
        }

        function reset_filter_fields(filter_fields) {
            filter_fields.forEach(function(filter) {
                try {
                    let field;
                    if (filter.type === 'input') {
                        field = $(`#${filter.field}`);
                        if (field.val().length > 0) {
                            field.val('');
                        }
                    } else if (filter.type === 'select') {
                        field = $(`#${filter.field}`);
                        if (field.val().length > 0) {
                            field.val('');
                            field.prop('selectedIndex', 0);  // Reset to the first option
                        }
                    }
                } catch (error) {
                    console.log(error);
                }
            });
        }

        function encodeQueryData(data) {
            const ret = [];
            for (let d in data)
                ret.push(encodeURIComponent(d) + '=' + encodeURIComponent(data[d]));
            return ret.join('&');
        }

        $(document).ready(function(){
            // read_filter_fields(filter_fields);
            load_filter_fields(<?php echo json_encode($_GET); ?>)
            $('#applyFilters').click(function(){
                new_url = read_filter_fields(filter_fields);
                console.log(new_url);
                window.location = new_url.toString();
                console.log(window.location);
            });
            $('#resetFilters').click(function(){
                reset_filter_fields(filter_fields)
            })
        });

        // document.addEventListener('DOMContentLoaded', function () {
        //     const urlParams = new URLSearchParams(window.location.search);
        //     if (urlParams.has('print')) {
        //         setTimeout(() => {
        //             window.print();
        //         }, 100);
        //     }
        // });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon1\www\hrm\resources\views/report/jasper/preview.blade.php ENDPATH**/ ?>