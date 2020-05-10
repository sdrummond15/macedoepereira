<?php

/**
 * @subpackage    Cirrus Green v1.6 HM02J
 * @copyright    Copyright (C) 2010-2013 Hurricane Media - All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');
$LeftMenuOn = ($this->countModules('position-4') or $this->countModules('position-7'));
$RightMenuOn = $this->countModules('position-6');
$TopNavOn = ($this->countModules('position-13'));
$app = JFactory::getApplication();
$sitename = $app->getCfg('sitename');
$logopath = $this->baseurl . '/templates/' . $this->template . '/images/logo-demo-green.gif';
$logo = $this->params->get('logo', $logopath);
$logoimage = $this->params->get('logoimage');
$sitetitle = $this->params->get('sitetitle');
$sitedescription = $this->params->get('sitedescription');

$menu = $app->getMenu();
$lang = JFactory::getLanguage();
$home = 0;
if ($menu->getActive() == $menu->getDefault($lang->getTag())) {
    $home = 1;
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
    <jdoc:include type="head" />
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/fontawesome-all.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/animate.css" type="text/css" />
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/script.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/sfhover.js"></script>

</head>

<body>

    <div id="wrapper">

        <div id="mainmenu_wrap" <?= ($home == 0) ? 'class="mainmenu-int"' : '' ?>>
            <div id="mainmenu">

                <!-- Logo -->
                <div id="logomain">
                    <?php if ($logo && $logoimage == 1) : ?>
                        <a href="<?php echo $this->baseurl ?>"><img src="<?php echo htmlspecialchars($logo); ?>" alt="<?php echo $sitename; ?>" /></a>
                    <?php endif; ?>
                </div>

                <?php if ($this->countModules('position-0')) : ?>
                    <div id="mainheader-top">
                        <div class="mainheader-top">
                            <jdoc:include type="modules" name="position-0" style="xhtml" />
                        </div>
                    </div>
                <?php endif; ?>

                <div id="mainmenu_menu">
                    <jdoc:include type="modules" name="position-1" />
                </div>

                <div id="respmenu_wrap">
                    <div class="gotomenu">
                        <div id="gotomenu">
                            <i class="fa fa-bars smallmenu" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="menuresp">
                <jdoc:include type="modules" name="position-1" />
            </div>

        </div>

        <?php if ($home == 1) : ?>
            <div id="header_wrap">
                <div id="header">

                    <?php if ($this->countModules('position-0')) : ?>
                        <div id="header-top">
                            <div class="header-top">
                                <jdoc:include type="modules" name="position-0" style="xhtml" />
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Logo -->
                    <div id="logo">
                        <?php if ($logo && $logoimage == 1) : ?>
                            <a href="<?php echo $this->baseurl ?>"><img src="<?php echo htmlspecialchars($logo); ?>" alt="<?php echo $sitename; ?>" /></a>
                        <?php endif; ?>
                        <?php if (!$logo || $logoimage == 0) : ?>
                            <?php if ($sitetitle) : ?>
                                <a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitetitle); ?></a><br />
                            <?php endif; ?>
                            <?php if ($sitedescription) : ?>
                                <div class="sitedescription"><?php echo htmlspecialchars($sitedescription); ?></div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
        <?php endif; ?>

        <!-- Breadcrumbs -->
        <?php if ($this->countModules('position-2')) : ?>
            <div id="breadcrumbs">
                <jdoc:include type="modules" name="position-2" />
            </div>
        <?php endif; ?>

        <?php if ($home == 1) : ?>
            <div id="topmenu_wrap">
                <div id="topmenu">
                    <jdoc:include type="modules" name="position-1" />
                </div>
            </div>
        <?php endif; ?>

        <!-- TopNav -->
        <?php if ($TopNavOn) : ?>
            <div id="topnav_wrap">
                <div id="topnav">
                    <jdoc:include type="modules" name="position-13" style="xhtml" />
                </div>
            </div>
        <?php endif; ?>

        <!-- Content/Menu Wrap -->
        <div id="content-menu_wrap_bg" <?= ($home == 1) ? 'class="back-home"' : '' ?>>
            <div id="content-menu_wrap">

                <!-- Left Menu -->
                <?php if ($LeftMenuOn) : ?>
                    <div id="leftmenu">
                        <jdoc:include type="modules" name="position-7" style="xhtml" />
                        <jdoc:include type="modules" name="position-4" style="xhtml" />
                    </div>
                <?php endif; ?>

                <!-- Contents -->
                <?php
                if ($LeftMenuOn and $RightMenuOn) :
                    $w = 'w1';
                elseif ($LeftMenuOn or $RightMenuOn) :
                    $w = 'w2';
                elseif ($this->countModules('position-12')) :
                    $w = 'w4';
                else :
                    $w = 'w3';
                endif;
                ?>

                <div id="content-<?php echo $w; ?>">
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                </div>


                <!-- Right Menu -->
                <?php if ($RightMenuOn) : ?>
                    <div id="rightmenu">
                        <jdoc:include type="modules" name="position-3" style="xhtml" />
                        <jdoc:include type="modules" name="position-6" style="xhtml" />
                    </div>
                <?php endif; ?>

            </div>
        </div>

        <?php if ($this->countModules('position-8')) : ?>
            <div id="top_bottom_content_wrap">
                <div class="top_bottom_content">
                    <jdoc:include type="modules" name="position-8" style="xhtml" />
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this->countModules('position-5')) : ?>
            <div id="bottom_content_wrap">
                <div class="bottom_content">
                    <jdoc:include type="modules" name="position-5" style="xhtml" />
                </div>
            </div>
        <?php endif; ?>

        <!-- Footer -->
        <?php if ($this->countModules('position-14')) : ?>
            <div id="footer_wrap">
                <div id="footer">
                    <jdoc:include type="modules" name="position-14" style="xhtml" />
                </div>
            </div>
        <?php endif; ?>


        <div id="bottom_wrap">
            <!-- Banner/Links -->
            <div id="box_wrap">
                <div id="box_placeholder">
                    <div id="box1">
                        <jdoc:include type="modules" name="position-9" style="xhtml" />
                    </div>
                    <div id="box2">
                        <jdoc:include type="modules" name="position-10" style="xhtml" />
                    </div>
                    <div id="box3">
                        <jdoc:include type="modules" name="position-11" style="xhtml" />
                    </div>
                </div>
            </div>

            <div id="copyright">
                <div class="copyrightint">
                    <?php if ($this->countModules('position-15')) : ?>
                        <jdoc:include type="modules" name="position-15" style="xhtml" />
                    <?php else : ?>
                        <p>
                            Copyright &copy; <?php echo $sitename . ' - ' . $sitedescription . ' - ' . date('Y'); ?> | Todos os
                            direitos reservados
                        </p>
                    <?php endif; ?>
                    <a class="sd" href="http://www.sdrummond.com.br" title="Sdrummond Tecnologia" target="_blank">
                        <img src="images/sd.png" alt="Sdrummond Tecnologia" title="Sdrummond Tecnologia">
                    </a>
                </div>
            </div>
        </div>

    </div>

</body>

<?php if ($home == 1) : ?>
    <script>
        jQuery(document).ready(function($) {

            var isMobile = false; //initiate as false
            // device detection
            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) ||
                /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {
                isMobile = true;

                //$('.blog-home .items-row').css('opacity', 0);
                $(this).on('scroll', function() {

                    var topmenu_wrap = $('#topmenu_wrap');
                    console.log(topmenu_wrap.scrollTop);
                    //if (bloghome.length) {
                    //if ((topo + ($(window).height() * 0.7)) > jQuery('.blog-home').offset().top) {
                    //$('.blog-home .items-row').css('opacity', 1);
                    //$('.blog-home .row-0').addClass('animated fadeInLeft');
                    //$('.blog-home .row-1').addClass('animated fadeInRight');
                    //$('.blog-home .row-2').addClass('animated fadeInRight');
                    //}
                    //}
                });
            }

            $('#mainmenu_wrap').css('top', -($('#mainmenu_wrap').height()));

            $(this).on('scroll', function() {
                var topmenu_wrap = $('#topmenu_wrap');
                if ($(window).scrollTop() > (topmenu_wrap.offset().top + topmenu_wrap.height())) {
                    $('#mainmenu_wrap').css('opacity', 1);
                    $('#mainmenu_wrap').css('top', 0);
                    topmenu_wrap.css('visibility', 'hidden');
                } else {
                    $('#mainmenu_wrap').css('top', -($('#mainmenu_wrap').height()));
                    topmenu_wrap.css('visibility', 'visible');
                }
            });
        });
    </script>

<?php endif; ?>

</html>