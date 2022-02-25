$(document).ready(function () {
    // $('#kt_table').DataTable({
    //     processing: true,
    //     serverSide: false,
    //     responsive: true,
    //     ordering: false,
    //     lengthMenu: [
    //         [ 10, 25, 50 ],
    //         [ '10', '25', '50']
    //     ],
    //     buttons: [
    //         {
    //             text: 'Tambah',
    //             className: 'btn',
    //             className: 'btn-primary',
    //             action: function ( e, dt, node, config ) {
    //                 alert( 'Button activated' );
    //             }
    //         }
    //     ],
    //     filter: true,
    //     fnDrawCallback: function() {
    //     },
    // });
});

function formatRupiah(bilangan) {
    if (!!bilangan) {
        var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

        if (ribuan) {
            var separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    } else {
        rupiah = 0;
    }
    return rupiah;
}

function convert(id) {
    var nominal =  $('#'+id).val();
    nominal = nominal.replace(/\./g, '');
    var price = parseInt(nominal);
    $('#'+id).val(formatRupiah(price.toString()));
}

function getMakanan(param) {
    var idJenis = param.value;
    console.log(idJenis);
    $("#makanan").html("");

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        // url: '{{ route("backend.learningManagement.lde.manageWorkOrder.closeBudget.costManagement", [\Helper::encrypt($batchId), \Helper::encrypt($eventId)]) }}',
        url: base_url+'makanan/get_by_jenis',
        type: 'post',
        data: {
            id_jenis: idJenis
        },
        success: function (data) {
            console.log(JSON.parse(data));
            data = JSON.parse(data);
            var option = "";
            for (let i = 0; i < data.length; i++) {
                const isi = data[i];
                console.log(isi.id);
                option += '<option value="'+isi.id+'">'+isi.nama+'</option>';
            }
            $("#makanan").append(option);
        }
    }).fail(function () {
        alert('Error call get makanan');
    });
}