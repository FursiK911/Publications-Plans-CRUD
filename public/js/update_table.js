jQuery('document').ready(function () {
    var table = jQuery('#table_combobox');
    var table_values = jQuery('#table_combobox_2');
    var additional_block = jQuery('#additional_block');
    table_values.selectpicker('refresh');

    var s = table.val();
    table_values.empty();
    $.ajax({
        type: 'post',
        url: 'update_combobox',
        data:
            {
                '_token': $('input[name=_token').val(),
                'select_table': s,
            },
        success: function (data) {
            //console.log('SUCCESS');
            data.forEach(function (item, i, arr) {
                //console.log(item.value);
                table_values.append('<option value="' + item.key + '">' + item.value + '</option>');
                table_values.selectpicker('refresh');
                additional_block.show();
            });
        },
    });

    table.on('change',function () {
        var selected_value = table.val();
        table_values.empty();
        $.ajax({
            type: 'post',
            url: 'update_combobox',
            data:
            {
                '_token': $('input[name=_token').val(),
               'select_table': selected_value,
            },
            success:function (data) {
                //console.log('SUCCESS');
                data.forEach(function(item, i, arr) {
                    //console.log(item.value);
                    table_values.append('<option value="' + item.key + '">'+ item.value + '</option>');
                    table_values.selectpicker('refresh');
                    additional_block.show();
                });
            }
        });
    });
});
