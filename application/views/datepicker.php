<link rel="stylesheet" type="text/css" href="<?php echo base_url('media/css/jquery-ui/themes/base/jquery-ui.css'); ?>">
<script>
    $(function() {
        $( ".datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange:'1950:2020',
            dateFormat: "yy-mm-dd",
        })

        $( ".datepicker-date" ).datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: '0',
            yearRange:'-0:+1',
            dateFormat: "yy-mm-dd",
        })
    });
</script>