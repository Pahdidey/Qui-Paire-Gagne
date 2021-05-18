$(document).ready(function() {


    // Tabs

    $('.tabs-nav a').click(function() {
        // Check for active
        $('.tabs-nav li').removeClass('active');
        $(this).parent().addClass('active');

        // Display active tab
        let currentTab = $(this).attr('href');
        $('.tabs-content > div').hide();
        $(currentTab).show();

        return false;
    });




    // Modale

    $(".open-modal").click(function(e){
        e.preventDefault();
        dataModal = $(this).attr("data-modal");
        $("#" + dataModal).css({"display":"block"});
    });

    $(".modal .close, .modal .overlay").click(function(){
        $(".modal").css({"display":"none"});
    });




    // Lightbox image
    $('.open-lightbox').on('click', function(e) {
        e.preventDefault();
        var image = $(this).attr('href');
        $('html').addClass('no-scroll');
        $('body').append('<div class="lightbox-opened"><img src="' + image + '"></div>');
    });
      
    $('body').on('click', '.lightbox-opened', function() {
        $('html').removeClass('no-scroll');
        $('.lightbox-opened').remove();
    });



    // Copier URL

    $('.copy_button').on( 'click', function(e){
        e.preventDefault();
        copyToClipboard( $(this).attr('href') );
        alert("L'adresse a bien été copiée");
    });

    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(element).select();
        document.execCommand("copy");
        $temp.remove();
    }


  
});



