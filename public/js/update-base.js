jQuery('document').ready(function () {
    var checkBoxForm = jQuery('.form-check');
    var checkBox = jQuery('#add_new_authors');

    checkBox.on('change', function () {
        console.log(this.checked);
        if (this.checked) {
            jQuery('#table_combobox_3').hide();
        } else {
            jQuery('#table_combobox_3').show();
        }
    });
});
