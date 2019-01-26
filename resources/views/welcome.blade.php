@extends('layouts.app')
@section('content')
    <img src="{{asset('nominee_img/'.$id)}}">
    {{--<div class="container grey-text text-darken-2">
        <div class="row">
            <div class="col-md-12 s12 m12 l10">
                <div class="section scrollspy" id="feedback-step">
                    <div class="row">
                        <div class="text-center col-md-12">
                            <h5 style="font-size: 20px; font-weight: 100">Nomination Form</h5>
                            <img src="{{asset('img/itsu.jpeg')}}" class="img-fluid responsive-img text-center" height="auto" width="80">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l12 m12 s12">
                            <div class="card">
                                <div class="card-content">
                                    <form>
                                        <ul class="stepper horizontal" id="feedbacker">
                                            <li class="step active">
                                                <div data-step-label="There's labels too!" class="step-title waves-effect waves-dark">Step 1</div>
                                                <div class="step-content">
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input name="email" type="email" class="validate" required>
                                                            <label for="email">Your e-mail</label>
                                                        </div>
                                                    </div>
                                                    <div class="step-actions float-right">
                                                        <button class="waves-effect waves-dark btn blue next-step" data-feedback="someFunction">Next</button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="step">
                                                <div class="step-title waves-effect waves-dark">Step 2</div>
                                                <div class="step-content">
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id name="password" type="password" class="validate" required>
                                                            <label for="password">Your password</label>
                                                        </div>
                                                    </div>
                                                    <div class="step-actions">
                                                        <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
                                                        <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="step">
                                                <div class="step-title waves-effect waves-dark">Step 3</div>
                                                <div class="step-content">
                                                    Finish!
                                                    <div class="step-actions">
                                                        <button class="waves-effect waves-dark btn blue" type="submit">SUBMIT</button>
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
    </div>--}}
@endsection