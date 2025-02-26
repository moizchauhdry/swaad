@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">{{session('lan') == 'en' ? 'Terms & Condition' : 'Geschäftsbedingung'}}</h1>
            </div>
        </div>
    </div>
</div>
@if (session('lan') == 'en')
<div class="container">
    <div class="col-md-12 p-5">
        <h5 class="text-primary">AGREEMENT OF TERMS
        </h5>
        <p>These Terms of Use constitute a legally binding agreement made between you, whether personally or on behalf
            of
            an entity ("you") and ("Company", "we", "us", or website as well as any other "our"), concerning your access
            to
            and use of the media form, media channel, mobile website or mobile application related, linked, or otherwise
            connected thereto (collectively, the "Site"). You agree that by accessing the Site, you have read,
            understood, and
            agreed to be bound by all these Terms of Use. IF YOU DO NOT AGREE WITH ALL OF THESE TERMS OF USE, THEN
            YOU ARE EXPRESSLY PROHIBITED FROM USING THE SITE AND YOU MUST DISCONTINUE USE IMMEDIATELY.</p>
        <p>
            Supplemental terms and conditions or documents that may be posted on the Site from time to time are hereby
            expressly incorporated herein by reference. We reserve the right, in our sole discretion, to make changes or
            modifications to these Terms of Use at any time and for any reason. We will alert you about any changes by
            updating the "Last updated" date of these Terms of Use, and you waive any right to receive specific notice
            of each
            such change. It is your responsibility to periodically review these Terms of Use to stay informed of
            updates. You
            will be subject to and will be deemed to have been made aware of and to have accepted, the changes in any
            revised Terms of Use by your continued use of the Site after the date such revised Terms of Use are posted.
        </p>
        <p>The information provided on the Site is not intended for distribution to or use by al person or entity in any
            jurisdiction or country where such distribution or use would be contrary to law or regulation or which would
            subject us to any registration requirement within such jurisdiction or country. Accordingly, those persons
            who
            choose to access the Site from other locations do so on their own initiative and are solely responsible for
            compliance with local laws, if and to the extent local laws are applicable. </p>
        <h5 class="text-primary">INTELLECTUAL PROPERTY RIGHTS
        </h5>
        <p>Unless otherwise indicated, the Site is our proprietary property and all source code, databases,
            functionality,
            software, website designs, audio, video, text, photographs, and graphics on the Site (collectively, the
            "Content")
            and the trademarks, service marks, and logos contained therein (the "Marks") are owned or controlled by us
            or
            licensed to us, and are protected by copyright and trademark laws and various other intellectual property
            rights
            and unfair competition laws of the United States, international copyright laws, and international
            conventions. The
            Content and the Marks are provided on the Site "AS IS" for your information and personal use only. Except as
            expressly provided in these Terms of Use, no part of the Site and no Content or Marks may be copied,
            reproduced,
            aggregated, republished, uploaded, posted, publicly displayed, encoded, translated, transmitted,
            distributed, sold,
            licensed, or otherwise exploited for any commercial purpose whatsoever, without our express prior written
            permission.</p>
        <p>Provided that you are eligible to use the Site, you are granted a limited license to access and use the Site
            and to
            download or print a copy of any portion of the Content to which you have properly gained access solely for
            your
            personal, non-commercial use. We reserve all rights not expressly granted to you in and to the Site, the
            Content,
            and the Marks. </p>
        <h5 class="text-primary">USER REPRESENTATIONS
        </h5>
        <p>By using the Site, you represent and warrant that: (1) you have the legal capacity and you agree to comply
            with
            these Terms of Use; (2) you are not a minor in the jurisdiction in which you reside; (3) you will not access
            the Site
            through automated or non-human means, whether through a bot, script or otherwise; (4) you will not use the
            Site
            for any illegal or unauthorized purpose; and (5) your use of the Site will not violate any applicable law or
            regulation.</p>
        <p>If you provide any information that is untrue, inaccurate, not current, or incomplete we have the right to
            suspend
            or terminate your account and refuse any and all current and future use of the Site (or any portion
            thereof).</p>
        <h5 class="text-primary">PRODUCTS
        </h5>
        <p>We make every effort to display as accurately as possible the colors, features, specifications, and details
            of the
            products available on the Site. However, we do not guarantee that the colors, features, specifications, and
            details
            of the products will be accurate, complete, reliable, current, or free of other errors, and your electronic
            display
            may not accurately reflect the actual colors and details of the products. All products are subject to
            availability, and
            we cannot guarantee that items will be in stock. We reserve the right to discontinue any products at any
            time for
            any reason. Prices for all products are subject to change.</p>
        <h5 class="text-primary">PURCHASES AND PAYMENT
        </h5>
        <p>We accept the following forms of payment:
        </p>
        <p>You agree to provide current, complete, and accurate purchase and account information for all purchases made
            via
            the Site. You further agree to promptly update account and payment information, including email address,
            payment method, and payment card expiration date, so that we can complete your transactions and contact you
            as needed. Sales tax will be added to the price of purchases as deemed required by us. We may change prices
            at
            any time. All payments shall be in CHF.</p>
        <p>You agree to pay all charges at the prices then in effect for your purchases and any applicable shipping
            fees, and
            you authorize us to charge your chosen payment provider for any such amounts upon placing your order. We
            reserve the right to correct any errors or mistakes in pricing, even if we have already requested or
            received
            payment.
        </p>
        <p>We reserve the right to refuse any order placed through the Site. We may, in our sole discretion, limit or
            cancel
            quantities purchased per person, per household, or per order. These restrictions may include orders placed
            by or
            under the same customer account, the same payment method, and/or orders that use the same billing or
            shipping
            address. We reserve the right to limit or prohibit orders that, in our sole judgment, appear to berplaced by
            dealers,
            resellers, or distributors. </p>
        <h5 class="text-primary">PROHIBITED ACTIVITIES
        </h5>
        <p>You may not access or use the Site for any purpose other than that for which we make the Site available. The
            Site
            may not be used in connection with any commercial endeavors except those that are specifically endorsed or
            approved by us. </p>
        <p>As a user of the Site, you agree not to:</p>
        <h5 class="text-primary">USER GENERATED CONTRIBUTIONS
        </h5>
        <p>The Site does not offer users to submit or post content. We may provide you with the opportunity to create,
            submit, post, display, transmit, perform, publish, distribute, or broadcast content and materials to us or
            on the
            Site, including but not limited to text, writings, video, audio, photographs, graphics, comments,
            suggestions, or
            personal information or other material (collectively, "Contributions"). Contributions may be viewable by
            other
            users of the Site and through third-party websites. As such, any Contributions you transmit may be treated
            in
            accordance with the Site Privacy Policy. When you create or make available any Contributions, you thereby
            represent and warrant that: </p>
        <ol>
            <li>The creation, distribution, transmission, public display, or performance, and the accessing,
                downloading,
                or copying of your Contributions do not and will not infringe the proprietary rights, including but not
                limited to the copyright, patent, trademark, trade secret, or moral rights of any third party.</li>
            <li>You are the creator and owner of or have the necessary licenses, rights, consents, releases, and
                permissions to use and to authorize us, the Site, and other users of the Site to use your Contributions
                in
                any manner contemplated by the Site and these Terms of Use.</li>
            <li>You have the written consent, release, and/or permission of each and every identifiable individual
                person
                in your Contributions to use the name or likeness of each and every such identifiable individual person
                to
                enable inclusion and use of your Contributions in any manner contemplated by the Site and these Terms
                of Use. </li>
            <li>Your Contributions are not false, inaccurate, or misleading.
            </li>
            <li>Your Contributions are not unsolicited or unauthorized advertising, promotional materials, pyramid
                schemes, chain letters, spam, mass mailings, or other forms of solicitation. </li>
            <li>Your Contributions are not obscene, lewd, lascivious, filthy, violent, harassing, libelous, slanderous,
                or
                otherwise objectionable (as determined by us). </li>
            <li>Your Contributions do not ridicule, mock, disparage, intimidate, or abuse anyone. </li>
            <li>Your Contributions are not used to harass or threaten (in the legal sense of those terms) any other
                person
                and to promote violence against a specific person or class of people.</li>
            <li>Your Contributions do not violate any applicable law, regulation, or rule. </li>
            <li>Your Contributions do not violate the privacy or publicity rights of any third party.</li>
            <li>Your Contributions do not contain any material that solicits personal information from anyone under the
                age of 18 or exploits people under the age of 18 in a sexual or violent manner.</li>
            <li>Your Contributions do not violate any applicable law concerning child pornography, or otherwise intended
                to protect the health or well-being of minors.</li>
            <li>Your Contributions do not include any offensive comments that are connected to race, national origin,
                gender, sexual preference, or physical handicap.</li>
            Your Contributions do not otherwise violate, or link to material that violates, any provision of these Terms
            of Use, or any applicable law or regulation.
        </ol>
        <p>Any use of the Site or the Marketplace Offerings in violation of the foregoing violates these Terms of Use
            and
            may result in, among other things, termination, or suspension of your rights to use the Site and the
            Marketplace Offerings. </p>
        <h5 class="text-primary">CONTRIBUTION LICENSE
        </h5>
        <p>You and Site agree that we may access, store, process, and use any information and personal data that you
            provide following the terms of the Privacy Policy and your choices (including settings). </p>
        <p>By submitting suggestions or other feedback regarding the Site, you agree that we can use and share such
            feedback for any purpose without compensation to you.</p>
        <p>We do not assert any ownership over your Contributions. You retain full ownership of all of your
            Contributions
            and any intellectual property rights, or other proprietary rights associated with your Contributions. We are
            not
            liable for any statements or representations in your Contributions provided by you in any area on the Site.
            You
            are solely responsible for your Contributions to the Site and you expressly agree to exonerate us from all
            responsibility and to refrain from any. Legal action against us regarding your Contributions. </p>
        <h5 class="text-primary">SUBMISSIONS</h5>
        <p>You acknowledge and agree that any questions, comments, suggestions, ideas, feedback, or other information
            regarding the Site or the Marketplace Offerings ("Submissions") provided by you to us are non-confidential
            and shall become our sole property. We shall own exclusive rights, including all intellectual property
            rights,
            and shall be entitled to the unrestricted use and dissemination of these Submissions for any lawful purpose,
            commercial or otherwise, without acknowledgment or compensation to you. You hereby waive all moral rights
            to any such Submissions, and you hereby warrant that any such Submissions are original with you or that you
            have the right to submit such Submissions. You agree there shall be no recourse against us for any alleged
            or
            actual infringement or misappropriation of any proprietary right in your Submissions. </p>
        <h5 class="text-primary">SITE MANAGEMENT
        </h5>
        <p>We reserve the right, but not the obligation, to: (1) monitor the Site for violations of these Terms of Use;
            (2)
            take appropriate legal action against anyone who, in our sole discretion, violates the law or these Terms of
            Use, including without limitation, reporting such user to law enforcement authorities; (3) in our sole
            discretion
            and without limitation, refuse, restrict access to, limit the availability of, or disable (to the extent
            technologically feasible) any of your Contributions or any portion thereof, (4) in our sole discretion and
            without limitation, notice, or liability, to remove from the Site or otherwise disable all files and content
            that
            are excessive in size or are in any way burdensome to our systems; and (5) otherwise manage the Site in a
            manner designed to protect our rights and property and to facilitate the proper functioning of the Site and
            the
            Marketplace Offerings.
        </p>
        <h5 class="text-primary">TERM AND TERMINATION
        </h5>
        <p>These Terms of Use shall remain in full force and effect while you use the Site. WITHOUT LIMITING ANY OTHER
            PROVISION OF THESE TERMS OF USE, WE RESERVE THE RIGHT TO, IN OUR SOLE DISCRETION AND WITHOUT
            NOTICE OR LIABILITY, DENY ACCESS TO AND USE OF THE SITE AND THE MARKETPLACE OFFERINGS (INCLUDING
            BLOCKING CERTAIN IP ADDRESSES), TO ANY PERSON FOR ANY REASON OR FOR NO REASON, INCLUDING
            WITHOUT LIMITATION FOR BREACH OF ANY REPRESENTATION, WARRANTY, OR COVENANT CONTAINED IN
            THESE TERMS OF USE OR OF ANY APPLICABLE LAW OR REGULATION. WE MAY TERMINATE YOUR USE OR
            PARTICIPATION IN THE SITE AND THE MARKETPLACE OFFERINGS OR DELETE ANY CONTENT OR INFORMATION
            THAT YOU POSTED AT ANY TIME, WITHOUT WARNING, IN OUR SOLE DISCRETION. </p>
        <p>If we terminate or suspend your account for any reason, you are prohibited from registering and creating a
            new account under your name, a fake or borrowed name, or the name of any third party, even if you may be
            acting on behalf of the third party. In addition to terminating or suspending your account, we reserve the
            right
            to take appropriate legal action, including without limitation pursuing civil, criminal, and injunctive
            redress.
        </p>
        <h5 class="text-primary">MODIFICATIONS AND INTERRUPTIONS
        </h5>
        <p>We reserve the right to change, modify, or remove the contents of the Site at any time or for any reason at
            our sole discretion without notice. However, we have no obligation to update any information on our Site. We
            also reserve the right to modify or discontinue all or part of the Marketplace Offerings without notice at
            any
            time. We will not be liable to you or any third party for any modification, price change, suspension, or
            discontinuance of the Site or the Marketplace Offerings.</p>
        <p>We cannot guarantee the Site and the Marketplace Offerings will be always available. We may experience
            hardware, software, or other problems or need to perform maintenance related to the Site, resulting in
            interruptions, delays, or errors. We reserve the right to change, revise, update, suspend, discontinue, or
            otherwise modify the Site or the Marketplace Offerings at any time or for any reason without notice to you.
            You agree that we have no liability whatsoever for any loss, damage, or inconvenience caused by your
            inability
            to access or use the Site or the Marketplace Offerings during any downtime or discontinuance of the Site or
            the Marketplace Offerings. Nothing in these Terms of Use will be construed to obligate us to maintain and
            support the Site or the Marketplace Offerings or to supply any corrections, updates, or releases in
            connection
            therewith.</p>
        <h5 class="text-primary">GOVERNING LAW
        </h5>
        <p>These terms shall be governed by and defined following the laws of Switzerland shall have and yourself
            irrevocably consent that the courts of Switzerland shall have exclusive jurisdiction to resolve any dispute
            which may arise in connection with these terms.</p>
        <h5 class="text-primary">DISPUTE RESOLUTION
        </h5>
        <p> <b class="text-primary">Informal Negotiations
            </b></p>
        <p>To expedite resolution and control the cost of any dispute, controversy, or claim related to these Terms of
            Use
            (each a "Dispute" and collectively, the "Disputes") brought by either you or us (individually, a "Party" and
            collectively, the "Parties"), the Parties agree to first attempt to negotiate any Dispute (except those
            Disputes
            expressly provided below) informally for at least 30 days before initiating attribution. Such informal
            negotiations commence upon written notice from one Party to the other Party.
        </p>
        <p><b class="text-primary">Binding Arbitration
            </b></p>
        <p>Any dispute arising out of or in connection with this contract, including any question regarding its
            existence,
            validity, or termination, shall be referred to and finally resolved by the International Commercial
            Arbitration
            Court under the European Arbitration Chamber (Belgium, Brussels, Avenue Louise, 146) according to the Rules
            of this ICÁC, which, because of referring to it, is considered as the part of this clause. The number of
            arbitrators shall be ___ The seat, or legal place, or arbitration shall be ___ language of the proceedings
            shall
            be The governing law of the contract shall ___The governing law of the contract shall be substantive law of
            ___.
        </p>
        <b class="text-primary">Restrictions</b>
        <p>The Parties agree that any arbitration shall be limited to the Dispute between the Parties individually. The
            the
            full extent permitted by law, (a) no arbitration shall be joined with any other proceeding; (b) there is no
            right
            or authority for any Dispute to be arbitrated on a class-action basis or to utilize class action procedures;
            and
            (c) there is no right or authority for any Dispute to be brought in a purported representative capacity on
            behalf
            of the public or any other persons. </p>
        <p><b class="text-primary">Exceptions to Informal Negotiations and Arbitration
            </b></p>
        <p>The Parties agree that the following Disputes are not subject to the above provisions concerning informal
            negotiations binding arbitration: (a) any Disputes seeking to enforce or protect, or concerning the validity
            of,
            any of the intellectual property rights of a Party: (b) any Dispute related to, or arising from, allegations
            of
            theft, piracy, invasion of privacy, or unauthorized use; and (c) any claim for injunctive relief. If this
            provision is
            found to be illegal or unenforceable, then neither Party will elect to arbitrate any Dispute falling within
            that
            portion of this provision found to be illegal or unenforceable and such Dispute shall be decided by a court
            of
            competent jurisdiction within the courts listed for jurisdiction above, and the Parties agree to submit to
            the
            personal jurisdiction of that court. </p>
        <h5 class="text-primary">CORRECTIONS</h5>
        <p>There may be information on the Site that contains typographical errors, inaccuracies, or omissions that may
            relate to the Marketplace Offerings, including descriptions, pricing, availability, and various other
            information.
            We reserve the right to correct any errors, inaccuracies, or omissions and to change or update the
            information
            on the Site at any time, without prior notice.
        </p>
        <h5 class="text-primary">DISCLAIMER</h5>
        <p>THE SITE IS PROVIDED ON AN AS-IS AND AS-AVAILABLE BASIS. YOU AGREE THAT YOUR USE OF THE SITE
            SERVICES WILL BE AT YOUR SOLE RISK. TO THE FULLEST EXTENT PERMITTED BY LAW, WE DISCLAIM ALL
            WARRANTIES, EXPRESS OR IMPLIED, IN CONNECTION WITH THE SITE AND YOUR USE THEREOF, INCLUDING,
            WITHOUT LIMITATION, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
            PURPOSE, AND NON-INFRINGEMENT. WE MAKE NO WARRANTIES OR REPRESENTATIONS ABOUT THE
            ACCURACY OR COMPLETENESS OF THE SITE'S CONTENT OR THE CONTENT OF ANY WEBSITES LINKED TO THIS
            SITE AND WE WILL ASSUME NO LIABILITY OR RESPONSIBILITY FOR ANY (1) ERRORS, MISTAKES, OR
            INACCURACIES OF CONTENT AND MATERIALS, (2) PERSONAL INJURY OR PROPERTY DAMAGE, OF ANY NATURE
            WHATSOEVER, RESULTING FROM YOUR ACCESS TO AND USE OF THE SITE, (3) ANY UNAUTHORIZED ACCESS TO
            OR USE OF OUR SECURE SERVERS AND/OR ANY AND ALL PERSONAL INFORMATION AND/OR FINANCIAL
            INFORMATION STORED THEREIN, (4) ANY INTERRUPTION OR CESSATION OF TRANSMISSION TO OR FROM THE
            SITE, (5) ANY BUGS, VIRUSES, TROJAN HORSES, OR THE LIKE WHICH MAY BE TRANSMITTED TO OR THROUGH
            THE SITE BY ANY THIRD PARTY, AND/OR (6) ANY ERRORS OR OMISSIONS IN ANY CONTENT AND MATERIALS OR
            FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF ANY CONTENT POSTED,
            TRANSMITTED, OR OTHERWISE MADE AVAILABLE VIA THE SITE. WE DO NOT WARRANT, ENDORSE,
            GUARANTEE, OR ASSUME RESPONSIBILITY FOR ANY PRODUCT OR SERVICE ADVERTISED OR OFFERED BY A
            THIRD PARTY THROUGH THE SITE, ANY HYPERLINKED WEBSITE, OR ANY WEBSITE OR MOBILE APPLICATION
            FEATURED IN ANY BANNER OR OTHER ADVERTISING, AND WE WILL NOT BEA PARTY TO OR IN ANY WAY BE
            RESPONSIBLE FOR MONITORING ANY TRANSACTION BETWEEN YOU AND ANY THIRD-PARTY PROVIDERS OF
            PRODUCTS OR SERVICES. AS WITH THE PURCHASE OF A PRODUCT OR SERVICE THROUGH ANY MEDIUM OR IN
            ANY ENVIRONMENT, YOU SHOOULD USE YOUR BEST JUDGMENT AND EXERCISE CAUTION WHERE
            APROPRIATE.
        </p>
        <h5 class="text-primary">LIMITATIONS OF LIABILITY IN NO EVENT
        </h5>
        <p>WILL WE OR OUR DIRECTORS, EMPLOYEES, OR AGENTS BE LIABLE TO YOU OR ANY THIRD PARTY FOR ANY
            DIRECT, INDIRECT, CONSEQUENTIAL, EXEMPLARY, INCIDENTAL, SPECIAL, OR PUNITIVE DAMAGES, INCLUDING
            LOST PROFIT, LOST REVENUE, LOSS OF DATA, OR OTHER DAMAGES ARISING FROM YOUR USE OF THE SITE,
            EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. NOTWITHSTANDING ANYTHING TO
            THE CONTRARY CONTAINED HEREIN, OUR LIABILITY TO YOU FOR ANY CAUSE WHATSOEVER AND REGARDLESS
            OF THE FORM OF THE ACTION, WILL AT ALL TIMES BE LIMITED TO THE LESSER OF THE AMOUNT PAID, IF ANY,
            BY YOU TO US OR CERTAIN US STATE LAWS AND INTERNATIONAL LAWS DO NOT ALLOW LIMITATIONS ON
            IMPLIED WARRANTIES OR THE EXCLUSION OR LIMITATION OF CERTAIN DAMAGES. IF THESE LAWS APPLY TO
            YOU, SOME OR ALL OF THE ABOVE DISCLAIMERS OR LIMITATIONS MAY NOT APPLY TO YOU, AND YOU MAY
            HAVE ADDITIONAL RIGHTS.</p>
        <h5 class="text-primary">INDEMNIFICATION</h5>
        <p>You agree to defend, indemnify, and hold us harmless, including our subsidiaries, affiliates, and all of our
            respective officers, agents, partners, and employees, from and against any loss, damage, liability, claim,
            or
            demand, including reasonable attorneys' fees and expenses, made by any third party due to or arising out of:
            (1) use of the Site; (2) breach of these Terms of Use; (3) any breach of your representations and warranties
            set
            forth in these Terms of Use; (4) your violation of the rights of a third party, including but not limited to
            intellectual property rights; or (5) any overt harmful act toward any other user of the Site with whom you
            connected via the Site. Notwithstanding the foregoing, we reserve the right, we Reserve the right, at your
            expense, to assume the exclusive defense and control of any matter for which you are required to indemnify
            us, and you agree to cooperate, at your expense, with our defense of such claims. We will use reasonable
            efforts to notify you of any such claim, action, or proceeding which is subject to this indemnification upon
            becoming aware of it.</p>
        <h5 class="text-primary">USER DATA
        </h5>
        <p>We will maintain certain data that you transmit to the Site for the purpose of managing the performance of
            the Site, as well as data relating to your use of the Site. Although we perform regular routine backups of
            data,
            you are solely responsible for all data that you transmit or that relates to any activity you have
            undertaken
            using the Site. You agree that we shall have no liability to you for any loss or corruption of any such
            data, and
            you hereby waive any right of action against us arising from any such loss or corruption of such data.</p>
        <h5 class="text-primary">ELECTRONIC COMMUNICATIONS, TRANSACTIONS, AND SIGNATURES</h5>
        <p>Visiting the Site, sending us emails, and completing online forms constitute electronic communications. You
            consent to receive electronic communications, and you agree that all agreements, notices, disclosures, and
            other communications we provide to you electronically, via email and on the Site, satisfy any legal
            requirement that such communication be in writing. YOU HEREBY AGREE TO THE USE OF ELECTRONIC
            SIGNATURES, CONTRACTS, ORDERS, AND OTHER RECORDS, AND TO ELECTRONIC DELIVERY OF NOTICES,
            POLICIES, AND RECORDS OF TRANSACTIONS INITIATED OR COMPLETED BY US OR VIA THE SITE. You hereby
            waive any rights or requirements under any statutes, regulations, rules, ordinances, or other laws in any
            jurisdiction which require an original signature or delivery or retention of non-electronic records, or to
            payments or the granting of credits by any means.</p>
        <h5 class="text-primary">MISCELLANEOUS</h5>
        <p>These Terms of Use and any policies or operating rules posted by us on the Site or in respect to the Site
            constitute the entire agreement and understanding between you and us. Our failure to exercise or enforce
            any right or provision of these Terms of Use shall not operate as a waiver of such right or provision. These
            Terms of Use fully operate permissible by law. We may assign any or all our rights and obligations to others
            at
            any time. We shall not be responsible or liable for any loss, damage, delay, or failure to act caused by any
            cause beyond our reasonable control. If any provision or part of a provision of these Terms of Use is
            determined to be unlawful, void, or unenforceable, that provision or part of the provision is deemed
            severable
            from these Terms of Use and does not affect the validity and enforceability of any remaining provisions.
            There
            is no joint venture, partnership, employment, or agency relationship created between you and us because of
            these Terms of Use or use of the Site. You agree that these Terms of Use will not be construed against us by
            virtue of having drafted them. You hereby waive all defense you may have based on the electronic form of
            these Terms of Use and the lack of signing by the parties hereto to execute these Terms of Use.
        </p>
        <h5 class="text-primary">Delivery</h5>
        <ul>
            <li><b class="text-primary">Order Delivey:</b> Orders are delivered directly to the delivery address and
                recipient specified by
                the
                customer. Deliveries are made by Swaad Foods delivery service. Orders will be delivered to the front
                door of private residences (as far as accessible) or the reception desk of business customers.</li>
            <li><b class="text-primary"> Delivery Times:</b> Swaad Foods make every effort to adhere to the delivery
                periods. However, all
                delivery
                times specified by Swaad Foods are for guidance purposes only. If a delivery period is not complied
                with, the customer is not entitled to withdraw from the contract or to receive compensation. Should
                Swaad Foods not be able to deliver an order, there is no obligation to carry out the delivery. The
                customer is not thereby entitled to compensation.</li>
            <li><b class="text-primary">Delivery Charges:</b> The minimum order value is 40 chf according to the
                delivery postcode.</li>
            <li><b class="text-primary">Cancellation of a Delivery:</b> Swaad Foods aims to hand the order over to the
                customer personally.
                If,
                for reasons beyond Swaad foods control - such as an incorrect delivery address, the recipient's absence,
                lack of an access, bad weather or road condition, or similar, it should prove impossible or possible
                only with great difficulty, to carry out the delivery successfully, Swaad Foods is entitled to cancel
                the order. In this event, the customer is not entitled to compensation, pecuniary or in kind.</li>
            <li><b class="text-primary">Return Rights:</b> Swaad Foods primary objective is to deliver all products
                ordered in the right
                quantity
                and to a high quality standard. In exceptional cases for various reasons, however, insufficient products
                may be available or it may not be possible to release a product. If products are unavailable at the time
                of delivery, they are not delivered later and no substitute products are delivered. The actual quantity
                delivered is stated on the delivery receipt. The customer is not entitled to compensation, pecuniary or
                in kind, in respect to quantities delivered partially or not at all. If an item is not delivered,
                despite being billed, the amount in question will be credited to the customer. No subsequent delivery
                will be made, and the customer is not entitled to claim compensation.</li>
        </ul>
        <h5 class="text-primary">Prices and Payments</h5>
        <ul>
            <li><b class="text-primary">Prices:</b> All prices are quoted in Swiss francs, including VAT at the
                applicable rate. The prices
                charged are those displayed on the www.swaadbern.ch website at the time of the order.</li>
            <li><b class="text-primary">Payment Methods:</b> Payment of the order must be made in Swiss francs. In
                addition to cash
                payment,
                various payment methods are available. Swaad Foods is entitled to decide at its own discretion which
                payment method to accept. The payment methods available are displayed for selection when the order is
                finalized. Payments made via the website are made to Swaad Foods GmbH.</li>
        </ul>
        <p style="font-style: italic" class="text-primary">
            No alcohol may be sold to children and young people under the age of 16. Beer and wine may only be sold to
            people over the age of 16. Spirits, aperitifs and alcopops may only be sold to people over the age of 18.
        </p>
        <h5 class="text-primary">CONTACT US
        </h5>
        <p>To resolve a complaint regarding the Site or to receive further information regarding use of the Site, please
            contact us at: </p>
        <p>Swaad Foods Gmbh <br>
            Bernstraße 95 <br>
            3072 Ostermundigen <br>
            + 031 558 33 88 <br>
            hello@swaadbern.ch <br>
        </p>
    </div>
