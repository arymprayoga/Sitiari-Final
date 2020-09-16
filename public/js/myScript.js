$('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var name = button.data('name')
    var email = button.data('email')
    var modal = $(this)

    modal.find('#nameEdit').val(name)
    modal.find('#emailEdit').val(email)
    modal.find('#idEdit').val(id)
})

$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#detailModalMajikan').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var name = button.data('name')
    var email = button.data('email')
    var status = button.data('status')
    var noKTP = button.data('noktp')
    var tel = button.data('tel')
    var alamat = button.data('alamat')
    var tanggalMasuk = button.data('tanggalmasuk')
    var fotoDiri = button.data('fotodiri')
    var fotoKTP = button.data('fotoktp')
    var modal = $(this)

    modal.find('#nameDetail').val(name)
    modal.find('#emailDetail').val(email)
    modal.find('#idDetail').val(id)
    modal.find('#statusDetail').val(status)
    modal.find('#noKTPDetail').val(noKTP)
    modal.find('#telDetail').val(tel)
    modal.find('#alamatDetail').val(alamat)
    modal.find('#tanggalMasukDetail').val(tanggalMasuk)
    modal.find('#fotoDiriDetail').attr("src", "storage/img/profile/"+fotoDiri)
    modal.find('#fotoKTPDetail').attr("src", "storage/img/profile/"+fotoKTP)
})

$('#editModalMajikan').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var name = button.data('name')
    var email = button.data('email')
    var status = button.data('status')
    var noKTP = button.data('noktp')
    var tel = button.data('tel')
    var alamat = button.data('alamat')
    var tanggalMasuk = button.data('tanggalmasuk')
    var modal = $(this)

    modal.find('#nameEdit').val(name)
    modal.find('#emailEdit').val(email)
    modal.find('#idEdit').val(id)
    modal.find('#statusEdit').val(status)
    modal.find('#noKTPEdit').val(noKTP)
    modal.find('#telEdit').val(tel)
    modal.find('#alamatEdit').val(alamat)
    modal.find('#tanggalMasukEdit').val(tanggalMasuk)
})

$('#deleteModalMajikan').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#detailModalPekerja').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var name = button.data('name')
    var email = button.data('email')
    var status = button.data('status')
    var jenisPekerjaan = button.data('jenispekerjaan')
    var gaji = button.data('gaji')
    var noKTP = button.data('noktp')
    var ttl = button.data('ttl')
    var tel = button.data('tel')
    var alamat = button.data('alamat')
    var keahlian = button.data('keahlian')
    var agama = button.data('agama')
    var rating = button.data('rating')
    var tanggalMasuk = button.data('tanggalmasuk')
    var fotoDiri = button.data('fotodiri')
    var fotoKTP = button.data('fotoktp')
    var modal = $(this)

    modal.find('#nameDetail').val(name)
    modal.find('#emailDetail').val(email)
    modal.find('#idDetail').val(id)
    modal.find('#statusDetail').val(status)
    modal.find('#jenisPekerjaanDetail').val(jenisPekerjaan)
    modal.find('#gajiDetail').val(gaji)
    modal.find('#noKTPDetail').val(noKTP)
    modal.find('#telDetail').val(tel)
    modal.find('#ttlDetail').val(ttl)
    modal.find('#alamatDetail').val(alamat)
    modal.find('#keahlianDetail').val(keahlian)
    modal.find('#agamaDetail').val(agama)
    modal.find('#ratingDetail').val(rating)
    modal.find('#tanggalMasukDetail').val(tanggalMasuk)
    modal.find('#fotoDiriDetail').attr("src", "storage/img/profile/"+fotoDiri)
    modal.find('#fotoKTPDetail').attr("src", "storage/img/profile/"+fotoKTP)
})

$('#editModalPekerja').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name')
    var email = button.data('email')
    var status = button.data('status')
    var jenisPekerjaan = button.data('jenispekerjaan')
    var gaji = button.data('gaji')
    var noKTP = button.data('noktp')
    var ttl = button.data('ttl')
    var tel = button.data('tel')
    var alamat = button.data('alamat')
    var keahlian = button.data('keahlian')
    var agama = button.data('agama')
    var rating = button.data('rating')
    var id = button.data('id')
    var modal = $(this)

    modal.find('#idEdit').val(id)
    modal.find('#nameEdit').val(name)
    modal.find('#emailEdit').val(email)
    modal.find('#statusEdit').val(status)
    modal.find('#jenisPekerjaanEdit').val(jenisPekerjaan)
    modal.find('#gajiEdit').val(gaji)
    modal.find('#nomorKTPEdit').val(noKTP)
    modal.find('#telEdit').val(tel)
    modal.find('#ttlEdit').val(ttl)
    modal.find('#alamatEdit').val(alamat)
    modal.find('#keahlianEdit').val(keahlian)
    modal.find('#agamaEdit').val(agama)
    modal.find('#ratingEdit').val(rating)
})

$('#deleteModalPekerja').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#detailModalPendaftar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var name = button.data('name')
    var email = button.data('email')
    var status = button.data('status')
    var jenisPekerjaan = button.data('jenispekerjaan')
    var gaji = button.data('gaji')
    var noKTP = button.data('noktp')
    var ttl = button.data('ttl')
    var tel = button.data('tel')
    var alamat = button.data('alamat')
    var keahlian = button.data('keahlian')
    var agama = button.data('agama')
    var rating = button.data('rating')
    var tanggalMasuk = button.data('tanggalmasuk')
    var fotoDiri = button.data('fotodiri')
    var fotoKTP = button.data('fotoktp')
    var modal = $(this)

    modal.find('#nameDetail').val(name)
    modal.find('#emailDetail').val(email)
    modal.find('#idDetail').val(id)
    modal.find('#statusDetail').val(status)
    modal.find('#jenisPekerjaanDetail').val(jenisPekerjaan)
    modal.find('#gajiDetail').val(gaji)
    modal.find('#noKTPDetail').val(noKTP)
    modal.find('#telDetail').val(tel)
    modal.find('#ttlDetail').val(ttl)
    modal.find('#alamatDetail').val(alamat)
    modal.find('#keahlianDetail').val(keahlian)
    modal.find('#agamaDetail').val(agama)
    modal.find('#ratingDetail').val(rating)
    modal.find('#tanggalMasukDetail').val(tanggalMasuk)
    modal.find('#fotoDiriDetail').attr("src", "storage/img/profile/"+fotoDiri)
    modal.find('#fotoKTPDetail').attr("src", "storage/img/profile/"+fotoKTP)
})

$('#deleteModalGaji').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#ratingPekerjaModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var pekerja_id = button.data('id-pekerja')
    var modal = $(this)
    modal.find('#idDelete').val(id)
    modal.find('#idPekerja').val(pekerja_id)
})

$('#claimGaransiModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#tolakGaransiModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#terimaGaransiModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#terimaModalResign').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#deleteModalResign').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#terimaModalDaftar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#deleteModalDaftar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#blacklistModalPekerja').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#blacklistModalMajikan').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})


