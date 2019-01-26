<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Printing -Nomination Form</title>

    <!-- Search Engine -->
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="Nomination Form Print-Out - ITSU Voting System">
    <meta itemprop="description" content="Nomination Form Print-Out">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href="https://fonts.googleapis.com/css?family=Cabin|Roboto+Condensed:700" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
@foreach($loggedInUser as $logged)

    @endforeach

@foreach($nominee_info as $nominee)

@endforeach
<div class="container mt-5">
   <div>
       <img class="img-responsive mt-5 img-fluid" src="{{asset('img/header.jpg')}}">
   </div>
    <div class="text-center mt-4">
        <h3 class="text-uppercase display-5">Nomination Form</h3>
        <hr class="mt-0">
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-1">
            <h5 class="text-uppercase">Personal Information</h5>
            <hr class="mt-0">
            <div class="row">
                <div class="col-md-6">
                    <h5> <b>Name :</b></h5>
                    <h5><b>Date of Birth:</b></h5>

                    <h5> <b>Department :</b></h5>
                    <h5><b>Voting :</b> </h5>
                </div>

                <div class="col-md-6">
                    <h5> {{$nominee->last_name." ".$nominee->first_name." ".$nominee->other_name}}</h5>
                    <h5> {{$nominee->date_of_birth}}</h5>
                    <h5> {{$logged->department->name}}</h5>
                    <h5> {{$logged->voting->name}}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 offset-md-1">
            <img class="img-fluid img-responsive" height="200" width="200" src="{{asset('img/nominee_img/'.$nominee->image)}}">
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-6 offset-md-1">
            <h5 class="text-uppercase">Contact Details</h5>
            <hr class="mt-0">

            <div class="row">
                <div class="col-md-6">
                    <h5> <b>Home Town :</b></h5>
                    <h5><b>Region:</b></h5>

                    <h5> <b>House Address :</b></h5>
                    <h5><b>Phone Number :</b> </h5>
                    <h5><b>Email Address :</b> </h5>
                </div>

                <div class="col-md-6">
                    <h5> {{$nominee->home_town}}</h5>
                    <h5> {{$nominee->region}}</h5>
                    <h5>{{$nominee->home_address}}</h5>
                    <h5> {{$nominee->telephone}}</h5>
                    <h5> {{$nominee->email}}</h5>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-6 offset-md-1">
            <h5 class="text-uppercase">Academic Information</h5>
            <hr class="mt-0">

            <div class="row">
                <div class="col-md-6">
                    <h5> <b>Level :</b></h5>
                    <h5><b>Index Number:</b></h5>

                    <h5> <b>CGPA :</b></h5>
                </div>

                <div class="col-md-6">
                    <h5> {{$nominee->level->name}}</h5>
                    <h5> {{$nominee->index_number}}</h5>
                    <h5> {{$nominee->cgpa}}</h5>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 offset-md-1">
            <h5 class="text-uppercase">Position</h5>
            <hr class="mt-0">

            <div class="row">
                <div class="col-md-6">
                    <h5> <b>Position Vying for :</b></h5>
                    <h5><b>Previous Position Held</b></h5>
                </div>

                <div class="col-md-6">
                    <h5> {{$nominee->position->name}}</h5>
                    <h5> {{$nominee->position_held}}</h5>
                </div>
            </div>
        </div>
    </div>

    <div>
        <img class="img-responsive mt-5 img-fluid" src="{{asset('img/footer1.jpg')}}">
    </div>
</div>

<script>
    window.onload = function() {
        window.print();
        window.close();

        document.location.href="/home";
    }
</script>


<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
