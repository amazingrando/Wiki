{% extends 'templates/html.tpl' %}

{% block page-title %}Base Design - Wiki{% endblock %}

{% block main-content %}

{% if output == 'php' %}
  The operands can be also be string or number literals
{% endif %}


{% include 'templates/_header.tpl' %}

<div class="container">
  <div class="row">
    <div class="col-sm-3">
      {% include 'templates/_sidebar.tpl' %}
    </div>

    <div class="col-sm-9">
      <div class="main-content-container">
        <div class="row">

          <div class="col-xs-12 col-sm-6 col-sm-push-6 text-right">
            <div class="text-right search--wrapper">
              {% include 'templates/_search.tpl' %}
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-sm-pull-6">
            <nav class="nav-page">
              <ul class="list-inline">
                <li id="ca-nstab-main" class="selected"><span><a href="/wiki/Shaman_Spell_List" title="View the content page [ctrl-option-c]" accesskey="c">Page</a></span></li>
                <li id="ca-talk"><span><a href="/wiki/Talk:Shaman_Spell_List" title="Discussion about the content page [ctrl-option-t]" accesskey="t">Discussion</a></span></li>
              </ul>
            </nav>
          </div>

        </div>
        <div class="row">
          <div class="col-xs-12">
            {% include 'templates/_main-content.tpl' %}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{% endblock %}
