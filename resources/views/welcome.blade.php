<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Marked in the browser</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        li {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div id="content">{{ $content }}</div>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
        document.getElementById('content').innerHTML = marked.parse(document.getElementById('content').innerHTML);
    </script>
</body>
</html>