<?php
/**
 * Skin file for the Example skin.
 *
 * @file
 * @ingroup Skins
 */

/**
 * SkinTemplate class for the Example skin
 *
 * @ingroup Skins
 */
class SkinDrinkingAndDragons extends SkinTemplate {
	public $skinname = 'drinkinganddragons', $stylename = 'DrinkingAndDragons',
		$template = 'DrinkingAndDragonsTemplate', $useHeadElement = true;

	/**
	 * Add CSS via ResourceLoader
	 *
	 * @param $out OutputPage
	 */
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		$out->addModuleStyles( array(
		  // The following is defined in skin.json
			'skins.drinkinganddragons'
		) );
	}
}

/**
 * BaseTemplate class for the Example skin
 *
 * @ingroup Skins
 */
class DrinkingAndDragonsTemplate extends BaseTemplate {
	/**
	 * Outputs a single sidebar portlet of any kind.
	 */
	private function outputPortlet( $box ) {
		if ( !$box['content'] ) {
			return;
		}

		?>
		<div
			role="navigation"
			class="mw-portlet"
			id="<?php echo Sanitizer::escapeId( $box['id'] ) ?>"
			<?php echo Linker::tooltip( $box['id'] ) ?>
		>
			<h3>
				<?php
				if ( isset( $box['headerMessage'] ) ) {
					$this->msg( $box['headerMessage'] );
				} else {
					echo htmlspecialchars( $box['header'] );
				}
				?>
			</h3>

			<?php
			if ( is_array( $box['content'] ) ) {
				echo '<ul>';
				foreach ( $box['content'] as $key => $item ) {
					echo $this->makeListItem( $key, $item );
				}
				echo '</ul>';
			} else {
				echo $box['content'];
			}?>
		</div>
		<?php
	}

