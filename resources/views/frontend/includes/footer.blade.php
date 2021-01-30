<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">
                    {{session('lan') == 'en' ? 'Subcribe to our Newsletter' : 'Abonnieren Sie unseren Newsletter'}}</h2>
                <span>{{session('lan') == 'en' ? 'Get e-mail updates about our latest shops and special offers' : 'Erhalten Sie E-Mail-Updates zu unseren neuesten Shops und Sonderangeboten'}}</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control"
                            placeholder="{{session('lan') == 'en' ? 'Enter email address' : 'E-Mail Adresse eingeben'}}">
                        <input type="submit" value="{{session('lan') == 'en' ? 'Subscribe' : 'Abonnieren'}}"
                            class="submit px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row">
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div>
        <div class="row mb-5 col-md-12">
            <div class="col-md-6">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">SWAAD</h2>
                    <p class="text-justify">
                        {{session('lan') == 'en' ? 'Swaad is our passion and we passionately welcome you in our restaurant with unmatched taste and variety. We use fresh vegetables from the region, our meat comes from Berns oldest butscher shop (Spahni AG), herbs and spices from Pakistan and India, tea from Himalaya region and long grain basmati rice from the fields of Punjab and pink Himalaya Salt from the world’s biggest salt mine in Pothohar range of Pakistan.' : 'Swaad ist unsere Leidenschaft und wir begrüßen Sie leidenschaftlich in unserem Restaurant mit unvergleichlichem Geschmack und Abwechslung. Wir verwenden frisches Gemüse aus der Region, unser Fleisch stammt aus Berns ältestem Butscherladen (Spahni AG), Kräutern und Gewürzen aus Pakistan und Indien, Tee aus der Himalaya-Region und langkörnigem Basmatireis aus den Feldern Punjab und rosa Himalaya-Salz aus der Welt größtes Salzbergwerk in Pothohar in Pakistan.'}}
                    </p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="https://fb.me/swaadbern" target="_blank"><span
                                    class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.instagram.com/swaadbern/" target="_blank"><span
                                    class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{session('lan') == 'en' ? 'Help & Support' : 'Hilfe Unterstützung'}}
                    </h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><a href="{{route('about')}}"
                                    class="py-2 d-block">{{session('lan') == 'en' ? 'About us' : 'Über uns'}}</a>
                            </li>
                            <li><a href="{{route('serve')}}"
                                    class="py-2 d-block">{{session('lan') == 'en' ? 'What We Serve' : 'Was wir servieren'}}</a>
                            </li>
                            <li><a href="{{route('termsCondition')}}"
                                    class="py-2 d-block">{{session('lan') == 'en' ? 'Terms & Conditions' : 'Terms & Bedingungen'}}</a>
                            </li>
                            <li><a href="{{route('privacy')}}"
                                    class="py-2 d-block">{{session('lan') == 'en' ? 'Privacy Policy' : 'Datenschutz-Bestimmungen'}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{session('lan') == 'en' ? 'Have a Questions?' : 'Haben Sie Fragen?'}}
                    </h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li class="mb-2"><span class="icon icon-map-marker"></span><span class="text">Swaad Foods
                                    Gmbh <br> 3072 Ostermundigen</span></li>
                            <li class="mb-2"><span class="icon icon-phone"></span><span class="text">031 558 33
                                    88</span></li>
                            <li><span class="icon icon-envelope"></span><span class="text">hello@swaadbern.ch</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    {{session('lan') == 'en' ? 'Copyright' : 'Urheberrechte'}} &copy;<script>
                        document.write(new Date().getFullYear());
                    </script>{{session('lan') == 'en' ? ' All rights reserved.' : ' Alle Rechte vorbehalten.'}}</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
            stroke="#F96D00" /></svg></div>