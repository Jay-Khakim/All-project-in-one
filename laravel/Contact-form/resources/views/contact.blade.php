<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Contact us</h1>
        @if (Session::has('flash_message'))

            <div class="alert alert-success">
                {{Session::get('flash_message')}}
            </div>
        @endif
        <form action=" {{route('contact-store')}} " method="post">
            @csrf
            <div class="form-group">
                <label for="">Full name</label>
                <input type="text" class="form-control" name="name" id="">
            </div>

            <div class="form-group">
                <label for="">Email Address</label>
                <input type="text" class="form-control" name="email" id="">
            </div>

            <div class="form-group">
                <label for="">Message</label>
                <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>

            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>