	/**
	 * Outputs the entire contents of the page
	 */
	public function execute() {
		$this->html( 'headelement' ) ?>

		<header class="container-fluid header">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-5">
              <a href="#primaryMenu" id="menu" class="visible-xs-inline-block">Menu</a>
              <h1 class="site-name"><a href="/">Drinking &amp; Dragons</a></h1>
            </div>
            <div class="col-sm-12 col-md-7">
              <?php
                $this->outputPortlet( array(
                  'id' => 'p-personal',
                  'headerMessage' => 'personaltools',
                  'content' => $this->getPersonalTools(),
                ) );
                 ?>
            </div>
          </div>
        </div>
      </div>
    </header>



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

            <article class="main-content-wrapper">

              <div class="row main-content-nav">
                <div class="col-sm-6">
                  <ul class="p-views">
                    <li id="ca-view" class="selected"><span><a href="/wiki/Shaman_Spell_List">Read</a></span></li>
                    <li id="ca-edit"><span><a href="/w/index.php?title=Shaman_Spell_List&amp;action=edit" title="You can edit this page. Please use the preview button before saving [ctrl-option-e]" accesskey="e">Edit</a></span></li>
                    <li id="ca-history" class="collapsible"><span><a href="/w/index.php?title=Shaman_Spell_List&amp;action=history" title="Past revisions of this page [ctrl-option-h]" accesskey="h">View history</a></span></li>
                    <li id="ca-watch" class="icon"><span><a href="/w/index.php?title=Shaman_Spell_List&amp;action=watch&amp;token=d758355a2c7f3e68338f92b877c7ef7055d3642a%2B%5C" title="Add this page to your watchlist [ctrl-option-w]" accesskey="w">Watch</a></span></li>
                  </ul>
                </div>

                <div class="col-sm-6 text-right--sm">
                  <ul class="p-actions">
                    <li id="ca-delete">
                      <a href="/w/index.php?title=Shaman_Spell_List&amp;action=delete" title="Delete this page [ctrl-option-d]" accesskey="d">Delete</a>
                    </li>
                    <li id="ca-move">
                      <a href="/wiki/Special:MovePage/Shaman_Spell_List" title="Move this page [ctrl-option-m]" accesskey="m">Move</a>
                    </li>
                    <li id="ca-protect">
                      <a href="/w/index.php?title=Shaman_Spell_List&amp;action=protect" title="Protect this page [ctrl-option-=]" accesskey="=">Protect</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="mw-content-ltr main-content">

              <?php if ( $this->data['sitenotice'] ) { ?>
                <div id="siteNotice"><?php $this->html( 'sitenotice' ) ?></div>
              <?php } ?>

              <?php if ( $this->data['newtalk'] ) { ?>
                <div class="usermessage"><?php $this->html( 'newtalk' ) ?></div>
              <?php } ?>

              <h1 class="page-title">
                <?php $this->html( 'title' ) ?>
              </h1>

              <div id="siteSub"><?php $this->msg( 'tagline' ) ?></div>

              <?php if ( $this->data['subtitle'] ) { ?>
                <p><?php $this->html( 'subtitle' ) ?></p>
              <?php } ?>
              <?php if ( $this->data['undelete'] ) { ?>
                <p><?php $this->html( 'undelete' ) ?></p>
              <?php } ?>

              <?php $this->html( 'bodytext' ) ?>

              <?php $this->html( 'catlinks' ) ?>

              <?php $this->html( 'dataAfterContent' ); ?>





              </div>


            </article>




          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-3 col-sm-pull-9">
      {% include 'templates/_sidebar.tpl' %}
    </div>
  </div>
</div>






		<hr>
		<div id="mw-wrapper top">
			<a
				id="p-logo"
				role="banner"
				href="<?php echo htmlspecialchars( $this->data['nav_urls']['mainpage']['href'] ) ?>"
				<?php echo Xml::expandAttributes( Linker::tooltipAndAccesskeyAttribs( 'p-logo' ) ) ?>
			>
<!--				<img-->
<!--					src="--><?php //$this->text( 'logopath' ) ?><!--"-->
<!--					alt="--><?php //$this->text( 'sitename' ) ?><!--"-->
<!--				/>-->
			</a>


			<div class="mw-body" role="main">
				<?php if ( $this->data['sitenotice'] ) { ?>
					<div id="siteNotice"><?php $this->html( 'sitenotice' ) ?></div>
				<?php } ?>

				<?php if ( $this->data['newtalk'] ) { ?>
					<div class="usermessage"><?php $this->html( 'newtalk' ) ?></div>
				<?php } ?>

				<h1 class="firstHeading">
					<?php $this->html( 'title' ) ?>
				</h1>

				<div id="siteSub"><?php $this->msg( 'tagline' ) ?></div>

				<div class="mw-body-content">
					<div id="contentSub">
						<?php if ( $this->data['subtitle'] ) { ?>
							<p><?php $this->html( 'subtitle' ) ?></p>
						<?php } ?>
						<?php if ( $this->data['undelete'] ) { ?>
							<p><?php $this->html( 'undelete' ) ?></p>
						<?php } ?>
					</div>

					<?php $this->html( 'bodytext' ) ?>

					<?php $this->html( 'catlinks' ) ?>

					<?php $this->html( 'dataAfterContent' ); ?>

				</div>
			</div>


			<div id="mw-navigation">
				<h2><?php $this->msg( 'navigation-heading' ) ?></h2>

				<form
					action="<?php $this->text( 'wgScript' ) ?>"
					role="search"
					class="mw-portlet"
					id="p-search"
				>
					<input type="hidden" name="title" value="<?php $this->text( 'searchtitle' ) ?>" />

					<h3><label for="searchInput"><?php $this->msg( 'search' ) ?></label></h3>

					<?php echo $this->makeSearchInput( array( "id" => "searchInput" ) ) ?>
					<?php echo $this->makeSearchButton( 'go' ) ?>

				</form>

				<?php

				$this->outputPortlet( array(
					'id' => 'p-personal',
					'headerMessage' => 'personaltools',
					'content' => $this->getPersonalTools(),
				) );

				$this->outputPortlet( array(
					'id' => 'p-namespaces',
					'headerMessage' => 'namespaces',
					'content' => $this->data['content_navigation']['namespaces'],
				) );
				$this->outputPortlet( array(
					'id' => 'p-variants',
					'headerMessage' => 'variants',
					'content' => $this->data['content_navigation']['variants'],
				) );
				$this->outputPortlet( array(
					'id' => 'p-views',
					'headerMessage' => 'views',
					'content' => $this->data['content_navigation']['views'],
				) );
				$this->outputPortlet( array(
					'id' => 'p-actions',
					'headerMessage' => 'actions',
					'content' => $this->data['content_navigation']['actions'],
				) );

				foreach ( $this->getSidebar() as $boxName => $box ) {
					$this->outputPortlet( $box );
				}


				?>
			</div>

			<div id="mw-footer">
				<?php foreach ( $this->getFooterLinks() as $category => $links ) { ?>
					<ul role="contentinfo">
						<?php foreach ( $links as $key ) { ?>
							<li><?php $this->html( $key ) ?></li>
						<?php } ?>
					</ul>
				<?php } ?>

				<ul role="contentinfo">
					<?php foreach ( $this->getFooterIcons( 'icononly' ) as $blockName => $footerIcons ) { ?>
						<li>
							<?php
							foreach ( $footerIcons as $icon ) {
								echo $this->getSkin()->makeFooterIcon( $icon );
							}
							?>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>

		<?php $this->printTrail() ?>
		</body></html>

		<?php
	}
}
