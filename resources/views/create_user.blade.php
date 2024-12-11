<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        /* Styling untuk seluruh halaman */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container form */
        .form-container {
            background-color: #ffffff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        /* Header form */
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            letter-spacing: 1px;
            font-weight: 500;
        }

        /* Form input styling */
        form label {
            font-size: 14px;
            color: #555;
            margin-bottom: 6px;
            display: block;
        }

        form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        form input[type="text"]:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.2);
            outline: none;
        }

        /* Button styling */
        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Tambahan untuk tampilan yang lebih menarik */
        form input[type="text"]::placeholder {
            color: #aaa;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .form-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Form Pendaftaran</h2>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>

            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm" placeholder="Masukkan NPM Anda" required>

            <label for="kelas">Kelas:</label>
            <input type="text" id="kelas" name="kelas" placeholder="Masukkan kelas Anda" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
