<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS Portal With Twilio</title>
    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="jumbotron">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header text-success text-uppercase">
                        <h4>  Add Phone Number</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Enter Phone Number</label>
                                <input type="tel" class="form-control" name="phone_number" placeholder="Enter Phone Number">
                            </div>
                            <button type="submit" class="btn btn-success">Register User</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header text-primary text-uppercase">
                       <h4> Send SMS message</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/custom">
                            @csrf
                            <div class="form-group">
                                <label>Select users to notify</label>
                                <select name="users[]" multiple class="form-control">
                                    @foreach ($users as $user)
                                        <option>{{$user->phone_number}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Write Message</label>
                                <textarea name="body" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <br> <p class="text-center font-weight-bold"> The number <span class="text-danger">{{$user->phone_number}}</span> was added to my database.
                but to be able to recieve message,the number must be registered on twilio profile</p>

    </div>
</div>
</body>
</html>
