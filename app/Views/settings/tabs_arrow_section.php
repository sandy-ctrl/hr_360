<br>
<span class="font-20" style="border:2px !important;" id="menuButton">
    <i class="border border-dark setting-arrow" data-feather='chevrons-right' class='icon-16'></i> 
</span>
<strong class="font-18" >Settings</strong>

<script type="text/javascript">
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
            const newIcon = iconHTML.includes('chevrons-right') ? 'chevrons-left' : 'chevrons-right';
            menuButton.innerHTML = `<i data-feather="${newIcon}" class="border border-dark setting-arrow mr5"></i>`;
            feather.replace();
        });
    });
</script>