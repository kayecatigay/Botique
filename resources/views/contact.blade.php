@extends('home')
@section('maincontent')
    <br><br><br><br><br><br><br>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Contact Us</title>
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <link rel="stylesheet" href="resources/css/contact.css">
        </head>
        <body>
            <div class="container contact-form">
                <div class="contact-image">
                    <img src="plugins/images/logo-icon.png" width="80" alt="rocket_contact"/>
                </div>
                <h3>Drop us your feedback or personal suggestions. </h3>
                <div class="container px-4 px-lg-5 mt-5">      
                        
                    {{ Form::open(array('url' => '/sentmessage','files'=>'true'))}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name: </label>
                            {{ Form::text('sname',null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group"> 
                            <label for="exampleInputEmail1">Email: </label>
                            {{ Form::text('semail',null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group"> 
                            <label for="exampleInputEmail1">Contact Number: </label>
                            {{ Form::text('snumber',null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group"> 
                            <label for="exampleInputEmail1">Your message: </label>
                            {{ Form::text('message',null,['class' => 'form-control'])}}
                        </div>
                        {{ Form::submit('Save',['class' => 'btn btn-primary'])}}
                    
                    {{ Form::close()}}    
                    <br><br><br><br>
                </div>
            </div>
        </body>
    </html>

<!------ Include the above in your HEAD tag ---------->
@stop

