<?php
require_once __DIR__ . '/../inc/env.php';
if (!isset($_ENV['LINK_WEB'])) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <link rel="stylesheet" href="./assets/css/404.css?v=1.0.0">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>404 NOT FOUND E-Lib</title>
    </head>

    <body>
        <div class="box">
            <div class="box__ghost">
                <div class="symbol"></div>
                <div class="symbol"></div>
                <div class="symbol"></div>
                <div class="symbol"></div>
                <div class="symbol"></div>
                <div class="symbol"></div>

                <div class="box__ghost-container">
                    <div class="box__ghost-eyes">
                        <div class="box__eye-left"></div>
                        <div class="box__eye-right"></div>
                    </div>
                    <div class="box__ghost-bottom">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="box__ghost-shadow"></div>
            </div>

            <div class="box__description">
                <div class="box__description-container">
                    <div class="box__description-title">Whoops!</div>
                    <div class="box__description-text">It seems like we couldn't find the page you were looking for</div>
                </div>

                <a href="#goBack" onClick="history.go(-1); return false;" class="box__button">Go back</a>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
        <script src="./assets/js/404.js?v=1.0.0"></script>
    </body>

    </html>
<?php
} else {
?>
    <!DOCTYPE html>
    <html lang="en">
    <link rel="stylesheet" href="<?php echo $_ENV['LINK_WEB'] ?>assets/css/404.css?v=1.0.0">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>404 NOT FOUND E-Lib</title>
    </head>

    <body>
        <div class="box">
            <div class="box__ghost">
                <div class="symbol"></div>
                <div class="symbol"></div>
                <div class="symbol"></div>
                <div class="symbol"></div>
                <div class="symbol"></div>
                <div class="symbol"></div>

                <div class="box__ghost-container">
                    <div class="box__ghost-eyes">
                        <div class="box__eye-left"></div>
                        <div class="box__eye-right"></div>
                    </div>
                    <div class="box__ghost-bottom">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="box__ghost-shadow"></div>
            </div>

            <div class="box__description">
                <div class="box__description-container">
                    <div class="box__description-title">Whoops!</div>
                    <div class="box__description-text">It seems like we couldn't find the page you were looking for</div>
                </div>

                <a href="#goBack" onClick="history.go(-1); return false;" class="box__button">Go back</a>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
        <script src="<?php echo $_ENV['LINK_WEB'] ?>assets/js/404.js?v=1.0.0"></script>
    </body>

    </html>
<?php
} ?>