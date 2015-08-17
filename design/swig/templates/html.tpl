<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">

  <title>{% block page-title %}Page Title{% endblock %}</title>
  <link rel="icon" href="favicon.ico">
  <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-VBrFgheoreGl4pKmWgZh3J23pJrhNlSUOBek+8Z2Gv0= sha512-i8+QythOYyQke6XbStjt9T4yQHhhM+9Y9yTY1fOxoDQwsQpKMEpIoSQZ8mVomtnVCf9PBvoQDnKl06gGOOD19Q==" crossorigin="anonymous">

  <link type="text/css" rel="stylesheet" href="@@css/main.css"/>

  <script type="text/javascript" src="@@libraries/modernizr.js"></script>
  <script type="text/javascript" src="@@libraries/jquery.js"></script>

  <script src="//use.typekit.net/jgx0qay.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>

  {% include "_head--live-reload.tpl" %}

  {% block head %}{% endblock %}

</head>

<body>

{% block main-content %}{% endblock %}

<script type="text/javascript" src="@@jsPath/main.js"></script>
{% block scripts %}{% endblock %}

</body>
</html>









