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

		public function initPage( OutputPage $out ) {
        parent::initPage( $out );
        $out->addModuleScripts( 'skins.drinkinganddragons' );
    }

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
        <div class="container-fluid container-fluid-fix">
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



<div class="container-fluid container-fluid-fix">
  <div class="row">
    <div class="col-md-10 col-md-push-2 main-content-container-wrapper">
      <div class="main-content-container">
        <div class="row main-content-utilities">

          <div class="col-xs-12 col-sm-6 col-sm-push-6 text-right">
            <div class="text-right search--wrapper">
              <form
                action="<?php $this->text( 'wgScript' ) ?>"
                role="search"

                class="mw-portlet"
                id="p-search"
              >
                <input type="hidden" name="title" value="<?php $this->text( 'searchtitle' ) ?>" />

                <!--<h3><label for="searchInput"><?php $this->msg( 'search' ) ?></label></h3>-->

                <?php echo $this->makeSearchInput( array( "id" => "searchInput" ) ) ?>
                <?php echo $this->makeSearchButton( 'go' ) ?>

              </form>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-sm-pull-6">
            <nav class="nav-page">
            <?php
							$this->outputPortlet( array(
								'id' => 'p-namespaces',
								'headerMessage' => 'namespaces',
								'content' => $this->data['content_navigation']['namespaces'],
							) );
							 ?>
            </nav>
          </div>

        </div>
        <div class="row">
          <div class="col-xs-12">
            <article class="main-content-wrapper">

              <div class="row main-content-nav">
                <div class="col-sm-6">
                <?php
                  $this->outputPortlet( array(
                    'id' => 'p-views',
                    'headerMessage' => 'views',
                    'content' => $this->data['content_navigation']['views'],
                  ) );
                   ?>
                </div>

                <div class="col-sm-6 text-right--sm">
                <?php
									$this->outputPortlet( array(
										'id' => 'p-actions',
										'headerMessage' => 'actions',
										'content' => $this->data['content_navigation']['actions'],
									) );
								 ?>
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

              <!--<div id="siteSub"><?php //$this->msg( 'tagline' ) ?></div>-->

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
      <footer>
        <div class="row">
          <div class="col-xs-12">
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
      </footer>
    </div>

    <div class="col-md-2 col-md-pull-10 sidebar-wrapper">
      <aside class="sidebar" id="primaryMenu">
      <a href="#top" class="visible-xs-block btn btn-link">Back to Top</a>
      <?php
				foreach ( $this->getSidebar() as $boxName => $box ) {
					$this->outputPortlet( $box );
				}
			?>
    </aside>
    </div>
  </div>
</div>

		<?php $this->printTrail() ?>
		<?php
	}
}
