"use strict";

let subscribeUtils = {
    formEl: $("#subscribeForm"),
    table: {},

    init: function () {
        this.bindEvents();
        this.loadDataTable();
    },
    bindEvents: function () {
        $(document).on('click', '.subscribeBook', function (e) {
            subscribeUtils.subscribeBook(e);
        });
        subscribeUtils.unSubscribeBook();
    },

    loadDataTable: function () {
        subscribeUtils.table = $('#subscribeTable').DataTable({
            "paging": true,
            "pageLength": 10,
            "pagingType": "simple_numbers",
            "scrollY": 250,
        });
    },

    subscribeBook: function (e) {
        let _self = $(e.currentTarget);
        let data = _self.data();
        let subscribeURL = data.section;
        let requestData = {
            book_id: data.bookId,
            subscribe: 1
        }
        $.ajax({
            url: subscribeURL,
            type: "POST",
            data: requestData,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') || $('[name="_token"]').val()
            },
            success: (response) => {
                if (response.error) {
                    toastr.error(response.message);
                } else {
                    subscribeUtils.table.row(
                            $(
                                    'a[data-section="' + subscribeURL + '"]'
                                    ).closest("tr")
                            ).draw();
                    toastr.success(response.message);
                }
            },
            error: (data) => {
                toastr.error(data);
            },
        });
    },
    unSubscribeBook: function () {
        $(document).on("click", ".unSubscribeBook", (event) => {
            event.preventDefault();
            let _self = $(event.currentTarget);

            $(document).find(".deleteEntry")
                    .data("section", _self.data("section"));
            $(document).find("#title").text("Are you sure want to unsubscribe?")
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
                        subscribeUtils.table.row($(
                                'a[data-section="' + deleteURL + '"]'
                                ).closest("tr")
                                ).draw();
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
    subscribeUtils.init();
    $("#message").hide(10000).slideUp(700);
})