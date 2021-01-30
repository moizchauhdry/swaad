@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">{{session('lan') == 'en' ? 'Privacy Policy' : 'Datenschutz-Bestimmungen'}}</h1>
            </div>
        </div>
    </div>
</div>

@if (session('lan') == 'en')
<div class="container">
    <div class="col-md-12 p-5">
        <h5 class="text-primary">Privacy Note</h5>
        <p class="text-justify">
            Thank you for choosing to be part of our community at Swaad Foods GmbH ("Company", "we", "us", "our"). We
            are committed to protecting your personal information and your right to privacy. If you have any questions
            or
            concerns about this privacy notice, or our practices with regards to your personal information, please
            contact us at
            admin@swaadbern.ch.
        </p>
        <p class="text-justify">
            When you visit our website <a href="{{route('index')}}">http://www.swaadbern.ch</a> (the "Website"), use our
            mobile
            application, as the case
            may be (the "App") and more generally, use any of our services (the "Services", which include the Website
            and
            App), we appreciate that you are trusting us with your personal information. We take your privacy very
            seriously.
            In this privacy notice, we seek to explain to you in the clearest way possible what information we collect,
            how we
            use it and what rights you have in relation to it. We hope you take some time to read through it carefully,
            as it is
            important. If there are any terms in this privacy notice that you do not agree with, please discontinue use
            of our
            Services immediately.
        </p>
        <p class="text-justify">
            This privacy notice applies to all information collected through our Services (which, as described above,
            includes
            our Website and App), as well as, any related services, sales, marketing or events.
        </p>
        <p class="text-justify">
            Please read this privacy notice carefully as it will help you understand what we do with the information
            that we
            collect.
        </p>
        <h5 class="text-primary">TABLE OF CONTENTS</h5>
        <ol>
            <li>WHAT INFORMATION DO WE COLLECT?</li>
            <li>HOW DO WE USE YOUR INFORMATION?</li>
            <li>WILL YOUR INFORMATION BE SHARED WITH ANYONE?</li>
            <li>DO WE USE COOKIES AND OTHER TRACKING TECHNOLOGIES? </li>
            <li>DO WE USE GOOGLE MAPS PLATFORM APIS?</li>
            <li>HOW DO WE HANDLE YOUR SOCIAL LOGINS?</li>
            <li>HOW LONG DO WE KEEP YOUR INFORMATION?</li>
            <li>HOW DO WE KEEP YOUR INFORMATION SAFE?</li>
            <li>WHAT ARE YOUR PRIVACY RIGHTS?</li>
            <li>CONTROLS FOR DO-NOT-TRACK FEATURES</li>
            <li>DO CALIFORNIA RESIDENTS HAVE SPECIFIC PRIVACY RIGHTS?</li>
            <li>DO WE MAKE UPDATES TO THIS NOTICE? </li>
            <li>HOW CAN YOU CONTACT US ABOUT THIS NOTICE?</li>
            <li>HOW CAN YOU REVIEW, UPDATE OR DELETE THE DATA WE COLLECT FROM YOU?</li>
        </ol>
        <h5 class="text-primary">1. WHAT INFORMATION DO WE COLLECT?</h5>
        <b class="text-primary">Personal information you disclose to us</b>
        <p>In Short: We collect personal information that you provide to us.</p>
        <p>We collect personal information that you voluntarily provide to us when you register on the Services, express
            an
            interest in obtaining information about us or our products and Services, when you participate in activities
            on the
            Services or otherwise when you contact us. The personal information that we collect depends on the context
            of
            your interactions with us and the Services, the choices you make and the products and features you use. The
            personal information we collect may include the following:</p>
        <p><b class="text-primary">Personal Information Provided by You.</b> We collect names; phone numbers; email
            addresses; mailing
            addresses;
            passwords; usernames; billing addresses; debit/credit card numbers; and other similar information</p>
        <p>
            <b class="text-primary">Payment Data. </b> We may collect data necessary to process your payment if you make
            purchases, such as
            your
            payment instrument number (such as a credit card number), and the security code associated with your payment
            instrument. All payment data is stored by 6 payment gateway. You may find their privacy notice link(s) here:
            https://www.siX-payment- services.com/en/services/legal/privacy-statement.html.
        </p>
        <p><b class="text-primary">Social Media Login Data.</b> We may provide you with the option to register with us
            using your existing
            social
            media
            account details, like your Facebook, Twitter or other social media account. If you choose to register in
            this way, we
            will collect the Information described in the section called "HOW DO WE HANDLE YOUR SOCIAL LOGINS" below.
        </p>
        <p>All personal information that you provide must be true, complete and accurate and you must notify us of any
            changes to such personal information</p>

        <p><b class="text-primary">Information automatically collected</b></p>
        <p>
            In Short: Some information-such as your Internet Protocol (IP) address and/or browser and device
            characteristics -
            is collected automatically when you visit our Services.
        </p>
        <p>We automatically collect certain information when you visit, use or navigate the Services. This information
            does
            not reveal your specific identity (like your name or contact information) but may include device and usage
            information, such as your IP address, browser and device characteristics, operating system, language
            preferences,
            referring URLS, device name, country, location, information about how and when you use our Services and
            other
            technical information. This information is primarily needed to maintain information through cookies and
            similar
            technologies</p>
        <p><b class="text-primary">Information collected through our App</b></p>
        <p>
            In Short: We collect information regarding your geo-location, push notifications, when you use our App.
        </p>
        <p>If you use our App, we also collect the following information: </p>
        <p>
            <ul>
                <li>Geo-Location Information. We may request access or permission to and track location-based
                    information
                    from your mobile device, either continuously or while you are using our App, to provide certain
                    locationbased services. If you wish to change our access or permissions, you may do so in your
                    device's settings.</li>
                <li>
                    Push Notifications. We may request to send you push notifications regarding your account or certain
                    features of the App. If you wish to opt-out from receiving these types of communications, you may
                    turn
                    them off in your device's settings.
                </li>
            </ul>
        </p>
        <p>
            This information is primarily needed to maintain the security and operation of our App, for troubleshooting
            and for
            our internal analytics and reporting purposes.
        </p>

        <h5 class="text-primary">2. HOW DO WE USE YOUR INFORMATION?</h5>
        <p>In Short: We process your information for purposes based on legitimate business interests, the fulfillment of
            our
            contract with you, compliance with our legal obligations, and/or your consent.
        </p>
        <p>We use personal information collected via our Services for a variety of business purposes described below. We
            process your personal information for these purposes in reliance on our legitimate business interests, in
            order to
            enter into or perform a contract with you, with your consent, and/or for compliance with our legal
            obligations. We
            indicate the specific processing grounds we rely on next to each purpose listed below.</p>
        <p>We use the information we collect or receive:</p>
        <p>
            <ul>
                <li>To facilitate account creation and logon process. If you choose to link your account with us to a
                    third-party
                    account (such as your Google or Facebook account), we use the information you allowed us to collect
                    from those third parties to facilitate account creation and logon process for the performance of the
                    contract. See the section below headed "HOW DO WE HANDLE YOUR SOCIAL LOGINS" for further
                    information.</li>
                <li>To post testimonials. We post testimonials on our Services that may contain personal information.
                    Prior to
                    posting a testimonial, we will obtain your consent to use your name and the content of the
                    testimonial. If
                    you wish to update, or delete your testimonial, please contact us at admin@swaadbern.ch and be sure
                    to
                    include your name, testimonial location, and contact information</li>
                <li>Request feedback. We may use your information to request feedback and to contact you about your use
                    of our Services.</li>
                <li>To enable user-to-user communications. We may use your information in order to enable user-to-user
                    communications with each user's consent</li>
                <li>To manage user accounts. We may use your information for the purposes of managing our account and
                    keeping it in working order.
                </li>
                <li>To send administrative information to you. We may use your personal information to send you product,
                    service and new feature information and/or information about changes to our terms, conditions, and
                    policies.</li>
                <li>
                    To protect our Services. We may use your information as part of our efforts to keep our Services
                    safe and
                    secure (for example, for fraud monitoring and prevention).
                </li>
                <li>To enforce our terms, conditions and policies for business purposes, to comply with legal and
                    regulatory
                    requirements or in connection with our contract.</li>
                <li>To respond to legal requests and prevent harm. If we receive a subpoena or other legal request, we
                    may
                    need to inspect the data we hold to determine how to respond.</li>
                <li>Fulfill and manage your orders. We may use your information to fulfill and manage your orders,
                    payments, returns, and exchanges made through the Services. </li>
                <li>Administer prize draws and competitions. We may use your information to administer prize draws and
                    competitions when you elect to participate in our competitions.</li>
                <li>To deliver and facilitate delivery of services to the user. We may use your information to provide
                    you with
                    the requested service.</li>
                <li>To respond to user inquiries/offer support to users. We may use your information to respond to your
                    inquiries and solve any potential issues you might have with the use of our Services.
                </li>
                <li>For other business purposes. We may use your information for other business purposes, such as data
                    analysis, identifying usage trends, determining the effectiveness of our promotional campaigns and
                    to
                    evaluate and improve our Services, products, marketing, and your experience. We may use and store
                    this
                    information in aggregated and anonymized form so that it is not associated with individual end users
                    and
                    does not include personal information. We will not use identifiable personal information without
                    your
                    consent.</li>
            </ul>
        </p>
        <h5 class="text-primary">3. WILL YOUR INFORMATION BE SHARED WITH ANYONE?</h5>
        <p>In Short: We only share information with your consent, to comply with laws, to provide you with services, to
            protect your rights, or to fulfill business obligations.
        </p>
        <p>We may process or share your data that we hold based on the following legal basis:
        </p>
        <p>
            <ul>
                <li>Consent: We may process your data if you have given us specific consent to use your personal
                    information
                    for a specific purpose.</li>
                <li>Legitimate Interests: We may process your data when it is reasonably necessary to achieve our
                    legitimate
                    business interests.</li>
                <li>Performance of a Contract: Where we have entered a contract with you, we may process your personal
                    information to fulfill the terms of our contract. </li>
                <li>Legal Obligations: We may disclose your information where we are legally required to do so to comply
                    with applicable law, governmental requests, a judicial proceeding, court order, or legal process,
                    such as in
                    response to a court order or a subnoena (including in response to public authorities to meet
                    national
                    security or law enforcement requirements).</li>
                <li>Vital Interests: We may disclose your information where we believe it is necessary to investigate,
                    prevent,
                    or act regarding potential violations of our policies, suspected fraud, situations involving
                    potential threats
                    to the safety of any person and illegal activities, or as evidence in litigation in which we are
                    involved.</li>
            </ul>
        </p>
        <p>More specifically, we may need to process your data or share your personal information in the following
            situations:
        </p>
        <ul>
            <li>Business Transfers. We may share or transfer your information in connection with, or during negotiations
                of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to
                another company.
            </li>
        </ul>
        <h5 class="text-primary">4. DO WE USE COOKIES AND OTHER TRACKING TECHNOLOGIES?</h5>
        <p>In Short: We may use cookies and other tracking technologies to collect and store your information. </p>
        <p>We may use cookies and similar tracking technologies (like web beacons and pixels) to access or store
            information.
            Specific information about how we use such technologies and how you can refuse certain cookies is set out in
            our
            Cookie Notice. </p>
        <h5 class="text-primary">5. DO WE USE GOOGLE MAPS PLATFORM APIS?</h5>
        <p>In Short: Yes, we use Google Maps Platform APIS for the purpose of providing better service.
        </p>
        <p>This Website or App uses Google Maps Platform APIS which are subject to Google's Terms of Service. You may
            find
            the Google Maps Platform Terms of Service here. To find out more about Google's Privacy Policy, please refer
            to
            this link.</p>
        <p>We use certain Google Maps Platform APIS to retrieve certain information when you make location-specific
            requests. This includes:</p>
        <p>For a full list of what we use information for, please see the previous section titled "HOW DO WE USE YOUR
            INFORMATION?" and "WILL YOUR INFORMATION BE SHARED WITH ANYONE?". We obtain and store on your
            device ('cache') your location. You may revoke your consent anytime by contacting us at the contact details
            provided at the end of this document.</p>
        <p>The Google Maps Platform APIS that we use store and access cookies and other information on your devices. If
            you
            are a user currently in the European Economic Area (EU countries, Iceland, Liechtenstein, and Norway),
            please take
            a look at our Cookie Notice. </p>
        <h5 class="text-primary">6. HOW DO WE HANDLE YOUR SOCIAL LOGINS?</h5>
        <p>In Short: If you choose to register or log in to our services using a social media account, we may have
            access to
            certain information about you. </p>
        <p>Our Services offers you the ability to register and login using your third-party social media account details
            (like
            your Facebook or Twitter logins). Where you choose to do this, we will receive certain profile information
            about
            you from your social media provider. The profile Information we receive may vary depending on the social
            media
            provider concerned, but will often include your name, email address, friends list, profile picture as well
            as other
            information you choose to make public on such social media platform.</p>
        <p>We will use the information we receive only for the purposes that are described in this privacy notice or
            that are
            otherwise made clear to you on the relevant Services. Please note that we do not control, and are not
            responsible
            for, other uses of your personal information by your third-party social media provider. We recommend that
            you
            review their privacy notice to understand how they collect, use and share your personal information, and how
            you
            can set your privacy preferences on their sites and apps. </p>
        <h5 class="text-primary">7. HOW LONG DO WE KEEP YOUR INFORMATION?
        </h5>
        <p>In Short: We keep your information for as long as necessary to fulfill the purposes outlined in this privacy
            notice
            unless otherwise required by law.</p>
        <p>We will only keep your personal information for as long as it is necessary for the purposes set out in this
            privacy
            notice, unless a longer retention period is required or permitted by law (such as tax, accounting or other
            legal
            requirements). No purpose in this notice will require us your personal information for longer than the
            period in
            which the user has account with us.
        </p>
        <p>When we have no ongoing legitimate business need to process your personal information, we will either delete
            or
            anonymize such information, or, if this is not possible (for example, because your personal information has
            been
            stored in backup archives), then we will securely store your personal information and isolate it from any
            further
            processing until deletion is possible. </p>
        <h5 class="text-primary">8. HOW DO WE KEEP YOUR INFORMATION SAFE?
        </h5>
        <p>In Short: We aim to protect your personal information through a system of organizational and technical
            security
            measures.</p>
        <p>We have implemented appropriate technical and organizational security measures designed to protect the
            security
            of any personal information we process. However, despite our safeguards and efforts to secure your
            information,
            no electronic transmission over the Internet or information storage technology can be guaranteed to be 100%
            secure, so we cannot promise or guarantee that hackers, cybercriminals, or other unauthorized third parties
            will
            not be able to defeat our security, and improperly collect, access, steal, or modify your information.
            Although we
            will do our best to protect your personal information, transmission of personal information to and from our
            Services is at your own risk. You should only access the Services within a secure environment. </p>
        <h5 class="text-primary">9. WHAT ARE YOUR PRIVACY RIGHTS?
        </h5>
        <p>In Short: In some regions, such as the European Economic Area, you have rights that allow you greater access
            to
            and control over your personal information. You may review, change, or terminate your account at any time.
        </p>
        <p>In some regions (like the European Economic Area), you have certain rights under applicable data protection
            laws.
            These may include the right (i) to request access and obtain a copy of your personal information, (ii) to
            request
            rectification or erasure; (ii) to restrict the processing of your personal information; and (iv) if
            applicable, to data
            portability. In certain circumstances, you may also have the right to object to the processing of your
            personal
            information. To make such a request, please use the contact details provided below. We will consider and act
            upon
            any request in accordance with applicable data protection laws.
        </p>
        <p>If we are relying on your consent to process your personal information, you have the right to withdraw your
            consent at any time. Please note however that this will not affect the lawfulness of the processing before
            its
            withdrawal, nor will it affect the processing of your personal information conducted in reliance on lawful
            processing grounds other than consent.
        </p>
        <p>If you are a resident in the European Economic Area and you believe we are unlawfully processing your
            personal
            information, you also have the right to complain to your local data protection supervisory authority. You
            can find
            their contact details here: http://ec.europa.eu/justice/data-protection/bodies/authorities/index_en.htm.
        </p>
        <p>If you are a resident in Switzerland, the contact details for the data protection authorities are available
            here:
            https://www.edoeb.admin.ch/edoeb/en/home.html.</p>
        <p>If you have questions or comments about your privacy rights, you may email us at admin@swaadbern.ch.
        </p>
        <p><b class="text-primary">Account Information</b></p>
        <p>If you would at any time like to review or change the information in your account or terminate your account,
            you
            can:
        </p>
        <ul>
            <li>Log in to your account settings and update your user account.
            </li>
        </ul>
        <p>
            Upon your request to terminate your account, we will deactivate or delete your account and information from
            our
            active databases. However, we may retain some information in our files to prevent fraud, troubleshoot
            problems,
            assist with any investigations, enforce our Terms of Use and/or comply with applicable legal requirements.
        </p>
        <p><b class="text-primary">Opting out of email marketing:</b> You can unsubscribe from our marketing email list
            at any time by
            clicking on the
            unsubscribe link in the emails that we send or by contacting us using the details provided below. You will
            then be
            removed from the marketing email list however, we may still communicate with you, for example to send you
            service-related emails that are necessary for the administration and use of your account, to respond to
            service
            requests, or for other non-marketing purposes. To otherwise opt-out, you may: </p>
        <ul>
            <li>I Access your account settings and update your preferences.
            </li>
        </ul>
        <h5 class="text-primary">10. CONTROLS FOR DO-NOT-TRACK FEATURES
        </h5>
        <p>Most web browsers and some mobile operating systems and mobile applications include a Do-Not-Track ("DNT")
            feature or setting you can activate to signal your privacy preference not to have data about your online
            browsing
            activities monitored and collected. At this stage no uniform technology standard for recognizing and
            implementing
            DNT signals has been finalized. As such, we do not currently respond to DNT browser signals or any other
            mechanism that automatically communicates your choice not to be tracked online. If a standard for online
            tracking
            is adopted that we must follow in the future, we will inform you about that practice in a revised version of
            this
            privacy notice.</p>
        <h5 class="text-primary">11. DO CALIFORNIA RESIDENTS HAVE SPECIFIC PRIVACY RIGHTS?
        </h5>
        <p>In Short: Yes, if you are a resident of California, you are granted specific rights regarding access to your
            personal
            information. California Civil Code Section 1798.83, also known as the "Shine The Light" law, permits our
            users who
            are California residents to request and obtain from us, once a year and free of charge, information about
            categories of personal information (if any) we disclosed to third parties for direct marketing purposes and
            the
            names and addresses of all third parties with which we shared personal information in the immediately
            preceding
            calendar year. If you are a California resident and would like to make such a request, please submit your
            request in
            writing to us using the contact information provided below.</p>
        <p>If you are under 18 years of age, reside in California, and have a registered account with a Service, you
            have the
            right to request removal of unwanted data that you publicly post on the Services. To request removal of such
            data,
            please contact us using the contact information provided below, and include the email address associated
            with
            your account and a statement that you reside in California. We will make sure the data is not publicly
            displayed on
            the Services, but please be aware that the data may not be completely or comprehensively removed from all
            our
            systems (e.g. backups, etc.).</p>
        <h5 class="text-primary">12. DO WE MAKE UPDATES TO THIS NOTICE?
        </h5>
        <p>In Short: Yes, we will update this notice as necessary to stay compliant with relevant laws.</p>
        <p>We may update this privacy notice from time to time. The updated version will be indicated by an updated
            "Revised" date and the updated version will be effective as soon as it is accessible. If we make material
            changes to
            this privacy notice, we may notify you either by prominently posting a notice of such changes or by directly
            sending
            you a notification. We encourage you to review this privacy notice frequently to be informed of how we are
            protecting your information. </p>
        <h5 class="text-primary">13. HOW CAN YOU CONTACT US ABOUT THIS NOTICE?
        </h5>
        <p>If you have questions or comments about this notice, you may email us at admin@swaadbern.ch or by post to:
        </p>
        <p>Swaad Foods GmbH
        </p>
        <p>Berstrasse 95 Ostermundien Bern,
        </p>
        <p>Switzerland 3072 Switzerland
        </p>
        <h5 class="text-primary">14. HOW CAN YOU REVIEW, UPDATE, OR DELETE THE DATA WE COLLECT FROM
            YOU?
        </h5>
        <p>Based on the applicable laws of your country, you may have the right to request access to the personal
            information
            we collect from you, change that information, or delete it in some circumstances. To request to review,
            update, or
            delete your personal information, please visit: http://www.swaadbern.ch. We will respond to your request
            within
            30 days.</p>
    </div>
