<?php

class KompakCipta {
    private $jumlahPerulangan;
    private $countKompakCipta = 0;

    public function __construct($jumlahPerulangan) {
        $this->jumlahPerulangan = $jumlahPerulangan;
    }

    public function cetakKompakCipta() {
        for ($i = 1; $i <= $this->jumlahPerulangan; $i++) {
            if ($this->countKompakCipta >= 5) {
                break;
            }

            if ($i % 3 == 0 && $i % 5 == 0) {
                echo "<span class='kompak-cipta'>Kompak Cipta</span><br>";
                $this->countKompakCipta++;
            } elseif ($i % 3 == 0) {
                if ($this->countKompakCipta >= 2) {
                    echo "<span class='cipta'>Cipta</span><br>";
                } else {
                    echo "<span class='kompak'>Kompak</span><br>";
                }
            } elseif ($i % 5 == 0) {
                if ($this->countKompakCipta >= 2) {
                    echo "<span class='kompak'>Kompak</span><br>";
                } else {
                    echo "<span class='cipta'>Cipta</span><br>";
                }
            } else {
                echo "$i<br>";
            }
        }
    }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kompak Cipta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            width: 100%;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, button {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: left;
        }
        .kompak {
            color: blue;
        }
        .cipta {
            color: green;
        }
        .kompak-cipta {
            color: red;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <label for="jumlahPerulangan">Masukkan jumlah perulangan:</label>
        <input type="number" id="jumlahPerulangan" name="jumlahPerulangan" required>
        <button type="submit">Submit</button>
    </form>
    <div class="result">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['jumlahPerulangan'])) {
            $jumlahPerulangan = intval($_POST['jumlahPerulangan']);
            $kompakCipta = new KompakCipta($jumlahPerulangan);
            $kompakCipta->cetakKompakCipta();
        }
        ?>
    </div>
</body>
</html>
