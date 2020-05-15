jQuery('document').ready(function () {
    var table = jQuery('#table_combobox');
    var table_values = jQuery('#table_combobox_2');
    jQuery('select').on('change',function () {
        var selected_value = table.val();

        $.ajax({
            type: 'post',
            url: 'select-table-for-update-base',
            data:
            {
                '_token': $('input[name=_token').val(),
               'select_table': selected_value,
            },
            success:function (data) {
                console.log('SUCCESS');
                data.forEach(function(item, i, arr) {
                    console.log(item.value);
                    table_values.append('<option value="' + item.key + '">'+ item.value + '</option>');
                    table_values.selectpicker('refresh');
                });
            }
        });
    });
});