</div>
@else
<div class="container">
    <div class="col-md-12 p-5">
        <h5 class="text-primary">Datenschutzerklärung</h5>
        <p class="text-justify">
            Vielen Dank, dass Sie sich entschieden haben, Teil unserer Community bei der Swaad Foods GmbH zu sein
            ("Unternehmen", "wir", "uns", "unsere"). Wir verpflichten uns, Ihre personenbezogenen Daten und Ihr Recht
            auf
            Privatsphäre zu schützen. Wenn Sie Fragen oder Bedenken zu dieser Datenschutzerklärung oder unseren
            Praktiken
            in Bezug auf Ihre personenbezogenen Daten haben, kontaktieren Sie uns bitte unter admin@swaadbern.ch.
        </p>
        <p class="text-justify">
            Wenn Sie unsere Website http://www.swaadbern.ch (die "Website") besuchen, nutzen Sie unsere mobile
            Anwendung, wie der Fall sein kann (die "App") und im Allgemeinen, nutzen Sie unsere Dienste (die "Dienste",
            die
            die Website und die App umfassen), wir schätzen, dass Sie uns mit Ihren persönlichen Daten vertrauen. Wir
            nehmen Ihre Privatsphäre sehr ernst. In dieser Datenschutzerklärung möchten wir Ihnen auf die klarste Art
            und
            Weise erklären, welche Informationen wir sammeln, wie wir sie verwenden und welche Rechte Sie in Bezug
            darauf
            haben. Wir hoffen, dass Sie sich etwas Zeit nehmen, um es sorgfältig durchzulesen, da es wichtig ist. Wenn
            diese
            Datenschutzerklärung irgendwelche Bedingungen hat, mit denen Sie nicht einverstanden sind, stellen Sie bitte
            die
            Nutzung unserer Dienste sofort ein.

        </p>
        <p class="text-justify">
            Diese Datenschutzerklärung gilt für alle Informationen, die über unsere Dienste erfasst werden (die, wie
            oben
            beschrieben, unsere Website und App umfasst), sowie für alle damit verbundenen Dienstleistungen, Verkäufe,
            Marketing oder Veranstaltungen.
        </p>
        <h5 class="text-primary">INHALTSVERZEICHNIS</h5>
        <ol>
            <li>WELCHE INFORMATIONEN SAMMELN WIR?</li>
            <li>WIE VERWENDEN WIR IHRE DATEN?</li>
            <li>WERDEN IHRE INFORMATIONEN MIT JEMANDEM GETEILT?</li>
            <li>VERWENDEN WIR COOKIES UND ANDERE TRACKING-TECHNOLOGIEN?</li>
            <li>VERWENDEN WIR GOOGLE MAPS PLATFORM APIS?</li>
            <li>WIE BEHANDELN WIR IHRE SOZIALEN LOGINS?</li>
            <li>WIE LANGE BEWAHREN WIR IHRE DATEN AUF?</li>
            <li>WIE SCHÜTZEN WIR IHRE DATEN?</li>
            <li>WAS SIND IHRE DATENSCHUTZRECHTE?</li>
            <li>STEUERUNGEN FÜR DO-NOT-TRACK-FUNKTIONEN</li>
            <li>HABEN EINWOHNER KALIFORNIENS SPEZIFISCHE DATENSCHUTZRECHTE? </li>
            <li>AKTUALISIEREN WIR DIESE MITTEILUNG?</li>
            <li>WIE KÖNNEN SIE UNS ÜBER DIESE MITTEILUNG KONTAKTIEREN?</li>
            <li>WIE KÖNNEN SIE DIE DATEN, DIE WIR VON IHNEN ERFASSEN, ÜBERPRÜFEN, AKTUALISIEREN ODER LÖSCHEN?</li>
        </ol>
        <h5 class="text-primary">1. WELCHE INFORMATIONEN SAMMELN WIR?</h5>
        <b class="text-primary">Persönliche Daten, die Sie uns mitteilen</b>
        <p>Kurzgesagt: Wir erfassen personenbezogene Daten, die Sie uns zur Verfügung stellen. </p>
        <p>Wir erfassen personenbezogene Daten, die Sie uns freiwillig zur Verfügung stellen, wenn Sie sich bei den
            Diensten
            registrieren, möchten Interesse daran haben, Informationen über uns oder unsere Produkte und
            Dienstleistungen
            zu erhalten, wenn Sie an Aktivitäten auf den Diensten teilnehmen oder anderweitig, wenn Sie uns
            kontaktieren.
            Die personenbezogenen Daten, die wir erfassen, hängen vom Kontext Ihrer Interaktionen mit uns und den
            Diensten, den von Ihnen getroffenen Entscheidungen und den von Ihnen genutzten Produkten und Funktionen ab.
            Die von uns erfassten personenbezogenen Daten können Folgendes umfassen:
        </p>
        <p><b class="text-primary">Persönliche Daten, die von Ihnen bereitgestellt werden.</b> Wir sammeln Namen;
            Telefonnummern; E-MailAdressen; Postanschriften; Kennwörter; Benutzernamen; Rechnungsadressen;
            Debit-/Kreditkartennummern; und
            andere ähnliche Informationen.</p>
        <p>
            <b class="text-primary">Zahlungsdaten. </b>Wir können Daten sammeln, die für die Verarbeitung Ihrer Zahlung
            erforderlich sind, wenn Sie
            Einkäufe tätigen, z. B. Ihre Zahlungsmittelnummer (z. B. eine Kreditkartennummer) und den Sicherheitscode,
            der
            mit Ihrem Zahlungsinstrument verknüpft ist. Alle Zahlungsdaten werden von 6 Payment Gateway gespeichert. Die
            Datenschutzhinweise finden Sie hier: https://www.siX-payment-
            services.com/en/services/legal/privacystatement.html.
        </p>
        <p><b class="text-primary">Social-Media-Login-Daten.</b> Wir können Ihnen die Möglichkeit geben, sich mit Ihren
            vorhandenen Social-MediaKontodaten wie Ihrem Facebook, Twitter oder einem anderen Social-Media-Konto bei uns
            zu registrieren. Wenn
            Sie sich auf diese Weise registrieren, erfassen wir die Informationen, die im Abschnitt "WIE WIR BEHANDELN
            IHRE
            SOZIALEN LOGINS" unten beschrieben sind.
        </p>
        <p>Alle von Ihnen zur Verfügung stellenden personenbezogenen Daten müssen wahr, vollständig und genau sein,
            und Sie müssen uns über Änderungen dieser personenbezogenen Daten informieren.
        </p>
        <p><b class="text-primary">Automatisch erfasste Informationen</b></p>
        <p>
            Kurzgesagt: Einige Informationen – wie Ihre IP-Adresse (Internet Protocol) und/oder Browser- und
            Geräteeigenschaften - werden automatisch erfasst, wenn Sie unsere Dienste besuchen.
        </p>
        <p>Wir erfassen automatisch bestimmte Informationen, wenn Sie die Dienste besuchen, nutzen oder navigieren.
            Diese Informationen geben nicht Ihre spezifische Identität (wie Ihren Namen oder Ihre Kontaktinformationen)
            an,
            sondern können Geräte- und Nutzungsinformationen wie Ihre IP-Adresse, Browser- und Geräteeigenschaften,
            Betriebssystem, Spracheinstellungen, verweisende URLS, Gerätename, Land, Standort, Informationen darüber,
            wie
            und wann Sie unsere Dienste nutzen, und andere technische Informationen umfassen. Diese Informationen
            werden in erster Linie benötigt, um Informationen über Cookies und ähnliche Technologien zu verwalten.</p>
        <p><b class="text-primary">Über unsere App gesammelte Informationen </b></p>
        <p>
            Kurzgesagt: Wir sammeln Informationen über Ihren Geostandort, Push-Benachrichtigungen, wenn Sie unsere App
            nutzen.
        </p>
        <p>Wenn Sie unsere App nutzen, erfassen wir auch die folgenden Informationen: </p>
        <p>
            <ul>
                <li>Geo-Location-Informationen. Wir können zugriff oder die Erlaubnis zu standortbasierten Informationen
                    von Ihrem mobilen Gerät verlangen und diese nachverfolgen, entweder kontinuierlich oder während Sie
                    unsere App nutzen, um bestimmte standortbasierte Dienste bereitzustellen. Wenn Sie unseren Zugriff
                    oder unsere Berechtigungen ändern möchten, können Sie dies in den Einstellungen Ihres Geräts tun.
                </li>
                <li>
                    Push-Benachrichtigungen. Wir können Sie bitten, Ihnen Push-Benachrichtigungen über Ihr Konto oder
                    bestimmte Funktionen der App zu senden. Wenn Sie den Empfang dieser Art von Kommunikation
                    abbestellen möchten, können Sie diese in den Einstellungen Ihres Geräts deaktivieren.
                </li>
            </ul>
        </p>
        <p>
            Diese Informationen werden in erster Linie zur Aufrechterhaltung der Sicherheit und des Betriebs unserer
            App, zur
            Fehlerbehebung und zu internen Analyse- und Berichtszwecken benötigt.
        </p>

        <h5 class="text-primary">2. WIE VERWENDEN WIR IHRE DATEN?
        </h5>
        <p>Kurzgesagt: Wir verarbeiten Ihre Daten für Zwecke, die auf legitimen Geschäftsinteressen, der Erfüllung
            unseres
            Vertrags mit Ihnen, der Einhaltung unserer gesetzlichen Verpflichtungen und/oder Ihrer Zustimmung basieren.
        </p>
        <p>Wir verwenden personenbezogene Daten, die über unsere Dienste erfasst werden, für eine Vielzahl von
            Geschäftszwecken, die unten beschrieben werden. Wir verarbeiten Ihre personenbezogenen Daten für diese
            Zwecke unter Berufung auf unsere legitimen Geschäftsinteressen, um mit Ihrer Zustimmung einen Vertrag mit
            Ihnen abzuschließen oder auszuführen und/oder um unseren gesetzlichen Verpflichtungen nachzukommen. Wir
            geben die spezifischen Verarbeitungsgründe an, auf die wir uns neben jedem unten aufgeführten Zweck
            verlassen.</p>
        <p>Wir verwenden die Informationen, die wir sammeln oder erhalten:
        </p>
        <p>
            <ul>
                <li>So erleichtern Sie den Erstellungs- und Anmeldeprozessvon Konten . Wenn Sie sich dafür entscheiden,
                    Ihr
                    Konto mit uns mit einem Drittanbieterkonto (z. B. Ihrem Google- oder Facebook-Konto) zu verknüpfen,
                    verwenden wir die Informationen, die Sie uns von diesen Dritten zur Verfügung stellen, um die
                    Kontoerstellung und den Anmeldeprozess für die Vertragserfüllung zu erleichtern. Weitere
                    Informationen
                    finden Sie im folgenden Abschnitt mit dem Titel "HOW DO WE HANDLE YOUR SOCIAL LOGINS".</li>
                <li>Um Testimonials zuposten. Wir veröffentlichen Zeugnisse über unsere Dienste, die personenbezogene
                    Daten enthalten können. Vor der Veröffentlichung eines Testimonials werden wir Ihre Zustimmung zur
                    Verwendung Ihres Namens und des Inhalts des Testimonials einholen. Wenn Sie Ihr Testimonial
                    aktualisieren oder löschen möchten, kontaktieren Sie uns bitte unter admin@swaadbern.ch und geben
                    Sie Ihren Namen, Ihren Testimonial-Standort und Ihre Kontaktinformationen an.</li>
                <li>Feedback anfordern. Wir können Ihre Daten verwenden, um Feedback anzufordern und Sie über Ihre
                    Nutzung unserer Dienste zu kontaktieren.</li>
                <li>So aktivieren Sie die Benutzer-zu-Benutzer-Kommunikation. Wir können Ihre Daten verwenden, um die
                    Kommunikation zwischen Benutzer und Benutzer mit Zustimmung jedes Benutzers zu ermöglichen.</li>
                <li>So verwalten Sie Benutzerkonten. Wir können Ihre Daten für die Verwaltung unseres Kontos und deren
                    Betriebsführung verwenden.
                </li>
                <li>So senden Sie Administrative Informationen an Sie. Wir können Ihre personenbezogenen Daten
                    verwenden, um Ihnen Produkt-, Service- und neue Feature-Informationen und/oder Informationen über
                    Änderungen unserer Geschäftsbedingungen und Richtlinien zu zusenden. </li>
                <li>
                    Um unsere Dienstleistungen zu schützen. Wir können Ihre Daten als Teil unserer Bemühungen verwenden,
                    um unsere Dienste sicher und sicher zu halten (z. B. zur Betrugsüberwachung und -prävention).
                </li>
                <li>Zur Durchsetzung unserer Geschäftsbedingungen und Richtlinien, zur Einhaltung gesetzlicher und
                    regulatorischer Anforderungen oder im Zusammenhang mit unserem Vertrag.</li>
                <li>Auf rechtliche Anfragen reagieren und Schaden verhindern. Wenn wir eine Vorladung oder eine andere
                    rechtliche Anfrage erhalten, müssen wir möglicherweise die Daten, die wir halten, überprüfen, um zu
                    bestimmen, wie zu reagieren ist.</li>
                <li>Erfüllen und verwalten Sie Ihre Aufträge. Wir können Ihre Daten verwenden, um Ihre Bestellungen,
                    Zahlungen, Rücksendungen und Umtausch über die Dienste zu erfüllen und zu verwalten. </li>
                <li>Verwalten Sie Verlosungen und Wettbewerbe. Wir können Ihre Daten verwenden, um Verlosungen und
                    Wettbewerbe zu verwalten, wenn Sie sich für die Teilnahme an unseren Wettbewerben entscheiden.</li>
                <li>Bereitstellung und Erleichterung der Bereitstellung von Dienstleistungen an den Benutzer. Wir können
                    Ihre
                    Daten verwenden, um Ihnen den gewünschten Service zur Verfügung zu stellen.</li>
                <li>Um auf Benutzeranfragen zu antworten/Den Benutzern Support anzubieten. Wir können Ihre Daten
                    verwenden, um auf Ihre Anfragen zu antworten und mögliche Probleme zu lösen, die Sie mit der Nutzung
                    unserer Dienste haben könnten.
                </li>
                <li>Für andere geschäftliche Zwecke. Wir können Ihre Daten für andere geschäftliche Zwecke verwenden,
                    wie
                    z. B. Datenanalyse, Identifizierung von Nutzungstrends, Bestimmung der Wirksamkeit unserer
                    Werbekampagnen und Bewertung und Verbesserung unserer Dienstleistungen, Produkte, Marketing und
                    Ihre Erfahrung. Wir können diese Informationen in aggregierter und anonymisierter Form verwenden und
                    speichern, so dass sie nicht mit einzelnen Endnutzern in Verbindung gebracht werden und keine
                    personenbezogenen Daten enthalten. Wir verwenden keine identifizierbaren personenbezogenen Daten
                    ohne Ihre Zustimmung.</li>
            </ul>
        </p>
        <h5 class="text-primary">3. WERDEN IHRE INFORMATIONEN MIT JEMANDEM GETEILT?
        </h5>
        <p>Kurzgesagt: Wir geben Informationen nur mit Ihrer Zustimmung weiter, um Gesetze einzuhalten, Um Ihnen
            Dienstleistungen zu erbringen, Um Ihre Rechte zu schützen oder um Geschäftspflichten zu erfüllen.
        </p>
        <p>Wir können Ihre Daten, die wir auf der Grundlage der folgenden Rechtsgrundlage halten, verarbeiten oder
            weitergeben:
        </p>
        <p>
            <ul>
                <li>Zustimmung: Wir können Ihre Daten verarbeiten, wenn Sie uns ausdrücklich zugestimmt haben, Ihre
                    personenbezogenen Daten für einen bestimmten Zweck zu verwenden. </li>
                <li>Legitime Interessen: Wir können Ihre Daten verarbeiten, wenn dies vernünftigerweise erforderlich
                    ist, um
                    unsere legitimen Geschäftsinteressen zu erreichen.
                </li>
                <li>Erfüllung eines Vertrages: Wenn wir einen Vertrag mit Ihnen abgeschlossen haben, können wir Ihre
                    personenbezogenen Daten verarbeiten, um die Bedingungen unseres Vertrags zu erfüllen.</li>
                <li>Rechtliche Verpflichtungen: Wir können Ihre Daten offenlegen, wenn wir gesetzlich dazu verpflichtet
                    sind,
                    um geltendes Recht, behördliche Anfragen, ein Gerichtsverfahren, Gerichtsverfahren oder
                    Gerichtsverfahren zu erfüllen, z. B. als Reaktion auf einen Gerichtsbeschluss oder eine Unterlage
                    (einschließlich der Beantwortung von Behörden, um die nationalen Sicherheits- oder
                    Strafverfolgungsanforderungen zu erfüllen).</li>
                <li>Vitale Interessen: Wir können Ihre Daten offenlegen, wenn wir es für notwendig halten, mögliche
                    Verstöße gegen unsere Richtlinien, mutmaßlichen Betrug, Situationen mit potenziellen Bedrohungen für
                    die Sicherheit einer Person und illegale Aktivitäten oder als Beweisin in Rechtsstreitigkeiten, an
                    denen wir
                    beteiligt sind, zu untersuchen, zu verhindern oder zu handeln.</li>
            </ul>
        </p>
        <p>Insbesondere müssen wir Ihre Daten möglicherweise verarbeiten oder Ihre personenbezogenen Daten in den
            folgenden Situationen weitergeben:
        </p>
        <ul>
            <li>Unternehmensübertragungen. Wir können Ihre Daten im Zusammenhang mit oder während der
                Verhandlungen über eine Fusion, den Verkauf von Unternehmensvermögen, die Finanzierung oder den
                Erwerb unseres gesamten oder eines Teils unseres Geschäfts an ein anderes Unternehmen weitergeben
                oder übertragen.
            </li>
        </ul>
        <h5 class="text-primary">4. VERWENDEN WIR COOKIES UND ANDERE TRACKING-TECHNOLOGIEN?</h5>
        <p>Kurzgesagt: Wir können Cookies und andere Tracking-Technologien verwenden, um Ihre Daten zu sammeln und zu
            speichern. </p>
        <p>Wir können Cookies und ähnliche Tracking-Technologien (wie Web-Beacons und Pixel) verwenden, um auf
            Informationen zuzugreifen oder diese zu speichern. Spezifische Informationen darüber, wie wir solche
            Technologien verwenden und wie Sie bestimmte Cookies ablehnen können, sind in unserer Cookie-Mitteilung
            enthalten. </p>
        <h5 class="text-primary">5. VERWENDEN WIR GOOGLE MAPS PLATFORM APIS?
        </h5>
        <p>Kurzgesagt: Ja, wir verwenden Google Maps Platform APIS, um einen besseren Service zu bieten.
        </p>
        <p>Diese Website oder App verwendet Google Maps Platform APIS, die den Nutzungsbedingungen von Google
            unterliegen. Die Nutzungsbedingungen der Google Maps Platform finden Sie hier. Weitere Informationen zu den
            Datenschutzbestimmungen von Google finden Sie unter diesem Link.</p>
        <p>Wir verwenden bestimmte Google Maps Platform APIS, um bestimmte Informationen abzurufen, wenn Sie
            standortspezifische Anforderungen stellen. Dazu gehören:</p>
        <p>Eine vollständige Liste dessen, wofür wir Informationen verwenden, finden Sie im vorherigen Abschnitt "WIE
            VERWENDEN WIR IHRE INFORMATIONEN?" und "WILL YOUR INFORMATION BE SHARED WITH ANYONE?". Wir
            beziehen und speichern auf Ihrem Gerät ('Cache') Ihren Standort. Sie können Ihre Einwilligung jederzeit
            widerrufen, indem Sie uns unter den am Ende dieses Dokuments angegebenen Kontaktdaten kontaktieren.</p>
        <p>Die Google Maps Platform APIS, die wir verwenden, speichert und greift auf Cookies und andere Informationen
            auf
            Ihren Geräten zu. Wenn Sie derzeit im Europäischen Wirtschaftsraum (EU-Länder, Island, Liechtenstein und
            Norwegen) ein Benutzer sind, werfen Sie bitte einen Blick auf unsere Cookie-Mitteilung.</p>
        <h5 class="text-primary">6. WIE BEHANDELN WIR IHRE SOZIALEN LOGINS?</h5>
        <p>Kurzgesagt: Wenn Sie sich über ein Social-Media-Konto registrieren oder bei unseren Diensten anmelden
            möchten,
            haben wir möglicherweise Zugriff auf bestimmte Informationen über Sie. </p>
        <p>Unsere Dienste bieten Ihnen die Möglichkeit, sich mit Ihren Social-Media-Kontodaten von Drittanbietern (wie
            Ihren
            Facebook- oder Twitter-Logins) zu registrieren und anzumelden. Wo Sie sich dafür entscheiden, erhalten wir
            bestimmte Profilinformationen über Sie von Ihrem Social-Media-Anbieter. Die Profilinformationen, die wir
            erhalten, können je nach Social-Media-Anbieter variieren, enthalten aber häufig Ihren Namen, Ihre
            E-Mail-Adresse,
            Ihre Freundesliste, Ihr Profilbild sowie andere Informationen, die Sie auf einer solchen
            Social-Media-Plattform
            veröffentlichen möchten.</p>
        <p>Wir verwenden die Informationen, die wir erhalten, nur für die Zwecke, die in dieser Datenschutzerklärung
            beschrieben sind oder die Ihnen anderweitig auf den entsprechenden Diensten klar gemacht werden. Bitte
            beachten Sie, dass wir andere Verwendungen Ihrer personenbezogenen Daten durch Ihren Drittanbieter in
            sozialen Medien nicht kontrollieren und nicht dafür verantwortlich sind. Wir empfehlen Ihnen, deren
            Datenschutzhinweise zu überprüfen, um zu verstehen, wie sie Ihre personenbezogenen Daten sammeln,
            verwenden und teilen und wie Sie Ihre Datenschutzeinstellungen auf ihren Websites und Apps festlegen können.
        </p>
        <h5 class="text-primary">7. WIE LANGE BEWAHREN WIR IHRE DATEN AUF?
        </h5>
        <p>Kurzgesagt: Wir bewahren Ihre Daten so lange auf, wie dies zur Erfüllung der in dieser Datenschutzerklärung
            beschriebenen Zwecke erforderlich ist, es sei denn, dies ist gesetzlichvorgeschrieben.</p>
        <p>Wir werden Ihre personenbezogenen Daten nur so lange aufbewahren, wie dies für die in dieser
            Datenschutzerklärung dargelegten Zwecke erforderlich ist, es sei denn, eine längere Aufbewahrungsfrist ist
            gesetzlich vorgeschrieben oder zulässig (z. B. Steuern, Buchhaltung oder andere gesetzliche Anforderungen).
            Kein
            Zweck in dieser Mitteilung erfordert uns Ihre persönlichen Daten foder länger als der Zeitraum, in dem der
            Benutzer Konto bei uns hat.
        </p>
        <p>Wenn wir keine weiterhin berechtigte Geschäftsnotwendigkeit haben, Ihre personenbezogenen Daten zu
            verarbeiten, werden wir diese Informationen entweder löschen oder anonymisieren, oder, wenn dies nicht
            möglich ist (z. B. weil Ihre personenbezogenen Daten in Backup-Archiven gespeichert wurden), werden wir Ihre
            personenbezogenen Daten sicher speichern und von jeder weiteren Verarbeitung isolieren, bis eine Löschung
            möglich ist. </p>
        <h5 class="text-primary">8. WIE SCHÜTZEN WIR IHRE DATEN?
        </h5>
        <p>Kurzgesagt: Wir wollen Ihre personenbezogenen Daten durch ein System organisatorischer und technischer
            Sicherheitsmaßnahmen schützen.
        </p>
        <p>Wir haben geeignete technische und organisatorische Sicherheitsmaßnahmen implementiert, um die Sicherheit
            aller von uns verarbeiteten personenbezogenen Daten zu schützen. Trotz unserer Sicherheitsvorkehrungen und
            Bemühungen, Ihre Daten zu sichern, kann jedoch keine elektronische Übertragung über das Internet oder
            Informationsspeichertechnologie garantiert werden, um 100% sicher zu sein, so dass wir nicht versprechen
            oder
            garantieren können, dass Hacker, Cyberkriminelle oder andere nicht autorisierte Dritte nicht in der Lage
            sein
            werden, unsere Sicherheit zu besiegen und Ihre Daten nicht ordnungsgemäß zu sammeln, darauf zuzugreifen, zu
            stehlen oder zu ändern. Obwohl wir unser Bestes tun werden, um Ihre personenbezogenen Daten zu schützen,
            erfolgt die Übermittlung personenbezogener Daten an und von unseren Diensten auf eigene Gefahr. Sie sollten
            nur
            in einer sicheren Umgebung auf die Dienste zugreifen. </p>
        <h5 class="text-primary">9. WAS SIND IHRE DATENSCHUTZRECHTE?
        </h5>
        <p>Kurzgesagt: In einigen Regionen, wie dem Europäischen Wirtschaftsraum, haben Sie Rechte, die Ihnen einen
            besseren Zugriff auf und die Kontrolle über Ihre personenbezogenen Daten ermöglichen. Sie können Ihr Konto
            jederzeit überprüfen, ändern oder kündigen.

        </p>
        <p>In einigen Regionen (wie dem Europäischen Wirtschaftsraum) haben Sie bestimmte Rechte nach den geltenden
            Datenschutzgesetzen. Dazu gehören das Recht (i) Zugang zu verlangen und eine Kopie Ihrer personenbezogenen
            Daten zu erhalten, (ii) Nachbesserung oder Löschung zu verlangen; (ii) die Verarbeitung Ihrer
            personenbezogenen
            Daten einzuschränken; und (iv) gegebenenfalls auf die Datenübertragbarkeit. Unter bestimmten Umständen
            können Sie auch das Recht haben, der Verarbeitung Ihrer personenbezogenen Daten zu widersprechen. Um eine
            solche Anfrage zu stellen, verwenden Sie bitte die unten angegebenen Kontaktdaten. Wir werden jede Anfrage
            in
            Übereinstimmung mit den geltenden Datenschutzgesetzen prüfen und bearbeiten.
        </p>
        <p>Wenn wir uns auf Ihre Einwilligung zur Verarbeitung Ihrer personenbezogenen Daten verlassen, haben Sie das
            Recht, Ihre Einwilligung jederzeit zu widerrufen. Bitte beachten Sie jedoch, dass dies weder die
            Rechtmäßigkeit der
            Verarbeitung vor dem Widerruf noch die Verarbeitung Ihrer personenbezogenen Daten beeinträchtigt, die unter
            Berufung auf rechtmäßige Verarbeitungsgründe, die nicht die Zustimmung sind, durchgeführt wird.
        </p>
        <p>Wenn Sie ihren Wohnsitz im Europäischen Wirtschaftsraum haben und glauben, dass wir Ihre personenbezogenen
            Daten unrechtmäßig verarbeiten, haben Sie auch das Recht, sich bei Ihrer lokalen Datenschutzaufsichtsbehörde
            zu
            beschweren. Die Kontaktdaten finden Sie hier:
            http://ec.europa.eu/justice/dataprotection/bodies/authorities/index_en.htm.
        </p>
        <p>Wenn Sie ihren Wohnsitz in der Schweiz haben, finden Sie die Kontaktdaten der Datenschutzbehörden unter:
            https://www.edoeb.admin.ch/edoeb/en/home.html.
        </p>
        <p>Wenn Sie Fragen oder Kommentare zu Ihren Datenschutzrechten haben, können Sie uns eine E-Mail an
            admin@swaadbern.ch senden.
        </p>
        <p><b class="text-primary">Kontoinformationen</b></p>
        <p>Wenn Sie die Informationen in Ihrem Konto jederzeit überprüfen oder ändern oder Ihr Konto kündigen möchten,
            können Sie:
        </p>
        <ul>
            <li>Melden Sie sich bei Ihren Kontoeinstellungen an und aktualisieren Sie Ihr Benutzerkonto.
            </li>
        </ul>
        <p>
            Auf Ihre Anfrage, Ihr Konto zu kündigen, werden wir Ihr Konto und Ihre Informationen aus unseren aktiven
            Datenbanken deaktivieren oder löschen. Wir können jedoch einige Informationen in unseren Dateien
            aufbewahren, um Betrug zu verhindern, Probleme zu beheben, bei Ermittlungen zu helfen, unsere
            Nutzungsbedingungen durchzusetzen und/oder die geltenden gesetzlichen Anforderungen einzuhalten.

        </p>
        <p><b class="text-primary">Abmelden von E-Mail-Marketing:</b> Sie können sich jederzeit von unserer
            Marketing-E-Mail-Liste abmelden, indem
            Sie auf den Abmeldelink in den eisernen E-Mails klicken oder uns mit den unten angegebenen Details
            kontaktieren.
            Sie werden dann aus der Marketing-E-Mail-Liste entfernt, wir können jedoch weiterhin mit Ihnen
            kommunizieren,
            z. B. um Ihnen servicebezogene E-Mails zu senden, die für die Verwaltung und Nutzung Ihres Kontos, für die
            Beantwortung von Serviceanfragen oder für andere Nicht-Marketing-Zwecke erforderlich sind. Um sich
            anderweitig abzumelden, können Sie: </p>
        <ul>
            <li>Ich greife auf Ihre Kontoeinstellungen zu und aktualisiere Ihre Einstellungen.
            </li>
        </ul>
        <h5 class="text-primary">10. STEUERUNGEN FÜR DO-NOT-TRACK-FUNKTIONEN

        </h5>
        <p>Die meisten Webbrowser und einige mobile Betriebssysteme und mobile Anwendungen enthalten eine
            Do-NotTrack-Funktion ("DNT") oder Einstellung, die Sie aktivieren können, um Ihre Datenschutzeinstellungen
            zu
            signalisieren, dass keine Daten über Ihre Online-Browsing-Aktivitäten überwacht und gesammelt werden. Zum
            jetzigen Zeitpunkt ist noch kein einheitlicher Technologiestandard für die Erkennung und Implementierung von
            DNT-Signalen fertiggestellt. Daher reagieren wir derzeit nicht auf DNT-Browsersignale oder andere
            Mechanismen,
            die Ihre Wahl automatisch kommunizieren, um nicht online verfolgt zu werden. Wenn ein Standard für
            OnlineTracking angenommen wird, den wir in Zukunft befolgen müssen, werden wir Sie in einer überarbeiteten
            Version
            dieser Datenschutzerklärung über diese Praxis informieren. </p>
        <h5 class="text-primary">11. HABEN EINWOHNER KALIFORNIENS SPEZIFISCHE DATENSCHUTZRECHTE?

        </h5>
        <p>Kurzgesagt: Ja, wenn Sie in Kalifornien ansässig sind, erhalten Sie besondere Rechte in Bezug auf den Zugriff
            auf
            Ihre personenbezogenen Daten. California Civil Code Section 1798.83, auch bekannt als das "Shine The Light"-
            Gesetz, erlaubt es unseren Nutzern, die in Kalifornien leben, einmal im Jahr und kostenlos Informationen
            über
            Kategorien personenbezogener Daten (falls vorhanden) an Dritte für Direktmarketingzwecke und die Namen und
            Adressen aller Dritten, mit denen wir personenbezogene Daten im unmittelbar vorangehenden Kalenderjahr
            geteilt haben, anzufordern und zu erhalten. Wenn Sie in Kalifornien ansässig sind und eine solche Anfrage
            stellen
            möchten, senden Sie uns bitte Ihre Anfrage schriftlich unter Verwendung der unten angegebenen
            Kontaktinformationen.</p>
        <p>Wenn Sie unter 18 Jahre alt sind, in Kalifornien wohnen und ein registriertes Konto bei einem Dienst haben,
            haben
            Sie das Recht, die Entfernung unerwünschter Daten zu verlangen, die Sie öffentlich auf den Diensten
            veröffentlichen. Um die Entfernung dieser Daten zu beantragen, kontaktieren Sie uns bitte über die unten
            angegebenen Kontaktinformationen und geben Sie die E-Mail-Adresse an, die mit Ihrem Konto verknüpft ist,
            sowie
            eine Erklärung, die Sie in Kalifornien wohnen. Wir stellen sicher, dass die Daten nicht öffentlich auf den
            Diensten
            angezeigt werden, aber bitte beachten Sie, dass die Daten möglicherweise nicht vollständig oder umfassend
            von
            allen unseren Systemen (z. B. Backups usw.) entfernt werden.</p>
        <h5 class="text-primary">12. AKTUALISIEREN WIR DIESE MITTEILUNG?
        </h5>
        <p>Kurzgesagt: Ja, wir werden diese Mitteilung bei Bedarf aktualisieren, um die einschlägigen Gesetze
            einzuhalten.
        </p>
        <p>Wir können diese Datenschutzerklärung von Zeit zu Zeit aktualisieren. Die aktualisierte Version wird durch
            ein
            aktualisiertes "Überarbeitetes" Datum angegeben, und die aktualisierte Version wird wirksam, sobald sie
            zugänglich ist. Wenn wir wesentliche Änderungen an dieser Datenschutzerklärung vornehmen, können wir Sie
            entweder durch eine prominente Veröffentlichung einer Benachrichtigung über solche Änderungen oder durch
            direkte Zusendung einer Benachrichtigung benachrichtigen. Wir empfehlen Ihnen, diese Datenschutzerklärung
            regelmäßig zu lesen, um darüber informiert zu werden, wie wir Ihre Daten schützen.</p>
        <h5 class="text-primary">13. WIE KÖNNEN SIE UNS ÜBER DIESE MITTEILUNG KONTAKTIEREN?
        </h5>
        <p>Wenn Sie Fragen oder Kommentare zu dieser Mitteilung haben, können Sie uns eine E-Mail an
            admin@swaadbern.ch oder per Post an:
        </p>
        <p>Swaad Foods GmbH
        </p>
        <p>Berstrasse 95 Ostermundien Bern,
        </p>
        <p>Schweiz 3072 Schweiz
        </p>
        <h5 class="text-primary">14. WIE KÖNNEN SIE DIE DATEN, DIE WIR VON IHNEN ERFASSEN, ÜBERPRÜFEN,
            AKTUALISIEREN ODER LÖSCHEN?

        </h5>
        <p>Basierend auf den geltenden Gesetzen Ihres Landes haben Sie möglicherweise das Recht, Zugriff auf die von
            Ihnen
            von Ihnen erfassten personenbezogenen Daten zu verlangen, diese Informationen zu ändern oder unter
            bestimmten Umständen zu löschen. Um Ihre personenbezogenen Daten zu überprüfen, zu aktualisieren oder zu
            löschen, besuchen Sie bitte: http://www.swaadbern.ch. Wir werden Ihre Anfrage innerhalb von 30 Tagen
            beantworten.</p>
    </div>
</div>
@endif

@endsection