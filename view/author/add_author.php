<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Author</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../../library/Style/style.css">
</head>

<body>
    <!-- navbar -->
    <?php include_once '../Layout/Navbar.php'; ?>

    <!-- content -->
    <div class="container mt-3">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card" style="width: auto; padding:20px;">
                    <h5 class="card-title">Insert Author Data Here</h5>
                    <form action="../../Model/Query_author.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_author">
                        <div class="form-group">
                            <label> Author Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter author name" >
                        </div>
                        <div class=" form-group">
                            <label> Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter author address" >
                        </div>
                        <div class="form-group">
                            <label> Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" placeholder="Enter author phone number" >
                        </div>
                        <div class=" form-group">
                            <label> About Author</label>
                            <input type="text" class="form-control" name="author_description" placeholder="Enter author description" >
                        </div>
                        <div class="form-group">
                            <label> Picture</label>
                            <input type="file" class="form-control" name="image" placeholder="Enter picture">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block" name="save_author">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>