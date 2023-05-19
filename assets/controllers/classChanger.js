$(document).ready(function () {
    $(document).on('click', '#table-checkbox', function () {
            $('.tableData').toggleClass('on off');
            if ($(this).is(':checked')) {
                labelTableSwitch.insertAdjacentHTML('afterend', '<div id="divCheck20">' +
                    'Проверить врачей у которых было больше 10 записей' + '<br>' +
                    '<label class="table-switch" >\n' +
                    '            <input type="checkbox" class="table-checkbox" id="chboxCheck20">\n' +
                    '            <span class="table-slider round "></span>\n' +
                    '        </label>' + '</div>');
            } else {
                divCheck20.remove()
                $('.tableRowData').removeClass('over20')
            }
        }
    );
    $(document).on('click', '#chboxCheck20', function () {
        if ($(this).is(':checked')) {
            ifMore20();
        } else {
            $('.tableRowData').removeClass('over20')
        }
    });

    function ifMore20() {
        $('#daysTable tr').each(function (row) {
            var counter = 0;
            $(this).find('.tableCellData').each(function (cell) {
                counter += parseInt($(this).html().replace(/(\r\n|\n|\r)/gm, ""));
            });
            if (counter >= 20) {
                $(this).addClass('over20');
            }
        });
    }

    $(document).on('click', '#tableAjaxUpdate', function () {
        $.ajax({
            method: "Get",
            url: "/ajax/get/appointments",
            success: function (data) {
                if (typeof data.status != "undefined" && data.status != "undefined") {
                    if (data.status == "OK") {
                        if (typeof data.message != "undefined" && data.message != "undefined") {
                            $('.TablesInfo').html(data.message);
                        }
                    }
                }
            },
            complete: (function () {
                $('#dataUpdated').removeClass('hidden');
                if ($('#table-checkbox').is(':checked')) {
                    $('.tableData').toggleClass('on off');
                }
                if ($('#chboxCheck20').is(':checked')) {
                    ifMore20();
                } else {
                    $('.tableRowData').removeClass('over20')

                }

            }),
            error: function (response) {
                console.log(response.responseJSON)
            }
        })
    })
});