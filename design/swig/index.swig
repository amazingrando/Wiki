{% extends 'templates/html.tpl' %}

{% block page-title %}Base Design - Wiki{% endblock %}

{% block main-content %}

{% include 'templates/_header.tpl' %}

<div class="container">
  <div class="row">
    <div class="col-sm-9 col-sm-push-3">
      <div class="main-content-container">
        <nav class="nav-page pull-left">
          <ul class="list-inline">
            <li class="selected"><span><a href="#">User page</a></span></li>
            <li class="new"><span><a href="#">Discussion</a></span></li>
          </ul>
        </nav>
        <div class="text-right pull-right search--wrapper">
          {% include 'templates/_search.tpl' %}
        </div>
        <div class="row">
          <div class="col-xs-12">
            {% include 'templates/_main-content.tpl' %}
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-3 col-sm-pull-9">
      {% include 'templates/_sidebar.tpl' %}
    </div>
  </div>
</div>

{% endblock %}