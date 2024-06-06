<div class="bg-silver " >
<br>
<span class="font-20" style="border:2px !important;" id="menuButton"><i class="border border-dark  setting-arrow" data-feather='chevron-right' class='icon-16'></i> </span><strong class="font-18" >Settings</strong>
</div>
<div id="page-content" class="page-wrapper-reconstructed clearfix">
    <div class="row">
        <div class="col-sm-3 col-lg-2" id="menuContainer" >
            <?php
            $tab_view['active_tab'] = "email_templates";
            echo view("settings/tabs", $tab_view);
            ?>
        </div>
        <div class="col-sm-9 col-lg-10" id="mainContent">
            <div class="row">
                <div class="col-md-3">
                    <div id="template-list-box" class="card bg-white">
                        <div class="page-title clearfix">
                            <h4> <?php echo app_lang('email_templates'); ?></h4>
                        </div>

                        <ul class="nav nav-tabs vertical settings p15 d-block" role="tablist">
                            <?php
                            foreach ($templates as $template => $value) {

                                //collapse the selected template tab panel
                                $collapse_in = "";
                                $collapsed_class = "collapsed";
                                ?>
                                <div class="clearfix settings-anchor <?php echo $collapsed_class; ?>" data-bs-toggle="collapse" data-bs-target="#settings-tab-<?php echo $template; ?>">
                                    <?php echo app_lang($template); ?>
                                </div>
                                <?php
                                echo "<div id='settings-tab-$template' class='collapse $collapse_in'>";
                                echo "<ul class='list-group help-catagory'>";

                                foreach ($value as $sub_template_name => $sub_template) {
                                    echo "<span class='email-template-row list-group-item clickable' data-name='$sub_template_name' data-template-language=''>" . app_lang($sub_template_name) . "</span>";
                                }

                                echo "</ul>";
                                echo "</div>";
                            }
                            ?>
                        </ul>

                    </div>
                </div>
                <div class="col-md-9">
                    <div id="template-details-section"> 
                        <div id="empty-template" class="text-center p15 box card ">
                            <div class="box-content" style="vertical-align: middle; height: 100%"> 
                                <div><?php echo app_lang("select_a_template"); ?></div>
                                <span data-feather="code" width="15rem" height="15rem" style="color:rgba(128, 128, 128, 0.1)"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
load_css(array(
    "assets/js/summernote/summernote.css"
));
load_js(array(
    "assets/js/summernote/summernote.min.js"
));
?>


<script type="text/javascript">
    $(document).ready(function () {

        /*load a template details*/
        $(".email-template-row").click(function () {
            //don't load this message if already has selected.
            if (!$(this).hasClass("active")) {
                var template_name = $(this).attr("data-name");
                var template_language = "";
                if (template_name) {
                    $(".email-template-row").removeClass("active");
                    $(this).addClass("active");
                    $.ajax({
                        url: "<?php echo get_uri("email_templates/form"); ?>/" + template_name + "/" + template_language,
                        success: function (result) {
                            $("#template-details-section").html(result);
                            $(".email-template-form-tab").trigger("click");
                        }
                    });
                }
            }
        });
    });
      // 5 june harshal
      document.addEventListener('DOMContentLoaded', function() {
        var menuButton = document.getElementById('menuButton');
        var menuContainer = document.getElementById('menuContainer');
        var mainContent = document.getElementById('mainContent');

        menuButton.addEventListener('click', function() {
            if (menuContainer.style.display === 'none' || menuContainer.style.display === '') {
                menuContainer.style.display = 'block';
                mainContent.classList.add('reduced-width');
            } else {
                menuContainer.style.display = 'none';
                mainContent.classList.remove('reduced-width');
            }
            const iconHTML = menuButton.innerHTML;
            const newIcon = iconHTML.includes('chevron-right') ? 'chevron-left' : 'chevron-right';
            menuButton.innerHTML = `<i data-feather="${newIcon}" class="border border-dark setting-arrow mr5"></i>`;
            feather.replace();
        });
    });
</script>