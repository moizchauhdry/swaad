@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">About Us</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-md-12 p-5">
        <h5 class="text-primary">Swaad is a word of Punjabi and Hindi Language, which literally means
            “Taste”</h5>
        <p class="text-justify">
            Swaad is our passion and we passionately welcome you in our restaurant with unmatched taste and variety. We
            use fresh vegetables from the region, our meat comes from Berns oldest butscher shop (Spahni AG), herbs and
            spices from Pakistan and India, tea from Himalaya region and long grain basmati rice from the fields of
            Punjab and pink Himalaya Salt from the world’s biggest salt mine in Pothohar range of Pakistan.
        </p>
        <h5 class="text-primary">Indian Cuisine</h5>
        <p class="text-justify">
            Indian cuisine consists of a variety of regional and traditional cuisines native to the Indian subcontinent.
            Given the diversity in soil, climate, culture, ethnic groups, and occupations these cuisines vary
            substantially and use locally available spices, herbs, vegetables, and fruits. Indian food is also heavily
            influenced by religion, cultural choices and traditions. Centuries of Islamic rule, particularly by the
            Mughals, also introduced dishes like samosa and pilaf. <br>
            The name "India" is originally derived from the name of the river Sindhu (Indus River) and has been in use
            in Greek since Herodotus (4th century BCE). The term appeared in old english as early the 9th century and
            reemerged in modern English in the 17th century. Communities living in and around Indus Valley are called
            Indian which is in today’s Pakistan. It means term “Indian Cuisine” is in use for Pakistani, Kashmiri, south
            Indian, Punjabi, Mughalai and other regional cuisines of Indian subcontinent.
        </p>
        <h3 class="text-primary text-center p-2">Our Mission</h3>
        <p class="text-justify">
            Swaad is an Indian sub continental restaurant serving Pakistani, Kashmiri, Indian and Mughalei food along
            with some local delicacies from the cuisine of Punjab, a very healthy cuisine.
            We believe in serving Indian sub continental recipes made simply with freshly prepared house blend of
            spices. All our spices are sourced from local spice (Pakistani & Indian) farmers and we love to support them
            through, to strive environmental harmony and in return they enhance spices of delicious flavors. <br>
            We at Swaad have an ambitious plan to educate, help and support the children of rural Punjab. For this
            purpose we pledge 5% of our profit for child welfare projects in Punjab, Pakistan.

        </p>
        <section>
            <div class="row p-2">
                <div class="col-md-6">
                    <h5 class="text-primary">Zafar Khan</h5>
                    <p class="text-justify">
                        Zafar Khan is Manager at Swaad, having 16 years of extensive experience in hospitality
                        management. He is specialized on South Asian Geo-Political and Socio-cultural issues and
                        intercultural conflict management. He will be there to explain the nutrition value of our food,
                        historical background and use of different vegetables, herbs spices and their significance in
                        verity of Indian sub continental cuisine and cultures.
                    </p>
                    <img src="{{asset('public/frontend/images/ZafarKhan.jpg')}}" alt="IMAGE" class="img-thumbnail w-50">
                </div>
                <div class="col-md-6">
                    <h5 class="text-primary">Tariq Masih</h5>
                    <p class="text-justify">
                        Tariq Masih is Chef Cook at Swaad. His culinary journey began in Pakistan where he finished his
                        education as cook. His expertise ranges from continental cuisine, Italian cuisine to Indian
                        cuisine. He has over 19 years of experience of cooking from Pearl Continental to one of biggest
                        catering firms in Pakistan to one of the successful restaurants in the city of Bern.
                    </p>
                    <br>
                    <img src="{{asset('public/frontend/images/TariqMasih.jpeg')}}" alt="IMAGE"
                        class="img-thumbnail w-50">
                </div>
            </div>
        </section>
    </div>
</div>

@endsection