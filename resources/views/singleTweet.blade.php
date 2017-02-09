<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tweet {{ $tweetID }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>

    <div class="container">
      <h3>Tweet {{ $tweetID }}</h3>
      @foreach ($tweets as $tweet)
        <p>{{ $tweet->tweet }}</p>
      @endforeach
    </div>

  </body>
</html>
