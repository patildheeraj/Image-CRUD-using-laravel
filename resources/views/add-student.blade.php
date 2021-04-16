<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Add Student
                        </div>
                        <div class="card-body">
                            @if (Session::has('student_added'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('student_added')}}
                                </div>
                            @endif
                            <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" class="form-control" type="text" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="file">Choose Image</label>
                                    <input id="file" class="form-control" type="file" name="file" onchange="previewFile(this)">
                                    <img src="#" id="previewimg" alt="ProfileImage" style="max-width: 130px; margin-top:20px;"/>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{route('student.get')}}" class="btn btn-success">Home</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function previewFile(input){
            var file=$("input[type=file]").get(0).files[0];
            if (file)
            {
                var reader = new FileReader();
                reader.onload = function(){
                    $('#previewimg').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>