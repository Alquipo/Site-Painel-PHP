$(function () {
    let curSlide = 0;

    let maxSlide = $(".banner-single").length - 1;

    let delay = 5;

    initSlider();
    changeSlide();

    function initSlider() {
        $(".banner-single").hide();
        $(".banner-single")
            .eq(0)
            .show();
        for (let i = 0; i < maxSlide + 1; i++) {
            let content = $(".bullets").html();
            if (i == 0) content += '<span class="active-slider"></span>';
            else content += "<span></span>";

            $(".bullets").html(content);
        }
    }

    function changeSlide() {
        setInterval(function () {
            $(".banner-single").eq(curSlide).stop().fadeOut(2000);
            curSlide++;
            if (curSlide > maxSlide) {
                curSlide = 0;
            }
            $(".banner-single").eq(curSlide).stop().fadeIn(2000);

            //trocar bullets da navegação do slider
            $(".bullets span").removeClass("active-slider");
            $(".bullets span").eq(curSlide).addClass("active-slider");
        }, delay * 1000);
    }
    //evento por click no controle do slider
    $("body").on("click", ".bullets span", function () {
        let currentBullet = $(this);
        $(".banner-single").eq(curSlide).stop().fadeOut(1000);
        curSlide = currentBullet.index();
        $(".banner-single").eq(curSlide).stop().fadeIn(1000);
        $(".bullets span").removeClass("active-slider");
        currentBullet.addClass("active-slider");
    });
});