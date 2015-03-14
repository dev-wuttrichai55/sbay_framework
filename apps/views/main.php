<html>
    <head>
        <title><?php echo $this->pageName; ?> | <?php echo $this->pageTitle; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <?php
        
            foreach ($this->getCssFile as $cssFile) {
                echo '<link rel="stylesheet" type="text/css" href="' . $this->baseUrl . '/' . $this->baseCssPath . '/' . $cssFile . '?v=' . $this->version . '">';
            }
            foreach ($this->getJsFile as $jsFile) {
                echo ' <script type="text/javascript" src="' . $this->baseUrl . '/' . $this->baseJsPath . '/' . $jsFile . '?v=' . $this->version . '"></script>';
            }
        ?>
        
    </head>
    <body>
        <div class="container">
            <?php echo $content; ?>
        </div>
    </body>
</html>