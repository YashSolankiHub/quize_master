<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warning Exam </title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/home_page.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .ctr {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="modal fade" id="myModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center" >
                    <h3 class="modal-title" id="exampleModalLabel" style="text-align: center;color:red;">Warning!</h3>
                </div>
                <div class="modal-body">
                   <p>Your exam has been closed because you did not submit it within the given time.</p>
                   <p>Better luck next time</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                        <a class="btn btn-secondary" href="home_page1.php">Home page</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
     var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
    myModal.show()

</script>
</html>