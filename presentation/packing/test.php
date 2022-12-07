<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>



    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col">Quantity</th>
                <th scope="col">Size</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <th scope="row">1</th>
                <td>Title 1</td>
                <td>521</td>
                <td>1</td>
                <td style="width: 25%;hieght:50%"><img
                        src="https://cdn.pixabay.com/photo/2015/04/19/08/32/marguerite-729510__340.jpg" style="
    hight: 25px;
    height: 52px;
"></td>
                <td class="mt-5">
                    <button type="button" class="btn btn-sm editbtn btn-primary" data-toggle="modal"
                        data-target="">Update</button>
                </td>
            </tr>

        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-lg-left" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="AddProductControl" enctype="multipart/form-data" method="POST" class="mb-5">
                        <div class="row g-5 align-items-center">
                            <div class="col-auto">
                                <label for="title" class="col-form-label">Title</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="title" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mt-2 mb-4">
                            <div class="col-auto">
                                <label for="quantity" class="col-form-label">Quantity</label>
                            </div>
                            <div class="col-auto ms-1">
                                <input type="number" name="quantity" id="quantity" class="form-control">
                            </div>
                        </div>
                        <div class="row g-5 align-items-center">
                            <div class="col-auto">
                                <label for="size" class="col-form-label">Size</label>
                            </div>
                            <div class="col-auto ms-1">
                                <input type="number" name="size" id="size" class="form-control">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mt-0">
                            <div class="col-auto">
                                <label for="image" class="col-form-label">Image</label>
                            </div>
                            <div class="col-auto ms-3">

                                <input type="file" id="image" name="image" class="form-control">
                                <img src="img_girl.jpg" id="SetImage" alt="Your retrived image is here" width="100"
                                    height="100">
                            </div>
                        </div>
                        <div class="position-absolute m-3 bottom start-15 border">
                            <input class="bg-info" type="submit" value="Add"> <input type="hidden" name="username"
                                value="<%=currentUser%>" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('.editbtn').on('click', function() {

            $('#editmodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            var Imagedata = [];
            Imagedata.push($tr.find('img').attr('src'))


            $('#SetImage').attr("src", Imagedata[0]);
            $('#title').val(data[0]);
            $('#quantity').val(data[1]);
            $('#size').val(data[2]);

        });
    });
    </script>
</body>


</html>