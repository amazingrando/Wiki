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
        $out->addModules( 'skins.drinkinganddragonsjs' );
    }

	/**
	 * Add CSS via ResourceLoader
	 *
	 * @param $out OutputPage
	 */
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		$out->addModuleStyles( array(
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

    <div class="container-fluid">

      <header class="header row align-items-center px-4">
        <div class="col-lg">
  <a href="#primaryMenu" id="menu" class="d-lg-none">Menu</a>
  <h1 class="site-name"><a href="/">Drinking &amp; Dragons</a></h1>
</div>

<div class="col-lg pb-2 pb-lg-0">

              <?php
              $this->outputPortlet( array(
                'id' => 'p-personal',
                'headerMessage' => 'personaltools',
                'content' => $this->getPersonalTools(),
              ) );
            ?>

</div>      </header>

      <div class="layout row px-4">
        <div class="col order-lg-2 pb-5 pb-lg-0">
          <div class="row d-flex align-items-stretch">
  <div class="col">

                  <?php
                $this->outputPortlet( array(
                  'id' => 'p-namespaces',
                  'headerMessage' => 'namespaces',
                  'content' => $this->data['content_navigation']['namespaces'],
                ) );
                  ?>

  </div>

  <div class="col">
    <div class="text-right search--wrapper">
      <form action="/w/index.php" role="search" class="mw-portlet" id="p-search">
  <input type="hidden" name="title" value="Special:Search">

  <input type="search" name="search" placeholder="Search Drinking and Dragons" title="Search Drinking and Dragons [ctrl-option-f]" accesskey="f" id="searchInput" autocomplete="off">

  <input type="submit" name="go" value="Go" title="Go to a page with this exact name if it exists">
</form>    </div>
  </div>
</div>
          <section class="main-content-wrapper mb-5">
            <div class="row main-content-nav">
              <div class="col-sm">
                                <?php
                    $this->outputPortlet( array(
                      'id' => 'p-views',
                      'headerMessage' => 'views',
                      'content' => $this->data['content_navigation']['views'],
                    ) );
                      ?>
                              </div>

              <div class="col-sm">

                                  <?php
                    $this->outputPortlet( array(
                      'id' => 'p-actions',
                      'headerMessage' => 'actions',
                      'content' => $this->data['content_navigation']['actions'],
                    ) );
                      ?>

              </div>
            </div>

            <main class="main-content">

              <?php if ( $this->data['sitenotice'] ) { ?>
                <div id="siteNotice"><?php $this->html( 'sitenotice' ) ?></div>
              <?php } ?>

              <?php if ( $this->data['newtalk'] ) { ?>
                <div class="usermessage"><?php $this->html( 'newtalk' ) ?></div>
              <?php } ?>

              <h1 class="page-title">
              <?php $this->html( 'title' ) ?>
              </h1>

              <?php $this->html( 'bodytext' ) ?>

              <?php $this->html( 'catlinks' ) ?>

              <?php $this->html( 'dataAfterContent' ); ?>
            </main>
          </section>
        </div>

        <div class="col-lg-auto order-lg-1 px-3 px-lg-0">
          <aside class="sidebar" id="primaryMenu">
  <a href="#top" class="d-lg-none btn btn-link">Back to Top</a>

                <?php
                foreach ( $this->getSidebar() as $boxName => $box ) {
                  $this->outputPortlet( $box );
                }
              ?>

</aside>        </div>
      </div>
    </div>

		<?php $this->printTrail() ?>
		<?php
	}
}
