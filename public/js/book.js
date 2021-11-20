"use strict";

let bookUtils = {
    formEl: $("#bookForm"),
    table: {},

    init: function () {
        this.initValidation();
        this.bindEvents();
        this.loadDataTable();
    },
    bindEvents: function () {
        $(document).on('click', '.editBook', function (e) {
            bookUtils.editBook(e);
        });
        bookUtils.deleteBook();
        $("#saveBookForm").on('hide.bs.modal', function () {
            commonUtils.resetModalOnClose(this);
        });
        $("#importBookForm").on('hide.bs.modal', function () {
            commonUtils.resetModalOnClose(this);
        });
    },
    initValidation: function () {
        if (bookUtils.formEl.length == 0) {
            return false;
        }
        bookUtils.validator = bookUtils.formEl.validate({
            ignore: ":hidden",
            rules: {
                title: {
                    required: true,
                    minlength: 3
                },
                author: {
                    required: true,
                    minlength: 3
                },
                no_of_books: {
                    required: true
                }
            },
            invalidHandler: function (event, validator) {
                var alert = $('#add_forgot_form_1_msg');
                alert.removeClass('kt--hide').show();

            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    },
    loadDataTable: function () {
        bookUtils.table = $('#bookTable').DataTable({
            "paging": true,
            "pageLength": 10,
            "pagingType": "simple_numbers",
            "scrollY": 250,
        });
    },
    editBook: function (e) {
        let _self = $(e.currentTarget);
        let data = _self.data();
        let editURL = data.section;
        let updateURL = data.update;

        $.ajax({
            url: editURL,
            type: "get",
            dataType: 'json',
            success: (response) => {
                if (response) {
                    bookUtils.formEl.attr('action', updateURL);
                    bookUtils.formEl.find('#updateMethod').val("PUT");
                    $("#saveBookForm").find('#updateMethod').show();
                    bookUtils.formEl.loadDataFromJSON(response);
                    $("#saveBookForm").modal('toggle');
                }
            },
            error: (data) => {
                toastr.error(data);
            },
        });
    },
    deleteBook: function () {
        $(document).on("click", ".deleteDialog", (event) => {
            event.preventDefault();
            let _self = $(event.currentTarget);

            $(document).find(".deleteEntry")
                    .data("section", _self.data("section"));
            $(document).find("#title").text("Are you sure want to delete?")
            $("#modalConfirmDelete").modal("show");
        });
        $(".deleteEntry").on("click", (event) => {
            event.preventDefault();
            let _self = $(event.currentTarget);

            let deleteURL = _self.data("section");

            $.ajax({
                url: deleteURL,
                type: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') || $('[name="_token"]').val()
                },
                success: (data) => {
                    data = JSON.parse(data);
                    if (data.error) {
                        toastr.error(data.message);
                    } else {
                        bookUtils.table.row($(
                                'a[data-section="' + deleteURL + '"]'
                                ).closest("tr")
                                )
                                .remove()
                                .draw();
                        toastr.success(data.message);
                    }
                    _self.closest(".modal").modal("hide");
                },
                error: (data) => {
                    toastr.error(data);
                },
            });
        });
    }
};


$(document).ready(function () {
    bookUtils.init();
    if (session) {
        if (session.errorMsg) {
            toastr.error(session.errorMsg)
        }
        if (session.successMsg) {
            toastr.success(session.successMsg)
        }
        if (session.modal && session.modal.filePath) {
            $(document).find('#errorResponse').modal('show');
        }
    }

})