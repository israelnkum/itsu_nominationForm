@extends('layouts.app')
@section('content')
    @foreach($loggedInUser as $logged)

    @endforeach
    <div class="container grey-text text-darken-2 mb-0">
        <div class="row">
            <div class="col-md-10 offset-md-1 mb-0">
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
                            @include('layouts.messages')
                            <div class="card">
                                <div class="card-content">
                                    <form action="{{route('home.store')}}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <ul class="stepper horizontal" id="feedbacker">
                                            <li class="step active">
                                                <div data-step-label="Upload Profile Photo" class="step-title waves-effect waves-dark">
                                                    Profile Photo
                                                </div>
                                                <div class="step-content">
                                                    <div class="picture-container">
                                                        <div class="picture">
                                                            <img src="{{asset('img/profiledefault.png')}}" class="picture-src" id="wizardPicturePreview" title="" />
                                                            <input type="file" class="validate" name="image_file" required  id="wizard-picture">
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
                                                            <input id="first_name" name="first_name" class="validate" value="{{ old('first_name') }}" type="text"  required>
                                                            <label for="first_name">First Name</label>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="last_name">Last Name</label>
                                                            <input id="last_name" name="last_name" class="validate" value="{{ old('last_name') }}"  type="text" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row input-field">
                                                        <div class="col-md-5 offset-md-1">
                                                            <label for="other_name">Other Name</label>
                                                            <input id="other_name" name="other_name" value="{{ old('other_name') }}" type="text" class="validate" >
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="dateOfBirth">Date of Birth</label><br>
                                                            <input name="dateOfBirth" id="dateOfBirth" value="{{ old('dateOfBirth') }}" required type="date" class="validate">
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
                                                            <input id="home_town" type="text" value="{{ old('home_town') }}" name="home_town" required class="validate">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="region">Region</label>
                                                            <select name="region" class="form-control" required id="region">
                                                                <option value=""> Select </option>
                                                                <option value="Greater Accra">Greater Accra</option>
                                                                <option value="Central">Central</option>
                                                                <option value="Eastern">Eastern</option>
                                                                <option value="Ashanti">Ashanti</option>
                                                                <option value="Northern">Northern</option>
                                                                <option value="Upper West">Upper West</option>
                                                                <option value="Upper East">Upper East</option>
                                                                <option value="Western">Western</option>
                                                                <option value="Volta">Volta</option>
                                                                <option value="Brong Ahafo">Brong Ahafo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row input-field">
                                                        <div class="col-md-5 offset-md-1">
                                                            <label for="home_address">Home Address</label>
                                                            <input id="home_address" type="text" value="{{ old('home_address') }}" name="home_address" class="validate" required>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label id="phone-mask">Phone Number</label>
                                                            <input type="tel" value="{{ old('telephone') }}" name="telephone" class="validate phone-inputmask" required id="phone-mask" >
                                                        </div>
                                                    </div>
                                                    <div class="row input-field">
                                                        <div class="col-md-10 offset-md-1">
                                                            <label for="email">Email</label>
                                                            <input type="email" id="email" value="{{ old('email') }}" name="email" class="validate" required>
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
                                                            <select id="levels" name="levels" required class="form-control">
                                                                <option value=""> Select </option>
                                                                @foreach($levels as $level)
                                                                    <option value="{{$level->id}}">{{$level->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3 input-field">
                                                            <div class="form-group">
                                                                <label for="index_number">Index Number</label><br>
                                                                <input type="text" id="index_number" name="index_number" disabled value="{{Auth::User()->name}}" required class="validate">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="cgpa">CGPA</label>
                                                                <input type="text" value="{{ old('cgpa') }}" id="cgpa" class="validate cgpa"  name="cgpa" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5 offset-md-1">
                                                            <label for="position">Position</label><br>
                                                            <select  name="position" required id="position" class="form-control">
                                                                <option value=""> Select </option>
                                                                @foreach($positions as $position)
                                                                    <option value="{{$position->id.' '.$position->position_number}}">{{$position->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5 input-field">
                                                            <div class="form-group">
                                                                <label for="previous_position">Previous Position Held</label>
                                                                <input id="previous_position" type="text" class="form-control" value="{{ old('previous_position') }}" name="previous_position">
                                                                <small class="text-danger">Leave it blank if you don't have!</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="step-actions">
                                                        <button class="waves-effect waves-dark btn blue" type="submit">Finish</button>
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