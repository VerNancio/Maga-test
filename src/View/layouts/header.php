<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<script type="module" src="resources\pages\Header\index.js"></script>

<body>
    <nav class="navbar navbar-light bg-primary">
        <p class="navbar-brand" style="color: white;"><?php echo $title ?></p>
        
        <?php if ($title == "Home") { ?>
            <div class="form-inline">
                <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button id="searchButton" class="btn btn-outline-info bg-light my-2 my-sm-0" type="submit">Search</button>
            </div>
        <?php } ?>
    </nav>
</body>
</html>




