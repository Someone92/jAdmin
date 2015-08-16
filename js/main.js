$(document).ready(function() {

    
    
    /* nav-sidebar + nav-right-container */
    $("li.navicon").click(function() {
        $("#nav-sidebar").toggleClass("closed");
        $("#nav-right-container").toggleClass("closed");
        if($("#nav-sidebar").hasClass("closed")) {
            $("li.nav-submenu").removeClass("open");   
        }
    });
    
    /* Topbar Right side dropdown */
    $(".nav-right").click(function() {
        $(this).toggleClass("open");
    });
    
    
    /* Sidebar submenu navigation */
    $("li.nav-submenu").click(function() {
        if(!$("#nav-sidebar").hasClass("closed")) {
            $(this).toggleClass("open").siblings().removeClass("open");
            $(this).parent().siblings("ul").children("li.open").removeClass("open");
        }
    });
    

    
    
    
    
    
    
    /* Table add pagination */
    var $tableTr = $("table.paginated tbody tr");


    $("select[name=show-entries]").on("change", function() {
        var $rowsPerPage = (this.value);
        var $rowPages = Math.ceil($tableTr.length / $rowsPerPage);

        $($tableTr).removeClass("visible");
        $($tableTr).slice(0,this.value).addClass("visible");
        
        if($rowsPerPage) {
            $(".post-page").empty();
            for(var $x=1; $x < $rowPages+1; $x++) {
                $(".post-page").append('<span class="page-number">' + $x + '</span>');
            }
        }
        $("span.page-number:lt(1)").addClass("active");
        $("span.page-number").click(function() {
            $(this).siblings().removeClass("active");
            $(this).addClass("active");
        });
    });
    
    $("select[name=show-entries]").trigger('change');
    
    
    

    $(".post-page").on("click", "span.page-number", function() {
        var $optionValue = $(this).text();
        var $rowsPerPage = $("select[name=show-entries]").val();
        $($tableTr).removeClass("visible");

        if($.isNumeric($optionValue)) {
            var $start = $optionValue * $rowsPerPage - $rowsPerPage;
            /* Increases $start with 1 if It's not 0 */
            if($start !== 0) {
                $start += 1;   
            }
            var $end = $optionValue * $rowsPerPage;

            $("table.paginated tbody tr:nth-child(n+"+$start+"):nth-child(-n+"+$end+")").addClass("visible");   
        }
        
    });

    
    
    
    /* Ripple effect on button click */
     $('button').mousedown(function (e) {
    var target = e.target;
    var rect = target.getBoundingClientRect();
    var ripple = target.querySelector('.ripple');
    $(ripple).remove();
    ripple = document.createElement('span');
    ripple.className = 'ripple';
    ripple.style.height = ripple.style.width = Math.max(rect.width, rect.height) + 'px';
    target.appendChild(ripple);
    var top = e.pageY - rect.top - ripple.offsetHeight / 2 -  document.body.scrollTop;
    var left = e.pageX - rect.left - ripple.offsetWidth / 2 - document.body.scrollLeft;
    ripple.style.top = top + 'px';
    ripple.style.left = left + 'px';
    return false;
});

    
    
    
    
    /* Delete Post */
    $('.confirmation').on('click', function () {
        return confirm('Är du säker?');
    });
    
    
});