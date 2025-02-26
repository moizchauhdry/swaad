@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">{{session('lan') == 'en' ? 'What We Serve' : 'Über unser Essen'}}</h1>
            </div>
        </div>
    </div>
</div>

@if (session('lan') == 'en')
<div class="container">
    <div class="col-md-12 p-5">
        <h4 class="text-primary text-center">We really care what you eat in our restaurant!</h4>
        <h4 class="text-primary">Himalaya Salt</h4>
        <p class="text-justify">
            At Swaad we cook with Himalaya salt which makes the taste unmatched. Pink Himalayan salt comes from seabed
            and although commonly referred to as a spice, this product is actually a mineral. It is a natural, very
            coarse-grained salt and contains many minerals. In raw form it contains negligible amounts of calcium,
            magnesium, potassium, sulfates, and moisture; it also contains iron, zinc, copper, manganese, chromium, and
            lead as trace elements. Pink salt is used the same way table salt would be used in cooking and baking.
            However, Himalayan pink salt is higher in mineral content than traditional table salt. It is considered a
            true gourmet cooking salt by top chefs. It also adds an interesting pink color and different texture to
            foods which can bring something special to your Plate/Table. This salt is a wonderful ingredient in
            grilling, cooking, roasting and seasoning foods.
        </p>
        <h4 class="text-primary">Basmati Rice</h4>
        <p class="text-justify">
            Basmati rice is one of the most widely used ingredients in many cuisines around the world. Its unique taste
            and aroma are the driving force behind its worldwide popularity and success. When cooked properly, the taste
            of basmati rice will satisfy your taste buds. <br>
            We use Basmati rice imported from Pakistan. The best growing area can be found in the Kashmir Valley and the
            Valley of five rivers namely Punjab, at the foot of the Himalayas. It is a long grain rice with a typical
            aromatic scent. By the way, the word Basmati means "fragrance" in Hindi. The taste is slightly nutty. <br>
        </p>
        <p class="text-justify"> 100 g uncooked basmati rice contains the following nutrients:
            <ul>
                <li>Energy: 354 kcal or 1482 kJ</li>
                <li>Fat: 0.9 g, of which 0.3 g are saturated fatty acids</li>
                <li>Carbohydrates: 78 g, of which 0.3 g is sugar</li>
                <li>Protein: 9 g</li>
                <li>Dietary fiber: 2.2 g</li>
            </ul>
        </p>
        <h4 class="text-primary">Spices</h4>
        <p class="text-justify">
            All spices, used in our restaurant, are authentic Pakistani /Indian spices or their mixtures. Some of them
            are supplied directly from Pakistan/India. We carefully combine spices with other ingredients, in order they
            not only would be consistent with each other, but also have the most positive impact on your health. These
            spices are not only delicious, but also very flavorful, so start tasting our dishes with nose – you will
            smell the diversity of flavors in our soups and stews, and then taste them. You will see, once tried, you
            could not stop.
        </p>
        <h4 class="text-primary">Turmeric</h4>
        <p class="text-justify">
            Having an earthy odor, turmeric has a pungent flavor. It has a little bitter, peppery like mustard and a
            slight ginger flavor in it. Turmeric is used for cooking and also as a coloring agent. An Indian spicy
            recipe without turmeric may not have the desired flavor of the dish. In India, it is commonly called as
            Haldi. <br>
            Turmeric is widely grown for its rhizomes which are consumed as a bright yellow-orange cooking spice.
            Curcumin is the chief pigment in turmeric and is usually used in a variety of food industries as a coloring
            agent. Turmeric is primarily used in dairy foods, cereals, beverages, cereal, ice cream, bakery products and
            savory foodstuffs. It is also used in flavored milk drinks, refined milk, desserts, and confectionaries to
            attain lemon and banana colors in dairy products. <br>
            At greater levels, turmeric is added to sausages, pickles, relishes, sauces, and dry mixes due to its unique
            convention as a spice. Storage of turmeric should be in sealed air-tight containers away from sunlight. If
            not stored properly, turmeric can lose its aroma quickly. It is mainly contained in curry powders and to
            give a good flavor to rice dishes and sauces. <br>
            Turmeric also contains flavonoid curcumin, well-known for its anti-inflammatory properties. As per medical
            reports, turmeric detoxifies the liver, fights allergies, stimulates digestion and boosts immunity. In the
            early days, women used to have a bath using a paste of turmeric and oil (ubtan) as it is good for the skin.
        </p>
        <h4 class="text-primary">Phool Makhana (Lotus seeds)</h4>
        <p class="text-justify">
            Makhanas are also known as fox nuts, Euryale ferox, lotus seeds, gorgon nuts and phool makhana. At Swaad we
            use makhanas in raita, curry, breads and can be eaten as tea snack or starter. <br>
            Lotus seeds are highly nutritious food, packed with essential components including proteins, fibers,
            vitamins, minerals and antioxidants. They offer numerous advantages for human health such as improving sleep
            patterns, promoting weight loss, managing diabetes symptoms, enhancing nervous system activity and slowing
            down ageing. Lotus seeds are an ideal addition to the diet to boost physical and mental wellness.
        </p>
        
        <h4 class="text-primary">Meat Products </h4>
        <p class="text-justify">
            Our meat products are very high quality, which we get from Spahni AG, this is one of the oldest butcher shop
            established in 1863 in Ostermundigen, Bern. Spahni AG advocates actively on ethical principles based on
            animal welfare and promote the natural and appropriate keeping of slaughter animals. The protection of the
            resources, pollution prevention and the economical use of energy is part of planning and daily business.
            Spahni AG, do everything to ensure that their products are hygienic, flawless and of high quality to promote
            consumer health.
        </p>
        <h4 class="text-primary">Freshly made drinks </h4>
        <p class="text-justify">
            In our Restaurant we make different drinks such as Leemo Panni, Ginger Tea, Ice Tea and Lassi. Leemo Pani is
            made of fresh lime juice, Himalaya salt, fresh mint leaves, soda water. we make freshly natural ginger tea,
            flavored with lemon and natural honey. Ginger has the same health benefit as garlic, It helps against cold,
            inflammation and strengthens the immune system. In addition, it tones and refreshes, therefore, it is
            perfect for both cold winter and hot summer day. Natural yoghurt drink Lassi is made according to the
            original recipe, in our restaurant. It is cold and refreshing, moreover, is an excellent source of calcium.
            Natural yogurt drink is a great choice, our lassi is always freshly made for you only after order. <br>
            We care about the health of our customers, thus, we sincerely recommend our house made drinks.
        </p>
    </div>
