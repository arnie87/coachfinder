<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
    <head>
        <script>
            $('#backToTopBtn').click(function () {
                $('html,body').animate({scrollTop: 0}, 'slow');
                return false;
            });
        </script>
    </head>
    <body>
        <footer>
            <div class="footer" id="footer">
                <div class="container" style="padding-top: 1em;">
                    <p class="float-right"><a href="#top" id ="backToTopBtn">Back to top</a></p>
                    <p>© <?php echo date("Y"); ?> Arnold Hecke <!--· <a href="https://v4-alpha.getbootstrap.com/examples/carousel/#">Privacy</a> · <a href="https://v4-alpha.getbootstrap.com/examples/carousel/#">Terms--></a></p>
                </div>
            </div>
        </footer>
    </body>
</html>