@extends('layouts.app')

@section('content')
    @foreach($loggedInUser as $logged)

    @endforeach

    @foreach($nominee_info as $nominee)

    @endforeach
    <div class="container grey-text text-darken-2">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="section scrollspy" id="feedback-step">
                    <div class="row">
                        <div class="text-center col-md-12">
                            <h5 style="font-size: 20px; font-weight: 100">Nomination Form</h5>
                            <img src="{{asset('img/itsu.jpeg')}}" class="img-fluid responsive-img text-center" height="auto" width="80">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-4">
                            <div class="row">
                                <div class="col-md-4  text-right">
                                    <h5>{{$logged->voting->name}}</h5>
                                </div>
                                <div class="col-md-4 text-right">
                                    <h5 class="float-right">{{$logged->department->name}}</h5>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="{{route('home.show',$nominee->id)}}" class="btn bnt-sm btn-success">
                                        <i class="ti ti-printer"> </i>Print
                                    </a>
                                    <a class="btn btn-dark btn-sm m-0 float-right"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="ti ti-power-off"> </i>Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <form action="{{route('home.store')}}" method="post">
                                        @csrf
                                        <ul class="stepper horizontal" id="feedbacker">
                                            <li class="step active">
                                                <div data-step-label="Upload Profile Photo" class="step-title waves-effect waves-dark">
                                                    Profile Photo
                                                </div>
                                                <div class="step-content">
                                                    <div class="picture-container">
                                                        <div class="picture">
                                                            <img src="{{asset('img/nominee_img/'.$nominee->image)}}" class="picture-src" id="wizardPicturePreview" title="" />
                                                            {{--<input type="file" class="validate" name="image_file"   id="wizard-picture">--}}
                                                        </div>
                                                        <h6>Choose Picture</h6>

                                                        <small class="text-danger">
                                                            Dimension - 640 x 640 pixels<br>
                                                            Max Size - 2MB
                                                        </small>
                                                    </div>
                                                    <div class="step-actions float-right">
                                                        <button class="waves-effect waves-dark btn blue next-step" data-feedback="someFunction">Next</button>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="step">
                                                <div data-step-label="Tell us about you" class="step-title waves-effect waves-dark">
                                                    Personal Info.
                                                </div>
                                                <div class="step-content">

                                                    <div class="row input-field">
                                                        <div class=" col-md-5 offset-md-1">
                                                            <input id="first_name" disabled name="first_name" class="validate" value="{{$nominee->first_name }}" type="text"  required>
                                                            <label for="first_name">First Name</label>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="last_name">Last Name</label>
                                                            <input id="last_name" disabled name="last_name" class="validate" value="{{$nominee->last_name }}"  type="text" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row input-field">
                                                        <div class="col-md-5 offset-md-1">
                                                            <label for="other_name">Other Name</label>
                                                            <input id="other_name" disabled name="other_name" value="{{$nominee->other_name }}" type="text" class="validate" >
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="dateOfBirth">Date of Birth</label><br>
                                                            <input name="dateOfBirth" disabled id="dateOfBirth" value="{{$nominee->date_of_birth }}" required type="date" class="validate">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-5 offset-md-1">
                                                            <label for="dep">Department</label>
                                                            <input id="dep" type="text" disabled value="{{$logged->department->name}}" class="form-control">
                                                        </div>

                                                        <div class="col-md-5">
                                                            <label for="voting">Voting <small>(required)</small></label>
                                                            <input id="voting" type="text"  disabled value="{{$logged->voting->name}}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="step-actions float-right">
                                                        <button class="waves-effect waves-dark btn blue next-step">Next</button>
                                                        <button class="waves-effect waves-dark btn-flat previous-step">Previous</button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="step">
                                                <div class="step-title waves-effect waves-dark">
                                                    Contact Details
                                                </div>
                                                <div class="step-content">

                                                    <div class="row ">
                                                        <div class="input-field col-md-5 offset-md-1">
                                                            <label for="home_town">Home Town</label>
                                                            <input id="home_town" disabled type="text" value="{{$nominee->home_town }}" name="home_town" required class="validate">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="region">Region</label>
                                                            <select name="region" disabled class="form-control" required id="region">
                                                                <option value=""> {{$nominee->region }} </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row input-field">
                                                        <div class="col-md-5 offset-md-1">
                                                            <label for="home_address">Home Address</label>
                                                            <input id="home_address" disabled type="text" value="{{ $nominee->home_address}}" name="home_address" class="validate" required>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label id="phone-mask">Phone Number</label>
                                                            <input type="tel" disabled value="{{$nominee->telephone}}" name="telephone" class="validate phone-inputmask" required id="phone-mask" >
                                                        </div>
                                                    </div>
                                                    <div class="row input-field">
                                                        <div class="col-md-10 offset-md-1">
                                                            <label for="email">Email</label>
                                                            <input type="email" disabled id="email" value="{{ $nominee->email }}" name="email" class="validate" required>
                                                        </div>
                                                    </div>
                                                    <div class="step-actions">
                                                        <button class="waves-effect waves-dark btn blue next-step">Next</button>
                                                        <button class="waves-effect waves-dark btn-flat previous-step">Previous</button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="step">
                                                <div class="step-title waves-effect waves-dark">
                                                    Academics
                                                </div>
                                                <div class="step-content">
                                                    <div class="row ">
                                                        <div class="col-md-3 offset-md-1">
                                                            <label for="levels">Level</label><br>
                                                            <select id="levels" disabled name="levels" required class="form-control">
                                                                <option  value="{{$nominee->level->name}}">{{$nominee->level->name}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3 input-field">
                                                            <div class="form-group">
                                                                <label for="index_number">Index Number</label>
                                                                <input type="text"  id="index_number" name="index_number" disabled value="{{Auth::User()->name}}" required class="validate">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="cgpa">CGPA</label>
                                                                <input type="text" disabled value="{{ $nominee->cgpa }}" id="cgpa" class="validate cgpa"  name="cgpa" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5 offset-md-1">
                                                            <label for="position">Position</label><br>
                                                            <select  name="position" disabled required id="position" class="form-control">
                                                                <option value="{{$nominee->position->name}}">{{$nominee->position->name}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5 input-field">
                                                            <div class="form-group">
                                                                <label for="previous_position">Previous Position Held</label>
                                                                <input id="previous_position" type="text" class="form-control" value="{{$nominee->previous_position }}" name="previous_position">
                                                                {{--<small class="text-danger">Leave it blank if you don't have!</small>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="step-actions">
                                                        {{--<button class="waves-effect waves-dark btn blue" type="submit">Finish</button>--}}
                                                        <button class="waves-effect waves-dark btn-flat previous-step">Previous</button>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
