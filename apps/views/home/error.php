
<div style="color:red;width:1024px;margin:0 auto;margin-top:25px;border:1px solid #EEE;padding:30px;">
    <?php echo !empty($text) ? "<h1>Error : Exception</h1>" : "<h1>404</h1>"; ?>
    <?php echo !empty($text) ? $text : "Not Found Error"; ?>
</div>