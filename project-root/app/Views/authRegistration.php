<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap ReCaptcha Form | BootstrapTema</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='https://bootstraptema.ru/snippets/form/2017/recaptcha/custom.css' rel='stylesheet' type='text/css'>
</head>
<body>

<div class="container">

    <div class="row">

        <div class="col-lg-8 col-lg-offset-2">

            <h1 class="text-center">Bootstrap ReCaptcha Form</h1>

            <p class="lead">Bootstrap contact form with PHP and AJAX add Google's ReCaptcha.</p>


            <form id="contact-form" method="post" action="contact.php" role="form">

                <div class="messages"></div>

                <div class="controls">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_name">Firstname *</label>
                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_lastname">Lastname *</label>
                                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_email">Email *</label>
                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_phone">Phone</label>
                                <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_message">Message *</label>
                                <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <!-- Replace data-sitekey with your own one, generated at https://www.google.com/recaptcha/admin -->
                                <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-send" value="Send message">
                        </div>

                    </div>

                </div>

            </form>

        </div><!-- /.col-lg-8 col-lg-offset-2 -->

    </div> <!-- /.row-->

</div> <!-- /.container-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://bootstraptema.ru/snippets/form/2017/recaptcha/validator.js"></script>
<script src="https://bootstraptema.ru/snippets/form/2017/recaptcha/contact.js"></script>
</body>
</html>