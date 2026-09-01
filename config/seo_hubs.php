<?php

/*
| SEO hub / category pages.
| Each hub carries its own answer block, question-led sections, a comparison
| table that only makes sense at category level, FAQs, and verified sources.
*/

return [

    'services' => [
        'type'  => 'service',
        'h1'    => 'Our Chauffeur and Car Hire Services',
        'title' => 'Chauffeur Services | Heathrow, Weddings, Corporate | Suave',
        'desc'  => 'Chauffeur-driven services from our Hayes base: Heathrow transfers, executive corporate travel, wedding cars and self-drive luxury hire.',
        'intro' => 'Four services, all run from one base in Hayes, ten minutes north of Heathrow. Which one you need usually comes down to who is driving.',
        'answer' => 'Suave Executive Travel runs four services from Hayes: chauffeur-driven Heathrow transfers covering Terminals 2, 3, 4 and 5; executive chauffeur hire for corporate travel; wedding cars including Rolls-Royce and Bentley; and self-drive luxury and supercar hire. Each is booked with a confirmed vehicle and a price agreed before the day.',
        'listTitle' => 'Choose a service',
        'sections' => [
            [
                'h2'   => 'Which service do you actually need?',
                'html' => '<p>The four services share a fleet but not a purpose, and picking the right one first usually saves a phone call.</p>
<ul>
<li><strong>Heathrow airport transfers</strong> &mdash; a single arrival or departure, or a regular airport run. Flight tracking, meet-and-greet inside the terminal, and a named driver.</li>
<li><strong>Executive chauffeur hire</strong> &mdash; corporate travel across London, the Thames Valley and the wider UK. Client collections, multi-stop roadshows and regular business travel, with account arrangements where the volume justifies it.</li>
<li><strong>Wedding car hire</strong> &mdash; Rolls-Royce Phantom, Ghost, Cullinan and Dawn, Bentley Bentayga and vintage vehicles, plus 9, 13 and 17-seater minibuses when the guests need moving too.</li>
<li><strong>Luxury and supercar hire</strong> &mdash; self-drive, for when the car itself is the point rather than the journey.</li>
</ul>',
            ],
            [
                'h2'   => 'Should you be driven, or drive yourself?',
                'html' => '<p>This is the first fork and it changes the whole booking. Chauffeur-driven work is priced on the journey: where you are going, how long the driver is held, and which vehicle waits for you. Self-drive is priced on time with the car, and brings its own insurance, deposit and licence requirements.</p>
<p>For airports, weddings and corporate travel, chauffeur-driven is almost always right &mdash; nobody wants to find parking for a Phantom at Terminal 5, and a wedding needs a driver who knows the timings. Self-drive earns its place when the car is the occasion: a weekend, a shoot, a birthday.</p>',
            ],
            [
                'h2'   => 'What is included whichever service you book?',
                'html' => '<p>The same four things are settled before the day rather than argued about after it:</p>
<ul>
<li>A confirmed vehicle, not a category. You know which car is coming.</li>
<li>A named driver on any chauffeur-driven booking.</li>
<li>A price agreed up front. Nothing is metered.</li>
<li>Flight tracking and a waiting allowance on anything airport-related.</li>
</ul>
<p>We work from 3 Uxbridge Road in Hayes, UB4, and have operated from the town since 2022. Sitting north of Heathrow rather than in central London is why the airport and West London pricing works as it does: far less empty mileage before your job begins.</p>',
            ],
        ],
        'comparison' => [
            'caption' => 'The four services side by side',
            'headers' => ['Service', 'Who drives', 'Typical use', 'Vehicles'],
            'rows' => [
                ['Heathrow airport transfers', 'Our chauffeur', 'Arrivals and departures, Terminals 2-5', 'Executive saloons to Rolls-Royce, plus 9, 13 and 17-seaters'],
                ['Executive chauffeur hire', 'Our chauffeur', 'Client collections, roadshows, regular business travel', 'Executive saloons, Range Rover'],
                ['Wedding car hire', 'Our chauffeur', 'Ceremony cars and guest transport', 'Rolls-Royce Phantom, Ghost, Cullinan, Dawn; Bentley Bentayga; vintage; minibuses'],
                ['Luxury and supercar hire', 'You', 'Self-drive weekends, shoots, occasions', 'Lamborghini, Ferrari, Bentley, Range Rover'],
            ],
        ],
        'faqs' => [
            ['q' => 'Do you cover all four Heathrow terminals?', 'a' => 'Yes. Terminals 2, 3, 4 and 5 are all covered, with flight tracking and meet-and-greet on arrivals.'],
            ['q' => 'Can you move wedding guests as well as the couple?', 'a' => 'Yes. Alongside the Rolls-Royce and Bentley wedding cars we run 9, 13 and 17-seater minibuses for guest transport, and handle multi-day bookings.'],
            ['q' => 'Do you work outside London?', 'a' => 'Yes. Executive chauffeur work covers London, the Thames Valley and the wider UK. Longer routes such as Heathrow to Oxford or Reading have their own pages with distances and journey times.'],
            ['q' => 'Can we set up an account for regular corporate travel?', 'a' => 'Account arrangements are available for regular business travel. Volume and billing preferences are agreed at the start rather than trip by trip.'],
        ],
        'sources' => [
            ['label' => 'Heathrow terminal guides - official information on Terminals 2, 3, 4 and 5', 'url' => 'https://www.heathrow.com/at-the-airport/terminal-guides', 'publisher' => 'Heathrow Airport'],
            ['label' => 'London Congestion Charge - current rate and payment rules', 'url' => 'https://tfl.gov.uk/modes/driving/congestion-charge', 'publisher' => 'Transport for London'],
        ],
    ],

    'chauffeur-hire' => [
        'type'  => 'area',
        'h1'    => 'Chauffeur Hire by Area',
        'title' => 'Chauffeur Hire in West London and Berkshire | Suave',
        'desc'  => 'Chauffeur hire across West London, Berkshire and Surrey from our Hayes base. Compare areas by postcode, distance to Heathrow and the work we do there.',
        'intro' => 'We are based in Hayes, UB4, so most of these areas are a short positioning run rather than a trek across London. Compare them below, then open your area.',
        'answer' => 'Suave Executive Travel provides chauffeur hire across West London, south Buckinghamshire, Berkshire and Surrey from our office at 3 Uxbridge Road in Hayes, UB4. Nine areas are covered in detail, from Hayes and Hounslow next to Heathrow out to Slough, Windsor and Richmond, each with Heathrow transfers, corporate travel and wedding cars.',
        'listTitle' => 'Areas we cover in detail',
        'sections' => [
            [
                'h2'   => 'Why does the company base change your price?',
                'html' => '<p>Every chauffeur job has a leg you never see: the drive from wherever the car was to wherever you are. In the trade it is dead mileage, and someone always pays for it, usually folded quietly into the quote.</p>
<p>A firm based in central London sending a car to Uxbridge runs forty minutes empty before your journey even starts. From Hayes the same job is roughly ten minutes. That is why the list below is nine areas we cover properly rather than every postcode in the South East.</p>',
            ],
            [
                'h2'   => 'Which area should you choose, and what changes between them?',
                'html' => '<p>The nine areas fall into three groups, and the work in each looks noticeably different.</p>
<ul>
<li><strong>Next to the airport</strong> &mdash; Hayes, Hounslow and Staines-upon-Thames. Airport work dominates; Hounslow sits closer to Heathrow than almost anywhere else in London, and Staines is closest to Terminal 5.</li>
<li><strong>West London</strong> &mdash; Uxbridge, Southall, Ealing and Richmond. A mix, but Southall is overwhelmingly weddings and Uxbridge picks up Brunel University journeys alongside corporate work.</li>
<li><strong>Thames Valley</strong> &mdash; Slough and Windsor. Slough is weighted heavily towards client collections and roadshows; Windsor towards weddings, tourism and the racing calendar.</li>
</ul>
<p>The table below is the quickest way to see which one matches your journey.</p>',
            ],
            [
                'h2'   => 'What does a local chauffeur booking include?',
                'html' => '<p>Whatever the area, the booking has the same shape: a confirmed vehicle rather than a class, a named driver, and a price agreed before the day. Airport jobs carry flight tracking and a waiting allowance, so a delayed landing does not turn into a missing car.</p>
<p>The fleet runs from executive saloons and Range Rovers up to Rolls-Royce and Bentley, with 9, 13 and 17-seater minibuses for groups. Which vehicles make sense for a given area is covered on that area page.</p>',
            ],
        ],
        'comparison' => [
            'caption' => 'The nine areas compared',
            'headers' => ['Area', 'Postcodes', 'Position', 'What we mostly do there'],
            'rows' => [
                ['Hayes', 'UB3, UB4', 'Our base, north of Heathrow', 'All services - airport, corporate, weddings, events'],
                ['Hounslow', 'TW3 to TW6', 'Closest to Heathrow of any London borough', 'Airport transfers, all four terminals'],
                ['Uxbridge', 'UB8, UB10', 'Minutes from the Hayes base', 'Heathrow, corporate, Brunel University, weddings'],
                ['Southall', 'UB1, UB2', 'Minutes from the Hayes base', 'Weddings - the largest part of our work here'],
                ['Ealing', 'W5, W13', 'West London', 'Heathrow, weddings, events, corporate'],
                ['Richmond', 'TW9, TW10', 'South-west London', 'Heathrow, riverside and hill wedding venues, executive travel'],
                ['Staines-upon-Thames', 'Surrey, TW18', 'Very close to Terminal 5', 'Corporate travel and short airport runs'],
                ['Slough', 'SL postcodes', 'Thames Valley', 'Client collections and roadshows'],
                ['Windsor', 'SL4', 'Close to Terminal 5', 'Weddings, tourism, racing calendar, airport'],
            ],
        ],
        'faqs' => [
            ['q' => 'Do you charge more for areas further from Hayes?', 'a' => 'Pricing reflects the whole journey including the positioning run, so a job in Windsor is priced differently from one in Hayes. The figure is agreed before the booking rather than metered on the day.'],
            ['q' => 'How far ahead should I book?', 'a' => 'Airport transfers and corporate collections can usually be arranged at short notice. Wedding cars and specific vehicles should be booked well ahead, because only one of each exists.'],
            ['q' => 'Which area is closest to Heathrow?', 'a' => 'Hounslow sits closer to Heathrow than almost anywhere else in London, and Staines-upon-Thames and Windsor are closest to Terminal 5. Our own base in Hayes is a few minutes north of the airport.'],
            ['q' => 'Do you cover areas not listed here?', 'a' => 'Yes. These nine are the areas we work in most often and know best. Journeys elsewhere in London, the Thames Valley and the wider UK are quoted on request.'],
        ],
        'sources' => [
            ['label' => 'Heathrow terminal guides - official information on Terminals 2, 3, 4 and 5', 'url' => 'https://www.heathrow.com/at-the-airport/terminal-guides', 'publisher' => 'Heathrow Airport'],
            ['label' => 'Elizabeth line route and stations, including Hayes and Harlington', 'url' => 'https://tfl.gov.uk/modes/elizabeth-line/', 'publisher' => 'Transport for London'],
        ],
    ],

    'transfers' => [
        'type'  => 'route',
        'h1'    => 'Heathrow Transfer Routes',
        'title' => 'Heathrow Transfers | Routes and Journey Times | Suave',
        'desc'  => 'Chauffeur-driven Heathrow transfers to central London, Mayfair, Canary Wharf, Windsor, Reading, Oxford and Gatwick. Distances, journey times and flight tracking.',
        'intro' => 'Seven routes, compared by distance and journey time. Every one includes flight tracking, meet-and-greet arrivals and a price agreed before you travel.',
        'answer' => 'Suave Executive Travel runs chauffeur-driven transfers from Heathrow to central London, Mayfair, Canary Wharf, Windsor, Reading, Oxford and Gatwick, from our base in Hayes just north of the airport. Terminals 2, 3, 4 and 5 are covered, with flight tracking, meet-and-greet arrivals and a fixed price agreed before the journey.',
        'listTitle' => 'Routes in detail',
        'sections' => [
            [
                'h2'   => 'How does a Heathrow transfer actually work?',
                'html' => '<p>An arrival and a departure are different jobs, and what goes wrong is nearly always the arrival.</p>
<p>On arrivals we track the flight rather than the booked time. Land forty minutes late and the car moves forty minutes late: you are not paying for a driver who has been sitting in a car park since the scheduled slot, and you are not landing to find the car has gone. Meet-and-greet means the driver is inside the terminal at arrivals, not texting you from somewhere else.</p>
<p>One current detail worth knowing: Heathrow closed the Terminal 4 multi-storey car park on 23 June 2026 for redevelopment. Terminal 4 itself stays open, but pick-up there has moved to a new area outside the arrivals hall, with Park &amp; Ride Zone A as the alternative. Across the airport, passenger pick-up runs from the Terminal Parking and Park &amp; Ride car parks rather than the terminal forecourts, which are enforced. Your driver will confirm the meeting point for your terminal when the booking is made.</p>
<p>Departures are simpler: a pickup time built backwards from your flight, with the terminal confirmed in advance.</p>',
            ],
            [
                'h2'   => 'How do the routes compare on distance and time?',
                'html' => '<p>All distances are measured from Heathrow. Times are typical and depend heavily on the hour, since the M25 and the A4 corridor behave very differently at 7am and at 2pm.</p>',
            ],
            [
                'h2'   => 'What changes the price of a transfer?',
                'html' => '<p>Four things, in roughly this order of impact:</p>
<ul>
<li><strong>Vehicle</strong> &mdash; an executive saloon and a Rolls-Royce are not the same job.</li>
<li><strong>Distance and time of day</strong> &mdash; Heathrow to Gatwick at 5pm ties a driver up far longer than the same run at 10am.</li>
<li><strong>Passengers and luggage</strong> &mdash; four people with four large cases need a different vehicle from two with hand baggage.</li>
<li><strong>Waiting beyond the included allowance</strong> &mdash; uncommon on tracked arrivals, but it exists.</li>
</ul>
<p>Journeys ending inside the central London zone can also attract the Congestion Charge, which rose from £15 to £18 a day on 2 January 2026. Where it applies it is included in the quoted figure rather than added afterwards.</p>
<p>The price is agreed before the journey. Nothing is metered, and a delayed flight does not change the number you were quoted.</p>',
            ],
        ],
        'comparison' => [
            'caption' => 'Seven routes compared',
            'headers' => ['Route from Heathrow', 'Distance', 'Typical time', 'Mostly used for'],
            'rows' => [
                ['Windsor', 'About 9 miles', '20-35 minutes', 'Castle-area hotels, Legoland, wedding venues'],
                ['Central London', 'About 16 miles', '45-90 minutes', 'Hotels and private addresses across the centre'],
                ['Mayfair', 'About 17 miles', '45-90 minutes', 'Mayfair hotels and private addresses'],
                ['Reading', 'About 26 miles on the M4', '35-60 minutes', 'Thames Valley business parks, corporate accounts'],
                ['Canary Wharf', 'About 27 miles', '60-90 minutes', 'Financial district offices and hotels'],
                ['Gatwick', 'About 45 miles on the M25', '60-90 minutes', 'Airport-to-airport connections'],
                ['Oxford', 'About 55 miles on the M40', '75-105 minutes', 'Colleges, hotel arrivals, heavy luggage'],
            ],
        ],
        'faqs' => [
            ['q' => 'What happens if my flight is delayed?', 'a' => 'We track the flight rather than the booked time and move the pickup with it. The quoted price does not change because of a delay.'],
            ['q' => 'Will the driver meet me inside the terminal?', 'a' => 'Yes. Meet-and-greet is standard on arrivals, so the driver waits in arrivals rather than directing you to a distant car park.'],
            ['q' => 'Has anything changed at Terminal 4?', 'a' => 'The Terminal 4 multi-storey car park closed on 23 June 2026 for redevelopment. The terminal itself remains open, and pick-up has moved to a new area outside the arrivals hall, with Park and Ride Zone A as the alternative.'],
            ['q' => 'Which is the shortest route you run?', 'a' => 'Heathrow to Windsor, at around nine miles and typically twenty to thirty-five minutes. Terminal 5 is the closest terminal to Windsor.'],
            ['q' => 'Is the price fixed or metered?', 'a' => 'Fixed and agreed before the journey. Nothing is metered, and the Congestion Charge is included in the quote where it applies.'],
        ],
        'sources' => [
            ['label' => 'Passenger pick-up at Heathrow - official car park and terminal guidance', 'url' => 'https://www.heathrow.com/transport-and-directions/heathrow-parking/passenger-pick-up', 'publisher' => 'Heathrow Airport'],
            ['label' => 'Changes to Terminal 4 - car park closure and new pick-up arrangements', 'url' => 'https://www.heathrow.com/at-the-airport/changes-to-terminal-4', 'publisher' => 'Heathrow Airport'],
            ['label' => 'London Congestion Charge increase to £18 from 2 January 2026', 'url' => 'https://www.rac.co.uk/drive/news/motoring-news/increase-to-london-congestion-charge/', 'publisher' => 'RAC'],
        ],
    ],

];
