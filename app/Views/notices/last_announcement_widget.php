<?php
if ($last_announcement) {
    $link = get_uri("notices/view/" . $last_announcement->id);
    $title = $last_announcement->title;
} else {
    $link = get_uri("announcements");
    $title = app_lang("no_announcement_yet");
}
?>

<a href="<?php echo $link; ?>" class="text-default">
    <div class="card dashboard-icon-widget dashboard-card-restructure">
        <div class="card-header">
            &nbsp;<b><?php echo app_lang("last_announcement"); ?></b>
        </div>
        <div class="card-body" style="padding: 2.5rem;">
            <!-- <i data-feather="mic" class="icon" stroke-width="2.5"></i><span class="ml10"><?php echo app_lang("last_announcement"); ?></span> -->
            <div class="mt15 ms-1 text-truncate" title="<?php echo $title; ?>">
                <?php echo $title; ?>
            </div>
        </div>
    </div>
</a>