<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="main-container">
        @include('header')
        <main class="main">
            <div class="card">
                <h1 class="textContainer">Companies</h1>
                <a href="/create-companies" class="btn-addNew">Add New Company</a>
                <br>
                <div class="container">
                    <table  class="searchFilter">
                        <tr>
                            <td><b>Search By Name</b></td>
                            <td>:</td>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search by company name.." title="Type in a name">
                                </div>
                            </td>
                        </tr>
                    </table> 
                </div>
                <div class="container">
                    <table class="table" id="list-company">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th colspan='2'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->company_name }}</td>
                                <td>{{ $company->company_email }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $company->company_logo) }}" width="150" height="200" class="img img-responsive" alt="Company Logo"/>
                                </td>
                                <td>{{ $company->company_website }}</td>
                                <td class="text-center"><a href="/edit-companies/{{$company->id}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"> Edit</i></a></td>                                
                                <td class="text-center">
                                    <form action="/delete-companies/{{$company->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"> Delete</i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-container" style="display: flex; justify-content: flex-end;">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>            
        </main>
    </div>
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("list-company");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
        }
    </script>
</body>
</html>