<div class="list-group">
    <?php
    if (count($projects)) {
        foreach ($projects as $project) {
            $title = "<i data-feather='$project->icon' class='icon-16 mr10'></i> " . $project->title;
            echo anchor(get_uri("enterprises/view/" . $project->id), $title, array("class" => "dropdown-item text-wrap"));
        }
    } else {
        ?>
        <div class='list-group-item'>
            <?php echo app_lang("empty_starred_projects"); ?>              
        </div>
    <?php } ?>
</div>