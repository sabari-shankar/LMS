let commonUtils = {
    init: function () {

    },
    resetModalOnClose: function (modalEl, defaultValues = {}, ignoreHidden = false) {
        if (!modalEl) {
            return false;
        }

        $(modalEl).data('modal', null);
        let elmTxt = (ignoreHidden) ? '' : ',input:hidden';
        $(modalEl)
                .find("input:visible,textarea,select:visible" + elmTxt)
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end()
                .find('.custom-file-label,.documentView')
                .text('')
                .end();

        var validator = $(modalEl).find('form').validate();

        if (validator) {
            validator.resetForm();
    }
    },
}

commonUtils.init();

$.fn.loadDataFromJSON = function (data, excludeInputType = []) {
    let $form = $(this)

    excludeInputType = ($.isArray(excludeInputType)) ? excludeInputType : [];

    if (typeof (data) == "string" || $.isEmptyObject(data)) {
        return false;
    }

    $.each(data, function (key, value) {
        let $elem = $('[name="' + key + '"]', $form);
        let type = $elem.attr('type');

        if ($.inArray(type, excludeInputType) === -1) {
            if (type == 'radio' || type == 'checkbox') {
                $('[name="' + key + '"][value="' + value + '"]').prop('checked', true)
            } else if (type == 'checkbox' && (value == true || value == 'true')) {
                $('[name="' + key + '"]').prop('checked', true)
            } else {
                if (type == 'file') {
                    return;
                } else {
                    $elem.val(value);
                    $elem.focus();
                }
            }
        }
    })
};