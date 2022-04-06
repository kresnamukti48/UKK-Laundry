<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead style="bgcolor:#4e73df">
                    <tr style="color: rgb(0, 0, 0)">
                        <th scope="col">No</th>
                        <th scope="col">No Transaksi</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_bayar = 0;
                    ?>
                    @foreach ($details as $detail)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $detail->transaksi->id }}</td>
                            <td>{{ $detail->paket->jenis }}</td>
                            <td>Rp. {{ $detail->paket->harga }}</td>
                            <td>{{ $detail->qty }}</td>
                            <td>Rp. {{ number_format($detail->total, 0, '.', '.') }}</td>
                        </tr>
                        <?php
                        $total_bayar += $detail->total;
                        ?>
                    @endforeach
                </tbody>
                <tr>
                    <th colspan="5">Total bayar</th>
                    <th colspan="2">Rp. {{ number_format($total_bayar, 0, '.', '.') }}</th>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
