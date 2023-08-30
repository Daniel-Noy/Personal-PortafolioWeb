<?php if (isset($alerts)) {
    foreach ($alerts as $key => $alert) {
        foreach($alert as $message) {
?>
    <div class="<?php echo $key?>"><p><?php echo $message; ?></p></div>
<?php }}} ?>