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

  <link type="text/css" rel="stylesheet" href="@@cssPath/main.css"/>

  <script type="text/javascript" src="@@librariesPath/modernizr.js"></script>
  <script type="text/javascript" src="@@librariesPath/jquery.js"></script>

  {% include "_head--live-reload.tpl" %}

  {% block head %}{% endblock %}

</head>

<body>

{% block main-content %}{% endblock %}

<script type="text/javascript" src="@@jsPath/main.js"></script>
{% block scripts %}{% endblock %}

</body>
</html>









