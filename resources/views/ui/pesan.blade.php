<hr>
<br><br>
<h1 style="text-align: center" class="display-6">Pesan Kamar</h1>
<br>
<div style="width: 800px" class="card container">
    <form action="{{ route('simpan.data') }}" method="post">
        @csrf
        <div style="padding: 20px">
            <div class="form-group row col-12">
                <label for="name" class="col-sm-4 col-form-label">Nama Pemesan</label>
                <div class="col-8">
                  <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <br>
            <div class="form-group row col-12">
                <label for="kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                <div class="col-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Laki - Laki">
                        <label class="form-check-label" for="male">Laki - Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Perempuan">
                        <label class="form-check-label" for="female">Perempuan</label>
                    </div>
                </div>
            </div>
            
            <br>
            <div class="form-group row col-12">
                <label for="no_iden" class="col-sm-4 col-form-label">Nomor Identitas</label>
                <div class="col-8">
                    <input type="number" class="form-control @error('no_iden') is-invalid @enderror" id="no_iden" name="no_iden">
                    @error('no_iden')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-group row col-12">
                <label for="tipe_kamar" class="col-sm-4 col-form-label">Tipe Kamar</label>
                <div class="col-8">
                    <select class="form-select" aria-label="Default select example" name="tipe_kamar" id="tipe_kamar">
                        <option selected disabled>Pilih jenis kamar</option>
                        <option value="STANDAR">STANDAR</option>
                        <option value="DELUXE">DELUXE</option>
                        <option value="FAMILY">FAMILY</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group row col-12">
                <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="harga" name="harga" readonly>
                </div>
            </div>
            <br>
            <div class="form-group row col-12">
                <label for="date" class="col-sm-4 col-form-label">Tanggal Pesan</label>
                <div class="col-8">
                  <input type="date" class="form-control" id="date" name="date">
                </div>
            </div>
            <br>
            <div class="form-group row col-12">
                <label for="durasi" class="col-sm-4 col-form-label">Durasi Menginap</label>
                <div class="col-6">
                    <input type="number" class="form-control" id="durasi" name="durasi">
                  </div>
                  <div class="col-sm-2">
                    <p>Hari</p>
                  </div>
            </div>
            <br>
            <div class="form-group row col-12">
                <label for="sarapan" class="col-sm-4 col-form-label">Termasuk Breakfast</label>
                <div class="col-8">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="sarapan">
                        <label class="form-check-label" for="flexCheckDefault">
                          Ya
                        </label>
                      </div>
                </div>
            </div>
            <br>
            <div class="form-group row col-12">
                <label for="total" class="col-4 col-form-label">Total Bayar</label>
                <div class="col-8">
                  <input type="text" class="form-control" id="total" name="total" readonly>
                </div>
            </div>
            <br>
            <div class="form-group row col-12 text-center">
                <div class="container">
                    <button type="button" class="btn btn-outline-primary m-2" id="hitungButton" onclick="calculateTotal()">Hitung Total Bayar</button>
                    <button type="submit" class="btn btn-outline-primary m-2">Simpan</button>
                    <button type="button" class="btn btn-outline-primary m-2" onclick="resetForm()">Cancel</button>
                </div>
            </div>
            
        </div>
    </form>
</div>

<br><br><br>

<div style="width: 800px; padding: 20px" class="card container">
    <div class="container">
        <div class="data-row">
            <p class="data-label">Nama Pemesan</p>
            <p class="data-value">: {{ $latestPemesanan->nama_pemesan }}</p>
        </div>
        <div class="data-row">
            <p class="data-label">Nomor Identitas</p>
            <p class="data-value">: {{ $latestPemesanan->nomor_identitas }}</p>
        </div>
        <div class="data-row">
            <p class="data-label">Jenis Kelamin</p>
            <p class="data-value">: {{ $latestPemesanan->jenis_kelamin }}</p>
        </div>
        <div class="data-row">
            <p class="data-label">Tipe Kamar</p>
            <p class="data-value">: {{ $latestPemesanan->tipe_kamar }}</p>
        </div>
        <div class="data-row">
            <p class="data-label">Durasi Penginapan</p>
            <p class="data-value">: {{ $latestPemesanan->durasi_menginap }} Hari</p>
        </div>
        <div class="data-row">
            <p class="data-label">Discount</p>
            <p class="data-value">: {{ $latestPemesanan->durasi_menginap > 3 ? '10%' : '-' }}</p>
        </div>
        <div class="data-row">
            <p class="data-label">Total Bayar</p>
            <p class="data-value">: {{ $latestPemesanan->total_bayar }}</p>
        </div>
    </div>
</div>

<script>
    const hargaKamar = {
        'STANDAR': 500000,  
        'DELUXE': 1000000,
        'FAMILY': 1500000
    };
    const durasiInput = document.getElementById('durasi');
    const sarapanCheckbox = document.getElementById('sarapan');
    const totalInput = document.getElementById('total');
    const tipeKamarSelect = document.getElementById('tipe_kamar');
    const hargaInput = document.getElementById('harga');
    const hitungButton = document.getElementById('hitungButton'); 

    tipeKamarSelect.addEventListener('change', function () {
        const selectedTipeKamar = tipeKamarSelect.value;
        if (hargaKamar[selectedTipeKamar]) {
            hargaInput.value = 'Rp. ' + hargaKamar[selectedTipeKamar];
        } else {
            hargaInput.value = '';
        }
    });

    // Menambahkan event listener untuk tombol Hitung Total Bayar
    hitungButton.addEventListener('click', function () {
        calculateTotal();
    });

    function calculateTotal() {
        const selectedTipeKamar = tipeKamarSelect.value;
        const durasi = parseFloat(durasiInput.value) || 0;
        const sarapan = sarapanCheckbox.checked;
    
        if (hargaKamar[selectedTipeKamar]) {
            const harga = hargaKamar[selectedTipeKamar];
            let total = harga * durasi;
            
            if (sarapan) {
                total += 80000 * durasi;
            }
            
            if (durasi > 3) {
                const diskon = total * 0.1; // Hitung diskon berdasarkan total
                total -= diskon;
            }
            
            totalInput.value = 'Rp. ' + total.toLocaleString();
        } else {
            totalInput.value = '';
        }
    }

    function resetForm() {
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => input.value = '');

        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => checkbox.checked = false);

        tipeKamarSelect.value = 'Pilih jenis kamar';
        totalInput.value = '';
    }

</script>