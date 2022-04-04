$(document).ready(function () {
    $('input[name="dates"]').daterangepicker({
        autoUpdateInput: true,
        locale: {
            cancelLabel: 'Clear',
            format: 'YYYY-MM-DD'
        }
    });
    
    $('#kt_table').DataTable({
        processing: true,
        serverSide: false,
        responsive: true,
        ordering: false,
        lengthMenu: [
            [ 10, 25, 50 ],
            [ '10', '25', '50']
        ],
        filter: true,
        fnDrawCallback: function() {
        },
    });

    $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
    });
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

function convertNominal(nominal) {
    nominal = nominal.replace(/\./g, '');
    var price = parseInt(nominal);
    return formatRupiah(price.toString());
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

function selectMenu(id, nama, harga) {

    // var hargas = harga.replace(/\./g, '');
    // var price = parseInt(hargas);
    // hargas = formatRupiah(price.toString());

    var table = $('#listMenu tr');
    if(table.length === 0){
        $('#empty').remove();
    }
    var html = "<tr id='tr_"+(table.length+1)+"'>"
        +'<td>'
        +'<input type="hidden" name="id_menu[]" class="form-control" value="'+id+'"/>'
        +(table.length+1)
        +'</td>'
        +'<td>'
        +nama
        +'</td>'
        +'<td>Rp.'
        +convertNominal(harga.toString())
        +'</td>'
        +'<td>'
        +'<input type="number" name="jumlah_pesanan[]" class="form-control" value="1" onchange="sumPesanan(this, '+harga+', '+(table.length+1)+')"/>'
        +'</td>'
        +'<td>'
        +'<input type="text" name="catatan_pesanan[]" class="form-control" placeholder="Catatan" value=""/>'
        +'</td>'
        +'<td>'
        +'<input type="text" name="total_pesanan[]" id="total_jumlah_'+(table.length+1)+'" class="form-control" value="'+convertNominal(harga.toString())+'"/>'
        +'</td>'
        +'<td>'
        +`<a class="btn btn-danger btn-fw" href="#" onclick="deletePesanan('#tr_`+(table.length+1)+`')"><i class="mdi mdi-delete"></i></a>`
        +'</td>'
    +'</tr>';

    $('#listMenu').append(html);

    hitungTransaksi();

    // $('#modalMenu').modal("hide");
}

function sumPesanan(params, harga, no) {
    var jml = params.value;
    var total = parseInt(jml) * harga;

    total = formatRupiah(total.toString());
    $('#total_jumlah_'+no).val(total);
    hitungTransaksi();
}

function deletePesanan(id) {
    $(id).remove();
    hitungTransaksi();
}

function hitungTransaksi() {
    hitungPajak();
    hitungTotal();
}

function hitungPajak() {
    var table = $('#listMenu tr');
    var total = 0;
    for (let i = 1; i <= table.length; i++) {
        var totalJml = $('#total_jumlah_'+i).val();
        totalJml = totalJml.replace(/\./g, '');
        total = total + parseInt(totalJml);
    }

    var pajak = total * 0.1;
    $('#txtPajak').html(convertNominal(pajak.toString()));
    $('#pajak').val(pajak);
}

function hitungTotal() {
    var table = $('#listMenu tr');
    var jml = 0;
    for (let i = 1; i <= table.length; i++) {
        var totalJml = $('#total_jumlah_'+i).val();
        totalJml = totalJml.replace(/\./g, '');
        jml = jml + parseInt(totalJml);
    }
    console.log(jml);

    var diskon = $('#diskon').val();
    var diskon = parseInt(diskon);
    console.log(diskon);

    var pajak = $('#pajak').val();
    var pajak = parseInt(pajak);
    console.log(pajak);

    var total = (jml - diskon) + pajak;

    $('#txtTotal').html(convertNominal(total.toString()));
    $('#total').val(total);
}

function sumKembalian() {
    var nominal = $('#nominal').val();
    nominal = nominal.replace(/\./g, '');
    var nominal = parseInt(nominal);

    var total = $('#total').val();
    var total = parseInt(total);

    var kembalian = 0;
    if(nominal >= total){
        kembalian = nominal - total;
    }

    $('#nominal').val(convertNominal(nominal.toString()));

    $('#txtKembalian').html(convertNominal(kembalian.toString()));
    $('#kembalian').val(kembalian);
}

function checkDiskon() {
    var kode = $('#kode_diskon').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        // url: '{{ route("backend.learningManagement.lde.manageWorkOrder.closeBudget.costManagement", [\Helper::encrypt($batchId), \Helper::encrypt($eventId)]) }}',
        url: base_url+'diskon/get_by_kode',
        type: 'post',
        data: {
            kode_diskon: kode
        },
        success: function (data) {
            if(data !== "null"){
                var datas = JSON.parse(data);
                console.log(datas);
                var harga = 0;

                if (datas.type === "1") {
                    var table = $('#listMenu tr');
                    var jml = 0;
                    for (let i = 1; i <= table.length; i++) {
                        var totalJml = $('#total_jumlah_'+i).val();
                        totalJml = totalJml.replace(/\./g, '');
                        jml = jml + parseInt(totalJml);
                    }
                    var persen = parseInt(datas.diskon_persen);
                    harga = jml * (persen / 100);
                } else if (datas.type === "2") {
                    harga = parseInt(datas.diskon_harga);
                } else {
                    var table = $('#listMenu tr');
                    var jml = 0;
                    for (let i = 1; i <= table.length; i++) {
                        var totalJml = $('#total_jumlah_'+i).val();
                        totalJml = totalJml.replace(/\./g, '');
                        jml = jml + parseInt(totalJml);
                    }
                    var persen = parseInt(datas.diskon_persen);
                    var diskon_persen = jml * (persen / 100);
                    var diskon_harga = parseInt(datas.diskon_harga);

                    harga = diskon_persen + diskon_harga;
                }

                $('#txtDiskon').html(convertNominal(harga.toString()));
                $('#diskon').val(harga);
                $('#id_diskon').val(datas.id);

                hitungTransaksi();
            } else {
                alert("Kode diskon tidak ditemukan");
            }
        }
    }).fail(function () {
        alert('Error call get diskon');
    });
}

