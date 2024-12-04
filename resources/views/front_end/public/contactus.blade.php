@extends('front_end.layouts.layout')


@section('content')

<div class="contactus">
    <div class="container">
        <h1 class="title">Contact Us</h1>
    </div>

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41304.17107438235!2d90.37940372132424!3d23.789870699332543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79dade9290f%3A0xc5766572a1eba557!2sAssort%20Housing%20%26%20Engineering%20Limited!5e0!3m2!1sen!2sbd!4v1598248812365!5m2!1sen!2sbd"
        style="width:100%; height:450px; border: none;" aria-hidden="false" tabindex="0"></iframe>


    <div class="contact_get">
        <div class="container">
            <div class="get_in_touch">
                <h2>GET IN TOUCH WITH US</h2>
                <hr>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="icon_contact">
                                    <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z">
                                        </path>
                                    </svg><!-- <i class="fas fa-home"></i> -->
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="text_contact">
                                    <p>{!! Session('settings')->contact_settings->address !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="icon_contact">
                                    <svg class="svg-inline--fa fa-phone fa-w-16" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="phone" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z">
                                        </path>
                                    </svg><!-- <i class="fas fa-phone"></i> -->
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="text_contact">
                                    <p>{!! Session('settings')->contact_settings->phone !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="icon_contact">
                                    <svg class="svg-inline--fa fa-envelope fa-w-16" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="envelope" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
                                        </path>
                                    </svg><!-- <i class="fas fa-envelope"></i> -->
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="text_contact">
                                    <p>{{Session('settings')->contact_settings->email}}</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="icon_contact">
                                    <svg class="svg-inline--fa fa-globe fa-w-16" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="globe" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M240 32c-132.548 0-240 107.452-240 240s107.452 240 240 240c132.549 0 240-107.451 240-240s-107.451-240-240-240zM375.795 352c4.29-20.227 6.998-41.696 7.879-64h63.723c-1.668 22.098-6.812 43.557-15.34 64h-56.262zM104.205 192c-4.29 20.227-6.998 41.696-7.879 64h-63.722c1.668-22.097 6.811-43.557 15.339-64h56.262zM343.018 192c4.807 20.481 7.699 41.927 8.64 64h-95.658v-64h87.018zM256 160v-93.669c7.295 2.123 14.522 5.685 21.614 10.685 13.291 9.37 26.006 23.804 36.77 41.743 7.441 12.401 13.876 26.208 19.248 41.242h-77.632zM165.616 118.758c10.764-17.939 23.478-32.374 36.77-41.743 7.091-5 14.319-8.562 21.614-10.685v93.67h-77.632c5.373-15.033 11.808-28.84 19.248-41.242zM224 192v64h-95.657c0.94-22.073 3.833-43.519 8.639-64h87.018zM47.944 352c-8.528-20.443-13.671-41.902-15.339-64h63.722c0.881 22.304 3.589 43.773 7.879 64h-56.262zM128.343 288h95.657v64h-87.018c-4.806-20.48-7.699-41.927-8.639-64zM224 384v93.67c-7.294-2.123-14.522-5.686-21.614-10.685-13.292-9.37-26.007-23.805-36.77-41.743-7.441-12.402-13.875-26.209-19.249-41.242h77.633zM314.384 425.242c-10.764 17.938-23.479 32.373-36.77 41.743-7.092 4.999-14.319 8.562-21.614 10.685v-93.67h77.633c-5.373 15.033-11.808 28.84-19.249 41.242zM256 352v-64h95.657c-0.94 22.073-3.833 43.52-8.64 64h-87.017zM383.674 256c-0.881-22.304-3.589-43.773-7.879-64h56.262c8.528 20.443 13.672 41.903 15.34 64h-63.723zM415.329 160h-47.95c-9.319-29.381-22.188-55.147-37.658-75.714 21.268 10.17 40.529 23.808 57.357 40.636 10.74 10.739 20.181 22.469 28.251 35.078zM92.922 124.922c16.829-16.829 36.090-30.466 57.357-40.636-15.471 20.567-28.338 46.333-37.658 75.714h-47.949c8.069-12.609 17.511-24.339 28.25-35.078zM64.672 384h47.949c9.32 29.381 22.188 55.147 37.659 75.715-21.268-10.17-40.529-23.808-57.357-40.637-10.74-10.739-20.182-22.469-28.251-35.078zM387.078 419.078c-16.828 16.829-36.090 30.467-57.357 40.637 15.471-20.567 28.339-46.334 37.658-75.715h47.95c-8.070 12.609-17.511 24.339-28.251 35.078z">
                                        </path>
                                    </svg><!-- <i class="fas fa-globe"></i> -->
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="text_contact">
                                    <p>{{Session('settings')->contact_settings->instagram}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="contact-form">

        <div class="container">
            <h1 class="title">Send Us A Query</h1>

            <form action="{{ route('contactus.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                                placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email Address</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="Email Address">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Phone</label>
                            <input name="phone" type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Subject</label>
                            <input name="subject" type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="Subject">
                        </div>
                    </div>
                </div>
              
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Message</label>
                    <textarea name="message" class="form-control" id="exampleFormControlTextarea1"  style="height: 180px; width: 100%;"></textarea>
                </div>
              
                <div class="button_contact">
                    <button type="submit" name="submit" class="btn btn-danger">SUBMIT</button>
                </div>
            </form>

        </div>
    </div>

</div>

@endsection