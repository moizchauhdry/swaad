@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">{{session('lan') == 'en' ? 'About Us' : 'Über uns'}}</h1>
            </div>
        </div>
    </div>
</div>

@if (session('lan') == 'en')
<div class="container">
    <div class="col-md-12 p-5">
        <h5 class="text-primary">“Swaad” bedeutet “Geschmack”
            - und schmackhaftes Essen ist unsere Passion!
        </h5>
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
                    <img src="{{asset('public/frontend/images/owner.jpeg')}}" alt="IMAGE" class="img-thumbnail w-50">
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
                    <img src="{{asset('public/frontend/images/chef.jpeg')}}" alt="IMAGE"
                        class="img-thumbnail w-50">
                </div>
            </div>
        </section>
    </div>
</div>
@else
<div class="container">
    <div class="col-md-12 p-5">
        <h5 class="text-primary">Swaad is a word of Punjabi and Hindi Language, which literally means
            “Taste”</h5>
        <p class="text-justify">
            “Swaad” ist unsere Leidenschaft und wir heissen Sie herzlich Willkommen in
            unserem Restaurant. Wir servieren eine grosse Auswahl an pakistanischen und
            indischen Speisen mit unvergleichlichem Geschmack.
        </p>
        <p class="text-justify">
            Der Schlüssel zum Geschmack liegt in den Zutaten. Das Gemüse kommt stets
            frisch von lokalen Produzenten und das Fleisch beziehen wir von der Metzgerei
            Spahni, dem ältesten Metzgerei-Geschäft Berns. Der lang-körnige Basmati-Reis
            kommt von den fruchtbaren Feldern des Punjabs. Kräuter und Gewürze
            importieren wir direkt aus Pakistan und Indien. Das rosa Himalaya-Steinsalz
            kommt aus der weltgrössten Salzmine in Pothohar, Pakistan. Der Tee von
            unterschiedlichen Plantagen in der Himalya-Region.
        </p>
        <h5 class="text-primary">Indische Küche
        </h5>
        <p class="text-justify">
            Es gibt nicht die eine indische Küche. Der indische Subkontinent bietet eine
            unendliche Vielfalt an regional und traditionell unterschiedlichen Küchen. Diese
            Küchen-Vielfalt korrespondiert mit den Unterschieden in Klima und Boden, aber
            auch der diversen Kulturen und Ethnien. Die lokal vorhandenen Gewürze,
            Früchte, sowie Gewürze und Kräuter beeinflussen die regionalen Küchen. Eine
            Schlüsselrolle kommt auch der religiösen Tradition zu. Durch die Jahrhunderte
            lange Herrschaft der islamischen Mughals wurden zum Beispiel Gerichte wie
            Samosa oder Pilaf eingeführt.
        </p>
        <p class="text-justify">
            Die Bezeichnung «India» kommt von «Sindhu», also dem Fluss Indu, dem
            längsten Strom des Subkontinentes. Zum ersten Mal wird der Name beim
            Griechen Herodot im 4. Jahundert vor Christus benutzt. Gemeint war die IndusTal-Zivilisation, aber auch alle
            Gebiete jenseits des Flusses.
        </p>
        <p class="text-justify">
            Wenn wir von Indischer Küche sprechen, meinen wir die gesamte kulinarische
            Vielfalt des Subkontinents, von Pakistan und Kaschmir, über Punjab und
            Mughalai, bis nach Süd-Indien.
        </p>
        <p class="text-justify">
            Ein unglaublicher Reichtum an Gerichten und Geschmack!
        </p>
        <h3 class="text-primary text-center p-2">Our Mission</h3>
        <p class="text-justify">
            Im «Swaad» servieren wir sehr gesundes Essen in der Tradition des indischen
            Subkontinents.
        </p>
        <p class="text-justify">
            Speziellen Wert legen wir auf unsere hausgemachten, frisch zubereiteten
            Gewürzmischungen. Wir kennen unsere lokalen Produzenten in Pakistan und
            Indien. Wir unterstützen sie darin naturnah und nachhaltig zu produzieren, weil
            dies der beste Weg ist, hochwertige Gewürze mit köstlichem Geschmack zu
            erhalten.
        </p>
        <p class="text-justify">
            Es ist unsere Mission den ländlichen Gegenden im Punjab etwas zurück zu
            geben. Wir sind überzeugt, dass die Bildung der jungen Generation der beste
            Weg aus der Armut ist. Hilfe zur Selbsthilfe. Deshalb spenden wir 5% unseres
            Profits an Kinderhilfs-Projekte im pakistanischen Punjab.
        </p>
        <section>
            <div class="row p-2">
                <div class="col-md-6">
                    <h5 class="text-primary">Zafar Khan</h5>
                    <p class="text-justify">
                        Zafar Khan ist der Manager. Er sorgt nicht nur dafür, dass sich alle Gäste im
                        «Swaad» wohlfühlen. Als studierter Spezialist für Pakistan und Indien ist er
                        auch der richtige Ansprechpartner für alle Fragen zu Kultur und Historie der
                        indischen Küche.
                    </p>
                    <img src="{{asset('public/frontend/images/owner.jpeg')}}" alt="IMAGE" class="img-thumbnail w-50">
                </div>
                <div class="col-md-6">
                    <h5 class="text-primary">Tariq Masih</h5>
                    <p class="text-justify">
                        Tariq Masih ist der Chefkoch im «Swaad» und somit auch verantwortlich für den
                        unvergleichlichen Geschmack! Er wurde in Pakistan zum Koch ausgebildet und
                        arbeitet seit 20 Jahren in hochklassigen Küchen in verschiedenen Ländern von
                        Pakistan bis in die Schweiz.
                    </p>
                    <img src="{{asset('public/frontend/images/chef.jpeg')}}" alt="IMAGE"
                        class="img-thumbnail w-50">
                </div>
            </div>
        </section>
    </div>
</div>
@endif

@endsection