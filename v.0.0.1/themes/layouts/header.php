<html>
    <head>
        <title><?php echo $this->pageName; ?> | <?php echo $this->pageTitle; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo $this->pageDescription; ?>">
        <meta name="author" content="<?php echo $this->pageAuthor; ?>">
        <link rel="shortcut icon" href="<?php echo $this->pageIcon; ?>">
        
        <?php
            foreach ($this->getCssFile as $cssFile) {
                echo '<link rel="stylesheet" type="text/css" href="' . $this->getCssUrl() . '/' . $cssFile . '?v=' . $this->version . '">';
            }
            foreach ($this->getJsFile as $jsFile) {
                echo ' <script type="text/javascript" src="' . $this->getJsUrl() . '/' . $jsFile . '?v=' . $this->version . '"></script>';
            }
        ?>
        
        <style type="text/css">
            
        </style>
        
    </head>