</div>
@else
<div class="container">
    <div class="col-md-12 p-5">
        <h5 class="text-primary">VEREINBARUNG DER BEDINGUNGEN
        </h5>
        <p>Diese Nutzungsbedingungen stellen eine rechtsverbindliche Vereinbarung dar, die zwischen Ihnen persönlich
            oder
            im Namen eines Unternehmens ("Sie") und ("Unternehmen", "wir", "uns" oder Website sowie jeder anderen
            "unserer") über Ihren Zugriff auf und die Nutzung des Medienformulars, des Medienkanals, der mobilen Website
            oder der mobilen Anwendung getroffen wurde, die damit in Verbindung stehen ( zusammen mit der "Website").
            Sie erklären sich damit einverstanden, dass Sie durch den Zugriff auf die Website alle diese
            Nutzungsbedingungen
            gelesen, verstanden und zugestimmt haben, an diese Bedingungen gebunden zu sein. WENN SIE NICHT MIT ALL
            DIESEN NUTZUNGSBEDINGUNGEN EINVERSTANDEN SIND, IST ES IHNEN AUSDRÜCKLICH UNTERSAGT, DIE WEBSITE
            ZU NUTZEN, UND SIE MÜSSEN DIE NUTZUNG SOFORT EINSTELLEN.</p>
        <p>
            Ergänzende Geschäftsbedingungen oder Dokumente, die von Zeit zu Zeit auf der Website veröffentlicht werden
            können, werden hiermit ausdrücklich durch Bezugnahme hierin aufgenommen. Wir behalten uns das Recht vor,
            nach unserem alleinigen Ermessen jederzeit und aus beliebigem Grund Änderungen oder Änderungen an diesen
            Nutzungsbedingungen vorzunehmen. Wir werden Sie über Änderungen informieren, indem wir das Datum der
            "Letzten Aktualisierung" dieser Nutzungsbedingungen aktualisieren, und Sie verzichten auf jegliches Recht,
            eine
            bestimmte Benachrichtigung über jede solche Änderung zu erhalten. Es liegt in Ihrer Verantwortung, diese
            Nutzungsbedingungen regelmäßig zu überprüfen, um über Updates informiert zu bleiben. Sie unterliegen den
            Änderungen der geänderten Nutzungsbedingungen durch Ihre fortgesetzte Nutzung der Website nach dem Datum,
            an dem diese überarbeiteten Nutzungsbedingungen veröffentlicht wurden und akzeptiert wurden.
        </p>
        <p>Die auf der Website bereitgestellten Informationen sind nicht für die Verteilung an oder die Nutzung durch
            personen- oder juristische Einrichtungen in einem Land oder Land bestimmt, in dem eine solche Verbreitung
            oder
            Nutzung gegen Gesetze oder Vorschriften verstoßen würde oder die uns einer Registrierungspflicht innerhalb
            dieser Gerichtsbarkeit oder eines solchen Landes unterwerfen würden. Dementsprechend tun diejenigen
            Personen, die sich für den Zugriff auf die Website von anderen Standorten entscheiden, dies von sich aus und
            sind
            allein für die Einhaltung der lokalen Gesetze verantwortlich, sofern und soweit lokale Gesetze anwendbar
            sind. </p>
        <h5 class="text-primary">RECHTE DES GEISTIGEN EIGENTUMS
        </h5>
        <p>Sofern nicht anders angegeben, ist die Website unser Eigentum und alle Quellcodes, Datenbanken, Funktionen,
            Software, Website-Designs, Audio, Video, Text, Fotos und Grafiken auf der Website (zusammen die "Inhalte")
            und
            die darin enthaltenen Marken, Dienstleistungsmarken und Logos (die "Marken") sind Eigentum oder werden von
            uns kontrolliert oder an uns lizenziert und sind durch Urheberrechts- und Markengesetze und verschiedene
            andere
            Rechte des geistigen Eigentums und unlauteren Wettbewerbs geschützt. Der Inhalt und die Marken werden auf
            der Website "AS IS" nur zu Ihrer Information und zum persönlichen Gebrauch bereitgestellt. Sofern nicht
            ausdrücklich in diesen Nutzungsbedingungen vorgesehen, dürfen kein Teil der Website und keine Inhalte oder
            Marken ohne unsere ausdrückliche vorherige schriftliche Genehmigung kopiert, reproduziert, aggregiert,
            wiederveröffentlicht, hochgeladen, veröffentlicht, öffentlich angezeigt, kodiert, übersetzt, übertragen,
            verteilt,
            verkauft, lizenziert oder anderweitig für kommerzielle Zwecke genutztwerden.</p>
        <p>Sofern Sie zur Nutzung der Website berechtigt sind, erhalten Sie eine beschränkte Lizenz für den Zugriff auf
            und
            die Nutzung der Website sowie für das Herunterladen oder Drucken einer Kopie eines Teils der Inhalte, auf
            den Sie
            ordnungsgemäß nur für Ihren persönlichen, nicht-kommerziellen Gebrauch Zugriff erhalten haben. Wir behalten
            uns alle Rechte vor, die Ihnen nicht ausdrücklich an und an der Website, den Inhalten und den Marken gewährt
            werden. </p>
        <h5 class="text-primary">BENUTZER REPRESENTATIONEN
        </h5>
        <p>Durch die Nutzung der Website erklären und garantieren Sie, dass: (1) Sie die Rechtsfähigkeit haben und sie
            damit
            einverstanden sind, diese Nutzungsbedingungen einzuhalten; (2) Sie in der Gerichtsbarkeit, in der Sie
            wohnen,
            nicht minderjährig sind; (3) Sie werden nicht über automatisierte oder nicht-menschliche Mittel auf die
            Website
            zugreifen, sei es durch einen Bot, ein Skript oder auf andere Weise; (4) Sie werden die Website nicht für
            illegale
            oder nicht autorisierte Zwecke nutzen; und (5) Ihre Nutzung der Website verstößt nicht gegen geltendes Recht
            oder Vorschriften.</p>
        <p>Wenn Sie unwahre, ungenaue, nicht aktuelle oder unvollständige Informationen zur Verfügung stellen, haben wir
            das Recht, Ihr Konto zu sperren oder zu kündigen und jede aktuelle und zukünftige Nutzung der Website (oder
            eines Teils davon) abzulehnen.</p>
        <h5 class="text-primary">Produkte
        </h5>
        <p>Wir bemühen uns, die Farben, Funktionen, Spezifikationen und Details der auf der Website verfügbaren Produkte
            so genau wie möglich anzuzeigen. Wir garantieren jedoch nicht, dass die Farben, Merkmale, Spezifikationen
            und
            Details der Produkte genau, vollständig, zuverlässig, aktuell oder frei von anderen Fehlern sind, und Ihr
            elektronisches Display spiegelt möglicherweise nicht genau die tatsächlichen Farben und Details der Produkte
            wider. Alle Produkte unterliegen der Verfügbarkeit, und wir können nicht garantieren, dass die Artikel auf
            Lager
            sind. Wir behalten uns das Recht vor, Produkte jederzeit aus irgendeinem Grund einzustellen. Die Preise für
            alle
            Produkte können sich ändern.</p>
        <h5 class="text-primary">KÄUFE UND ZAHLUNG
        </h5>
        <p>Wir akzeptieren die folgenden Zahlungsarten:
        </p>
        <p>Sie erklären sich damit einverstanden, aktuelle, vollständige und genaue Kauf- und Kontoinformationen für
            alle
            Über die Website getätigten Käufe bereitzustellen. Sie erklären sich ferner damit einverstanden, Konto- und
            Zahlungsinformationen, einschließlich E-Mail-Adresse, Zahlungsmethode und Ablaufdatum der Zahlungskarte,
            unverzüglich zu aktualisieren, damit wir Ihre Transaktionen abschließen und Sie bei Bedarf kontaktieren
            können.
            Die Mehrwertsteuer wird zu dem von uns als erforderlich geltenden Kaufpreis hinzugesetzt. Wir können die
            Preise
            jederzeit ändern. Alle Zahlungen sind in CHF.</p>
        <p>Sie erklären sich damit einverstanden, alle Gebühren zu den preisen zu zahlen, die dann für Ihre Einkäufe und
            alle
            anfallenden Versandkosten gelten, und Sie ermächtigen uns, Ihrem gewählten Zahlungsanbieter bei der
            Bestellung
            eine solche Gebühr in Rechnung zu stellen. Wir behalten uns das Recht vor, Fehler oder Fehler bei der
            Preisgestaltung zu korrigieren, auch wenn wir bereits eine Zahlung angefordert oder erhalten haben.
        </p>
        <p>Wir behalten uns das Recht vor, jede Bestellung, die über die Website aufgegeben wird, abzulehnen. Wir können
            nach unserem alleinigen Ermessen die gekauften Mengen pro Person, pro Haushalt oder pro Bestellung begrenzen
            oder stornieren. Diese Einschränkungen können Bestellungen umfassen, die von oder unter demselben
            Debitorenkonto, derselben Zahlungsmethode und/oder Bestellungen, die dieselbe Rechnungs- oder Lieferadresse
            verwenden, aufgegeben wurden. Wir behalten uns das Recht vor, Bestellungen zu beschränken oder zu verbieten,
            die nach unserem alleinigen Urteil von Händlern, Wiederverkäufern oder Distributoren aufgegeben werden. </p>
        <h5 class="text-primary">VERBOTENE AKTIVITÄTEN

        </h5>
        <p>Sie dürfen nicht auf die Website zugreifen oder diese zu anderen Zwecken nutzen, als für die wir die Website
            zur
            Verfügung stellen. Die Website darf nicht in Verbindung mit kommerziellen Bemühungen verwendet werden, mit
            Ausnahme derjenigen, die von uns ausdrücklich unterstützt oder genehmigt wurden.</p>
        <p>Als Nutzer der Website erklären Sie sich damit einverstanden,
        </p>
        <h5 class="text-primary">NUTZERGENERIERTE BEITRÄGE

        </h5>
        <p>Die Website bietet Benutzern keine Zum Übermitteln oder Posten von Inhalten. Wir können Ihnen die Möglichkeit
            geben, Inhalte und Materialien an uns oder auf der Website zu erstellen, zu übermitteln, zu posten,
            anzuzeigen, zu
            übertragen, auszuführen, zu veröffentlichen, zu verteilen oder an uns oder auf der Website zu übertragen,
            einschließlich, aber nicht beschränkt auf Text, Schriften, Video, Audio, Fotos, Grafiken, Kommentare,
            Vorschläge
            oder persönliche Informationen oder anderes Material (zusammen "Beiträge"). Beiträge können von anderen
            Nutzern der Website und über Websites Dritter einsehbar sein. Daher können alle Beiträge, die Sie
            übermitteln, in
            Übereinstimmung mit der Datenschutzrichtlinie der Website behandelt werden. Wenn Sie Beiträge erstellen oder
            zur Verfügung stellen, versichern und garantieren Sie damit: </p>
        <ol>
            <li>Die Erstellung, Verteilung, Übertragung, öffentliche Anzeige oder Leistung sowie der Zugriff, das
                Herunterladen oder kopieren Ihrer Beiträge verletzen nicht die Eigentumsrechte, einschließlich, aber
                nicht
                beschränkt auf die Urheberrechte, Patente, Marken, Geschäftsgeheimnisse oder moralischen Rechte
                Dritter.</li>
            <li>Sie sind der Ersteller und Eigentümer der erforderlichen Lizenzen, Rechte, Zustimmungen, Freigaben und
                Berechtigungen zur Nutzung und Autorisierung von uns, der Website und anderen Nutzern der Website,
                Ihre Beiträge in irgendeiner weise zu nutzen, die von der Website und diesen Nutzungsbedingungen in
                Betracht gezogen wird.</li>
            <li>Sie haben die schriftliche Zustimmung, Freigabe und/oder Erlaubnis jeder einzelnen Person in Ihren
                Beiträgen, den Namen oder das Abbild jeder einzelnen identifizierbaren Person zu verwenden, um die
                Aufnahme und Nutzung Ihrer Beiträge in jeder von der Website und diesen Nutzungsbedingungen
                vorgesehenen Weise zu ermöglichen.</li>
            <li>Ihre Beiträge sind nicht falsch, ungenau oder irreführend.
            </li>
            <li>Ihre Beiträge sind keine unaufgeforderte oder nicht autorisierte Werbung, Werbeaktionen,
                Pyramidensysteme, Kettenbriefe, Spam, Massensendungen oder andere Formen der Aufforderung. </li>
            <li>Ihre Beiträge sind nicht obszön, unzüchtig, lasziv, schmutzig, gewalttätig, belästigend, verleumderisch,
                verleumderisch oder anderweitig anstößig (wie von uns bestimmt). </li>
            <li>Ihre Beiträge verspotten, verspotten, verunglimpfen, einschüchtern oder missbrauchen niemanden. </li>
            <li>Ihre Beiträge werden nicht dazu verwendet, (im rechtlichen Sinne) eine andere Person zu belästigen oder
                zu bedrohen und Gewalt gegen eine bestimmte Person oder Personenschicht zu fördern.</li>
            <li>Ihre Beiträge verstoßen nicht gegen geltendes Recht, Vorschriften oder Regeln. </li>
            <li> Ihre Beiträge verletzen nicht die Privatsphäre oder die Publizitätsrechte Dritter. </li>
            <li>Ihre Beiträge enthalten kein Material, das persönliche Informationen von Personen unter 18 Jahren
                anfordert oder Menschen unter 18 Jahren sexuell oder gewalttätig ausbeutet. </li>
            <li> Ihre Beiträge verstoßen nicht gegen geltendes Gesetz in Bezug auf Kinderpornographie oder auf andere
                Weise zum Schutz der Gesundheit oder des Wohlbefindens von Minderjährigen. </li>
            <li>Ihre Beiträge enthalten keine beleidigenden Kommentare, die mit Rasse, nationaler Herkunft, Geschlecht,
                sexueller Präferenz oder körperlicher Behinderung zusammenhängen.</li>
            <li> Ihre Beiträge verstoßen auf andere Weise nicht gegen Materialien, die gegen eine Bestimmung dieser
                Nutzungsbedingungen oder gegen geltendes Recht oder Vorschriften verstoßen.</li>
        </ol>
        <p>Jede Nutzung der Website oder der Marketplace-Angebote, die gegen das Vorstehende verstößt, verstößt
            gegen diese Nutzungsbedingungen und kann unter anderem zur Kündigung oder Aussetzung Ihrer Rechte zur
            Nutzung der Website und der Marketplace-Angebote führen. </p>
        <h5 class="text-primary">BEITRAGSLIZENZ
        </h5>
        <p>You und Site stimmen zu, dass wir auf alle Von Ihnen gemäß den Bedingungen der Datenschutzrichtlinie und
            Ihrer Auswahl (einschließlich Einstellungen) von Ihnen zur Verfügung stellenden Informationen und
            personenbezogenen Daten zugreifen, diese speichern, verarbeiten und nutzen können.</p>
        <p>Indem Sie Vorschläge oder andere Rückmeldungen bezüglich der Website einreichen, erklären Sie sich damit
            einverstanden, dass wir dieses Feedback für jeden Zweck ohne Entschädigung an Sie verwenden und
            weitergeben können.</p>
        <p>Wir übernehmen kein Eigentum an Ihren Beiträgen. Sie behalten das volle Eigentum an allen Ihren Beiträgen
            und allen geistigen Eigentumsrechten oder anderen Eigentumsrechten im Zusammenhang mit Ihren
            Beiträgen. Wir haften nicht für Aussagen oder Zusicherungen in Ihren Beiträgen, die Von Ihnen in irgendeinem
            Bereich auf der Website bereitgestellt werden. Sie sind allein verantwortlich für Ihre Beiträge auf der
            Website
            und Sie erklären sich ausdrücklich damit einverstanden, uns von jeglicher Verantwortung zu entlasten und
            jegliche zu unterlassen. Rechtliche Schritte gegen uns in Bezug auf Ihre Beiträge. </p>
        <h5 class="text-primary">Einreichungen</h5>
        <p>Sie erkennen an und stimmen zu, dass alle Fragen, Kommentare, Vorschläge, Ideen, Feedback oder andere
            Informationen in Bezug auf die Website oder die Marktplatzangebote ("Einreichungen"), die Sie uns zur
            Verfügung stellen, nicht vertraulich sind und unser alleiniges Eigentum werden. Wir besitzen ausschließliche
            Rechte, einschließlich aller Rechte an geistigem Eigentum, und haben das Recht auf uneingeschränkte Nutzung
            und Verbreitung dieser Einsendungen für jeden rechtmäßigen Zweck, kommerziell oder anderweitig, ohne
            Anerkennung oder Entschädigung für Sie. Sie verzichten hiermit auf alle moralischen Rechte an solchen
            Einsendungen, und Sie garantieren hiermit, dass solche Einsendungen bei Ihnen original sind oder dass Sie
            das
            Recht haben, solche Einsendungen einzureichen. Sie stimmen zu, dass es keinen Rückgriff gegen uns wegen
            einer angeblichen oder tatsächlichen Verletzung oder Veruntreuung von Eigentumsrechten in Ihren
            Einsendungen gibt. </p>
        <h5 class="text-primary">SITE-MANAGEMENT
        </h5>
        <p>Wbehält sich das Recht, aber nicht die Verpflichtung vor, die Website auf Verstöße gegen diese
            Nutzungsbedingungen zu überwachen; (2) geeignete rechtliche Schritte gegen jeden einzuleiten, der nach
            unserem alleinigen Ermessen gegen das Gesetz oder diese Nutzungsbedingungen verstößt, einschließlich, aber
            nicht beschränkt auf die Meldung dieses Nutzers an Strafverfolgungsbehörden; (3) nach unserem alleinigen
            Ermessen und ohne Einschränkung den Zugriff auf, beschränken oder deaktivieren (soweit technologisch
            machbar) Ihrer Beiträge oder Teile davon, (4) nach unserem alleinigen Ermessen und ohne Einschränkung,
            Mitteilung oder Haftung, um alle Dateien und Inhalte, die übermäßig groß sind oder in irgendeiner Weise
            belastend für unsere Systeme sind, von der Website zu entfernen oder anderweitig zu deaktivieren; und (5)
            ansonsten die Website in einer Weise verwalten, die unsere Rechte und unser Eigentum schützt und das
            ordnungsgemäße Funktionieren der Website und der Marketplace-Angebote erleichtert.
        </p>
        <h5 class="text-primary">LAUFZEIT UND KÜNDIGUNG
        </h5>
        <p>Diese Nutzungsbedingungen bleiben während der Nutzung der Website in vollem Umfang in Kraft und
            wirksam. OHNE EINE ANDERE PROVISION DIESER NUTZUNGSBEDINGUNGEN, WIR RESERVE THE RIGHT TO, IN
            UNSERER SOLE DISCRETION UND OHNE HINWEIS ODER HAFTUNG, DENY ACCESS TO AND USE OF THE SITE
            AND THE MARKETPLACE OFFERINGS (INCLUDING BLOCKING CERTAIN IP ADDRESSES), TO ANY PERSON FOR
            ANY REASON OR FOR NO REASON, INCLUDING WITHOUT LIMITATION FOR ANY REPRESENTATION,
            WARRANTY, OR COVENANT CONTAINED WIR KÖNNEN IHRE VERWENDUNG ODER TEILNAHME AN DER SITE
            UND DEM MARKETPLACE-ANGEBOT ODER JEDEN INHALT ODER INFORMATIONEN, DIE SIE AUF JEDER ZEIT,
            OHNE WARNUNG, IN UNSERER SOLE DISCRETION POSTED.</p>
        <p>Wenn wir Ihr Konto aus irgendeinem Grund kündigen oder sperren, ist es Ihnen untersagt, sich unter Ihrem
            Namen, einem gefälschten oder geliehenen Namen oder dem Namen Eines Dritten zu registrieren und ein
            neues Konto zu erstellen, auch wenn Sie im Namen des Dritten handeln. Neben der Kündigung oder
            Aussetzung Ihres Kontos behalten wir uns das Recht vor, geeignete rechtliche Schritte einzuleiten,
            einschließlich und ohne Einschränkung zivilrechtliche, strafrechtliche und unterstrafe Rechtsmittel.
        </p>
        <h5 class="text-primary">MODIFIKATIONEN UND INTERRUPTIONEN

        </h5>
        <p>Wir behalten uns das Recht vor, den Inhalt der Website jederzeit oder aus irgendeinem Grund nach unserem
            alleinigen Ermessen ohne vorherige Ankündigung zu ändern, zu ändern oder zu entfernen. Wir sind jedoch
            nicht verpflichtet, Informationen auf unserer Website zu aktualisieren. Wir behalten uns auch das Recht vor,
            die Marketplace-Angebote jederzeit ganz oder teilweise ohne vorherige Ankündigung zu ändern oder
            einzustellen. Wir haften Ihnen oder Dritten gegenüber nicht für Änderungen, Preisänderungen, Aussetzungen
            oder Unterbrechungen der Website oder der Marketplace-Angebote. </p>
        <p>Wir können nicht garantieren, dass die Website und die Marketplace-Angebote immer verfügbar sind. Es kann
            zu Hardware- oder Software- oder anderen Problemen kommen oder Wartungsarbeiten im Zusammenhang
            mit der Website erforderlich sind, was zu Unterbrechungen, Verzögerungen oder Fehlern führen kann. Wir
            behalten uns das Recht vor, die Website oder die Marketplace-Angebote jederzeit oder aus irgendeinem
            Grund ohne vorherige Ankündigung zu ändern, zu aktualisieren, auszusetzen, einzustellen oder anderweitig zu
            ändern. Sie erklären sich damit einverstanden, dass wir keinerlei Haftung für Verluste, Schäden oder
            Unannehmlichkeiten übernehmen, die durch Ihre Unfähigkeit, auf die Website oder die MarketplaceAngebote
            zuzugreifen oder diese zu nutzen, während Ausfallzeiten oder Unterbrechungen der Website oder
            der Marketplace-Angebote entstehen. Nichts in diesen Nutzungsbedingungen wird so ausgelegt, daß wir
            verpflichtet sind, die Website oder die Marketplace-Angebote zu pflegen und zu unterstützen oder
            Korrekturen, Aktualisierungen oder Freigaben in Verbindung damit zuliefern.
        </p>
        <h5 class="text-primary">REGIERENDES RECHT

        </h5>
        <p>Diese Bedingungen unterliegen dem schweizerischen Recht und werden selbst unwiderruflich damit
            einverstanden sein, dass die Gerichte der Schweiz ausschließlich für die Beilegung von Streitigkeiten
            zuständig sind, die im Zusammenhang mit diesen Bedingungen entstehen können.</p>
        <h5 class="text-primary">Streitbeilegung
        </h5>
        <p> <b class="text-primary">Informelle Verhandlungen

            </b></p>
        <p>Um die Beilegung und Kontrolle der Kosten von Streitigkeiten, Kontroversen oder Ansprüchen im
            Zusammenhang mit diesen Nutzungsbedingungen (jeweils eine "Streitigkeit" und kollektiv die von Ihnen oder
            uns (einzeln, eine "Partei" und gemeinsam die "Parteien") vorgebrachten Streitigkeiten zu beschleunigen,
            vereinbaren die Vertragsparteien, zunächst mindestens 30 Tage vor der Initiierung der Zuschreibung zu
            versuchen, Streitigkeiten (mit Ausnahme der unten ausdrücklich genannten Streitigkeiten) informell
            auszuhandeln. Solche informellen Verhandlungen beginnen mit einer schriftlichen Mitteilung einer
            Vertragspartei an die andere Vertragspartei.
        </p>
        <p><b class="text-primary">Verbindliche Schiedsgerichtsbarkeit

            </b></p>
        <p>Alle Streitigkeiten, die sich aus oder im Zusammenhang mit diesem Vertrag ergeben, einschließlich fragender
            Fragen nach seiner Existenz, Gültigkeit oder Beendigung, werden vom Internationalen Handelsschiedsgericht
            nach der Europäischen Schiedskammer (Belgien, Brüssel, Avenue Louise, 146) gemäß den Regeln dieser ICC,
            die aufgrund ihrer Bezugnahme darauf als Teil dieser Klausel betrachtet wird, als Teil dieser Klausel
            bezeichnet
            und endgültig beigelegt. Die Anzahl der Schiedsrichter ist ___ _ Der Sitz oder Gerichtsplatz, oder Schieds
            ist
            ___ Sprache des Verfahrens ist das geltende Recht des Vertrages ___The geltendes Recht des Vertrages ist
            materiellrechtliches Recht von ___.

        </p>
        <b class="text-primary">Einschränkungen</b>
        <p>Die Vertragsparteien vereinbaren, dass ein Schiedsverfahren auf die Streitigkeit zwischen den
            Vertragsparteien einzeln beschränkt ist. Der volle gesetzlich zulässige Umfang, (a) kein Schiedsverfahren
            wird
            mit einem anderen Verfahren verbunden; (b) es besteht kein Recht oder eine Befugnis, Dass eine Streitigkeit
            auf Der Grundlage einer Sammelklage oder zur Nutzung von Sammelklagen schlichtet wird; und c) es besteht
            kein Recht oder eine Befugnis, Streitigkeiten in angeblicher repräsentativer Eigenschaft im Namen der
            Öffentlichkeit oder anderer Personen zu bringen. </p>
        <p><b class="text-primary">Ausnahmen von informellen Verhandlungen und Schiedsverfahren

            </b></p>
        <p>Die Vertragsparteien kommen überein, dass die folgenden Streitigkeiten nicht den oben genannten
            Bestimmungen über informelle Verhandlungen unterliegen, die ein verbindliches Schiedsverfahren betreffen:
            (a) alle Streitigkeiten, die darauf abzielen, eines der Rechte an geistigem Eigentum einer Vertragspartei
            durchzusetzen oder zu schützen oder die Gültigkeit dieser Rechte zu schützen: b) alle Streitigkeiten, die
            sich
            auf Vorwürfe des Diebstahls, der Piraterie, der Verletzung der Privatsphäre oder der unbefugten Nutzung
            beziehen oder sich daraus ergeben; und c) jeden Unterlassungsanspruch. Sollte sich herausstellen, dass diese
            Bestimmung rechtswidrig oder nicht durchsetzbar ist, wird sich keine der Parteien dafür entscheiden,
            Streitigkeiten zu schlichten, die unter diesen Teil dieser Bestimmung fallen, der als rechtswidrig oder
            nicht
            durchsetzbar erachten wird, und diese Streitigkeit wird von einem zuständigen Gericht innerhalb der oben
            genannten Gerichte entschieden, und die Parteien erklären sich damit einverstanden, sich der persönlichen
            Zuständigkeit dieses Gerichts zu unterwerfen. </p>
        <h5 class="text-primary">Korrekturen</h5>
        <p>Es können Informationen auf der Website vorhanden sein, die typografische Fehler, Ungenauigkeiten oder
            Auslassungen enthalten, die sich auf die Marketplace-Angebote beziehen können, einschließlich
            Beschreibungen, Preisen, Verfügbarkeit und verschiedenen anderen Informationen. Wir behalten uns das
            Recht vor, Fehler, Ungenauigkeiten oder Auslassungen zu korrigieren und die Informationen auf der Website
            jederzeit und ohne vorherige Ankündigung zu ändern oder zu aktualisieren.
        </p>
        <h5 class="text-primary">Haftungsausschluss</h5>
        <p>DIE WEBSITE WIRD AUF EINER AS-IS- UND VERFÜGBAR-BASIS ZUR VERFÜGUNG GESTELLT. SIE STIMMEN ZU,
            DASS IHRE NUTZUNG DER WEBSITE-DIENSTE AUF IHR ALLEINIGES RISIKO ERFOLGT. ZUM VOLLEN EXTENT
            ALLOWED BY LAW, WE DISCLAIM ALL WARRANTIES, EXPRESS OR IMPLIED, IN CONNECTION WITH THE SITE
            AND YOUR USE THEREOF, INCLUDING, WITHOUT LIMITATION, THE IMPLIED WARRANTIES OF
            MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT. WIR MACHEN KEINE
            GARANTIEIER ODER REPRESENTATIONEN ÜBER DIE GENAUIGKEIT ODER COMPLETENESS DER WEBSITEINHALTE ODER DIE INHALTE
            EINES WEBSITES AUF DIESER WEBSITE UND WIR WERDEN KEINE LIABILITÄT ODER
            VERANTWORTUNG FÜR JEDE (1) FEHLER, FEHLER, ODER INACCURACIES VON CONTENT UND MATERIALIEN, (2)
            PERSONEN- ODER SACHSCHÄDEN JEGLICHER ART, DIE SICH AUS IHREM ZUGRIFF AUF UND DER NUTZUNG DER
            WEBSITE ERGEBEN, (3) JEGLICHEN UNBEFUGTEN ZUGRIFF AUF ODER DIE UNBEFUGTE NUTZUNG UNSERER
            SICHEREN SERVER UND/ODER ALLER DARIN GESPEICHERTEN PERSONENBEZOGENEN DATEN UND/ODER
            FINANZINFORMATIONEN, (4) UNTERBRECHUNG ENDERATION ODER ÜBERTRAGUNG VON DER WEBSITE, (5)
            BUGS, VIREN, TROJANISCHE PFERDE ODER DERGLEICHEN, DIE VON DRITTEN AN ODER DURCH DIE WEBSITE
            ÜBERTRAGEN WERDEN KÖNNEN. , UND/ODER (6) ANY ERRORS OR OMISSIONS IN ANY CONTENT AND
            MATERIALS OR FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF ANY
            CONTENT POSTED, TRANSMITTED, OR OTHERWISE MADE AVAILABLE VIA THE SITE. WIR NICHT WARRANT,
            ENDORSE, GARANTIE, ODER ASSUME RESPONSIBILITY FÜR JEDEN PRODUKT ODER SERVICE ADVERTISED ODER
            VON EINEM DRITTEN PARTY THROUGH THE SITE, JEDE HYPERLINKED WEBSITE, ODER JEDE WEBSITE ODER
            MOBILE ANWENDUNG FEATURED IN EINEM BANNER ODER ANDEREN ADVERTISING, UND WIR WERDEN NICHT
            AUF ODER IN EINEM WAY SIND AS WITH THE PURCHASE OF A PRODUCT OR SERVICE THROUGH ANY MEDIUM
            OR IN ANY ENVIRONMENT, YOU SHOOULD USE YOUR BEST JUDGMENT AND EXERCISE CAUTION WHERE
            APROPRIATE.
        </p>
        <h5 class="text-primary">HAFTUNGSBESCHRÄNKUNGEN IN KEINEM FALL

        </h5>
        <p>WERDEN WIR ODER UNSERE DIREKTOREN, MITARBEITER ODER AGENTEN IHNEN ODER DRITTEN GEGENÜBER
            FÜR DIREKTE, INDIREKTE, FOLGE-, BEISPIELHAFTE, ZUFÄLLIGE, BESONDERE ODER STRAFSCHÄDEN HAFTEN,
            EINSCHLIEßLICH ENTGANGENER GEWINNE, ENTGANGENER EINNAHMEN, DATENVERLUST ODER SONSTIGER
            SCHÄDEN, DIE SICH AUS IHRER NUTZUNG DER WEBSITE ERGEBEN, AUCH WENN WIR ÜBER DIE MÖGLICHKEIT
            SOLCHER SCHÄDEN INFORMIERT WURDEN. UNGEACHTET DER HIERIN ENTHALTENEN GEGENTEILIGEN ART IST
            UNSERE HAFTUNG IHNEN GEGENÜBER AUS IRGENDEINEM GRUND UND UNABHÄNGIG VON DER FORM DER
            HANDLUNG JEDERZEIT AUF DEN GERINGEREN BETRAG BESCHRÄNKT, DER SIE AN UNS ODER BESTIMMTE
            GESETZE DES US-BUNDESSTAATES GEZAHLT HABEN, ODER BESTIMMTE GESETZE UND INTERNATIONALE
            GESETZE DER USA LASSEN KEINE BESCHRÄNKUNGEN STILLSCHWEIGENDER GEWÄHRLEISTUNGEN ODER DEN
            AUSSCHLUSS ODER DIE BEGRENZUNG BESTIMMTER SCHÄDEN ZU. WENN DIESE GESETZE AUF SIE, SOME ODER
            ALLE DER ABOVE DISCLAIMERS ODER LIMITATIONEN NICHT AUF SIE ANWENDEN, UND SIE KÖNNEN
            ZUSÄTZLICHE RECHTE HABEN. </p>
        <h5 class="text-primary">Entschädigung</h5>
        <p>Sie erklären sich damit einverstanden, uns, einschließlich unserer Tochtergesellschaften, verbundenen
            Unternehmen und alle unsere jeweiligen leitenden Angestellten, Vertreter, Partner und Mitarbeiter, von und
            gegen Verluste, Schäden, Haftung, Ansprüche oder Forderungen, einschließlich angemessener Anwaltskosten
            und -kosten, die von Dritten aufgrund oder aus: (1) Nutzung der Website verursacht werden oder sich daraus
            ergeben, schadlos zu halten; (2) Verstoß gegen diese Nutzungsbedingungen; (3) jede Verletzung Ihrer
            Zusicherungen und Garantien, die in diesen Nutzungsbedingungen dargelegt sind; (4) Ihre Verletzung der
            Rechte Dritter, einschließlich, aber nicht beschränkt auf rechte an geistigem Eigentum; oder (5) jede
            unverhakte schädliche Handlung gegenüber einem anderen Benutzer der Website, mit dem Sie über die
            Website verbunden sind. Ungeachtet des Vorstehenden behalten wir uns das Recht vor, wir rve die r,auf
            IhreKosten, die ausschließliche Verteidigung und Kontrolle über alle Angelegenheit, für die Sie verpflichtet
            sind, uns zu entschädigen, zu übernehmen, und Sie stimmen zu, auf Ihre Kosten mit unserer Verteidigung
            solcher Ansprüche zusammenzuarbeiten. Wir werden angemessene Anstrengungen unternehmen, um Sie
            über solche Ansprüche, Maßnahmen oder Verfahren zu informieren, die dieser Entschädigung unterliegen,
            wenn wir davon Kenntnis erhalten.</p>
        <h5 class="text-primary">BENUTZERDATEN
        </h5>
        <p>Wir werden bestimmte Daten, die Sie an die Website übermitteln, zum Zwecke der Verwaltung der Leistung
            der Website sowie Daten im Zusammenhang mit Ihrer Nutzung der Website pflegen. Obwohl wir regelmäßige
            routinemäßige Sicherungen von Daten durchführen, sind Sie allein verantwortlich für alle Daten, die Sie
            übermitteln oder die sich auf Aktivitäten beziehen, die Sie über die Website durchgeführt haben. Sie
            erklären
            sich damit einverstanden, dass wir Ihnen gegenüber keine Haftung für Verluste oder Korruption solcher Daten
            übernehmen, und Sie verzichten hiermit auf ein Klagerecht gegen uns, das sich aus einem solchen Verlust oder
            einer solchen Beschädigung solcher Daten ergibt.</p>
        <h5 class="text-primary">ELEKTRONISCHE KOMMUNIKATIONEN, TRANSACTIONS UND SIGNATURES
        </h5>
        <p>Der Besuch der Website, das Versenden von E-Mails und das Ausfüllen von Online-Formularen stellen eine
            elektronische Kommunikation dar. Sie stimmen dem Erhalt elektronischer Mitteilungen zu und stimmen zu,
            dass alle Vereinbarungen, Mitteilungen, Offenlegungen und andere Mitteilungen, die wir Ihnen elektronisch,
            per E-Mail und auf der Website zur Verfügung stellen, allen gesetzlichen Anforderungen entsprechen, dass
            diese Mitteilung schriftlich erfolgen muss. SIE HIERZUKLEBEN AUF DIE VERWENDUNG VON ELEKTRONISCHEN
            SIGNATUREN, CONTRACTS, ORDERS, AND OTHER RECORDS, AND TO ELECTRONIC DELIVERY OF NOTICES,
            POLICIES, AND RECORDS OF TRANSACTIONS INITIATED OR COMPLETED BY US OR VIA THE SITE. Sie verzichten
            hiermit auf Rechte oder Anforderungen aufgrund von Gesetzen, Vorschriften, Regeln, Verordnungen oder
            anderen Gesetzen in einer Gerichtsbarkeit, die eine Originalunterschrift oder Lieferung oder Aufbewahrung
            nichtelektronischer Aufzeichnungen erfordern, oder auf Zahlungen oder die Gewährung von Krediten mit allen
            Mitteln.</p>
        <h5 class="text-primary">Sonstige</h5>
        <p>Diese Nutzungsbedingungen und alle Richtlinien oder Betriebsregeln, die von uns auf der Website oder in
            Bezug auf die Website veröffentlicht werden, stellen die gesamte Vereinbarung und Das ein Verständnis
            zwischen Ihnen und uns dar. Unser Versäumnis, ein Recht oder eine Bestimmung dieser Nutzungsbedingungen
            auszuüben oder durchzusetzen, gilt nicht als Verzicht auf dieses Recht oder diese Bestimmung. Diese
            Nutzungsbedingungen sind gesetzlich zulässig. Wir können unsere Rechte und Pflichten jederzeit an andere
            abtreten. Wir sind nicht verantwortlich oder haftbar für Verluste, Schäden, Verzögerungen oder Nichthandeln,
            die durch einen Grund verursacht werden, der außerhalb unserer angemessenen Kontrolle liegt. Sollte eine
            Bestimmung oder ein Teil einer Bestimmung dieser Nutzungsbedingungen als rechtswidrig, nichtig oder nicht
            durchsetzbar befunden werden, wird diese Bestimmung oder ein Teil der Bestimmung als von diesen
            Nutzungsbedingungen abtrennbar erachtet und berührt nicht die Gültigkeit und Durchsetzbarkeit der übrigen
            Bestimmungen. Es gibt kein Joint Venture, keine Partnerschaft, keine Beschäftigung oder eine
            Agenturbeziehung, die aufgrund dieser Nutzungsbedingungen oder der Nutzung der Website zwischen Ihnen
            und uns entstanden ist. Sie erklären sich damit einverstanden, dass diese Nutzungsbedingungen nicht gegen
            uns ausgelegt werden, da sie verfasst wurden. Sie verzichten hiermit auf alle Verteidigung you may haben
            based auf der elektronischen Form derse Terms der Nutzung und die lack der Unterzeichnung durch die
            Parteienhierzu, um diese Nutzungsbedingungen auszuführen.
        </p>
        <h5 class="text-primary">Lieferung</h5>
        <ul>
            <li><b class="text-primary">Bestellung Delivey:</b> Bestellungen werden direkt an die vom Kunden
                angegebene Lieferadresse und den Empfänger geliefert. Die Lieferungen erfolgen durch den Lieferservice
                von Swaad Foods. Bestellungen werden an die Haustür von Privatwohnungen (soweit zugänglich) oder an die
                Rezeption von Geschäftskunden geliefert.</li>
            <li><b class="text-primary">Lieferzeiten:</b> : Swaad Foods bemüht sich, die Lieferfristen einzuhalten. Alle
                von Swaad Foods angegebenen Lieferzeiten dienen jedoch ausschließlich der Orientierung. Wird eine
                Lieferfrist nicht eingehalten, ist der Kunde nicht berechtigt, vom Vertrag zurückzutreten oder eine
                Entschädigung zu erhalten. Sollte Swaad Foods nicht in der Lage sein, eine Bestellung zu liefern,
                besteht keine Verpflichtung zur Durchführung der Lieferung. Der Kunde hat dadurch keinen Anspruch auf
                Entschädigung.</li>
            <li><b class="text-primary">Lieferkosten:</b> Der Mindestbestellwert beträgt 40 chf gemäß der
                Lieferpostleitzahl.</li>
            <li><b class="text-primary">Stornierung einer Lieferung:</b> Swaad Foods will die Bestellung persönlich an
                den Kunden übergeben. Wenn aus Gründen, die außerhalb der Kontrolle von Swaad-Lebensmitteln liegen - wie
                z. B. eine falsche Lieferadresse, Abwesenheit des Empfängers, Fehlen eines Zugangs, schlechtes Wetter
                oder Straßenzustand oder ähnliches , sollte es sich als unmöglich oder möglich erweisen, die Lieferung
                erfolgreich durchzuführen, so ist Swaad Foods berechtigt, die Bestellung zu stornieren. In diesem Fall
                hat der Kunde keinen Anspruch auf Schadenersatz, Geld oder Sachleistungen.</li>
            <li><b class="text-primary">Rückgaberechte:</b> Swaad Foods primäres Ziel ist es, alle Bestellten in der
                richtigen Menge und auf einem hohen Qualitätsstandard zu liefern. In Ausnahmefällen kann es jedoch aus
                verschiedenen Gründen zu unzureichenden Produkten kommen oder es nicht möglich sein, ein Produkt
                freizugeben. Wenn Produkte zum Zeitpunkt der Lieferung nicht verfügbar sind, werden sie später nicht
                geliefert und es werden keine Ersatzprodukte geliefert. Die tatsächlich gelieferte Menge wird auf dem
                Lieferschein angegeben. Der Kunde hat keinen Anspruch auf finanzielle oder sachleistungende Leistungen,
                für teilweise oder gar nicht gelieferte Mengen. Wird ein Artikel trotz Abrechnung nicht geliefert, wird
                der betreffende Betrag dem Debitor gutgeschrieben. Eine Nachlieferung erfolgt nicht, und der Kunde ist
                nicht berechtigt, Schadensersatz zu verlangen.</li>
        </ul>
        <h5 class="text-primary">Preise und Zahlungen</h5>
        <ul>
            <li><b class="text-primary">Preise:</b> Alle Preise verstehen sich in Schweizer Franken, inklusive
                Mehrwertsteuer zum jeweiligen Preis. Die Preise werden zum Zeitpunkt der Bestellung auf der Website
                www.swaadbern.ch angezeigt.</li>
            <li><b class="text-primary">Zahlungsmethoden:</b> Die Zahlung der Bestellung muss in Schweizer Franken
                erfolgen. Neben der Barzahlung stehen verschiedene Zahlungsmethoden zur Verfügung. Swaad Foods ist
                berechtigt, nach eigenem Ermessen zu entscheiden, welche Zahlungsmethode zu akzeptieren ist. Die
                verfügbaren Zahlungsmethoden werden zur Auswahl angezeigt, wenn der Auftrag abgeschlossen ist. Zahlungen
                über die Website erfolgen an die Swaad Foods GmbH.</li>
        </ul>
        <p style="font-style: italic" class="text-primary">
            Es darf kein Alkohol an Kinder und Jugendliche unter 16 Jahren verkauft werden. Bier und Wein dürfen nur an
            über 16-Jährige verkauft werden. Spirituosen, Aperitife und Alcopops dürfen nur an über 18-Jährige verkauft
            werden.
        </p>
        <h5 class="text-primary">kontaktieren Sie uns
        </h5>
        <p>To resolve a complaint regarding the Site or to receive further information regarding use of the Site, please
            contact us at: </p>
        <p>Swaad Foods Gmbh <br>
            Bernstraße 95 <br>
            3072 Ostermundigen <br>
            + 031 558 33 88 <br>
            hello@swaadbern.ch <br>
        </p>
    </div>
</div>
@endif


@endsection