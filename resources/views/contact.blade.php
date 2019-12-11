@extends('layouts.template')

@section('title','Contact Us')

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="text-center">~CONTACT US~</h1>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-5 ">
            <div class="message">
                <h2>Send a Message</h2>
                <form>
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" required>
                    </div>
    
                    <div class="form-group">
                        <label for="mobile">Mobile No.</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" required>
                    </div>
    
                    <div class="form-group">
                        <label for="email">Email Id</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
    
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" name="message" id="message" required></textarea>
    
                    </div>
    
                    <a href="{{ route('index') }}" onclick="msg()" class="btn btn-primary">Send</a>
                </form>
            </div>
        </div>

        <div class="col-md-2"></div>

        <div class="col-md-5">
            <div class="help">
                <div class="how">
                    <h2>How can we help ?</h2>
                    <p>Get in touch with us for any kind of professional inquiries.</p>
                    <p>We’d love to hear from you</p>
                </div>

                <div class="contact">
                    <h2>Contact No.</h2>
                    <p><i class="fa fa-phone" style="font-size:24px"></i> +91 9029016616</p>
                    <p><i class="fa fa-phone" style="font-size:24px"></i> +91 7666033678</p>
                    <p><i class="fa fa-phone" style="font-size:24px"></i> +91 8097329953</p>
                </div>

                <div class="location">
                    <h2>Location</h2>
                    <address>
                        <h5>Anjuman-I-Islam's Kalsekar Technical Campus<h5>
                        <p> Plot No. 2 & 3, Sector - 16, Near Thana Naka, Khandagaon, New Panvel - 410206 </p>
                    </address>
                </div>
            </div>

        </div>
    </div>
</div>

    <script>
        function msg(){
            alert("Your Message was sent successfully");
        }
    </script>
@endsection











