<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Home</a>
                    <a class="nav-link" href="{{ route('create.user') }}">Add user</a>

                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                        <i class="icon_key_alt"></i>Logout   
                     </a>
                     <form id="logout" action="{{ route('logout') }}" method="POST">
                       @csrf
                     </form>

                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($dashboard_usuarios as $usuario)

                    <tr>
                        <th scope="row">{{ $usuario->id }}</th>
                        <td>{{ $usuario->firstname }}</td>
                        <td>{{ $usuario->lastname }}</td>
                        <td>{{ $usuario->nickname }}</td>
                        <td>
                            <a href="javascript:document.getElementById('delete-{{$usuario->id}}').submit() ">Delete</a>
                            <form id="delete-{{ $usuario->id }}" action="{{ route('delete.user', $usuario->id) }}" method="post">
                              @method('delete')
                              @csrf
                            </form>

                            <a href="{{ route('edit.user',$usuario->id) }}">Edit</a>

                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
