

@extends('Front.layouts.master')

@section('content')
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('{{asset('frontend/assets/img/contact-bg.jpg')}}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Contact Me</h1>
                            <span class="subheading">Have questions? I have answers.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                        <div class="my-5">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            <form id="contactForm" method="POST"action="{{route('contactSubmit')}}">
                                @csrf
                                <div class="form-floating">
                                    <input class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" name="name" type="text" placeholder="Enter your name..."  />
                                    <label for="name">Name</label>
                                    <div class="invalid-feedback"></div>
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <input class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}" name="email" type="email" placeholder="Enter your email..."  />
                                    <label for="email">Email address</label>
                                    <div class="invalid-feedback" ></div>
                                    <div class="invalid-feedback" ></div>
                                    @error('email')
                                        <small class="invalid-feedback">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <input class="form-control @error('phone') is-invalid @enderror " id="phone" value="{{old('phone')}}" name="phone" type="tel" placeholder="Enter your phone number..."  />
                                    <label for="phone">Phone Number</label>
                                    <div class="invalid-feedback" ></div>
                                    @error('phone')
                                        <small class="invalid-feedback">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" value="{{old('message')}}" name="message" placeholder="Enter your message here..." style="height: 12rem" ></textarea>
                                    <label for="message">Message</label>
                                    <div class="invalid-feedback" ></div>
                                    @error('message')
                                        <small class="invalid-feedback">{{$message}}</small>
                                    @enderror
                                </div>
                                <br />
                                <button class="btn btn-primary text-uppercase " id="submitButton" type="submit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>


@stop