</div>
@else
<div class="container">
    <div class="col-md-12 p-5">
        <h4 class="text-primary text-center">Gesunde und köstliche Zutaten sind der Schlüssel zum Geschmack!
        </h4>
        <h4 class="text-primary">Himalaya Salz
        </h4>
        <p class="text-justify">
            Für den unvergleichlichen Geschmack kochen wir ausschliesslich mit rosa
            Steinsalz aus dem Himalaya.
            Himalaya-Salz ist ein Naturprodukt und sehr reich an Mineralien. Es enthält
            unter anderem Kalzium, Magnesium, Zink, Kupfer und Mangan - und sogar
            Spuren von Gold!
            Dieses Salz ist eine wunderbare, gesunde Zutat und zeichnet sich durch einen
            unerreichten sanften Geschmack aus.
        </p>
        <h4 class="text-primary">Basmati Reis
        </h4>
        <p class="text-justify">
            «Basmati» bedeuted Duft auf Hindi. Der langkörnige Basmati-Reis wird weltweit
            verwendet und für seinen exquisiten Geschmack geliebt. Es bedarf einiger
            Erfahrung, um dem Reis sein bestes, leicht nussiges Aroma zu entlocken.
        </p>
        <p class="text-justify">
            Wir importieren den Basmati-Reis aus dem besten Anbau-Gebiet in Pakistan. Er
            wächst am Fusse des Himalayas im Kaschmir und im Tal der fünf Flüsse.
        </p>
        <p class="text-justify"> 100 g ungekochter Basmati enthält folgende Nährstoffe:
            <ul>
                <li> Energiewert: 354 kcal or 1482 kJ</li>
                <li>Fett: 0.9 g, davon 0.3 g gesättigte Fettsäuren</li>
                <li>Kohlenhydrate: 78 g, davon bloss 0.3 g Zucker</li>
                <li>Eiweiss: 9 g</li>
                <li> Ballaststoffe: 2.2</li>
            </ul>
        </p>
        <h4 class="text-primary">Gewürze</h4>
        <p class="text-justify">
            Wir verwenden authentische Gewürze und Gewürzmischungen, welche wir
            direkt aus Pakistan und Indien importieren oder im Haus selber zusammen
            stellen. Bei der Komposition der Gewürze achten wir nicht nur auf einen
            harmonischen Geschmack, sondern auch dass die einzelnen Zutaten der
            Gesundheit förderlich sind.
        </p>
        <p class="text-justify">
            Im «Swaad» beginnt der Genuss des Essens bereits mit dem Geruch der
            Gewürze, die für den köstlichen Geschmack sorgen.
        </p>
        <h4 class="text-primary">Kurkuma</h4>
        <p class="text-justify">
            Kurkuma ist ein wahres Superfood: Äusserst gesund wegen seiner
            entzündungshemmenden Eigenschaften, sehr geschmacksvoll und auch als
            natürlicher Farbgeber sehr geschätzt.
        </p>
        <p class="text-justify">
            Kurkuma ist ein Wurzelrhizom, welches zu einem leuchtend gelb-orangen
            Gewürz verarbeitet wird. Der Geschmack von Kurkuma ist erdig, leicht bitter
            und scharf zugleich. Ohne diese unverzichtbare Zutat fehlt vielen indischen
            Gerichten, der typische Geschmack oder auch die typische Farbe. In Indien ist es
            unter dem Namen «Haldi» bekannt.
        </p>
        <p class="text-justify">
            Ob herzhaft oder süss, ob Hauptmahlzeit oder Dessert, ob Milchshake, Pickles
            oder Fleischware: Kaum eine Zutat ist so vielfältig einsetzbar, wie Kurkuma!
        </p>
        <p class="text-justify">
            Zudem erhält Kurkuma die Gesundheit. Es wirkt entgiftend,
            entzündungshemmend und stärkt das Immunsystem. Ein Bad in Kurkuma
            pflegt die Haut.
        </p>
        <h4 class="text-primary">Phool Makhana (Lotus Samen)
        </h4>
        <p class="text-justify">
            Im «Swaad» benutzen wir Lotus Samen hauptsächlich für Raita, Curry und Brot.
            Aber auch für Vorspeisen oder Snacks.
        </p>
        <p class="text-justify">
            Ebenso vielfältig sind die gesundheitlichen Vorteile von Lotus Samen: Sie
            enthalten wertvolle Proteine, Vitamine, Antioxidantien, sowie Mineralien und
            Ballaststoffe. Sie haben einen positiven Einfluss auf den Schlafzyklus und
            wirken beruhigend. Sie können den Alterungsprozess verlangsamen und bei
            Diabetes helfen. Lotus Samen sind ein Superfood für Körper und Geist.
        </p>
        
        <h4 class="text-primary">Fleisch </h4>
        <p class="text-justify">
            Unsere Fleischprodukte sind allerbester Qualität. Wir werden von Spahni AG
            beliefert, dem ältesten Metzgerei-Geschäft Berns, gegründet 1863 in
            Ostermundigen
        </p>
        <p class="text-justify">
            Die Metzgerei Spahni ist ein Familienbetrieb und setzt alles daran, dass die
            Fleisch-Produkte hygienisch einwandfrei und mit tadelloser Qualität hergestellt
            werden. Der Betrieb arbeitet nach einer Vielzahl von ethischen Grundsätzen.
            Die natur-und artgerechte Tierhaltung ist seit Generationen eine
            Selbstverständlichkeit. Die Schonung der Ressourcen, das Vermeiden von
            Umweltverschmutzung und der sparsame Umgang mit Energie ist Teil der
            Planung und des Tagesgeschäfts.
        </p>
        <h4 class="text-primary">Frische Getränke ( Leemo Panni, Ingwer Tee, Ice Tea und Lassi)
        </h4>
        <p class="text-justify">
            Wir stellen viele verschiedene Getränke im «Swaad» täglich frisch her. So
            vermeiden wir künstliche Zusätze und können gesunde und köstliche Getränke
            anbieten.
        </p>
        <p>
            Leemo Pani besteht aus frischem Lime-Saft, Minze, Soda-Wasser und einer Prise
            Salz.
            Für den Ingwer Tee verwenden wir frischen Ingwer, sowie Zitrone und Honig.
            Ingwer stärk und erfrischt, hilft gegen Erkältungen und Entzündungen. Perfekt
            für Winter und Sommer.
            Lassi ist ein Getränk auf Basis von Natur-Yoghurt und wird nach einem alten
            Familien-Rezept hergestellt. Lassi ist ein erfrischendes Kaltgetränk und wird
            direkt nach der Bestellung frisch zubereitet.
        </p>
    </div>
</div>
@endif

@endsection