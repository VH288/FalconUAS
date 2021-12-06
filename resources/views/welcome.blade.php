<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <title>Falcon</title>
    <style>
        :root {
            --primary-color: white;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            --webkit-font-smootin: antialiased;
        }

        h1,
        h2,
        h3 {
            color: white;
        }

        a {
            color: white;
            text-decoration: none;
        }

        img {
            width: 100%;
        }

        .showcase {
            width: 100%;
            height: 100vh;
            position: relative;
            background: rgb(11, 11, 117) no-repeat center center/cover;
        }

        .showcase-top {
            position: relative;
            z-index: 2;
            height: 90px;
        }

        .showcase-top img {
            width: 245px;
            position: absolute;
            margin-left: 3.5rem;
            margin-top: 2rem;
        }

        .showcase-top a {
            position: absolute;
            top: 75%;
            right: 0;
            transform: translate(-50%, -50%);
            font-size: 1.2rem;
        }

        .showcase-content {
            position: relative;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: 15rem;
            z-index: 2;
        }

        .showcase-content h1 {
            font-weight: 700;
            font-size: 2.5rem;
            margin: 0 0 1rem;
        }

        .showcase-content h2 {
            font-weight: 500;
            font-size: 1.5rem;
            margin: 0 0 1rem;
        }

        .showcase-content h3 {
            font-weight: 200;
            font-size: 1rem;
            margin: 0 0 1rem;
        }


        /* Button */

        .btn {
            display: inline-block;
            background: var(--primary-color);
            color: rgb(11, 11, 117);
            padding: 0.6rem 1.3rem;
            font-size: 1rem;
            text-align: center;
            border: none;
            cursor: pointer;
            margin-right: 0.5rem;
            outline: none;
            box-shadow: 0 1px rgb(0, 0, 0, 0.45);
            border-radius: 2px;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .btn-rounded {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header class="showcase">
            <div class="showcase-top">
                <img src="https://cdn.discordapp.com/attachments/841580989113434135/899247180978728990/unknown.png" alt="FALCON">
                <a href="{{ url('login') }}" class="btn btn-rounded">Masuk</a>
            </div>
            <div class="showcase-content">
                <h1>Social Media Make Your Day Full of Happiness</h1>
                <h2>Posting Karyamu dan Biarkan Orang Lain Melihat</h2>
                <h3>Are You Ready? Daftarkan dirimu segera dan jangan biarkan temanmu mendahului kamu</h3>
            </div>
    </header>
</body>
</html>