function submitTransaksi() {
    var frm = $('#add_transaksi');
    var formData = $('#add_transaksi').serializeArray();

    $.ajax({
        url: frm.attr('action'),
        type: frm.attr('method'),
        data: formData,
        dataType: 'json',
        beforeSend: function() {
            $('#formCreateTransaksi').addClass('overlay overlay-block');
            $("#overlayformCreateTransaksi").show();
        },
        success: function (data) {
            $('#formCreateTransaksi').removeClass('overlay overlay-block');
            $("#overlayformCreateTransaksi").hide();

            console.log('sukses');
            Swal.fire({
                html: data.code == "1"? "Succesfully added new data!" : data.msg,
                icon: data.code == "1"? "success" : "error",
                buttonsStyling: false,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(function (isConfirm) {
                
                if(data.code==="1"){
                    window.location.href = base_url + "transaksi/detail/"+data.id;
                } else {
                    // IF User Choose Cancel
                    if (!isConfirm.isConfirmed) return;
                }
                // frm.trigger("reset");
                // filterActivity();
                // location.reload();
            });
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $('#formCreateTransaksi').removeClass('overlay overlay-block');
            $("#overlayformCreateActivity").hide();

            Swal.fire({
                html: "Error, Please try again.<br> <strong>",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }
    });
}

function printDiv(id) {
    var divContents = document.getElementById(id).innerHTML;
    var a = window.open('', '', 'height=500, width=500');
    a.document.write('<html>');
    a.document.write('<heade>');
    a.document.write('<link rel="stylesheet" href="'+base_url+'assets/css/shared/style.css">')
    a.document.write('</heade>');
    a.document.write('<body>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}