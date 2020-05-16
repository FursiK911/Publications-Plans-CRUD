jQuery('document').ready(function () {
    var table = jQuery('#table_combobox');
    jQuery('#field_1').show();
    jQuery('#table_combobox_2').hide();
    jQuery('#field_1').attr('placeholder','Название кафедры');
    jQuery('#field_1').val('');
    table.on('change',function () {

        var selected_value = table.val();

        jQuery('#field_1').hide();
        jQuery('#field_2').hide();
        jQuery('#field_3').hide();
        jQuery('#field_4').hide();
        jQuery('#field_5').hide();
        jQuery('#field_6').hide();
        jQuery('#table_combobox_2').hide();

        jQuery('#field_1').val('');
        jQuery('#field_2').val('');
        jQuery('#field_3').val('');
        jQuery('#field_4').val('');
        jQuery('#field_5').val('');
        jQuery('#field_6').val('');

        jQuery('#field_2').attr('type','');
        jQuery('#field_3').attr('type','');
        switch(selected_value)
        {
            case 'chair':
                jQuery('#field_1').show();
                jQuery('#field_1').attr('placeholder','Название кафедры');
                jQuery('#field_1').val('');
                //alert('chair');
                break;
            case 'discipline':
                jQuery('#field_1').show();
                jQuery('#field_1').attr('placeholder','Название дисциплины');
                jQuery('#field_1').val('');
                //alert('discipline');
                break;
            case 'type_publication':
                jQuery('#field_1').show();
                jQuery('#field_1').attr('placeholder','Название дисциплины');
                jQuery('#field_1').val('');
                //alert('type_publication');
                break;
            case 'user':
                jQuery('#table_combobox_2').show();
                jQuery('#field_1').show();
                jQuery('#field_1').val('');
                jQuery('#field_1').attr('placeholder','Email');

                jQuery('#field_2').show();
                jQuery('#field_2').val('');
                jQuery('#field_2').attr('placeholder','Пароль');
                jQuery('#field_2').attr('type','password');

                jQuery('#field_3').show();
                jQuery('#field_3').val('');
                jQuery('#field_3').attr('placeholder','Подтверждение пароля');
                jQuery('#field_3').attr('type','password');

                jQuery('#field_4').show();
                jQuery('#field_4').val('');
                jQuery('#field_4').attr('placeholder','Фамилия');

                jQuery('#field_5').show();
                jQuery('#field_5').val('');
                jQuery('#field_5').attr('placeholder','Имя');

                jQuery('#field_6').show();
                jQuery('#field_6').val('');
                jQuery('#field_6').attr('placeholder','Отчество');
                //alert('name');
                break;
            case 'author':
                jQuery('#field_1').show();
                jQuery('#field_1').val('');
                jQuery('#field_1').attr('placeholder','Фамилия');

                jQuery('#field_2').show();
                jQuery('#field_2').val('');
                jQuery('#field_2').attr('placeholder','Имя');

                jQuery('#field_3').show();
                jQuery('#field_3').val('');
                jQuery('#field_3').attr('placeholder','Отчество');
                //alert('name');
                break;
        }
    })
});
