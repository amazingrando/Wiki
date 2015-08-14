{% extends 'templates/html.tpl' %}

{% block main-content %}

  <h2>How to iterate through .json</h2>

  {% for madeUpObjectName in exampleJSONArray %}
    <h2>{{madeUpObjectName.title|safe}}</h2>
    <p>{{madeUpObjectName.desc}}</p>
  {% endfor %}

{% endblock %}