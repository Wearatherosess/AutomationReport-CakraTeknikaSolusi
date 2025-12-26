<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pemeriksaan Mesin Produksi</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .container {
            width: 85%;
            margin: 40px auto;
            background: white;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0,0,0,.1);
        }

        h2, h4 {
            text-align: center;
            margin: 0;
        }

        h4 {
            color: #555;
            margin-bottom: 10px;
        }

        hr {
            margin: 20px 0;
        }

        .info p {
            margin: 4px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px;
            font-size: 13px;
        }

        th {
            background: #eee;
            text-align: center;
        }

        td select, td input {
            width: 100%;
            padding: 4px;
            font-size: 13px;
        }

        .btn {
            padding: 10px 18px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-add {
            background: #2ecc71;
            color: white;
        }

        .btn-submit {
            background: #2c3e50;
            color: white;
            float: right;
        }

        .footer-btn {
            margin-top: 20px;
            overflow: hidden;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>FORM PEMERIKSAAN & PENGUJIAN</h2>
    <h4>PESAWAT TENAGA PRODUKSI – MESIN PRODUKSI</h4>

    <hr>

    <div class="info">
        <p><b>Nama Perusahaan</b> : {{ $laporan->nama_perusahaan }}</p>
        <p><b>Lokasi</b> : {{ $laporan->lokasi }}</p>
        <p><b>Tanggal Pemeriksaan</b> :
            {{ \Carbon\Carbon::parse($laporan->tanggal_pemeriksaan)->format('d F Y') }}
        </p>
    </div>

    <hr>

    <form method="POST"
          action="{{ url('/laporan/id/'.$laporan->id.'/pemeriksaan/store') }}">
        @csrf

        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="45%">Item Pemeriksaan</th>
                    <th width="15%">Hasil</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody id="checklist">
                <tr>
                    <td align="center">1</td>
                    <td>
                        <input type="text"
                               name="item_pemeriksaan[]"
                               required
                               placeholder="Contoh: Kondisi rangka mesin">
                    </td>
                    <td>
                        <select name="hasil[]">
                            <option value="baik">BAIK</option>
                            <option value="tidak baik">TIDAK BAIK</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="keterangan[]" placeholder="Opsional">
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="footer-btn">
            <button type="button" class="btn btn-add" onclick="addRow()">+ Tambah Item</button>
            <button type="submit" class="btn btn-submit">Simpan Pemeriksaan</button>
        </div>
    </form>

</div>

<script>
    let no = 1;

    function addRow() {
        no++;
        document.getElementById('checklist').insertAdjacentHTML('beforeend', `
        <tr>
            <td align="center">${no}</td>
            <td><input type="text" name="item_pemeriksaan[]" placeholder="Item pemeriksaan"></td>
            <td>
                <select name="hasil[]">
                    <option value="baik">BAIK</option>
                    <option value="tidak baik">TIDAK BAIK</option>
                </select>
            </td>
            <td><input type="text" name="keterangan[]" placeholder="Opsional"></td>
        </tr>`);
    }
</script>

</body>
</html>
