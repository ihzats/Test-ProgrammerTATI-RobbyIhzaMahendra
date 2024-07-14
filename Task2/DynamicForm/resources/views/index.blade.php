<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biodata - Dynamic Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</head>
<body>
    <div class="container d-flex justify-content-center pt-5">
        <div class="col-md-9">
            <h2 class="text-center pb-3">Add Biodata</h2>
            
            <form action="/post" method="POST">
                @csrf
                
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(Session::has('success'))
                <div class="alert alert-success text-center">
                    <p>{{Session::get('success')}}</p>
                </div>
                @endif
                
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            {{-- <th>No</th> --}}
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="inputs[0][name]" placeholder="Enter your Name" class="form-control"></td>
                            <td><input type="number" name="inputs[0][no_hp]" placeholder="Enter No.Telp" class="form-control"></td>
                            <td><input type="text" name="inputs[0][alamat]" placeholder="Enter Address" class="form-control"></td>
                            <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
                        </tr>
                    </tbody>
                </table>
                
                <button type="submit" class="btn btn-primary col-md-2">Save</button>
            </form>

            <div class="text-center pt-3">
                <a href="/biodatas" class="btn btn-warning">View All Biodata</a>
            </div>
        </div>
        </div>
    </div>

    <script>
        var i = 0;
        $('#add').click(function(){
            ++i;
            $('#table tbody').append(`
                <tr>
                    <td><input type="text" name="inputs[`+i+`][name]" placeholder="Enter your Name" class="form-control"></td>
                    <td><input type="number" name="inputs[`+i+`][no_hp]" placeholder="Enter No.Telp" class="form-control"></td>
                    <td><input type="text" name="inputs[`+i+`][alamat]" placeholder="Enter Address" class="form-control"></td>
                    <td><button type="button" class="btn btn-danger remove-table-row">X</button></td>
                </tr>
            `);
        });

        $(document).on('click', '.remove-table-row', function(){
            $(this).parents('tr').remove();
        });
    </script>

</body>
</html>
