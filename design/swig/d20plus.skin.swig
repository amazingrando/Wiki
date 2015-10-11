<?php
/**
 * Skin file for skin Foo Bar.
 *
 * @file
 * @ingroup Skins
 */

 /**
 * SkinTemplate class for d20plus skin
 * @ingroup Skins
 */
class Skind20plus extends SkinTemplate {
	var $skinname = 'd20plus', $stylename = 'd20plus',
		$template = 'd20plusTemplate', $useHeadElement = true;

	/**
	 * This function adds JavaScript via ResourceLoader
	 *
	 * Use this function if your skin has a JS file or files.
	 * Otherwise you won't need this function and you can safely delete it.
	 *
	 * @param OutputPage $out
	 */

	public function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$out->addModules( 'js/main.js' );
	}

	/**
	 * Add CSS via ResourceLoader
	 *
	 * @param $out OutputPage
	 */
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		$out->addModuleStyles( array(
			'css/main.css', 'skins.foobar'
		) );
	}
}

/**
 * BaseTemplate class for Foo Bar skin
 *
 * @ingroup Skins
 */
class d20plusTemplate extends BaseTemplate {
	/**
	 * Outputs the entire contents of the page
	 */
	public function execute() {
		$this->html( 'headelement' );

/** Your skin's code goes here.
  * The rest of this page explains what to write here.
**/
?>
<?php $this->printTrail(); ?>
</body>
</html><?php
	}
}
?>

{% block page-title %}Base Design - Wiki{% endblock %}

{% block main-content %}

{% if output == 'php' %}
  The operands can be also be string or number literals
{% else %}
  Else
{% endif %}




{% include 'templates/_header.tpl' %}

<div class="container">
  <div class="row">
    <div class="col-sm-9 col-sm-push-3">
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

    <div class="col-sm-3 col-sm-pull-9">
      {% include 'templates/_sidebar.tpl' %}
    </div>
  </div>
</div>

{% endblock %}