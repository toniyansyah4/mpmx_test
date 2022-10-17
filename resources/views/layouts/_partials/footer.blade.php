<footer>
    <div class="container-fluid row align-items-center vmobile-footer">
        <div class="icon-jasa col-12 col-md-5 d-flex align-items-start">
            <div class="img-1">
                <img src="{{asset('')}}img/icon/image 20.png" alt="">
            </div>
            <div class="img-2">
                <img src="{{asset('')}}img/icon/image 9.png" alt="">
            </div>
            <div class="img-3">
                <img src="{{asset('')}}img/icon/image 8.png" alt="">
            </div>
        </div>
        <div class="copyright col-12 col-md-3">
            <p class="text-black">Copyright &copy; PT Asuransi Tri Pakarta 2020</p>
        </div>
        <div class="icon-sosmed col-12 col-md-3">
            <p>Follow us :</p>
            <a href="{{$setting->url_facebook}}"><img src="{{asset('')}}img/icon/image 6.png" alt=""></a>
            <a href="{{$setting->url_twiter}}"><img src="{{asset('')}}img/icon/image 5.png" alt=""></a>
            <a href="{{$setting->url_instagram}}"><img src="{{asset('')}}img/icon/image 7.png" alt=""></a>
        </div>
    </div>

</footer>
<style>
    .sc-launcher.custom-open-icon.open-image.close-color {
        right: 20px !important;
    }
</style>
<script>
 var lennawebchat = document.createElement('script'); lennawebchat.src = "https://platform.tripakarta.co.id/webchat/lenna-init.js";var app = document.createElement('script');app.src = "https://platform.tripakarta.co.id/webchat/app.js";document.head.prepend(lennawebchat);document.head.prepend(app);lennawebchat.onload = function () {LennaWebchatInit('lejRRe')};
</script>
