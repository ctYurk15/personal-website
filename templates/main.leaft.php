<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="resources/css/main_styles.css">
        <title>{@ $TITLE @}</title>
    </head>
    <body>
        <div class="content">
            <div class="header">
                <h2>Welcome to my personal website</h2>
            </div>

            <div class="sub-header">
                <span style="text-align: right;"><h3>Yurii Hrytsak</h3></span>
                <img src="resources/images/avatar.jpeg" class="avatar-img">
                <span style="text-align: left;"><h3>PHP Developer</h3></span>
            </div>

            <div class="pages">
                <div class="page" data-page="{@ $ROOT_URL @}bio">
                    <h2>About me</h2>
                    <img src="resources/images/programmer.png">
                </div>
                <div class="page" data-page="{@ $ROOT_URL @}projects">
                    <h2>Personal projects</h2>
                    <img src="resources/images/projects.png">
                </div>
                <div class="page" data-page="{@ $ROOT_URL @}news">
                    <h2>News</h2>
                    <img src="resources/images/news.png">
                </div>
            </div>
        </div>
    </body>
    <script src="resources/js/main_script.js"></script>
</html>