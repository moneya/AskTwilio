<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ask Twilio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:100">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
          <h1 class="center-text">Ask Twilio</h1>
          <form action="" method="post">
              <h5>{{{ $errors->first('name') }}}</h5>
              <input class="form-control" type="text" name="name" placeholder="Your Name"/>
              <h5>{{{ $errors->first('phone1') }}}</h5>
              <input class="form-control" type="tel"  name="phone1" placeholder="Your Phone #"/>
              <h5>{{{ $errors->first('phone2') }}}</h5>
              <input class="form-control" type="tel"  name="phone2" placeholder="Your Friends Phone #"/>
              <h5>{{{ $errors->first('question') }}}</h5>
              <textarea class="form-control" name="question" placeholder="Ask a question..." rows="3"></textarea>
              <input class="btn btn-danger center-text" type="submit" value="Ask" />
          </form>
      </div>
      <div class="col-md-4"></div>
    </div>
  </body>
</html>